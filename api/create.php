<?php
require '../lib/Database.php';
$db = new Database();

		/*$permited  = array('jpg', 'jpeg', 'png', 'gif','doc','pdf');
	    $file_name = $file['filedoc']['name'];
	    $file_size = $file['filedoc']['size'];
	    $file_temp = $file['filedoc']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "../upload/".$unique_image;
	    else if (in_array($file_ext, $permited) === false) {
		   $msg = "<span class='error'>You can upload only:-</span>"
              .implode(', ', $permited)."</span>";
              return $msg;
		    }
		move_uploaded_file($file_temp, $uploaded_image); */  

	$post = $_POST;
	$sql = "INSERT INTO tbl_received_write (name,email,body,filedoc) 
   VALUES ('".$post['name']."','".$post['email']."','".$post['body']."','".$post['filedoc']."')";
    $result = $db->insert($sql);

  header("Location:../index.php");
?>