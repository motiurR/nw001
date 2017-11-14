<?php
    include '../lib/Session.php';
    Session::checkSession();  /*login na thakle login page e pathai dibe*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>SelectAdmin</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="text-align: center;">
	<div class="row">
		<h2 style="text-align: center;padding: 40px;background: #cdcdcd;margin-bottom: 50px;">Plese Chose Your Admin Panel For Add Your News</h2>
        
		<div class="international col-md-6">
			<a href="../global-panel/index.php" class="btn btn-success">For All Country</a>
		</div>

		<div class="local col-md-6"">
			<a href="../national-panel/index.php" class="btn btn-primary">For Local Panel</a>
		</div>

	</div>
</div>
</body>
</html>