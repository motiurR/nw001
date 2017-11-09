<?php 
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
		$date = $this->fm->validation($data['date']);
		$date = mysqli_real_escape_string($this->db->link,$date);
		

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "upload/".$unique_image;

	    if ($category_id =="" || $news_title ==""|| $news_url =="" || $news_seo_title =="" || $news_summery =="" || $news_details =="" || $file_name=="" || $author =="" || $date=="") {
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
	    	$query = "INSERT INTO tbl_newses(category_id,subcategory_id,top_news, news_title, news_url, news_seo_title,news_summery, news_details,image, author,status,date) VALUES('$category_id','$subcategory_id','$top_news','$news_title','$news_url','$news_seo_title','$news_summery','$news_details','$uploaded_image','$author','$status','$date')";

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
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '24' ORDER BY news_id DESC LIMIT 5";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*interview*/
	   public function getAllInterviewNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '25' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*government*/
	   public function getAllgovmentNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '26' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*oposite*/
	   public function getAllopositeNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '27' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*superTop*/
	  public function getSuperTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '28' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }

	  public function getNationalNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '29' ORDER BY news_id DESC  LIMIT 6";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get cricket top news*/
	  public function getCricketTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND subcategory_id = '2' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get footbal top news*/
	  public function getFootbalTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND subcategory_id = '3' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all sports news*/
	  public function getAllSportsNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '19' ORDER BY news_id DESC  LIMIT 4";
	  	$result = $this->db->select($query);
	  	return $result;
	  }

	  /*get top political news*/
	  public function getTopPoliticalNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND category_id = '15' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }

	  /*get all political news*/
	  public function getAllPoliticalNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '15' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all international new*/
	  public function getAllInternationalNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '18' ORDER BY news_id DESC  LIMIT 6";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all economical news*/
	  public function getAllEconomicalNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '17' ORDER BY news_id DESC  LIMIT 4";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	 /* get hollywood top news*/
	  public function getDhallywoodTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND subcategory_id = '11' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /* get bollywood top news*/
	  public function getBollyllywoodTopNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND subcategory_id = '10' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all Entertainment new*/
	  public function getAllIEntertainmentNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '20' ORDER BY news_id DESC  LIMIT 4";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /* get top Education news*/
	  public function getTopEducationNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND top_news = '1' AND category_id = '30' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all Education new*/
	  public function getAllEducationNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '30' ORDER BY news_id DESC  LIMIT 3";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all Technology new*/
	  public function getAllITechnologyNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '31' ORDER BY news_id DESC  LIMIT 6";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all Lifestyle new*/
	  public function getAlllifestyleNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND subcategory_id = '6' ORDER BY news_id DESC  LIMIT 6";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /* get get Last One Women News*/
	  public function getLastOneWomenNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1' AND subcategory_id = '8' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /* get get Last One bicitro News*/
	  public function getLastOneBicitroNews(){
	  	$query = "SELECT * FROM tbl_newses WHERE status = '1'AND category_id = '22' ORDER BY news_id DESC  LIMIT 1";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  /*get all breaking news*/	
	  public function getAllBreakingNews(){
	  	$query = "SELECT * FROM tbl_breakingnews WHERE status = '1' ORDER BY breaking_id DESC";
	  	$result = $this->db->select($query);
	  	return $result;
	  }  








	  /*get details news*/
	  public function getsinglenews($singleid){
	  	 $query = "SELECT * FROM tbl_newses WHERE news_url = '$singleid'";
	  	$result = $this->db->select($query);
	  	return $result;
	  }

	   public function changenNewsTopById($id){
	  	$query = "UPDATE tbl_newses SET top_news = !top_news WHERE news_id = '$id'";
		$changstutus = $this->db->update($query);
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
	 /*for update*/
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

	  /*date wise search*/
	  public function getnewsByid($data){
	  	$year = $this->fm->validation($data['year']);
		$year = mysqli_real_escape_string($this->db->link,$year);
		$month = $this->fm->validation($data['month']);
		$month = mysqli_real_escape_string($this->db->link,$month);
		$day = $this->fm->validation($data['day']);
		$day = mysqli_real_escape_string($this->db->link,$day);

		$date = $year.'-'.$month.'-'.$day;

		$query = "SELECT * FROM tbl_newses WHERE date = '$date'";
		$result =$this->db->select($query);
		return $result;
	  }

}