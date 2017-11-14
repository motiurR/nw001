<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2> Dashbord</h2>
                <div class="block">
                <h2 style="text-align: center;">Hello <?php echo Session::get('adminUser');?></h2>               
               <h2 style="text-align: center;">Welcome To The <span style="color: red">Local</span> Admin panel</h2>       
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>