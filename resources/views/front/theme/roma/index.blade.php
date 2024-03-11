{{ adminBar() }}
<!DOCTYPE html>
<html lang="fa">
<head>
    <title>{{ $settingModel->getSetting('title', $accountId, $projectId) }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $settingModel->getSetting('title', $accountId, $projectId) }}">
    <!-- STYLESHEET CSS FILES -->
    <link rel="stylesheet" href="{{ asset('front-theme-asset/roma') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('front-theme-asset/roma') }}/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('front-theme-asset/roma') }}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('front-theme-asset/roma') }}/css/nivo-lightbox.css">
    <link rel="stylesheet" href="{{ asset('front-theme-asset/roma') }}/css/nivo_themes/default/default.css">
    <link rel="stylesheet" href="{{ asset('front-theme-asset/roma') }}/css/templatemo-style.css">
    <link rel="stylesheet" href="{{ asset('fonts/' . $settingModel->getSetting('font', $accountId, $projectId) . '/face.css') }}">
</head>

<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
<!-- preloader section -->
<div class="preloader">
    <div class="sk-spinner sk-spinner-rotating-plane"></div>
</div>

<!-- home section -->
<section id="home"
         style="background: url(' {{ asset(ert('tsp') . $settingModel->getSetting('background_cover', $accountId,$projectId)) }}') 100% 0 no-repeat ; background-size:cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h1 class="wow bounceInDown rotate">{{ $settingModel->getSetting('title', $accountId, $projectId) }}</h1>
                <h2 class="wow bounce">{{ $settingModel->getSetting('description', $accountId, $projectId) }}</h2>
                <a href="#intro" class="btn btn-default smoothScroll">{{ $settingModel->getSetting('start_btn_text', $accountId, $projectId) }}</a>
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
            <a href="#" class="navbar-brand">{{ $settingModel->getSetting('title', $accountId, $projectId) }}</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                @if ($settingModel->getSetting('nav_item_text1', $accountId, $projectId))
                    <li>
                        <a href="#home" class="smoothScroll">{{ $settingModel->getSetting('nav_item_text1', $accountId, $projectId) }}</a>
                    </li>
                @endif
                @if ($settingModel->getSetting('nav_item_text2', $accountId, $projectId))
                    <li>
                        <a href="#intro" class="smoothScroll">{{ $settingModel->getSetting('nav_item_text2', $accountId, $projectId) }}</a>
                    </li>
                @endif
                @if ($settingModel->getSetting('nav_item_text3', $accountId, $projectId))
                    <li>
                        <a href="#work" class="smoothScroll">{{ $settingModel->getSetting('nav_item_text3', $accountId, $projectId) }}</a>
                    </li>
                @endif
                @if ($settingModel->getSetting('nav_item_text4', $accountId, $projectId))
                    <li>
                        <a href="#team" class="smoothScroll">{{ $settingModel->getSetting('nav_item_text4', $accountId, $projectId) }}</a>
                    </li>
                @endif
                @if ($settingModel->getSetting('nav_item_text5', $accountId, $projectId))
                    <li>
                        <a href="#portfolio" class="smoothScroll">{{ $settingModel->getSetting('nav_item_text5', $accountId, $projectId) }}</a>
                    </li>
                @endif
                @if ($settingModel->getSetting('nav_item_text6', $accountId, $projectId))
                    <li>
                        <a href="#price" class="smoothScroll">{{ $settingModel->getSetting('nav_item_text6', $accountId, $projectId) }}</a>
                    </li>
                @endif
                @if ($settingModel->getSetting('nav_item_text7', $accountId, $projectId))
                    <li>
                        <a href="#contact" class="smoothScroll">{{ $settingModel->getSetting('nav_item_text7', $accountId, $projectId) }}</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>

@if ($settingModel->getSetting('about_status', $accountId, $projectId) == 1)
    <!-- intro section -->
    <section id="intro">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-2 col-sm-8 col-sm-offset-2 title">
                    <h4>{{ fa_number($settingModel->getSetting('about_first_title', $accountId, $projectId)) }}</h4>
                    <h2>{{ fa_number($settingModel->getSetting('about_first_subtitle', $accountId, $projectId)) }}</h2>
                    <hr>
                    <p>{{ fa_number($settingModel->getSetting('about_first_text', $accountId, $projectId)) }}</p>
                </div>
            </div>
        </div>
    </section>
@endif

