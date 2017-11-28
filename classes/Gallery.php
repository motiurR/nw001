<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class Gallery{
		private $db;
		private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	  }
	  public function addGaller($data, $file){
	  	$title = $this->fm->validation($data['title']);
		$title = mysqli_real_escape_string($this->db->link,$title);

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "../upload/".$unique_image;

	    if ($title =="") {
	    	$msg = "<span class='error'>Field must not be empty!</span>";
			return $msg;
	    }
	    else if ($file_size >1048567) {
		     $msg =  "<span class='error'>Image Size should be less then 1MB!
                         </span>";
                  return $msg;
		    } else if (in_array($file_ext, $permited) === false) {
		     $msg = "<span class='error'>You can upload only:-</span>"
                       .implode(', ', $permited)."</span>";
                   return $msg;
		    }else{
	    	move_uploaded_file($file_temp, $uploaded_image);
	    	$query = "INSERT INTO tbl_gallery(title,image) VALUES('$title','$uploaded_image')";
	    	$inserted_row = $this->db->insert($query);
	    	
			if ($inserted_row) {
				$msg = "<span class='success'>inserted successfully!</span>";
			    return $msg;
				
			}else{
				$msg = "<span class='error'>Something Went Wrong!</span>";
			    return $msg;
			}
	    }
	  }
	  public function getGalleryImage(){
	  	$query = "SELECT * FROM tbl_gallery ORDER BY gallery_id DESC";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  public function GetChangeImage($id){
	  	$query = "UPDATE tbl_gallery SET status = !status WHERE gallery_id = '$id'";
		$changstutus = $this->db->update($query);
		return $changstutus;
	  }
	  public function GetdatByIsGallery($id){
	  	$query = "SELECT * FROM tbl_gallery WHERE gallery_id ='$id'";
	  	$result = $this->db->select($query);
	  	return $result;
	  }
	  public function upgateGallerImage($id, $data, $file){
	  	    $title = $this->fm->validation($data['title']);
		    $title = mysqli_real_escape_string($this->db->link,$title);


		    $permited  = array('jpg', 'jpeg', 'png', 'gif');
		    $file_name = $file['image']['name'];
		    $file_size = $file['image']['size'];
		    $file_temp = $file['image']['tmp_name'];

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "upload/".$unique_image;

		    if ($title =="") {
	    	$msg = "<span class='error'>Field must not be empty!</span>";
			return $msg;
	 	 }else { 
	    	if (!empty($file_name)) {
			     if ($file_size >1048567) {
				     echo "<span class='error'>Image Size should be less then 1MB!
				     </span>";
				    } else if (in_array($file_ext, $permited) === false) {
				     echo "<span class='error'>You can upload only:-"
				     .implode(', ', $permited)."</span>";
				    }else{
			    	move_uploaded_file($file_temp, $uploaded_image);
					    	$query = "UPDATE tbl_gallery
			    			SET
			    			title ='$title',
			    			image 		='$uploaded_image'
			    			WHERE gallery_id ='$id'";

			    	$updated_row = $this->db->update($query);
					if ($updated_row) {
						$msg = "<span class='success'>updated successfully!</span>";
					    return $msg;
						
					}else{
						$msg = "<span class='error'>Product Not updated!</span>";
					    return $msg;
					}
			    }
			    } else{
			    		$query = "UPDATE tbl_gallery
			    			SET
			    			title ='$title'
			    			WHERE gallery_id ='$id'";

			    	$updated_row = $this->db->update($query);
					if ($updated_row) {
						$msg = "<span class='success'>updated successfully!</span>";
					    return $msg;
						
					}else{
						$msg = "<span class='error'>Not updated!</span>";	 

			       }
	           }
	       }
	  }
	  public function delsliderbyid($id){
	  	 $query ="SELECT * FROM tbl_gallery WHERE gallery_id = '$id'";
	   	 $result = $this->db->select($query);
	   	 if ($result) {
	   	 	while ($delimg = $result->fetch_assoc()) {
	   	 		$delLink = $delimg['image']; 
	   	 		unlink($delLink);
	   	 	}
	   	 }
	   	  $delquery = "DELETE FROM tbl_gallery WHERE gallery_id ='$id'";
		  $deldata =$this->db->delete($delquery);
		   if ($deldata) {
	    		$msg = "<span class='success'>Deleted successfully!</span>";
			        return $msg;
	    	}else{
	    		$msg = "<span class='error'>Not Deleted!</span>";
			    	return $msg;
	    	}
	  }

	  public function GetAllGallerImage(){
	  	$query = "SELECT * FROM tbl_gallery WHERE status='1' ORDER BY gallery_id DESC";
	  	$result = $this->db->select($query);
	  	return $result;
	  }

}	  