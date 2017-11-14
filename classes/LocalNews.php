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
	

}