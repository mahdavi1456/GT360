<!DOCTYPE html>
<html class="no-js" lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>قالب Antomi | قالب فروشگاهی آنتومی</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front-theme-asset/img/favicon.ico') }}">

    <meta name="theme-color" content="#c40316">

    <!-- CSS
    ========================= -->

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('front-theme-asset/css/plugins.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('front-theme-asset/css/style.css') }}">

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
                        <p>ارسال رایگان - ضمانت بازگشت وجه 30 روزه</p>
                    </div>
                    <div class="header_top_settings text-right">
                        <ul>
                            <li><a href="#">آدرس‌های فروشگاه</a></li>
                            <li><a href="#">پیگیری سفارش</a></li>
                            <li>تلفن تماس: <a class="ltr-text" href="tel:+(+98)800456789">(+98) 800 456 789 </a></li>
                            <li>ضمانت کیفیت محصولات</li>
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
                                            <a href="#"><img src="assets/img/s-product/product.jpg" alt=""></a>
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
                                            <a href="#"><img src="assets/img/s-product/product2.jpg" alt=""></a>
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
                        <ul class="offcanvas_main_menu">
                            <li class="menu-item-has-children active">
                                <a href="#">خانه</a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">خانه 1</a></li>
                                    <li><a href="index-2.html">خانه 2</a></li>
                                    <li><a href="index-3.html">خانه 3</a></li>
                                    <li><a href="index-4.html">خانه 4</a></li>
                                    <li><a href="index-5.html">خانه 5</a></li>
                                    <li><a href="index-6.html">خانه 6</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">فروشگاه</a>
                                <ul class="sub-menu">
                                    <li class="menu-item-has-children">
                                        <a href="#">طرح های فروشگاه</a>
                                        <ul class="sub-menu">
                                            <li><a href="shop.html">فروشگاه</a></li>
                                            <li><a href="shop-fullwidth.html">تمام عرض</a></li>
                                            <li><a href="shop-fullwidth-list.html">تمام عرض لیست</a></li>
                                            <li><a href="shop-left-sidebar.html">نوار کناری چپ </a></li>
                                            <li><a href="shop-left-sidebar-list.html"> نوار کناری چپ لیست</a></li>
                                            <li><a href="shop-list.html">نمایش لیست</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">سایر صفحات</a>
                                        <ul class="sub-menu">
                                            <li><a href="cart.html">سبد خرید</a></li>
                                            <li><a href="wishlist.html">لیست علاقه‌مندی‌ها</a></li>
                                            <li><a href="checkout.html">پرداخت</a></li>
                                            <li><a href="my-account.html">حساب کاربری</a></li>
                                            <li><a href="404.html">خطای 404</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">انواع محصول</a>
                                        <ul class="sub-menu">
                                            <li><a href="product-details.html">جزئیات محصول</a></li>
                                            <li><a href="product-sidebar.html">محصول با نوار کناری</a></li>
                                            <li><a href="product-grouped.html">محصول گروهبندی شده</a></li>
                                            <li><a href="variable-product.html">محصول متغیر</a></li>
                                            <li><a href="product-countdown.html">محصول شمارنده</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">بلاگ</a>
                                <ul class="sub-menu">
                                    <li><a href="blog.html">بلاگ</a></li>
                                    <li><a href="blog-details.html">جزئیات مطلب بلاگ</a></li>
                                    <li><a href="blog-fullwidth.html">بلاگ تمام عرض</a></li>
                                    <li><a href="blog-right-sidebar.html">نوار کناری راست</a></li>
                                    <li><a href="blog-no-sidebar.html">بلاگ بدون نوار کناری</a></li>
                                </ul>

                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">صفحات </a>
                                <ul class="sub-menu">
                                    <li><a href="about.html">درباره ما</a></li>
                                    <li><a href="faq.html">سوالات متداول</a></li>
                                    <li><a href="privacy-policy.html">سیاست حریم خصوصی</a></li>
                                    <li><a href="contact.html">تماس</a></li>
                                    <li><a href="login.html">ورود</a></li>
                                    <li><a href="404.html">خطای 404</a></li>
                                    <li><a href="compare.html">مقایسه</a></li>
                                    <li><a href="coming-soon.html">به زودی</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="my-account.html">حساب کاربری</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="about.html">درباره ما</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="contact.html"> تماس با ما</a>
                            </li>
                        </ul>
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
                            <p>ارسال رایگان - ضمانت بازگشت وجه 30 روزه</p>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="header_top_settings text-right">
                            <ul>
                                <li><a href="#">آدرس‌های فروشگاه</a></li>
                                <li><a href="#">پیگیری سفارش</a></li>
                                <li>تلفن تماس: <a class="ltr-text" href="tel:+(+98)800456789">(+98) 800 456 789 </a></li>
                                <li>ضمانت کیفیت محصولات</li>
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
                            <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="main_menu menu_position text-center">
                            <nav>
                                <ul>
                                    <li><a class="active" href="index.html">خانه<i class="fa fa-angle-down"></i></a>
                                        <ul class="sub_menu">
                                            <li><a href="index.html">خانه فروشگاه 1</a></li>
                                            <li><a href="index-2.html">خانه فروشگاه 2</a></li>
                                            <li><a href="index-3.html">خانه فروشگاه 3</a></li>
                                            <li><a href="index-4.html">خانه فروشگاه 4</a></li>
                                            <li><a href="index-5.html">خانه فروشگاه 5</a></li>
                                            <li><a href="index-6.html">خانه فروشگاه 6</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega_items"><a href="shop.html">فروشگاه<i class="fa fa-angle-down"></i></a>
                                        <div class="mega_menu">
                                            <ul class="mega_menu_inner">
                                                <li><a href="#">طرح های فروشگاه</a>
                                                    <ul>
                                                        <li><a href="shop-fullwidth.html">تمام عرض</a></li>
                                                        <li><a href="shop-fullwidth-list.html">تمام عرض لیست</a></li>
                                                        <li><a href="shop-left-sidebar.html">نوار کناری چپ </a></li>
                                                        <li><a href="shop-left-sidebar-list.html"> نوار کناری چپ لیست</a></li>
                                                        <li><a href="shop-list.html">نمایش لیست</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">سایر صفحات</a>
                                                    <ul>
                                                        <li><a href="cart.html">سبد خرید</a></li>
                                                        <li><a href="wishlist.html">لیست علاقه‌مندی‌ها</a></li>
                                                        <li><a href="checkout.html">پرداخت</a></li>
                                                        <li><a href="my-account.html">حساب کاربری</a></li>
                                                        <li><a href="404.html">خطای 404</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">انواع محصول</a>
                                                    <ul>
                                                        <li><a href="product-details.html">جزئیات محصول</a></li>
                                                        <li><a href="product-sidebar.html">محصول با نوار کناری</a></li>
                                                        <li><a href="product-grouped.html">محصول گروهبندی شده</a></li>
                                                        <li><a href="variable-product.html">محصول متغیر</a></li>
                                                        <li><a href="product-countdown.html">محصول شمارنده</a></li>

                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a href="blog.html">بلاگ<i class="fa fa-angle-down"></i></a>
                                        <ul class="sub_menu pages">
                                            <li><a href="blog-details.html">جزئیات مطلب بلاگ</a></li>
                                            <li><a href="blog-fullwidth.html">بلاگ تمام عرض</a></li>
                                            <li><a href="blog-right-sidebar.html">نوار کناری راست</a></li>
                                            <li><a href="blog-no-sidebar.html">بلاگ بدون نوار کناری</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">صفحات <i class="fa fa-angle-down"></i></a>
                                        <ul class="sub_menu pages">
                                            <li><a href="about.html">درباره ما</a></li>
                                            <li><a href="faq.html">سوالات متداول</a></li>
                                            <li><a href="privacy-policy.html">سیاست حریم خصوصی</a></li>
                                            <li><a href="contact.html">تماس</a></li>
                                            <li><a href="login.html">ورود</a></li>
                                            <li><a href="404.html">خطای 404</a></li>
                                            <li><a href="compare.html">مقایسه</a></li>
                                            <li><a href="coming-soon.html">به زودی</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about.html">درباره ما</a></li>
                                    <li><a href="contact.html"> تماس با ما</a></li>
                                </ul>
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
                                    <span class="cart_price"><span>152,000 تومان</span> <i class="ion-ios-arrow-down"></i></span>
                                    <span class="cart_count">2</span>

                                </a>
                                <!--mini cart-->
                                <div class="mini_cart">
                                    <div class="mini_cart_inner">
                                        <div class="cart_item">
                                            <div class="cart_img">
                                                <a href="#"><img src="assets/img/s-product/product.jpg" alt=""></a>
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
                                                <a href="#"><img src="assets/img/s-product/product2.jpg" alt=""></a>
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
                                    <li class="menu_item_children"><a href="#">لباس و پوشاک <i class="fa fa-angle-left"></i></a>
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
                                    <li class="menu_item_children"><a href="#"> دکور و مبلمان <i class="fa fa-angle-left"></i></a>
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
                                    <li class="menu_item_children"><a href="#"> قطعات خودرو <i class="fa fa-angle-left"></i></a>
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
                                    <li class="menu_item_children"><a href="#"> کامپیوتر و لپ تاپ <i class="fa fa-angle-left"></i></a>
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
                    <div class="column2 col-lg-6 ">
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
