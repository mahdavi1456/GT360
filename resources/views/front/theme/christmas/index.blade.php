<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===========================
    THEME INFO
    =========================== -->
    <meta name="description" content="{{ $settingModel->getSetting('description', $accountId) }}">
    <!-- ===========================
    SITE TITLE
    =========================== -->
    <title>{{ $settingModel->getSetting('title', $accountId) }}</title>

    <!-- ===========================
    FAVICONS
    =========================== -->
    <link rel="icon" href="{{ asset('front-theme-asset/christmas') }}/img/favicon.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('front-theme-asset/christmas') }}/img/apple-touch-icon-ipad-retina.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('front-theme-asset/christmas') }}/img/apple-touch-icon-iphone-retina.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('front-theme-asset/christmas') }}/img/apple-touch-icon-ipad.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('front-theme-asset/christmas') }}/img/apple-touch-icon-iphone.png" />

    <!-- ===========================
    STYLESHEETS
    =========================== -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('front-theme-asset/christmas') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('front-theme-asset/christmas') }}/css/responsive.css">
    <link rel="stylesheet" href="{{ asset('front-theme-asset/christmas') }}/css/animate.css">

    <!-- ===========================
    FONTS
    =========================== -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,900,600|Pacifico' rel='stylesheet' type='text/css'>

    <!-- ===========================
    GOOGLE ANALYTICS (Optional)
    =========================== -->

    <!-- #NOTE: Replace this line with your analytics code -->

    <!--ANALYTICS END-->

    <!--[if IE]>
        <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- ===========================
    HERO SECTION
    =========================== -->
    <div id="hero">
        <div class="redoverlay">
            <div class="container">
                <div class="row">
                    <div class="herotext">
                        <h2 class="wow zoomInDown" data-wow-duration="3s">{{ $settingModel->getSetting('title', $accountId) }}</h2>
                        <h1 class="wow flipInY">{{ $settingModel->getSetting('description', $accountId) }}</h1>

                        <a class="btn btn-reverse wow zoomIn" href="#products">
                            <h3>{{ $settingModel->getSetting('button_title', $accountId) }}</h3>
                        </a><!--#NOTE: texts inside the OPTIONAL tag above would be hidden on smaller mobile screens -->

                        <p class="wow fadeInUp" data-wow-duration="2s">{{ $settingModel->getSetting('third_title_sec1', $accountId) }}</p>

                        <img class="bigbell wow tada infinite" data-wow-duration="30s" src="{{ asset('front-theme-asset/christmas') }}/img/bell.png" alt="">
                    </div>

                    <div class="santa wow bounceInDown" data-wow-duration="2s">
                        <img src="{{ asset('front-theme-asset/christmas') }}/img/santa.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div><!--HERO SECTION END-->

    <!-- ===========================
    OVERVIEW SECTION
    =========================== -->
    <div id="overview" class="container">
        <!--SECTIONHEAD START-->
        <div class="sectionhead">
            <h2>{{ $settingModel->getSetting('first_title_sec2', $accountId) }}</h2>
            <p>{{ $settingModel->getSetting('second_title_sec2', $accountId) }}</p>
            <hr>
        </div><!--SECTIONHEAD END-->

        <!--OVERVIEW ITEMS-->
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <img src='{{ asset(ert('tsp') . $settingModel->getSetting('image1_sec1', $accountId)) }}'>
                <h4>{{ $settingModel->getSetting('title1_sec1', $accountId) }}</h4>
                <p>{{ $settingModel->getSetting('subtitle1_sec1', $accountId) }}</p>
            </div><!--ITEM END-->

          <div class="col-md-6 col-lg-4">
                <img src='{{ asset(ert('tsp') . $settingModel->getSetting('image2_sec1', $accountId)) }}'>
                <h4>{{ $settingModel->getSetting('title2_sec1', $accountId) }}</h4>
                <p>{{ $settingModel->getSetting('subtitle2_sec1', $accountId) }}</p>
            </div><!--ITEM END-->
    <div class="col-md-6 col-lg-4">
                <img src='{{ asset(ert('tsp') . $settingModel->getSetting('image3_sec1', $accountId)) }}'>
                <h4>{{ $settingModel->getSetting('title3_sec1', $accountId) }}</h4>
                <p>{{ $settingModel->getSetting('subtitle3_sec1', $accountId) }}</p>
            </div><!--ITEM END-->
    <div class="col-md-6 col-lg-4">
                <img src='{{ asset(ert('tsp') . $settingModel->getSetting('image4_sec1', $accountId)) }}'>
                <h4>{{ $settingModel->getSetting('title4_sec1', $accountId) }}</h4>
                <p>{{ $settingModel->getSetting('subtitle4_sec1', $accountId) }}</p>
            </div><!--ITEM END-->

          <div class="col-md-6 col-lg-4">
                <img src='{{ asset(ert('tsp') . $settingModel->getSetting('image5_sec1', $accountId)) }}'>
                <h4>{{ $settingModel->getSetting('title5_sec1', $accountId) }}</h4>
                <p>{{ $settingModel->getSetting('subtitle5_sec1', $accountId) }}</p>
            </div><!--ITEM END-->

            <div class="col-md-6 col-lg-4">
                <img src='{{ asset(ert('tsp') . $settingModel->getSetting('image6_sec1', $accountId)) }}'>
                <h4>{{ $settingModel->getSetting('title6_sec1', $accountId) }}</h4>
                <p>{{ $settingModel->getSetting('subtitle6 _sec1', $accountId) }}</p>
            </div><!--ITEM END-->
        </div><!--OVERVIEW ITEMS END-->
    </div><!--OVERVIEW SECTION END-->

    <!-- ===========================
    CALL-TO-ACTION SECTION
    =========================== -->
    <div class="calltoaction">
    <div class="lightoverlay">
        <div class="container">
            <div class="col-md-4">
                <img src='{{ asset(ert('tsp') . $settingModel->getSetting('image_sec2', $accountId)) }}'>
            </div><!--CALL-TO-ACTION IMAGE END-->

            <div class="sectionhead content col-md-8">
                <h2>{{ $settingModel->getSetting('title _sec2', $accountId) }}</h2>
                <p>{{ $settingModel->getSetting('subtitle _sec2', $accountId) }}</p>
                <a href="" class="btn btn-default">Download</a>
            </div><!--CALL-TO-ACTION CONTENT END-->
        </div><!--CALL-TO-ACTION CONTAINER END-->
    </div><!--CALL-TO-ACTION OVERLAY END-->
