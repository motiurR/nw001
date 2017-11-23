<?php include '../lib/Database.php';?>

<?php
     $db = new Database();

     /*if(!empty($_POST["page"])) {
     	$name = $_POST['name'];
	  	$email = $_POST['email'];
	  	$body = $_POST['body'];
	  	$filedoc = $_POST['filedoc'];
      $query ="INSERT INTO tbl_received_write (name,email,body,filedoc)VALUES('$name','$email','$body','$filedoc')";
     $results = $db->select($query);
     if ($results->execute()) {
	  		echo "success";
	  	}else{
	  		echo "Unsuccess";
	  	}
*/

	 $page = isset($_GET['p'])?$_GET['p']:'';
	 echo "<pre>";
	 print_r($page);
	 exit();
	  if ($page == 'add') {
	  	$name = $_POST['name'];
	  	$email = $_POST['email'];
	  	$body = $_POST['body'];
	  	$filedoc = $_POST['filedoc'];
	  	$query =$db->prepare("insert into tbl_received_write values('',?,?,?,?)");
	  	$query = bindParam(1,$name); 
	  	$query = bindParam(2,$email); 
	  	$query = bindParam(3,$body); 
	  	$query = bindParam(4,$filedoc); 
	  	if ($query->execute()) {
	  		echo "success";
	  	}else{
	  		echo "Unsuccess";
	  	}
	  }
?>