<?php include '../classes/NewsAddN.php';?>
<?php include '../classes/CategoryNatioal.php';?>
<?php include '../classes/SubCategoryNational.php';?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>



<!-- Sub category wise search -->
<script>
function getSubcat(val) {
    $.ajax({
    type: "POST",
    url: "subCategorySearch.php",
    data:'catsearch='+val,
    success: function(data){
        $("#subcat-list").html(data);
    }
    });
}

</script>

<?php
	$fm = new Format();
?>

<?php
    $newslist = new NewsAddN();
    if (isset($_GET['istop'])) {
    	$id = $_GET['istop'];
    	$changeNewsTop =$newslist->changenNewsTopById($id);
    	echo "<script>window.location = 'newsnlist.php';</script>";
    }
?>
<?php
    if (isset($_GET['status'])) {
    	$id = $_GET['status'];
    	$changeNewseststus =$newslist->changenNewsStatusById($id);
    	echo "<script>window.location = 'newsnlist.php';</script>";
    }
?>
<?php
    /*category delete*/
    if (isset($_GET['delnNews'])) {
    	$id = $_GET['delnNews'];
    	$delnNewsbyid =$newslist->delnNewsById($id);
        echo "<script>window.location = 'newsnlist.php';</script>";
    }
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>News List</h2>
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



  

    <!-- sub category wise search -->
                <div class="subCategory_search">
                   	    <tr>
                            <td>
                                <label>Sub Category</label>
                            </td>
                            <td>
                                <select id="subcategory_id"  onChange="getSubcat(this.value)">
                                     <option value="">select Sub Category</option>
                                <?php
                                $subcat = new SubCategoryNational(); 
                                    $getcat = $subcat->getAllNsCat();
                                    if ($getcat) {
                                        while ($catres = $getcat->fetch_assoc()) {
                                ?>  
                                    <option value="<?php echo $catres['subcategory_id']; ?>"><?php echo $catres['sub_category_title']; ?></option>
                                <?php } } ?>    
                                </select>
                            </td>
                        </tr> 
                 </div>



                 <table class="data display datatable" id="subcat-list">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Category</th>
                            <th>SubCat Id</th>
                            <th>District</th>
                            <th>Is Top</th>
                            <th width="25%">News Title</th>
                            <!-- <th>News url</th> -->
                            <th>iamge</th>
                            <th>Caption</th>
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
                            <td><?php echo $result['category_title']?>(<?php echo $result['category_id']?>)</td>
                            <td><?php echo $result['subcategory_id']?></td>
                            <td><?php echo $result['district_id']?></td>
                            
                            <td>
                                <a href="?istop=<?php echo $result['news_id']?>" onclick="return confirm('Are You Sure Want To Change?') " style="color:<?php echo $result['top_news']?'green':'red'; ?>"><?php echo $result['top_news']?'Top':'General'; ?></a>
                            </td>

                            <td><?php echo $result['news_title']?><br>
                                <?php echo "create:".$result['create_date']?><br>
                                <?php echo "update:".$result['update_dateN_time']?>
                            </td>

                            <!-- <td><?php echo $fm->textShorten($result['news_url'],80)?></td> -->

                            <td>
                                <img src="<?php echo $result['image']?>" width="50px" height="50px;">
                            </td>
                            <td><?php echo $fm->textShorten($result['author'],50)?></td>

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

