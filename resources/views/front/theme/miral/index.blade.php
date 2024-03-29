<!DOCTYPE HTML>
<html>

<head>
    <title>{{ $settingModel->getSetting('title', $accountId) }}</title>
    <link href="{{ asset('front-theme-asset/miral') }}/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="{{ asset('front-theme-asset/miral') }}/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="{{ asset('front-theme-asset/miral') }}/js/bootstrap.js"></script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/miral') }}/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $settingModel->getSetting('title', $accountId) }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet'
        type='text/css'>
    <link href="{{ asset('front-theme-asset/miral') }}/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--  jquery plguin -->
    <script type="text/javascript" src="{{ asset('front-theme-asset/miral') }}/js/jquery.min.js"></script>
    <!--start slider -->
    <link rel="stylesheet" href="{{ asset('front-theme-asset/miral') }}/css/fwslider.css" media="all">
    <script src="{{ asset('front-theme-asset/miral') }}/js/jquery-ui.min.js"></script>
    <script src="{{ asset('front-theme-asset/miral') }}/js/css3-mediaqueries.js"></script>
    <script src="{{ asset('front-theme-asset/miral') }}/js/fwslider.js"></script>
    <!--end slider -->
    <script type="text/javascript">
        $(document).ready(function() {
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear'
            };
            $().UItoTop({
                easingType: 'easeOutQuart'
            });
        });
    </script>
    <!-- start testimonials -->
    <!-- da-slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/miral') }}/css/slider.css" />
    <script type="text/javascript" src="{{ asset('front-theme-asset/miral') }}/js/modernizr.custom.28468.js"></script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/miral') }}/js/jquery.cslider.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#da-slider').cslider({
                autoplay: true,
                bgincrement: 450
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('#da-slider1').cslider({
                autoplay: true,
                bgincrement: 450
            });
        });
    </script>
</head>

