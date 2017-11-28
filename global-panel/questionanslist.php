<?php include '../classes/VotingPool.php';?>

<?php
    $pool = new VotingPool();
    /*category delete*/
    if (isset($_GET['delVot'])) {
    	$id = $_GET['delVot'];
    	$delVot =$pool->delVotById($id);
    }
?>
<?php
    $pool = new VotingPool();
    if (isset($_GET['status'])) {
    	$id = $_GET['status'];
    	$changeVotststus =$pool->changeVotById($id);
    	echo "<script>window.location = 'questionanslist.php';</script>";
    }
?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Pool List</h2>
            
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Sl</th>
							<th>Question</th>
							<th>Ans1</th>
							<th>Ans2</th>
							<th>Ans3</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
			<?php
				$gevot = $pool->getAllVotQnAns();
				if ($gevot) {
					$i = 0;
					while ($result = $gevot->fetch_assoc()) {
						$i++;
			?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['question']?></td>
							<td><?php echo $result['ans1']?></td>
							<td><?php echo $result['ans2']?></td>
							<td><?php echo $result['ans3']?></td>
							<td>
								<a href="?status=<?php echo $result['id']?>" onclick="return confirm('Are You Sure Want To Change?') " style="color:<?php echo $result['status']?'green':'red'; ?>"><?php echo $result['status']?'active':'in-active'; ?></a>
							</td>

				            <td><a href="votedit.php?vid=<?php echo $result['id']?>">Edit</a> 

				 			 <?php if (Session::get('level') == '0') { ?>

				            || <a onclick="return confirm('Are You Sure Want To Delete?') " href="?delVot=<?php echo $result['id']?>">Delete</a>
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

