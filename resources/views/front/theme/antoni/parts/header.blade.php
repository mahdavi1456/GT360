{{ adminBar() }}
<!DOCTYPE html>
<html class="no-js" lang="fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $siteEngine->getSetting('title') }}</title>
    <meta name="description" content="{{ $siteEngine->getSetting('description') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front-theme-asset/anotni/img/favicon.ico') }}">

    <meta name="theme-color" content="#c40316">

    <!-- CSS ========================= -->

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('front-theme-asset/antoni/css/plugins.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('front-theme-asset/antoni/css/style.css') }}">
</head>

<body>

    <!--Offcanvas menu area start-->
    <div class="off_canvars_overlay"></div>
    <div class="Offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                    </div>
                    <div class="Offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                        </div>
                        <div class="antomi_message">
                            <p>{{ $siteEngine->getSetting('top_bar_first_text') }}</p>
                        </div>
                        <div class="header_top_settings text-right">
                            <ul>
                                <li><a href="{{ $siteEngine->getSetting('top_bar_first_link_src') }}">{{ $siteEngine->getSetting('top_bar_first_link_text') }}</a></li>
                                <li><a href="{{ $siteEngine->getSetting('top_bar_second_link_src') }}">{{ $siteEngine->getSetting('top_bar_secnod_link_src') }}</a></li>
                                <li>{{ $siteEngine->getSetting('top_bar_phone_label') }} <a class="ltr-text" href="tel: {{ $siteEngine->getSetting('top_bar_phone_link') }}">{{ $siteEngine->getSetting('top_bar_phone_text') }}</a></li>
                                <li>{{ $siteEngine->getSetting('top_bar_last_text') }}</li>
                            </ul>
                        </div>
                        <div class="header_configure_area">
                            <div class="header_wishlist">
                                <a href="wishlist.html"><i class="ion-android-favorite-outline"></i>
                                    <span class="wishlist_count">3</span>
                                </a>
                            </div>
                            <div class="mini_cart_wrapper">
                                <a href="javascript:void(0)">
                                    <i class="fa fa-shopping-bag"></i>
                                    <span class="cart_price"><i class="ion-ios-arrow-down"></i></span>
                                    <span class="cart_count">2</span>
                                </a>
                                <!--mini cart-->
                                <div class="mini_cart">
                                    <div class="mini_cart_inner">
                                        <div class="cart_item">
                                            <div class="cart_img">
                                                <a href="#"><img src="assets/img/s-product/product.jpg"
                                                        alt=""></a>
                                            </div>
                                            <div class="cart_info">
                                                <a href="#">گوشی هوشمند سامسونگ A50</a>
                                                <p>تعداد: 1 × <span> 60,000 تومان </span></p>
                                            </div>
                                            <div class="cart_remove">
                                                <a href="#"><i class="ion-android-close"></i></a>
                                            </div>
                                        </div>
                                        <div class="cart_item">
                                            <div class="cart_img">
                                                <a href="#"><img src="assets/img/s-product/product2.jpg"
                                                        alt=""></a>
                                            </div>
                                            <div class="cart_info">
                                                <a href="#">صندلی آشپزخانه پلاستیکی Nilper</a>
                                                <p>تعداد: 1 × <span> 60,000 تومان </span></p>
                                            </div>
                                            <div class="cart_remove">
                                                <a href="#"><i class="ion-android-close"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mini_cart_table">
                                        <div class="cart_total">
                                            <span>جمع اجزا:</span>
                                            <span class="price">138,000 تومان</span>
                                        </div>
                                        <div class="cart_total mt-10">
                                            <span>جمع کل:</span>
                                            <span class="price">138,000 تومان</span>
                                        </div>
                                    </div>
                                    <div class="mini_cart_footer">
                                        <div class="cart_button">
                                            <a href="cart.html">مشاهده سبد</a>
                                        </div>
                                        <div class="cart_button">
                                            <a href="checkout.html">پرداخت</a>
                                        </div>

                                    </div>
                                </div>
                                <!--mini cart end-->
                            </div>
                        </div>
                        <div class="search_container">
                            <form action="#">
                                <div class="hover_category">
                                    <select class="select_option" name="select" id="categori1">
                                        <option selected value="1">همه دسته ها</option>
                                        <option value="2">لوازم جانبی</option>
                                        <option value="3">سایر لوازم جانبی</option>
                                        <option value="4">لوازم کامپیوتر</option>
                                        <option value="5">دوربین و ویدیو </option>
                                        <option value="6">صفحه نمایش</option>
                                        <option value="7">تبلت ها</option>
                                        <option value="8">لپ تاپ ها</option>
                                        <option value="9">کیف دستی</option>
                                        <option value="10">هدفون و اسپیکر</option>
                                        <option value="11">گیاهان دارویی</option>
                                        <option value="12">سبزیجات</option>
                                        <option value="13">فروشگاه</option>
                                        <option value="14">لپ تاپ و کامپیوتر</option>
                                        <option value="15">ساعت ها</option>
                                        <option value="16">لوازم الکترونیکی</option>
                                    </select>
                                </div>
                                <div class="search_box">
                                    <input placeholder="جستجوی محصول ..." type="text">
                                    <button type="submit">جستجو</button>
                                </div>
                            </form>
                        </div>
                        <div id="menu" class="text-left ">
                            @if ($topMenu = $siteEngine->getNavItems('top-menu'))
                            <ul class="offcanvas_main_menu">
                                @foreach ($topMenu as $item)
                                    <li class="menu-item-has-children">
                                        <a href="{{ $item->getLink() }}">{{ $item->name }}
                                            @if (count($children = $item->children) > 0)
                                                <i class="fa fa-angle-down"></i>
                                            @endif
                                        </a>
                                        <ul class="sub_menu">
                                            @foreach ($children as $child)
                                                <li><a href="{{ $child->getLink() }}">{{ $child->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        </div>
                        <div class="Offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i> info@yourdomain.com</a></span>
                            <ul>
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Offcanvas menu area end-->
    
    <!--header area start-->
    <header>
        <div class="main_header">
            <div class="container">
                <!--header top start-->
                <div class="header_top">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-5">
                            <div class="antomi_message">
                                <p>{{ $siteEngine->getSetting('top_bar_first_text') }}</p>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7">
                            <div class="header_top_settings text-right">
                                <ul>
                                    <li><a href="{{ $siteEngine->getSetting('top_bar_first_link_src') }}">{{ $siteEngine->getSetting('top_bar_first_link_text') }}</a></li>
                                    <li><a href="{{ $siteEngine->getSetting('top_bar_second_link_src') }}">{{ $siteEngine->getSetting('top_bar_second_link_text') }}</a></li>
                                    <li>{{ $siteEngine->getSetting('top_bar_phone_label') }} <a class="ltr-text" href="tel: {{ $siteEngine->getSetting('top_bar_phone_link') }}">{{ $siteEngine->getSetting('top_bar_phone_text') }}</a></li>
                                    <li>{{ $siteEngine->getSetting('top_bar_last_text') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--header top start-->

                <!--header middel start-->
                <div class="header_middle sticky-header">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-6">
                            <div class="logo">
                                <a href=""><img src="{{ asset('front-theme-asset/antoni/img/logo/logo.png') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12">
                            <div class="main_menu menu_position text-center">
                                <nav>
                                    @if ($topMenu = $siteEngine->getNavItems('top-menu'))
                                        <ul>
                                            @foreach ($topMenu as $item)
                                                <li>
                                                    <a href="{{ $item->getLink() }}">{{ $item->name }}
                                                        @if (count($children = $item->children) > 0)
                                                            <i class="fa fa-angle-down"></i>
                                                        @endif
                                                    </a>
                                                    <ul class="sub_menu">
                                                        @foreach ($children as $child)
                                                            <li><a href="{{ $child->getLink() }}">{{ $child->name }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="header_configure_area">
                                <div class="header_wishlist">
                                    <a href="wishlist.html"><i class="ion-android-favorite-outline"></i>
                                        <span class="wishlist_count">3</span>
                                    </a>
                                </div>
                                <div class="mini_cart_wrapper">
                                    <a href="javascript:void(0)">
                                        <i class="fa fa-shopping-bag"></i>
                                        <span class="cart_price"><span>152,000 تومان</span> <i
                                                class="ion-ios-arrow-down"></i></span>
                                        <span class="cart_count">2</span>

                                    </a>
                                    <!--mini cart-->
                                    <div class="mini_cart">
                                        <div class="mini_cart_inner">
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img src="assets/img/s-product/product.jpg"
                                                            alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#">گوشی هوشمند سامسونگ A50</a>
                                                    <p>تعداد: 1 × <span> 60,000 تومان </span></p>
                                                </div>
                                                <div class="cart_remove">
                                                    <a href="#"><i class="ion-android-close"></i></a>
                                                </div>
                                            </div>
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img src="assets/img/s-product/product2.jpg"
                                                            alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#">صندلی آشپزخانه پلاستیکی Nilper</a>
                                                    <p>تعداد: 1 × <span> 60,000 تومان </span></p>
                                                </div>
                                                <div class="cart_remove">
                                                    <a href="#"><i class="ion-android-close"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mini_cart_table">
                                            <div class="cart_total">
                                                <span>جمع اجزا:</span>
                                                <span class="price">138,000 تومان</span>
                                            </div>
                                            <div class="cart_total mt-10">
                                                <span>جمع کل:</span>
                                                <span class="price">138,000 تومان</span>
                                            </div>
                                        </div>
                                        <div class="mini_cart_footer">
                                            <div class="cart_button">
                                                <a href="cart.html">مشاهده سبد</a>
                                            </div>
                                            <div class="cart_button">
                                                <a href="checkout.html">پرداخت</a>
                                            </div>

                                        </div>
                                    </div>
                                    <!--mini cart end-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--header middel end-->

                <!--header bottom satrt-->
                <div class="header_bottom">
                    <div class="row align-items-center">
                        <div class="column1 col-lg-3 col-md-6">
                            <div class="categories_menu">
                                <div class="categories_title">
                                    <h2 class="categori_toggle">دسته بندی ها</h2>
                                </div>
                                <div class="categories_menu_toggle">
                                    <ul>
                                        <li class="menu_item_children"><a href="#">لباس و پوشاک <i
                                                    class="fa fa-angle-left"></i></a>
                                            <ul class="categories_mega_menu">
                                                <li class="menu_item_children"><a href="#">لباس ها</a>
                                                    <ul class="categorie_sub_menu">
                                                        <li><a href="#">زیر پیراهن</a></li>
                                                        <li><a href="#">عصرانه</a></li>
                                                        <li><a href="#">روزانه</a></li>
                                                        <li><a href="#">ورزشی</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu_item_children"><a href="#">کیف دستی</a>
                                                    <ul class="categorie_sub_menu">
                                                        <li><a href="#">رودوشی</a></li>
                                                        <li><a href="#">کیف مدرسه</a></li>
                                                        <li><a href="#">کودکانه</a></li>
                                                        <li><a href="#">کت ها</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu_item_children"><a href="#">کفش ها</a>
                                                    <ul class="categorie_sub_menu">
                                                        <li><a href="#">چکمه های مچ پا</a></li>
                                                        <li><a href="#">صندل ها قفل دار </a></li>
                                                        <li><a href="#">مخصوص دویدن</a></li>
                                                        <li><a href="#">کتاب ها</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu_item_children"><a href="#">پوشاک</a>
                                                    <ul class="categorie_sub_menu">
                                                        <li><a href="#">ژاکت و کت </a></li>
                                                        <li><a href="#">بارانی ها</a></li>
                                                        <li><a href="#">ژاکت ها</a></li>
                                                        <li><a href="#">تیشرت ها</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu_item_children"><a href="#"> دکور و مبلمان <i
                                                    class="fa fa-angle-left"></i></a>
                                            <ul class="categories_mega_menu column_3">
                                                <li class="menu_item_children"><a href="#">صندلی</a>
                                                    <ul class="categorie_sub_menu">
                                                        <li><a href="#">ناهارخوری</a></li>
                                                        <li><a href="#">اتاق خواب</a></li>
                                                        <li><a href="#"> خانه و اداره</a></li>
                                                        <li><a href="#">اتاق نشیمن</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu_item_children"><a href="#">نورپردازی</a>
                                                    <ul class="categorie_sub_menu">
                                                        <li><a href="#">نورپردازی سقفی</a></li>
                                                        <li><a href="#">نورپردازی دیواری</a></li>
                                                        <li><a href="#">نورپردازی بیرون خانه</a></li>
                                                        <li><a href="#">نورپردازی هوشمند</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu_item_children"><a href="#">مبل</a>
                                                    <ul class="categorie_sub_menu">
                                                        <li><a href="#">مبل های پارچه ای</a></li>
                                                        <li><a href="#">مبل های چرمی</a></li>
                                                        <li><a href="#">مبل های گوشه ای</a></li>
                                                        <li><a href="#">مبل های تخت خوابی</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu_item_children"><a href="#"> قطعات خودرو <i
                                                    class="fa fa-angle-left"></i></a>
                                            <ul class="categories_mega_menu column_2">
                                                <li class="menu_item_children"><a href="#">ابزار ترمز</a>
                                                    <ul class="categorie_sub_menu">
                                                        <li><a href="#">میل لنگ</a></li>
                                                        <li><a href="#">قرقره</a></li>
                                                        <li><a href="#">دیزل </a></li>
                                                        <li><a href="#">بنزین</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu_item_children"><a href="#">ترمز اضطراری</a>
                                                    <ul class="categorie_sub_menu">
                                                        <li><a href="#">عروسک های دخترانه</a></li>
                                                        <li><a href="#">ابزار آموزشی دخترانه</a></li>
                                                        <li><a href="#">هنر های کودکان</a></li>
                                                        <li><a href="#">بازی های ویدئویی بچگانه</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu_item_children"><a href="#"> کامپیوتر و لپ تاپ <i
                                                    class="fa fa-angle-left"></i></a>
                                            <ul class="categories_mega_menu column_2">
                                                <li class="menu_item_children"><a href="#">شلوار جین</a>
                                                    <ul class="categorie_sub_menu">
                                                        <li><a href="#">ساختمان</a></li>
                                                        <li><a href="#">لوازم الکترونیکی</a></li>
                                                        <li><a href="#">اکشن فیگور </a></li>
                                                        <li><a href="#">اسباب بازی های مخصوص</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu_item_children"><a href="#">ماسین حساب ها</a>
                                                    <ul class="categorie_sub_menu">
                                                        <li><a href="#">عروسک های دخترانه</a></li>
                                                        <li><a href="#">ابزار آموزشی دخترانه</a></li>
                                                        <li><a href="#">هنر های کودکان</a></li>
                                                        <li><a href="#">بازی های ویدئویی بچگانه</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#"> نورپردازی</a></li>
                                        <li><a href="#"> لوازم جانبی</a></li>
                                        <li><a href="#">قطعات بدنه</a></li>
                                        <li><a href="#">ابزار شبکه</a></li>
                                        <li><a href="#">فیلتر های کارایی</a></li>
                                        <li><a href="#"> قطعات موتور</a></li>
                                        <li id="cat_toggle" class="has-sub"><a href="#"> دسته های بیشتر</a>
                                            <ul class="categorie_sub">
                                                <li><a href="#">دسته های پنهان</a></li>
                                            </ul>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="column2 col-lg-6">
                            <div class="search_container">
                                <form action="#">
                                    <div class="hover_category">
                                        <select class="select_option" name="select" id="categori2">
                                            <option selected value="1">همه دسته ها</option>
                                            <option value="2">لوازم جانبی</option>
                                            <option value="3">سایر لوازم جانبی</option>
                                            <option value="4">لوازم کامپیوتر</option>
                                            <option value="5">دوربین و ویدیو </option>
                                            <option value="6">صفحه نمایش</option>
                                            <option value="7">تبلت ها</option>
                                            <option value="8">لپ تاپ ها</option>
                                            <option value="9">کیف دستی</option>
                                            <option value="10">هدفون و اسپیکر</option>
                                            <option value="11">گیاهان دارویی</option>
                                            <option value="12">سبزیجات</option>
                                            <option value="13">فروشگاه</option>
                                            <option value="14">لپ تاپ و کامپیوتر</option>
                                            <option value="15">ساعت ها</option>
                                            <option value="16">لوازم الکترونیکی</option>
                                        </select>
                                    </div>
                                    <div class="search_box">
                                        <input placeholder="جستجوی محصول ..." type="text">
                                        <button type="submit">جستجو</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="column3 col-lg-3 col-md-6">
                            <div class="header_bigsale">
                                <a href="#">فروش بزرگ جمعه سیاه</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--header bottom end-->
            </div>
        </div>
    </header>
    <!--header area end-->