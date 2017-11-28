    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

<footer>
    <div class="footer-part">
        <div class="container">
            <div class="row">
                <div class="footer_part_content">
                    <div class="col-lg-5 editor_details">

                 <?php
                     $einfo = new EditorInfo();
                      $editorinfo = $einfo->geteditorinfo();
                      if ($editorinfo) {
                        while ($result = $editorinfo->fetch_assoc()) {
                 ?>    
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">সম্পাদকের নাম :</label>
                                <div class="col-sm-8">
                                    <p class="form-control-static"><?php echo $result['editor_name'];?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">মোবা :</label>
                                <div class="col-sm-8">
                                    <p class="form-control-static"><?php echo $result['editor_mobile'];?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">ইমেইল :</label>
                                <div class="col-sm-8">
                                    <p class="form-control-static"><?php echo $result['editor_email'];?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">ঠিকানা :</label>
                                <div class="col-sm-8">
                                    <p class="form-control-static"><?php echo $result['editor_address'];?></p>
                                </div>
                            </div>
                        </form>
                <?php  } } ?>        

                    </div>
                    <div class="col-lg-3">
                        <div class="newspaper_details text-center">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">আমাদের সম্পর্কে</a>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content modal_content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="exampleModalLabel">আমাদের সম্পর্কে</h4>
                                                </div>
                                                <div class="modal-body">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Send message</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>


        <li>
            <a href="#" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo">লেখা পাঠান</a>

            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal_content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">লেখা পাঠান</h4>
                        </div>

                        <div class="modal-body">
                            <p class="text-justify">সম্পাদকীয় বোর্ড বরাবর আপনার লেখা/অভিমত পাঠাতে অনুগ্রহ করে নিচের ফরমটির বিস্তারিত পূরণ করুন। 
                                যে কোনো লেখা/অভিমতের মূল্যায়ন ও প্রকাশের বিষয়ে চূড়ান্ত সিদ্ধান্ত গ্রহণ করবেন সম্পাদকীয় বোর্ড। 
                                প্রকাশের সিদ্ধান্ত হলে লেখাটি/অভিমতটির বিষয়ে আপনার সঙ্গে যোগাযোগ করা হবে।
                                আপনার চূড়ান্ত অনুমোদন পেলেই কেবল লেখাটি/অভিমতটি প্রকাশিত হবে।
                            </p>


                     <form data-toggle="validator" action="api/create.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group text-left">
                            <label for="exampleInputEmail1">নাম</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group  text-left">
                            <label for="exampleInputPassword1">ইমেইল</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group  text-left">
                            <label for="textarea">লেখা/অভিমত</label>
                            <textarea name="body" class="form-control" rows="6"></textarea>
                        </div>
                        <div class="form-group  text-left">
                            <label for="exampleInputFile">ফটো যুক্ত করুন</label>
                            <input type="file" name="filedoc">
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn crud-submit btn-success" class="btn btn-primary">Send message</button>
                        </div>
                     </form>

                        </div>
                        

                    </div>
                </div>
            </div>
        </li>


                                <li>
                                    <a href="#" data-toggle="modal" data-target="#exampleModal3" data-whatever="@mdo">বিজ্ঞাপন দিন</a>
                                    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content modal_content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="exampleModalLabel">বিজ্ঞাপন দিন</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Recipient:</label>
                                                            <input type="text" class="form-control" id="recipient-name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="control-label">Message:</label>
                                                            <textarea class="form-control" id="message-text"></textarea>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Send message</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#exampleModal4" data-whatever="@mdo">যোগাযোগ করুন</a>
                                    <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content modal_content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="exampleModalLabel">যোগাযোগ করুন</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <p>সম্পাদকীয় বোর্ড বরাবর আপনার লেখা/অভিমত পাঠাতে অনুগ্রহ করে নিচের ফরমটির বিস্তারিত পূরণ করুন। 
                                                            যে কোনো লেখা/অভিমতের মূল্যায়ন ও প্রকাশের বিষয়ে চূড়ান্ত সিদ্ধান্ত গ্রহণ করবেন সম্পাদকীয় বোর্ড। 
                                                            প্রকাশের সিদ্ধান্ত হলে লেখাটি/অভিমতটির বিষয়ে আপনার সঙ্গে যোগাযোগ করা হবে।
                                                            আপনার চূড়ান্ত অনুমোদন পেলেই কেবল লেখাটি/অভিমতটি প্রকাশিত হবে।</p>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Send message</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="address_content">
            <?php
               $emailPhone = new EmailNphoneInfo();
                $allInfoPhoneEmail = $emailPhone->getAllEmailNphoneInfo();
                if ($allInfoPhoneEmail) {
                    while ($result = $allInfoPhoneEmail->fetch_assoc()) {
              ?> 

                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">নিউজ রুম :</label>
                                    <div class="col-sm-8">
                                        <p class="form-control-static"><?php echo $result['newsroommobile'];?></p>
                                        <p class="form-control-static email"><?php echo $result['newsroomemail'];?></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">বিজ্ঞাপন :</label>
                                    <div class="col-sm-8">
                                        <p class="form-control-static"><?php echo $result['advmobile'];?></p>
                                        <p class="form-control-static email"><?php echo $result['advemail'];?></p>
                                    </div>
                                </div>
                            </form>

                  <?php } } ?>          


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <p class="copyright">copyright@2017</p>
                </div>
                <div class="col-lg-6 text-right">
                    <p class="develope">Developed by IngeniumBD</p>
                </div>
            </div>
        </div>
        <!--Back to top button-->
        <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="" data-toggle="tooltip" data-placement="left">
            <span class="glyphicon glyphicon-chevron-up"></span>
        </a>
    </div>
</footer>

    <!-- bootstarp min js link here-->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!--Back to top button js work-->
    <script type="text/javascript">
            $(document).ready(function () {


                $(window).scroll(function () {
                    if ($(this).scrollTop() > 100) {
                        $('#back-to-top').fadeIn();
                    } else {
                        $('#back-to-top').fadeOut();
                    }
                });
                // scroll body to 0px on click
                $('#back-to-top').click(function () {
                    $('#back-to-top').tooltip('hide');
                    $('body,html').animate({
                        scrollTop: 0
                    }, 800);
                    return false;
                });
                $('#back-to-top').tooltip('show');
            });
    </script>


