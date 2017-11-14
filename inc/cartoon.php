                  <?php
                         $news = new Cartoon();
                          $cartoonNews = $news->getlastOneCartoonlNews();
                          if ($cartoonNews) {
                            while ($result = $cartoonNews->fetch_assoc()) {
                    ?> 

              <div class="col-lg-4">
                        <div class="thumbnail total-thumbnail-content">
                            <a href="cartoon.php"><h1>কার্টুন</h1></a>
                            <hr />
                            <div class="total-thumbnail-content-2">
                                <a href="singlcartoonenews.php?cartn=<?php echo $result['news_url']; ?>"><img src="global-panel/<?php echo $result['image']; ?>" alt="katuron"></a>
                                <div class="caption texts">
                                    <a href="singlcartoonenews.php?cartn=<?php echo $result['news_url']; ?>"><h3><?php echo $result['news_title']; ?></h3></a>

                                    <a href="singlcartoonenews.php?cartn=<?php echo $result['news_url']; ?>" class="details"><p><?php echo $fm->textShorten($result['news_summery']); ?></p></a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } } ?> 