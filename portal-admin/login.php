<?php include '../classes/AdminLogin.php';?>

<?php
	$admnlgn = new AdminLogin();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$loginChk = $admnlgn->cheachAdminLogin($_POST);
	}
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="POST">
			<h1>Admin Login</h1>
			<!-- show the error -->
			<span style="color: red; font-size: 18px">
				<?php
					if (isset($loginChk)) {
						echo $loginChk;
					}
				?>
			</span>

			<div>
				<input type="text" name="adminEmail" placeholder="Enter Email" />
			</div>
			<div>
				<input type="password" name="adminPassword" placeholder="Enter Password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form>
		<div class="button">
			<a href="forgetpass.php">Forgot Password</a>
		</div>
		<div class="button">
			<a href="../index.php">VisiteSite</a>
		</div>
	</section>
</div>
</body>
</html>