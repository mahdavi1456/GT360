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
        
    </div>
</div>
@include('front.theme.motive.footer')
