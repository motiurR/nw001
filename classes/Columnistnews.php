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

	  	$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "upload/".$unique_image;

	  	if (empty($news_title) || empty($news_url) || empty($news_seo_title) || empty($file_name) || empty($news_summery) || empty($news_details) || empty($author) || empty($status)) {
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
	    	$query = "INSERT INTO tbl_columnist(news_title, news_url, news_seo_title,image, news_summery, news_details, author, status) VALUES('$news_title','$news_url','$news_seo_title','$uploaded_image','$news_summery','$news_details','$author','$status')";

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

	  public function getAllColNews(){
	  	$query = "SELECT * FROM tbl_columnist ORDER BY columnistn_id";
	  	$result = $this->db->select($query);
	  	return $result;
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

	  	$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "upload/".$unique_image;

	    if ($news_title =="" || $news_url =="" || $news_seo_title =="" || $news_summery =="" || $news_details =="") {
	    	$msg = "<span class='error'>Field must not be empty!</span>";
			return $msg;
	    } else { /*jehitu photo check korte hocchena*/
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
					    	$query = "UPDATE tbl_columnist
			    			SET
			    			news_title	        ='$news_title',
			    			news_url 		    ='$news_url',
			    			news_seo_title 		='$news_seo_title',
			    			image 		        ='$uploaded_image',
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
			    } else{
			    	/*akhane move upload hobena/jokhon jaiga thakbena*/
			    	/*move_uploaded_file($file_temp, $uploaded_image);*/
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
						$msg = "<span class='error'>Something Went Wrong!</span>";	 

			       }
	           }
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


}