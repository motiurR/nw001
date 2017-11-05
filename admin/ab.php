<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php');
?>

<?php
    $db = new Database();
    if (!empty($_POST["category_id"])) {
        $cid = $_POST["category_id"];
        $ncatShowquery = "SELECT * FROM tbl_subcategory WHERE category_id = $category_id";
        $result = $db->select($ncatShowquery);
        foreach ($result as $res) { ?>

            <option value="<?php echo $res['subcategory_id'];?>">
                <?php echo $res['sub_category_title'];?>
            </option>

        <?php } }?>
     
?>