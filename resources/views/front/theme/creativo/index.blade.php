<!DOCTYPE html>
<html>
<head>
    <title>The Creatio Website Template | Home :: w3layouts</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/creativo') }}/css/style.css" media="all" />
    <link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script type="text/javascript" src="{{ asset('front-theme-asset/creativo') }}/js/jquery.min.js"></script>
    <!---strat-slider---->
    <link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/creativo') }}/css/slider.css" />
    <script type="text/javascript" src="{{ asset('front-theme-asset/creativo') }}/js/modernizr.custom.28468.js"></script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/creativo') }}/js/jquery.cslider.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#da-slider').cslider({
                autoplay	: true,
                bgincrement	: 450
            });
        });
    </script>
    <!---//strat-slider---->
    <!-- scroll -->
    <script type="text/javascript">
        $(document).ready(function () {
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear'
            };
            $().UItoTop({ easingType: 'easeOutQuart' });
        });
    </script>
    <!-- //scroll -->
    <!-- start portfolios -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/creativo') }}/css/portfolio.css" media="all" />
    <script type="text/javascript" src="{{ asset('front-theme-asset/creativo') }}/js/fliplightbox.min.js"></script>
    <script type="text/javascript">
        $('body').flipLightBox()
    </script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/creativo') }}/js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/creativo') }}/js/jquery.mixitup.min.js"></script>
    <script type="text/javascript">
        $(function () {
            var filterList = {
                init : function () {
                    // MixItUp plugin
                    // http://mixitup.io
                    $('#portfoliolist').mixitup({
                        targetSelector : '.portfolio',
                        filterSelector : '.filter',
                        effects : ['fade'],
                        easing : 'snap',
                        // call the hover effect
                        onMixEnd : filterList.hoverEffect()
                    });
                },
                hoverEffect : function() {
                    // Simple parallax effect
                    $('#portfoliolist .portfolio').hover(function() {
                        $(this).find('.label').stop().animate({
                            bottom : 0
                        }, 200, 'easeOutQuad');
                        $(this).find('img').stop().animate({
                            top : -40
                        }, 500, 'easeOutQuad');
                    }, function() {
                        $(this).find('.label').stop().animate({
                            bottom : -40
                        }, 200, 'easeInQuad');
                        $(this).find('img').stop().animate({
                            top : 0
                        }, 300, 'easeOutQuad');
                    });
                }
            };
            // Run the show!
            filterList.init();
        });
    </script>
    <!-- popup -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/creativo') }}/css/magnific-popup1.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/creativo') }}/css/magnific-popup.css">
    <script type="text/javascript" src="{{ asset('front-theme-asset/creativo') }}/js/jquery.magnific-popup.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });
        });
    </script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/creativo') }}/js/jquery.lightbox.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/creativo') }}/css/lightbox.css" media="screen" />
    <script type="text/javascript">
        $(function() {
            $('#portfoliolist a').lightBox();
        });
    </script>
    <!-- nav -->
    <script type="text/javascript" 	src="{{ asset('front-theme-asset/creativo') }}/js/jquery.smint.js"></script>
    <script type="text/javascript">
        $(document).ready( function() {
            $('.subMenu').smint({
                'scrollSpeed' : 1000
            });
        });
    </script>
    <script type="text/javascript">
        window.addEventListener("load", function () {
            setTimeout(function () {
                window.scrollTo(0, 1);
            }, 0);
        });
    </script>
