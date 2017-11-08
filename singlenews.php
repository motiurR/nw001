<?php include 'inc/header.php';?>
<?php include 'inc/breakingnews.php';?>
<?php
	$db = new Database();
?>

<?php
  if (!isset($_GET['nurl']) || $_GET['nurl'] == NULL) { /*index page er id dhorchi*/
    header("Location:404.php"); /*tar mane page na paile*/
  }else{
    $singleid = $_GET['nurl'];
  }
?>


<div class="news_view_page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                      <?php
                            $nws = new NewsAddN();
                             $singlenews = $nws->getsinglenews($singleid);
                             if ($singlenews) {
                              while ($result = $singlenews->fetch_assoc()) {
                              $news_id = $_SESSION["getnews"] = $result['news_id'];
                                //$newsid = $result['news_id']; /*onno jaigai use korar jonno*/
                                $newhits = $result['hits']+1;
                                $query = "UPDATE tbl_newses SET hits = '$newhits' WHERE news_url = '$singleid'";
                                $db->update($query);
                      ?>
                        <div class="news_view_content">
                            <h2><?php echo $result['news_title']; ?></h2>
                            <hr />
                            <div class="media-part">
                                <span class="date-time">প্রকাশিত: ০৯:২৯, নভেম্বর ০৭, ২০১৭</span>
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
                                <div class="col-lg-3">
                                    <div class="thumbnail thumbnail-content">
                                        <a href="#"><img src="images/liton.jpg" alt="Liton" class="img-responsive"></a>
                                        <div class="caption">
                                            <h4><a href="#">ম্যাচ হেরেও চিন্তিত নন লিটন?</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="thumbnail thumbnail-content">
                                        <a href="#"><img src="images/gavaskar.jpg" alt="Gavaskar" class="img-responsive"></a>
                                        <div class="caption">
                                            <h4><a href="#">ধোনির পাশে গাভাস্কার-শেবাগ</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="thumbnail thumbnail-content">
                                        <a href="#"><img src="images/chittagong.jpg" alt="CHI" class="img-responsive"></a>
                                        <div class="caption">
                                            <h4><a href="#">চিটাগং ভাইকিংসের সুন্দর শুরু</a></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="thumbnail thumbnail-content">
                                        <a href="#"><img src="images/akhter.jpg" alt="Shoieb Akhter" class="img-responsive"></a>
                                        <div class="caption">
                                            <h4><a href="#">‘ভাগ্যিস, কোহলির বিপক্ষে বল করতে হয়নি!’</a></h4>
                                        </div>
                                    </div>
                                </div>
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
                     <?php include 'inc/recentPopular.php';?>
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