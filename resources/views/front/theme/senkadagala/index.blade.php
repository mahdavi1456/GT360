<!DOCTYPE html>
<html>

<head>
    <title>Senkadagala</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/senkadagala') }}/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,400italic,500,700' rel='stylesheet'
        type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/senkadagala') }}/css/main.css">


    <script type="text/javascript" src="{{ asset('front-theme-asset/senkadagala') }}/js/jquery.js"></script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/senkadagala') }}/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/senkadagala') }}/js/singlepagenav.js"></script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/senkadagala') }}/js/queryloader.js"></script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/senkadagala') }}/js/main.js"></script>

    <meta charset="UTF-8">
    <meta name="description" content="Senkadagala - a simple HTML template">
    <meta name="keywords"
        content="web design, web development, branding, Social media marketing, print media design, digital design, HTML,CSS,XML,JavaScript">
    <meta name="author" content="PixelMock">

    <link rel="icon" type="image/png" href="{{ asset('front-theme-asset/senkadagala') }}/img/fav.png" />
</head>

<body>
    <div class="navbar navbar-inverse navbar-fixed-top top-nav" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('front-theme-asset/senkadagala') }}/img/pm-brand.png" title="PixelMock Logo">
                </a>
            </div>
            <div class="collapse navbar-collapse ">
                <ul class="nav navbar-nav">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#work">Work</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>


    <div class="content" id="home">
        <div class="section section1">
            <div class="container">
                <div class="row">
                    <div>
                        <img src="{{ asset(ert('tsp') . $settingModel->getSetting('first_cover', $accountId)) }}"
                            alt="" />
                    </div>
                </div>
                <div class="row">
                    <h2>{{ $settingModel->getSetting('title', $accountId) }}</h2>
                </div>
                <div class="row">
                    <p>{{ $settingModel->getSetting('description', $accountId) }} </p>
                </div>
            </div>
        </div>
    </div>
    <div class="section section2" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset(ert('tsp') . $settingModel->getSetting('first_cover_sec2', $accountId)) }}"
                        alt="" />
                </div>
                <div class="col-md-6 intro-text">
                    <h3 id="aboutus-title"  dir="rtl">{{ $settingModel->getSetting('title_sec2', $accountId) }}</h3>
                    <p>{{ $settingModel->getSetting('description_sec2', $accountId) }}</p>
                </div>
            </div>
            <div class="row team">
                <div class="col-md-4">
                    <img src="{{ asset('front-theme-asset/senkadagala') }}/img/team/user1.png" class="img-responsive">
                    <h3 class="team-name">Member One</h3>
                    <h4 class="team-subtitle">Awesome Designation</h4>
                    <p class="team-details">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet dolor nec diam pharetra,
                        eu sodales massa euismod. Maecenas ut tellus sit amet lectus molestie dapibus. Quisque fermentum
                        rutrum felis, nec hendrerit diam mollis vitae. Integer sodales varius odio, vel pharetra ante
                        rhoncus vel. Phasellus quis urna rutrum, molestie purus.
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('front-theme-asset/senkadagala') }}/img/team/user2.png" class="img-responsive">
                    <h3 class="team-name">Member Two</h3>
                    <h4 class="team-subtitle">Awesome Designation</h4>
                    <p class="team-details">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet dolor nec diam pharetra,
                        eu sodales massa euismod. Maecenas ut tellus sit amet lectus molestie dapibus. Quisque fermentum
                        rutrum felis, nec hendrerit diam mollis vitae. Integer sodales varius odio, vel pharetra ante
                        rhoncus vel. Phasellus quis urna rutrum, molestie purus.
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('front-theme-asset/senkadagala') }}/img/team/user3.png" class="img-responsive">
                    <h3 class="team-name">Member Three</h3>
                    <h4 class="team-subtitle">Awesome Designation</h4>
                    <p class="team-details">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet dolor nec diam pharetra,
                        eu sodales massa euismod. Maecenas ut tellus sit amet lectus molestie dapibus. Quisque fermentum
                        rutrum felis, nec hendrerit diam mollis vitae. Integer sodales varius odio, vel pharetra ante
                        rhoncus vel. Phasellus quis urna rutrum, molestie purus.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="section section3" id="services">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3 service-item">
                    <img src="{{ asset('front-theme-asset/senkadagala') }}/img/web-design.png" title="Web design"
                        class="img-responsive">
                    <h3>Web Designing</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet dolor nec diam pharetra,
                        eu sodales massa euismod.
                    </p>
                </div>
                <div class="col-sm-6 col-md-3 service-item">
                    <img src="{{ asset('front-theme-asset/senkadagala') }}/img/web-dev.png" title="Web development"
                        class="img-responsive">
                    <h3>Web Development</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet dolor nec diam pharetra,
                        eu sodales massa euismod.
                    </p>
                </div>
                <div class="col-sm-6 col-md-3 service-item">
                    <img src="{{ asset('front-theme-asset/senkadagala') }}/img/print.png" title="Print media design"
                        class="img-responsive">
                    <h3>Print Media Designing</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet dolor nec diam pharetra,
                        eu sodales massa euismod.
                    </p>
                </div>
                <div class="col-sm-6 col-md-3 service-item">
                    <img src="{{ asset('front-theme-asset/senkadagala') }}/img/branding.png" title="Branding"
                        class="img-responsive">
                    <h3>Branding</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam aliquet dolor nec diam pharetra,
                        eu sodales massa euismod.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="section section4" id="work">
        <div class="portfolio clearfix">
            <div id="portfolio-introduction">
                <h3>Our Portfolio</h3>
                <p>things we do to prove ourselves!</p>
            </div>

            <div id="portfolio-items" class="clearfix">


                <!-- start of a portfolio item -->
                <div class="item w3">
                    <div class="hover-content">
                        <h3>Awseome Project Name</h3>
                    </div>
                    <div class="hidden-item">
                        <img src="{{ asset('front-theme-asset/senkadagala') }}/img/portfolio/web/sankalana/1.jpg"
                            title="Sankalan Holdings" data-axisX="20" data-axisY="10">
                    </div>
                    <div class="modal fade portfolio-popup" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="portfolio-item-description">
                                            <h3>Sankalana Holdings Website</h3>
                                            <p>Website design and the concept development is done by PixelMock and it
                                                was a pleasure experience to work with Sankalana holdings to deliver
                                                something awesome</p>
                                            <p>Concept design was developed using Adobe Photoshop and later customized
                                                using HTML, CSS and jQuery. </p>
                                            <p>End product is powered with Wordpress.</p>
                                            <div class="labels">
                                                <span class="label label-default">web</span>
                                                <span class="label label-primary">design</span>
                                                <span class="label label-success">wordpress</span>
                                                <span class="label label-info">photoshop</span>
                                                <span class="label label-warning">ui/ux</span>
                                                <span class="label label-danger">Danger</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class='popup-image-container'>
                                            <img src="{{ asset('front-theme-asset/senkadagala') }}/img/portfolio/web/sankalana/1.jpg"
                                                title="Sankalana Holdings web site"
                                                class="portfolio-big img-responsive">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of a portfolio item -->

                <!-- start of a portfolio item -->
                <div class="item">
                    <div class="hover-content">
                        <h3>Awseome Project Name</h3>
                    </div>
                    <div class="hidden-item">
                        <img src="{{ asset('front-theme-asset/senkadagala') }}/img/portfolio/print/blackwelling/1.jpg"
                            title="Blackwelling Recruitment" data-axisX="50" data-axisY="10">
                    </div>
                    <div class="modal fade portfolio-popup" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="portfolio-item-description">
                                            <h3>Awseome Project Name</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae
                                                porttitor dolor, sit amet consectetur lectus. Nunc vitae viverra enim,
                                                non blandit tortor. Suspendisse convallis. </p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae
                                                porttitor dolor, sit amet consectetur lectus. Nunc vitae viverra enim,
                                                non blandit tortor. Suspendisse convallis. </p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae
                                                porttitor dolor, sit amet consectetur lectus. Nunc vitae viverra enim,
                                                non blandit tortor. Suspendisse convallis. </p>
                                            <div class="labels">
                                                <span class="label label-default">web</span>
                                                <span class="label label-primary">design</span>
                                                <span class="label label-success">wordpress</span>
                                                <span class="label label-info">photoshop</span>
                                                <span class="label label-warning">ui/ux</span>
                                                <span class="label label-danger">Danger</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class='popup-image-container'>
                                            <img src="{{ asset('front-theme-asset/senkadagala') }}/img/portfolio/print/blackwelling/1.jpg"
                                                title="Blackwelling Recruitment" class="portfolio-big img-responsive">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of a portfolio item -->

                <!-- start of a portfolio item -->
                <div class="item">
                    <div class="hover-content">
                        <h3>Awseome Project Name</h3>
                    </div>
                    <div class="hidden-item">
                        <img src="{{ asset('front-theme-asset/senkadagala') }}/img/portfolio/web/whoor/1.jpg"
                            title="WHOOR audio" data-axisX="50" data-axisY="50">
                    </div>
                    <div class="modal fade portfolio-popup" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="portfolio-item-description">
                                            <h3>Awseome Project Name</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae
                                                porttitor dolor, sit amet consectetur lectus. Nunc vitae viverra enim,
                                                non blandit tortor. Suspendisse convallis. </p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae
                                                porttitor dolor, sit amet consectetur lectus. Nunc vitae viverra enim,
                                                non blandit tortor. Suspendisse convallis. </p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae
                                                porttitor dolor, sit amet consectetur lectus. Nunc vitae viverra enim,
                                                non blandit tortor. Suspendisse convallis. </p>
                                            <div class="labels">
                                                <span class="label label-default">web</span>
                                                <span class="label label-primary">design</span>
                                                <span class="label label-success">wordpress</span>
                                                <span class="label label-info">photoshop</span>
                                                <span class="label label-warning">ui/ux</span>
                                                <span class="label label-danger">Danger</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class='popup-image-container'>
                                            <img src="{{ asset('front-theme-asset/senkadagala') }}/img/portfolio/web/whoor/1.jpg"
                                                title="WHOOR audio" class="portfolio-big img-responsive">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of a portfolio item -->

                <!-- start of a portfolio item -->
                <div class="item">
                    <div class="hover-content">
                        <h3>Awseome Project Name</h3>
                    </div>
                    <div class="hidden-item">
                        <img src="{{ asset('front-theme-asset/senkadagala') }}/img/portfolio/logo/chocodiles/1.jpg"
                            title="Chocodiles" data-axisX="45" data-axisY="50">
                    </div>
                    <div class="modal fade portfolio-popup" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="portfolio-item-description">
                                            <h3>Awseome Project Name</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae
                                                porttitor dolor, sit amet consectetur lectus. Nunc vitae viverra enim,
                                                non blandit tortor. Suspendisse convallis. </p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae
                                                porttitor dolor, sit amet consectetur lectus. Nunc vitae viverra enim,
                                                non blandit tortor. Suspendisse convallis. </p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae
                                                porttitor dolor, sit amet consectetur lectus. Nunc vitae viverra enim,
                                                non blandit tortor. Suspendisse convallis. </p>
                                            <div class="labels">
                                                <span class="label label-default">web</span>
                                                <span class="label label-primary">design</span>
                                                <span class="label label-success">wordpress</span>
                                                <span class="label label-info">photoshop</span>
                                                <span class="label label-warning">ui/ux</span>
                                                <span class="label label-danger">Danger</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class='popup-image-container'>
                                            <img src="{{ asset('front-theme-asset/senkadagala') }}/img/portfolio/logo/chocodiles/1.jpg"
                                                title="Chocodiles" class="portfolio-big img-responsive">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of a portfolio item -->

                <!-- start of a portfolio item -->
                <div class="item">
                    <div class="hover-content">
                        <h3>Awseome Project Name</h3>
                    </div>
                    <div class="hidden-item">
                        <img src="{{ asset('front-theme-asset/senkadagala') }}/img/portfolio/logo/1tl/1.jpg"
                            title="1LT" data-axisX="50" data-axisY="50">
                    </div>
                    <div class="modal fade portfolio-popup" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="portfolio-item-description">
                                            <h3>Awseome Project Name</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae
                                                porttitor dolor, sit amet consectetur lectus. Nunc vitae viverra enim,
                                                non blandit tortor. Suspendisse convallis. </p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae
                                                porttitor dolor, sit amet consectetur lectus. Nunc vitae viverra enim,
                                                non blandit tortor. Suspendisse convallis. </p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae
                                                porttitor dolor, sit amet consectetur lectus. Nunc vitae viverra enim,
                                                non blandit tortor. Suspendisse convallis. </p>
                                            <div class="labels">
                                                <span class="label label-default">web</span>
                                                <span class="label label-primary">design</span>
                                                <span class="label label-success">wordpress</span>
                                                <span class="label label-info">photoshop</span>
                                                <span class="label label-warning">ui/ux</span>
                                                <span class="label label-danger">Danger</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class='popup-image-container'>
                                            <img src="{{ asset('front-theme-asset/senkadagala') }}/img/portfolio/logo/1tl/1.jpg"
                                                title="1LT" class="portfolio-big img-responsive">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of a portfolio item -->

                <!-- start of a portfolio item -->
                <div class="item w3">
                    <div class="hover-content">
                        <h3>Awseome Project Name</h3>
                    </div>
                    <div class="hidden-item">
                        <img src="{{ asset('front-theme-asset/senkadagala') }}/img/portfolio/web/sajath/1.jpg"
                            title="Sajath Lakshita's Website" data-axisX="95" data-axisY="10">
                    </div>
                    <div class="modal fade portfolio-popup" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="portfolio-item-description">
                                            <h3>Awseome Project Name</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae
                                                porttitor dolor, sit amet consectetur lectus. Nunc vitae viverra enim,
                                                non blandit tortor. Suspendisse convallis. </p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae
                                                porttitor dolor, sit amet consectetur lectus. Nunc vitae viverra enim,
                                                non blandit tortor. Suspendisse convallis. </p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae
                                                porttitor dolor, sit amet consectetur lectus. Nunc vitae viverra enim,
                                                non blandit tortor. Suspendisse convallis. </p>
                                            <div class="labels">
                                                <span class="label label-default">web</span>
                                                <span class="label label-primary">design</span>
                                                <span class="label label-success">wordpress</span>
                                                <span class="label label-info">photoshop</span>
                                                <span class="label label-warning">ui/ux</span>
                                                <span class="label label-danger">Danger</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class='popup-image-container'>
                                            <img src="{{ asset('front-theme-asset/senkadagala') }}/img/portfolio/web/sajath/1.jpg"
                                                title="Sajath Lakshita's Website"
                                                class="portfolio-big img-responsive">
                                            <img src="{{ asset('front-theme-asset/senkadagala') }}/img/portfolio/web/sajath/2.jpg"
                                                title="Sajath Lakshita's Website"
                                                class="portfolio-big img-responsive">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of a portfolio item -->

                <!-- start of a portfolio item -->
                <div class="item w3">
                    <div class="hover-content">
                        <h3>Awseome Project Name</h3>
                    </div>
                    <div class="hidden-item">
                        <img src="{{ asset('front-theme-asset/senkadagala') }}/img/portfolio/web/udara/1.png"
                            title="Udara Kiriella Photography Website" data-axisX="50" data-axisY="50">
                    </div>
                    <div class="modal fade portfolio-popup" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="portfolio-item-description">
                                            <h3>Awseome Project Name</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae
                                                porttitor dolor, sit amet consectetur lectus. Nunc vitae viverra enim,
                                                non blandit tortor. Suspendisse convallis. </p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae
                                                porttitor dolor, sit amet consectetur lectus. Nunc vitae viverra enim,
                                                non blandit tortor. Suspendisse convallis. </p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae
                                                porttitor dolor, sit amet consectetur lectus. Nunc vitae viverra enim,
                                                non blandit tortor. Suspendisse convallis. </p>
                                            <div class="labels">
                                                <span class="label label-default">web</span>
                                                <span class="label label-primary">design</span>
                                                <span class="label label-success">wordpress</span>
                                                <span class="label label-info">photoshop</span>
                                                <span class="label label-warning">ui/ux</span>
                                                <span class="label label-danger">Danger</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class='popup-image-container'>
                                            <img src="{{ asset('front-theme-asset/senkadagala') }}/img/portfolio/web/udara/1.png"
                                                title="Udara Kiriella Photography Website"
                                                class="portfolio-big img-responsive">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of a portfolio item -->
            </div>

        </div>
    </div>

    <div class="section section5 footer" id="contact">
        <div class="container">
            <div class="row">
                <h3 id="contact-us-header">Contact Us</h3>
            </div>
            <div class="row">
                <div class="col-md-5 contact-description">
                    <p>We are bunch of open minded people. So, we are really keen to know what you're thinking of our
                        work.</p>
                    <p>Furthermore, if you're having some sort of work that we can assist you, a design project, web
                        site, branding project... anything that matching our skill profile, send us a mail using below
                        form. We will get back to you soon!</p>
                    <p><strong>Tel : +94 71 350 6348<br>
                            Email : hello@pixelmock.com</strong></p>
                    <p class="sm-wrapper clearfix">
                        <a class="sm-container" href="http://www.twitter.com/pixelmock" target="_blank"></a>
                        <a class="sm-container sm-facebook" href="http://www.facebook.com/pixelmock"
                            target="_blank"></a>
                        <a class="sm-container sm-linkedin" href="http://www.linkedin.com/company/pixelmock/"
                            target="_blank"></a>
                        <a class="sm-container sm-gplus" href="https://plus.google.com/115525542717477884846"
                            rel="publisher" target="_blank"></a>
                        <a class="sm-container sm-skype" href="skype:pixelmock?userinfo"></a>
                    <div class="clear"></div>
                    </p>
                </div>
                <div class="col-md-offset-1 col-md-6">
                    <div id="mainErrorDisplay">

                    </div>
                    <form id="contact-form">
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" class="form-control" id="name">
                        </div>

                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="text" class="form-control" id="email">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number (Optional) <small>Eg : +94771234569</small></label>
                            <input type="text" class="form-control" id="phone">
                        </div>

                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea class="form-control" id="message"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Send" id="send" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>
</body>

</html>
