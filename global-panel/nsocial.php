<?php include '../classes/SocialSiteIcon.php';?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
    $social = new SocialSiteIcon();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $updatesocialicon = $social->getsocialicon($_POST);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Your Social SIte</h2>

                <p style="text-align: center;">
                    <?php
                 if (isset($updatesocialicon)) {
                      echo $updatesocialicon;
                 }
               ?></p>
                
               <div class="block copyblock"> 

              <?php
                $socialdata = $social->getsocialdata();
                if ($socialdata) {
                    while ($result = $socialdata->fetch_assoc()) {
              ?>  
                 <form action="" method="POST">
                    <table class="form">	

                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="facebook" value="<?php echo $result['facebook']; ?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="twitter" value="<?php echo $result['twitter']; ?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="google_plus" value="<?php echo $result['google_plus']; ?>" class="medium" />
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