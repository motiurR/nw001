<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Session.php');
    include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>


<?php
class AdminLogin{
	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function cheachAdminLogin($data){
		$adminEmail = $this->fm->validation($data['adminEmail']);
		$adminEmail = mysqli_real_escape_string($this->db->link,$adminEmail); 

		$adminPassword = $this->fm->validation($data['adminPassword']);
		$adminPassword = mysqli_real_escape_string($this->db->link, md5($adminPassword)); 

		if (empty($adminEmail) || empty($adminPassword)) {
			$loginmsg = "UserName Or Password Is Empty!!!";
			return $loginmsg;
		}else{
			$query = "SELECT * FROM tbl_admin WHERE adminEmail='$adminEmail' AND adminPassword='$adminPassword'";
			$result = $this->db->select($query); /*select from database class by bd obj*/
			if ($result != false) {
				Session::init();
				$value = $result->fetch_assoc();
				Session::set("adminlogin",true); /*adminlogin from session*/
				Session::set("admin_id",$value['admin_id']);
				Session::set("adminUser",$value['adminUser']);
				Session::set("level",$value['level']);
				header("Location:index.php"); /*redirect*/
			}else{
				$loginmsg = "UserName Or Password Not Match!!!";
			return $loginmsg;
			}

		}

	}




}
?>