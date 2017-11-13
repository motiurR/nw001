<?php include '../classes/CategoryNatioal.php';?>

<?php
    $ncatglist = new CategoryNatioal();
    /*category delete*/
    if (isset($_GET['delNcat'])) {
    	$id = $_GET['delNcat'];
    	$delNCategory =$ncatglist->delNCatById($id);
    }
?>
<?php
    $ncatglist = new CategoryNatioal();
    if (isset($_GET['status'])) {
    	$id = $_GET['status'];
    	$changeNCategoryststus =$ncatglist->changeNCatStatusById($id);
    	echo "<script>window.location = 'ncatlist.php';</script>";
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
							<th>Title</th>
							<th>URL</th>
							<th>SEO title</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
			<?php
				$getNCat = $ncatglist->getAllNCat();
				if ($getNCat) {
					$i = 0;
					while ($result = $getNCat->fetch_assoc()) {
						$i++;
			?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['category_title']?></td>
							<td><?php echo $result['category_url']?></td>
							<td><?php echo $result['category_seo_title']?></td>
							<td>
								<a href="?status=<?php echo $result['category_id']?>" onclick="return confirm('Are You Sure Want To Change?') " style="color:<?php echo $result['status']?'green':'red'; ?>"><?php echo $result['status']?'active':'in-active'; ?></a>
							</td>

				            <td><a href="ncatedit.php?ncatid=<?php echo $result['category_id']?>">Edit</a> 

				 			<!-- <?php if (Session::get('level') == '0') { ?>

				            || <a onclick="return confirm('Are You Sure Want To Delete?') " href="?delNcat=<?php echo $result['category_id']?>">Delete</a>
				            <?php } ?>   -->

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

