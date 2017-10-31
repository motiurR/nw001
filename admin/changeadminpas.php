<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/AdminLogin.php';?>

<?php
    Session::init();
    $admnlgn = new AdminLogin();
    $aid = Session::get('admin_id');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $updatepass = $admnlgn->updateAdminPassword($_POST, $aid);
    }
?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Change Password</h2>
                <div class="block">

                <p style="text-align: center;">
                    <?php 
                        if (isset($updatepass)) {
                            echo $updatepass;
                        }
                    ?>
                </p>  

                 <form action="" method="POST">
                    <table class="form">					
                        <!-- <tr>
                            <td>
                                <label>Old Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter Old Password"  name="adminPassword" class="medium" />
                            </td>
                        </tr> -->
						 <tr>
                            <td>
                                <label>New Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter New Password" name="adminPassword" class="medium" required="" />
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?> 
