<?php include '../classes/CategoryNatioal.php';?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    if (!isset($_GET['ncatid']) || $_GET['ncatid'] == NULL) { 
        echo "<script>window.location = 'ncatlist.php';</script>";
    }else{
        $id =  $_GET['ncatid'];
    }
?>

<?php
    $catN = new CategoryNatioal();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $updateNationlCat = $catN->UpdateNCatTitle($_POST, $id);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>

                <p style="text-align: center;">
                    <?php
                 if (isset($updateNationlCat)) {
                     echo $updateNationlCat;
                 }
               ?></p>
                
               <div class="block copyblock"> 

                 <form action="" method="POST">
            <?php
                $showNcat = $catN->getNcatforupdate($id);
                if ($showNcat) {
                    while ($result = $showNcat->fetch_assoc()) {
            ?>        
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="category_title" value="<?php echo $result['category_title']; ?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td><label>Url</label></td>
                          
                            <td>
                                <input type="text" name="category_url" value="<?php echo $result['category_url']; ?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td><label>SEO Title</label></td>
                            
                            <td>
                                <input type="text" name="category_seo_title" value="<?php echo $result['category_seo_title']; ?>">
                            </td>
                        </tr>

						<tr> 
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


<?php include 'inc/footer.php';?>