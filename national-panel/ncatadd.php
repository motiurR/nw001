<?php include '../classes/categoryLocal.php';?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    $catN = new categoryLocal();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $insertNationCat = $catN->addNCatTitle($_POST);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>

                <p style="text-align: center;">
                    <?php
                 if (isset($insertNationCat)) {
                     echo $insertNationCat;
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
                                <input type="text" name="category_title" placeholder="Enter title" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td><label>Url</label></td>
                          
                            <td>
                                <input type="text" name="category_url" placeholder="Enter url" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td><label>SEO Title</label></td>
                            
                            <td>
                                <input type="text" name="category_seo_title" placeholder="Seo Title">
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


<?php include 'inc/footer.php';?>