<section class="client">
    <div class="container">
        <div class="row">
            <div class="wrapper">
                <div class="jcarousel-wrapper jcarousel_wrapper">
                    <div class="jcarousel j_carousel">
                        <ul>

                         <?php
                             $glr = new Gallery();
                              $getGalleryImg = $glr->GetAllGallerImage();
                              if ($getGalleryImg) {
                                while ($result = $getGalleryImg->fetch_assoc()) {
                          ?> 

                            <li><img src="global-panel/<?php echo $result['image']; ?>" alt="Image 1"></li>

                          <?php } } ?>  

                        </ul>
                    </div>
                    <a href="#" class="jcarousel-control-prev jcarousel_prev_arrow">&lsaquo;</a>
                    <a href="#" class="jcarousel-control-next jcarousel_prev_arrow jcarousel_prev_arrow_right text-right">&rsaquo;</a>
                </div>
            </div>
        </div>
    </div>
</section>