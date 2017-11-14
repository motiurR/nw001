<div class="aourthoniti">
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="aourthoniti-total-content">
                                        <a href="#"><h1>জীবনযাপন</h1></a>
                                        <hr />

                                      <?php
                                             $news = new NewsAddN();
                                              $cricketTNews = $news->getAlllifestyleNews();
                                              if ($cricketTNews) {
                                                while ($result = $cricketTNews->fetch_assoc()) {
                                       ?>  
                                        <div class="total-content-2">
                                            <div class="col-lg-5">
                                                <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>">
                                                    <img src="global-panel/<?php echo $result['image']; ?>" alt="jibonjapon" />
                                                </a>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="details">
                                                    <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><h4><?php echo $result['news_title']; ?></h4></a>
                                                    <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><p><?php echo $fm->textShorten($result['news_summery'],300); ?></p></a>
                                                </div>
                                            </div>
                                        </div>
                                       <?php } } ?> 

                                    </div>
                                </div>
                            </div>
                        </div>