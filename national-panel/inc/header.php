<?php
    include '../lib/Session.php';
    Session::checkSession();
?>

<?php
  header('Content-type: text/html; charset=utf-8');
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<?php
     if (isset($_GET['action']) && $_GET['action'] == "logout") {
         Session::destroy();
    }
 ?> 
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
	 <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>

</head>
<body>
    <div class="container_12">
        <!-- <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">
                     <img style="height: 35px;width: 200px;margin-top: 1px;" src="img/livelogo.png" alt="Logo" /> 
				</div>
                
                <div class="clear">
                </div>
            </div>
        </div> -->
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="../national-panel/index.php"><span>Dashboard</span></a> </li>
            <?php
                if (Session::get('level') == '0') { ?>
                <li class="ic-form-style"><a href="AddnUser.php"><span>Add User</span></a></li>
            <?php } ?>
               <li class="ic-form-style"><a href="usernlist.php"><span>User List</span></a></li>  
				<li class="ic-charts"><a href="changeadminpas.php"><span>Change Password</span></a></li>
                <li class="ic-grid-tables"><a href="cusinbox.php"><span>Inbox</li>
                <li class="ic-charts"><a href="../index2.php" target="_blank"><span>Visit Website</span></a></li>
                <li class="ic-grid-tables"><a href="?action=logout"><span>Logout</li>
                    
            </ul>
        </div>
        <div class="clear">
        </div>
    