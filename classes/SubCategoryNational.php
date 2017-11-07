<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class SubCategoryNational{
		private $db;
		private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	  }

	  public function addNSubCatTitle($data){
	  	$category_id = $this->fm->validation($data['category_id']);
		$category_id = mysqli_real_escape_string($this->db->link,$category_id);
	  	$sub_category_title = $this->fm->validation($data['sub_category_title']);
		$sub_category_title = mysqli_real_escape_string($this->db->link,$sub_category_title);
		$sub_category_url = $this->fm->validation($data['sub_category_url']);
		$sub_category_url = mysqli_real_escape_string($this->db->link,$sub_category_url); 
		$subcategory_seo_title = $this->fm->validation($data['subcategory_seo_title']);
		$subcategory_seo_title = mysqli_real_escape_string($this->db->link,$subcategory_seo_title);
		$status = $this->fm->validation($data['status']);
		$status = mysqli_real_escape_string($this->db->link,$status); 


		if (empty($sub_category_title) || empty($sub_category_url) || empty($subcategory_seo_title)){
			$msg = "<span class='unsuccess'>Category Must Not Be Empty.</span>";
			return $msg;
		}else{
			$ncatinsertquery = "INSERT INTO tbl_subcategory(category_id,sub_category_title,sub_category_url,subcategory_seo_title,status) VALUES('$category_id','$sub_category_title','$sub_category_url','$subcategory_seo_title','$status') ";
			$result = $this->db->insert($ncatinsertquery); 
			if ($result) {
				$msg = "<span class='success'>Category Inserted Successfully.</span>";
				return $msg;
		}else{
			$msg = "<span class='unsuccess'>Something Went Wrong</span>";
			return $msg;
		}
	}

	  }

	  public function getAllNsCat(){
	  	$nscatShowquery = "SELECT * FROM tbl_subcategory ORDER BY subcategory_id DESC";
		$result = $this->db->select($nscatShowquery);
		return $result;
	  }
	  public function gesubCategorybyId($subcid){
		$catShowquery = "SELECT * FROM tbl_subcategory WHERE category_id = '$subcid' ";
		$result = $this->db->select($catShowquery);
		return $result;
	}

	  public function delNsCatById($id){
	  	$query = "DELETE FROM tbl_subcategory WHERE subcategory_id = '$id'";
		$delete_row = $this->db->delete($query);
		if ($delete_row) {
			$msg = "<span class='success'>Deleted Successfully.</span>";
				return $msg;
		}else{
			$msg = "<span class='unsuccess'>Not Delete Successfully.</span>";
			return $msg;
		}
	  }

	  public function changeNsCatStatusById($id){
	  	$query = "UPDATE tbl_subcategory SET status = !status WHERE subcategory_id = '$id'";
		$changstutus = $this->db->update($query);
		return $changstutus;
	  }
	  public function getsubcatById($id){
	  	$nscatshow = "SELECT * FROM tbl_subcategory WHERE subcategory_id = '$id'";
		$result = $this->db->select($nscatshow);
		return $result;
	  }

	  public function editNSubCatTitle($data, $id){
	  	$category_id = $this->fm->validation($data['category_id']);
		$category_id = mysqli_real_escape_string($this->db->link,$category_id);
	  	$sub_category_title = $this->fm->validation($data['sub_category_title']);
		$sub_category_title = mysqli_real_escape_string($this->db->link,$sub_category_title);
		$sub_category_url = $this->fm->validation($data['sub_category_url']);
		$sub_category_url = mysqli_real_escape_string($this->db->link,$sub_category_url); 
		$subcategory_seo_title = $this->fm->validation($data['subcategory_seo_title']);
		$subcategory_seo_title = mysqli_real_escape_string($this->db->link,$subcategory_seo_title);


		if (empty($sub_category_title) || empty($sub_category_url) || empty($subcategory_seo_title)){
			$msg = "<span class='unsuccess'>Category Must Not Be Empty.</span>";
			return $msg;
		}else{
			$updatequery = "UPDATE tbl_subcategory 
							SET 
							category_id = '$category_id',
							sub_category_title = '$sub_category_title',
							sub_category_url = '$sub_category_url',
							subcategory_seo_title = '$subcategory_seo_title'
							WHERE subcategory_id = '$id'";
			$update_row = $this->db->update($updatequery); 
			
			if ($update_row) {
				$msg = "<span class='success'>Update Successfully.</span>";
				return $msg;
		}else{
			$msg = "<span class='unsuccess'>Something Went Wrong</span>";
			return $msg;
		}
	}
	  }



}