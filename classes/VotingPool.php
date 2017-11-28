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

	  public function addQuestionAns($data){
		$question = $this->fm->validation($data['question']);
		$question = mysqli_real_escape_string($this->db->link,$question);
		$ans1 = $this->fm->validation($data['ans1']);
		$ans1 = mysqli_real_escape_string($this->db->link,$ans1);
		$ans2 = $this->fm->validation($data['ans2']);
		$ans2 = mysqli_real_escape_string($this->db->link,$ans2);
		$ans3 = $this->fm->validation($data['ans3']);
		$ans3 = mysqli_real_escape_string($this->db->link,$ans3);
		$status = $this->fm->validation($data['status']);
		$status = mysqli_real_escape_string($this->db->link,$status);

		if ($question =="" || $ans1 ==""|| $ans2 =="") {
	    	$msg = "<span class='error'>Field must not be empty!</span>";
			return $msg;
	    }else{
	    	$query = "INSERT INTO tbl_vooting_pool(question,ans1,ans2,ans3, status) VALUES('$question','$ans1','$ans2','$ans3','$status')";
	    	$inserted_row = $this->db->insert($query);
	      }if ($inserted_row) {
				$msg = "<span class='success'>inserted successfully!</span>";
			    return $msg;
				
			}else{
				$msg = "<span class='error'>Something Went Wrong!</span>";
			    return $msg;
			}
		}


		public function getQuestionAns(){
			 $subJquery = "SELECT * FROM  tbl_vooting_pool WHERE status='1' ORDER BY id DESC LIMIT 1";
		      $result = $this->db->select($subJquery);
		      return $result;
		}
		
		public function getAllVotQnAns(){
			$query = "SELECT * FROM  tbl_vooting_pool ORDER BY id DESC";
		      $result = $this->db->select($query);
		      return $result;
		}

		public function changeVotById($id){
			$query = "UPDATE tbl_vooting_pool SET status = !status WHERE id = '$id'";
			$changstutus = $this->db->update($query);
			return $changstutus;
		}
		public function getquestionansById($id){
			$query = "SELECT * FROM  tbl_vooting_pool WHERE id = '$id'";
		      $result = $this->db->select($query);
		      return $result;
		}

		public function updateQuestionData($data, $id){
			$question = $this->fm->validation($data['question']);
			$question = mysqli_real_escape_string($this->db->link,$question);
			$ans1 = $this->fm->validation($data['ans1']);
			$ans1 = mysqli_real_escape_string($this->db->link,$ans1);
			$ans2 = $this->fm->validation($data['ans2']);
			$ans2 = mysqli_real_escape_string($this->db->link,$ans2);
			$ans3 = $this->fm->validation($data['ans3']);
			$ans3 = mysqli_real_escape_string($this->db->link,$ans3);

			$updatequery = "UPDATE tbl_vooting_pool 
							SET 
							question = '$question',
							ans1 = '$ans1',
							ans2 = '$ans2',
							ans3 = '$ans3'
							WHERE id = '$id'";
			$update_row = $this->db->update($updatequery);
			if ($update_row) {
				$msg = "<span class='success'>Update Successfully.</span>";
				return $msg;
			}else{
				$msg = "<span class='unsuccess'>Something Went Wrong</span>";
				return $msg;
			} 
		}

		public function delVotById($id){
			$query = "DELETE FROM  tbl_vooting_pool WHERE id = '$id'";
		      $result = $this->db->delete($query);
		      return $result;
		}

	  
 }