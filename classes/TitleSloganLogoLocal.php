<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class TitleSloganLogoLocal{
		private $db;
		private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	  }

	   public function getDataById(){
	  	$query = "SELECT * FROM  tbl_logo_local WHERE logo_id='1'";
	  	$data = $this->db->select($query);
	  	return $data;
	  }

	   public function getupdatelogo($file){
		$permited  = array('png');
	    $file_name = $file['logo']['name'];
	    $file_size = $file['logo']['size'];
	    $file_temp = $file['logo']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $same_image = 'logoLocal'.'.'.$file_ext;
	    $uploaded_image = "../upload/".$same_image;

	    	if (!empty($file_name)) {
			     if ($file_size >1048567) {
				     echo "<span class='error'>Image Size should be less then 1MB!
				     </span>";
				    } else if (in_array($file_ext, $permited) === false) {
				     echo "<span class='error'>You can upload only:-"
				     .implode(', ', $permited)."</span>";
				    }else{
			    	move_uploaded_file($file_temp, $uploaded_image);
					    	$query = "UPDATE tbl_logo_local
			    			SET
			    			logo 		='$uploaded_image'
			    			WHERE logo_id ='1'";

			    	$updated_row = $this->db->update($query);
					if ($updated_row) {
						$msg = "<span class='success'>updated successfully!</span>";
					    return $msg;
						
					}else{
						$msg = "<span class='error'>Something Went Wrng!!!</span>";
					    return $msg;
					}
			    }
			    } 
	       }

	       public function getLogiIcon(){
	       	 $query = "SELECT * FROM tbl_logo_local";
			 $data = $this->db->select($query);
			 return $data;
	       }
	  

}