<?php include 'inc/header.php';?>
<?php include 'inc/breakingnews.php';?>
<?php
	$db = new Database();
	$fm = new Format();
?>

<?php
  if (!isset($_GET['authorprof']) || $_GET['authorprof'] == NULL) {
    header("Location:404.php"); 
  }else{
    $id = $_GET['authorprof'];
  }
?>

 <div class="kolamist_profile_page">
            <div class="container">
                <div class="row">

			<?php
                 $cnews = new Columnistnews();
                  $colamistprofile = $cnews->getcolamistprofilebyid($id);
                  if ($colamistprofile) {
                    while ($result = $colamistprofile->fetch_assoc()) {
              ?>

                    <div class="col-lg-9">
                        <div class="profile_content">
                            <div class="cover_img">
                                <img src="images/coverpic.jpg" alt="Cover Image" class="img-responsive"/>
                            </div>
                            <div class="profile_pic">
                                <img src="global-panel/<?php echo $result['image']; ?>" alt="Profile Picture" class="img-responsive"/>
                            </div>
                            <div class="ro--w">

			      <?php
                 $cnews = new Columnistnews();
                  $colamistnews = $cnews->getcolamistnewsbyid($id);
                  if ($colamistnews) {
                    while ($value = $colamistnews->fetch_assoc()) {
              ?>
                                <div class="col-lg-4">
                                    <div class="thumbnail thumbnail-content">
                                        <div class="caption likha">
                                            <h3>
                                                <a href="singleColmnistnews.php?colN=<?php echo $value['news_url']; ?>"><?php echo $value['news_title'];?></a>
                                            </h3>
                                            <div class="publice_date">
                                                <span><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $value['create_date']; ?></span>
                                            </div>
                                            <p><?php echo $fm->textShorten($value['news_summery']); ?></p>
                                        </div>
                                    </div>
                                </div>
                         <?php } } ?>       

                              
                            </div>
                        </div>
                    </div>
               <?php } } ?>     


                    <div class="col-lg-3">
                        <?php include 'inc/colamistlist.php';?>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'inc/footer.php';?>