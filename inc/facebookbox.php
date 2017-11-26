<div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-6">
                        <div class="facebook-page">
                            <div id="fb-root"></div>
                            <script>(function (d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id))
                                        return;
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10';
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>

                            <div style="margin-top: 5px; padding: 0px 0px 0px 11px;">
                                <div class="fb-page"
                                     data-href="https://www.facebook.com/facebook" 
                                     data-tabs="timeline"
                                     data-width="243" 
                                     data-height="380" 
                                     data-small-header="true" 
                                     data-adapt-container-width="true" 
                                     data-hide-cover="false" 
                                     data-show-facepile="true">
                                    <blockquote cite="https://www.facebook.com/facebook" 
                                                class="fb-xfbml-parse-ignore">
                                        <a href="https://www.facebook.com/facebook">Facebook</a>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- voting pool -->

                     <?php include 'inc/vootingpool.php';?>


                        </div>

                        <!-- Archive part start here -->
                         <?php include 'inc/facebookkothon.php';?>
                        <!-- Archive part end here -->
                    </div>