<!DOCTYPE HTML>
<html>
<head>
    <title>{{ $settingModel->getSetting('title', $accountId) }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900">
    <link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/eric') }}/css/style.css" media="all"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/eric') }}/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/eric') }}/css/magnific-popup.css">
    <script type="text/javascript" src="{{ asset('front-theme-asset/eric') }}/js/jquery.min.js"></script>
    <script src="{{ asset('front-theme-asset/eric') }}/js/owl.carousel.js"></script>
    <script>
        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                items: 4,
                lazyLoad: true,
                autoPlay: true,
                navigation: true,
                navigationText: ["", ""],
                rewindNav: false,
                scrollPerPage: false,
                pagination: false,
                paginationNumbers: false,
            });
        });
    </script>
    <!-- //Owl Carousel Assets -->
    <!-----768px-menu----->
    <link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/eric') }}/css/jquery.mmenu.all.css"/>
    <script type="text/javascript" src="{{ asset('front-theme-asset/eric') }}/js/jquery.mmenu.js"></script>
    <script type="text/javascript">
        //	The menu on the left
        $(function () {
            $('nav#menu-left').mmenu();
        });
    </script>
    <!-----//768px-menu----->
</head>
<body>
<!-- start header -->
<div class="header_bg">
    <div class="wrap">
        <div class="header">
            <div class="logo">
                <a href="index.html">
                    <img src="{{ asset('front-theme-asset/eric') }}/images/lg.png" alt=""/>
                    <h1>{{ $settingModel->getSetting('title', $accountId) }}</h1>
                    <div class="clear"></div>
                </a>
            </div>
            <div class="text">
                <p>{{ $settingModel->getSetting('description', $accountId) }}</p>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<!-- start header -->
<div class="header_btm">
    <div class="wrap">
        <!------start-768px-menu---->
        <div id="page">
            <div id="header">
                <a class="navicon" href="#menu-left"> </a>
            </div>
            <nav id="menu-left">
                <ul>
                    <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="about.html">About us</a></li>
                    <li><a href="services.html">Service</a></li>
                    <li><a href="pages.html">Pages</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact.html">Contact us</a></li>
                </ul>
            </nav>
        </div>
        <!------start-768px-menu---->
        <div class="header_sub">
            <div class="h_menu">
                <ul>
                    <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="about.html">About us</a></li>
                    <li><a href="services.html">Service</a></li>
                    <li><a href="pages.html">Pages</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact.html">Contact us</a></li>
                </ul>
            </div>
            <div class="h_search">
                <form>
                    <input type="text" value="" placeholder="search something...">
                    <input type="submit" value="">
                </form>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<!---start-banner---->
<div class="banner" id="move-top">
    <!----start-image-slider---->
    <div data-scroll-reveal="enter bottom but wait 0.7s" class="img-slider" id="home">
        <div class="wrap">
            <div class="slider">
                <ul id="jquery-demo">
                    <li>
                        <a href="#slide1">
                        </a>
                        <div data-scroll-reveal="enter bottom but wait 0.7s" class="slider-detils">
                            <h3>Lorem ipsum dolor sit amet.</h3>
                            <span>consectetur adipisc ing elit</span>
                        </div>
                    </li>
                    <li>
                        <a href="#slide2">
                        </a>
                        <div data-scroll-reveal="enter bottom but wait 1s" class="slider-detils">
                            <h3>Lorem Ipsum has been the industry's</h3>
                            <span>Aliquam viverra consectetur nibh a blan dit.</span>
                        </div>
                    </li>
                    <li>
                        <a href="#slide3">
                        </a>
                        <div data-scroll-reveal="enter bottom but wait 1.5s" class="slider-detils">
                            <h3>There are many variations of passages </h3>
                            <span>Proin at amet consectetur adipisc lacinia.</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<!---slider---->
<link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/eric') }}/css/slippry.css">
<script src="{{ asset('front-theme-asset/eric') }}/js/jquery-ui.js" type="text/javascript"></script>
<script src="{{ asset('front-theme-asset/eric') }}/js/scripts-f0e4e0c2.js" type="text/javascript"></script>
<script>
    jQuery('#jquery-demo').slippry({
        // general elements & wrapper
        slippryWrapper: '<div class="sy-box jquery-demo" />', // wrapper to wrap everything, including pager
        // options
        adaptiveHeight: false, // height of the sliders adapts to current slide
        useCSS: false, // true, false -> fallback to js if no browser support
        autoHover: false,
        transition: 'fade'
    });
</script>
<!---scrooling-script--->
<!----//End-image-slider---->
<div class="simple-text">
    <div class="wrap">
        <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam.</h4>
        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
            laborum.</p>
    </div>
