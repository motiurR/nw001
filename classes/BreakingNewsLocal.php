<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class BreakingNewsLocal{
		private $db;
		private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	  }

	  public function getBreakingNews($data){
	  	$title = $this->fm->validation($data['title']);
	  	$title = mysqli_real_escape_string($this->db->link,$title);
	  	$status = $this->fm->validation($data['status']);
	  	$status = mysqli_real_escape_string($this->db->link,$status);

	  	if (empty($title)) {
	  		$msg = "<span class='unsuccess'>Field Must Not Be Empty.</span>";
			return $msg;
	  	}else{
	  	  	$breakingquery = "INSERT INTO tbl_breakingnews_local(title,status) VALUES('$title','$status') ";
			$result = $this->db->insert($breakingquery); 
	  	  	if ($result) {
	  	  		$msg = "<span class='success'>Data Update Successfully.</span>";
				return $msg;
	  	  	}else{
	  	  		$msg = "<span class='upsuccess'>Something Went Wrong!!</span>";
				return $msg;
	  	  	}
	  	  					   
	  	  }
	  }

	  public function getAllNBreaking(){
	  	$ncatShowquery = "SELECT * FROM tbl_breakingnews_local ORDER BY breaking_id DESC";
		$result = $this->db->select($ncatShowquery);
		return $result;
	  }

	  public function changeNbreakingById($id){
	  	$query = "UPDATE tbl_breakingnews_local SET status = !status WHERE breaking_id = '$id'";
		$changstutus = $this->db->update($query);
		return $changstutus;
	  }

	  public function delNBreaktById($id){
	  	$query = "DELETE FROM tbl_breakingnews_local WHERE breaking_id = '$id'";
		$delete_row = $this->db->delete($query);
		if ($delete_row) {
			$msg = "<span class='success'>Data Deleted Successfully.</span>";
				return $msg;
		}else{
			$msg = "<span class='unsuccess'>Something Went Wrong!!</span>";
			return $msg;
		}
	  }

	  public function getbreakingforshow($id){
	  	$showQuery = "SELECT * FROM tbl_breakingnews_local WHERE breaking_id = '$id'";
	  	$result = $this->db->select($showQuery);
	  	return $result;
	  }

	  public function getupBreakingNews($data, $id){
	  	 $title = $this->fm->validation($data['title']);
	  	 $title = mysqli_real_escape_string($this->db->link,$title);

	  	 if (empty($title)) {
	  	 	$msg = "<span class='unsuccess'>Field Must Not Be Empty !!</span>";
			return $msg;
	  	 }else{
	  	 	$upquery ="UPDATE tbl_breakingnews_local
	  	 				SET
	  	 				title = '$title'
	  	 				WHERE breaking_id = '$id'";
	  	 	$result = $this->db->update($upquery);

	  	 	if ($result) {
				$msg = "<span class='success'>Data Update Successfully.</span>";
				return $msg;
		}else{
			$msg = "<span class='unsuccess'>Something Went Wrong!!</span>";
			return $msg;
		}

	   }
	 }

}	  