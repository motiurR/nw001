<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Gallery.php';?>

<?php
	$glr = new Gallery();
	$fm = new Format();
?>
<?php
   $glr = new Gallery();
    if (isset($_GET['status'])) {
    	$id = $_GET['status'];
    	$changeglImage =$glr->GetChangeImage($id);
    	echo "<script>window.location = 'gallerylist.php';</script>";
    }
?>
<?php
	if (isset($_GET['delImg'])) {
		$id = $_GET['delImg'];
		$sliderdel = $glr->delsliderbyid($id);
	}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Slider List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>No.</th>
					<th>Slider Title</th>
					<th>Slider Image</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

			<?php
			   $galleryImage = $glr->getGalleryImage();
			   if ($galleryImage) {
			   	$i = 0;
			   	while ($result =$galleryImage->fetch_assoc()) {
			   		$i++;
			?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $fm->textShorten($result['title'],70); ?></td>
					<td><img src="<?php echo $result['image']; ?>" height="40px" width="60px"/></td>

					<td>
	                    <a href="?status=<?php echo $result['gallery_id']?>" onclick="return confirm('Are You Sure Want To Change?') " style="color:<?php echo $result['status']?'green':'red'; ?>"><?php echo $result['status']?'active':'in-active'; ?></a>
	                </td>

				<td>
					<a href="editGlrImage.php?eimgid=<?php echo $result['gallery_id']; ?>">Edit</a> || 
					<a href="?delImg=<?php echo $result['gallery_id']; ?>" onclick="return confirm('Are you sure to Delete!');" >Delete</a> 
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
