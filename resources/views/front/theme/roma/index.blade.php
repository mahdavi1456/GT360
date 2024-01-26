<!DOCTYPE html>
<html lang="en">
<head>
    <title>ROMNA Parallax Bootstrap template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <!--
    ROMNA Template
    http://www.templatemo.com/free-website-templates/
    -->
    <!-- STYLESHEET CSS FILES -->
    <link rel="stylesheet" href="{{ asset('front-theme-asset/roma') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('front-theme-asset/roma') }}/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('front-theme-asset/roma') }}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('front-theme-asset/roma') }}/css/nivo-lightbox.css">
    <link rel="stylesheet" href="{{ asset('front-theme-asset/roma') }}/css/nivo_themes/default/default.css">
    <link rel="stylesheet" href="{{ asset('front-theme-asset/roma') }}/css/templatemo-style.css">
</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
<!-- preloader section -->
<div class="preloader">
    <div class="sk-spinner sk-spinner-rotating-plane"></div>
</div>
<!-- home section -->
<section id="home">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h1 class="wow bounceInDown rotate">{{ $settingModel->getSetting('title') }}</h1>
                <h2 class="wow bounce">{{ $settingModel->getSetting('description') }}</h2>
                <a href="#intro" class="btn btn-default smoothScroll">GET STARTED</a>
            </div>
        </div>
    </div>
</section>
<!-- navigation section -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> <span class="icon icon-bar"></span> </button>
            <a href="#" class="navbar-brand">ROMNA</a></div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#home" class="smoothScroll">HOME</a></li>
                <li><a href="#intro" class="smoothScroll">INTRO</a></li>
                <li><a href="#work" class="smoothScroll">WORK</a></li>
                <li><a href="#team" class="smoothScroll">TEAM</a></li>
                <li><a href="#portfolio" class="smoothScroll">PORTFOLIO</a></li>
                <li><a href="#price" class="smoothScroll">PRICE</a></li>
                <li><a href="#contact" class="smoothScroll">CONTACT</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- intro section -->
<section id="intro">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6 col-md-offset-3  col-sm-offset-2 col-sm-8 col-sm-offset-2 title">
                <h4>WELCOME TO ROMNA</h4>
                <h2>Brading &amp; Digital Studio</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet. Dolore magna aliquam erat volutpat.</p>
            </div>
        </div>
    </div>
</section>
<!-- work section -->
<section id="work">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 title">
                <h2>Service</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet. Dolore magna aliquam erat volutpat.</p>
            </div>
            <div class="col-md-8 col-sm-8">
                <div class="col-md-6 col-sm-6 bg-black"> <i class="fa fa-mobile"></i>
                    <h3>Mobile UX</h3>
                </div>
                <div class="col-md-6 col-sm-6 bg-red"> <i class="fa fa-cloud"></i>
                    <h3>Social media</h3>
                </div>
                <div class="col-md-6 col-sm-6 bg-red"> <i class="fa fa-link"></i>
                    <h3>Web Design</h3>
                </div>
                <div class="col-md-6 col-sm-6 bg-black"> <i class="fa fa-globe"></i>
                    <h3>SEO</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- team section -->
<section id="team">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6 col-md-offset-3  col-sm-offset-2 col-sm-8 col-sm-offset-2 title">
                <h2>Our team</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoree.</p>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 wow fadeIn" data-wow-delay="0.9s">
                <img src="{{ asset('front-theme-asset/roma') }}/images/team1.jpg" class="img-responsive" alt="team img">
                <div class="team-des">
                    <h4>Tracy</h4>
                    <h3>Designer</h3>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 wow fadeIn" data-wow-delay="1.3s">
                <img src="{{ asset('front-theme-asset/roma') }}/images/team2.jpg" class="img-responsive" alt="team img">
                <div class="team-des">
                    <h4>Linda</h4>
                    <h3>Manager</h3>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 wow fadeIn" data-wow-delay="1.6s">
                <img src="{{ asset('front-theme-asset/roma') }}/images/team3.jpg" class="img-responsive" alt="team img">
                <div class="team-des">
                    <h4>Mary</h4>
                    <h3>Developer</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- portfolio section -->
<div id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-2 col-sm-8 col-sm-offset-2 title">
                <h2>Portfolio</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoree.</p>
            </div>
            <div class="col-md-12 col-sm-12"></div>
            <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                <a href="{{ asset('front-theme-asset/roma') }}/images/portfolio-img1.jpg" data-lightbox-gallery="portfolio-gallery">
                    <img src="{{ asset('front-theme-asset/roma') }}/images/portfolio-img1.jpg" alt="portfolio img">
                </a>
            </div>
            <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                <a href="{{ asset('front-theme-asset/roma') }}/images/portfolio-img2.jpg" data-lightbox-gallery="portfolio-gallery">
                    <img src="{{ asset('front-theme-asset/roma') }}/images/portfolio-img2.jpg" alt="portfolio img">
                </a>
            </div>
            <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                <a href="{{ asset('front-theme-asset/roma') }}/images/portfolio-img3.jpg" data-lightbox-gallery="portfolio-gallery">
                    <img src="{{ asset('front-theme-asset/roma') }}/images/portfolio-img3.jpg" alt="portfolio img">
                </a>
            </div>
            <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                <a href="{{ asset('front-theme-asset/roma') }}/images/portfolio-img4.jpg" data-lightbox-gallery="portfolio-gallery">
                    <img src="{{ asset('front-theme-asset/roma') }}/images/portfolio-img4.jpg" alt="portfolio img">
                </a>
            </div>
            <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                <a href="{{ asset('front-theme-asset/roma') }}/images/portfolio-img5.jpg" data-lightbox-gallery="portfolio-gallery">
                    <img src="{{ asset('front-theme-asset/roma') }}/images/portfolio-img5.jpg" alt="portfolio img">
                </a>
            </div>
            <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                <a href="{{ asset('front-theme-asset/roma') }}/images/portfolio-img6.jpg" data-lightbox-gallery="portfolio-gallery">
                    <img src="{{ asset('front-theme-asset/roma') }}/images/portfolio-img6.jpg" alt="portfolio img">
                </a>
            </div>
            <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                <a href="{{ asset('front-theme-asset/roma') }}/images/portfolio-img7.jpg" data-lightbox-gallery="portfolio-gallery">
                    <img src="{{ asset('front-theme-asset/roma') }}/images/portfolio-img7.jpg" alt="portfolio img">
                </a>
            </div>
            <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                <a href="{{ asset('front-theme-asset/roma') }}/images/portfolio-img8.jpg" data-lightbox-gallery="portfolio-gallery">
                    <img src="{{ asset('front-theme-asset/roma') }}/images/portfolio-img8.jpg" alt="portfolio img">
                </a>
            </div>
        </div>
    </div>