<body>
    <!-- start header -->
    <div class="header_bg">
        <!-- start header -->
        <div class="header_bg">
            <!-----start-conatiner---->
            <div class="container">
                <!-----start-header---->
                <div class="header">
                    <!----start-top-nav---->
                    <header id="topnav">
                        <nav>
                            <ul>
                                <li class="active"><a href="#home">Home</a></li>
                                <li><a href="#about" class="scroll">About</a></li>
                                <li><a href="#portfolio" class="scroll">Portfolio</a></li>
                                <li><a href="#team" class="scroll">Team</a></li>
                                <li><a href="#blog" class="scroll">Blog</a></li>
                                <li class="last"><a href="#contact" class="scroll">Contact</a></li>
                                <div class="clearfix"></div>
                            </ul>
                        </nav>
                        <h1><a href="index.html"><img
                                    src="{{ asset(ert('tsp') . $settingModel->getSetting('logo', $accountId)) }}"
                                    alt="" /></a>
                        </h1>
                        <a href="#" id="navbtn">Nav Menu</a>
                        <div class="clearfix"></div>
                    </header>
                    <!----start-top-nav---->
                </div>
                <!-----start-header---->
            </div>
        </div>
        <script type="text/javascript" src="{{ asset('front-theme-asset/miral') }}/js/menu.js"></script>
    </div>
    <!----start-images-slider---->
    <div class="images-slider">
        <!-- start slider -->
        <div id="fwslider">
            <div class="slider_container">
                <div class="slide">
                    <!-- Slide image -->
                    <img src="{{ asset('front-theme-asset/miral') }}/images/background.jpg" alt="" />
                    <!-- /Slide image -->
                    <!-- Texts container -->
                    <div class="slide_content">
                        <div class="slide_content_wrap">
                            <!-- Text description -->
                            <p class="description">GRAB YOUR COPY OF</p>
                            <!-- /Text description -->
                            <!-- Text title -->
                            <h4 class="title">THE <span>PREMIUM</span> QUALITY<br>
                                PSD TEMPLATE FOR <span>FREE</span></h4>
                            <!-- /Text title -->
                            <p class="description"><a href="index.html">DOWNLOAD <img
                                        src="{{ asset('front-theme-asset/miral') }}/images/download.png"
                                        alt="" /></a>
                            </p>
                            <div class="slide-btns description">
                            </div>
                        </div>
                    </div>
                    <!-- /Texts container -->
                </div>
                <!-- /Duplicate to create more slides -->
                <div class="slide">
                    <img src="{{ asset('front-theme-asset/miral') }}/images/background1.jpg" alt="" />
                    <div class="slide_content">
                        <div class="slide_content_wrap">
                            <!-- Text description -->
                            <p class="description">GRAB YOUR COPY OF</p>
                            <!-- /Text description -->
                            <!-- Text title -->
                            <h4 class="title">THE <span>PREMIUM</span> QUALITY<br>
                                PSD TEMPLATE FOR <span>FREE</span></h4>
                            <!-- /Text title -->
                            <p class="description"><a href="index.html">DOWNLOAD <img
                                        src="{{ asset('front-theme-asset/miral') }}/images/download.png"
                                        alt="" /></a>
                            </p>
                            <div class="slide-btns description">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <img src="{{ asset('front-theme-asset/miral') }}/images/background1.jpg" alt="" />
                    <div class="slide_content">
                        <div class="slide_content_wrap">
                            <!-- Text description -->
                            <p class="description">GRAB YOUR COPY OF</p>
                            <!-- /Text description -->
                            <!-- Text title -->
                            <h4 class="title">THE <span>PREMIUM</span> QUALITY<br>
                                PSD TEMPLATE FOR <span>FREE</span></h4>
                            <!-- /Text title -->
                            <p class="description"><a href="index.html">DOWNLOAD <img
                                        src="{{ asset('front-theme-asset/miral') }}/images/download.png"
                                        alt="" /></a>
                            </p>
                            <div class="slide-btns description">
                            </div>
                        </div>
                    </div>
                </div>
                <!--/slide -->
            </div>
            <div class="timers"></div>
            <div class="slidePrev"><span> </span></div>
            <div class="slideNext"><span> </span></div>
        </div>
        <!--/slider -->
    </div>
    <!-- about -->
    <div class="about" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>{{ fa_number($settingModel->getSetting('first_title', $accountId)) }}</h3>
                    <span> </span>
                    <p>{{ fa_number($settingModel->getSetting('first_subtitle', $accountId)) }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="about-bottom">
        <div class="about-left pull-left">
            <h4>{{ fa_number($settingModel->getSetting('first_title_section2', $accountId)) }}</h4>
            <p>{{ fa_number($settingModel->getSetting('secound_title_section2', $accountId)) }} </p>
            <p>{{ fa_number($settingModel->getSetting('thired_title_section2', $accountId)) }}</p>
            @if ($button_section2 = $settingModel->getSetting('button_section2', $accountId))
                <p><a href="index.html">{{ fa_number($settingModel->getSetting('button_section2', $accountId)) }}</a>
                </p>
            @endif
        </div>
        <div class="about-right pull-right">
            <img src="{{ asset(ert('tsp') . $settingModel->getSetting('first_cover', $accountId)) }}"
                alt="" />
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- service -->
    <div class="service text-center">
        <div class="container">
            <h3>{{ fa_number($settingModel->getSetting('service_title', $accountId)) }}</h3>
            <p>{{ fa_number($settingModel->getSetting('service_text', $accountId)) }}</p>
            <div class="service-bottom">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset(ert('tsp') . $settingModel->getSetting('first_icon', $accountId)) }}"
                            alt="" />
                        <h4><a
                                href="index.html">{{ fa_number($settingModel->getSetting('first_title_section3', $accountId)) }}</a>
                        </h4>
                        <p>{{ fa_number($settingModel->getSetting('first_subtitle_section3', $accountId)) }}</p>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset(ert('tsp') . $settingModel->getSetting('secound_icon', $accountId)) }}"
                            alt="" />
                        <h4><a
                                href="index.html">{{ fa_number($settingModel->getSetting('secound_title_section3', $accountId)) }}</a>
                        </h4>
                        <p>{{ fa_number($settingModel->getSetting('secound_subtitle_section3', $accountId)) }}</p>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset(ert('tsp') . $settingModel->getSetting('third_icon', $accountId)) }}"
                            alt="" />
                        <h4><a
                                href="index.html">{{ fa_number($settingModel->getSetting('third_title_section3', $accountId)) }}</a>
                        </h4>
                        <p>{{ fa_number($settingModel->getSetting('third_subtitle_section3', $accountId)) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- skills -->
    <div class="skills text-center">
        <div class="container">
            <h4></h4>
            <div class="client">
                <div class="pie-wrapper progress-45 style-2">
                    <span class="label">45<span class="smaller">%</span></span>
                    <div class="pie">
                        <div class="left-side half-circle"></div>
                        <div class="right-side half-circle"></div>
                    </div>
                    <div class="shadow"></div>
                    <h3>MARKETING</h3>
                </div>
                <div class="pie-wrapper progress-75 style-2">
                    <span class="label">75<span class="smaller">%</span></span>
                    <div class="pie">
                        <div class="left-side half-circle"></div>
                        <div class="right-side half-circle"></div>
                    </div>
                    <div class="shadow"></div>
                    <h3>RESEARCH</h3>
                </div>
                <div class="pie-wrapper progress-95 style-2">
                    <span class="label">95<span class="smaller">%</span></span>
                    <div class="pie">
                        <div class="left-side half-circle"></div>
                        <div class="right-side half-circle"></div>
                    </div>
                    <div class="shadow"></div>
                    <h3>MANAGEMENT</h3>
                </div>
                <div class="pie-wrapper progress-45 style-2">
                    <span class="label">45<span class="smaller">%</span></span>
                    <div class="pie">
                        <div class="left-side half-circle"></div>
                        <div class="right-side half-circle"></div>
                    </div>
                    <div class="shadow"></div>
                    <h3>CONSULTANCY</h3>
                </div>
                <div class="pie-wrapper progress-75 style-2">
                    <span class="label">75<span class="smaller">%</span></span>
                    <div class="pie">
                        <div class="left-side half-circle"></div>
                        <div class="right-side half-circle"></div>
                    </div>
                    <div class="shadow"></div>
                    <h3>PROMOTION</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- portfolio -->
    <div class="portfilio" id="portfolio">
        <div class="container">
            <div class="about">
                <div class="row  Protects">
                    <div class="col-md-12">
                        <h3>{{ fa_number($settingModel->getSetting('title_section7', $accountId)) }}</h3>
                        <span></span>
                        <p>{{ fa_number($settingModel->getSetting('text_section7', $accountId)) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="port">
            <ul>
                <li>
                    <div class="view view-fourth">
                        <img src="{{ asset('front-theme-asset/miral') }}/images/port1.jpg" alt="" />
                        <div class="mask">
                            <div class="border">
                                <h2>PAPERCLIPS</h2>
                                <span></span>
                                <p class="a">BRANDING</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="view view-fourth">
                        <img src="{{ asset('front-theme-asset/miral') }}/images/port2.jpg" alt="" />
                        <div class="mask">
                            <div class="border">
                                <h2>PAPERCLIPS</h2>
                                <span></span>
                                <p class="a">BRANDING</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="view view-fourth">
                        <img src="{{ asset('front-theme-asset/miral') }}/images/port3.jpg" alt="" />
                        <div class="mask">
                            <div class="border">
                                <h2>PAPERCLIPS</h2>
                                <span></span>
                                <p class="a">BRANDING</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="view view-fourth">
                        <img src="{{ asset('front-theme-asset/miral') }}/images/port4.jpg" alt="" />
                        <div class="mask">
                            <div class="border">
                                <h2>PAPERCLIPS</h2>
                                <span></span>
                                <p class="a">BRANDING</p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="port-text">
            <h4>LATEST FROM TWITTER</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
        </div>
        <div class="port">
            <ul>
                <li>
                    <div class="view view-fourth">
                        <img src="{{ asset('front-theme-asset/miral') }}/images/port1.jpg" alt="" />
                        <div class="mask">
                            <div class="border">
                                <h2>PAPERCLIPS</h2>
                                <span></span>
                                <p class="a">BRANDING</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="view view-fourth">
                        <img src="{{ asset('front-theme-asset/miral') }}/images/port2.jpg" alt="" />
                        <div class="mask">
                            <div class="border">
                                <h2>PAPERCLIPS</h2>
                                <span></span>
                                <p class="a">BRANDING</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="view view-fourth">
                        <img src="{{ asset('front-theme-asset/miral') }}/images/port3.jpg" alt="" />
                        <div class="mask">
                            <div class="border">
                                <h2>PAPERCLIPS</h2>
                                <span></span>
                                <p class="a">BRANDING</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="view view-fourth">
                        <img src="{{ asset('front-theme-asset/miral') }}/images/port4.jpg" alt="" />
                        <div class="mask">
                            <div class="border">
                                <h2>PAPERCLIPS</h2>
                                <span></span>
                                <p class="a">BRANDING</p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <p><a href="index.html">SEE ALL<span> </span></a></p>
        </div>
    </div>
    <div class="team" id="team">
        <div class="container">
            <div class="about">
                <div class="row">
                    <div class="col-md-12">
                        <h3>OUR TEAM MEMBERS</h3>
                        <span> </span>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum Lorem
                            Ipsum
                            has been.</p>
                    </div>
                </div>
            </div>
            <div class="team-member">
                <ul>
                    <li>
                        <div class="view1 view-fourth1">
                            <img src="{{ asset('front-theme-asset/miral') }}/images/team.jpg" alt="" />
                            <div class="mask1">
                                <div class="border1">
                                    <div class="social-icons-set">
                                        <ul>
                                            <li><a class="facebook" href="#"> </a></li>
                                            <li><a class="twitter" href="#"> </a></li>
                                            <li><a class="vimeo" href="#"> </a></li>
                                            <div class="clear"></div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <P><a href="#">Lorem Ipsum<br><label>Typesetting industry</label></a></P>
                    </li>
                    <li>
                        <div class="view1 view-fourth1">
                            <img src="{{ asset('front-theme-asset/miral') }}/images/team1.jpg" alt="" />
                            <div class="mask1">
                                <div class="border1">
                                    <div class="social-icons-set">
                                        <ul>
                                            <li><a class="facebook" href="#"> </a></li>
                                            <li><a class="twitter" href="#"> </a></li>
                                            <li><a class="vimeo" href="#"> </a></li>
                                            <div class="clear"></div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <P><a href="#">Lorem Ipsum<br><label>Typesetting industry</label></a></P>
                    </li>
                    <li>
                        <div class="view1 view-fourth1">
                            <img src="{{ asset('front-theme-asset/miral') }}/images/team2.jpg" alt="" />
                            <div class="mask1">
                                <div class="border1">
                                    <div class="social-icons-set">
                                        <ul>
                                            <li><a class="facebook" href="#"> </a></li>
                                            <li><a class="twitter" href="#"> </a></li>
                                            <li><a class="vimeo" href="#"> </a></li>
                                            <div class="clear"></div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <P><a href="#">Lorem Ipsum<br><label>Typesetting industry</label></a></P>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="slider">
        <div id="da-slider1" class="da-slider">
            <!-- da-slider -->
            <div class="da-slide">
                <h2>What our Clients are Saying</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and
                    scrambled.</p>
            </div>
            <div class="da-slide">
                <h2>Clean & Flat Design</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and
                    scrambled.</p>
            </div>
            <div class="da-slide">
                <h2>Clean & Flat Design</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and
                    scrambled.</p>
            </div>
            <div class="da-slide">
                <h2>Flat Design websites</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and
                    scrambled.</p>
            </div>
        </div><!-- da-slider -->
    </div>
    <div class="blog" id="blog">
        <div class="container">
            <div class="about">
                <div class="row">
                    <div class="col-md-12">
                        <h3>OUR BLOG</h3>
                        <span></span>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum Lorem
                            Ipsum
                            has been.</p>
                    </div>
                </div>
            </div>
            <div class="blog-bottom">
                <div class="blog-left">
                    <img src="{{ asset('front-theme-asset/miral') }}/images/camera.jpg" alt="" />
                </div>
                <span class="circle"></span>
                <div class="blog-right">
                    <h6>10 April 2014</h6>
                    <h4>Printing and typesetting industry</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                        type
                        and scrambled</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="blog-bottom">
                <div class="blog-left">
                    <h6>10 April 2014</h6>
                    <h4>Printing and typesetting industry</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                        type
                        and scrambled</p>
                </div>
                <span class="circle"></span>
                <div class="blog-right">
                    <img src="{{ asset('front-theme-asset/miral') }}/images/camera.jpg" alt="" />
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="blog-bottom">
                <div class="blog-left last">
                    <img src="{{ asset('front-theme-asset/miral') }}/images/camera.jpg" alt="" />
                </div>
                <span class="circle"> </span>
                <div class="blog-right">
                    <h6>10 April 2014</h6>
                    <h4>Printing and typesetting industry</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                        type
                        and scrambled</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="post"><a href="#">All Posts</a></div>
        </div>
    </div>
    <!---start-contact---->
    <div class="contact s4" id="contact">
        <div class="container">
            <h3>CONTACT</h3>
            <div class="row">
                <div class="col-md-12">
                    <form>
                        <input type="text" class="textbox" value="Name" onfocus="this.value = '';"
                            onblur="if (this.value == '') {this.value = 'Name';}">
                        <input type="text" class="textbox" value="Email" onfocus="this.value = '';"
                            onblur="if (this.value == '') {this.value = 'Email';}">
                        <textarea value="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!---End-contact---->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="index.html"><img src="images/logo1.png" alt="" /></a>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the
                        industry</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                        type
                        and scrambled</p>
                </div>
                <div class="col-md-3">
                    <h4>RECENT POSTS</h4>
                    <div class="foot">
                        <span>24 march 2014</span>
                        <p><a href="#">Printing and typesetting industry</a></p>
                    </div>
                    <div class="foot">
                        <span>24 march 2014</span>
                        <p><a href="#">Printing and typesetting industry</a></p>
                    </div>
                    <div class="foot">
                        <span>24 march 2014</span>
                        <p><a href="#">Printing and typesetting industry</a></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4>TWITTER FEEDS</h4>
                    <div class="foot">
                        <span>industry@info.com</span>
                        <p><a href="#">Printing and typesetting industry</a></p>
                    </div>
                    <div class="foot">
                        <span>industry@info.com</span>
                        <p><a href="#">Printing and typesetting industry</a></p>
                    </div>
                    <div class="foot">
                        <span>industry@info.com</span>
                        <p><a href="#">Printing and typesetting industry</a></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4 class="a">RECENT POSTS</h4>
                    <p class="a">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has
                        been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                        galley
                        of type and scrambled</p>
                    <address>
                        <p class="b">Typesetting industry</p>
                        <p class="b">Lorem Ipsum has</p>
                        <p class="b">Phone : 466,348457,7459</p>
                    </address>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copy-right">
                        <p>&#169 Copyright 2014 All Rights Reserved Template <a href="http://w3layouts.com/">
                                w3layouts.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- scroll_top_btn -->
    <script type="text/javascript" src="{{ asset('front-theme-asset/miral') }}/js/move-top.js"></script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/miral') }}/js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1200);
            });
        });
    </script>

    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>

</html>
