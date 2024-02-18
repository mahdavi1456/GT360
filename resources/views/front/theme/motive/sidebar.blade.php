
<div class="col-md-4 mag-inner-left">
    <div class="connect">
        <h4 class="side">{{ $settingModel->getSetting('follow_us_title', $accountId, $projectId) }}</h4>
        <ul class="stay">
            <li class="c5-element-facebook">
                <a href="#">
                    <span class="icon"></span>
                    <h5>700</h5>
                    <span class="text">لورم ایپسوم</span>
                </a>
            </li>
            <li class="c5-element-twitter">
                <a href="#">
                    <span class="icon1"></span>
                    <h5>201</h5>
                    <span class="text">لورم ایپسوم</span>
                </a>
            </li>
            <li class="c5-element-gg">
                <a href="#">
                    <span class="icon2"></span>
                    <h5>111</h5>
                    <span class="text">لورم ایپسوم</span>
                </a>
            </li>
            <li class="c5-element-dribble">
                <a href="#">
                    <span class="icon3"></span>
                    <h5>99</h5>
                    <span class="text">لورم ایپسوم</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="modern">
        <h4 class="side">لورم ایپسوم متن ساختگی</h4>
        <div id="example1" dir=ltr>
            <div id="owl-demo" class="owl-carousel text-center">
                <div class="item">

                    <img class="img-responsive lot"
                         src="{{ asset('front-theme-asset/motive/images/p1.jpg') }}" alt="" />
                </div>
                <div class="item">

                    <img class="img-responsive lot"
                         src="{{ asset('front-theme-asset/motive/images/p2.jpg') }}" alt="" />
                </div>
                <div class="item">

                    <img class="img-responsive lot"
                         src="{{ asset('front-theme-asset/motive/images/p33.jpg') }}"
                         alt="" />
                </div>
                <div class="item">

                    <img class="img-responsive lot"
                         src="{{ asset('front-theme-asset/motive/images/p1.jpg') }}" alt="" />
                </div>
                <div class="item">
                    <img class="img-responsive lot"
                         src="{{ asset('front-theme-asset/motive/images/p1.jpg') }}" alt="" />
                </div>
                <div class="item">
                    <img class="img-responsive lot"
                         src="{{ asset('front-theme-asset/motive/images/p2.jpg') }}" alt="" />
                </div>
                <div class="item">

                    <img class="img-responsive lot"
                         src="{{ asset('front-theme-asset/motive/images/p33.jpg') }}"
                         alt="" />
                </div>
                <div class="item">

                    <img class="img-responsive lot"
                         src="{{ asset('front-theme-asset/motive/images/p1.jpg') }}" alt="" />
                </div>
            </div>
        </div>
        <!-- requried-jsfiles-for owl -->
        <!--RTL & Persian LNG & Publicer By Www.20script.ir-->
        <script src="{{ asset('front-theme-asset/motive/js/owl.carousel.js') }}"></script>
        <script>
            $(document).ready(function() {
                $("#owl-demo").owlCarousel({
                    items: 1,
                    lazyLoad: true,
                    autoPlay: false,
                    navigation: true,
                    navigationText: true,
                    pagination: false,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint: 480,
                            visibleItems: 2
                        },
                        landscape: {
                            changePoint: 640,
                            visibleItems: 2
                        },
                        tablet: {
                            changePoint: 768,
                            visibleItems: 3
                        }
                    }
                });
            });
        </script>
        <!-- //requried-jsfiles-for owl -->
    </div>
    <!--/start-sign-up-->
    <div class="sign_main">
        <h4 class="side">
            ثبت نام برای خبرنامه
        </h4>
        <div class="sign_up">
            <p class="sign">
                ثبت نام برای دریافت خبرنامه رایگان ما!
            </p>
            <form>
                <input type="text" class="text" value="نام" onfocus="this.value = '';"
                       onblur="if (this.value == '') {this.value = 'Name';}">
                <input type="text" class="text" value="آدرس ایمیل" onfocus="this.value = '';"
                       onblur="if (this.value == '') {this.value = 'Email Address';}">
                <input type="submit" value="ارسال">
            </form>
            <p class="spam">لورم ایپسوم متن ساختگی با تولید سادگی</p>
        </div>
    </div>
    <!--//end-sign-up-->
    <h4 class="side">
        محبوب پست ها
    </h4>
    <div class="edit-pics">
        <div class="editor-pics">
            <div class="col-md-3 item-pic">
                <img src="{{ asset('front-theme-asset/motive/images/f4.jpg') }}"
                     class="img-responsive" alt="" />

            </div>
            <div class="col-md-9 item-details">
                <h5 class="inner two"><a href="post.blade.php">لورم ایپسوم متن ساختگی با تولید
                        سادگی</a></h5>
                <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a
                        href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="editor-pics">
            <div class="col-md-3 item-pic">
                <img src="{{ asset('front-theme-asset/motive/images/f1.jpg') }}"
                     class="img-responsive" alt="" />

            </div>
            <div class="col-md-9 item-details">
                <h5 class="inner two"><a href="post.blade.php">لورم ایپسوم متن ساختگی با تولید
                        سادگی</a></h5>
                <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a
                        href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="editor-pics">
            <div class="col-md-3 item-pic">
                <img src="{{ asset('front-theme-asset/motive/images/f1.jpg') }}"
                     class="img-responsive" alt="" />

            </div>
            <div class="col-md-9 item-details">
                <h5 class="inner two"><a href="post.blade.php">لورم ایپسوم متن ساختگی با تولید
                        سادگی</a></h5>
                <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a
                        href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="editor-pics">
            <div class="col-md-3 item-pic">
                <img src="{{ asset('front-theme-asset/motive/images/f4.jpg') }}"
                     class="img-responsive" alt="" />

            </div>
            <div class="col-md-9 item-details">
                <h5 class="inner two"><a href="post.blade.php">لورم ایپسوم متن ساختگی با تولید
                        سادگی</a></h5>
                <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a
                        href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--//edit-pics-->
    <!--/top-news-->
    <div class="top-news">
        <h4 class="side">اخبار مهم</h4>
        <div class="top-inner">
            @if ($postModel->getPosts($accountId, $projectId, 'news'))
                @foreach ($postModel->getPosts($accountId, $projectId, 'news') as $new)
                    <div class="top-text">
                        <a href="{{ $postModel->getPostPermalink($slug, "news", $new->id) }}">
                            <img src="{{ asset('front-theme-asset/motive/images/slp.jpg') }}"
                                 class="img-responsive" alt="" />
                        </a>
                        <h5 class="top">
                            <a href="{{ $postModel->getPostPermalink($slug, "news", $new->id) }}">{{ $new->title }}</a>
                        </h5>
                        <div class="td-post-date two">
                            <i class="glyphicon glyphicon-time"></i>
                            {{ $postModel->getShamsiDate($new->created_at) }}
                            <a href="#"><i class="glyphicon glyphicon-comment"></i>0 </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
