<div class="col-lg-4">
                <div class="thumbnail total-thumbnail-content">
                    <a href="cartoon.php"><h1>কার্টুন</h1></a>
                    <hr />

                    <?php
                          $crtn = new Cartoon();
                          $educationNews = $crtn->getOneCartoonNews();
                          if ($educationNews) {
                            while ($result = $educationNews->fetch_assoc()) {
                     ?>
                    <div class="total-thumbnail-content-2">
                        <a href="singlcartoonenews.php?cartn=<?php echo $result['news_url']; ?>"><img src="global-panel/<?php echo $result['image']; ?>" alt="Nari"></a>
                        <div class="caption texts">
                            <h3><a href="singlcartoonenews.php?cartn=<?php echo $result['news_url']; ?>"><?php echo $result['news_title']; ?></a></h3>
                        </div>
                    </div>
                    <?php } } ?>

                    <?php
                          $crtn = new Cartoon();
                          $educationNews = $crtn->getAllCartoonNewsformain();
                          if ($educationNews) {
                            while ($result = $educationNews->fetch_assoc()) {
                     ?>

                    <div class="total-thumbnail-content-3">
                        <div class="col-lg-5">
                            <a href="singlcartoonenews.php?cartn=<?php echo $result['news_url']; ?>">
                                <img src="global-panel/<?php echo $result['image']; ?>" alt="" />
                            </a>
                        </div>
                        <div class="col-lg-7">
                            <h4><a href="singlcartoonenews.php?cartn=<?php echo $result['news_url']; ?>"><?php echo $result['news_title']; ?></a></h4>
                        </div>
                    </div>
                    <?php } } ?>


                </div>
            </div>
        </div>
    </div>
</div>