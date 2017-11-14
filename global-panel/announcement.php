<?php include '../classes/Announcement.php';?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    $brkn = new Announcement();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $upannouncement = $brkn->getUpdateannouncement($_POST);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Announcement</h2>

                <p style="text-align: center;">
                    <?php
                 if (isset($upannouncement)) {
                      echo $upannouncement;
                 }
               ?></p>
                
               <div class="block copyblock"> 

              <?php
                $announcement = $brkn->getannouncement();
                if ($announcement) {
                    while ($result = $announcement->fetch_assoc()) {
              ?>  
                 <form action="" method="POST">
                    <table class="form">	

                        <tr>
                            <td>
                                <textarea type="text" name="text" class="tinymce">
                                    <?php echo $result['text']; ?>
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