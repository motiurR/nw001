<?php include '../classes/Cartoon.php';?>
<?php include '../classes/CategoryNatioal.php';?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php
    $cartn = new Cartoon();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $insertCartoonNews = $cartn->addCartoonNnews($_POST, $_FILES);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Cartoon News</h2>

                <p style="text-align: center;">
                    <?php
                 if (isset($insertCartoonNews)) {
                     echo $insertCartoonNews;
                 }
               ?></p>
                
               <div class="block copyblock"> 

                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">					

                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select name="category_id">
                                <?php
                                $cat = new CategoryNatioal(); 
                                    $getcat = $cat->getAllNCatforCartoon();
                                    if ($getcat) {
                                        while ($catres = $getcat->fetch_assoc()) {
                                ?>  
                                    <option  value="<?php echo $catres['category_id']; ?>"><?php echo $catres['category_title']; ?></option>
                                <?php } } ?>    
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><label>Top News</label></td>
                            
                            <td>
                                 <select name="top_news">
                                    <option value="0">General</option>
                                    <option value="1">Top</option>
                                 </select>
                            </td>
                        </tr>


                         <tr>
                            <td>
                                <label>News Title</label>
                            </td>
                            <td>
                                <input type="text" name="news_title" placeholder="Enter News title" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td><label>News Url</label></td>
                          
                            <td>
                                <input type="text" name="news_url" placeholder="Enter news url" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td><label>Image</label></td>
                            <td>
                                <input type="file" name="image">
                            </td>
                        </tr>

                         <tr>
                            <td><label>News Summery</label></td>
                            
                            <td>
                                <textarea class="tinymce" name="news_summery"></textarea>
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" value="<?php echo Session::get('adminUser')?>" class="medium" />
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
                                <label>Date</label>
                            </td>
                            <td>
                                <input type="date" name="date"  class="medium" />
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