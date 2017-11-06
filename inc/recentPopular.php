<?php
    include_once "classes/NewsAddN.php";
?>
    <div class="col-lg-6">
        <div class="sorbcho-sorbadhik">
            <ul class="nav nav-pills btns nav-justified btns">
                <li class="active"><a data-toggle="tab" href="#home">সর্বশেষ</a></li>
                <li><a data-toggle="tab" href="#menu1">সর্বাধিক</a></li>
            </ul>
            <div class="tab-content text-justify titles">
                <div id="home" class="tab-pane fade in active">
                    <div class="list-group titles-items">
                      <?php
                         $news = new NewsAddN();
                          $recentNews = $news->getAllNRecentNews();
                          if ($recentNews) {
                            while ($result = $recentNews->fetch_assoc()) {
                      ?>  
                        <button type="button" class="list-group-item"><a href="#"><?php echo $result['news_title']; ?></a></button>
                      <?php } }?>  
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="list-group titles-items">
                      <?php
                         $news = new NewsAddN();
                          $popularNews = $news->getAllNPopularNews();
                          if ($popularNews) {
                            while ($popuresult = $popularNews->fetch_assoc()) {
                      ?>  
                        <button type="button" class="list-group-item"><a href="#"><?php echo $popuresult['news_title']; ?></a></button>
                      <?php } } ?>  
                    </div>
                </div>
            </div>
        </div>
    </div>