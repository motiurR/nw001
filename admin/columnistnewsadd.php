<?php include '../classes/Columnistnews.php';?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php
    $colN = new Columnistnews();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $insertColNews = $colN->getdataColnews($_POST, $_FILES);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Columnist News</h2>

                <p style="text-align: center;">
                    <?php
                 if (isset($insertColNews)) {
                     echo $insertColNews;
                 }
               ?></p>
                
               <div class="block copyblock"> 

                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">					

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
                            <td><label>seo Title</label></td>
                            
                            <td>
                                <input type="text" name="news_seo_title" placeholder="Seo Title" class="medium">
                            </td>
                        </tr>

                         <tr>
                            <td><label>News Summery</label></td>
                            
                            <td>
                                <textarea class="tinymce" name="news_summery"></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td><label>News Details</label></td>
                            
                            <td>
                                <textarea class="tinymce" name="news_details"></textarea>
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Author Name</label>
                            </td>
                            <td>
                                <select name="author">
                                     <option value="">select Name</option>
                                <?php
                                $colname = new Columnistnews(); 
                                    $getcolname = $colname->getAllColumnistName();
                                    if ($getcolname) {
                                        while ($colName = $getcolname->fetch_assoc()) {
                                ?>  
                                    <option value="<?php echo $colName['columnistProfile_id']; ?>"><?php echo $colName['author']; ?>          
                                    </option>

                                <?php } } ?>    
                                </select>
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