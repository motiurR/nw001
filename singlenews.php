<?php include 'inc/header.php';?>
<?php include 'inc/breakingnews.php';?>
<?php
	$db = new Database();
?>

<?php
  if (!isset($_GET['nurl']) || $_GET['nurl'] == NULL) { /*index page er id dhorchi*/
    header("Location:404.php"); /*tar mane page na paile*/
  }else{
    $singleid = $_GET['nurl'];
  }
?>

<div class="container">
	<div class="row">

<?php
      $nws = new NewsAddN();
       $singlenews = $nws->getsinglenews($singleid);
       if ($singlenews) {
        while ($result = $singlenews->fetch_assoc()) {
        $news_id = $_SESSION["getnews"] = $result['news_id'];
          //$newsid = $result['news_id']; /*onno jaigai use korar jonno*/
          $newhits = $result['hits']+1;
          $query = "UPDATE tbl_newses SET hits = '$newhits' WHERE news_url = '$singleid'";
          $db->update($query);
?>
	<p><?php echo $result['news_details']; ?></p>

<?php } }?>

	</div>
</div>