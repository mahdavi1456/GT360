﻿<!DOCTYPE html>
<!--[if lt IE 8 ]>
<html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 8)|!(IE)]><!-->
<html lang="en"><!--<![endif]-->
<head>
    <title>{{ $settingModel->getSetting('title', $accountId) }}</title>
    <meta charset="utf-8">
    <meta name="description" content="{{ $settingModel->getSetting('direction', $accountId) }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{ asset('front-theme-asset/kreative/css/base.css') }}">
    <link rel="stylesheet"
          href="{{ asset('front-theme-asset/kreative/css/' . $settingModel->getSetting('direction', $accountId) . '.css') }}">
    <!--[if lt IE 9]>
    <script src="{{ asset('front-theme-asset/kreative/js/html5.js') }}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{ asset('front-theme-asset/kreative/images/favicon.ico') }}">
</head>
<body data-spy="scroll" data-target="#nav-wrap">
<header class="mobile">
    <div class="row">
        <div class="col full">
            <div class="logo">
                <a href="#">
                    <img alt="" src="{{ asset('front-theme-asset/kreative/images/logo.png') }}">
                </a>
            </div>
            <nav id="nav-wrap"><a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
                <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>
                <ul id="nav" class="nav">
                    <li><a href="#intro">Home</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#journal">Journal</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<section id="intro">
    <div id="intro-slider" class="flexslider">
        <ul class="slides">
            <li>
                <div class="row">
                    <div class="col full">
                        <div class="slider-text">
                            <h2>Hello, we are <span>kreative</span>. We specialize in branding, websites and
                                photography.</h2>
                            <p>Aenean condimentum, lacus sit amet luctus lobortis, dolores et quas molestias excepturi
                                enim tellus ultrices elit, amet consequat enim elit noneas sit amet luctu.</p>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col full">
                        <div class="slider-text">
                            <h2>Take a look at some of <a href="#portfolio">our works</a> or <a href="#contact">get in
                                    touch</a> to discuss how we can help you.</h2>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum deleniti eos et accusamus.</p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>
<section id="services">
    <div class="row section-head">
        <div class="col one-third">
            <h2>Services</h2>
            <p class="desc">Our list of awesome services.</p>
        </div>
        <div class="col two-thirds">
            <div class="intro">
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                    deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate. At vero
                    eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium. </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="services-wrapper">
            <div class="col">
                <h2><i class="icon-desktop"></i>Webdesign</h2>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                    deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate. At vero
                    eos et accusamus et molestias iusto odio dignissimos.</p>
            </div>
            <div class="col">
                <h2><i class="icon-star"></i>Branding</h2>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                    deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate. At vero
                    eos et accusamus et iusto odio dignissimos.</p>
            </div>
            <div class="col m-first">
                <h2><i class="icon-camera"></i>Photography</h2>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                    deleniti atque corrupti quos dolores et molestias quas molestias excepturi sint occaecati
                    cupiditate. At vero eos et accusamus et iusto odio dignissimos.</p>
            </div>
            <div class="col first">
                <h2><i class="icon-globe"></i>Web Development</h2>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                    deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate. At vero
                    eos et accusamus et iusto odio molestias dignissimos.</p>
            </div>
            <div class="col m-first">
                <h2><i class=" icon-list-alt"></i>User Interface</h2>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                    deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate. At vero
                    eos et accusamus et iusto odio dignissimos.</p>
            </div>
            <div class="col">
                <h2><i class="icon-print"></i>Printing</h2>
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                    deleniti atque corrupti molestias quos dolores et quas molestias excepturi sint occaecati
                    cupiditate. At vero eos et accusamus et iusto odio dignissimos.</p>
            </div>
        </div>
    </div>
