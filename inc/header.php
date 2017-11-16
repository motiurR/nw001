<?php
    include 'lib/Database.php';
    include 'helpers/Format.php';
    /*sob class gula akbare load kora*/
    spl_autoload_register(function($class){
        include_once "classes/".$class.".php";
    });
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>NewsPortal</title>

        <!-- Bootstrap v3.3.7 -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />

        <!-- here css file link hrer  -->
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/inner-page.css" />
        <link rel="stylesheet" href="css/kolamist.css" />
        <link rel="stylesheet" href="css/kolamist_profile.css" />
        <link rel="stylesheet" href="css/archive.css" />
        <link rel="stylesheet" href="css/news-view.css" />
        <link rel="stylesheet" href="css/map.css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" />

        <!-- jQuery link here -->
        <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </head>
    <body>
       <header>
            <div class="col-lg-12">
             <p id="demo" class="text-center">
                <script type="text/javascript" src="http://bangladate.appspot.com/index4.php"></script>
             </p>
            </div>
            <div class="container main-content">
                <div class="row">
                    <div class="logo col-lg-6">
                  <?php
                         $logo = new TitleSloganLogo();
                          $getlogo = $logo->getLogiIcon();
                          if ($getlogo) {
                            while ($result = $getlogo->fetch_assoc()) {
                   ?>
                        <a href="index.php">
                            <img src="global-panel/<?php echo $result['logo']; ?>" alt="logo" class="img-responsive"/>
                        </a>
                    <?php } } ?>    

                    </div>
                    <div class="date col-lg-6">
                        <div class="add">

                        </div>
                    </div>
                </div>
            </div>
            <!--Navbar start here --->
            <nav class="navbar menu" data-spy = "affix" data-offset-top= "197">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse menu-item" id="bs-example-navbar-collapse-1">
                        <ul class="nav nav-justified menu-item-content">
                            <li>
                                <a href="index.php" class="menu-items">নীড়পাতা</a>
                            </li>
                            <li>
                                <a href="political.php" class="menu-items">রাজনীতি</a>
                            </li>
                            <li>
                                <a href="allbangladesh.php" class="menu-items">সারা বাংলা</a>
                            </li>
                            <li>
                                <a href="economic.php" class="menu-items">অর্থনীতি</a>
                            </li>
                            <li>
                                <a href="international.php" class="menu-items">আন্তর্জাতিক</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle menu-items" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">খেলা<i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu dropdown-content">
                                    <li><a href="cricket.php">ক্রিকেট</a></li>
                                    <li><a href="footbal.php">ফুটবল</a></li>
                                    <li><a href="otherssports.php">অন্যান্য</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle menu-items" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">বিনোদন<i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu dropdown-content">
                                    <li><a href="dhallywood.php">ঢালিউড</a></li>
                                    <li><a href="bollywood.php">বলিউড</a></li>
                                    <li><a href="hollywood.php">হলিউড</a></li>
                                    <li><a href="otherentertainments.php">অন্যান্য</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle menu-items" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ফিচার<i class="fa fa-chevron-down" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu dropdown-content">
                                    <li><a href="technology.php">তথ্যপ্রযুক্তি</a></li>
                                    <li><a href="probas.php">প্রবাস</a></li>
                                    <li><a href="facebookkothon.php">ফেসবুক কথন</a></li>
                                    <li><a href="lifestyle.php">জীবনযাপন</a></li>
                                    <li><a href="women.php">নারী</a></li>
                                    <li><a href="sahitto.php">সাহিত্য</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="bicitrokhobor.php" class="menu-items">বিচিত্র খবর</a>
                            </li>
                            <li>
                                <a href="colamist.php" class="menu-items">কলাম</a>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
                <script type="text/javascript">
                    $('.dropdown').hover(
                            function () {
                                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
                            },
                            function () {
                                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
                            }
                    );

                    $('.dropdown-menu').hover(
                            function () {
                                $(this).stop(true, true);
                            },
                            function () {
                                $(this).stop(true, true).delay(200).fadeOut();
                            }
                    );
                </script>
            </nav>
        </header>