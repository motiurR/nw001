<div class="col-lg-4">
        <div class="thumbnail total-thumbnail-content">
            <a href="#"><h1>বিচিত্র খবর</h1></a>
            <hr />

        <?php
             $news = new NewsAddN();
              $interviewNews = $news->getLastOneBicitroNews();
              if ($interviewNews) {
                while ($result = $interviewNews->fetch_assoc()) {
        ?>

            <div class="total-thumbnail-content-2">
                <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="Bicitro"></a>
                <div class="caption texts">
                    <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>"><h3>ক্যাকটাস কাহন</h3></a>
                    <a href="singlenews.php?nurl=<?php echo $result['news_url']; ?>" class="details"><p>ক্যাকটাস ‘ক্যাকেটসিয়া’ পরিবারের অন্তর্ভুক্ত উদ্ভিদ। প্রায় দুই হাজার জাতের ক্যাকটাস রয়েছে। ক্যাকটাসের ছবিটি সম্প্রতি রাজধানীর জাতীয় </p></a>
                </div>
            </div>
        <?php } } ?>    


        </div>
    </div>