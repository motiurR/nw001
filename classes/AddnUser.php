<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class AddnUser{
		private $db;
		private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	  }

	  public function addUserName($data){
		$adminUser = $this->fm->validation($data['adminUser']);
		$adminUser = mysqli_real_escape_string($this->db->link,$adminUser);
		$adminEmail = $this->fm->validation($data['adminEmail']);
		$adminEmail = mysqli_real_escape_string($this->db->link,$adminEmail);
		$adminPassword = $this->fm->validation (md5($data['adminPassword']));
		$adminPassword = mysqli_real_escape_string($this->db->link,$adminPassword);
		$level = $this->fm->validation($data['level']);
		$level = mysqli_real_escape_string($this->db->link,$level);

		if (empty($adminUser) || empty($adminEmail) || empty($adminPassword)) {
			$msg = "<span class='unsuccess'>Field Must Not Be Empty.</span>";
			return $msg;
		}else{
	        $mailquery = "SELECT * FROM tbl_admin WHERE adminEmail = '$adminEmail' LIMIT 1";
	        $mailcheck = $this->db->select($mailquery );
          if ($mailcheck != false) {
             $msg = "<span class='unsuccess'>Mail Already Exist!!</span>";
              return $msg; 
          }
		  else{
			$query = "INSERT INTO tbl_admin(adminUser,adminEmail,adminPassword,level) 
			VALUES('$adminUser','$adminEmail','$adminPassword','$level')";
			$result = $this->db->insert($query);
				
			if ($result) {
				$msg = "<span class='success'>Data Inserted Successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='unsuccess'>Something went Wrong!!</span>";
				return $msg;
			}
		}
	 }
	 }

		 public function getAllNuser(){
		 	$query = "SELECT * FROM tbl_admin ORDER BY admin_id DESC";
		 	$result = $this->db->select($query);
		 	return $result;
		 }

		 public function getNuserById($vid){
		 	$query = "SELECT * FROM tbl_admin WHERE admin_id = '$vid'";
		 	$result = $this->db->select($query);
		 	return $result;
		 }

		 public function delNuserById($id){
		 	$query ="DELETE FROM tbl_admin WHERE admin_id = '$id' ";
		 	$delete_row = $this->db->delete($query);
		 	   if ($delete_row) {
			$msg = "<span class='success'>DataDeleted Successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='unsuccess'>SomeThing Went Wrong!!</span>";
				return $msg;
			}
		 }

		 public function getusertById($id){
		 	$query = "SELECT * FROM tbl_admin WHERE admin_id = '$id'";
		 	$result = $this->db->select($query);
		 	return $result;
		 }

		 public function editNUserById($data, $id){
			$adminUser = $this->fm->validation($data['adminUser']);
			$adminUser = mysqli_real_escape_string($this->db->link,$adminUser);
			$adminEmail = $this->fm->validation($data['adminEmail']);
			$adminEmail = $this->fm->validation($data['adminEmail']);
			$level = $this->fm->validation($data['level']);
			$level = mysqli_real_escape_string($this->db->link,$level);

			if (empty($adminUser) || empty($adminEmail)) {
			$msg = "<span class='unsuccess'>Field Must Not Be Empty.</span>";
			return $msg;
		}else{
          		$updatequery = "UPDATE tbl_admin 
							SET 
							adminUser 		  = '$adminUser',
							adminEmail		  = '$adminEmail',
							level 			  = '$level'
							WHERE admin_id = '$id'";
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

}