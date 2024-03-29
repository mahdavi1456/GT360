<!DOCTYPE html>
<html>

<head>
    <title>Flat style Website Template | Home :: w3layouts</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/fav-icon.png" />
    <link href="{{ asset('front-theme-asset/dani') }}/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="{{ asset('front-theme-asset/dani') }}/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('front-theme-asset/dani') }}/js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <link href="{{ asset('front-theme-asset/dani') }}/css/theme-style.css" rel='stylesheet' type='text/css' />
    <script src="{{ asset('front-theme-asset/dani') }}/js/jquery.easing.min.js"></script>
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front-theme-asset/dani') }}/images/fav-icon.png" />
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar () {
            window.scrollTo(0, 1);
        }
    </script>
    <!----webfonts---->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,300,500,700,800,900,600,200' rel='stylesheet'
        type='text/css'>
    <!----//webfonts---->
    <!----requred-js-files---->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('front-theme-asset/dani') }}/js/html5shiv.js"></script>
    <script src="{{ asset('front-theme-asset/dani') }}/js/respond.min.js"></script>
    <![endif]-->
    <!----//requred-js-files---->
    <script type="text/javascript" src="{{ asset('front-theme-asset/dani') }}/js/jquery.smint.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.subMenu').smint({
                'scrollSpeed': 1000
            });
        });
    </script>
</head>

