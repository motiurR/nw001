<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class BreakingNews{
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
	  	  	$breakingquery = "INSERT INTO tbl_breakingnews(title,status) VALUES('$title','$status') ";
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
	  	$ncatShowquery = "SELECT * FROM tbl_breakingnews ORDER BY breaking_id DESC";
		$result = $this->db->select($ncatShowquery);
		return $result;
	  }

}	  