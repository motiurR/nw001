<?php include 'inc/header.php';?>
<?php include 'inc/breakingnews.php';?>
<?php
    $fm = new Format();
?>

 <div class="sahitto_page">
            <div class="container">
                <div class="row">
                    <div class="cover_pic">
                        <img src="images/sahitto.jpg" alt="Cover Image" class="img-responsive"/>
                        <div class="cover_title">
                            <h2>সাহিত্য</h2>
                        </div>
                    </div>
                    <div class="sahitto_body">
                        <div class="sahitto_body_content">
                            <h2>প্রবন্ধ</h2>
                            <div class="sahitto_body_details">
                                <div class="row">

                          <?php
                               $news = new NewsAddN();
                                $getpeobondho = $news->getallprobondhoNews();
                                if ($getpeobondho) {
                                  while ($result = $getpeobondho->fetch_assoc()) {
                            ?>

                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="probondho_book_details">
                                                    <div class="probondho-name">
                                                        <h3><?php echo $result['news_title'];?></h3>
                                                    </div>
                                                    <div class="writer_name">
                                                        <h3>লেখকের নাম: <?php echo $result['sahittowriter'];?></h3>
                                                    </div>
                              <div class="date_time">
                                  <h3>তারিখ ও সময়: <?php
                                  date_default_timezone_set('Asia/Dhaka');
                                   $date = $result['create_date'];
                                    echo bn_date(date('l, d M Y, h:i a',strtotime($date)));
                                        ?>
               
                                     </h3>
                              </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="sahitto_img">
                                                    <img src="global-panel/<?php echo $result['image']; ?>" alt="..." class="img-responsive">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="caption probondho_details">
                                            <p><?php echo $fm->textShorten($result['news_summery'],600);?></p>
                                            <p><a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>" class="btn btn-default pull-right more_button" role="button">আরো</a></p>
                                        </div>
                                    </div>

                            <?php } } ?>        

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sahitto_part_2">
                        <div class="row">
                            <div class="sahitto_part_2_content">
                                <div class="col-lg-4">
                                    <div class="thumbnail thumbnail_contents">
                                        <img src="images/gohre_baire.jpg" alt="Sahitto Picture" class="img-responsive">
                                        <div class="caption thumbnail_captions">
                                            <h3 class="text-center">প্রবন্ধের নাম: ঘরে বাইরে</h3>
                                            <h3 class="text-center">লেখকের নাম: রবীন্দ্রনাথ ঠাকুর</h3>
                                            <h3 class="text-center">তারিখ ও সময়: </h3>
                                            <p>বাংলা ভাষায় রচিত সাহিত্যকর্ম বাংলা সাহিত্য নামে পরিচিত। আনুমানিক খ্রিষ্টীয় নবম শতাব্দীতে বাংলা ভাষায় সাহিত্য রচনার সূত্রপাত হয়। খ্রিষ্টীয় দশম থেকে দ্বাদশ শতাব্দীর মধ্যবর্তী সময়ে রচিত বৌদ্ধ দোহা-সংকলন চর্যাপদ</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="thumbnail thumbnail_contents">
                                        <img src="images/gohre_baire.jpg" alt="Sahitto Picture" class="img-responsive">
                                        <div class="caption thumbnail_captions">
                                            <h3 class="text-center">প্রবন্ধের নাম: ঘরে বাইরে</h3>
                                            <h3 class="text-center">লেখকের নাম: রবীন্দ্রনাথ ঠাকুর</h3>
                                            <h3 class="text-center">তারিখ ও সময়: </h3>
                                            <p>বাংলা ভাষায় রচিত সাহিত্যকর্ম বাংলা সাহিত্য নামে পরিচিত। আনুমানিক খ্রিষ্টীয় নবম শতাব্দীতে বাংলা ভাষায় সাহিত্য রচনার সূত্রপাত হয়। খ্রিষ্টীয় দশম থেকে দ্বাদশ শতাব্দীর মধ্যবর্তী সময়ে রচিত বৌদ্ধ দোহা-সংকলন চর্যাপদ</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="thumbnail thumbnail_contents">
                                        <img src="images/gohre_baire.jpg" alt="Sahitto Picture" class="img-responsive">
                                        <div class="caption thumbnail_captions">
                                            <h3 class="text-center">প্রবন্ধের নাম: ঘরে বাইরে</h3>
                                            <h3 class="text-center">লেখকের নাম: রবীন্দ্রনাথ ঠাকুর</h3>
                                            <h3 class="text-center">তারিখ ও সময়: </h3>
                                            <p>বাংলা ভাষায় রচিত সাহিত্যকর্ম বাংলা সাহিত্য নামে পরিচিত। আনুমানিক খ্রিষ্টীয় নবম শতাব্দীতে বাংলা ভাষায় সাহিত্য রচনার সূত্রপাত হয়। খ্রিষ্টীয় দশম থেকে দ্বাদশ শতাব্দীর মধ্যবর্তী সময়ে রচিত বৌদ্ধ দোহা-সংকলন চর্যাপদ</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <?php include 'inc/footer.php';?>

       <?php
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
       ?>