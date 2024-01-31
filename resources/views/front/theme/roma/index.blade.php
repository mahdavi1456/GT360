<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $settingModel->getSetting('title', $accountId) }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $settingModel->getSetting('title', $accountId) }}">
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
<section id="home"
         style="background: url(' {{ asset(ert('tsp') . $settingModel->getSetting('first_cover', $accountId)) }}') 50% 0 repeat-y fixed;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h1 class="wow bounceInDown rotate">{{ $settingModel->getSetting('title', $accountId) }}</h1>
                <h2 class="wow bounce">{{ $settingModel->getSetting('description', $accountId) }}</h2>
                <a href="#intro"
                   class="btn btn-default smoothScroll">{{ $settingModel->getSetting('start_btn_text', $accountId) }}</a>
            </div>
        </div>
    </div>
</section>
<!-- navigation section -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span
                    class="icon icon-bar"></span> <span class="icon icon-bar"></span> <span
                    class="icon icon-bar"></span></button>
            <a href="#" class="navbar-brand">{{ $settingModel->getSetting('title', $accountId) }}</a></div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#home"
                       class="smoothScroll">{{ $settingModel->getSetting('nav_item_text1', $accountId) }}</a></li>
                <li><a href="#intro"
                       class="smoothScroll">{{ $settingModel->getSetting('nav_item_text2', $accountId) }}</a></li>
                <li><a href="#work"
                       class="smoothScroll">{{ $settingModel->getSetting('nav_item_text3', $accountId) }}</a></li>
                <li><a href="#team"
                       class="smoothScroll">{{ $settingModel->getSetting('nav_item_text4', $accountId) }}</a></li>
                <li><a href="#portfolio"
                       class="smoothScroll">{{ $settingModel->getSetting('nav_item_text5', $accountId) }}</a></li>
                <li><a href="#price"
                       class="smoothScroll">{{ $settingModel->getSetting('nav_item_text6', $accountId) }}</a></li>
                <li><a href="#contact"
                       class="smoothScroll">{{ $settingModel->getSetting('nav_item_text7', $accountId) }}</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- intro section -->
<section id="intro">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6 col-md-offset-3  col-sm-offset-2 col-sm-8 col-sm-offset-2 title">
                <h4>{{ fa_number($settingModel->getSetting('first_title', $accountId)) }}</h4>
                <h2>{{ fa_number($settingModel->getSetting('first_subtitle', $accountId)) }}</h2>
                <hr>
                <p>{{ fa_number($settingModel->getSetting('first_text', $accountId)) }}</p>
            </div>
        </div>
    </div>