</div>
<!-- price section -->
<div id="price">
    <div class="container">
        <div class="col-md-offset-3 col-md-6 col-md-offset-3  col-sm-offset-2 col-sm-8 col-sm-offset-2 title">
            <h2>Our Plans</h2>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoree.</p>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="plan wow bounceIn" data-wow-delay="0.3s">
                <div class="plan_title">
                    <h3>Basic</h3>
                </div>
                <div class="plan_sub_title">
                    <h2>$ 20</h2>
                    <small>Per month</small> </div>
                <ul>
                    <li>10 EMAIL ACCOUNTS</li>
                    <li>1 GB SPACE</li>
                    <li>20 MORE THEMES</li>
                </ul>
                <button class="btn btn-warning">Get started</button>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="plan wow bounceIn" data-wow-delay="0.6s">
                <div class="plan_title">
                    <h3>Business</h3>
                </div>
                <div class="plan_sub_title">
                    <h2>$ 40</h2>
                    <small>Per month</small> </div>
                <ul>
                    <li>10 EMAIL ACCOUNTS</li>
                    <li>4 GB SPACE</li>
                    <li>20 MORE THEMES</li>
                </ul>
                <button class="btn btn-warning">Get started</button>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="plan wow bounceIn" data-wow-delay="0.9s">
                <div class="plan_title">
                    <h3>Personal</h3>
                </div>
                <div class="plan_sub_title">
                    <h2>$ 60</h2>
                    <small>Per month</small> </div>
                <ul>
                    <li>10 EMAIL ACCOUNTS</li>
                    <li>10 GB SPACE</li>
                    <li>20 MORE THEMES</li>
                </ul>
                <button class="btn btn-warning">Get started</button>
            </div>
        </div>
    </div>
</div>
<!-- contact section -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6 col-md-offset-3  col-sm-offset-2 col-sm-8 col-sm-offset-2 title">
                <h2>Contact Us</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoree.</p>
            </div>
            <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 contact-form wow fadeInUp" data-wow-delay="0.9s">
                <form action="#" method="post">
                    <input type="text" class="form-control" placeholder="Name">
                    <input type="email" class="form-control" placeholder="Email">
                    <textarea class="form-control" placeholder="Message" rows="6"></textarea>
                    <input type="submit" class="form-control" value="SEND EMAIL">
                </form>
            </div>
        </div>
    </div>
</section>
<!-- google map section -->
<div class="google_map">
    <div id="map-canvas"></div>
</div>
<!-- footer section -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h2 class="wow fadeIn" data-wow-delay="0.9s">Follow Us</h2>
                <ul class="social-icon">
                    <li><a href="{{ $settingModel->getSetting('facebook') }}" class="fa fa-facebook wow bounceIn" data-wow-delay="0.3s"></a></li>
                    <li><a href="#" class="fa fa-twitter wow bounceIn" data-wow-delay="0.6s"></a></li>
                    <li><a href="#" class="fa fa-behance wow bounceIn" data-wow-delay="0.9s"></a></li>
                    <li><a href="#" class="fa fa-dribbble wow bounceIn" data-wow-delay="0.9s"></a></li>
                    <li><a href="#" class="fa fa-github wow bounceIn" data-wow-delay="0.9s"></a></li>
                    <li><a href="#" class="fa fa-android wow bounceIn" data-wow-delay="0.9s"></a></li>
                    <li><a href="#" class="fa fa-phone wow bounceIn" data-wow-delay="0.9s"></a></li>
                </ul>
            </div>
            <div class="col-md-12 col-sm-12 copyright">
                <p>&copy; ROMNA 2084. All Rights Reserved | Design: <a target="_blank" rel="nofollow" href="http://www.templatemo.com">template mo</a></p>
            </div>
        </div>
    </div>
</footer>
<!-- JAVASCRIPT JS FILES -->
<script src="{{ asset('front-theme-asset/roma') }}/js/jquery.js"></script>
<script src="{{ asset('front-theme-asset/roma') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('front-theme-asset/roma') }}/js/nivo-lightbox.min.js"></script>
<script src="{{ asset('front-theme-asset/roma') }}/js/smoothscroll.js"></script>
<script src="{{ asset('front-theme-asset/roma') }}/js/jquery.sticky.js"></script>
<script src="{{ asset('front-theme-asset/roma') }}/js/jquery.parallax.js"></script>
<script src="{{ asset('front-theme-asset/roma') }}/js/wow.min.js"></script>
<script src="{{ asset('front-theme-asset/roma') }}/js/custom.js"></script>
</body>
</html>
