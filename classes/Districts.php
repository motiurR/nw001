<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class Districts{
		private $db;
		private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	  }

	  public function getAllDistricts(){
	  	$newsShowquery = "SELECT * FROM tbl_districts ORDER BY district_id ASC";
		$result = $this->db->select($newsShowquery);
		return $result;
	  }

}	  