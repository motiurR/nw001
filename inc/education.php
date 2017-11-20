<div class="nbck">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="thumbnail total-thumbnail-content">
                    <a href="#"><h1>শিক্ষা</h1></a>
                    <hr />
                    <?php
                         $news = new NewsAddN();
                          $educationNews = $news->getOneEducationNews();
                          if ($educationNews) {
                            while ($result = $educationNews->fetch_assoc()) {
                     ?>
                    <div class="total-thumbnail-content-2">
                        <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><img src="global-panel/<?php echo $result['image']; ?>" alt="Nari"></a>
                        <div class="caption texts">
                            <h3><a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><?php echo $result['news_title']; ?></a></h3>
                        </div>
                    </div>
                    <?php } } ?>

                    <?php
                         $news = new NewsAddN();
                          $educationNews = $news->getAllEducationNewsformain();
                          if ($educationNews) {
                            while ($result = $educationNews->fetch_assoc()) {
                     ?>

                    <div class="total-thumbnail-content-3">
                        <div class="col-lg-5">
                            <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>">
                                <img src="global-panel/<?php echo $result['image']; ?>" alt="" />
                            </a>
                        </div>
                        <div class="col-lg-7">
                            <h4><a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><?php echo $result['news_title']; ?></a></h4>
                        </div>
                    </div>
                    <?php } } ?>

                </div>
            </div>