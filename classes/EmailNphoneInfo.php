<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class EmailNphoneInfo{
		private $db;
		private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	  }

	  public function getAllEmailNphoneInfo(){
	  	$query = "SELECT * FROM tbl_emailphone WHERE emailphone_id = '1'";
	  	 $result = $this->db->select($query);
	  	 return $result;
	  }

	  public function getemailphoneInfo($data){
	  	  $newsroomemail   = $this->fm->validation($data['newsroomemail']);
	  	  $newsroomemail   = mysqli_real_escape_string($this->db->link,$newsroomemail);
	  	  $newsroommobile    = $this->fm->validation($data['newsroommobile']);
	  	  $newsroommobile    = mysqli_real_escape_string($this->db->link,$newsroommobile);
	  	  $advemail    = $this->fm->validation($data['advemail']);
	  	  $advemail    = mysqli_real_escape_string($this->db->link,$advemail);
	  	  $advmobile    = $this->fm->validation($data['advmobile']);
	  	  $advmobile    = mysqli_real_escape_string($this->db->link,$advmobile);

	  	  if (empty($newsroomemail) || empty($newsroommobile) || empty($advemail) || empty($advmobile)) {
	  	  	$msg = "<span class='unsuccess'>Field Must Not Be Empty.</span>";
			return $msg;
	  	  }else{
	  	  	$editorupquery = "UPDATE tbl_emailphone
	  	  					  SET
	  	  					  newsroomemail   = '$newsroomemail',
	  	  					  newsroommobile    = '$newsroommobile',
	  	  					  advemail= '$advemail',
	  	  					  advmobile= '$advmobile'
	  	  					  WHERE emailphone_id = '1'";
	  	  	$update_row = $this->db->update($editorupquery);
	  	  	if ($update_row) {
	  	  		$msg = "<span class='success'>Data Update Successfully.</span>";
				return $msg;
	  	  	}else{
	  	  		$msg = "<span class='upsuccess'>Something Went Wrong!!</span>";
				return $msg;
	  	  	}
	  	  					   
	  	  }
	  }

}	  