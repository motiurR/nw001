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

        <!----here css file link hrer --->
        <link rel="stylesheet" href="css/style.css" /><!-- jQuery link here-->
        <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
    </head>
    <body>
        <header>
            <div class="container main-content">
                <div class="row">
                    <div class="logo col-lg-6">
                        <a href="index.php">
                            <img src="images/logo2.png" alt="logo" />
                        </a>
                    </div>
                    <div class="date col-lg-6">
                        <p id="demo"></p>
                        <script>
                            document.getElementById("demo").innerHTML = Date();
                        </script>
                        <hr />
                        <div class="add">
                            <h1>Add</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!--Navbar start here=-->

          <div class="navbar navbar-default menu">
                <nav class="container menu-items">
                    <div class="navbar-header" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle-center" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="glyphicon glyphicon-menu-hamburger"></span>
                            <span class="navmenu">MENU</span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse navbar-nav-justified menu-items-contents" id="bs-example-navbar-collapse-1">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#">নীড়পাতা</a></li>
                            <li><a href="#">রাজনীতি</a></li>
                            <li><a href="#">সারা বাংলা</a></li>
                            <li><a href="#">অর্থনীতি</a></li>
                            <li><a href="#">আন্তর্জাতিক</a></li>
                            <li><a href="#">খেলা</a></li>
                            <li><a href="#">বিনোদন</a></li>
                            <li><a href="#">ফিচার</a></li>
                            <li><a href="#">আজব নিউজ</a></li>
                            <li><a href="#">কলাম</a></li>
                        </ul>
                    </div>
                </nav>
               </div> 
           
        </header>