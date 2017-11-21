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
                                <span class="date-time">

                         <!-- date show in bangla -->           
                                   <?php
                                          date_default_timezone_set('Asia/Dhaka');
                                          function bn_date($str)
                                           {
                                               $en = array(1,2,3,4,5,6,7,8,9,0);
                                              $bn = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
                                              $str = str_replace($en, $bn, $str);
                                              $en = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
                                              $en_short = array( 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' );
                                              $bn = array( 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর' );
                                              $str = str_replace( $en, $bn, $str );
                                              $str = str_replace( $en_short, $bn, $str );
                                              $en = array('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
                                               $en_short = array('Sat','Sun','Mon','Tue','Wed','Thu','Fri');
                                               $bn_short = array('শনি', 'রবি','সোম','মঙ্গল','বুধ','বৃহঃ','শুক্র');
                                               $bn = array('শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
                                               $str = str_replace( $en, $bn, $str );
                                               $str = str_replace( $en_short, $bn_short, $str );
                                               $en = array( 'am', 'pm' );
                                              $bn = array( 'পূর্বাহ্ন', 'অপরাহ্ন' );
                                              $str = str_replace( $en, $bn, $str );
                                               return $str;
                                           }
                                           $date = $result['create_date'];
                                           echo bn_date(date('l, d M Y, h:i a',strtotime($date)));
                                   ?>

                           <?php
                           $date = $result['create_date'];
                              function time_elapsed_string($datetime, $full = false) {
                                      $now = new DateTime;
                                      $ago = new DateTime($datetime);
                                      $diff = $now->diff($ago);

                                      $diff->w = floor($diff->d / 7);
                                      $diff->d -= $diff->w * 7;

                                      $string = array(
                                          'y' => 'year',
                                          'm' => 'month',
                                          'w' => 'week',
                                          'd' => 'day',
                                          'h' => 'hour',
                                          'i' => 'minute',
                                          's' => 'second',
                                      );
                                      foreach ($string as $k => &$v) {
                                          if ($diff->$k) {
                                              $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                                          } else {
                                              unset($string[$k]);
                                          }
                                      }

                                      if (!$full) $string = array_slice($string, 0, 1);
                                      return $string ? implode(', ', $string) . ' ago' : 'just now';
                                  }
                                  echo time_elapsed_string($date, true);
                                  ?>

                                   
                                  
                                    
                                  </span>
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
    
                            <img src="global-panel/<?php echo $result['image']; ?>" alt="News View Picture" class="img-responsive" />
                            <span class="tt"><?php echo $result['author']; ?></span>

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
                                $catid = $result['category_id']; /*uoporei sejetu select kore nea ase tai ar laglona*/
                                $querycat = "SELECT * FROM tbl_newses WHERE category_id = '$catid' ORDER BY rand() LIMIT 4";
                                $relatedpost = $db->select($querycat);
                                   if ($relatedpost) {
                                 while ($reletedresult = $relatedpost->fetch_assoc()) {
                              ?>    

                                <div class="col-lg-3">
                                    <div class="thumbnail thumbnail-content">
                                        <a href="singlenews.php?nurl=<?php echo $reletedresult['news_url']; ?>"><img src="global-panel/<?php echo $reletedresult['image']; ?>" alt="Liton" class="img-responsive"></a>
                                        <div class="caption">
                                            <h4><a href="singlenews.php?nurl=<?php echo $reletedresult['news_url']; ?>"><?php echo $reletedresult['news_title']; ?></a></h4>
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