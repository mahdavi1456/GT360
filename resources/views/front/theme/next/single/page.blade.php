@include('front.theme.next.parts.header')
@php $page = $siteEngine->getPage($slug); @endphp
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-right">
                            <h1 class="page-title">درباره ما</h1>
                            <ol class="breadcrumb">
                                <li><a href="index.blade.php">صفحه اصلی</a></li>
                                <li class="active">درباره ما</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end inner page banner -->

<!-- section -->
<div class="section padding_layout_1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="main_heading text_align_center">
                        <h2>{{ $page->title }}</h2>
                        <p class="large">{{ $page->abstract }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row about_blog">
            <div class="col-lg-6 col-md-6 col-sm-12 about_cont_blog">
                <div class="full text_align_left">
                    <h3>کاری که ما انجام می دهیم</h3>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است..</p>
                    <ul>
                        <li><i class="fa fa-check-circle"></i>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ </li>
                        <li><i class="fa fa-check-circle"></i>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ </li>
                        <li><i class="fa fa-check-circle"></i>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 about_feature_img padding_right_0">
                <div class="full text_align_center">
                    <img class="img-responsive" src="{{ asset('front-theme-asset/next/images/it_service/post-06.jpg') }}" alt="#" />
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->

@include('front.theme.next.parts.brands')

@include('front.theme.next.parts.footer')