</head>
<body>
<!-- start slider -->
<div class="slider_bg s7">
    <!-- start main -->
    <!---start-da-slider----->
    <div id="da-slider" class="da-slider">
        <div class="da-slide">
            <h2 class="title">PSD CONCEPT</h2>
            <h3 class="title">CREATIVE PORTFOLIO</h3>
            <p class="description">WEB DESIGN . DEVELOPMENT . MARKETING</p>
        </div>
        <div class="da-slide">
            <h2 class="title">PSD CONCEPT</h2>
            <h3 class="title">CREATIVE PORTFOLIO</h3>
            <p class="description">WEB DESIGN . DEVELOPMENT . MARKETING</p>
        </div>
        <div class="da-slide">
            <h2 class="title">PSD CONCEPT</h2>
            <h3 class="title">CREATIVE PORTFOLIO</h3>
            <p class="description">WEB DESIGN . DEVELOPMENT . MARKETING</p>
        </div>
        <div class="da-slide">
            <h2 class="title">PSD CONCEPT</h2>
            <h3 class="title">CREATIVE PORTFOLIO</h3>
            <p class="description">WEB DESIGN . DEVELOPMENT . MARKETING</p>
        </div>
        <div class="da-slide">
            <h2 class="title">PSD CONCEPT</h2>
            <h3 class="title">CREATIVE PORTFOLIO</h3>
            <p class="description">WEB DESIGN . DEVELOPMENT . MARKETING</p>
        </div>
    </div>
    <!---//End-da-slider----->
</div>
<a href="#services" class="button scroll"><img src="{{ asset('front-theme-asset/creativo') }}/images/arrow.png"></a>
<!-- start header -->
<div class="header">
    <div class="logo">
        <a  href="#s7" class="scroll"><img src="{{ asset('front-theme-asset/creativo') }}/images/logo.png"></a>
    </div>
    <!-- start top-nav-->
    <div class="h_right">
        <div class="subMenu" >
            <div class="wrap">
                <div class="inner">
                    <a href="#" id="sTop" class="subNavBtn">SERVICES</a>
                    <a href="#" id="s1" class="subNavBtn">WORKS</a>
                    <a href="#" id="s2" class="subNavBtn">ABOUT US</a>
                    <a href="#" id="s3" class="subNavBtn">BLOG</a>
                    <a href="#" id="s4" class="subNavBtn">STUDIO</a>
                    <a href="#" id="s5" class="subNavBtn end">PRICING</a>
                    <a href="#" id="s6" class="subNavBtn end">CONTACT</a>
                </div>
                <!-- /.navbar-collapse -->
                <a id="s7" class="right-msg subNavBtn msg-icon"href="#"><span> </span></a>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- start smart_nav * -->
        <nav class="nav">
            <ul class="nav-list">
                <li class="nav-item"><a href="#services">Services</a></li>
                <li class="nav-item"><a href="#work" class="scroll">Works</a></li>
                <li class="nav-item"><a href="#about" class="scroll">About us</a></li>
                <li class="nav-item"><a href="#blog" class="scroll">Blog</a></li>
                <li class="nav-item"><a href="#studio" class="scroll">Studio</a></li>
                <li class="nav-item"><a href="#pricing" class="scroll">Pricing</a></li>
                <li class="nav-item"><a href="#contact"  class="scroll">Contact</a></li>
                <div class="clear"></div>
            </ul>
        </nav>
        <script type="text/javascript" src="{{ asset('front-theme-asset/creativo') }}/js/responsive.menu.js"></script>
        <!-- end smart_nav * -->
    </div>
    <div class="clear"></div>
