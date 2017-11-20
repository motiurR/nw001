<div class="kheladhula-part">
            <div class="container">
                <div class="row">
                    <div class="kheladhula-total-contet">
                        <a href="#"><h1>বিনোদন</h1></a>
                        <hr />
                        <?php
                             $news = new NewsAddN();
                              $motdimotNews = $news->getDhallywoodTopNews();
                              if ($motdimotNews) {
                                while ($result = $motdimotNews->fetch_assoc()) {
                          ?>
                        <!--Kheladhula First part start here-->
                        
                         <div class= "col-lg-6">
                            <div class="main_news">
                                <div class="col-lg-8">
                                    <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><img src="admin/<?php echo $result['image'];?>" alt="PSG" class="img-responsive"></a>
                                </div>
                                <div class="col-lg-4 details">
                                    <h3><a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><?php echo $result['news_title']; ?></a></h3>
                                    <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><!-- <p> --><?php echo $fm->textShorten($result['news_summery']); ?><!-- </p> --></a>

                                </div>
                            </div>
                      </div>
                       <?php } } ?> 


                     <div class="col-lg-6">
                            <div class="row">
                                <div class="kheladhula-2nd-part">
                              <?php
                                 $news = new NewsAddN();
                                  $dhalywoodNews = $news->getAllDhalywoodNews();
                                  if ($dhalywoodNews) {
                                    while ($result = $dhalywoodNews->fetch_assoc()) {
                              ?>  
                                    <div class="col-lg-6">
                                        <div class="thumbnail kheladhula-2nd-part-thumbnail">
                                             <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><img src="global-panel/<?php echo $result['image']; ?>" alt="PSG"></a>
                                            <div class="caption">
                                                <h3><a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><?php echo $result['news_title']; ?></a></h3>
                                            </div>
                                        </div>
                                    </div>
                               <?php } } ?>
                                </div>
                            </div>
                        </div>


                        <!--Kheladhula First part end here-->

                        <!--Kheladhula-2nd-part start here-->
                        <div class="kheladhula-2nd-part">
                            <div class="row">
                                <div class="col-lg-12">

                                <?php
                                     $news = new NewsAddN();
                                      $cricketTNews = $news->getAllIEntertainmentNews();
                                      if ($cricketTNews) {
                                        while ($result = $cricketTNews->fetch_assoc()) {
                                  ?>    
                                    <div class="col-lg-3">
                                        <div class="thumbnail kheladhula-2nd-part-thumbnail">
                                            <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><img src="global-panel/<?php echo $result['image']; ?>" alt="PSG"></a>
                                            <div class="caption">
                                                <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><h3><?php echo $result['news_title']; ?></h3></a>
                                            </div>
                                        </div>
                                    </div>
                                 <?php } } ?>   

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Kheladhula-2nd-part end here-->
                </div>
            </div>
        </div>