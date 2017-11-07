 <div class="col-lg-6">
                        <div class="jatio-content">
                            <h1><a href="#">জাতীয় খবর</a></h1>
                            <hr />
                        <?php
                            $news = new NewsAddN();
                            $nationalNews = $news->getNationalNews();
                            if ($nationalNews) {
                            while ($result = $nationalNews->fetch_assoc()) {
                        ?>
                            <div class="col-lg-6">
                                <div class="thumbnail thumbnail-content">
                                    <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="taskin"></a>
                                    <div class="caption">
                                        <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><h4><?php echo $result['news_title']; ?></h4></a>
                                    </div>
                                </div>
                            </div>
                        <?php } }?>

                        </div>
                    </div>