</div>
<!---//End-header--->
<!--- services --->
<div class="services sTop" id="services">
    <div class="wrap">
        <h3>SERVICES</h3>
        <p>Proin iaculis purus consequat sem cure.</p>
        <div class="col_1_of_3 span_1_of_3">
            <img src="{{ asset('front-theme-asset/creativo') }}/images/service1.png" alt="">
            <h4><a href="#">PIXEL PERFECT</a></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <p><a href="#">MORE</a></p>
        </div>
        <div class="col_1_of_3 span_1_of_3">
            <img src="{{ asset('front-theme-asset/creativo') }}/images/service2.png" alt="">
            <h4><a href="#">CREATIVE DESIGN</a></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <p><a href="#">MORE</a></p>
        </div>
        <div class="col_1_of_3 span_1_of_3">
            <img src="{{ asset('front-theme-asset/creativo') }}/images/service3.png" alt="">
            <h4><a href="#">RESPONSIVE THEME</a></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <p><a href="#">MORE</a></p>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="portfoliO s1" id="work">
    <!-- start portfoli1 -->
    <div class="wrap">
        <h3>WORKS</h3>
        <p>Proin iaculis purus consequat sem cure.</p>
        <div class="container">
            <!-- start container -->
            <!-- start h_menu -->
            <div class="h_menu">
                <ul class="flexy-menu thick orange">
                    <li class="active"> <span class="filter active" data-filter="app card icon web">VIEW ALL</span></li>
                    <li><span class="filter" data-filter="app  icon">ILLUSTRATION</span></li>
                    <li><span class="filter" data-filter="card ">LOGO</span></li>
                    <li><span class="filter" data-filter="icon app card ">THIPOGRAPHY</span></li>
                    <li><span class="filter" data-filter="web card icon">POSTER</span></li>
                </ul>
            </div>
            <!-- end h_menu -->
            <script type="text/javascript" src="{{ asset('front-theme-asset/creativo') }}/js/flexy-menu.js"></script>
            <link href="{{ asset('front-theme-asset/creativo') }}css/header_style1.css" rel="stylesheet" type="text/css" media="all" />
            <script type="text/javascript">
                $(document).ready(function () {
                    $(".flexy-menu").flexymenu({ speed: 400, type: "horizontal", align: "right"});
                });
            </script>
            <!-- end smart_nav * -->
            <ul id="filters" class="clearfix">
                <li>
                    <span class="filter active" data-filter="app card icon web">VIEW ALL</span>
                </li>
                <li>
                    <span class="filter" data-filter="app  icon">ILLUSTRATION</span>
                </li>
                <li>
                    <span class="filter" data-filter="card ">LOGO</span>
                </li>
                <li>
                    <span class="filter" data-filter="icon app card ">THIPOGRAPHY</span>
                </li>
                <li>
                    <span class="filter" data-filter="web card icon">POSTER</span>
                </li>
            </ul>
            <div id="portfoliolist">
                <div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
                    <div class="portfolio-wrapper">
                        <a href="{{ asset('front-theme-asset/creativo') }}/images/port.jpg #small-dialog1" class="flipLightBox popup-with-zoom-anim">
                            <img src="{{ asset('front-theme-asset/creativo') }}/images/port.jpg" alt="Image 2" style="top: 0px;">
                        </a>
                    </div>
                </div>
                <div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
                    <div class="portfolio-wrapper">
                        <a href="{{ asset('front-theme-asset/creativo') }}/images/port1.jpg #small-dialog1" class="flipLightBox popup-with-zoom-anim">
                            <img src="{{ asset('front-theme-asset/creativo') }}/images/port1.jpg" alt="Image 2" style="top: 0px;">
                        </a>
                    </div>
                </div>
                <div class="portfolio web mix_all" data-cat="web" style="display: inline-block; opacity: 1;">
                    <div class="portfolio-wrapper">
                        <a href="{{ asset('front-theme-asset/creativo') }}/images/port2.jpg #small-dialog1" class="flipLightBox popup-with-zoom-anim">
                            <img src="{{ asset('front-theme-asset/creativo') }}/images/port2.jpg" alt="Image 2" style="top: 0px;">
                        </a>
                    </div>
                </div>
                <div class="portfolio card mix_all" data-cat="card" style="display: inline-block; opacity: 1;">
                    <div class="portfolio-wrapper">
                        <a href="{{ asset('front-theme-asset/creativo') }}/images/port3.jpg #small-dialog1" class="flipLightBox popup-with-zoom-anim">
                            <img src="{{ asset('front-theme-asset/creativo') }}/images/port3.jpg" alt="Image 2" style="top: 0px;">
                        </a>
                    </div>
                </div>
                <div class="portfolio web mix_all" data-cat="web" style="display: inline-block; opacity: 1;">
                    <div class="portfolio-wrapper">
                        <a href="{{ asset('front-theme-asset/creativo') }}/images/port4.jpg #small-dialog1" class="flipLightBox popup-with-zoom-anim">
                            <img src="{{ asset('front-theme-asset/creativo') }}/images/port4.jpg" alt="Image 2" style="top: 0px;">
                        </a>
                    </div>
                </div>
                <div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
                    <div class="portfolio-wrapper">
                        <a href="{{ asset('front-theme-asset/creativo') }}/images/port5.jpg #small-dialog1" class="flipLightBox popup-with-zoom-anim">
                            <img src="{{ asset('front-theme-asset/creativo') }}/images/port5.jpg" alt="Image 5" style="top: 0px;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="img">
            <a href="#"><img src="{{ asset('front-theme-asset/creativo') }}/images/zoom.png" alt=""></a>
        </div>
    </div>
    <!-- end container -->