</section>
<section id="portfolio">
    <div class="row section-head">
        <div class="col full">
            <h2>{{ $settingModel->getSetting('portfolio_title', $accountId) }}</h2>
            <p class="desc">{{ $settingModel->getSetting('portfolio_subtitle', $accountId) }}</p>
            <p class="intro">{{ $settingModel->getSetting('portfolio_text', $accountId) }}</p>
        </div>
    </div>
    <div class="row">
        <div id="portfolio-wrapper">
            @if ($postModel->getPosts('portfolio')->count() > 0)
                @foreach ($postModel->getPosts('portfolio') as $portfolio)
                    <div class="col portfolio-item">
                        <div class="item-wrap">
                            <a href="#" data-reveal-id="modal-{{ $portfolio->id }}">
                                <img src="{{ asset('front-theme-asset/kreative/images/portfolio/cosmic-sneakers.jpg') }}" alt="">
                            </a>
                            <div class="portfolio-item-meta">
                                <h5><a href="#">{{ $portfolio->title }}</a></h5>
                            </div>
                        </div>
                    </div>
                    <div id="modal-{{ $portfolio->id }}" class="reveal-modal">
                        <img class="scale-with-grid" src="{{ asset('front-theme-asset/kreative/images/portfolio/modals/m-cosmic-sneakers.jpg') }}" alt="">
                        <div class="description-box">
                            <h4>{{ $portfolio->title }}</h4>
                            <p>{{ $portfolio->abstract }}</p>
                            <span class="categories"><i class="icon-tag"></i>Branding, Web Design</span>
                        </div>
                        <div class="link-box"><a href="#">Details</a> <a class="close-reveal-modal">Close</a></div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
<section id="journal">
    <div class="row section-head">
        <div class="col full">
            <h2>Journal</h2>
            <p class="desc">Our latest posts and rants.</p>
        </div>
    </div>
    <div class="blog-entries">
        @if ($postModel->getPosts('journal')->count() > 0)
            @foreach ($postModel->getPosts('journal') as $journal)
                <article class="entry">
                    <div class="row entry-header">
                        <div class="author-image">
                            <img src="{{ asset('front-theme-asset/kreative/images/user-03.png') }}" alt="">
                        </div>
                        <div class="col g-9 offset-1 entry-title">
                            <h3>
                                <a href="page.blade.php">{{ $journal->title }}</a>
                            </h3>
                        </div>
                        <div class="col g-2">
                            <p class="post-meta">
                                <time pubdate="" class="post-date" datetime="2045-08-19">Aug 19, 2045</time>
                                <span class="dauthor">By Sakura Haruno</span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col g-9 offset-1 post-content">
                            <p>
                                {!! $journal->abstract !!}
                                <a href="{{ route('showPost', ['slug' => $slug, 'componentName' => 'journal', 'id' => $journal->id]) }}"
                                   class="more-link">Read More<i class="icon-angle-right"></i></a>
                            </p>
                        </div>
                    </div>
                </article>
            @endforeach
        @endif
    </div>
