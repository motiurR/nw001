<?php include '../classes/EmailNphoneInfo.php';?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    $emailPhone = new EmailNphoneInfo();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $emailphoneInfo = $emailPhone->getemailphoneInfo($_POST);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Email Mobile Information</h2>

                <p style="text-align: center;">
                    <?php
                 if (isset($emailphoneInfo)) {
                      echo $emailphoneInfo;
                 }
               ?></p>
                
               <div class="block copyblock"> 

              <?php
                $allInfoPhoneEmail = $emailPhone->getAllEmailNphoneInfo();
                if ($allInfoPhoneEmail) {
                    while ($result = $allInfoPhoneEmail->fetch_assoc()) {
              ?> 

                 <form action="" method="POST">
                    <table class="form">    

                        <tr>
                            <td>
                                <label>NewsRoom Email</label>
                            </td>
                            <td>
                                <input type="text" name="newsroomemail" value="<?php echo $result['newsroomemail']; ?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>NewsRoom Mobile</label>
                            </td>
                            <td>
                                <input type="number" name="newsroommobile" value="<?php echo $result['newsroommobile']; ?>" class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>advertisement Email</label>
                            </td>
                            <td>
                                <input type="text" name="advemail" value="<?php echo $result['advemail']; ?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>advertisement Mobile</label>
                            </td>
                            <td>
                                <input type="number" name="advmobile" value="<?php echo $result['advmobile']; ?>" class="medium" />
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