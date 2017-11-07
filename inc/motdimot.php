                            <div class="col-lg-6">
                                <div class="mot-dimot">
                                    <h2 class="text-center"><a href="#">মত-দ্বিমত</a></h2>
                                    <div class="m-contents">
                                        <?php
                                             $news = new NewsAddN();
                                              $motdimotNews = $news->getAllmotdimotNews();
                                              if ($motdimotNews) {
                                                while ($result = $motdimotNews->fetch_assoc()) {
                                          ?> 
                                        <div class="col-lg-4">
                                            <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>">
                                                <img src="admin/<?php echo $result['image']; ?>" alt="khaleda" class="img-circle"/>
                                            </a>
                                        </div>
                                        <div class="col-lg-8 m-contents-likha">
                                             
                                            <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><?php echo $result['news_title']; ?></a>
                                           
                                        </div>
                                     <?php } } ?>    
                                    </div>
                                </div>
                                <!--=======Sakhatkar part start here=========-->
                                