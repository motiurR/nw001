<div class="rajniti-part">
            <div class="container">
                <div class="row">
                    <div class="rajniti-part-2">
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="total-content">
                                    <a href="#"><h1>শিক্ষা</h1></a>
                                    <hr />

                                <?php
                                     $news = new NewsAddN();
                                      $cricketTNews = $news->getTopEducationNews();
                                      if ($cricketTNews) {
                                        while ($result = $cricketTNews->fetch_assoc()) {
                                 ?>

                                    <div class="col-lg-8">
                                        <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>">
                                            <img class="main-image" src="global-panel/<?php echo $result['image']; ?>" alt="Mirjja Fokrul" />
                                        </a>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="rajniti-content">
                                            <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><h2><?php echo $result['news_title']; ?></h2></a>
                                            <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><p><?php echo $fm->textShorten($result['news_summery']); ?></p></a>
                                        </div>
                                    </div>
                                <?php } }?>


                                    <div class="row">
                                        <div class="col-lg-12">

                                <?php
                                     $news = new NewsAddN();
                                      $cricketTNews = $news->getAllEducationNews();
                                      if ($cricketTNews) {
                                        while ($result = $cricketTNews->fetch_assoc()) {
                                 ?>   

                                            <div class="col-lg-4">
                                                <div class="thumbnail thumbnail-contents">
                                                    <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="Rain"></a>
                                                    <div class="caption thumbnail-caption">
                                                        <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><h3><?php echo $result['news_title']; ?></h3></a>
                                                        <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>" class="details"><p><?php echo $fm->textShorten($result['news_summery']); ?></p></a>
                                                    </div>
                                                </div>
                                            </div>
                                  <?php } } ?>          
                                            
                                        </div>
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