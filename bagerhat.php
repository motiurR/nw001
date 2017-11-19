<?php include 'inc/header.php';?>
<?php include 'inc/breakingnews.php';?>
<?php
    $fm = new Format();
?>

<div class="inner_page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="main_content">

                            <?php
                                 $news = new NewsAddN();
                                  $bagerhattNews = $news->bagerhatTopNews();
                                  if ($bagerhattNews) {
                                    while ($result = $bagerhattNews->fetch_assoc()) {
                              ?>

                                <div class="col-lg-8">
                                    <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>">
                                        <img src="global-panel/<?php echo $result['image']; ?>" alt="BPL" class="img-responsive"/>
                                    </a>
                                </div>
                            

                                <div class="col-lg-4">
                                    <div class="details">
                                        <h3>
                                            <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><?php echo $result['news_title']; ?></a>
                                        </h3>
                                        <p>
                                            <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><?php echo $fm->textShorten($result['news_summery']); ?></a>
                                        </p>
                                    </div>
                                </div>
                              <?php } } ?>  

                            </div>

                            <?php
                                 $news = new NewsAddN();
                                  $bagerhatalNews = $news->bagerhatallNews();
                                  if ($bagerhatalNews) {
                                    while ($result = $bagerhatalNews->fetch_assoc()) {
                              ?>
                             <div class="col-lg-6">
                                <div class="content">
                                    <div class="col-lg-6">
                                        <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>">
                                            <img src="global-panel/<?php echo $result['image']; ?>" alt="Dhoni" class="img-responsive"/>
                                        </a>
                                    </div>
                                    <div class="col-lg-6">
                                        <h3><a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><?php echo $result['news_title']; ?></a></h3>
                                    </div>
                                </div>
                            </div>
                         <?php } } ?> 



                            
                        </div>
                    </div>
                    <div class="col-lg-3">
                       <?php include 'inc/recentpopular.php';?>
                    </div>
                </div>
            </div>
        </div>

       <?php include 'inc/footer.php';?>