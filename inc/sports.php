<div class="kheladhula-part">
            <div class="container">
                <div class="row">
                    <div class="kheladhula-total-contet">
                        <a href="#"><h1>খেলাধুলা</h1></a>
                        <hr />
                        <!--Kheladhula First part start here-->
                    <?php
                         $news = new NewsAddN();
                          $cricketTNews = $news->getCricketTopNews();
                          if ($cricketTNews) {
                            while ($result = $cricketTNews->fetch_assoc()) {
                     ?>

                         <div class= "col-lg-6">
                            <div class="main_news">
                                <div class="col-lg-8">
                                    <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><img src="admin/<?php echo $result['image'];?>" alt="PSG" class="img-responsive"></a>
                                </div>
                                <div class="col-lg-4 details">
                                    <h3><a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><?php echo $result['news_title']; ?></a></h3>
                                    <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><p><?php echo $fm->textShorten($result['news_summery']); ?></p></a>

                                </div>
                            </div>
                      </div>
                <?php } } ?>
                  
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="kheladhula-2nd-part">
                              <?php
                                 $news = new NewsAddN();
                                  $cricketTNews = $news->getAllSportsNews2nd();
                                  if ($cricketTNews) {
                                    while ($result = $cricketTNews->fetch_assoc()) {
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
               

                        <!--Kheladhula-2nd-part start here-->
                        <div class="kheladhula-2nd-part">
                            <div class="row">
                                <div class="col-lg-12">
                              <?php
                                 $news = new NewsAddN();
                                  $cricketTNews = $news->getAllSportsNews();
                                  if ($cricketTNews) {
                                    while ($result = $cricketTNews->fetch_assoc()) {
                              ?>      
                                    <div class="col-lg-3">
                                        <div class="thumbnail kheladhula-2nd-part-thumbnail">
                                            <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><img src="admin/<?php echo $result['image'];?>" alt="PSG"></a>
                                            <div class="caption">
                                               <h3><a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><?php echo $result['news_title'];?></a></h3>
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