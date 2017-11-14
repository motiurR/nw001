                        <div class="sorkaridol-birodhidol">
                            <div class="row">
                                <div class="col-lg-6">
                               <?php
                                    $news = new NewsAddN();
                                     $govmentNews = $news->getAllgovmentNews();
                                    if ($govmentNews) {
                                    while ($result = $govmentNews->fetch_assoc()) {
                                ?>     

                                    <div class="sorkaridol-content">
                                        <h1>
                                            <a href="#">সরকারী দল</a>
                                        </h1>
                                        <div class="thumbnail thumbnail-content">
                                            <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>">
                                                <img src="global-panel/<?php echo $result['image'];?>" alt="kader">
                                            </a>
                                            <div class="caption text">
                                                <h4><a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><?php echo $result['news_title']; ?></a></h4>
                                            </div>
                                        </div>
                                    </div>
                               <?php } } ?>     

                                </div>
                                <div class="col-lg-6">
                                <?php
                                    $news = new NewsAddN();
                                     $opositeNews = $news->getAllopositeNews();
                                    if ($opositeNews) {
                                    while ($result = $opositeNews->fetch_assoc()) {
                                ?>

                                    <div class="sorkaridol-content">
                                        <h1>
                                            <a href="#">বিরোধী দল</a>
                                        </h1>
                                        <div class="thumbnail thumbnail-content">
                                            <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>">
                                                <img src="global-panel/<?php echo $result['image'];?>" alt="bnp">
                                            </a>
                                            <div class="caption text">
                                                <h4><a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><?php echo $result['news_title']; ?></a></h4>
                                            </div>
                                        </div>
                                    </div>
                                <?php } } ?>    

                                </div>
                            </div>
                        </div>