</div>
<!----start-team-members---->
<div class="team-members s2" id="about">
    <div class="wrap">
        <div class="tm-head">
            <h3>ABOUT US</h3>
            <p>Proin iaculis purus consequat sem cure.</p>
        </div>
        <div class="tm-head-grids">
            <div class="tm-head-grid">
                <img src="{{ asset('front-theme-asset/creativo') }}/images/team-member1.jpg" alt="" />
                <h4>JOHNNY BEAR</h4>
                <h5>CEO, Founder</h5>
                <ul class="top-social-icons">
                    <li><a class="twitter simptip-position-bottom simptip-movable" data-tooltip="twitter" href="#"> </a></li>
                    <li><a class="facebook simptip-position-bottom simptip-movable" data-tooltip="Facebook" href="#"> </a></li>
                    <li><a class="pin simptip-position-bottom simptip-movable" data-tooltip="pintrest" href="#"> </a></li>
                    <div class="clear"> </div>
                </ul>
            </div>
            <div class="tm-head-grid">
                <img src="{{ asset('front-theme-asset/creativo') }}/images/team-member2.jpg" alt="" />
                <h4>AARON TIGER</h4>
                <h5>Designer</h5>
                <ul class="top-social-icons">
                    <li><a class="twitter simptip-position-bottom simptip-movable" data-tooltip="twitter" href="#"> </a></li>
                    <li><a class="facebook simptip-position-bottom simptip-movable" data-tooltip="Facebook" href="#"> </a></li>
                    <li><a class="pin simptip-position-bottom simptip-movable" data-tooltip="pintrest" href="#"> </a></li>
                    <div class="clear"> </div>
                </ul>
            </div>
            <div class="tm-head-grid">
                <img src="{{ asset('front-theme-asset/creativo') }}/images/team-member3.jpg" alt="" />
                <h4>MARK FOX</h4>
                <h5>Developer</h5>
                <ul class="top-social-icons">
                    <li><a class="twitter simptip-position-bottom simptip-movable" data-tooltip="twitter" href="#"> </a></li>
                    <li><a class="facebook simptip-position-bottom simptip-movable" data-tooltip="Facebook" href="#"> </a></li>
                    <li><a class="pin simptip-position-bottom simptip-movable" data-tooltip="pintrest" href="#"> </a></li>
                    <div class="clear"> </div>
                </ul>
            </div>
            <div class="clear"> </div>
        </div>
    </div>
</div>
<!----//End-team-members---->
<!----start-team-members---->
<div class="experience">
    <div class="wrap">
        <div class="ex-head">
            <h3>OUR EXPERIENCE</h3>
            <p>Proin iaculis purus consequat sem cure.</p>
        </div>
        <div class="prog">
            <div class="text">
                <span>Web design</span>
            </div>
            <div class="text_p">
                <span>90%</span>
            </div>
            <div class="clear"></div>
            <div class="progress-bar-container" data-percent="90%">
                <div class="progress-bar" style="width: 90%;"></div>
            </div>
        </div>
        <div class="prog1">
            <div class="text">
                <span>HTML/css</span>
            </div>
            <div class="text_p">
                <span>40%</span>
            </div>
            <div class="clear"></div>
            <div class="progress-bar-container" data-percent="90%">
                <div class="progress-bar1" style="width: 40%;">
                </div>
            </div>
        </div>
        <div class="prog2">
            <div class="text">
                <span>illustration</span>
            </div>
            <div class="text_p">
                <span>60%</span>
            </div>
            <div class="clear"></div>
            <div class="progress-bar-container" data-percent="90%">
                <div class="progress-bar2" style="width: 60%;">
                </div>
            </div>
        </div>
    </div>