</section>
<section id="about">
    <div class="row section-head">
        <div class="col one-fourth">
            <h2>About Us</h2>
            <p class="desc">This is what we are.</p>
        </div>
        <div class="col three-fourths">
            <p class="intro">Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum
                auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate
                cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare
                odio. Sed non mauris vitae erat consequat auctor eu in elit. </p>
        </div>
    </div>
    <div class="row">
        <div class="col full">
            <h3>Our Work Process.</h3>
        </div>
    </div>
    <div class="row process-wrap">
        <div class="col">
            <h4>Explore.</h4>
            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit
                consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet
                mauris. Morbi accumsan ipsum velit.</p>
        </div>
        <div class="col">
            <h4>Design.</h4>
            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit
                consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet
                mauris. Morbi accumsan ipsum velit. Duis sed odio sit. </p>
        </div>
        <div class="col m-first">
            <h4>Develop.</h4>
            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit
                consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet
                mauris. Morbi accumsan ipsum velit.</p>
        </div>
        <div class="col">
            <h4>Deliver.</h4>
            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit
                consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet
                mauris. Morbi accumsan ipsum velit. Duis sed odio sit. </p>
        </div>
    </div>
    <div class="row">
        <div class="col full">
            <h3>Meet The Team.</h3>
        </div>
    </div>
    <div class="row team-wrap">
        <div class="col one-fourth">
            <img src="{{ asset('front-theme-asset/kreative/images/team/team-img-01.jpg') }}" alt="">
            <div class="member-name">
                <h5>Naruto Uzumaki</h5>
                <span>Director</span></div>
            <ul class="member-social">
                <li><a href="#"><i class="icon-facebook"></i></a></li>
                <li><a href="#"><i class="icon-twitter"></i></a></li>
                <li><a href="#"><i class="icon-google-plus-sign"></i></a></li>
                <li><a href="#"><i class="icon-linkedin"></i></a></li>
                <li><a href="#"><i class="icon-skype"></i></a></li>
            </ul>
        </div>
        <div class="col one-fourth">
            <img src="{{ asset('front-theme-asset/kreative') }}/images/team/team-img-02.jpg" alt="">
            <div class="member-name">
                <h5>Sakura Haruno</h5>
                <span>Director</span>
            </div>
            <ul class="member-social">
                <li><a href="#"><i class="icon-facebook"></i></a></li>
                <li><a href="#"><i class="icon-twitter"></i></a></li>
                <li><a href="#"><i class="icon-google-plus-sign"></i></a></li>
                <li><a href="#"><i class="icon-linkedin"></i></a></li>
                <li><a href="#"><i class="icon-skype"></i></a></li>
            </ul>
        </div>
        <div class="col one-fourth">
            <img src="{{ asset('front-theme-asset/kreative/images/team/team-img-03.jpg') }}" alt="">
            <div class="member-name">
                <h5>Sasuke Uchiha</h5>
                <span>Senior Web Designer</span>
            </div>
            <ul class="member-social">
                <li><a href="#"><i class="icon-facebook"></i></a></li>
                <li><a href="#"><i class="icon-twitter"></i></a></li>
                <li><a href="#"><i class="icon-google-plus-sign"></i></a></li>
                <li><a href="#"><i class="icon-linkedin"></i></a></li>
                <li><a href="#"><i class="icon-skype"></i></a></li>
            </ul>
        </div>
        <div class="col one-fourth">
            <img src="{{ asset('front-theme-asset/kreative/images/team/team-img-03.jpg') }}" alt="">
            <div class="member-name">
                <h5>Shikamaru Nara</h5>
                <span>Web Designer</span></div>
            <ul class="member-social">
                <li><a href="#"><i class="icon-facebook"></i></a></li>
                <li><a href="#"><i class="icon-twitter"></i></a></li>
                <li><a href="#"><i class="icon-google-plus-sign"></i></a></li>
                <li><a href="#"><i class="icon-linkedin"></i></a></li>
                <li><a href="#"><i class="icon-skype"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col full section-head">
            <h2>Testimonials</h2>
            <p class="desc">What our clients are saying.</p>
        </div>
    </div>
    <div class="row testimonials">
        <div class="col half">
            <div class="client-author"><img src="{{ asset('front-theme-asset/kreative') }}/images/client-img.png"
                                            alt="">
                <div class="name">
                    <p>John Doe<span>Designer</span></p>
                </div>
            </div>
            <div class="client-cite">
                <p>Phasellus - ut augue at sapien bibendum bibendum amet magna. Aenean condimentum, lacus sit amet
                    luctus lobortis, enim tellus ultrices elit, amet consequat enim elit noneas.</p>
            </div>
        </div>
        <div class="col half">
            <div class="client-author">
                <img src="{{ asset('front-theme-asset/kreative/images/client-img.png') }}" alt="">
                <div class="name">
                    <p>Michael Smith<span>CEO</span></p>
                </div>
            </div>
            <div class="client-cite">
                <p>Nascetur augue hac platea enim, egestas pulvinar vut. Pulvinar cum, ac eu, tristie acus duis in
                    dictumst non integer. Elit, sed scelerisque odio tortor, sed platea dis. Aenean condimentum, lacus
                    sit amet luctus lobortis, enim tellus ultrices elit.</p>
            </div>
        </div>
    </div>
