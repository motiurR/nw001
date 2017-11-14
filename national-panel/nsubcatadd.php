<?php include '../classes/CategoryNatioal.php';?>
<?php include '../classes/SubCategoryNational.php';?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    $scatN = new SubCategoryNational();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $insertNationSubCat = $scatN->addNSubCatTitle($_POST);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Sub-Category</h2>

                <p style="text-align: center;">
                    <?php
                 if (isset($insertNationSubCat)) {
                     echo $insertNationSubCat;
                 }
               ?></p>
                
               <div class="block copyblock"> 

                 <form action="" method="POST">
                    <table class="form">

                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select name="category_id">

                                 <?php
                                    $catg = new CategoryNatioal();
                                    $getcat = $catg->getAllCat();
                                    if ($getcat) {
                                    while ($result = $getcat->fetch_assoc()) {
                                  ?> 
                                    <option value="<?php echo $result['category_id']; ?>"><?php echo $result['category_title']; ?></option>
                                  <?php } } ?>
                                    
                                </select>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="sub_category_title" placeholder="Enter title" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td><label>Url</label></td>
                          
                            <td>
                                <input type="text" name="sub_category_url" placeholder="Enter url" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td><label>SEO Title</label></td>
                            
                            <td>
                                <input type="text" name="subcategory_seo_title" placeholder="Seo Title">
                            </td>
                        </tr>

                         <tr>
                            <td><label>Status</label></td>
                            
                            <td>
                                 <select name="status">
                                <option value="1">active</option>
                                <option value="0">in-active</option>
                            </select>
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>

                    </table>
                    </form>
                </div>
            </div>
        </div>


<?php include 'inc/footer.php';?>