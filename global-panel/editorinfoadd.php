<?php include '../classes/EditorInfo.php';?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    $editor = new EditorInfo();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $editorinfo = $editor->getEdiroeInfo($_POST);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Editor Information</h2>

                <p style="text-align: center;">
                    <?php
                 if (isset($editorinfo)) {
                      echo $editorinfo;
                 }
               ?></p>
                
               <div class="block copyblock"> 

              <?php
                $allInfoForEditor = $editor->getAllEditorInfo();
                if ($allInfoForEditor) {
                    while ($result = $allInfoForEditor->fetch_assoc()) {
              ?>  
                 <form action="" method="POST">
                    <table class="form">    

                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="editor_name" value="<?php echo $result['editor_name']; ?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name="editor_email" value="<?php echo $result['editor_email']; ?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Mobile</label>
                            </td>
                            <td>
                                <input type="number" name="editor_mobile" value="<?php echo $result['editor_mobile']; ?>" class="medium" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td><label>Address</label></td>
                            
                            <td>
                                <input type="text" name="editor_address" value="<?php echo $result['editor_address']; ?>" class="medium" />
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


<?php include 'inc/footer.php';?>