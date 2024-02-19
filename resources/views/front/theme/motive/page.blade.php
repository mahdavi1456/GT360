@include('front.theme.motive.header')
<body>

    <div class="header" id="home">
        <div class="content white">
            @include('front.theme.motive.nav')
        </div>
    </div>

    @php
        $data = $pageModel->getPageData($pageId);
    @endphp

    <div class="banner two">
        <div class="container">
            <h2 class="inner-tittle">{{ $data->title }}</h2>
        </div>
    </div>


<div class="main-content">
    <div class="container">
        <div class="mag-inner">
            <div class="col-md-8 mag-innert-right">
                <div class="banner-bottom-right-grids">
                    <div class="single-right-grid">
                        <img src="images/single.jpg" alt="">

                        {!! $data->content !!}

                        <div class="single-bottom">
                            <ul>
                                <li><a href="#">
                                        الهام طراح
                                    </a></li>
                                <li>August 30 2015</li>
                                <li><a href="#">ادمین</a></li>
                                <li><a href="#">5 نظر</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="post">
                    <a href="#"><h3>
                            آخرین پست ها
                        </h3></a>
                    <div class="post-grids">
                        <div class="col-md-3 post-right">
                            <a href="single.html"><img src="images/f1.jpg" alt=""></a>
                        </div>
                        <div class="col-md-9 post-left">
                            <h4><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</a></h4>
                            <p class="comments">August 28 2015, <a href="#">
                                    8 نظر
                                </a></p>
                            <p class="text">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                                برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می
                                باشد......</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="post-grids">
                        <div class="col-md-3 post-right">
                            <a href="single.html"><img src="images/f2.jpg" alt=""></a>
                        </div>
                        <div class="col-md-9 post-left">
                            <h4><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</a></h4>
                            <p class="comments">August 30 2015, <a href="#">
                                    8 نظر
                                </a></p>
                            <p class="text">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                                برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می
                                باشد...</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="post-grids">
                        <div class="col-md-3 post-right">
                            <a href="single.html"><img src="images/f3.jpg" alt=""></a>
                        </div>
                        <div class="col-md-9 post-left">
                            <h4><a href="#">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</a></h4>
                            <p class="comments">Sep 4 2015, <a href="#">
                                    8 نظر
                                </a></p>
                            <p class="text">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                                برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می
                                باشد...</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="post-grids">
                        <div class="col-md-3 post-right">
                            <a href="single.html"><img src="images/f4.jpg" alt=""></a>
                        </div>
                        <div class="col-md-9 post-left">
                            <h4><a href="#">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</a></h4>
                            <p class="comments">Sep 4 2015, <a href="#">
                                    8 نظر
                                </a></p>
                            <p class="text">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                                برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می
                                باشد...</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!--leave-->
                    <div class="leave">
                        <h4>
                            ارسال نظر
                        </h4>
                        <form id="commentform">
                            <p class="comment-form-author-name"><label for="author">نام</label>
                                <input id="author" type="text" value="" size="30" aria-required="true">
                            </p>
                            <p class="comment-form-email">
                                <label class="email">ایمیل</label>
                                <input id="email" type="text" value="" size="30" aria-required="true">
                            </p>
                            <p class="comment-form-comment">
                                <label class="comment">نظر</label>
                                <textarea></textarea>
                            </p>
                            <div class="clearfix"></div>
                            <p class="form-submit">
                                <input type="submit" id="submit" value="ارسال">
                            </p>
                            <div class="clearfix"></div>
                        </form>

                    </div>
                </div>
                <!--//leave-->
                <!--RTL & Persian LNG & Publicer By Www.20script.ir-->
            </div>
            <div class="col-md-4 mag-inner-left">
                <div class="connect">
                    <h4 class="side">
                        همیشه در ارتباط ماندن
                    </h4>
                    <ul class="stay">
                        <li class="c5-element-facebook"><a href="#"><span class="icon"></span><h5>700</h5><span
                                    class="text">

لورم ایپسوم</span></a></li>
                        <li class="c5-element-twitter"><a href="#"><span class="icon1"></span><h5>201</h5><span
                                    class="text">

لورم ایپسوم</span></a></li>
                        <li class="c5-element-gg"><a href="#"><span class="icon2"></span><h5>111</h5><span class="text">

لورم ایپسوم</span></a></li>
                        <li class="c5-element-dribble"><a href="#"><span class="icon3"></span><h5>99</h5><span
                                    class="text">

