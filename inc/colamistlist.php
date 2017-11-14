<div class="kolamist_list">
            <h3>কলামিস্ট</h3>

                <?php
                 $news = new Columnistnews();
                  $colamistprofile = $news->getcolamistprofile();
                  if ($colamistprofile) {
                    while ($result = $colamistprofile->fetch_assoc()) {
             ?>

            <div class="media content">
                <div class="media-left media-middle">
                    <a href="#">
                        <img class="media-object" src="global-panel/<?php echo $result['image']; ?>" alt="Bonna Mirjja">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading kolamist_name"><a href="colamistprofile.php?authorprof=<?php echo $result['columnistProfile_id']; ?>"><?php echo $result['author']; ?></a></h4>
                </div>
            </div>

            <?php } } ?>


        </div>