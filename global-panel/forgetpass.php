<?php include '../classes/AdminLogin.php';?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>PasswordRecovery</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">

	<section id="content">

		<form action="" method="POST">
			<h1 style="margin-bottom: 20px;">Password Recovery</h1>

			<?php
				$admnlgn = new AdminLogin(); 
				if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
					$resetpass = $admnlgn->getResetPass($_POST); 
				}
			?>
				<?php
					if (isset($resetpass)) {
						echo $resetpass;
					}
				?>
			<div>
				<input type="text" name="email" placeholder="enter email please"/>
			</div>
			<div>
				<input type="submit" value="Send Mail" />
			</div>
		</form>
		<div class="button">
			<a href="login.php">Click Here To Login</a>
		</div>
		<div class="button">
			<a href="../index.php">Visit Your Site</a>
		</div>

	</section>

</div>
</body>
</html>