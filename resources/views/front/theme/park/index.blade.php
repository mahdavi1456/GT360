@extends('front.theme.park.parts.master')
@section('content')
    <div class="MainSlider" style="background-image:url( {{ asset('front-theme-asset/park/img/wall.jpg') }})">
        <h1>{{ $settingModel->getSetting('title', $accountId, $projectId) }}</h1>
        <p>{{ $settingModel->getSetting('description', $accountId, $projectId) }}</p>
    </div>
    <div class="container-fluid">
        <div class="MainWidgetBtn">
            <a href="{{ route('reserve', $slug) }}">رزرو آنلاین</a>
            <a href="?page=menu">منوی دیجیتال</a>
            <a href="" target="_blank">نظرسنجی</a>
            <a disabled href="?page=gallery.php">گالری تصاویر</a>
            <a disabled href="?page=shop.php">فروشگاه <small>(آزمایشی)</small></a>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4">
                <div class="website-introduce">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4">
                <div class="website-video">
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="owl-title col-lg-12">
                <h2>دوره ها</h2>
            </div>
            <div class="col-lg-12">
                <div class="owl-carousel owl-theme owl-products">
                    <div class="item">
                        <a href="#">
                            <img src="https://gratech.ir/wp-content/uploads/2022/07/Increase-File-Upload-Size.jpg">
                            <div class="owl-products-text">
                                <h2>دوره یک</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="owl-title col-lg-12">
                <h2>فروشگاه</h2>
            </div>
            <div class="col-lg-12">
                <div class="owl-carousel owl-theme owl-products">
                    <div class="item">
                        <a href="#">
                            <img src="https://gratech.ir/wp-content/uploads/2022/07/Increase-File-Upload-Size.jpg">
                            <div class="owl-products-text">
                                <h2>دوره یک</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
@endsection
