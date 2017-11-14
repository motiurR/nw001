<?php include '../lib/Database.php';?>
<?php
$db = new Database();
if(!empty($_POST["subcatid"])) {
    $query ="SELECT * FROM tbl_subcategory WHERE category_id = '" . $_POST["subcatid"] . "'";
    $results = $db->select($query);
?>
    <option value="">Select SubCategory</option>
<?php
    foreach($results as $subcat) {
?>
    <option value="<?php echo $subcat["subcategory_id"]; ?>"><?php echo $subcat["sub_category_title"]; ?></option>
<?php
    }
}
?>