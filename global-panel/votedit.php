<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/VotingPool.php';?>
<?php
     if (!Session::get('level') == '0') { 
        echo "<script>window.location = 'index.php';</script>";
     }
?>

<?php
    if (!isset($_GET['vid']) || $_GET['vid'] == NULL) { 
        echo "<script>window.location = 'questionanslist.php';</script>";
    }else{
        $id =  $_GET['vid'];
    }
?>

<?php
    $pool = new VotingPool();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        $updateData = $pool->updateQuestionData($_POST,$id);
    }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Question And Answer</h2>
               <div class="block copyblock"> 

               <p style="text-align: center;">
                  <?php
                     if (isset($updateData)) {
                         echo $updateData;
                     }
                   ?>
               </p>

          <?php
               $pool = new VotingPool();
                $getquestionans = $pool->getquestionansById($id);
                if ($getquestionans) {
                  while ($value = $getquestionans->fetch_assoc()) {
            ?>      

                 <form action="" method="POST">
                    <table class="form">	

                        <tr>
                            <td>
                                <label>Enter Question</label>
                            </td>
                            <td>
                                <input type="text" name="question" value="<?php echo $value['question'];?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Ans One</label>
                            </td>
                            <td>
                                <input type="text" name="ans1" value="<?php echo $value['ans1'];?>" class="medium" required="" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Ans two</label>
                            </td>
                            <td>
                                <input type="text" name="ans2" value="<?php echo $value['ans2'];?>" class="medium" required="" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Ans Three</label>
                            </td>
                            <td>
                                <input type="text" name="ans3" value="<?php echo $value['ans3'];?>" class="medium" required="" />
                            </td>
                        </tr>
                        
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
               <?php } } ?>     
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>