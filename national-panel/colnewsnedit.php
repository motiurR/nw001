<?php include '../classes/Columnistnews.php';?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    if (!isset($_GET['colnewsid']) || $_GET['colnewsid'] == NULL) { 
        echo "<script>window.location = 'columnlistnewslist.php';</script>";
    }else{
        $id =  $_GET['colnewsid'];
    }
?>

<?php
    $colN = new Columnistnews();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $updateColNews = $colN->updateColNewsInfo($_POST, $_FILES, $id);
    }

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Columnist News</h2>

               <p style="text-align: center;">
                    <?php
                 if (isset($updateColNews)) {
                     echo $updateColNews;
                 }
               ?></p>
                
               <div class="block copyblock">

            <?php
                $getcolNbyid = $colN->getcolNewsById($id);
                if ($getcolNbyid) {
                  while ($value = $getcolNbyid->fetch_assoc()) {
            ?>      

                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">					

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
                            <td><label>Seo Title</label></td>
                            
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