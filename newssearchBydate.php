<?php include 'inc/header.php';?>
<?php include 'inc/breakingnews.php';?>

<div class="container">
	<div class="row">

				<?php
				    $newsN = new NewsAddN();
				    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				        $getnews = $newsN->getnewsByid($_POST);
				         if ($getnews) {
				           while ($result = $getnews->fetch_assoc()) {
				        ?>
							   

			       			 <h><?php echo $result['news_title']; ?></h>,

			    <?php } }  }?>
	</div>
</div>