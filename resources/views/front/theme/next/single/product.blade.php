@include('front.theme.next.parts.header')
@php $product = $siteEngine->getProduct($slug); @endphp

<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-right">
                            <h1 class="page-title">جزئیات فروشگاه</h1>
                            <ol class="breadcrumb">
                                <li><a href="index.blade.php">صفحه اصلی</a></li>
                                <li class="active">جزئیات فروشگاه</li>
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
<div class="section padding_layout_1 product_detail">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-xl-6 col-lg-12 col-md-12">
                        <div class="product_detail_feature_img hizoom hi2">
                            <div class="hizoom hi2"><img src="{{ asset('front-theme-asset/next/images/it_service/1.jpg') }}" alt="#" /></div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12 col-md-12 product_detail_side detail_style1">
                        <div class="product-heading"><h2>{{ $product->product_name }}</h2></div>
                        <div class="product-detail-side">
                            <span><del>$25.00</del></span>
                            <span class="new-price">$20.00</span>
                            <span class="rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </span>
                            <span class="review">(5 customer review)</span>
                        </div>
                        <div class="detail-contant">
                            <p>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                            </p>
                            <form class="cart" method="post" action="it_cart.html">
                                <div class="quantity">
                                    <input step="1" min="1" max="5" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" type="number">
                                </div>
                                <button type="submit" class="btn sqaure_bt">افزودن به سبدخرید</button>
                            </form>
                        </div>
                        <div class="share-post"> <a href="#" class="share-text">اشتراک</a>
                            <ul class="social_icons">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="full">
                            <div class="tab_bar_section">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description">توضیحات</a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#reviews">نظرات (2)</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="description" class="tab-pane active">
                                        <div class="product_desc">
                                            <p>
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.<br>
                                                <br>
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                                            </p>
                                        </div>
                                    </div>
                                    <div id="reviews" class="tab-pane fade">
                                        <div class="product_review">
                                            <h3>نظرات (2)</h3>
                                            <div class="commant-text row">
                                                <div class="col-lg-2 col-md-2 col-sm-4">
                                                    <div class="profile"><img class="img-responsive" src="images/it_service/client1.png" alt="#"></div>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <h5>فاطمه</h5>
                                                    <p>
                                                        <span class="c_date">25 فروردین 1400</span> | <span><a rel="nofollow" class="comment-reply-link" href="#">پاسخ</a></span>
                                                    </p>
                                                    <span class="rating">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                    </span>
                                                    <p class="msg">
                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="commant-text row">
                                                <div class="col-lg-2 col-md-2 col-sm-4">
                                                    <div class="profile">
                                                        <img class="img-responsive" src="{{ asset('front-theme-asset/next/images/it_service/client2.png') }}" alt="#">
                                                    </div>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8">
                                                    <h5>فاطمه</h5>
                                                    <p><span class="c_date">25 فروردین 1400</span> | <span><a rel="nofollow" class="comment-reply-link" href="#">پاسخ</a></span></p>
                                                    <span class="rating"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span>
                                                    <p class="msg">
                                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="full review_bt_section">
                                                        <div class="float-right"> <a class="btn sqaure_bt" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">ثبت نظر</a> </div>
                                                    </div>
                                                    <div class="full">
                                                        <div id="collapseExample" class="full collapse commant_box">
                                                            <form accept-charset="UTF-8" action="index.blade.php" method="post">
                                                                <input id="ratings-hidden" name="rating" type="hidden">
                                                                <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="نظر خود را بنویسید..." required=""></textarea>
                                                                <div class="full_bt center">
                                                                    <button class="btn sqaure_bt" type="submit">ذخیره</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="full">
                            <div class="main_heading text_align_left" style="margin-bottom: 35px;">
                                <h3>محصولات مرتبط</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12 margin_bottom_30_all">
                        <div class="product_list">
                            <div class="product_img">
                                <img class="img-responsive" src="{{ asset('front-theme-asset/next/images/it_service/4.jpg') }}" alt="">
                            </div>
                            <div class="product_detail_btm">
                                <div class="center">
                                    <h4><a href="it_shop_detail.html">{{ $product->product_name }}</a></h4>
                                </div>
                                <div class="starratin">
                                    <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
                                </div>
                                <div class="product_price">
                                    <p><span class="old_price">25.000 تومان</span> – <span class="new_price">15.000 تومان</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 margin_bottom_30_all">
                        <div class="product_list">
                            <div class="product_img">
                                <img class="img-responsive" src="{{ asset('front-theme-asset/next/images/it_service/5.jpg') }}" alt="">
                            </div>
                            <div class="product_detail_btm">
                                <div class="center">
                                    <h4><a href="it_shop_detail.html">نام محصول</a></h4>
                                </div>
                                <div class="starratin">
                                    <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
                                </div>
                                <div class="product_price">
                                    <p><span class="old_price">25.000 تومان</span> – <span class="new_price">15.000 تومان</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 margin_bottom_30_all">
                        <div class="product_list">
                            <div class="product_img">
                                <img class="img-responsive" src="{{ asset('front-theme-asset/next/images/it_service/6.jpg') }}" alt="">
                            </div>
                            <div class="product_detail_btm">
                                <div class="center">
                                    <h4><a href="it_shop_detail.html">نام محصول</a></h4>
                                </div>
                                <div class="starratin">
                                    <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
                                </div>
                                <div class="product_price">
                                    <p><span class="old_price">25.000 تومان</span> – <span class="new_price">15.000 تومان</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('front.theme.next.parts.sidebar')

        </div>
    </div>
</div>
<!-- end section -->

@include('front.theme.next.parts.comments')
@include('front.theme.next.parts.brands')
@include('front.theme.next.parts.footer')