</div>
<div class="Recent-wroks"><!-- start services -->
    <div class="wrap">
        <div class="Recent-wrok">
            <h5 class="heading">Recent wrok</h5>
            <!----start-img-cursual---->
            <div id="owl-demo" class="owl-carousel">
                <div class="item">
                    <div class="cau_left">
                        <div id="nivo-lightbox-demo"><p><a href="images/11.jpg" data-lightbox-gallery="gallery1"
                                                           id="nivo-lightbox-demo"> <span class="rollover"> </span></a>
                            </p></div>
                        <img src="images/1.jpg">
                    </div>
                    <div class="cau_left">
                        <h4><a href="#">Lorem ipsum</a></h4>
                        <p>
                            Lorem ipsum dolor amet,consectetur adipisicing elit, sed do eiusmod tempor incididunt dolore
                            magna aliqua.
                        </p>
                    </div>
                </div>
                <div class="item">
                    <div class="cau_left">
                        <div id="nivo-lightbox-demo"><p><a href="images/22.jpg" data-lightbox-gallery="gallery1"
                                                           id="nivo-lightbox-demo"> <span class="rollover"> </span></a>
                            </p></div>
                        <img src="images/2.jpg">
                    </div>
                    <div class="cau_left">
                        <h4><a href="#">Lorem ipsum</a></h4>
                        <p>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium,
                        </p>
                    </div>
                </div>
                <div class="item">
                    <div class="cau_left">
                        <div id="nivo-lightbox-demo"><p><a href="images/33.jpg" data-lightbox-gallery="gallery1"
                                                           id="nivo-lightbox-demo"> <span class="rollover"> </span></a>
                            </p></div>
                        <img src="images/3.jpg">
                    </div>
                    <div class="cau_left">
                        <h4><a href="#">Lorem ipsum</a></h4>
                        <p>
                            On the other hand, we denounce with righteous indignation and dislike men who are so
                            beguiled pleasure of the moment,
                        </p>
                    </div>
                </div>
                <div class="item">
                    <div class="cau_left">
                        <div id="nivo-lightbox-demo"><p><a href="images/44.jpg" data-lightbox-gallery="gallery1"
                                                           id="nivo-lightbox-demo"> <span class="rollover"> </span></a>
                            </p></div>
                        <img src="images/4.jpg">
                    </div>
                    <div class="cau_left">
                        <h4><a href="#">Lorem ipsum</a></h4>
                        <p>
                            Lorem ipsum dolor amet,consectetur adipisicing elit, sed do eiusmod tempor incididunt dolore
                            magna aliqua.
                        </p>
                    </div>
                </div>
                <div class="item">
                    <div class="cau_left">
                        <div id="nivo-lightbox-demo"><p><a href="images/11.jpg" data-lightbox-gallery="gallery1"
                                                           id="nivo-lightbox-demo"> <span class="rollover"> </span></a>
                            </p></div>
                        <img src="images/1.jpg">
                    </div>
                    <div class="cau_left">
                        <h4><a href="#">Lorem ipsum</a></h4>
                        <p>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium,
                        </p>
                    </div>
                </div>
                <div class="item">
                    <div class="cau_left">
                        <div id="nivo-lightbox-demo"><p><a href="images/22.jpg" data-lightbox-gallery="gallery1"
                                                           id="nivo-lightbox-demo"> <span class="rollover"> </span></a>
                            </p></div>
                        <img src="images/2.jpg">
                    </div>
                    <div class="cau_left">
                        <h4><a href="#">Lorem ipsum</a></h4>
                        <p>
                            On the other hand, we denounce with righteous indignation and dislike men who are so
                            beguiled pleasure of the moment,
                        </p>
                    </div>
                </div>
                <div class="item">
                    <div class="cau_left">
                        <div id="nivo-lightbox-demo"><p><a href="images/44.jpg" data-lightbox-gallery="gallery1"
                                                           id="nivo-lightbox-demo"> <span class="rollover"> </span></a>
                            </p></div>
                        <img src="images/4.jpg">
                    </div>
                    <div class="cau_left">
                        <h4><a href="#">Lorem ipsum</a></h4>
                        <p>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium,
                        </p>
                    </div>
                </div>
                <div class="item">
                    <div class="cau_left">
                        <div id="nivo-lightbox-demo"><p><a href="images/33.jpg" data-lightbox-gallery="gallery1"
                                                           id="nivo-lightbox-demo"> <span class="rollover"> </span></a>
                            </p></div>
                        <img src="images/3.jpg">
                    </div>
                    <div class="cau_left">
                        <h4><a href="#">Lorem ipsum</a></h4>
                        <p>
                            On the other hand, we denounce with righteous indignation and dislike men who are so
                            beguiled pleasure of the moment,
                        </p>
                    </div>
                </div>
                <div class="item">
                    <div class="cau_left">
                        <div id="nivo-lightbox-demo"><p><a href="images/11.jpg" data-lightbox-gallery="gallery1"
                                                           id="nivo-lightbox-demo"> <span class="rollover"> </span></a>
                            </p></div>
                        <img src="images/1.jpg">
                    </div>
                    <div class="cau_left">
                        <h4><a href="#">Lorem ipsum</a></h4>
                        <p>
                            Lorem ipsum dolor amet,consectetur adipisicing elit, sed do eiusmod tempor incididunt dolore
                            magna aliqua.
                        </p>
                    </div>
                </div>
                <div class="item">
                    <div class="cau_left">
                        <div id="nivo-lightbox-demo"><p><a href="images/44.jpg" data-lightbox-gallery="gallery1"
                                                           id="nivo-lightbox-demo"> <span class="rollover"> </span></a>
                            </p></div>
                        <img src="images/4.jpg">
                    </div>
                    <div class="cau_left">
                        <h4><a href="#">Lorem ipsum</a></h4>
                        <p>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium,
                        </p>
                    </div>
                </div>
                <div class="item">
                    <div class="cau_left">
                        <div id="nivo-lightbox-demo"><p><a href="images/33.jpg" data-lightbox-gallery="gallery1"
                                                           id="nivo-lightbox-demo"> <span class="rollover"> </span></a>
                            </p></div>
                        <img src="images/3.jpg">
                    </div>
                    <div class="cau_left">
                        <h4><a href="#">Lorem ipsum</a></h4>
                        <p>
                            On the other hand, we denounce with righteous indignation and dislike men who are so
                            beguiled pleasure of the moment,
                        </p>
                    </div>
                </div>
                <div class="item">
                    <div class="cau_left">
                        <div id="nivo-lightbox-demo"><p><a href="images/22.jpg" data-lightbox-gallery="gallery1"
                                                           id="nivo-lightbox-demo"> <span class="rollover"> </span></a>
                            </p></div>
                        <img src="images/2.jpg">
                    </div>
                    <div class="cau_left">
                        <h4><a href="#">Lorem ipsum</a></h4>
                        <p>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium,
                        </p>
                    </div>
                </div>
            </div>
            <!----//End-img-cursual---->
        </div>
        <script type="text/javascript" src="js/nivo-lightbox.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#nivo-lightbox-demo a').nivoLightbox({effect: 'fade'});
            });
        </script>

    </div>
