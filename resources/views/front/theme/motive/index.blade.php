@include('front.theme.motive.header')

<body>
    <div class="header" id="home">
        <div class="content white">
            @include('front.theme.motive.nav')
        </div>
    </div>
    <!--/start-banner-->
    <div class="banner">
        <div class="container">
            <div class="banner-inner">
                <div class="callbacks_container">
                    <ul class="rslides callbacks callbacks1" id="slider4">
                        <li class="callbacks1_on"
                            style="display: block; float: right; position: relative; opacity: 1; z-index: 2; transition: opacity 500ms ease-in-out;">
                            <div class="banner-info">
                                <h3>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک
                                    است</h3>
                                <p>

                                    لورم ایپسوم یا طرح‌نما</p>
                            </div>
                        </li>
                        <li class=""
                            style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 500ms ease-in-out;">
                            <div class="banner-info">
                                <h3>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک
                                    است</h3>
                                <p>

                                    لورم ایپسوم یا طرح‌نما</p>
                            </div>
                        </li>
                        <li class=""
                            style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 500ms ease-in-out;">
                            <div class="banner-info">
                                <h3>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک
                                    است</h3>
                                <p>

                                    لورم ایپسوم یا طرح‌نما</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <!--banner-Slider-->
                <script src="{{ asset('front-theme-asset/motive/js/responsiveslides.min.js') }}"></script>
                <script>
                    // You can also use "$(window).load(function() {"
                    $(function() {
                        // Slideshow 4
                        $("#slider4").responsiveSlides({
                            auto: true,
                            pager: true,
                            nav: false,
                            speed: 500,
                            namespace: "callbacks",
                            before: function() {
                                $('.events').append("<li>before event fired.</li>");
                            },
                            after: function() {
                                $('.events').append("<li>after event fired.</li>");
                            }
                        });

                    });
                </script>
            </div>
        </div>
    </div>
    <!--//end-banner-->
    <!--/start-main-->
    <!--RTL & Persian LNG & Publicer By Www.20script.ir-->
    <div class="main-content">
        <div class="container">
            <div class="mag-inner">
                <div class="col-md-8 mag-innert-right">
                    <!--/start-Technology-->
                    <div class="technology">
                        <h2 class="tittle"><i class="glyphicon glyphicon-certificate"> </i>تکنولوژی</h2>
                        <div class="col-md-6 tech-img">
                            <img src="{{ $settingModel->getSetting('image_event', $accountId, $projectId) }}"
                                class="img-responsive" alt="" />
                        </div>
                        <div class="col-md-6 tech-text">
                            <div class="editor-pics">
                                @if ($postModel->getPosts($accountId, $projectId, 'event'))
                                    @foreach ($postModel->getPosts($accountId, $projectId, 'event') as $event)
                                        <div class="row">
                                            <div class="col-md-3 item-pic">
                                                <a href="post.blade.php">
                                                    @if ($event->thumbnail)
                                                        <img
                                                            src="{{ asset(ert('thumb-path')) . '/' . $event->thumbnail }}">
                                                    @else
                                                        <img src="{{ asset('front-theme-asset/motive/images/mg1.jpg') }}"
                                                           class="img-responsive" alt="" />
                                                    @endif
                                                </a>

                                            </div>
                                            <div class="col-md-9 item-details">
                                                <h5 class="inner two"> <a href="post.blade.php"
                                                        class="wd">{{ $event->title }}</a></h5>
                                                <p>{{ $event->abstract }}</p>
                                                <a class="read" href="post.blade.php">ادامه مطلب</a>
                                                <div class="td-post-date two">Feb 22, 2015</div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!--//end-Technology-->
                    <!--RTL & Persian LNG & Publicer By Www.20script.ir-->
                    <div class="gallery">
                        <div class="main-title-head">
                            <h3 class="tittle"><i class="glyphicon glyphicon-picture"></i>گالری</h3>
                        </div>
                        <div class="gallery-images">
                            <div class="course_demo1">
                                <ul id="flexiselDemo1">
                                    @if ($postModel->getPosts($accountId, $projectId, 'gallery'))
                                        @foreach ($postModel->getPosts($accountId, $projectId, 'gallery') as $gallery)
                                            <li>
                                                <a href="post.blade.php">
                                                    @if ($gallery->thumbnail)
                                                        <img
                                                            src="{{ asset(ert('thumb-path')) . '/' . $gallery->thumbnail }}">
                                                    @else
                                                        <img src="{{ asset('front-theme-asset/motive/images/mg1.jpg') }}"
                                                            alt="" />
                                                    @endif
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <script type="text/javascript">
                                $(window).load(function() {
                                    $("#flexiselDemo1").flexisel({
                                        visibleItems: 3,
                                        animationSpeed: 1000,
                                        autoPlay: true,
                                        autoPlaySpeed: 3000,
                                        pauseOnHover: true,
                                        enableResponsiveBreakpoints: true,
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
                            <script type="text/javascript" src="{{ asset('front-theme-asset/motive/js/jquery.flexisel.js') }}"></script>
                        </div>
                        <div class="course_demo1">
                            <ul id="flexiselDemo">
                                <li>
                                    <a href="post.blade.php"><img
                                            src="{{ asset('front-theme-asset/motive/images/mg7.jpg') }}"
                                            alt="" /></a>
                                </li>
                                <li>
                                    <a href="post.blade.php"><img
                                            src="{{ asset('front-theme-asset/motive/images/mg3.jpg') }}"
                                            alt="" /></a>
                                </li>
                                <li>
                                    <a href="post.blade.php"><img
                                            src="{{ asset('front-theme-asset/motive/images/mg6.jpg') }}"
                                            alt="" /></a>
                                </li>
                                <li>
                                    <a href="post.blade.php"><img
                                            src="{{ asset('front-theme-asset/motive/images/mg2.jpg') }}"
                                            alt="" /></a>
                                </li>
                                <li>
                                    <a href="post.blade.php"><img
                                            src="{{ asset('front-theme-asset/motive/images/mg6.jpg') }}"
                                            alt="" /></a>
                                </li>
                            </ul>
                        </div>
                        <a class="more" href="post.blade.php">
                            بیشتر +
                        </a>
                        <script type="text/javascript">
                            $(window).load(function() {
                                $("#flexiselDemo").flexisel({
                                    visibleItems: 3,
                                    animationSpeed: 1000,
                                    autoPlay: true,
                                    autoPlaySpeed: 3000,
                                    pauseOnHover: true,
                                    enableResponsiveBreakpoints: true,
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
                        <script type="text/javascript" src="{{ asset('front-theme-asset/motive/js/jquery.flexisel.js') }}"></script>

                    </div>
                    <!--business-->
                    <!--RTL & Persian LNG & Publicer By Www.20script.ir-->
                    <div class="business">
                        <h3 class="tittle"><i class="glyphicon glyphicon-briefcase"></i>کسب و کار</h3>
                        <div class="business-inner">
                            <div class="col-md-6 b-img"><a href="post.blade.php"><img class="img-responsive"
                                        src="{{ asset('front-theme-asset/motive/images/time.jpg') }}"
                                        alt="" /></a></div>
                            <div class="col-md-6 b-text">
                                <h5><a href="post.blade.php">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                    </a>
                                </h5>
                                <h6><i class="glyphicon glyphicon-time"></i>Jun 25, 2015</h6>
                                <div class="icons"><a href="#"><i
                                            class="glyphicon glyphicon-user"></i>ادمین</a><a href="#"><i
                                            class="glyphicon glyphicon-comment"></i>2</a><a href="#"><i
                                            class="glyphicon glyphicon-thumbs-up"></i>152</a><a href="#"><i
                                            class="glyphicon glyphicon-thumbs-down"></i> 26</a></div>
                                <div class="clearfix"></div>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک
                                    است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط
                                    فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد</p>
                                <a class="read" href="post.blade.php">
                                    ادامه مطلب
                                </a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="business-bottom-content">
                                <div class="col-md-6 business-bottom">
                                    <div class="col-md-3 b-bottom-pic">
                                        <a href="post.blade.php"><img class="img-responsive"
                                                src="{{ asset('front-theme-asset/motive/images/ti1.jpg') }}"
                                                alt="" /></a>
                                    </div>
                                    <div class="col-md-9 b-bottom-text">
                                        <h5><a href="post.blade.php">لورم ایپسوم متن ساختگی با تولید سادگی </a></h5>
                                        <h6><i class="glyphicon glyphicon-time"></i>Jun 25, 2015</h6>
                                        <div class="icons"><a href="#"><i
                                                    class="glyphicon glyphicon-user"></i>ادمین</a><a href="#"><i
                                                    class="glyphicon glyphicon-comment"></i>2</a><a href="#"><i
                                                    class="glyphicon glyphicon-thumbs-up"></i>152</a><a
                                                href="#"><i class="glyphicon glyphicon-thumbs-down"></i> 26</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-6 business-bottom">
                                    <div class="col-md-3 b-bottom-pic">
                                        <a href="post.blade.php"><img class="img-responsive"
                                                src="{{ asset('front-theme-asset/motive/images/ti1.jpg') }}"
                                                alt="" /></a>
                                    </div>
                                    <div class="col-md-9 b-bottom-text">
                                        <h5><a href="post.blade.php">لورم ایپسوم متن ساختگی با تولید سادگی </a></h5>
                                        <h6><i class="glyphicon glyphicon-time"></i>Jun 25, 2015</h6>
                                        <div class="icons"><a href="#"><i
                                                    class="glyphicon glyphicon-user"></i>ادمین</a><a href="#"><i
                                                    class="glyphicon glyphicon-comment"></i>2</a><a href="#"><i
                                                    class="glyphicon glyphicon-thumbs-up"></i>152</a><a
                                                href="#"><i class="glyphicon glyphicon-thumbs-down"></i> 26</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="business-inner two">
                            <div class="col-md-6 b-img"><a href="post.blade.php"><img class="img-responsive"
                                        src="{{ asset('front-theme-asset/motive/images/time2.jpg') }}"
                                        alt="" /></a></div>
                            <div class="col-md-6 b-text">
                                <h5><a href="post.blade.php">لورم ایپسوم متن ساختگی با تولید سادگی </a></h5>
                                <h6><i class="glyphicon glyphicon-time"></i>Jun 25, 2015</h6>
                                <div class="icons"><a href="#"><i
                                            class="glyphicon glyphicon-user"></i>ادمین</a><a href="#"><i
                                            class="glyphicon glyphicon-comment"></i>2</a><a href="#"><i
                                            class="glyphicon glyphicon-thumbs-up"></i>152</a><a href="#"><i
                                            class="glyphicon glyphicon-thumbs-down"></i> 26</a></div>
                                <div class="clearfix"></div>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک
                                    است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط
                                    فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد</p>
                                <a class="read" href="post.blade.php">
                                    ادامه مطلب
                                </a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="business-bottom-content">
                                <div class="col-md-6 business-bottom">
                                    <div class="col-md-3 b-bottom-pic">
                                        <a href="post.blade.php"><img class="img-responsive"
                                                src="{{ asset('front-theme-asset/motive/images/ti1.jpg') }}"
                                                alt="" /></a>
                                    </div>
                                    <div class="col-md-9 b-bottom-text">
                                        <h5><a href="post.blade.php">
                                                اکنون زمان برای تغییر کار است
                                            </a></h5>
                                        <h6><i class="glyphicon glyphicon-time"></i>Jun 25, 2015</h6>
                                        <div class="icons"><a href="#"><i
                                                    class="glyphicon glyphicon-user"></i>ادمین</a><a href="#"><i
                                                    class="glyphicon glyphicon-comment"></i>2</a><a href="#"><i
                                                    class="glyphicon glyphicon-thumbs-up"></i>152</a><a
                                                href="#"><i class="glyphicon glyphicon-thumbs-down"></i> 26</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-6 business-bottom">
                                    <div class="col-md-3 b-bottom-pic">
                                        <a href="post.blade.php"><img class="img-responsive"
                                                src="{{ asset('front-theme-asset/motive/images/ti1.jpg') }}"
                                                alt="" /></a>
                                    </div>
                                    <div class="col-md-9 b-bottom-text">
                                        <h5><a href="post.blade.php">
                                                اکنون زمان برای تغییر کار است
                                            </a></h5>
                                        <h6><i class="glyphicon glyphicon-time"></i>Jun 25, 2015</h6>
                                        <div class="icons"><a href="#"><i
                                                    class="glyphicon glyphicon-user"></i>ادمین</a><a href="#"><i
                                                    class="glyphicon glyphicon-comment"></i>2</a><a href="#"><i
                                                    class="glyphicon glyphicon-thumbs-up"></i>152</a><a
                                                href="#"><i class="glyphicon glyphicon-thumbs-down"></i> 26</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!--//business-->
                    <!--//latest-articles-->
                    <!--RTL & Persian LNG & Publicer By Www.20script.ir-->
                    <div class="latest-articles">
                        <h3 class="tittle"><i class="glyphicon glyphicon-file"></i>آخرین مقالات</h3>
                        <div class="world-news-grids">

                            @if ($postModel->getPosts($accountId, $projectId, 'article'))
                                @foreach ($postModel->getPosts($accountId, $projectId, 'article') as $article)
                                    <div class="world-news-grid">
                                        <img src="{{ asset('front-theme-asset/motive/images/a1.jpg') }}"
                                            alt="" />
                                        <a href="post.blade.php" class="wd">{{ $article->title }}</a>
                                        <p>{{ $article->abstract }}</p>
                                        <a class="read" href="post.blade.php">ادامه مطلب</a>
                                    </div>
                                @endforeach
                            @endif


                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!--//articles-->
                </div>
                <div class="col-md-4 mag-inner-left">
                    <div class="connect">
                        <h4 class="side">
                            همیشه در ارتباط ماندن
                        </h4>
                        <ul class="stay">
                            <li class="c5-element-facebook"><a href="#"><span class="icon"></span>
                                    <h5>700</h5><span class="text">

                                        لورم ایپسوم</span>
                                </a></li>
                            <li class="c5-element-twitter"><a href="#"><span class="icon1"></span>
                                    <h5>201</h5><span class="text">

                                        لورم ایپسوم</span>
                                </a></li>
                            <li class="c5-element-gg"><a href="#"><span class="icon2"></span>
                                    <h5>111</h5><span class="text">

                                        لورم ایپسوم</span>
                                </a></li>
                            <li class="c5-element-dribble"><a href="#"><span class="icon3"></span>
                                    <h5>99</h5><span class="text">

                                        لورم ایپسوم</span>
                                </a></li>

                        </ul>
                    </div>
                    <div class="modern">
                        <h4 class="side">لورم ایپسوم متن ساختگی</h4>
                        <div id="example1" dir=ltr>
                            <div id="owl-demo" class="owl-carousel text-center">
                                <div class="item">

                                    <img class="img-responsive lot"
                                        src="{{ asset('front-theme-asset/motive/images/p1.jpg') }}" alt="" />
                                </div>
                                <div class="item">

                                    <img class="img-responsive lot"
                                        src="{{ asset('front-theme-asset/motive/images/p2.jpg') }}" alt="" />
                                </div>
                                <div class="item">

                                    <img class="img-responsive lot"
                                        src="{{ asset('front-theme-asset/motive/images/p33.jpg') }}"
                                        alt="" />
                                </div>
                                <div class="item">

                                    <img class="img-responsive lot"
                                        src="{{ asset('front-theme-asset/motive/images/p1.jpg') }}" alt="" />
                                </div>
                                <div class="item">

                                    <img class="img-responsive lot"
                                        src="{{ asset('front-theme-asset/motive/images/p1.jpg') }}" alt="" />
                                </div>
                                <div class="item">

                                    <img class="img-responsive lot"
                                        src="{{ asset('front-theme-asset/motive/images/p2.jpg') }}" alt="" />
                                </div>
                                <div class="item">

                                    <img class="img-responsive lot"
                                        src="{{ asset('front-theme-asset/motive/images/p33.jpg') }}"
                                        alt="" />
                                </div>
                                <div class="item">

                                    <img class="img-responsive lot"
                                        src="{{ asset('front-theme-asset/motive/images/p1.jpg') }}" alt="" />
                                </div>
                            </div>
                        </div>
                        <!-- requried-jsfiles-for owl -->
                        <!--RTL & Persian LNG & Publicer By Www.20script.ir-->
                        <script src="{{ asset('front-theme-asset/motive/js/owl.carousel.js') }}"></script>
                        <script>
                            $(document).ready(function() {
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
                    <h4 class="side">
                        محبوب پست ها
                    </h4>
                    <div class="edit-pics">
                        <div class="editor-pics">
                            <div class="col-md-3 item-pic">
                                <img src="{{ asset('front-theme-asset/motive/images/f4.jpg') }}"
                                    class="img-responsive" alt="" />

                            </div>
                            <div class="col-md-9 item-details">
                                <h5 class="inner two"><a href="post.blade.php">لورم ایپسوم متن ساختگی با تولید
                                        سادگی</a></h5>
                                <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a
                                        href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="editor-pics">
                            <div class="col-md-3 item-pic">
                                <img src="{{ asset('front-theme-asset/motive/images/f1.jpg') }}"
                                    class="img-responsive" alt="" />

                            </div>
                            <div class="col-md-9 item-details">
                                <h5 class="inner two"><a href="post.blade.php">لورم ایپسوم متن ساختگی با تولید
                                        سادگی</a></h5>
                                <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a
                                        href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="editor-pics">
                            <div class="col-md-3 item-pic">
                                <img src="{{ asset('front-theme-asset/motive/images/f1.jpg') }}"
                                    class="img-responsive" alt="" />

                            </div>
                            <div class="col-md-9 item-details">
                                <h5 class="inner two"><a href="post.blade.php">لورم ایپسوم متن ساختگی با تولید
                                        سادگی</a></h5>
                                <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a
                                        href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="editor-pics">
                            <div class="col-md-3 item-pic">
                                <img src="{{ asset('front-theme-asset/motive/images/f4.jpg') }}"
                                    class="img-responsive" alt="" />

                            </div>
                            <div class="col-md-9 item-details">
                                <h5 class="inner two"><a href="post.blade.php">لورم ایپسوم متن ساختگی با تولید
                                        سادگی</a></h5>
                                <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a
                                        href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!--//edit-pics-->
                    <!--/top-news-->
                    <div class="top-news">
                        <h4 class="side">اخبار مهم</h4>
                        <div class="top-inner">

                            @if ($postModel->getPosts($accountId, $projectId, 'news'))
                                @foreach ($postModel->getPosts($accountId, $projectId, 'news') as $new)
                                    <div class="top-text">
                                        <a
                                            href="{{ route('showPost', ['slug' => $slug, 'componentName' => 'news', 'postId' => $new->id]) }}">
                                            <img src="{{ asset('front-theme-asset/motive/images/slp.jpg') }}"
                                                class="img-responsive" alt="" />
                                        </a>
                                        <h5 class="top"><a href="post.blade.php">{{ $new->title }}</a></h5>
                                        <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22,
                                            2015
                                            <a href="#"><i class="glyphicon glyphicon-comment"></i>0 </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif


                        </div>
                    </div>
                    <!--//top-news-->
                </div>
                <div class="clearfix"></div>
            </div>
            <!--//end-mag-inner-->
            <!--/mag-bottom-->
            <div class="mag-bottom">
                <h3 class="tittle bottom"><i class="glyphicon glyphicon-globe"></i>
                    از سراسر جهان
                </h3>
                <div class="grid">
                    <div class="col-md-4 m-b">
                        <a href="post.blade.php">
                            <figure class="effect-layla"></figure>
                        </a>
                        <img src="{{ asset('front-theme-asset/motive/images/pic.jpg') }}" alt="img25" />
                        <figcaption>
                            <h4>اخبارهای<span>روز</span></h4>
                            <a href="#">
                                مشاهده بیشتر
                            </a>
                        </figcaption>
                        </figure>
                        <div class="m-b-text">
                            <a href="post.blade.php" class="wd">چاپگرها و متون بلکه روزنامه و مجله در ستون و
                                سطرآنچنان که لازم
                                است</a>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                                است</p>
                            <a class="read" href="post.blade.php">
                                ادامه مطلب
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 m-b">
                        <figure class="effect-layla">
                            <a href="post.blade.php"> <img
                                    src="{{ asset('front-theme-asset/motive/images/pic2.jpg') }}"
                                    alt="img25" /></a>
                            <figcaption>
                                <h4>اخبارهای<span>روز</span></h4>
                            </figcaption>
                        </figure>
                        <div class="m-b-text">
                            <a href="post.blade.php" class="wd">چاپگرها و متون بلکه روزنامه و مجله در ستون و
                                سطرآنچنان که لازم
                                است</a>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                                است</p>
                            <a class="read" href="post.blade.php">
                                ادامه مطلب
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 m-b">
                        <figure class="effect-layla">
                            <a href="post.blade.php"><img
                                    src="{{ asset('front-theme-asset/motive/images/pic3.jpg') }}"
                                    alt="img25" /></a>
                            <figcaption>
                                <h4>اخبارهای<span>روز</span></h4>
                            </figcaption>
                        </figure>
                        <div class="m-b-text">
                            <a href="post.blade.php" class="wd">چاپگرها و متون بلکه روزنامه و مجله در ستون و
                                سطرآنچنان که لازم
                                است</a>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                                است</p>
                            <a class="read" href="post.blade.php">
                                ادامه مطلب
                            </a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!--//mag-bottom-->
        </div>
    </div>
    <!--RTL & Persian LNG & Publicer By Www.20script.ir-->
    <!--//end-main-->
    @include('front.theme.motive.footer')
