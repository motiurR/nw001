<?php include '../classes/NewsAddN.php';?>
<?php include '../classes/CategoryNatioal.php';?>
<?php include '../classes/SubCategoryNational.php';?>

<?php
	$fm = new Format();
?>

<?php
    $newslist = new NewsAddN();
    if (isset($_GET['istop'])) {
    	$id = $_GET['istop'];
    	$changeNewsTop =$newslist->changenNewsTopById($id);
    }
?>
<?php
    if (isset($_GET['status'])) {
    	$id = $_GET['status'];
    	$changeNewseststus =$newslist->changenNewsStatusById($id);
    }
?>
<?php
    /*category delete*/
    if (isset($_GET['delnNews'])) {
    	$id = $_GET['delnNews'];
    	$delnNewsbyid =$newslist->delnNewsById($id);
    }
?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block"> 
                <?php
               		if (isset($delnNewsbyid)) {
               			echo $delnNewsbyid;
               		}
               ?>  
               <?php
               		if (isset($changeNewseststus)) {
               			echo $changeNewseststus;
               		}
               ?>            
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>SL</th>
							<th>Cat Id</th>
							<th>SubCat Id</th>
							<th>Is Top</th>
							<th>News Title</th>
							<!-- <th>News url</th> -->
							<th>iamge</th>
							<th>Author</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
			<?php
			$newslist = new NewsAddN();
				$getNews = $newslist->getAllNews();
				if ($getNews) {
					$i = 0;
					while ($result = $getNews->fetch_assoc()) {
						$i++;
			?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['category_id']?>/<?php echo $result['category_title']?></td>
							<td><?php echo $result['subcategory_id']?>/<?php echo $result['sub_category_title']?></td>
							
							<td>
								<a href="?istop=<?php echo $result['news_id']?>" onclick="return confirm('Are You Sure Want To Change?') " style="color:<?php echo $result['top_news']?'green':'red'; ?>"><?php echo $result['top_news']?'Top':'General'; ?></a>
							</td>

							<td><?php echo $result['news_title']?></td>

							<!-- <td><?php echo $fm->textShorten($result['news_url'],80)?></td> -->

							<td>
								<img src="<?php echo $result['image']?>" width="50px" height="50px;">
							</td>
							<td><?php echo $result['author']?></td>

							<td>
								<a href="?status=<?php echo $result['news_id']?>" onclick="return confirm('Are You Sure Want To Change?') " style="color:<?php echo $result['status']?'green':'red'; ?>"><?php echo $result['status']?'active':'in-active'; ?></a>
							</td>

				            <td><a href="newsnedit.php?newsid=<?php echo $result['news_id']?>">Edit</a> 
				 <?php if (Session::get('level') == '0') { ?> <!-- admin hole del kora jabe -->

				            || <a onclick="return confirm('Are You Sure Want To Delete?') " href="?delnNews=<?php echo $result['news_id']?>">Delete</a>

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

