<?php 
error_reporting(0);
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class Columnistnews{
		private $db;
		private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	  }

	  public function getdataColnews($data, $file){
	  	$news_title = $this->fm->validation($data['news_title']);
	  	$news_title = mysqli_real_escape_string($this->db->link,$news_title);
	  	$news_url = $this->fm->validation($data['news_url']);
	  	$news_url = mysqli_real_escape_string($this->db->link,$news_url);
	  	$news_seo_title = $this->fm->validation($data['news_seo_title']);
	  	$news_seo_title = mysqli_real_escape_string($this->db->link,$news_seo_title);
	  	$news_summery = $this->fm->validation($data['news_summery']);
	  	$news_summery = mysqli_real_escape_string($this->db->link,$news_summery);
	  	$news_details = $this->fm->validation($data['news_details']);
	  	$news_details = mysqli_real_escape_string($this->db->link,$news_details);
	  	$author = $this->fm->validation($data['author']);
	  	$author = mysqli_real_escape_string($this->db->link,$author);
	  	$status = $this->fm->validation($data['status']);
	  	$status = mysqli_real_escape_string($this->db->link,$status);

	    	$query = "INSERT INTO tbl_columnist(news_title, news_url, news_seo_title, news_summery, news_details, author, status) VALUES('$news_title','$news_url','$news_seo_title','$news_summery','$news_details','$author','$status')";
	    	$inserted_row = $this->db->insert($query);

			if ($inserted_row) {
				$msg = "<span class='success'>inserted successfully!</span>";
			    return $msg;
				
			}else{
				$msg = "<span class='error'>Something Went Wrong!</span>";
			    return $msg;
			}
	  }

	  public function getAllColNews(){
	  	$query = "SELECT tbl_columnist.*,tbl_columnistProfile.author
					           FROM tbl_columnist
					           INNER JOIN tbl_columnistProfile 
					           ON tbl_columnist.author = tbl_columnistProfile.columnistProfile_id
					           ORDER BY tbl_columnist.columnistn_id DESC";
	    $result = $this->db->select($query);
	  	return $result;

	  	/*$query = "SELECT * FROM tbl_columnist ORDER BY columnistn_id";
	  	$result = $this->db->select($query);
	  	return $result;*/
	  }

	  public function changenColNStatusById($id){
	  	$query = "UPDATE tbl_columnist SET status = !status WHERE columnistn_id = '$id'";
	  	$chngcolstatus = $this->db->UPDATE($query);
	  	return $chngcolstatus;
	  }

	  public function getcolNewsById($id){
	  	$query = "SELECT * FROM tbl_columnist WHERE columnistn_id = '$id'";
	  	$result = $this->db->select($query);
	  	return $result;
	  }

	  public function updateColNewsInfo($data, $file, $id){
	  	$news_title = $this->fm->validation($data['news_title']);
	  	$news_title = mysqli_real_escape_string($this->db->link,$news_title);
	  	$news_url = $this->fm->validation($data['news_url']);
	  	$news_url = mysqli_real_escape_string($this->db->link,$news_url);
	  	$news_seo_title = $this->fm->validation($data['news_seo_title']);
	  	$news_seo_title = mysqli_real_escape_string($this->db->link,$news_seo_title);
	  	$news_summery = $this->fm->validation($data['news_summery']);
	  	$news_summery = mysqli_real_escape_string($this->db->link,$news_summery);
	  	$news_details = $this->fm->validation($data['news_details']);
	  	$news_details = mysqli_real_escape_string($this->db->link,$news_details);

					    	$query = "UPDATE tbl_columnist
			    			SET
			    			news_title	        ='$news_title',
			    			news_url 		    ='$news_url',
			    			news_seo_title 		='$news_seo_title',
			    			news_summery 	    ='$news_summery',
			    			news_details 		='$news_details'
			    			WHERE columnistn_id ='$id'";

			    	$updated_row = $this->db->update($query);
					if ($updated_row) {
						$msg = "<span class='success'>updated successfully!</span>";
					    return $msg;
						
					}else{
						$msg = "<span class='error'>Something Went Wrong!!</span>";
					    return $msg;
					}
			    }
			    
	      
	  

	  public function getdelDataColNewsById($id){
	  	
		$query ="SELECT * FROM tbl_columnist WHERE columnistn_id = '$id'";
	   	 $getdata = $this->db->select($query);
	   	 if ($getdata) {
	   	 	while ($delimg = $getdata->fetch_assoc()) {
	   	 		$delLink = $delimg['image']; /*from database*/
	   	 		unlink($delLink);
	   	 	}
	   	 }
	   	 $delquery = "DELETE FROM tbl_columnist WHERE columnistn_id ='$id'";
		  $deldata =$this->db->delete($delquery);
		   if ($deldata) {
	    		$msg = "<span class='success'>Deleted successfully!</span>";
			        return $msg;
	    	}else{
	    		$msg = "<span class='error'>SomeThing went Wrong!</span>";
			    	return $msg;
	    	}
	  }

	  /*add columnist*/
	  public function addColmunistprofile($data, $file){
	  	$author = $this->fm->validation($data['author']);
	  	$author = mysqli_real_escape_string($this->db->link,$author);

	  	$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "../upload/".$unique_image;

	  	if (empty($author)) {
	  		$msg = "<span class='error'>Field must not be empty!</span>";
			return $msg;
	  	}else if ($file_size >1048567) {
		    $msg =  "<span class='error'>Image Size should be less then 1MB!
                         </span>";
                          return $msg;
		    } else if (in_array($file_ext, $permited) === false) {
		    	$msg = "<span class='error'>You can upload only:-</span>"
		     .implode(', ', $permited)."</span>";
		      return $msg;
		    }else{
	    	move_uploaded_file($file_temp, $uploaded_image);
	    	$query = "INSERT INTO  tbl_columnistProfile(author,image) VALUES('$author','$uploaded_image')";

	    	$inserted_row = $this->db->insert($query);
			if ($inserted_row) {
				$msg = "<span class='success'>inserted successfully!</span>";
			    return $msg;
				
			}else{
				$msg = "<span class='error'>Something Went Wrong!</span>";
			    return $msg;
			}
	    }

	  }
	  	/*mot dimot*/
	  public function getAllmotdimotNews(){
	  	$query = "SELECT tbl_columnist.*,tbl_columnistProfile.*
					           FROM tbl_columnist
					           INNER JOIN tbl_columnistProfile 
					           ON tbl_columnist.author = tbl_columnistProfile.columnistProfile_id
					           WHERE status = '1' ORDER BY columnistn_id DESC LIMIT 5";
	    $result = $this->db->select($query);
	  	return $result;
/*

	  	$query = "SELECT * FROM tbl_columnist WHERE status = '1' ORDER BY columnistn_id DESC LIMIT 5";
	  	$result = $this->db->select($query);
	  	return $result;*/
	  }

	  /*get show all colamist profile*/
	  public function getallColProf(){
		 $query ="SELECT * FROM tbl_columnistProfile ORDER BY columnistProfile_id DESC";
	   	 $getdata = $this->db->select($query);
	   	 return $getdata;
	  }
	  /*get all colamist name and Image*/
	  public function getAllColumnistName(){
	  	 $query ="SELECT * FROM tbl_columnistProfile ORDER BY columnistProfile_id DESC";
	   	 $getdata = $this->db->select($query);
	   	 return $getdata;
	  }


	  /*colamist profile*/
	  public function getcolamistprofile(){
	  	 $query ="SELECT * FROM tbl_columnistProfile ORDER BY columnistProfile_id DESC";
	   	 $getdata = $this->db->select($query);
	   	 return $getdata;
	  }

	  /*individual profile*/
	  public function getcolamistprofilebyid($id){
	  	$query ="SELECT * FROM tbl_columnistProfile WHERE columnistProfile_id = '$id'";
	   	 $result = $this->db->select($query);
	   	 return $result;
	  }

	  /*columist news by id*/
	  public function getcolamistnewsbyid($id){
	  	$query = "SELECT tbl_columnistProfile.*,tbl_columnist.*
					           FROM tbl_columnistProfile
					           INNER JOIN tbl_columnist 
					           ON tbl_columnistProfile.columnistProfile_id = tbl_columnist.author
					           WHERE tbl_columnistProfile.columnistProfile_id ='$id'";
	  	/*$query ="SELECT * FROM tbl_columnist WHERE author = '$id'";*/
	   	 $result = $this->db->select($query);
	   	 return $result;
	  }
	  /*colamist news with profile*/
	  public function getcolamistNewsWithprof(){
	  	$query = "SELECT tbl_columnist.*,tbl_columnistProfile.*
					           FROM tbl_columnist
					           INNER JOIN tbl_columnistProfile 
					           ON tbl_columnist.author = tbl_columnistProfile.columnistProfile_id
					           ORDER BY columnistn_id DESC";
	  	/*$query ="SELECT * FROM tbl_columnist ORDER BY columnistn_id DESC";*/
	   	 $result = $this->db->select($query);
	   	 return $result;
	  }

	  /*get single colamist news*/
	  public function getsingleColmnistnews($singleid){
	  	$query = "SELECT tbl_columnist.*,tbl_columnistProfile.*
					           FROM tbl_columnist
					           INNER JOIN tbl_columnistProfile 
					           ON tbl_columnist.author = tbl_columnistProfile.columnistProfile_id
					           WHERE news_url = '$singleid'";
	  	/*$query = "SELECT * FROM tbl_columnist WHERE news_url = '$singleid'";*/
	  	$result = $this->db->select($query);
	  	return $result;
	  }

	  /*------------update colamist profile--------*/
	  /*get colamist data*/
	  public function getsubcatById($id){
	  	 $query ="SELECT * FROM tbl_columnistprofile WHERE columnistProfile_id = '$id'";
	   	 $result = $this->db->select($query);
	   	 return $result;
	  }

	  /*update*/
	  public function updateNewsInfo($data, $file, $id){
	  	$author = $this->fm->validation($data['author']);
	  	$author = mysqli_real_escape_string($this->db->link,$author);

	  	$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "../upload/".$unique_image;

	  	if (empty($author)) {
	  		$msg = "<span class='error'>Field must not be empty!</span>";
			return $msg;
	  	} else { 
	    	if (!empty($file_name)) {
			     if ($file_size >1048567) {
				     $msg =  "<span class='error'>Image Size should be less then 1MB!
                         </span>";
                          return $msg;
				    } elseif (in_array($file_ext, $permited) === false) {
				     $msg = "<span class='error'>You can upload only:-</span>"
                       .implode(', ', $permited)."</span>";
                        return $msg;
				    }else{
			    	move_uploaded_file($file_temp, $uploaded_image);
					    	$query = "UPDATE tbl_columnistprofile
			    			SET
			    			author       ='$author',
			    			image 		 ='$uploaded_image'
			    			WHERE columnistProfile_id ='$id'";

			    	$updated_row = $this->db->update($query);
					if ($updated_row) {
						$msg = "<span class='success'>Product updated successfully!</span>";
					    return $msg;
						
					}else{
						$msg = "<span class='error'>Product Not updated!</span>";
					    return $msg;
					}
			    }
			    } else{
			    		$query = "UPDATE tbl_columnistprofile
			    			SET
			    			author       ='$author'
			    			WHERE columnistProfile_id ='$id'";

			    	$updated_row = $this->db->update($query);
					if ($updated_row) {
						$msg = "<span class='success'>updated successfully!</span>";
					    return $msg;
						
					}else{
						$msg = "<span class='error'>Something Went Wrong!</span>";	 

			       }
	           }
	       }
	  }
	  
	  public function delColumnistProf($id){
		$query ="SELECT * FROM tbl_columnistprofile WHERE columnistProfile_id = '$id'";
	   	 $getdata = $this->db->select($query);
	   	 if ($getdata) {
	   	 	while ($delimg = $getdata->fetch_assoc()) {
	   	 		$delLink = $delimg['image']; /*from database*/
	   	 		unlink($delLink);
	   	 	}
	   	 }
	   	 $delquery = "DELETE FROM tbl_columnistprofile WHERE columnistProfile_id ='$id'";
		  $deldata =$this->db->delete($delquery);
		   if ($deldata) {
	    		$msg = "<span class='success'>Deleted successfully!</span>";
			        return $msg;
	    	}else{
	    		$msg = "<span class='error'>SomeThing went Wrong!</span>";
			    	return $msg;
	    	}
	  }


}