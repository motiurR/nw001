<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/AddnUser.php';?>
<?php
     if (!Session::get('level') == '0') { 
        echo "<script>window.location = 'index.php';</script>";
     }
?>

<?php
    $user = new AddnUser();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        $insertUser = $user->addUserName($_POST);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New User</h2>
               <div class="block copyblock"> 

               <p style="text-align: center;">
                  <?php
                     if (isset($insertUser)) {
                         echo $insertUser;
                     }
                   ?>
               </p>

                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>UserName</label>
                            </td>
                            <td>
                                <input type="text" name="adminUser" placeholder="Enter adminUser..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="email" name="adminEmail" placeholder="Enter adminEmail..." class="medium" required="" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Password</label>
                            </td>
                            <td>
                                <input type="password" name="adminPassword" placeholder="Enter adminPassword..." class="medium" />
                            </td>
                        </tr>
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
                                <input type="submit" name="submit" Value="Create" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>