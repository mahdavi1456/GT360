<!--div class="footer-section">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-4 footer-grid">
                <h4>
                    نوشته سردبیر
                </h4>
                <div class="editor-pics">
                    <div class="col-md-3 item-pic">
                        <img src="{{ //asset('front-theme-asset/motive/images/f1.jpg') }}" class="img-responsive" alt=""/>

                    </div>
                    <div class="col-md-9 item-details">
                        <h5 class="inner"><a href="#"> چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                                است...</a></h5>
                        <div class="td-post-date">Feb 22, 2015</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="editor-pics">
                    <div class="col-md-3 item-pic">
                        <img src="{{ //asset('front-theme-asset/motive/images/f2.jpg') }}" class="img-responsive" alt=""/>

                    </div>
                    <div class="col-md-9 item-details">
                        <h5 class="inner"><a href="#"> چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                                است...</a></h5>
                        <div class="td-post-date">Feb 22, 2015</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="editor-pics">
                    <div class="col-md-3 item-pic">
                        <img src="{{ //asset('front-theme-asset/motive/images/f3.jpg') }}" class="img-responsive" alt=""/>

                    </div>
                    <div class="col-md-9 item-details">
                        <h5 class="inner"><a href="#"> چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                                است...</a></h5>
                        <div class="td-post-date">Feb 22, 2015</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-4 footer-grid">
                <h4>
                    محبوب پست ها
                </h4>
                <div class="editor-pics">
                    <div class="col-md-3 item-pic">
                        <img src="{{ //asset('front-theme-asset/motive/images/f4.jpg') }}" class="img-responsive" alt=""/>

                    </div>
                    <div class="col-md-9 item-details">
                        <h5 class="inner"><a href="#"> چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                                است...</a></h5>
                        <div class="td-post-date">Feb 22, 2015</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="editor-pics">
                    <div class="col-md-3 item-pic">
                        <img src="{{ //asset('front-theme-asset/motive/images/f3.jpg') }}" class="img-responsive" alt=""/>
                    </div>
                    <div class="col-md-9 item-details">
                        <h5 class="inner"><a href="#"> چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                                است...</a></h5>
                        <div class="td-post-date">Feb 22, 2015</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="editor-pics">
                    <div class="col-md-3 item-pic">
                        <img src="{{ //asset('front-theme-asset/motive/images/f2.jpg') }}" class="img-responsive" alt=""/>
                    </div>
                    <div class="col-md-9 item-details">
                        <h5 class="inner"><a href="#"> چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                                است...</a></h5>
                        <div class="td-post-date">Feb 22, 2015</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-4 footer-grid">
                <h4>دسته بندی محبوب</h4>
                <ul class="td-pb-padding-side">
                    <li><a href="#">معماری<span class="td-cat-no">15</span></a></li>
                    <li><a href="#">نگاه جدید 2015<span class="td-cat-no">14</span></a></li>
                    <li><a href="#">اسباب بازی<span class="td-cat-no">14</span></a></li>
                    <li><a href="#">موبایل و تلفن<span class="td-cat-no">14</span></a></li>
                    <li><a href="#">دستور غذاها<span class="td-cat-no">14</span></a></li>
                    <li><a href="#">تزئینات<span class="td-cat-no">14</span></a></li>
                    <li><a href="#">فضای داخلی<span class="td-cat-no">14</span></a></li>
                    <li><a href="#">طرح‌نما<span class="td-cat-no">13</span></a></li>
                    <li><a href="#">چاپگرها و متون<span class="td-cat-no">13</span></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div-->

<div class="copyleft">
    <p>
        {{ $settingModel->getSetting('copyright_text', $accountId, $projectId) }}
        <a href="https://gratech.ir" target="_blank">گراتک</a>
    </p>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        /*
        var defaults = {
              containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
         };
        */
        $().UItoTop({easingType: 'easeOutQuart'});
    });
</script>
<a href="#home" id="toTop" class="scroll" style="display: block;">
    <span id="toTopHover" style="opacity: 1;"> </span>
</a>


<!--JS-->
<script type="text/javascript" src="{{ asset('front-theme-asset/motive/js/bootstrap-3.1.1.min.js') }}"></script>

<!--//JS-->
<!--RTL & Persian LNG & Publicer By Www.20script.ir-->
</body>
</html>
