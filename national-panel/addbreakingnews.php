<?php include '../classes/BreakingNewsLocal.php';?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    $brkn = new BreakingNewsLocal();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $insertbreaking = $brkn->getBreakingNews($_POST);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Insert Breaking News</h2>

                <p style="text-align: center;">
                    <?php
                 if (isset($insertbreaking)) {
                      echo $insertbreaking;
                 }
               ?></p>
                
               <div class="block copyblock"> 

                 <form action="" method="POST">
                    <table class="form">	

                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <textarea type="text" name="title" class="tinymce">
                                </textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Status</label>
                            </td>
                            
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