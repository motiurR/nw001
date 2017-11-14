<?php include '../classes/Columnistnews.php';?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    if (!isset($_GET['colprf']) || $_GET['colprf'] == NULL) { 
        echo "<script>window.location = 'newsnlist.php';</script>";
    }else{
        $id =  $_GET['colprf'];
    }
?>

<?php
    $cnewsn = new Columnistnews();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $updateNews = $cnewsn->updateNewsInfo($_POST, $_FILES, $id);
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
               $cnewsn = new Columnistnews();
                $getnesbyid = $cnewsn->getsubcatById($id);
                if ($getnesbyid) {
                  while ($value = $getnesbyid->fetch_assoc()) {
            ?>      

                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">					

                         <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="author" value="<?php echo $value['author']; ?>" class="medium" />
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