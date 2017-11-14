<?php include '../classes/BreakingNews.php';?>

<?php
    $nbrk = new BreakingNews();
    /*category delete*/
    if (isset($_GET['delb'])) {
    	$id = $_GET['delb'];
    	$delNbreaking =$nbrk->delNBreaktById($id);
    }
?>
<?php
    $nbrk = new BreakingNews();
    if (isset($_GET['status'])) {
    	$id = $_GET['status'];
    	$changebreaking =$nbrk->changeNbreakingById($id);
    	echo "<script>window.location = 'breakingnewslist.php';</script>";
    }
?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Breaking News List</h2>
            
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Sl</th>
							<th>Title</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
			<?php
				$getNBreaking = $nbrk->getAllNBreaking();
				if ($getNBreaking) {
					$i = 0;
					while ($result = $getNBreaking->fetch_assoc()) {
						$i++;
			?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['title']?></td>
							<td>
								<a href="?status=<?php echo $result['breaking_id']?>" onclick="return confirm('Are You Sure Want To Change?') " style="color:<?php echo $result['status']?'green':'red'; ?>"><?php echo $result['status']?'active':'in-active'; ?></a>
							</td>

				            <td><a href="breakingedit.php?breakid=<?php echo $result['breaking_id']?>">Edit</a> 
				 <?php if (Session::get('level') == '0') { ?> <!-- admin hole del kora jabe -->

				            || <a onclick="return confirm('Are You Sure Want To Delete?') " href="?delb=<?php echo $result['breaking_id']?>">Delete</a>

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

