    <?php
        $pool = new VotingPool();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $insertpool = $pool->addPollData($_POST);
    }
?>

        <div class="col-lg-6">
            <div class="news_pool">

                <h1><?php echo $pollData['poll']['subject']; ?></h1>
           

                <div class="news_pool_option">
            
                    <form action="" method="POST">
            <?php
                  $pullOption = $pool->AgelAllPoolOption();
                  if ($pullOption) {
                    while ($result = $pullOption->fetch_assoc()) {
             ?>
                        <div class="radio">
                            <label>
                                <input type="radio" name="blankRadio" id="blankRadio1" value="option1" aria-label="..."><?php echo $result['name'];?>
                            </label>
                         </div>
            <?php } }?>                

                  </form>

                  


                    <div class="vote_counter">
                        <h5>ভোট দিয়েছেন ৫৮৬ জন ।</h5>
                    </div>
                    <button class="btn btn-default pull-right" type="submit">ভোট দিন</button>
                    <div class="pool_counter">
                        <h4>হ্যাঁ = ৫৫%। </h4>
                        <h4>না = ১০%। </h4>
                        <h4>কোনটি নয় = ০৯%। </h4>
                    </div>
                </div>
              
            </div>
        </div>