</div>
<!----//End-team-members---->
<!---- fun ---->
<div class="fun">
    <div class="wrap">
        <div class="fun-head">
            <h3>SOME FUN FACTS</h3>
        </div>
        <div class="fun-head-grids">
            <div class="fun-head-grid">
                <img src="{{ asset('front-theme-asset/creativo') }}/images/fact1.png" alt="" />
                <h4>638</h4>
                <h5>CUP OF COFFEE</h5>
            </div>
            <div class="fun-head-grid">
                <img src="{{ asset('front-theme-asset/creativo') }}/images/fact2.png" alt="" />
                <h4>746</h4>
                <h5>HAPPY CLIENTS</h5>
            </div>
            <div class="fun-head-grid">
                <img src="{{ asset('front-theme-asset/creativo') }}/images/fact3.png" alt="" />
                <h4>887</h4>
                <h5>SONG LISTENED</h5>
            </div>
            <div class="fun-head-grid">
                <img src="{{ asset('front-theme-asset/creativo') }}/images/fact4.png" alt="" />
                <h4>1047</h4>
                <h5>ENDED PROJECTS</h5>
            </div>
            <div class="clear"> </div>
        </div>
    </div>
</div>
<!----//End-fun---->
<!----start-blog---->
<div class="blog s3" id="blog">
    <div class="wrap">
        <div class="blog-head">
            <h3>BLOG</h3>
            <p>Proin iaculis purus consequat sem cure.</p>
        </div>
        <div class="blog-grid">
            <div class="blog-left">
                <div class="img-left">
                    <img src="{{ asset('front-theme-asset/creativo') }}/images/blog1.jpg" alt="" />
                </div>
                <div class="text-right">
                    <h6>March 29, 2014</h6>
                    <h3><a href="#">A NEW INVENTION FOR LOVERS WHO LOVE</a></h3>
                    <img src="{{ asset('front-theme-asset/creativo') }}/images/line.png" alt="" />
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum ....</p>
                    <p><a href="#">MORE</a></p>
                </div>
                <div class="clear"> </div>
            </div>
            <div class="blog-right">
                <div class="img-left">
                    <img src="{{ asset('front-theme-asset/creativo') }}/images/blog2.jpg" alt="" />
                </div>
                <div class="text-right">
                    <h6>March 29, 2014</h6>
                    <h3><a href="#">A NEW INVENTION FOR LOVERS WHO LOVE</a></h3>
                    <img src="{{ asset('front-theme-asset/creativo') }}/images/line.png" alt="" />
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum ....</p>
                    <p><a href="#">MORE</a></p>
                </div>
                <div class="clear"> </div>
            </div>
            <div class="clear"> </div>
        </div>
        <div class="blog-grid">
            <div class="blog-left">
                <div class="img-left">
                    <img src="{{ asset('front-theme-asset/creativo') }}/images/blog3.jpg" alt="" />
                </div>
                <div class="text-right">
                    <h6>March 29, 2014</h6>
                    <h3><a href="#">A NEW INVENTION FOR LOVERS WHO LOVE</a></h3>
                    <img src="{{ asset('front-theme-asset/creativo') }}/images/line.png" alt="" />
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum ....</p>
                    <p><a href="#">MORE</a></p>
                </div>
                <div class="clear"> </div>
            </div>
            <div class="blog-right">
                <div class="img-left">
                    <img src="{{ asset('front-theme-asset/creativo') }}/images/blog4.jpg" alt="" />
                </div>
                <div class="text-right">
                    <h6>March 29, 2014</h6>
                    <h3><a href="#">A NEW INVENTION FOR LOVERS WHO LOVE</a></h3>
                    <img src="{{ asset('front-theme-asset/creativo') }}/images/line.png" alt="" />
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum ....</p>
                    <p><a href="#">MORE</a></p>
                </div>
                <div class="clear"> </div>
            </div>
            <div class="clear"> </div>
        </div>
    </div>
