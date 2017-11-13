<?php include '../classes/Cartoon.php';?>
<?php include '../classes/CategoryNatioal.php';?>

<?php
	$fm = new Format();
?>

<?php
    $newslist = new Cartoon();
    if (isset($_GET['istop'])) {
    	$id = $_GET['istop'];
    	$changecartoonNewsTop =$newslist->changenCartoonNewsTopById($id);
    	echo "<script>window.location = 'cartoonmanage.php';</script>";
    }
?>
<?php
    if (isset($_GET['status'])) {
    	$id = $_GET['status'];
    	$changeCartoonNewseststus =$newslist->changenCartoonNewsStatusById($id);
    	echo "<script>window.location = 'cartoonmanage.php';</script>";
    }
?>
<?php
    /*category delete*/
    if (isset($_GET['delCrtnNews'])) {
    	$id = $_GET['delCrtnNews'];
    	$delncartoonNewsbyid =$newslist->delncartoonNewsById($id);
    }
?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Cartoon List</h2>
                <div class="block"> 
                <?php
               		if (isset($delncartoonNewsbyid)) {
               			echo $delncartoonNewsbyid;
               		}
               ?>  
               <?php
               		if (isset($changeCartoonNewseststus)) {
               			echo $changeCartoonNewseststus;
               		}
               ?>            
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>SL</th>
							<th>Is Top</th>
							<th>News Title</th>
							<th>iamge</th>
							<th>Author</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
			<?php
			$newslist = new Cartoon();
				$getcartoonNews = $newslist->getAllCartoonNews();
				if ($getcartoonNews) {
					$i = 0;
					while ($result = $getcartoonNews->fetch_assoc()) {
						$i++;
			?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							
							<td>
								<a href="?istop=<?php echo $result['cartoon_id']?>" onclick="return confirm('Are You Sure Want To Change?') " style="color:<?php echo $result['top_news']?'green':'red'; ?>"><?php echo $result['top_news']?'Top':'General'; ?></a>
							</td>

							<td><?php echo $result['news_title']?></td>

							<!-- <td><?php echo $fm->textShorten($result['news_url'],80)?></td> -->

							<td>
								<img src="<?php echo $result['image']?>" width="50px" height="50px;">
							</td>
							<td><?php echo $result['author']?></td>

							<td>
								<a href="?status=<?php echo $result['cartoon_id']?>" onclick="return confirm('Are You Sure Want To Change?') " style="color:<?php echo $result['status']?'green':'red'; ?>"><?php echo $result['status']?'active':'in-active'; ?></a>
							</td>

				            <td><a href="cartoonedit.php?cnewsid=<?php echo $result['cartoon_id']?>">Edit</a> 

				        <!-- <?php if (Session::get('level') == '0') { ?> 
				            || <a onclick="return confirm('Are You Sure Want To Delete?') " href="?delCrtnNews=<?php echo $result['cartoon_id']?>">Delete</a>
				        <?php } ?>  -->  
				         
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

