<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class Cartoon{
		private $db;
		private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	  }

	  public function addCartoonNnews($data, $file){
	  	$category_id = $this->fm->validation($data['category_id']);
		$category_id = mysqli_real_escape_string($this->db->link,$category_id);
		$top_news = $this->fm->validation($data['top_news']);
		$top_news = mysqli_real_escape_string($this->db->link,$top_news);
		$news_title = $this->fm->validation($data['news_title']);
		$news_title = mysqli_real_escape_string($this->db->link,$news_title);
		$news_url = $this->fm->validation($data['news_url']);
		$news_url = mysqli_real_escape_string($this->db->link,$news_url);
		$news_summery = $this->fm->validation($data['news_summery']);
		$news_summery = mysqli_real_escape_string($this->db->link,$news_summery);
		$author = $this->fm->validation($data['author']);
		$author = mysqli_real_escape_string($this->db->link,$author);
		$status = $this->fm->validation($data['status']);
		$status = mysqli_real_escape_string($this->db->link,$status);
		$date = $this->fm->validation($data['date']);
		$date = mysqli_real_escape_string($this->db->link,$date);

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "../upload/".$unique_image;

	    if ($news_title ==""|| $news_url =="" || $news_summery =="" || $file_name=="" || $author =="" || $date=="") {
	    	$msg = "<span class='error'>Field must not be empty!</span>";
			return $msg;
	    }
	    else if ($file_size >1048567) {
		     $msg =  "<span class='error'>Image Size should be less then 1MB!
                         </span>";
                  return $msg;
		    } else if (in_array($file_ext, $permited) === false) {
		     $msg = "<span class='error'>You can upload only:-</span>"
                       .implode(', ', $permited)."</span>";
                   return $msg;
		    }else{
	    	move_uploaded_file($file_temp, $uploaded_image);
	    	$query = "INSERT INTO tbl_cartoon(category_id,top_news, news_title, news_url,news_summery,image, author,status,date) VALUES('$category_id','$top_news','$news_title','$news_url','$news_summery','$uploaded_image','$author','$status','$date')";

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

	  public function getAllCartoonNews(){
	  	$query = "SELECT * FROM tbl_cartoon ORDER BY cartoon_id DESC";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get last one cartoon news*/
	  public function getOneCartoonNews(){
	  	$query = "SELECT * FROM tbl_cartoon ORDER BY cartoon_id DESC LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  } 
	  /*get last one cartoon news*/
	  public function getAllCartoonNewsformain(){
	  	$query = "SELECT * FROM tbl_cartoon ORDER BY rand(), cartoon_id DESC LIMIT 2";
	  	$result = $this->db->select($query);
	  	return $result;
	  } 

	  public function changenCartoonNewsTopById($id){
	  	$query = "UPDATE tbl_cartoon SET top_news = !top_news WHERE cartoon_id = '$id'";
		$changstutus = $this->db->update($query);
		return $changstutus;
	  }

	  public function changenCartoonNewsStatusById($id){
	  	$query = "UPDATE tbl_cartoon SET status = !status WHERE cartoon_id = '$id'";
		$changstutus = $this->db->update($query);
		return $changstutus;
	  }

		/*for update*/
	  public function getCartoonNewsById($id){
	  	$ncatShowquery = "SELECT * FROM tbl_cartoon WHERE cartoon_id = '$id'";
		$result = $this->db->select($ncatShowquery);
		return $result;
	  }

	  /*cartoon news update*/
	  public function updatecartoonNewsInfo($data, $file, $id){
		$news_title = $this->fm->validation($data['news_title']);
		$news_title = mysqli_real_escape_string($this->db->link,$news_title);
		$news_url = $this->fm->validation($data['news_url']);
		$news_url = mysqli_real_escape_string($this->db->link,$news_url);
		$news_summery = $this->fm->validation($data['news_summery']);
		$news_summery = mysqli_real_escape_string($this->db->link,$news_summery);

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "../upload/".$unique_image;

	    if ($news_title ==""|| $news_url =="" || $news_summery =="") {
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
					    $query = "UPDATE tbl_cartoon
				    			SET
				    			news_title	        ='$news_title',
				    			news_url 		    ='$news_url',
				    			image 		        ='$uploaded_image',
				    			news_summery 	    ='$news_summery'
				    			WHERE cartoon_id ='$id'";

			    	$updated_row = $this->db->update($query);
					if ($updated_row) {
						$msg = "<span class='success'>updated successfully!</span>";
					    return $msg;
						
					}else{
						$msg = "<span class='error'>Not updated!</span>";
					    return $msg;
					}
			    }
			    } else{
			    	/*akhane move upload hobena/jokhon iage thakbena*/
			    	/*move_uploaded_file($file_temp, $uploaded_image);*/
			    		$query = "UPDATE tbl_cartoon
				    			SET
				    			news_title	        ='$news_title',
				    			news_url 		    ='$news_url',
				    			news_summery 	    ='$news_summery'
				    			WHERE cartoon_id ='$id'";

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

	  /*cartoon news delete*/
	  public function delncartoonNewsById($id){
	  	$query ="SELECT * FROM tbl_cartoon WHERE cartoon_id = '$id'";
	   	 $getdata = $this->db->select($query);
	   	 if ($getdata) {
	   	 	while ($delimg = $getdata->fetch_assoc()) {
	   	 		$delLink = $delimg['image']; /*from database*/
	   	 		unlink($delLink);
	   	 	}
	   	 }
	   	 $delquery = "DELETE FROM tbl_cartoon WHERE cartoon_id ='$id'";
		  $deldata =$this->db->delete($delquery);
		   if ($deldata) {
	    		$msg = "<span class='success'>Deleted successfully!</span>";
			        return $msg;
	    	}else{
	    		$msg = "<span class='error'>SomeThing went Wrong!</span>";
			    	return $msg;
	    	}
	  }

	  /*cartoon last ione new for fatch*/

	  public function getlastOneCartoonlNews(){
	  	$query = "SELECT * FROM tbl_cartoon WHERE status = '1' AND category_id = '32' ORDER BY cartoon_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }

	  /*get top cartoon news*/
	  public function getcartoonTopNews(){
	  	 $query = "SELECT * FROM tbl_cartoon WHERE status = '1' AND top_news = '1' AND category_id = '32' ORDER BY category_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all cartoon news*/
	  public function getAllcartoonNewsinner(){
	  	$query = "SELECT * FROM tbl_cartoon WHERE status = '1'AND category_id = '32' ORDER BY category_id DESC  LIMIT 10";
	  	$result = $this->db->select($query);
	  	return $result;
	  }

	  /*get cartoon single news*/
	  public function getsingleCartoonnews($singleid){
	  	$query = "SELECT * FROM tbl_cartoon WHERE status = '1'AND news_url = '$singleid'";
	  	$result = $this->db->select($query);
	  	return $result;
	  }


}