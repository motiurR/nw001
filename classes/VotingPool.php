<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class VotingPool{
		private $db;
		private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	  }

	  public function AgelAllPoolOption(){
		$newsShowquery = "SELECT tbl_pool.*,tbl_poll_options.*
					           FROM tbl_pool
					           INNER JOIN tbl_poll_options 
					           ON tbl_pool.pool_id = tbl_poll_options.pool_id
					           WHERE tbl_pool.pool_id = tbl_poll_options.pool_id";
		$result = $this->db->select($newsShowquery);
		return $result;
	}

}	  