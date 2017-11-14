    <div class="col-lg-4">
        <div class="thumbnail total-thumbnail-content">
            <a href="#"><h1>নারী</h1></a>
            <hr />
        <?php
             $news = new NewsAddN();
              $interviewNews = $news->getLastOneWomenNews();
              if ($interviewNews) {
                while ($result = $interviewNews->fetch_assoc()) {
        ?>
            <div class="total-thumbnail-content-2">
                <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><img src="global-panel/<?php echo $result['image']; ?>" alt="Nari"></a>
                <div class="caption texts">
                    <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><h3><?php echo $result['news_title']; ?></h3></a>
                    <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>" class="details"><p><?php echo $fm->textShorten($result['news_summery']); ?></p></a>
                </div>
            </div>
        <?php } } ?>    

        </div>
    </div>