</div>
<!----//End-blog---->
<!---- strat-studio---->
<div class="studio s4" id="studio">
    <div class="wrap">
        <div class="studio-head">
            <h3>STUDIO</h3>
            <p>Proin iaculis purus consequat sem cure.</p>
        </div>
    </div>
    <iframe src="//player.vimeo.com/video/91973305" width="600px" style="margin: 0 auto;" height="400" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
</div>
<!----//End-studio---->
<!---- strat-clent---->
<div class="clients">
    <div class="wrap">
        <div class="client-head">
            <h3>OUR CLIENTS</h3>
        </div>
        <!---strat-image-cursuals---->
        <div class="t-clients">
            <div class="wrap">
                <div class="nbs-flexisel-container">
                    <div class="nbs-flexisel-inner">
                        <ul class="flexiselDemo3 nbs-flexisel-ul" style="left: -253.6px; display: block;">
                            <li onclick="location.href='#';" class="nbs-flexisel-item" style="width: 253.6px;">
                                <img src="{{ asset('front-theme-asset/creativo') }}/images/client1.png">
                            </li>
                            <li onclick="location.href='#';" class="nbs-flexisel-item" style="width: 253.6px;">
                                <img src="{{ asset('front-theme-asset/creativo') }}/images/client2.png">
                            </li>
                            <li onclick="location.href='#';" class="nbs-flexisel-item" style="width: 253.6px;">
                                <img src="{{ asset('front-theme-asset/creativo') }}/images/client3.png">
                            </li>
                            <li onclick="location.href='#';" class="nbs-flexisel-item" style="width: 253.6px;">
                                <img src="{{ asset('front-theme-asset/creativo') }}/images/client4.png">
                            </li>
                            <li onclick="location.href='#';" class="nbs-flexisel-item" style="width: 253.6px;">
                                <img src="{{ asset('front-theme-asset/creativo') }}/images/client5.png">
                            </li>
                            <li onclick="location.href='#';" class="nbs-flexisel-item" style="width: 253.6px;">
                                <img src="{{ asset('front-theme-asset/creativo') }}/images/client1.png">
                            </li>
                            <li onclick="location.href='#';" class="nbs-flexisel-item" style="width: 253.6px;">
                                <img src="{{ asset('front-theme-asset/creativo') }}/images/client2.png">
                            </li>
                            <li onclick="location.href='#';" class="nbs-flexisel-item" style="width: 253.6px;">
                                <img src="{{ asset('front-theme-asset/creativo') }}/images/client3.png">
                            </li>
                        </ul>
                        <div class="nbs-flexisel-nav-left" style="top: 21.5px;"></div>
                        <div class="nbs-flexisel-nav-right" style="top: 21.5px;"></div>
                    </div>
                </div>
                <div class="clear"> </div>
                <!---strat-image-cursuals---->
                <script type="text/javascript" src="{{ asset('front-theme-asset/creativo') }}/js/jquery.flexisel.js"></script>
                <!---End-image-cursuals---->
                <script type="text/javascript">
                    $(window).load(function () {
                        $(".flexiselDemo3").flexisel({
                            visibleItems: 5,
                            animationSpeed: 1000,
                            autoPlay: true,
                            autoPlaySpeed: 3000,
                            pauseOnHover: true,
                            enableResponsiveBreakpoints: true,
                            responsiveBreakpoints: {
                                portrait: {
                                    changePoint:480,
                                    visibleItems: 1
                                },
                                landscape: {
                                    changePoint:640,
                                    visibleItems: 2
                                },
                                tablet: {
                                    changePoint:768,
                                    visibleItems: 3
                                }
                            }
                        });
                    });
                </script>
                <!---->
                <!---->
            </div>
        </div>
    </div>