<body onload="setTimeout(function() { window.scrollTo(0, 1) }, 100);">
    <!----start-container----->
    <div class="head-bg sTop">
        <div class="conatiner">
            <div class="col-lg-12 header-note">
                <a href="#"><img
                        src="{{ asset(ert('tsp') . $settingModel->getSetting('image', $accountId, $projectId)) }}"
                        title="Flat style" /></a>
                <h1>{{ $settingModel->getSetting('title', $accountId, $projectId) }}</h1>
                <a class="btn btn-primary big-btn"
                    href="#">{{ $settingModel->getSetting('button_title', $accountId, $projectId) }}<span>
                    </span></a>
            </div>
        </div>
    </div>
    <!----//End-container----->
    <!----start-top-nav---->
    <nav class="subMenu navbar-custom navbar-scroll-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <img src="{{ asset('front-theme-asset/dani') }}/images/nav-icon.png" title="drop-down-menu" />
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-left navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="active">
                        <a id="sTop" class="subNavBtn" href="#">Home</a>
                    </li>
                    <li class="page-scroll">
                        <a id="s1" class="subNavBtn" href="#">About</a>
                    </li>
                    <li class="page-scroll">
                        <a id="s2" class="subNavBtn" href="#">Portfolio</a>
                    </li>
                    <li class="page-scroll">
                        <a id="s3" class="subNavBtn" href="#">Testimonials</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
            <a id="s4" class="right-msg subNavBtn msg-icon"href="#"><span> </span></a>
            <div class="clearfix"> </div>
        </div>
        <!-- /.container -->
    </nav>
    <!----//End-top-nav---->
    <!---- start-top-grids---->
    <div class="container">
        <div class="row  section s1 top-grids">
            <div class="col-md-3 top-grid">
                <span class="icon1"> </span>
                <h2>{{ $settingModel->getSetting('title1_sec1', $accountId, $projectId) }}</h2>
                <p>{{ $settingModel->getSetting('subtitle1_sec1', $accountId, $projectId) }}</p>
            </div>
            <div class="col-md-3 top-grid">
                <span class="icon2"> </span>
                <h2>{{ $settingModel->getSetting('title2_sec1', $accountId, $projectId) }}</h2>
                <p>{{ $settingModel->getSetting('subtitle2_sec1', $accountId, $projectId) }}</p>
            </div>
            <div class="col-md-3 top-grid">
                <span class="icon3"> </span>
                <h2>{{ $settingModel->getSetting('title3_sec1', $accountId, $projectId) }}</h2>
                <p>{{ $settingModel->getSetting('subtitle3_sec1', $accountId, $projectId) }}</p>
            </div>
            <div class="col-md-3 top-grid">
                <span class="icon4"> </span>
                <h2>{{ $settingModel->getSetting('title4_sec1', $accountId, $projectId) }}</h2>
                <p>{{ $settingModel->getSetting('subtitle4_sec1', $accountId, $projectId) }}</p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!---- //End-top-grids---->
    <!----start-about---->
    <div class="about">
        <div class="container">
            <div class="col-md-6 divice">
                <img class="img-responsive"
                    src="{{ asset(ert('tsp') . $settingModel->getSetting('image_sec2', $accountId, $projectId)) }}"
                    title="divice" />
            </div>
            <div class="col-md-6 divice-info">
                <h3>{{ $settingModel->getSetting('title_sec2', $accountId, $projectId) }}</h3>
                <p>{{ $settingModel->getSetting('subtitle_sec2', $accountId, $projectId) }}</p>
                <a class="btn btn-primary btn-red"
                    href="#">{{ $settingModel->getSetting('button_title_sec2', $accountId, $projectId) }}<span>
                    </span></a>
            </div>
        </div>
    </div>
    <!----//End-about---->
    <!----start-portfolio---->
    <div class="portfolio section s2">
        <div class="container portfolio-head">
            <h3>{{ $settingModel->getSetting('title1_sec3', $accountId, $projectId) }}</h3>
            <p>{{ $settingModel->getSetting('title2_sec3', $accountId, $projectId) }}</p>
        </div>
        <!---- start-portfolio-script----->
        <script src="{{ asset('front-theme-asset/dani') }}/js/hover_pack.js"></script>
        <script type="text/javascript" src="{{ asset('front-theme-asset/dani') }}/js/jquery.mixitup.min.js"></script>
        <script type="text/javascript">
            $(function() {
                var filterList = {
                    init: function() {
                        // MixItUp plugin
                        // http://mixitup.io
                        $('#portfoliolist').mixitup({
                            targetSelector: '.portfolio',
                            filterSelector: '.filter',
                            effects: ['fade'],
                            easing: 'snap',
                            // call the hover effect
                            onMixEnd: filterList.hoverEffect()
                        });
                    },
                    hoverEffect: function() {
                        // Simple parallax effect
                        $('#portfoliolist .portfolio').hover(
                            function() {
                                $(this).find('.label').stop().animate({
                                    bottom: 0
                                }, 200, 'easeOutQuad');
                                $(this).find('img').stop().animate({
                                    top: -30
                                }, 500, 'easeOutQuad');
                            },
                            function() {
                                $(this).find('.label').stop().animate({
                                    bottom: -40
                                }, 200, 'easeInQuad');
                                $(this).find('img').stop().animate({
                                    top: 0
                                }, 300, 'easeOutQuad');
                            }
                        );
                    }

                };
                // Run the show!
                filterList.init();
            });
        </script>
        <!----//End-portfolio-script----->
        <ul id="filters" class="clearfix">
            <li><span class="filter active"
                    data-filter="app card icon logo web">{{ $settingModel->getSetting('button1_sec3', $accountId, $projectId) }}</span>
            </li>
            <li><span class="filter"
                    data-filter="app">{{ $settingModel->getSetting('button2_sec3', $accountId, $projectId) }}</span>
            </li>
            <li><span class="filter"
                    data-filter="card">{{ $settingModel->getSetting('button3_sec3', $accountId, $projectId) }}</span>
            </li>
            <li><span class="filter"
                    data-filter="icon">{{ $settingModel->getSetting('button4_sec3', $accountId, $projectId) }}</span>
            </li>
        </ul>
        <div id="portfoliolist">
            <div class="portfolio logo1 mix_all" data-cat="logo" style="display: inline-block; opacity: 1;">
                <div class="portfolio-wrapper">
                    <a data-toggle="modal" data-target=".bs-example-modal-md" href="#"
                        class="b-link-stripe b-animate-go  thickbox">
                        <img
                            src="{{ asset(ert('tsp') . $settingModel->getSetting('image1_sec4', $accountId, $projectId)) }}" />
                        <div class="b-wrapper">
                            <h2 class="b-animate b-from-left b-delay03">
                                <img src="{{ asset('front-theme-asset/dani') }}/images/link-ico.png"
                                    alt="" />
                            </h2>
                        </div>
                    </a>
                </div>
            </div>
            <div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
                <div class="portfolio-wrapper">
                    <a data-toggle="modal" data-target=".bs-example-modal-md" href="#"
                        class="b-link-stripe b-animate-go thickbox">
                        <img
                            src="{{ asset(ert('tsp') . $settingModel->getSetting('image2_sec4', $accountId, $projectId)) }}" />
                        <div class="b-wrapper">
                            <h2 class="b-animate b-from-left b-delay03">
                                <img src="{{ asset('front-theme-asset/dani') }}/images/link-ico.png"
                                    alt="" />
                            </h2>
                        </div>
                    </a>
                </div>
            </div>
            <div class="portfolio web mix_all" data-cat="web" style="display: inline-block; opacity: 1;">
                <div class="portfolio-wrapper">
                    <a data-toggle="modal" data-target=".bs-example-modal-md" href="#"
                        class="b-link-stripe b-animate-go thickbox">
                        <img
                            src="{{ asset(ert('tsp') . $settingModel->getSetting('image3_sec4', $accountId, $projectId)) }}" />
                        <div class="b-wrapper">
                            <h2 class="b-animate b-from-left b-delay03">
                                <img src="{{ asset('front-theme-asset/dani') }}/images/link-ico.png"
                                    alt="" />
                            </h2>
                        </div>
                    </a>
                </div>
            </div>
            <div class="portfolio icon mix_all" data-cat="icon" style="display: inline-block; opacity: 1;">
                <div class="portfolio-wrapper">
                    <a data-toggle="modal" data-target=".bs-example-modal-md" href="#"
                        class="b-link-stripe b-animate-go thickbox">
                        <img
                            src="{{ asset(ert('tsp') . $settingModel->getSetting('image4_sec4', $accountId, $projectId)) }}" />
                        <div class="b-wrapper">
                            <h2 class="b-animate b-from-left b-delay03">
                                <img src="{{ asset('front-theme-asset/dani') }}/images/link-ico.png"
                                    alt="" />
                            </h2>
                        </div>
                    </a>
                </div>
            </div>
            <div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
                <div class="portfolio-wrapper">
                    <a data-toggle="modal" data-target=".bs-example-modal-md" href="#"
                        class="b-link-stripe b-animate-go thickbox">
                        <img
                            src="{{ asset(ert('tsp') . $settingModel->getSetting('image5_sec4', $accountId, $projectId)) }}" />
                        <div class="b-wrapper">
                            <h2 class="b-animate b-from-left b-delay03">
                                <img src="{{ asset('front-theme-asset/dani') }}/images/link-ico.png"
                                    alt="" />
                            </h2>
                        </div>
                    </a>
                </div>
            </div>
            <div class="portfolio card mix_all" data-cat="card" style="display: inline-block; opacity: 1;">
                <div class="portfolio-wrapper">
                    <a data-toggle="modal" data-target=".bs-example-modal-md" href="#"
                        class="b-link-stripe b-animate-go thickbox">
                        <img
                            src="{{ asset(ert('tsp') . $settingModel->getSetting('image6_sec4', $accountId, $projectId)) }}" />
                        <div class="b-wrapper">
                            <h2 class="b-animate b-from-left b-delay03 ">
                                <img src="{{ asset('front-theme-asset/dani') }}/images/link-ico.png"
                                    alt="" />
                            </h2>
                        </div>
                    </a>
                </div>
            </div>
            <div class="portfolio card mix_all" data-cat="card" style="display: inline-block; opacity: 1;">
                <div class="portfolio-wrapper">
                    <a data-toggle="modal" data-target=".bs-example-modal-md" href="#"
                        class="b-link-stripe b-animate-go  thickbox">
                        <img
                            src="{{ asset(ert('tsp') . $settingModel->getSetting('image7_sec4', $accountId, $projectId)) }}" />
                        <div class="b-wrapper">
                            <h2 class="b-animate b-from-left b-delay03">
                                <img src="{{ asset('front-theme-asset/dani') }}/images/link-ico.png"
                                    alt="" />
                            </h2>
                        </div>
                    </a>
                </div>
            </div>
            <div class="portfolio logo1 mix_all" data-cat="icon" style="display: inline-block; opacity: 1;">
                <div class="portfolio-wrapper">
                    <a data-toggle="modal" data-target=".bs-example-modal-md" href="#"
                        class="b-link-stripe b-animate-go  thickbox">
                        <img
                            src="{{ asset(ert('tsp') . $settingModel->getSetting('image8_sec4', $accountId, $projectId)) }}" />
                        <div class="b-wrapper">
                            <h2 class="b-animate b-from-left b-delay03">
                                <img src="{{ asset('front-theme-asset/dani') }}/images/link-ico.png"
                                    alt="" />
                            </h2>
                        </div>
                    </a>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!----//End-portfolio---->
    <!---testmonials---->
    <div class="testmonials section s3">
        <div class="container">
            <div class="bs-example">
                <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators pagenate-icons">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="active item">
                            <h2><img src="{{ asset(ert('tsp') . $settingModel->getSetting('image1_sec5', $accountId, $projectId)) }}"
                                    title="name" /></h2>
                            <div class="carousel-caption caption">
                                <h3>{{ $settingModel->getSetting('title1_sec5', $accountId, $projectId) }}</h3>
                                <p>{{ $settingModel->getSetting('subtitle1_sec5', $accountId, $projectId) }} </p>
                            </div>
                        </div>
                        <div class="item">
                            <h2><img src="{{ asset(ert('tsp') . $settingModel->getSetting('image2_sec5', $accountId, $projectId)) }}"
                                    title="name" /></h2>
                            <div class="carousel-caption caption">
                                <h3>{{ $settingModel->getSetting('title2_sec5', $accountId, $projectId) }}</h3>
                                <p>{{ $settingModel->getSetting('subtitle2_sec5', $accountId, $projectId) }}</p>
                            </div>
                        </div>
                        <div class="item">
                            <h2><img src="{{ asset(ert('tsp') . $settingModel->getSetting('image3_sec5', $accountId, $projectId)) }}"
                                    title="name" /></h2>
                            <div class="carousel-caption caption">
                                <h3>{{ $settingModel->getSetting('title3_sec5', $accountId, $projectId) }}</h3>
                                <p>{{ $settingModel->getSetting('subtitle3_sec5', $accountId, $projectId) }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel nav -->
                </div>
            </div>
        </div>
    </div>
    <!---testmonials---->
    <!----start-model-box---->
    <a data-toggle="modal" data-target=".bs-example-modal-md" href="#"> </a>
    <div class="modal fade bs-example-modal-md light-box" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content light-box-info">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <img src="{{ asset('front-theme-asset/dani') }}/images/close.png" title="close" />
                </button>
                <h3>Place Yours content here</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris egestas orci et blandit dictum.
                    Interdum et malesuada fames ac ante ipsum primis in faucibus. Interdum et malesuada fames ac ante
                    ipsum primis in faucibus. Quisque posuere diam et est hendrerit, eget sodales lectus tincidunt.
                    Etiam suscipit orci sapien, at molestie lorem imperdiet vitae. Fusce nunc eros, congue non hendrerit
                    sed, lobortis scelerisque magna. Ut in nunc sem. Integer bibendum enim et erat molestie, sed
                    interdum nisl ultricies. In hac habitasse platea dictumst. Nullam sem diam, tincidunt dapibus tellus
                    pulvinar, pulvinar tempus dui. Integer eu faucibus arcu. Duis adipiscing commodo ipsum dapibus
                    elementum.</p>
            </div>
        </div>
    </div>
    <!----start-model-box---->
    <!----start-contact---->
    <div class="contact section s4">
        <div class="container">
            <h4>{{ $settingModel->getSetting('title1_sec6', $accountId, $projectId) }}</h4>
            <p class="contact-head">{{ $settingModel->getSetting('title2_sec6', $accountId, $projectId) }}</p>
            <div class="row contact-form">
                <form>
                    <div class="col-md-6 text-box">
                        <input type="text" placeholder="نام" />
                        <input type="text" placeholder="ایمیل" />
                        <input type="text" placeholder="موضوع" />
                    </div>
                    <div class="col-md-6 textarea">
                        <textarea>پیام</textarea>
                    </div>
                    <div class="clearfix"> </div><br />
                    <input class="btn btn-primary btn-red-lg" type="submit" value="{{ $settingModel->getSetting('button_sec6', $accountId, $projectId) }}" />
                </form>
            </div>
            <!----start-social-icons--->
            <div class="social-icons">
                <ul>
                    <li><a class="facebook" href="#"> <span> </span></a></li>
                    <li><a class="twitter" href="#"> <span> </span></a></li>
                    <li><a class="dribbble" href="#"> <span> </span></a></li>
                </ul>
            </div>
            <!----//End-social-icons--->
            <!----start-copy-right---->
            <div class="copy-right">
                <p>Copyright &#169; {{ $settingModel->getSetting('copy_sec6', $accountId, $projectId) }}</p>
                <p>طراحی شده<a href="http://gratech.ir">توسط گراتک</a></p>
            </div>
            <!----//End-copy-right---->
        </div>
    </div>
    <!----//End-contact---->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('front-theme-asset/dani') }}/js/bootstrap.min.js"></script>
</body>

</html>
