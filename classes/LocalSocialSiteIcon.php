<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class LocalSocialSiteIcon{
		private $db;
		private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	  }

	  public function getsocialdata(){
	  	$query = "SELECT * FROM tbl_social_local WHERE social_id = '1'";
	  	 $result = $this->db->select($query);
	  	 return $result;
	  }

	  public function getsocialicon($data){
	  	  $facebook   = $this->fm->validation($data['facebook']);
	  	  $facebook   = mysqli_real_escape_string($this->db->link,$facebook);
	  	  $twitter    = $this->fm->validation($data['twitter']);
	  	  $twitter    = mysqli_real_escape_string($this->db->link,$twitter);
	  	  $google_plus    = $this->fm->validation($data['google_plus']);
	  	  $google_plus    = mysqli_real_escape_string($this->db->link,$google_plus);

	  	  if (empty($facebook) || empty($twitter) || empty($google_plus)) {
	  	  	$msg = "<span class='unsuccess'>Field Must Not Be Empty.</span>";
			return $msg;
	  	  }else{
	  	  	$socialupquery = "UPDATE tbl_social_local
	  	  					  SET
	  	  					  facebook   = '$facebook',
	  	  					  twitter    = '$twitter',
	  	  					  google_plus= '$google_plus'
	  	  					  WHERE social_id = '1'";
	  	  	$update_row = $this->db->update($socialupquery);
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