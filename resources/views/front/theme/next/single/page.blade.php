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

<!-- Modal -->
<div class="modal fade" id="search_bar" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2 col-xs-10 col-xs-offset-1">
                        <div class="navbar-search">
                            <form action="#" method="get" id="search-global-form" class="search-global">
                                <input type="text" placeholder="برای جستجو تایپ کنید" autocomplete="off" name="s" id="search" value="" class="search-global__input">
                                <button class="search-global__btn"><i class="fa fa-search"></i></button>
                                <div class="search-global__note">جستجوی خود را در بالا تایپ کنید و بازگشت را برای جستجو فشار دهید.</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Model search bar -->

@include('front.theme.next.parts.footer')
