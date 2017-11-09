                  <?php
                         $news = new Cartoon();
                          $cartoonNews = $news->getlastOneCartoonlNews();
                          if ($cartoonNews) {
                            while ($result = $cartoonNews->fetch_assoc()) {
                    ?> 

              <div class="col-lg-4">
                        <div class="thumbnail total-thumbnail-content">
                            <a href="#"><h1>কার্টুন</h1></a>
                            <hr />
                            <div class="total-thumbnail-content-2">
                                <a href=""><img src="admin/<?php echo $result['image']; ?>" alt="katuron"></a>
                                <div class="caption texts">
                                    <a href=""><h3><?php echo $result['news_title']; ?></h3></a>

                                    <a href="" class="details"><p><?php echo $fm->textShorten($result['news_summery']); ?></p></a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } } ?> 