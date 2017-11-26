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
		    }*/
       $name = $_POST['name'];
       $email = $_POST['email'];
       $body = $_POST['body'];
      

       $type = explode('.', $_FILES['filedoc']['name']);
       $type = $type[count($type)-1];
       $url = "../upload/".uniqid(rand()).'.'.$type;

        
       
           if(in_array($type, array('gif', 'jpg', 'jpeg', 'png'))) {
        if(is_uploaded_file($_FILES['filedoc']['tmp_name'])) {
            if(move_uploaded_file($_FILES['filedoc']['tmp_name'], $url)) {
 
                // insert into database
                $sql = "INSERT INTO tbl_received_write (name, email,body,filedoc) VALUES ('$name','$email','$body', '$url')";
                $sql = $db->insert($sql);
                 header("Location:../index.php");
 
                if($sql){
                    $valid['success'] = true;
                    $valid['messages'] = "Successfully Uploaded";
                } 
                else {
                    $valid['success'] = false;
                    $valid['messages'] = "Error while uploading";
                }
 
                exit();
 
            }
            else {
                $valid['success'] = false;
                $valid['messages'] = "Error while uploading";
            }
        }

    }
 
 
 
?>

<!-- echo "<pre>";
	    print_r($file_name);
	    exit(); -->