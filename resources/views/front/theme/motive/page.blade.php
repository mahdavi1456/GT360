@include('front.theme.motive.header')
<body>

<div class="header" id="home">
    <div class="content white">
        @include('front.theme.motive.nav')
    </div>
</div>

@php
    $data = $pageModel->getPageData($pageId);
@endphp

<div class="banner two">
    <div class="container">
        <h2 class="inner-tittle">{{ $data->title }}</h2>
    </div>
</div>


<div class="main-content">
    <div class="container">
        <div class="mag-inner">
            <div class="col-md-8 mag-innert-right">
                <div class="banner-bottom-right-grids">
                    <div class="single-right-grid">

                        @if ($data->thumbnail)
                            <img src="{{ asset(ert('thumb-path')) . '/' . $data->thumbnail }}">
                        @else
                            <img src="{{ asset('front-theme-asset/motive/images/mg1.jpg') }}"/>
                        @endif

                        {!! $data->content !!}

                        <div class="single-bottom">
                            <ul>
                                <li><a href="#">الهام طراح</a></li>
                                <li>August 30 2015</li>
                                <li><a href="#">ادمین</a></li>
                                <li><a href="#">5 نظر</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            @include('front.theme.motive.sidebar')

            <div class="clearfix"></div>
        </div>


        <div class="mag-bottom">
            <h3 class="tittle bottom"><i class="glyphicon glyphicon-globe"></i>
                از سراسر جهان
            </h3>
            <div class="grid">
                <div class="col-md-4 m-b">
                    <a href="single.html">
                        <figure class="effect-layla">
                    </a>
                    <img src="images/pic.jpg" alt="img25"/>
                    <figcaption>
                        <h4>اخبارهای<span>روز</span></h4>
                        <a href="#">
                            مشاهده بیشتر
                        </a>
                    </figcaption>
                    </figure>
                    <div class="m-b-text">
                        <a href="single.html" class="wd">چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                            است</a>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است</p>
                        <a class="read" href="single.html">
                            ادامه مطلب
                        </a>
                    </div>
                </div>
                <div class="col-md-4 m-b">
                    <figure class="effect-layla">
                        <a href="single.html"> <img src="images/pic2.jpg" alt="img25"/></a>
                        <figcaption>
                            <h4>اخبارهای<span>روز</span></h4>
                        </figcaption>
                    </figure>
                    <div class="m-b-text">
                        <a href="single.html" class="wd">چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                            است</a>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است</p>
                        <a class="read" href="single.html">
                            ادامه مطلب
                        </a>
                    </div>
                </div>
                <div class="col-md-4 m-b">
                    <figure class="effect-layla">
                        <a href="single.html"><img src="images/pic3.jpg" alt="img25"/></a>
                        <figcaption>
                            <h4>اخبارهای<span>روز</span></h4>
                        </figcaption>
                    </figure>
                    <div class="m-b-text">
                        <a href="single.html" class="wd">چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                            است</a>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است</p>
                        <a class="read" href="single.html">
                            ادامه مطلب
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!--//mag-bottom-->
        <!--RTL & Persian LNG & Publicer By Www.20script.ir-->
    </div>
</div>
<!--//end-main-->

@include('front.theme.motive.footer')
