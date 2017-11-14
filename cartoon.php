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
                                 $crtn = new Cartoon();
                                  $cartoonTNews = $crtn->getcartoonTopNews();
                                  if ($cartoonTNews) {
                                    while ($result = $cartoonTNews->fetch_assoc()) {
                              ?>

                                <div class="col-lg-8">
                                    <a href="singlcartoonenews.php?cartn=<?php echo $result['news_url']; ?>">
                                        <img src="global-panel/<?php echo $result['image']; ?>" alt="BPL" class="img-responsive"/>
                                    </a>
                                </div>
                            

                                <div class="col-lg-4">
                                    <div class="details">
                                        <h3>
                                            <a href="singlcartoonenews.php?cartn=<?php echo $result['news_url']; ?>"><?php echo $result['news_title']; ?></a>
                                        </h3>
                                        <p>
                                            <a href="singlcartoonenews.php?cartn=<?php echo $result['news_url']; ?>"><?php echo $fm->textShorten($result['news_summery']); ?></a>
                                        </p>
                                    </div>
                                </div>
                              <?php } } ?>  

                            </div>

                            <?php
                                 $crtn = new Cartoon();
                                  $cartoonAllTNews = $crtn->getAllcartoonNewsinner();
                                  if ($cartoonAllTNews) {
                                    while ($result = $cartoonAllTNews->fetch_assoc()) {
                              ?>
                             <div class="col-lg-6">
                                <div class="content">
                                    <div class="col-lg-6">
                                        <a href="singlcartoonenews.php?cartn=<?php echo $result['news_url']; ?>">
                                            <img src="global-panel/<?php echo $result['image']; ?>" alt="Dhoni" class="img-responsive"/>
                                        </a>
                                    </div>
                                    <div class="col-lg-6">
                                        <h3><a href="singlcartoonenews.php?cartn=<?php echo $result['news_url']; ?>"><?php echo $result['news_title']; ?></a></h3>
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