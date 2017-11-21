                            <div class="col-lg-6">
                                <div class="mot-dimot">
                                    <h2 class="text-center"><a href="#">মত-দ্বিমত</a></h2>
                                    <?php
                                         $colnews = new Columnistnews();
                                          $motdimotNews = $colnews->getAllmotdimotNews();
                                          if ($motdimotNews) {
                                            while ($result = $motdimotNews->fetch_assoc()) {
                                      ?> 
                                    <div class="m-contents">
                                        <div class="col-lg-4">
                                            <a href="singleColmnistnews.php?colN=<?php echo $result['news_url']; ?>">
                                                <img src="global-panel/<?php echo $result['image']; ?>" alt="khaleda" class="img-circle"/>
                                            </a>
                                        </div>
                                        <div class="col-lg-8 m-contents-likha">
                                             
                                            <a href="singleColmnistnews.php?colN=<?php echo $result['news_url']; ?>"><?php echo $result['news_title']; ?></a>
                                           
                                        </div>
                                    </div>
                                  <?php } } ?>    

                                </div>
                                <!--=======Sakhatkar part start here=========-->
                                