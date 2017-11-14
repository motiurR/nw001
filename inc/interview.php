        <div class="sakhatkar">
                <h2 class="text-center"><a href="#">সাক্ষাৎকার</a></h2>
                <div class="sakhatar-details">
                    <?php
                         $news = new NewsAddN();
                          $interviewNews = $news->getAllInterviewNews();
                          if ($interviewNews) {
                            while ($result = $interviewNews->fetch_assoc()) {
                     ?>
                    <div class="sakhtatkar-content">
                         
                        <div class="col-lg-4">
                            <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>">
                                <img src="global-panel/<?php echo $result['image']; ?>" alt="noname" class="img-responsive"/>
                            </a>
                        </div>
                        <div class="col-lg-8 text">
                            <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>">
                                <h4><?php echo $result['news_title']; ?></h4>
                            </a>
                        </div>
                        
                    </div><hr/>
                    <?php } } ?>
                </div>
            </div>
        </div>