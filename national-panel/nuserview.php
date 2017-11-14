<?php include '../classes/AddnUser.php';?>

<?php
   $nuserlist = new AddnUser();
    if (!isset($_GET['nviewid']) || $_GET['nviewid'] == NULL) { 
        echo "<script>window.location = 'usernlist.php';</script>";
    }else{
        $vid =  $_GET['nviewid'];
    }
?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
            
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>User</th>
							<th>email</th>
							<th>Role</th>
						</tr>
					</thead>
					<tbody>
			<?php
				$getNuser = $nuserlist->getNuserById($vid);
				if ($getNuser) {
					$i = 0;
					while ($result = $getNuser->fetch_assoc()) {
						$i++;
			?>
						<tr class="odd gradeX">
							<td><?php echo $result['adminUser']?></td>
							<td><?php echo $result['adminEmail']?></td>
							<td><?php
								 if ($result['level'] == '0') {
								 	echo "Admin";
								 }else{
								 	echo "Editor";
								 }
								 ?>
							</td>
						</tr>
				<?php } } ?>		
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>


