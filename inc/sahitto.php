<div class="rajniti-part">
    <div class="container">
        <div class="row">
            <div class="rajniti-part-2">
                <div class="col-lg-8">
                    <div class="total-content">
                        <a href="#"><h1>সাহিত্য</h1></a>
                        <hr />
                        <div class="main_news">
                        <?php
                             $news = new NewsAddN();
                              $sahittoNews = $news->getTopSahittoNews();
                              if ($sahittoNews) {
                                while ($result = $sahittoNews->fetch_assoc()) {
                         ?>
                            <div class="col-lg-8">
                                <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>">
                                    <img class="main-image" src="global-panel/<?php echo $result['image']; ?>" alt="Mirjja Fokrul" />
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <div class="rajniti-content">
                                    <h2><a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><?php echo $result['news_title']; ?></a></h2>
                                    <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><p><?php echo $fm->textShorten($result['news_summery']); ?></p></a>
                                </div>
                            </div>
                           <?php } } ?> 
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                        <?php
                             $news = new NewsAddN();
                              $sahittoNews = $news->getAllSahittoNews();
                              if ($sahittoNews) {
                                while ($result = $sahittoNews->fetch_assoc()) {
                         ?>
                                <div class="col-lg-4">
                                    <div class="thumbnail thumbnail-contents">
                                        <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><img src="global-panel/<?php echo $result['image']; ?>" alt="Rain"></a>
                                        <div class="caption thumbnail-caption">
                                            <h3><a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><?php echo $result['news_title']; ?></a></h3>
                                        </div>
                                    </div>
                                </div>
                          <?php } } ?>      
                            </div>
                        </div>
                    </div>
                </div>
                <!--Nari part start here-->
                <div class="nari">
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="nari-total-content">
                                <a href="#"><h1>নারী</h1></a>
                                <hr />

                            <?php
                                 $news = new NewsAddN();
                                  $nariNews = $news->getAllNariNews();
                                  if ($nariNews) {
                                    while ($result = $nariNews->fetch_assoc()) {
                             ?>
                                <div class="total-content-2">
                                    <div class="col-lg-5">
                                        <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>">
                                            <img src="global-panel/<?php echo $result['image']; ?>" alt="jibonjapon" />
                                        </a>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="details">
                                            <h4><a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><?php echo $result['news_title']; ?></a></h4>
                                        </div>
                                    </div>
                                </div>
                             <?php } } ?>   

                            </div>
                        </div>
                    </div>
                </div>
                <!--Nari part end here-->
            </div>
        </div>
    </div>
</div>