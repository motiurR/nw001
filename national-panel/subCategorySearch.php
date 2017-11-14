<?php include '../lib/Database.php';?>
<?php include '../lib/Session.php';?>
<?php include '../classes/CategoryNatioal.php';?>
<?php include '../classes/SubCategoryNational.php';?>
<?php
$db = new Database();
if(!empty($_POST["catsearch"])) {
   /* $query ="SELECT * FROM tbl_newses WHERE category_id = '" . $_POST["catsearch"] . "'";*/
    $query = "SELECT tbl_newses.*,tbl_ncategory.category_title,tbl_subcategory.sub_category_title
				           FROM tbl_newses
				           INNER JOIN tbl_ncategory 
					       ON tbl_newses.category_id = tbl_ncategory.category_id
				           INNER JOIN tbl_subcategory 
				           ON tbl_newses.subcategory_id = tbl_subcategory.subcategory_id
				           WHERE tbl_newses.subcategory_id = '" . $_POST["catsearch"] . "'";
    $results = $db->select($query);
?>
<table class="data display datatable" id="subcat-list">
					<thead>
						<tr>
							<th>SL</th>
							<th>Category</th>
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
				if ($results) {
					$i = 0;
					while ($result = $results->fetch_assoc()) {
						$i++;
			?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['category_title']?>/<?php echo $result['category_id']?></td>
						    <td><?php echo $result['sub_category_title']?>/<?php echo $result['subcategory_id']?></td>
							
							<td>
								<a href="?istop=<?php echo $result['news_id']?>" onclick="return confirm('Are You Sure Want To Change?') " style="color:<?php echo $result['top_news']?'green':'red'; ?>"><?php echo $result['top_news']?'Top':'General'; ?></a>
							</td>

							<td><?php echo $result['news_title']?></td>


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


<?php }?>