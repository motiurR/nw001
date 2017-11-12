<?php include '../classes/Columnistnews.php';?>

<?php
    $columnist = new Columnistnews();
    /*category delete*/
    if (isset($_GET['delNcol'])) {
    	$id = $_GET['delNcol'];
    	$deldelNcol =$columnist->delColumnist($id);
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
							<th>name</th>
							<th>Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
			<?php
				$getcolprof = $columnist->getallColProf();
				if ($getcolprof) {
					$i = 0;
					while ($result = $getcolprof->fetch_assoc()) {
						$i++;
			?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['username']?></td>
							<td>
								<img src="<?php echo $result['image']?>" width="55px" height="50px;">
							</td>

				            <td><a href="coledit.php?ncatid=<?php echo $result['columnistProfile_id']?>">Edit</a> 
				 		<?php if (Session::get('level') == '0') { ?> 

				            || <a onclick="return confirm('Are You Sure Want To Delete?') " href="?delNcol=<?php echo $result['columnistProfile_id']?>">Delete</a>

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

