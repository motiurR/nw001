<?php include '../classes/AddnUser.php';?>

<?php
    $nuserlist = new AddnUser();
    /*category delete*/
    if (isset($_GET['delNuser'])) {
    	$id = $_GET['delNuser'];
    	$delNuser =$nuserlist->delNuserById($id);
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
							<th>Sl</th>
							<th>User</th>
							<th>email</th>
							<th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
			<?php
				$getNuser = $nuserlist->getAllNuser();
				if ($getNuser) {
					$i = 0;
					while ($result = $getNuser->fetch_assoc()) {
						$i++;
			?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
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

				            <td>
				          <a href="nuserview.php?nviewid=<?php echo $result['admin_id']?>">View</a>||
				 <?php if (Session::get('level') == '0') { ?> <!-- admin hole del kora jabe -->
						<a href="nuseredit.php?nuserid=<?php echo $result['admin_id']?>">Edit</a> 
				         || <a onclick="return confirm('Are You Sure Want To Delete?') " href="?delNuser=<?php echo $result['admin_id']?>">Delete</a>

				        <?php } ?>    
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

