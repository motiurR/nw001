<div class="col-lg-8">
                        <div class="total-content">
                            <a href="#"><h1>আন্তর্জাতিক</h1></a>
                            <hr />

                      <?php
                         $news = new NewsAddN();
                          $cricketTNews = $news->getAllInternationalNews();
                          if ($cricketTNews) {
                            while ($result = $cricketTNews->fetch_assoc()) {
                      ?>
                            <div class="col-lg-4">
                                <div class="thumbnail thumbnail-contents">
                                    <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><img src="global-panel/<?php echo $result['image']; ?>" alt="Suchi"></a>
                                    <div class="caption thumbnail-caption">
                                        <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><h3><?php echo $result['news_title']; ?></h3></a>
                                        
                                        <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><p><?php echo $fm->textShorten($result['news_summery'],200); ?></p></a>
                                    </div>
                                </div>
                            </div>

                      <?php } } ?>      

                        </div>
                    </div>