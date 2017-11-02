<<?php include '../lib/Database.php';?>

<?php
$db = new Database();
if(!empty($_POST["category_id"])) {
	$query ="SELECT * FROM tbl_subcategory WHERE category_id = '" . $_POST["categoryid"] . "'";
	$results = $db->select($query);
	if($results > 0){
        echo '<option value="">Select state</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['subcategory_id'].'">'.$row['sub_category_title'].'</option>';
        }
    }else{
        echo '<option value="">State not available</option>';
    }
}
?>