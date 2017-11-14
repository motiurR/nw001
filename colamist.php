<?php include 'inc/header.php';?>
<?php include 'inc/breakingnews.php';?>
<?php
    $fm = new Format();
?>


<div class="kolamist_page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">

                            <?php
                                 $news = new Columnistnews();
                                  $colamistNews = $news->getcolamistNewsWithprof();
                                  if ($colamistNews) {
                                    while ($result = $colamistNews->fetch_assoc()) {
                              ?>

                            <div class="col-lg-4">
                                <div class="thumbnail thumbnail-content">
                                    <a href="#"><img src="global-panel/<?php echo $result['image']; ?>" alt="Bonna Mirjja"></a>
                                    <div class="author_holder">
                                        <span><i class="fa fa-user-o" aria-hidden="true"></i><?php echo $result['author']; ?></span>
                                    </div>
                                    <div class="caption likha">
                                        <h3>
                                            <a href="singleColmnistnews.php?colN=<?php echo $result['news_url']; ?>"><?php echo $result['news_title']; ?></a>
                                        </h3>
                                        <a href="singleColmnistnews.php?colN=<?php echo $result['news_url']; ?>" class="details">
                                            <p><?php echo $fm->textShorten($result['news_summery']); ?></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } } ?>    

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <?php include 'inc/colamistlist.php';?>
                    </div>
                </div>
            </div>
        </div

         <?php include 'inc/footer.php';?>