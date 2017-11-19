<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class categoryLocal{
		private $db;
		private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	  }

	  public function addNCatTitle($data){
	  	$category_title = $this->fm->validation($data['category_title']);
		$category_title = mysqli_real_escape_string($this->db->link,$category_title);
		$category_url = $this->fm->validation($data['category_url']);
		$category_url = mysqli_real_escape_string($this->db->link,$category_url); 
		$category_seo_title = $this->fm->validation($data['category_seo_title']);
		$category_seo_title = mysqli_real_escape_string($this->db->link,$category_seo_title);
		$status = $this->fm->validation($data['status']);
		$status = mysqli_real_escape_string($this->db->link,$status); 


		if (empty($category_title) || empty($category_url) || empty($category_seo_title)){
			$msg = "<span class='unsuccess'>Category Must Not Be Empty.</span>";
			return $msg;
		}else{
			$ncatinsertquery = "INSERT INTO tbl_category_local(category_title,category_url,category_seo_title,status) VALUES('$category_title','$category_url','$category_seo_title','$status') ";
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

	  public function getAllNCat(){
	  	$ncatShowquery = "SELECT * FROM tbl_category_local ORDER BY category_id DESC";
		$result = $this->db->select($ncatShowquery);
		return $result;
	  }
	  /*for cartoon*/
	  public function getAllNCatforCartoon(){
	  	$ncatShowquery = "SELECT * FROM tbl_category_local WHERE category_id = '32'";
		$result = $this->db->select($ncatShowquery);
		return $result;
	  }

	  public function delNCatById($id){
	  	$query = "DELETE FROM tbl_category_local WHERE category_id = '$id'";
		$delete_row = $this->db->delete($query);
		if ($delete_row) {
			$msg = "<span class='success'>Category Deleted Successfully.</span>";
				return $msg;
		}else{
			$msg = "<span class='unsuccess'>Category Not Delete Successfully.</span>";
			return $msg;
		}
	  }

	  public function changeNCatStatusById($id){
	  	$query = "UPDATE tbl_category_local SET status = !status WHERE category_id = '$id'";
		$changstutus = $this->db->update($query);
		return $changstutus;
	  }
	   public function getNcatforupdate($id){
	  	$ncatShowquery = "SELECT * FROM tbl_category_local WHERE category_id = '$id'";
		$result = $this->db->select($ncatShowquery);
		return $result;
	  }

	  public function UpdateNCatTitle($data,$id){
	  	$category_title = $this->fm->validation($data['category_title']);
		$category_title = mysqli_real_escape_string($this->db->link,$category_title);
		$category_url = $this->fm->validation($data['category_url']);
		$category_url = mysqli_real_escape_string($this->db->link,$category_url); 
		$category_seo_title = $this->fm->validation($data['category_seo_title']);
		$category_seo_title = mysqli_real_escape_string($this->db->link,$category_seo_title);


		if (empty($category_title) || empty($category_url) || empty($category_seo_title)){
			$msg = "<span class='unsuccess'>Category Must Not Be Empty.</span>";
			return $msg;
		}else{
			$updatequery = "UPDATE tbl_category_local 
							SET 
							category_title = '$category_title',
							category_url = '$category_url',
							category_seo_title = '$category_seo_title'
							WHERE category_id = '$id'";
			$update_row = $this->db->update($updatequery); 
			
			if ($update_row) {
				$msg = "<span class='success'>Category Update Successfully.</span>";
				return $msg;
		}else{
			$msg = "<span class='unsuccess'>Something Went Wrong</span>";
			return $msg;
		}
	}
	  }


	  public function getAllCat(){
	  	$ncatShowquery = "SELECT * FROM tbl_category_local ORDER BY category_id DESC";
		$result = $this->db->select($ncatShowquery);
		return $result;
	  }


}