<?php include 'inc/header.php';?>
<?php include 'inc/breakingnews.php';?>

<?php
    $fm = new Format();
?>
        <!-- News Content start here -->
        <div class="news">
            <div class="container">
                <div class="row">
                    <!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ News Protal Left Part start here @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
                    <div class="news-content col-lg-6">
                    <?php
                        $news = new NewsAddN();
                        $superTopNews = $news->getSuperTopNews();
                        if ($superTopNews) {
                       while ($result = $superTopNews->fetch_assoc()) {
                    ?>
                        <div class="main-news">
                            <h2><a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><?php echo $result['news_title']; ?></a></h2>
                            <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>" class="img"><img src="global-panel/<?php echo $result['image']; ?>" alt="" class="img-responsive"/></a>
                            <h4><a href="#"><?php echo $fm->textShorten($result['news_summery']); ?></a></h4>
                        </div>
                    <?php } } ?>    
                        <!-- Sokaridol birodhidol part start here-->
                        <?php include 'inc/govmentOposit.php';?>
                        <!-- Sokaridol birodhidol part end here-->
                    </div>
                    <!--@@@@@@@@@@@@@ News Protal Left Part end here @@@@@@@@@@@@@@@@-->



                    <!--$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$  News Protal Right part start here $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$-->
                    <div class="col-lg-6">
                        <div class="row">
                        <!-- Mot-Demot part start here -->
                        <?php include 'inc/motdimot.php';?>

                            <!--=======Sakhatkar part start here=========-->
                            <?php include 'inc/interview.php';?>
                            <!--=======Sakhatkar part end here=========-->

                            <!--Sorborcho Sorbadhik Part start here-->
                            <div class="col-lg-6">
                                <?php include 'inc/recentPopular.php';?>
                            </div>
                            <!--Sorborcho Sorbadhik Part end here-->
                        </div>
                    </div>
                    <!--$$$$$$$$$$$$$$$  News Protal Right part start here $$$$$$$$$$$$$$$$$$$$-->
                </div>
            </div>
        </div>

        <!-- Khali Part start here-->
        <div class="khali-part">
            <div class="container">
                <div class="row">
                    <div class="content">

                    </div>
                </div>
            </div>
        </div>
        <!-- Khali Part end here-->

        <!-- jatio news Part start here-->
        <div class="jatio-news">
            <div class="container">
                <div class="row">
                   <!-- jatio news Part start here-->
                   <?php include 'inc/nationalnews.php';?>
                    <!-- jatio news Part end here-->

                    <!-- Facebook like box Part start here-->
                    <?php include 'inc/facebookbox.php';?>
                    <!-- Facebook like box Part end here-->
                </div>
            </div>
        </div>

        <!--Advertise part start here-->
        <div class="advertise">
            <div class="container">
                <div class="row">
                    <div class="add-content">

                    </div>
                </div>
            </div>
        </div>
        <!--Advertise part end here-->


        <!--Kheladhula part start here-->
        <?php include 'inc/sports.php';?>
        <!--Kheladhula part end here-->

        <!--Rajniti part start here-->
        <?php include 'inc/political.php';?>
        <!--Rajniti part end here-->


        <!--Internation Orthoniti part start here-->
        <div class="international">
            <div class="container">
                <div class="row">

            <?php include 'inc/international.php';?>

                    <!--Aourthoniti part start here-->
            <?php include 'inc/economical.php';?>  
                    <!--Aourthoniti part end here-->
                </div>
            </div>
        </div>
        <!--Internation Orthoniti part end here-->


        <!--Binodon part start here-->
    <?php include 'inc/entertainment.php';?> 
        <!--Binodon part end here-->

        <!--sikhha part start here-->
    <?php include 'inc/education.php';?>    
        <!--sikhha part end here-->


        <!--Technology Life-style part start here-->
        <div class="technology-lifestyle">
            <div class="international">
                <div class="container">
                    <div class="row">

               <!--technology part start here-->         
                <?php include 'inc/technology.php';?>
                <!--technology part end here-->  
                        
                        <!--life style part start here-->
                  <?php include 'inc/lifestyle.php';?>      
                        <!--lifestyle part end here-->
                    </div>
                </div>
            </div>
        </div>
        <!--Technology Life-style part end here-->


        <!--Nari-Bichitro-khobor-carton part start here-->
        <div class="nbck">
            <div class="container">
                <div class="row">

                    <!-- nari section start -->
                 <?php include 'inc/women.php';?>   
                    <!-- nari section start -->

                    <!-- bicitro khobor start -->
                 <?php include 'inc/bicitro.php';?>    
                    <!-- bicitro khobor end -->

                    <!-- kartun start here -->
                    <?php include 'inc/cartoon.php';?> 
                     <!-- kartun end here -->

                </div>
            </div>
        </div>
        <!--Nari-Bichitro-khobor-carton part end here-->

        <!-- footer section start -->
        <?php include 'inc/footer.php';?> 
        <!-- footer section end -->





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
    </body>
</html>
