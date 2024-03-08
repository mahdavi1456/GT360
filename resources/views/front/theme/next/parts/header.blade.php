<!DOCTYPE html>
<html lang="fa">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>{{ $siteEngine->getSetting('title') }}</title>
    <meta name="description" content="{{ $siteEngine->getSetting('description') }}">
    <!-- site icons -->
    <link rel="icon" href="{{ asset('front-theme-asset/next/images/fevicon/fevicon.png') }}" type="image/gif"/>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('front-theme-asset/next/css/bootstrap.min.css') }}"/>
    <!-- Site css -->
    <link rel="stylesheet" href="{{ asset('front-theme-asset/next/css/style.css') }}"/>
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('front-theme-asset/next/css/responsive.css') }}"/>
    <!-- colors css -->
    <link rel="stylesheet" href="{{ asset('front-theme-asset/next/css/colors1.css') }}"/>
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('front-theme-asset/next/css/custom.css') }}"/>
    <!-- wow Animation css -->
    <link rel="stylesheet" href="{{ asset('front-theme-asset/next/css/animate.css') }}"/>
    <!-- revolution slider css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/next/revolution/css/settings.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/next/revolution/css/layers.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/next/revolution/css/navigation.css') }}"/>
    <link rel="stylesheet" href="{{ asset('front-theme-asset/next/css/rtl.css') }}">

    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/sahel-font@v3.4.0/dist/font-face.css" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="default_theme" class="it_service">
<!-- loader -->
<div class="bg_load"><img class="loader_animation" src="{{ asset('front-theme-asset/next/images/loaders/loader_1.png') }}" alt="#"/></div>
<!-- end loader -->
<!-- header -->
<header id="default_header" class="header_style_1">
    <!-- header top -->
    <div class="header_top">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="full">
                        <div class="topbar-left">
                            <ul class="list-inline">
                                <li>
                                    <span class="topbar-label"><i class="fa fa-home"></i></span>
                                    <span class="topbar-hightlight">540 لورم ایپسوم نیویورک ، AB 90218</span>
                                </li>
                                <li>
                                    <span class="topbar-label"><i class="fa fa-envelope-o"></i></span>
                                    <span class="topbar-hightlight"><a href="mailto:info@yourdomain.com">info@yourdomain.com</a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 right_section_header_top">
                    <div class="float-right">
                        <div class="social_icon">
                            <ul class="list-inline">
                                <li><a class="fa fa-facebook" href="https://www.facebook.com/" title="Facebook"
                                       target="_blank"></a></li>
                                <li><a class="fa fa-google-plus" href="https://plus.google.com/" title="Google+"
                                       target="_blank"></a></li>
                                <li><a class="fa fa-twitter" href="https://twitter.com" title="Twitter"
                                       target="_blank"></a></li>
                                <li><a class="fa fa-linkedin" href="https://www.linkedin.com" title="LinkedIn"
                                       target="_blank"></a></li>
                                <li><a class="fa fa-instagram" href="https://www.instagram.com" title="Instagram"
                                       target="_blank"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="float-left">
                        <div class="make_appo"><a class="btn white_btn" href="make_appointment.html">قرار ملاقات
                                گذاشتن</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header top -->
    <!-- header bottom -->
    <div class="header_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <!-- logo start -->
                    <div class="logo"><a href="it_home.html"><img src="{{ asset('front-theme-asset/next/images/logos/it_logo.png') }}" alt="logo"/></a></div>
                    <!-- logo end -->
                </div>
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <!-- menu start -->
                    <div class="menu_side">
                        <div id="navbar_menu">
                            @php $navItems = $siteEngine->getNavItems('top-nav'); @endphp
                            @if ($navItems->count() > 0)
                                <ul class="first-ul">
                                    @foreach ($navItems as $navItem)
                                        @if ($navItem->itemHasChild())
                                            <li>
                                                <a href="{{ $navItem->link }}">{{ $navItem->name }}</a>
                                                <ul>
                                                    @php
                                                        $childs = $siteEngine->getNavItems('top-nav', $navItem->id);
                                                    @endphp
                                                    @if ($childs)
                                                        @foreach ($childs as $child)
                                                            <li>
                                                                <a href="{{ $child->link }}" target="{{ $child->target }}" rel="{{ $child->rel }}">{{ $child->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ $navItem->link }}">{{ $navItem->name }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="search_icon">
                            <ul>
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#search_bar">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
    <!-- header bottom end -->
</header>
<!-- end header -->
