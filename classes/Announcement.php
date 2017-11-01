<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class Announcement{
		private $db;
		private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	  }

	  public function getannouncement(){
	  	$query = "SELECT * FROM tbl_announcement WHERE announcement_id = '1'";
	  	 $result = $this->db->select($query);
	  	 return $result;
	  }

	  	 public function getUpdateannouncement($data){
	  	$text = $this->fm->validation($data['text']);
	  	$text = mysqli_real_escape_string($this->db->link,$text);
	  	
	  	  	$announcementQuery = "UPDATE tbl_announcement
	  	  					  SET
	  	  					  text   = '$text'
	  	  					  WHERE announcement_id = '1'";
	  	  	$update_row = $this->db->update($announcementQuery);
	  	  	if ($update_row) {
	  	  		$msg = "<span class='success'>Data Update Successfully.</span>";
				return $msg;
	  	  	}else{
	  	  		$msg = "<span class='upsuccess'>Something Went Wrong!!</span>";
				return $msg;
	  	  	}
	  	  		}			   

}	  