</section>
<section id="map">
    <iframe src="{{ $settingModel->getSetting('google_map', $accountId) }}" width="100%" height="500"
            style="border: 0;" allowfullscreen="yes" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
<section id="contact">
    <div class="row section-head">
        <div class="col full">
            <h2>Contact Us</h2>
            <p class="desc">Get in touch with us.</p>
        </div>
    </div>
    <div class="row">
        <div class="col g-7">
            <form name="contactForm" id="contactForm" method="post" action="#">
                <fieldset>
                    <div>
                        <label for="contactName">Name <span class="required">*</span></label>
                        <input name="contactName" type="text" id="contactName" size="35" value="">
                    </div>
                    <div>
                        <label for="contactEmail">Email <span class="required">*</span></label>
                        <input name="contactEmail" type="text" id="contactEmail" size="35" value="">
                    </div>
                    <div>
                        <label for="contactSubject">Subject</label>
                        <input name="contactSubject" type="text" id="contactSubject" size="35" value="">
                    </div>
                    <div>
                        <label for="contactMessage">Message <span class="required">*</span></label>
                        <textarea name="contactMessage" id="contactMessage" rows="15" cols="50"></textarea>
                    </div>
                    <div>
                        <button class="submit">Submit</button>
                        <span id="image-loader">
                            <img src="{{ asset('front-theme-asset/kreative/images/loader.gif') }}" alt="">
                        </span>
                    </div>
                </fieldset>
            </form>
            <div id="message-warning"></div>
            <div id="message-success"><i class="icon-ok"></i>Your message was sent, thank you!<br></div>
        </div>
        <aside class="col g-5">
            <h3>Contact Information</h3>
            <p>Nascetur augue hac platea enim, egestas pulvinar vutulvinar cum, ac eu.</p>
            <p> Kreative Design Studio <br>
                Anystreet Avenue 012 <br>
                State, Anytown </p>
            <p> Phone: 0 123 456 789 0 <br>
                Email: info [@] kreativedesign.com </p>
            <br>
            <h3>Template Info</h3>
            <p>Kreative is a free website template by styleshout.com. This work is released and licensed under the
                Creative Commons Attribution 3.0 License, which means that you are free to use and modify it for any
                personal or commercial purpose. All I ask is that you give me credit by including a credit link to my
                website. </p>
        </aside>
    </div>
</section>
<footer>
    <div class="row">
        <div class="col g-7">
            <ul class="copyright">
                <li>Copyright &copy; 2045 Kreative</li>
                <li>Design by <a href="http://www.styleshout.com/">Styleshout</a></li>
            </ul>
        </div>
        <div class="col g-5 pull-right">
            <ul class="social-links">
                <li><a href="#"><i class="icon-facebook"></i></a></li>
                <li><a href="#"><i class="icon-twitter"></i></a></li>
                <li><a href="#"><i class="icon-google-plus-sign"></i></a></li>
                <li><a href="#"><i class="icon-linkedin"></i></a></li>
                <li><a href="#"><i class="icon-skype"></i></a></li>
                <li><a href="#"><i class="icon-rss-sign"></i></a></li>
            </ul>
        </div>
    </div>
</footer>
<script src="{{ asset('front-theme-asset/kreative/js/jquery-1.10.2.min.js') }}"></script>
<script src="{{ asset('front-theme-asset/kreative/js/jquery-migrate-1.2.1.min.js') }}"></script>
<script src="{{ asset('front-theme-asset/kreative/js/scrollspy.js') }}"></script>
<script src="{{ asset('front-theme-asset/kreative/js/jquery.flexslider.js') }}"></script>
<script src="{{ asset('front-theme-asset/kreative/js/jquery.reveal.js') }}"></script>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="{{ asset('front-theme-asset/kreative/js/gmaps.js') }}"></script>
<script src="{{ asset('front-theme-asset/kreative/js/init.js') }}"></script>
<script src="{{ asset('front-theme-asset/kreative/js/smoothscrolling.js') }}"></script>
</body>
</html>
