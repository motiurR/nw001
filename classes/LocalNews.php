<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class LocalNews{
		private $db;
		private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	  }

	  public function getAllLocalNews(){
	  	$newsShowquery = "SELECT * FROM local_newses_tbl ORDER BY news_id DESC";
		$result = $this->db->select($newsShowquery);
		return $result;
	  }
	  /*for update*/
	  public function getLocalNewsAllById($id){
	  	$ncatShowquery = "SELECT * FROM local_newses_tbl WHERE news_id = '$id'";
		$result = $this->db->select($ncatShowquery);
		return $result;
	  }

	     public function delnNewsById($id){

		$query ="SELECT * FROM tbl_newses WHERE news_id = '$id'";
	   	 $getdata = $this->db->select($query);
	   	 if ($getdata) {
	   	 	while ($delimg = $getdata->fetch_assoc()) {
	   	 		$delLink = $delimg['image'];
	   	 		unlink($delLink);
	   	 	}
	   	 }
	   	 $delquery = "DELETE FROM local_newses_tbl WHERE news_id ='$id'";
		  $deldata =$this->db->delete($delquery);
		   if ($deldata) {
	    		$msg = "<span class='success'>Deleted successfully!</span>";
			        return $msg;
	    	}else{
	    		$msg = "<span class='error'>SomeThing went Wrong!</span>";
			    	return $msg;
	    	}
	  }
	

}