لورم ایپسوم</span></a></li>

                    </ul>
                </div>
                <div class="modern">
                    <h4 class="side">لورم ایپسوم متن ساختگی</h4>
                    <div id="example1">
                        <div id="owl-demo" class="owl-carousel text-center">
                            <div class="item">

                                <img class="img-responsive lot" src="images/p1.jpg" alt=""/>
                            </div>
                            <div class="item">

                                <img class="img-responsive lot" src="images/p2.jpg" alt=""/>
                            </div>
                            <div class="item">

                                <img class="img-responsive lot" src="images/p33.jpg" alt=""/>
                            </div>
                            <div class="item">

                                <img class="img-responsive lot" src="images/p1.jpg" alt=""/>
                            </div>
                            <div class="item">

                                <img class="img-responsive lot" src="images/p1.jpg" alt=""/>
                            </div>
                            <div class="item">

                                <img class="img-responsive lot" src="images/p2.jpg" alt=""/>
                            </div>
                            <div class="item">

                                <img class="img-responsive lot" src="images/p33.jpg" alt=""/>
                            </div>
                            <div class="item">

                                <img class="img-responsive lot" src="images/p1.jpg" alt=""/>
                            </div>
                        </div>
                    </div>
                    <!-- requried-jsfiles-for owl -->
                    <!--RTL & Persian LNG & Publicer By Www.20script.ir-->
                    <script src="js/owl.carousel.js"></script>
                    <script>
                        $(document).ready(function () {
                            $("#owl-demo").owlCarousel({
                                items: 1,
                                lazyLoad: true,
                                autoPlay: false,
                                navigation: true,
                                navigationText: true,
                                pagination: false,
                                responsiveBreakpoints: {
                                    portrait: {
                                        changePoint: 480,
                                        visibleItems: 2
                                    },
                                    landscape: {
                                        changePoint: 640,
                                        visibleItems: 2
                                    },
                                    tablet: {
                                        changePoint: 768,
                                        visibleItems: 3
                                    }
                                }
                            });
                        });
                    </script>
                    <!-- //requried-jsfiles-for owl -->
                </div>
                <!--/start-sign-up-->
                <div class="sign_main">
                    <h4 class="side">
                        ثبت نام برای خبرنامه
                    </h4>
                    <div class="sign_up">
                        <p class="sign">
                            ثبت نام برای دریافت خبرنامه رایگان ما!
                        </p>
                        <form>
                            <input type="text" class="text" value="نام" onfocus="this.value = '';"
                                   onblur="if (this.value == '') {this.value = 'Name';}">
                            <input type="text" class="text" value="آدرس ایمیل" onfocus="this.value = '';"
                                   onblur="if (this.value == '') {this.value = 'Email Address';}">
                            <input type="submit" value="ارسال">
                        </form>
                        <p class="spam">لورم ایپسوم متن ساختگی با تولید سادگی</p>
                    </div>
                </div>
                <!--//end-sign-up-->
                <h4 class="side">محبوب پست ها</h4>
                <div class="edit-pics">
                    <div class="editor-pics">
                        <div class="col-md-3 item-pic">
                            <img src="images/f4.jpg" class="img-responsive" alt=""/>

                        </div>
                        <div class="col-md-9 item-details">
                            <h5 class="inner two"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی</a></h5>
                            <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a
                                    href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="editor-pics">
                        <div class="col-md-3 item-pic">
                            <img src="images/f1.jpg" class="img-responsive" alt=""/>

                        </div>
                        <div class="col-md-9 item-details">
                            <h5 class="inner two"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی</a></h5>
                            <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a
                                    href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="editor-pics">
                        <div class="col-md-3 item-pic">
                            <img src="images/f1.jpg" class="img-responsive" alt=""/>

                        </div>
                        <div class="col-md-9 item-details">
                            <h5 class="inner two"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی</a></h5>
                            <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a
                                    href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="editor-pics">
                        <div class="col-md-3 item-pic">
                            <img src="images/f4.jpg" class="img-responsive" alt=""/>

                        </div>
                        <div class="col-md-9 item-details">
                            <h5 class="inner two"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی</a></h5>
                            <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a
                                    href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!--//edit-pics-->
                <!--/top-news-->
                <div class="top-news">
                    <h4 class="side">
                        اخبار مهم
                    </h4>
                    <div class="top-inner">
                        <div class="top-text">
                            <a href="single.html"><img src="images/slp.jpg" class="img-responsive" alt=""/></a>
                            <h5 class="top"><a href="single.html">نظرسنجی:لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                    از صنعت چاپ</a></h5>
                            <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a
                                    href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
                        </div>
                        <div class="top-text two">
                            <a href="single.html"><img src="images/dest.jpg" class="img-responsive" alt=""/></a>
                            <h5 class="top"><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</a></h5>
                            <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a
                                    href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
                        </div>
                    </div>
                </div>
                <!--//top-news-->
            </div>
            <div class="clearfix"></div>
        </div>
        <!--//end-mag-inner-->
        <!--/mag-bottom-->
        <!--RTL & Persian LNG & Publicer By Www.20script.ir-->
        <div class="mag-bottom">
            <h3 class="tittle bottom"><i class="glyphicon glyphicon-globe"></i>
                از سراسر جهان
            </h3>
            <div class="grid">
                <div class="col-md-4 m-b">
                    <a href="single.html">
                        <figure class="effect-layla">
                    </a>
                    <img src="images/pic.jpg" alt="img25"/>
                    <figcaption>
                        <h4>اخبارهای<span>روز</span></h4>
                        <a href="#">
                            مشاهده بیشتر
                        </a>
                    </figcaption>
                    </figure>
                    <div class="m-b-text">
                        <a href="single.html" class="wd">چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                            است</a>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است</p>
                        <a class="read" href="single.html">
                            ادامه مطلب
                        </a>
                    </div>
                </div>
                <div class="col-md-4 m-b">
                    <figure class="effect-layla">
                        <a href="single.html"> <img src="images/pic2.jpg" alt="img25"/></a>
                        <figcaption>
                            <h4>اخبارهای<span>روز</span></h4>
                        </figcaption>
                    </figure>
                    <div class="m-b-text">
                        <a href="single.html" class="wd">چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                            است</a>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است</p>
                        <a class="read" href="single.html">
                            ادامه مطلب
                        </a>
                    </div>
                </div>
                <div class="col-md-4 m-b">
                    <figure class="effect-layla">
                        <a href="single.html"><img src="images/pic3.jpg" alt="img25"/></a>
                        <figcaption>
                            <h4>اخبارهای<span>روز</span></h4>
                        </figcaption>
                    </figure>
                    <div class="m-b-text">
                        <a href="single.html" class="wd">چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                            است</a>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است</p>
                        <a class="read" href="single.html">
                            ادامه مطلب
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!--//mag-bottom-->
        <!--RTL & Persian LNG & Publicer By Www.20script.ir-->
    </div>
</div>
<!--//end-main-->

@include('front.theme.motive.footer')
