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
                                  $economicTNews = $news->getTopEconomicalNews();
                                  if ($economicTNews) {
                                    while ($result = $economicTNews->fetch_assoc()) {
                              ?>

                                <div class="col-lg-8">
                                    <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>">
                                        <img src="admin/<?php echo $result['image']; ?>" alt="BPL" class="img-responsive"/>
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
                                  $economicalAllTNews = $news->getAllEconomicalNewsinner();
                                  if ($economicalAllTNews) {
                                    while ($result = $economicalAllTNews->fetch_assoc()) {
                              ?>
                             <div class="col-lg-6">
                                <div class="content">
                                    <div class="col-lg-6">
                                        <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>">
                                            <img src="admin/<?php echo $result['image']; ?>" alt="Dhoni" class="img-responsive"/>
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