</div>
<div class="last_posts"><!-- start last_posts -->
    <div class="wrap">
        <h5 class="heading">Last posts</h5>
        <div class="l-grids">
            <div class="l-grid-1">
                <div class="desc">
                    <h3>Lorem ipsum dolor amet,consectetur</h3>
                    <span>2nd  &nbsp; sep</span>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                        laudantium.</p>
                </div>
                <img src="images/im1.jpg">
                <div class="clear"></div>
            </div>
            <div class="l-grid-1 l-grid-2">
                <div class="desc">
                    <h3>Lorem ipsum dolor amet,consectetur</h3>
                    <span>2nd  &nbsp; sep</span>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                        laudantium.</p>
                </div>
                <img src="images/im.jpg">
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="testimonial"><!-- start last_posts -->
    <div class="wrap">
        <h5 class="heading">testimonials</h5>
        <div class="test-grids">
            <div class="test-desc">
                <h3>your testimonial here</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                    nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
            </div>
            <div class="img_1">
                <img src="images/avator.png">
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="get_in_touch"><!-- start last_posts -->
    <div class="wrap">
        <h5 class="heading">get in touch</h5>
        <div class="get-left">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur.</p>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident.</p>
        </div>
        <div class="get-right">
            <form>
                <ul>
                    <li class="name">
                        <a href="#" class="icon user"> </a>
                        <input type="text" placeholder="Your name" required="">
                        <div class="clear"></div>
                    </li>
                    <li class="email_1">
                        <a href="#" class="icon mail"> </a>
                        <input type="email" placeholder="yourname@email.com" required="">
                        <div class="clear"></div>
                    </li>
                    <div class="clear"></div>
                    <li>
                        <textarea class="plain buffer" placeholder="Your text here"> Your text here</textarea>
                    </li>
                    <input class="send" type="submit" value="Send"/>
                    <!--
                <div class="send">
                        <a href="#">SEND</a>
                </div>
                -->
                </ul>
            </form>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="footer">
    <div class="wrap">
        <div class="footer-left">
            <h3>About eracle</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam.</p>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident.</p>
            <div class="detail">
                <ul>
                    <li><a href="#">home/</a></li>
                    <li><a href="#">term of services/</a></li>
                    <li><a href="#">license/</a></li>
                    <li><a href="#">pess</a></li>
                    <div class="clear"></div>
                </ul>
            </div>
            <div class="soc_icons soc_icons1">
                <ul>
                    <li><a class="icon1" href="#"> </a></li>
                    <li><a class="icon2" href="#"> </a></li>
                    <li><a class="icon3" href="#"> </a></li>
                    <div class="clear"></div>
                </ul>

            </div>
        </div>
        <div class="footer-right">
            <h3>twitter</h3>
            <div class="comments1">
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                    pariatur. Excepteur sint occaecat cupidatat non proident. consectetur adipisicing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <span>~12 hours ago</span>
            </div>
            <div class="comments1">
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                    pariatur.</p>
                <span>~2 days ago</span>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="copy">
    <p>© 2014 Template by <a href="http://w3layouts.com" target="_blank">w3layouts</a></p>
</div>
</body>
</html>
