<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/TitleSloganLogoLocal.php';?>
<style>
    .leftside{
    float: left;
    width: 70%;
}
.rightside{
    float: left;
    width: 20%;
}
.rightside img{
    height: 160px;
    width: 170px;
}
</style>

<?php
    $ttlesgn = new TitleSloganLogoLocal();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $updatelogo = $ttlesgn->getupdatelogo($_FILES);
    }

?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Site Title and Description</h2>
        <?php
            if (isset($updatelogo)) {
                echo $updatelogo;
            }
        ?>
        <div class="block sloginblock">
 <!-- data show -->       
      <?php
            $getData = $ttlesgn->getDataById();
            if ($getData) {
            while ($result = $getData->fetch_assoc()) {
      ?>  
        <div class="leftside">               
         <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">					

                <tr>
                    <td>
                        <label>Website Logo</label>
                    </td>
                    <td>
                        <input type="file" name="logo" />
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
           <div class="rightside">
               <img src="<?php echo $result['logo']; ?>" alt="logo" />
           </div>
         <?php } } ?>    
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>