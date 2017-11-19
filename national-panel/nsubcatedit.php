<?php include '../classes/CategoryLocal.php';?>
<?php include '../classes/SubcategoryLocal.php';?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    if (!isset($_GET['nscatid']) || $_GET['nscatid'] == NULL) { 
        echo "<script>window.location = 'nsubcatlist.php';</script>";
    }else{
        $id =  $_GET['nscatid'];
    }
?>

<?php
    $scatN = new SubcategoryLocal();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $editNationSubCat = $scatN->editNSubCatTitle($_POST, $id);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update New Sub-Category</h2>

                <p style="text-align: center;">
                    <?php
                 if (isset($editNationSubCat)) {
                     echo $editNationSubCat;
                 }
               ?></p>
                
               <div class="block copyblock"> 
            <?php
                $getscat = $scatN->getsubcatById($id);
                if ($getscat) {
                    while ($value = $getscat->fetch_assoc()) {
            ?> 
                 <form action="" method="POST">
                    <table class="form">

                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="category_id">

                                 <?php
                                    $catg = new CategoryLocal();
                                    $getcat = $catg->getAllCat();
                                    if ($getcat) {
                                    while ($result = $getcat->fetch_assoc()) {
                                  ?> 
                                    <option 
                                     <?php
                                          if ($value['category_id'] == $result['category_id']) { ?> 
                                             selected="selected"
                                     <?php } ?> 
                                     value="<?php echo $result['category_id']; ?>"><?php echo $result['category_title']; ?>
                                    </option>

                                  <?php } } ?>
                                    
                                </select>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="sub_category_title" value="<?php echo $value['sub_category_title']; ?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td><label>Url</label></td>
                          
                            <td>
                                <input type="text" name="sub_category_url" value="<?php echo $value['sub_category_url']; ?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td><label>SEO Title</label></td>
                            
                            <td>
                                <input type="text" name="subcategory_seo_title" value="<?php echo $value['subcategory_seo_title']; ?>">
                            </td>
                        </tr>

						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>

                    </table>
                    </form>
            <?php } } ?>
                    
                </div>
            </div>
        </div>


<?php include 'inc/footer.php';?>