</div>
<!----//End-clients---->
<div class="pricing s5" id="pricing">
    <div class="wrap">
        <div class="pricing-head">
            <h3>PRICING TABLES</h3>
            <p>Proin iaculis purus consequat sem cure.</p>
        </div>
        <div class="pricing-grids">
            <div class="pricing-grid1">
                <h3><a href="#">$<span>9</span><p>month</p></a></h3>
                <div class="price-value">
                    <a href="#">MINI</a>
                </div>
                <img src="{{ asset('front-theme-asset/creativo') }}/images/border.png" alt="" />
                <ul>
                    <li><a href="#">Lorem ipsum</a></li>
                    <li><a href="#">Dolor sitamet, Consect</a></li>
                    <li><a href="#">Adipiscing elit</a></li>
                    <li><a href="#">Proin commodo turips</a></li>
                    <li><a href="#">Laws pulvinarvel</a></li>
                    <li><a href="#">Prnare nisi pretium</a></li>
                </ul>
                <div class="cart1">
                    <div class="span3"><a class="popup-with-zoom-anim" href="#small-dialog"><j>TRY</j></a></div>
                </div>
            </div>
            <div class="pricing-grid2">
                <h3><a href="#">$<span>29</span><p>month</p></a></h3>
                <div class="price-value">
                    <a href="#">STANDARD</a>
                </div>
                <img src="{{ asset('front-theme-asset/creativo') }}/images/border.png" alt="" />
                <ul>
                    <li><a href="#">Lorem ipsum</a></li>
                    <li><a href="#">Dolor sitamet, Consect</a></li>
                    <li><a href="#">Adipiscing elit</a></li>
                    <li><a href="#">Proin commodo turips</a></li>
                    <li><a href="#">Laws pulvinarvel</a></li>
                    <li><a href="#">Prnare nisi pretium</a></li>
                    <li><a href="#">Proin commodo turips</a></li>
                    <li><a href="#">Laws pulvinarvel</a></li>
                </ul>
                <div class="cart1">
                    <div class="span3"><a class="popup-with-zoom-anim" href="#small-dialog"><k>TRY</k></a></div>
                </div>
            </div>
            <div class="pricing-grid3">
                <h3><a href="#">$<span>99</span><p>month</p></a></h3>
                <div class="price-value">
                    <a href="#">PREMIUM</a>
                </div>
                <img src="{{ asset('front-theme-asset/creativo') }}/images/border.png" alt="" />
                <ul>
                    <li><a href="#">Lorem ipsum</a></li>
                    <li><a href="#">Dolor sitamet, Consect</a></li>
                    <li><a href="#">Adipiscing elit</a></li>
                    <li><a href="#">Proin commodo turips</a></li>
                    <li><a href="#">Laws pulvinarvel</a></li>
                    <li><a href="#">Prnare nisi pretium</a></li>
                    <li><a href="#">Dolor sitamet, Consect</a></li>
                    <li><a href="#">Adipiscing elit</a></li>
                    <li><a href="#">Proin commodo turips</a></li>
                    <li><a href="#">Laws pulvinarvel</a></li>
                </ul>
                <div class="cart1">
                    <div class="span3"><a class="popup-with-zoom-anim" href="#small-dialog"><l>TRY</l></a></div>
                </div>
            </div>
            <!-----pop-up-grid---->
            <div id="small-dialog" class="mfp-hide">
                <div class="pop_up">
                    <div class="payment-online-form-left">
                        <form>
                            <h4><span class="shipping"> </span>Shipping</h4>
                            <ul>
                                <li><input class="text-box-dark" type="text" value="Frist Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Frist Name';}"></li>
                                <li><input class="text-box-dark" type="text" value="Last Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Last Name';}"></li>
                            </ul>
                            <ul>
                                <li><input class="text-box-dark" type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}"></li>
                                <li><input class="text-box-dark" type="text" value="Company Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Company Name';}"></li>
                            </ul>
                            <ul>
                                <li><input class="text-box-dark" type="text" value="Phone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}"></li>
                                <li><input class="text-box-dark" type="text" value="Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Address';}"></li>
                                <div class="clear"> </div>
                            </ul>
                            <div class="clear"> </div>
                            <ul class="payment-type">
                                <h4><span class="payment"> </span> Payments</h4>
                                <li>
                                    <span class="col_checkbox">
                                        <input id="3" class="css-checkbox1" type="checkbox">
                                        <label for="3" name="demo_lbl_1" class="css-label1"> </label>
                                        <a class="visa" href="#"> </a>
                                    </span>
                                </li>
                                <li>
                                    <span class="col_checkbox">
                                        <input id="4" class="css-checkbox2" type="checkbox">
                                        <label for="4" name="demo_lbl_2" class="css-label2"> </label>
                                        <a class="paypal" href="#"> </a>
                                    </span>
                                </li>
                                <div class="clear"> </div>
                            </ul>
                            <ul>
                                <li><input class="text-box-dark" type="text" value="Card Number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Card Number';}"></li>
                                <li><input class="text-box-dark" type="text" value="Name on card" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name on card';}"></li>
                                <div class="clear"> </div>
                            </ul>
                            <ul>
                                <li><input class="text-box-light hasDatepicker" type="text" id="datepicker" value="Expiration Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Expiration Date';}"><em class="pay-date"> </em></li>
                                <li><input class="text-box-dark" type="text" value="Security Code" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Security Code';}"></li>
                                <div class="clear"> </div>
                            </ul>
                            <ul class="payment-sendbtns">
                                <li><input type="reset" value="Cancel"></li>
                                <li><input type="submit" value="Process order"></li>
                            </ul>
                            <div class="clear"> </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-----pop-up-grid---->
        </div>
        <div class="clear"> </div>
    </div>