</section>
<!-- work section -->
<section id="work">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 title">
                <h2>{{ fa_number($settingModel->getSetting('service_title', $accountId)) }}</h2>
                <hr>
                <p>{{ fa_number($settingModel->getSetting('service_text', $accountId)) }}</p>
            </div>
            <div class="col-md-8 col-sm-8">
                <div class="col-md-6 col-sm-6 bg-black"><i class="fa fa-mobile"></i>
                    <h3>Mobile UX</h3>
                </div>
                <div class="col-md-6 col-sm-6 bg-red"><i class="fa fa-cloud"></i>
                    <h3>Social media</h3>
                </div>
                <div class="col-md-6 col-sm-6 bg-red"><i class="fa fa-link"></i>
                    <h3>Web Design</h3>
                </div>
                <div class="col-md-6 col-sm-6 bg-black"><i class="fa fa-globe"></i>
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
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                    laoree.</p>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 wow fadeIn" data-wow-delay="0.9s">
                <img src="{{ asset('front-theme-asset/roma') }}/images/person-sample.jpg" class="img-responsive"
                     alt="team img">
                <div class="team-des">
                    <h4>Tracy</h4>
                    <h3>Designer</h3>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 wow fadeIn" data-wow-delay="1.3s">
                <img src="{{ asset('front-theme-asset/roma') }}/images/person-sample.jpg" class="img-responsive"
                     alt="team img">
                <div class="team-des">
                    <h4>Linda</h4>
                    <h3>Manager</h3>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 wow fadeIn" data-wow-delay="1.6s">
                <img src="{{ asset('front-theme-asset/roma') }}/images/person-sample.jpg" class="img-responsive"
                     alt="team img">
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
                <h2>{{ $settingModel->getSetting('portfolio_title', $accountId) }}</h2>
                <hr>
                <p>{{ $settingModel->getSetting('portfolio_text', $accountId) }}</p>
            </div>
            <div class="col-md-12 col-sm-12"></div>
            <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                <a href="{{ asset('front-theme-asset/roma') }}/images/portfolio-img1.jpg"
                   data-lightbox-gallery="portfolio-gallery">
                    <img src="{{ asset('front-theme-asset/roma') }}/images/portfolio-img1.jpg" alt="portfolio img">
                </a>
            </div>
            <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                <a href="{{ asset('front-theme-asset/roma') }}/images/portfolio-img2.jpg"
                   data-lightbox-gallery="portfolio-gallery">
                    <img src="{{ asset('front-theme-asset/roma') }}/images/portfolio-img2.jpg" alt="portfolio img">
                </a>
            </div>
            <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                <a href="{{ asset('front-theme-asset/roma') }}/images/portfolio-img3.jpg"
                   data-lightbox-gallery="portfolio-gallery">
                    <img src="{{ asset('front-theme-asset/roma') }}/images/portfolio-img3.jpg" alt="portfolio img">
                </a>
            </div>
            <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                <a href="{{ asset('front-theme-asset/roma') }}/images/portfolio-img4.jpg"
                   data-lightbox-gallery="portfolio-gallery">
                    <img src="{{ asset('front-theme-asset/roma') }}/images/portfolio-img4.jpg" alt="portfolio img">
                </a>
            </div>
            <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                <a href="{{ asset('front-theme-asset/roma') }}/images/portfolio-img5.jpg"
                   data-lightbox-gallery="portfolio-gallery">
                    <img src="{{ asset('front-theme-asset/roma') }}/images/portfolio-img5.jpg" alt="portfolio img">
                </a>
            </div>
            <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                <a href="{{ asset('front-theme-asset/roma') }}/images/portfolio-img6.jpg"
                   data-lightbox-gallery="portfolio-gallery">
                    <img src="{{ asset('front-theme-asset/roma') }}/images/portfolio-img6.jpg" alt="portfolio img">
                </a>
            </div>
            <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                <a href="{{ asset('front-theme-asset/roma') }}/images/portfolio-img7.jpg"
                   data-lightbox-gallery="portfolio-gallery">
                    <img src="{{ asset('front-theme-asset/roma') }}/images/portfolio-img7.jpg" alt="portfolio img">
                </a>
            </div>
            <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                <a href="{{ asset('front-theme-asset/roma') }}/images/portfolio-img8.jpg"
                   data-lightbox-gallery="portfolio-gallery">
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
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                laoree.</p>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="plan wow bounceIn" data-wow-delay="0.3s">
                <div class="plan_title">
                    <h3>Basic</h3>
                </div>
                <div class="plan_sub_title">
                    <h2>$ 20</h2>
                    <small>Per month</small></div>
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
                    <small>Per month</small></div>
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
                    <small>Per month</small></div>
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
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                    laoree.</p>
            </div>
            <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 contact-form wow fadeInUp"
                 data-wow-delay="0.9s">
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
    <iframe
        src="{{ $settingModel->getSetting('google_map', $accountId) }}"
        width="100%" height="450" style="border: 0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<!-- footer section -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h2 class="wow fadeIn"
                    data-wow-delay="0.9s">{{ $settingModel->getSetting("follow_us_title", $accountId) }}</h2>
                <ul class="social-icon">
                    {{-- <li><a href="{{ $$settingModel->getSetting('facebook',autj) }}" class="fa fa-facebook wow bounceIn" data-wow-delay="0.3s"></a></li> --}}
                    <li><a href="{{ $settingModel->getSetting('facebook', $accountId) }}"
                           class="fa fa-facebook wow bounceIn" data-wow-delay="0.3s"></a></li>
                    <li><a href="{{ $settingModel->getSetting('x', $accountId) }}" class="fa fa-twitter wow bounceIn"
                           data-wow-delay="0.6s"></a></li>
                    <li><a href="{{ $settingModel->getSetting('behance', $accountId) }}"
                           class="fa fa-behance wow bounceIn" data-wow-delay="0.9s"></a></li>
                    <li><a href="{{ $settingModel->getSetting('facebook', $accountId) }}"
                           class="fa fa-dribbble wow bounceIn" data-wow-delay="0.9s"></a></li>
                    <li><a href="{{ $settingModel->getSetting('dribble', $accountId) }}"
                           class="fa fa-github wow bounceIn" data-wow-delay="0.9s"></a></li>
                </ul>
            </div>
            <div class="col-md-12 col-sm-12 copyright">
                <p>&copy; طراحی و توسعه وب <a target="_blank" href="https://gratech.ir">گراتک</a>
                </p>
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
