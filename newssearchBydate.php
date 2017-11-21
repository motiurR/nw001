<?php include 'inc/header.php';?>
<?php include 'inc/breakingnews.php';?>

        <div class="archive_page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="archive_content">
                            <h2>আর্কাইভ</h2>
                            <hr />
                            <div class="row">
                            <?php
							    $newsN = new NewsAddN();
							    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
							        $getnews = $newsN->getnewsByid($_POST);
							         if ($getnews) {
							           while ($result = $getnews->fetch_assoc()) {
							 ?>	

                                <div class="col-lg-3">
                                    <div class="thumbnail thumbnail_content">
                                        <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><img src="global-panel/<?php echo $result['image']; ?>" alt="Liton" class="img-responsive"></a>
                                        <div class="caption">
                                            <h4><a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><?php echo $result['news_title']; ?></a></h4>
                                        </div>
                                    </div>
                                </div>

                            <?php } } }?> 
                            
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <?php include 'inc/recentPopular.php';?>
                    </div>
                    
                   
                </div>
            </div>
        </div>


                <!-- bootstarp min js link here-->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

        <!--Back to top button js work-->
        <script type="text/javascript">
                $(document).ready(function () {


                    $(window).scroll(function () {
                        if ($(this).scrollTop() > 100) {
                            $('#back-to-top').fadeIn();
                        } else {
                            $('#back-to-top').fadeOut();
                        }
                    });
                    // scroll body to 0px on click
                    $('#back-to-top').click(function () {
                        $('#back-to-top').tooltip('hide');
                        $('body,html').animate({
                            scrollTop: 0
                        }, 800);
                        return false;
                    });
                    $('#back-to-top').tooltip('show');
                });
        </script>


<?php include 'inc/footer.php';?>