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
                            <div class="thumbnail kheladhula-thumbnail">
                                <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="Sachin"></a>
                                <div class="caption kheladhula-thumbnail-likha">
                                    <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><h3><?php echo $result['news_title']; ?></h3></a>
                                    <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><p><?php echo $fm->textShorten($result['news_summery']); ?></p></a>
                                </div>
                            </div>
                        </div>
                     <?php } } ?>  


                     <?php
                         $news = new NewsAddN();
                          $cricketTNews = $news->getFootbalTopNews();
                          if ($cricketTNews) {
                            while ($result = $cricketTNews->fetch_assoc()) {
                     ?>
                        <div class="col-lg-6">
                            <div class="thumbnail kheladhula-thumbnail">
                                <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="Rafa"></a>
                                <div class="caption kheladhula-thumbnail-likha">
                                    <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"> <h3><?php echo $result['news_title']; ?></h3></a>
                                    <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><p><?php echo $fm->textShorten($result['news_summery']); ?></p></a>
                                </div>
                            </div>
                        </div>
                     <?php } } ?>   
                        <!--Kheladhula First part end here-->

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
                                                <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><h3><?php echo $result['news_title'];?></h3></a>
                                                <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><p><?php echo $fm->textShorten($result['news_summery']); ?></p></a>
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