<?php include '../classes/NewsLocal.php';?>
<?php include '../classes/CategoryLocal.php';?>
<?php include '../classes/SubcategoryLocal.php';?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    if (!isset($_GET['newsid']) || $_GET['newsid'] == NULL) { 
        echo "<script>window.location = 'newsnlist.php';</script>";
    }else{
        $id =  $_GET['newsid'];
    }
?>

<?php
    $newsn = new NewsLocal();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $updateNews = $newsn->updateNewsInfo($_POST, $_FILES, $id);
    }

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update News</h2>

               <p style="text-align: center;">
                    <?php
                 if (isset($updateNews)) {
                     echo $updateNews;
                 }
               ?></p>
                
               <div class="block copyblock">

            <?php
               $newsn = new NewsLocal();
                $getnesbyid = $newsn->getLocalNewsAllById($id);
                if ($getnesbyid) {
                  while ($value = $getnesbyid->fetch_assoc()) {
            ?>      

                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">					

                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="category_id">
                                <?php
                                $cat = new CategoryLocal(); 
                                    $getcat = $cat->getAllNCat();
                                    if ($getcat) {
                                        while ($catres = $getcat->fetch_assoc()) {
                                ?>  
                                    <option 
                                         <?php
                                              if ($value['category_id'] == $catres['category_id']) { ?> 
                                                 selected="selected"
                                         <?php }
                                         ?> 
                                        value="<?php echo $catres['category_id']; ?>"><?php echo $catres['category_title']; ?>
                                  </option>
                                <?php } } ?>    
                                </select>
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Sub Category</label>
                            </td>
                            <td>
                                <select id="select" name="subcategory_id">
                                <?php
                                  $subcat = new SubcategoryLocal(); 
                                    $getscat = $subcat->getAllNsCat();
                                    if ($getscat) {
                                        while ($subcatres = $getscat->fetch_assoc()) {
                                ?>  
                                    <option
                                         <?php
                                              if ($value['subcategory_id'] == $subcatres['subcategory_id']) { ?> 
                                                 selected="selected"
                                         <?php }
                                         ?> 
                                        value="<?php echo $subcatres['subcategory_id']; ?>"><?php echo $subcatres['sub_category_title']; ?>
                                     </option>
                                <?php } } ?>    
                                </select>
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>News Title</label>
                            </td>
                            <td>
                                <input type="text" name="news_title" value="<?php echo $value['news_title']; ?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td><label>News Url</label></td>
                          
                            <td>
                                <input type="text" name="news_url" value="<?php echo $value['news_url']; ?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td><label>SEO Title</label></td>
                            
                            <td>
                                <input type="text" name="news_seo_title" value="<?php echo $value['news_seo_title']; ?>" class="medium">
                            </td>
                        </tr>

                        <tr>
                            <td><label>Image</label></td>
                            <td>
                                <input type="file" name="image">
                            </td>
                        </tr>

                        <tr>
                            <td><label></label></td>
                            <td>
                                <img src="<?php echo $value['image']; ?>" style="width: 200px;height: 80px;">
                            </td>
                        </tr>

                         <tr>
                            <td><label>News Summery</label></td>
                            
                            <td>
                                <textarea class="tinymce" name="news_summery">
                                    <?php echo $value['news_summery']; ?>
                                </textarea>
                            </td>
                        </tr>

                        <tr>
                            <td><label>News Details</label></td>
                            
                            <td>
                                <textarea class="tinymce" name="news_details">
                                     <?php echo $value['news_details']; ?>
                                </textarea>
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

<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<?php include 'inc/footer.php';?>