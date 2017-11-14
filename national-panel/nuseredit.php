<?php include '../classes/AddnUser.php';?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    if (!isset($_GET['nuserid']) || $_GET['nuserid'] == NULL) { 
        echo "<script>window.location = 'usernlist.php';</script>";
    }else{
        $id =  $_GET['nuserid'];
    }
?>

<?php
    $userN = new AddnUser();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $editNationUser= $userN->editNUserById($_POST, $id);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update New User</h2>

                <p style="text-align: center;">
                    <?php
                 if (isset($editNationUser)) {
                     echo $editNationUser;
                 }
               ?></p>
                
               <div class="block copyblock"> 
            <?php
                $getuser = $userN->getusertById($id);
                if ($getuser) {
                    while ($value = $getuser->fetch_assoc()) {
            ?> 
                 <form action="" method="POST">
                    <table class="form">

                         <tr>
                            <td>
                                <label>Role</label>
                            </td>
                            <td>
                                <select name="level">
                                   
                                     
                                        <option value="0">Admin</option>
                                        
                                        <option value="1">Editor</option>
                                    
                                    
                                </select>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <label>adminUser</label>
                            </td>
                            <td>
                                <input type="text" name="adminUser" value="<?php echo $value['adminUser']; ?>" class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>adminEmail</label>
                            </td>
                            <td>
                                <input type="text" name="adminEmail" value="<?php echo $value['adminEmail']; ?>" class="medium" />
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