</div>
<!-----logos---->
<div class="logos">
    <div class="wrap">
        <ul>
            <li><img src="{{ asset('front-theme-asset/creativo/') }}images/client6.png" alt="" /></li>
            <li><img src="{{ asset('front-theme-asset/creativo/') }}images/client7.png" alt="" /></li>
            <li><img src="{{ asset('front-theme-asset/creativo/') }}images/client8.png" alt="" /></li>
        </ul>
    </div>
</div>
<!-----cntact---->
<div class="contact s6" id="contact">
    <div class="wrap">
        <h3>CONTACT US</h3>
        <p>Proin iaculis purus consequat sem cure.</p>
        <div class="contact_form">
            <form method="post" action="contact-post.html">
                <span><input type="text" value="NAME" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'NAME';}"><label><img src="images/con1.png" alt="" /></label></span>
                <span class="left"><input type="text" value="EMAIL" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'EMAIL';}"><label><img src="images/con2.png" alt="" /></label></span>
                <div class="clear"></div>
                <span>
                    <textarea placeholder="MESSAGE"></textarea>
                    <label>
                        <img src="{{ asset('front-theme-asset/creativo') }}/images/con3.png" alt="" />
                    </label>
                </span>
                <input type="submit" class="" value="Submit">
            </form>
        </div>
    </div>
</div>
<div class="map">
    <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:12px"></a></small>
</div>
<div class="signup">
    <div class="form">
        <span><label><img src="{{ asset('front-theme-asset/creativo/') }}images/msg.png" alt="" /></label><input type="text" value="Your E-MAIL Please?" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your E-MAIL Please?';}"></span>
        <span><input type="submit" value="Sign Up Now" id="submit" name="submit"></span>
        <p>Promise we do not spam : )</p>
        <div class="clear"> </div>
    </div>
</div>
<!----start-bottom-footer---->
<div class="bottom-footer">
    <div class="wrap">
        <div class="bottom-footer-center">
            <ul class="bottom-social-icons">
                <li><a class="bottom-twitter" href="#"> </a></li>
                <li><a class="bottom-facebook" href="#"> </a></li>
                <li><a class="bottom-pin" href="#"> </a></li>
                <li><a class="bottom-google" href="#"> </a></li>
                <div class="clear"> </div>
            </ul>
        </div>
        <div class="bottom-footer-left">
            <p><span>&#169; Copyright 2014 Creativo</span> Template by <a href="http://w3layouts.com/">W3layouts</a></p>
        </div>
        <div class="clear"> </div>
    </div>
</div>
    <!----//End-bottom-footer---->
    <!-- scroll_top_btn -->
    <script type="text/javascript" src="{{ asset('front-theme-asset/creativo') }}/js/move-top.js"></script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/creativo') }}/js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html, body').animate({ scrollTop: $(this.hash).offset().top }, 1200);
            });
        });
    </script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>
