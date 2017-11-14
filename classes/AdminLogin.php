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

	public function updateAdminPassword($data, $aid){
		$adminPassword = $this->fm->validation ($data['adminPassword']);
		$adminPassword = mysqli_real_escape_string($this->db->link, md5($adminPassword));

			$upquery = "UPDATE tbl_admin 
							SET 
							adminPassword = '$adminPassword'
							WHERE admin_id = '$aid'";
			$update_row = $this->db->update($upquery); 

			if ($update_row ) {
				$msg = "<span class='success'>Update Successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='unsuccess'>Something Went Wrong</span>";
				return $msg;
			}
		}

		public function getResetPass($data){
		$email = $this->fm->validation($data['email']);
		$email = mysqli_real_escape_string($this->db->link,$email);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "<span style='color:red;font-size:18px;'>Invalid Email Address</span>";
		}else{
			$query = "SELECT * FROM tbl_admin WHERE adminEmail='$email'";
			$result = $this->db->select($query);
			if ($result != false) {
				while ($value =$result->fetch_assoc()) {
					$adminId = $value['admin_id'];
					$adminUser = $value['adminUser'];
				   }
				   $text = substr($email, 0, 3);
				   $rand = rand(10000,99999);
				   $newpass = "$text$rand";
				   $password = md5($newpass);
				   $updatequery = "UPDATE tbl_admin 
							SET 
							adminPassword = '$password'
							WHERE admin_id = '$adminId'";
					$update_row = $this->db->update($updatequery);
						$to = "$email";
						$from = "newsportal@gmail.com";
						$headers = "From: $from\n";
						$headers .= 'MIME-Version: 1.0';
						$headers .= 'Content-type: text/html; charset=iso-8859-1';
						$subject = "Your Password";
						$message = "Your User Name is ".$adminUser." And Password Is ".$newpass." please try to login the new password!!"; 

					$sendmail =mail($to, $subject, $message, $headers);
					if ($sendmail) {
						echo "<span style='color:green;font-size:18px;'>mail already send. check mail please</span>";
					 } else{
					 	echo "<span style='color:red;font-size:18px;'>something problem</span>";
					 }

				}else{
					echo "<span style='color:red;font-size:18px;'>Email Not Exist</span>";
				}
			}
		}

}
?>