@if ($settingModel->getSetting('service_status', $accountId, $projectId) == 1)
    <!-- work section -->
    <section id="work">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 title">
                    <h2>{{ $settingModel->getSetting('service_title', $accountId, $projectId) }}</h2>
                    <hr>
                    <p>{{ $settingModel->getSetting('service_text', $accountId, $projectId) }}</p>
                </div>
                <div class="col-md-8 col-sm-8">
                    <div class="col-md-6 col-sm-6 bg-black"><i
                            class="fa {{ $settingModel->getSetting('service_first_icon', $accountId, $projectId) }}"></i>
                        <h3>{{ $settingModel->getSetting('service_first_title', $accountId, $projectId) }}</h3>
                    </div>
                    <div class="col-md-6 col-sm-6 bg-red"><i
                            class="fa {{ $settingModel->getSetting('service_second_icon', $accountId, $projectId) }}"></i>
                        <h3>{{ $settingModel->getSetting('service_second_title', $accountId, $projectId) }}</h3>
                    </div>
                    <div class="col-md-6 col-sm-6 bg-red"><i
                            class="fa {{ $settingModel->getSetting('service_third_icon', $accountId, $projectId) }}"></i>
                        <h3>{{ $settingModel->getSetting('service_third_title', $accountId, $projectId) }}</h3>
                    </div>
                    <div class="col-md-6 col-sm-6 bg-black"><i
                            class="fa {{ $settingModel->getSetting('service_fourth_icon', $accountId, $projectId) }}"></i>
                        <h3>{{ $settingModel->getSetting('service_fourth_title', $accountId, $projectId) }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

@if ($settingModel->getSetting('team_status', $accountId, $projectId) == 1)
    <!-- team section -->
    <section id="team">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6 col-md-offset-3  col-sm-offset-2 col-sm-8 col-sm-offset-2 title">
                    <h2>{{ $settingModel->getSetting('title_team', $accountId, $projectId) }}</h2>
                    <hr>
                    <p>{{ $settingModel->getSetting('description_team', $accountId, $projectId) }}</p>
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
@endif

@if ($settingModel->getSetting('portfolio_status', $accountId, $projectId) == 1)
    <!-- portfolio section -->
    <div id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-2 col-sm-8 col-sm-offset-2 title">
                    <h2>{{ $settingModel->getSetting('portfolio_title', $accountId, $projectId) }}</h2>
                    <hr>
                    <p>{{ $settingModel->getSetting('portfolio_text', $accountId, $projectId) }}</p>
                </div>
                <div class="col-md-12 col-sm-12"></div>
                @if ($siteEngine->getProduct()->count() > 0)
                    @foreach ($siteEngine->getProduct() as $product)
                        <div class="col-md-3 col-sm-3 wow fadeIn" data-wow-delay="0.6s">
                            <a href="{{ $prouduct->getSingleUrl() }}" data-lightbox-gallery="portfolio-gallery">
                                <img src="{{$prouduct->getImageUrl()}}" alt="">
                                <h4 class="product-title">{{ $product->title }}</h4>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endif

@if ($settingModel->getSetting('price_status', $accountId, $projectId) == 1)
<!-- price section -->
<div id="price">
    <div class="container">
        <div class="col-md-offset-3 col-md-6 col-md-offset-3  col-sm-offset-2 col-sm-8 col-sm-offset-2 title">
            <h2>{{ $settingModel->getSetting('price_title', $accountId, $projectId) }}</h2>
            <hr>
            <p>{{ $settingModel->getSetting('price_text', $accountId, $projectId) }}</p>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="plan wow bounceIn" data-wow-delay="0.3s">
                <div class="plan_title">
                    <h3>Basic</h3>
                </div>
                <div class="plan_sub_title">
                    <h2>$ 20</h2>
                    <small>Per month</small>
                </div>
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
                    <small>Per month</small>
                </div>
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
                    <small>Per month</small>
                </div>
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
@endif

@if ($settingModel->getSetting('contact_status', $accountId, $projectId) == 1)
    <!-- contact section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6 col-md-offset-3  col-sm-offset-2 col-sm-8 col-sm-offset-2 title">
                    <h2>{{ $settingModel->getSetting('contact_title', $accountId, $projectId) }}</h2>
                    <hr>
                    <p>{{ $settingModel->getSetting('contact_text', $accountId, $projectId) }}</p>
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
        <iframe src="{{ $settingModel->getSetting('google_map', $accountId, $projectId) }}" width="100%" height="450"
                style="border: 0;" allowfullscreen="yes" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endif

<!-- footer section -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h2 class="wow fadeIn" data-wow-delay="0.9s">
                    {{ $settingModel->getSetting('follow_us_title', $accountId, $projectId) }}</h2>
                <ul class="social-icon">
                    <li><a href="{{ $settingModel->getSetting('facebook', $accountId, $projectId) }}"
                           class="fa fa-facebook wow bounceIn" data-wow-delay="0.3s"></a></li>
                    <li><a href="{{ $settingModel->getSetting('x', $accountId, $projectId) }}"
                           class="fa fa-twitter wow bounceIn" data-wow-delay="0.6s"></a></li>
                    <li><a href="{{ $settingModel->getSetting('behance', $accountId, $projectId) }}"
                           class="fa fa-behance wow bounceIn" data-wow-delay="0.9s"></a></li>
                    <li><a href="{{ $settingModel->getSetting('facebook', $accountId, $projectId) }}"
                           class="fa fa-dribbble wow bounceIn" data-wow-delay="0.9s"></a></li>
                    <li><a href="{{ $settingModel->getSetting('dribble', $accountId, $projectId) }}"
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
