<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Gallery.php';?>
<?php
    if (!isset($_GET['eimgid']) || $_GET['eimgid'] == NULL) { 
        echo "<script>window.location = 'gallerylist.php';</script>";
    }else{
        $id =  $_GET['eimgid']; 
    }
?>

<?php
    $glr = new Gallery();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $updateGallery = $glr->upgateGallerImage($id,$_POST, $_FILES);
       
    }

?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Slider</h2>
        <?php
            if (isset($updateGallery)) {
                echo $updateGallery;
            }
        ?>  
        
         <form action="" method="post" enctype="multipart/form-data">
         <?php
               $getForShow = $glr->GetdatByIsGallery($id);
               if ($getForShow) {
                $i = 0;
                while ($result =$getForShow->fetch_assoc()) {
                    $i++;
            ?>
            <table class="form">     
                <tr>
                    <td>
                        <label>Title</label>
                    </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $result['title']?>" class="medium" />
                    </td>
                </tr>           
    
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="<?php echo $result['image']; ?>" height="50px" width="80ps"><br>
                        <input type="file" name="image" />
                    </td>
                </tr>
               
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
         <?php } } ?> 
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>