</div><!--CALL-TO-ACTION END-->

    <!-- ===========================
    PRODUCTS SECTION
    =========================== -->
    <div id="products" class="container">

        <!--SECTIONHEAD START-->
        <div class="sectionhead text-center">
            <h2>Catch the <span class="highlight">bang head</span> deals</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
            <hr>
        </div><!--SECTIONHEAD END-->

        <!--FEATURED PRODUCT START-->
        <div class="featureditem row">
            <div class="col-md-5 text-center">
                <a href="">
                    <img class="productimg" src="{{ asset('front-theme-asset/christmas') }}/img/product-1.jpg" alt="">
                </a>

                <!--DISCOUNT TAG-->
                <div class="offertag percentoffer bigtag">
                    <h4>50%</h4>
                    <p>off</p>
                </div>
                <!--DISCOUNT TAG END-->
            </div><!--PRODUCT IMAGE END-->

            <!--PRODUCT DETAILS STRART-->
            <div class="col-md-7">
                <h4><a href="">Christmas Special Girls Shoe Dui Din O Tikbo na</a></h4>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

                <p class="price">US <span class="highlight">$4.25</span> / piece</p>
                <p>Original Price: US $8.49 , You Save:US $4.24</p>

                <a href="" class="btn btn-default">Buy now</a>
            </div><!--ITEM DETAILS END-->
        </div><!--FEATURED PRODUCT END-->

        <hr><!--SEPARETOR LINE-->

        <!--SMALL ITEM 1ST ROW START-->
        <div class="row moreitems">
            <!--SMALL ITEM 1 START-->
            <div class="col-md-6">
                <!--SMALL PRODUCT IMAGE START-->
                <div class="col-md-4 text-center">
                    <a href="">
                        <img class="productimg" src="{{ asset('front-theme-asset/christmas') }}/img/product-2.jpg" alt="">
                    </a>

                    <!--DISCOUNT TAG-->
                    <div class="smalltag offertag fixedoffer">
                        <h4>$39</h4>
                        <p>off</p>
                    </div><!--DISCOUNT TAG END-->
                </div><!--PRODUCT IMAGE END-->

                <!--SMALL PRODUCT DESCRIPTION START-->
                <div class="col-md-8">
                    <h4><a href="">Eida Kintu Tomato Na Morich</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                    <p class="price">US <span class="highlight">$4.25</span> / piece</p>
                    <p>Original Price: US $8.49 , You Save:US $4.24</p>
                </div><!--SMALL PRODUCT DESCRIPTION END-->
            </div><!--SMALL ITEM 1 END-->

            <!--SMALL ITEM 2 START-->
            <div class="col-md-6">
                <!--SMALL PRODUCT IMAGE START-->
                <div class="col-md-4 text-center">
                    <a href="">
                        <img class="productimg" src="{{ asset('front-theme-asset/christmas') }}/img/product-3.jpg" alt="">
                    </a>

                    <!--DISCOUNT TAG-->
                    <div class="smalltag offertag percentoffer">
                        <h4>30%</h4>
                        <p>off</p>
                    </div><!--DISCOUNT TAG END-->
                </div><!--PRODUCT IMAGE END-->

                <!--SMALL PRODUCT DESCRIPTION START-->
                <div class="col-md-8">
                    <h4><a href="">Girls' Pocha Chocolate Shoe</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                    <p class="price">US <span class="highlight">$4.25</span> / piece</p>
                    <p>Original Price: US $8.49 , You Save:US $4.24</p>
                </div><!--SMALL PRODUCT DESCRIPTION END-->
            </div><!--SMALL ITEM 2 END-->
        </div><!--SMALL ITEM 1ST ROW END-->

        <!--SMALL ITEM 2ND ROW START-->
        <div class="row moreitems">
            <!--SMALL ITEM 3 START-->
            <div class="col-md-6">
                <!--SMALL PRODUCT IMAGE START-->
                <div class="col-md-4 text-center">
                    <a href="">
                        <img class="productimg" src="{{ asset('front-theme-asset/christmas') }}/img/product-4.jpg" alt="">
                    </a>

                    <!--DISCOUNT TAG-->
                    <div class="smalltag offertag otheroffer">
                        <h4>Free</h4>
                        <p>Gift</p>
                    </div><!--DISCOUNT TAG END-->
                </div><!--PRODUCT IMAGE END-->

                <!--SMALL PRODUCT DESCRIPTION START-->
                <div class="col-md-8">
                    <h4><a href="">Dui Nombor Colorful Blanket</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                    <p class="price">US <span class="highlight">$4.25</span> / piece</p>
                    <p>Original Price: US $8.49 , You Save:US $4.24</p>
                </div><!--SMALL PRODUCT DESCRIPTION END-->
            </div><!--SMALL ITEM 3 END-->

            <!--SMALL ITEM 4 START-->
            <div class="col-md-6">
                <!--SMALL PRODUCT IMAGE START-->
                <div class="col-md-4 text-center">
                    <a href="">
                        <img class="productimg" src="{{ asset('front-theme-asset/christmas') }}/img/product-5.jpg" alt="">
                    </a>

                    <!--DISCOUNT TAG-->
                    <div class="smalltag offertag fixedoffer">
                        <h4>$20</h4>
                        <p>off</p>
                    </div><!--DISCOUNT TAG-->
                </div><!--PRODUCT IMAGE END-->

                <!--SMALL PRODUCT DESCRIPTION START-->
                <div class="col-md-8">
                    <h4><a href="">Azaira Baby Toy Kinley Dhora</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
                    <p class="price">US <span class="highlight">$4.25</span> / piece</p>
                    <p>Original Price: US $8.49 , You Save:US $4.24</p>
                </div><!--SMALL PRODUCT DESCRIPTION END-->
            </div><!--SMALL ITEM 4 END-->
        </div><!--SMALL ITEM 2ND ROW END-->
    </div><!--PRODUCTS SECTION END-->

    <!-- ===========================
    SUBSCRIBE SECTION
    =========================== -->
    <div id="subscribe">
        <div class="darkoverlay">
            <div class="container text-center">
                <img class="santaicon wow tada infinite" data-wow-duration="20s" src="{{ asset('front-theme-asset/christmas') }}/img/santa-sm.png" alt="">
                <div class="sectionhead">
                    <h2>Don’t miss the <span class="highlight">upcoming hot deals</span> amymore</h2>
                    <p>Just give us your email address below, and forget it. We’ll send you every time we have something special for you. No worries, Santa never send spam mails. And you can unsubscribe anytime as well.</p>
                </div><!--SECTIONHEAD END-->

                <!--MAILCHIMP FORM START-->
                <div class="mailchimp">
                    <form action="http://evenfly.us8.list-manage.com/subscribe/post?u=62bca83399cf0083546588b62&amp;id=f85a072005" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate><!-- #NOTE: Replace this with your Mailchimp action URL -->

                            <input type="text" value="" name="FNAME" id="mce-FNAME" placeholder="First Name" required>
                            <input type="email" value="" name="EMAIL" id="mce-EMAIL" placeholder="Email Address" required>
                            <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-inverse">
                    </form>
                </div>
            </div><!--SUBSCRIBE CONTAINER END-->
        </div><!--OVERLAY END-->
    </div><!--SUBSCRIBE SECTION END-->

    <!-- ===========================
    FOOTER
    =========================== -->
    <footer class="container text-center">
        <h2 class="logo">Santa<span class="highlight">Go</span></h2>
        <img class="santacap" src="{{ asset('front-theme-asset/christmas') }}/img/santa_cap.png" alt="">
        <P>Another free Bootstrap Landing page temlate from <a href="http://evenfly.com">EvenFly</a> released under <a href="https://creativecommons.org/licenses/by/3.0/">CC 3.0</a> license.</P>
        <hr>
    </footer><!--FOOTER END-->

    <!-- ===========================
    SOCIAL ICONS
    =========================== -->
    <div class="sticky-container">
		<ul class="sticky">
			<li>
				<a href="">
                    <img title="" alt="" src="{{ asset('front-theme-asset/christmas') }}/img/facebook.svg" />
                    <p>Facebook</p>
				</a>
			</li>

			<li>
				<a href="">
                    <img title="" alt="" src="{{ asset('front-theme-asset/christmas') }}/img/twitter.svg" />
                    <p>Twitter</p>
				</a>
			</li>

			<li>
				<a href="">
                    <img title="" alt="" src="{{ asset('front-theme-asset/christmas') }}/img/pinterest.svg" />
                    <p>Pinterest</p>
				</a>
			</li>

			<li>
				<a href="">
                    <img title="" alt="" src="{{ asset('front-theme-asset/christmas') }}/img/linkedin.svg" />
                    <p>Linkedin</p>
				</a>
			</li>

			<li>
			    <a href="">
                    <img title="" alt="" src="{{ asset('front-theme-asset/christmas') }}/img/google_plus.svg" />
                    <p>Google Plus</p>
				</a>
			</li>

			<li>
			    <a href="">
                    <img title="" alt="" src="{{ asset('front-theme-asset/christmas') }}/img/instagram.svg" />
                    <p>Instagram</p>
				</a>
			</li>

		</ul>
	</div>
    <!-- ===========================
    NECESSARY SCRIPTS
    =========================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('front-theme-asset/christmas') }}/js/evenfly.js"></script>
    <script src="{{ asset('front-theme-asset/christmas') }}/js/jquery.nicescroll.min.js"></script>
    <script src="{{ asset('front-theme-asset/christmas') }}/js/wow.min.js"></script>
    <script src="{{ asset('front-theme-asset/christmas') }}/js/snowstorm-min.js"></script>
    <script>new WOW().init();</script>
</body>
</html>
