<?php 
	error_reporting(0);
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class NewsAddN{
		private $db;
		private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	  }

	  public function addNnews($data, $file){
	  	$category_id = $this->fm->validation($data['category_id']);
		$category_id = mysqli_real_escape_string($this->db->link,$category_id);
		$subcategory_id = $this->fm->validation($data['subcategory_id']);
		$subcategory_id = mysqli_real_escape_string($this->db->link,$subcategory_id);
		$top_news = $this->fm->validation($data['top_news']);
		$top_news = mysqli_real_escape_string($this->db->link,$top_news);
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

	    if ($category_id =="" || $news_title ==""|| $news_url =="" || $news_seo_title =="" || $news_summery =="" || $news_details =="" || $file_name=="" || $author =="") {
	    	$msg = "<span class='error'>Product Field must not be empty!</span>";
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
	    	$query = "INSERT INTO tbl_newses(category_id,subcategory_id,top_news, news_title, news_url, news_seo_title,news_summery, news_details,image, author,status) VALUES('$category_id','$subcategory_id','$top_news','$news_title','$news_url','$news_seo_title','$news_summery','$news_details','$uploaded_image','$author','$status')";

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
	  public function getAllNews(){
	  	$newsShowquery = "SELECT tbl_newses.*,tbl_ncategory.category_title
					           FROM tbl_newses
					           INNER JOIN tbl_ncategory 
					           ON tbl_newses.category_id = tbl_ncategory.category_id
					           ORDER BY tbl_newses.news_id DESC";
		$result = $this->db->select($newsShowquery);
		return $result;
	  }
	/*recent*/
	  public function getAllNRecentNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' ORDER BY news_id DESC LIMIT 11";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*popular*/
	  public function getAllNPopularNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' ORDER BY hits DESC LIMIT 11";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*mot dimot*/
	  public function getAllmotdimotNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE category_id = '24' ORDER BY category_id DESC LIMIT 5";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*interview*/
	   public function getAllInterviewNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE category_id = '25' ORDER BY category_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*government*/
	   public function getAllgovmentNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE category_id = '26' ORDER BY category_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*oposite*/
	   public function getAllopositeNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE category_id = '27' ORDER BY category_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*superTop*/
	  public function getSuperTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE category_id = '28' ORDER BY category_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }

	   public function changenNewsTopById($id){
	  	$query = "UPDATE tbl_newses SET top_news = !top_news WHERE news_id = '$id'";
		$changstutus = $this->db->delete($query);
		return $changstutus;
	  }

	   public function changenNewsStatusById($id){
	  	$query = "UPDATE tbl_newses SET status = !status WHERE news_id = '$id'";
		$changstutus = $this->db->update($query);
		return $changstutus;
	  }

	   public function delnNewsById($id){

		$query ="SELECT * FROM tbl_newses WHERE news_id = '$id'";
	   	 $getdata = $this->db->select($query);
	   	 if ($getdata) {
	   	 	while ($delimg = $getdata->fetch_assoc()) {
	   	 		$delLink = $delimg['image']; /*from database*/
	   	 		unlink($delLink);
	   	 	}
	   	 }
	   	 $delquery = "DELETE FROM tbl_newses WHERE news_id ='$id'";
		  $deldata =$this->db->delete($delquery);
		   if ($deldata) {
	    		$msg = "<span class='success'>Deleted successfully!</span>";
			        return $msg;
	    	}else{
	    		$msg = "<span class='error'>SomeThing went Wrong!</span>";
			    	return $msg;
	    	}
	  }

	  public function getsubcatById($id){
	  	$ncatShowquery = "SELECT * FROM tbl_newses WHERE news_id = '$id'";
		$result = $this->db->select($ncatShowquery);
		return $result;
	  }

	  public function updateNewsInfo($data, $file, $id){
	  	$category_id = $this->fm->validation($data['category_id']);
		$category_id = mysqli_real_escape_string($this->db->link,$category_id);
		$subcategory_id = $this->fm->validation($data['subcategory_id']);
		$subcategory_id = mysqli_real_escape_string($this->db->link,$subcategory_id);
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

	    if ($category_id =="" || $subcategory_id =="" || $news_title =="" || $news_seo_title =="" || $news_summery =="" || $news_details =="") {
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
					    	$query = "UPDATE tbl_newses
			    			SET
			    			category_id         ='$category_id',
			    			subcategory_id 		='$subcategory_id',
			    			news_title	        ='$news_title',
			    			news_url 		    ='$news_url',
			    			news_seo_title 		='$news_seo_title',
			    			image 		        ='$uploaded_image',
			    			news_summery 	    ='$news_summery',
			    			news_details 		='$news_details'
			    			WHERE news_id ='$id'";

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
			    	/*akhane move upload hobena/jokhon iage thakbena*/
			    	/*move_uploaded_file($file_temp, $uploaded_image);*/
			    		$query = "UPDATE tbl_newses
			    			SET
			    			category_id         ='$category_id',
			    			subcategory_id 		='$subcategory_id',
			    			news_title	        ='$news_title',
			    			news_url 		    ='$news_url',
			    			news_seo_title 		='$news_seo_title',
			    			news_summery 	    ='$news_summery',
			    			news_details 		='$news_details'
			    			WHERE news_id ='$id'";

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

}