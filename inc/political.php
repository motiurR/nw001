<div class="rajniti-part">
            <div class="container">
                <div class="row">
                    <div class="rajniti-part-2">
                        <div class="col-lg-9">
                                <div class="total-content">
                                    <a href="#"><h1>রাজনীতি</h1></a>
                                    <hr />

                            <?php
                                 $news = new NewsAddN();
                                  $cricketTNews = $news->getTopPoliticalNews();
                                  if ($cricketTNews) {
                                    while ($result = $cricketTNews->fetch_assoc()) {
                              ?>    
                                <div class="main_news">
                                    <div class="col-lg-8">
                                        <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>">
                                          <img class="main-image" src="global-panel/<?php echo $result['image'];?>" alt="Mirjja Fokrul" />
                                        </a>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="rajniti-content">
                                            <h2><a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><?php echo $result['news_title']; ?></a></h2>
                                            <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><p><?php echo $fm->textShorten($result['news_summery']); ?></p></a>
                                        </div>
                                    </div>
                                  </div>  
                                <?php } } ?>    
                                    <div class="row">
                                        <div class="col-lg-12">

                                      <?php
                                         $news = new NewsAddN();
                                          $cricketTNews = $news->getAllPoliticalNews();
                                          if ($cricketTNews) {
                                            while ($result = $cricketTNews->fetch_assoc()) {
                                      ?>

                                            <div class="col-lg-4">
                                                <div class="thumbnail thumbnail-contents">
                                                    <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="Rain"></a>
                                                    <div class="caption thumbnail-caption">
                                                        <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><h3><?php echo $result['news_title']; ?></h3></a>
                                                    </div>
                                                </div>
                                            </div>

                                      <?php } } ?>   
                                            
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="row">

                            </div>
                        </div>
                    </div>
                    <!--Rajnit Thumbnail start here-->
                    <div class="row">

                    </div>
                    <!--Rajnit Thumbnail end here-->
                </div>
            </div>
        </div>