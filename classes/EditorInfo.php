<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class EditorInfo{
		private $db;
		private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	  }

	  public function getAllEditorInfo(){
	  	$query = "SELECT * FROM tbl_editor WHERE editor_id = '1'";
	  	 $result = $this->db->select($query);
	  	 return $result;
	  }

	  public function getEdiroeInfo($data){
	  	  $editor_name   = $this->fm->validation($data['editor_name']);
	  	  $editor_name   = mysqli_real_escape_string($this->db->link,$editor_name);
	  	  $editor_email    = $this->fm->validation($data['editor_email']);
	  	  $editor_email    = mysqli_real_escape_string($this->db->link,$editor_email);
	  	  $editor_mobile    = $this->fm->validation($data['editor_mobile']);
	  	  $editor_mobile    = mysqli_real_escape_string($this->db->link,$editor_mobile);
	  	  $editor_address    = $this->fm->validation($data['editor_address']);
	  	  $editor_address    = mysqli_real_escape_string($this->db->link,$editor_address);

	  	  if (empty($editor_name) || empty($editor_email) || empty($editor_mobile) || empty($editor_address)) {
	  	  	$msg = "<span class='unsuccess'>Field Must Not Be Empty.</span>";
			return $msg;
	  	  }else{
	  	  	$editorupquery = "UPDATE tbl_editor
	  	  					  SET
	  	  					  editor_name   = '$editor_name',
	  	  					  editor_email    = '$editor_email',
	  	  					  editor_mobile= '$editor_mobile',
	  	  					  editor_address= '$editor_address'
	  	  					  WHERE editor_id = '1'";
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
	  public function geteditorinfo(){
	  	$query = "SELECT * FROM tbl_editor";
	  	 $result = $this->db->select($query);
	  	 return $result;
	  }

}	  