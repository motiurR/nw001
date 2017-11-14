<?php include '../classes/SubCategoryNational.php';?>

<?php
    $nscatglist = new SubCategoryNational();
    /*category delete*/
    if (isset($_GET['delNscat'])) {
    	$id = $_GET['delNscat'];
    	$delNsCategory =$nscatglist->delNsCatById($id);
    }
?>
<?php
    $nscatglist = new SubCategoryNational();
    if (isset($_GET['status'])) {
    	$id = $_GET['status'];
    	$changeNsCategoryststus =$nscatglist->changeNsCatStatusById($id);
    	echo "<script>window.location = 'nsubcatlist.php';</script>";
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
							<th>Cat Id</th>
							<th>Title</th>
							<th>URL</th>
							<th>SEO title</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
			<?php
				$getNsCat = $nscatglist->getAllNsCat();
				if ($getNsCat) {
					$i = 0;
					while ($result = $getNsCat->fetch_assoc()) {
						$i++;
			?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['category_id']?></td>
							<td><?php echo $result['sub_category_title']?></td>
							<td><?php echo $result['sub_category_url']?></td>
							<td><?php echo $result['subcategory_seo_title']?></td>
							<td>
								<a href="?status=<?php echo $result['subcategory_id']?>" onclick="return confirm('Are You Sure Want To Change?') " style="color:<?php echo $result['status']?'green':'red'; ?>"><?php echo $result['status']?'active':'in-active'; ?></a>
							</td>

				            <td><a href="nsubcatedit.php?nscatid=<?php echo $result['subcategory_id']?>">Edit</a> 

						 <!-- <?php if (Session::get('level') == '0') { ?>
				            || <a onclick="return confirm('Are You Sure Want To Delete?') " href="?delNscat=<?php echo $result['subcategory_id']?>">Delete</a>
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

