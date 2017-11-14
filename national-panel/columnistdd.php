<?php include '../classes/Columnistnews.php';?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<?php
    $column = new Columnistnews();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $addcolumnist = $column->addColmunistprofile($_POST, $_FILES);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Columnist</h2>

                <p style="text-align: center;">
                    <?php
                 if (isset($addcolumnist)) {
                     echo $addcolumnist;
                 }
               ?></p>
                
               <div class="block copyblock"> 

                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">					

                       
                         <tr>
                            <td>
                                <label>User name</label>
                            </td>
                            <td>
                                <input type="text" name="author" placeholder="Enter User Name" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td><label>Image</label></td>
                            <td>
                                <input type="file" name="image">
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