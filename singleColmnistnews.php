<?php include 'inc/header.php';?>
<?php include 'inc/breakingnews.php';?>
<?php
	$db = new Database();
?>

<?php
  if (!isset($_GET['colN']) || $_GET['colN'] == NULL) { /*index page er id dhorchi*/
    header("Location:404.php"); /*tar mane page na paile*/
  }else{
    $singleid = $_GET['colN'];
  }
?>


<div class="news_view_page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                      <?php
                            $nws = new Columnistnews();
                             $singlenews = $nws->getsingleColmnistnews($singleid);
                             if ($singlenews) {
                              while ($result = $singlenews->fetch_assoc()) {
                      ?>
                        <div class="news_view_content">
                            <h2><?php echo $result['news_title']; ?></h2>
                            <hr />
                            <div class="media-part">
                                <span class="date-time"><?php echo $result['create_date']?></span>
                            </div>
                            <!--Social share option here-->
                            <div class="custom_social_share">
                                <div class="custom_share_count">
                                    <span class="custom_num">0</span>
                                    <span class="custom_word">SHARE</span>
                                </div>
                                <ul class="social_media">
                                    <li>
                                        <button>
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </button>
                                    </li>
                                    <li>
                                        <button>
                                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
    
                           <img src="admin/<?php echo $result['image']; ?>" alt="News View Picture" class="img-responsive" />

                            <span class="tt">photo credit here</span>

                            <p class="text-justify">
                              <?php echo $result['news_details']; ?>
                            </p>     

                            
                        </div>
                        <!--More news start here-->
                        <div class="row">
                            <div class="related_news">
                                <h3>সম্পর্কিত খবর</h3>
                                <hr />

                             <?php
                                $colprofid = $result['columnistProfile_id']; /*uoporei sejetu select kore nea ase tai ar laglona*/
                                $querycat = "SELECT * FROM tbl_columnist WHERE author = '$colprofid' ORDER BY rand() LIMIT 4";
                                $relatedpost = $db->select($querycat);
                                   if ($relatedpost) {
                                 while ($reletedresult = $relatedpost->fetch_assoc()) {
                              ?>    

                                <div class="col-lg-3">
                                    <div class="thumbnail thumbnail-content">

                                        <a href="singleColmnistnews.php?colN=<?php echo $reletedresult['news_url']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="Liton" class="img-responsive">
                                        </a>

                                        <div class="caption">
                                            <h4>
                                              <a href="singleColmnistnews.php?colN=<?php echo $reletedresult['news_url']; ?>"><?php echo $reletedresult['news_title']; ?></a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                              <?php } } else { echo "No Related Post Available";} ?>


                            </div>
                            <!--comment section here-->
                            <div class="comment_section">
                                <h3>মন্তব্য করুন</h3>
                                <hr />
                                <div class="fb-comments" 
                                     data-href="https://developers.facebook.com/docs/plugins/comments#configurator" 
                                     data-width="800" 
                                     data-numposts="10">
                                </div>
                            </div>
                        </div>

                        <?php } } ?>

                    </div>
                    <!--Sorbocho sorbadhik part here-->
                    <div class="col-lg-3">
                     <?php include 'inc/colamistlist.php';?>
                    </div>

                     <div id="fb-root"></div>
                      <script>(function (d, s, id) {
                              var js, fjs = d.getElementsByTagName(s)[0];
                              if (d.getElementById(id))
                                  return;
                              js = d.createElement(s);
                              js.id = id;
                              js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10';
                              fjs.parentNode.insertBefore(js, fjs);
                          }(document, 'script', 'facebook-jssdk'));
                      </script>


                </div>
            </div>
        </div>

        <?php include 'inc/footer.php';?>