@include('front.theme.motive.header')

<body>
    <div class="header" id="home">
        <div class="content white">
            @include('front.theme.motive.nav')
        </div>
    </div>

    <!--/start-banner-->
    <div class="banner">
        <div class="container">
            <div class="banner-inner">
                <div class="callbacks_container">
                    <ul class="rslides callbacks callbacks1" id="slider4">
                        <li class="callbacks1_on"
                            style="display: block; float: right; position: relative; opacity: 1; z-index: 2; transition: opacity 500ms ease-in-out;">
                            <div class="banner-info">
                                <h3>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک
                                    است</h3>
                                <p>لورم ایپسوم یا طرح‌نما</p>
                            </div>
                        </li>
                        <li class=""
                            style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 500ms ease-in-out;">
                            <div class="banner-info">
                                <h3>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک
                                    است</h3>
                                <p>

                                    لورم ایپسوم یا طرح‌نما</p>
                            </div>
                        </li>
                        <li class=""
                            style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 500ms ease-in-out;">
                            <div class="banner-info">
                                <h3>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک
                                    است</h3>
                                <p>

                                    لورم ایپسوم یا طرح‌نما</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <!--banner-Slider-->

                <script src="{{ asset('front-theme-asset/motive/js/responsiveslides.min.js') }}"></script>
                <script>
                    // You can also use "$(window).load(function() {"
                    $(function() {
                        // Slideshow 4
                        $("#slider4").responsiveSlides({
                            auto: true,
                            pager: true,
                            nav: false,
                            speed: 500,
                            namespace: "callbacks",
                            before: function() {
                                $('.events').append("<li>before event fired.</li>");
                            },
                            after: function() {
                                $('.events').append("<li>after event fired.</li>");
                            }
                        });

                    });
                </script>
            </div>
        </div>
    </div>
    <!--//end-banner-->

    <!--/start-main-->

    <div class="main-content">
        <div class="container">
            <div class="mag-inner">
                <div class="col-md-8 mag-innert-right">
                    <!--/start-Technology-->
                    <div class="technology">
                        <h2 class="tittle"><i class="glyphicon glyphicon-certificate"></i> {{ $settingModel->getSetting('description', $accountId, $projectId) }}</h2>
                        <div class="col-md-6 tech-img">
                            <img src="{{ asset(ert('tsp') . $settingModel->getSetting('image_event', $accountId, $projectId)) }}"
                                class="img-responsive" alt="" />
                        </div>
                        <div class="col-md-6 tech-text">
                            <div class="editor-pics">
                                @php
                                    $events = $postModel->getPosts('event', $accountId, $projectId);
                                @endphp
                                @if ($events)
                                    @foreach ($events as $event)
                                        @php
                                            $permalink = $postModel->getPostPermalink('events', $slug, $event->id);
                                        @endphp
                                        <div class="row">
                                            <div class="col-md-3 item-pic">
                                                @if ($event->thumbnail)
                                                    <img src="{{ asset(ert('thumb-path')) . '/' . $event->thumbnail }}" class="img-responsive">
                                                @else
                                                    <img src="{{ asset('front-theme-asset/motive/images/mg1.jpg') }}"
                                                        class="img-responsive" alt="" />
                                                @endif
                                            </div>
                                            <div class="col-md-9 item-details">
                                                <h5 class="inner two">
                                                    <a href="{{ $permalink }}" class="wd">{{ $event->title }}</a>
                                                </h5>
                                                <p>{{ $event->abstract }}</p>
                                                <a href="{{ $permalink }}" class="read">ادامه مطلب</a>
                                                <div class="td-post-date two">{{ $postModel->getShamsiDate($event->created_at) }}</div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!--//end-Technology-->


                    <div class="gallery">
                        <div class="main-title-head">
                            <h3 class="tittle"><i class="glyphicon glyphicon-picture"></i>گالری</h3>
                        </div>
                        <div class="gallery-images">
                            <div class="course_demo">
                                <ul id="flexiselDemo">
                                    @php
                                        $galleries = $postModel->getPosts($accountId, $projectId, 'gallery');
                                    @endphp
                                    @if ($galleries)
                                        @foreach ($galleries as $gallery)
                                            @php
                                                $permalink = $postModel->getPostPermalink('gallery', $slug, $event->id);
                                            @endphp
                                            <li>
                                                <a href="{{ $permalink }}">
                                                    @if ($gallery->thumbnail)
                                                        <img src="{{ asset(ert('thumb-path')) . '/' . $gallery->thumbnail }}">
                                                    @else
                                                        <img src="{{ asset('front-theme-asset/motive/images/mg1.jpg') }}" alt="" />
                                                    @endif
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <script type="text/javascript">
                                $(window).load(function() {
                                    $("#flexiselDemo").flexisel({
                                        visibleItems: 3,
                                        animationSpeed: 1000,
                                        autoPlay: true,
                                        autoPlaySpeed: 3000,
                                        pauseOnHover: true,
                                        enableResponsiveBreakpoints: true,
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
                            <script type="text/javascript" src="{{ asset('front-theme-asset/motive/js/jquery.flexisel.js') }}"></script>
                        </div>

                        <a class="more" href="post.blade.php">بیشتر +</a>

                    </div>


                    <div class="business">
                        <h3 class="tittle"><i class="glyphicon glyphicon-briefcase"></i>کسب و کار</h3>
                        <div class="business-inner">
                            <div class="col-md-6 b-img">
                                <a href="post.blade.php"><img class="img-responsive"
                                        src="{{ asset(ert('tsp') . $settingModel->getSetting('image_news', $accountId,$projectId)) }}"
                                        alt="" />
                                </a>
                            </div>
                            <div class="col-md-6 b-text">
                                <h5>
                                    <a href="post.blade.php">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</a>
                                </h5>
                                <h6><i class="glyphicon glyphicon-time"></i>Jun 25, 2015</h6>
                                <div class="icons"><a href="#"><i
                                            class="glyphicon glyphicon-user"></i>ادمین</a><a href="#"><i
                                            class="glyphicon glyphicon-comment"></i>2</a><a href="#"><i
                                            class="glyphicon glyphicon-thumbs-up"></i>152</a><a href="#"><i
                                            class="glyphicon glyphicon-thumbs-down"></i> 26</a></div>
                                <div class="clearfix"></div>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک
                                    است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط
                                    فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد</p>
                                <a class="read" href="post.blade.php">
                                    ادامه مطلب
                                </a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="business-bottom-content">
                                <div class="col-md-6 business-bottom">
                                    <div class="col-md-3 b-bottom-pic">
                                        <a href="post.blade.php"><img class="img-responsive"
                                                src="{{ asset('front-theme-asset/motive/images/ti1.jpg') }}"
                                                alt="" /></a>
                                    </div>
                                    <div class="col-md-9 b-bottom-text">
                                        <h5><a href="post.blade.php">لورم ایپسوم متن ساختگی با تولید سادگی </a></h5>
                                        <h6><i class="glyphicon glyphicon-time"></i>Jun 25, 2015</h6>
                                        <div class="icons"><a href="#"><i
                                                    class="glyphicon glyphicon-user"></i>ادمین</a><a href="#"><i
                                                    class="glyphicon glyphicon-comment"></i>2</a><a href="#"><i
                                                    class="glyphicon glyphicon-thumbs-up"></i>152</a><a
                                                href="#"><i class="glyphicon glyphicon-thumbs-down"></i> 26</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="col-md-6 business-bottom">
                                    <div class="col-md-3 b-bottom-pic">
                                        <a href="post.blade.php"><img class="img-responsive"
                                                src="{{ asset('front-theme-asset/motive/images/ti1.jpg') }}"
                                                alt="" /></a>
                                    </div>
                                    <div class="col-md-9 b-bottom-text">
                                        <h5><a href="post.blade.php">لورم ایپسوم متن ساختگی با تولید سادگی </a></h5>
                                        <h6><i class="glyphicon glyphicon-time"></i>Jun 25, 2015</h6>
                                        <div class="icons"><a href="#"><i
                                                    class="glyphicon glyphicon-user"></i>ادمین</a><a href="#"><i
                                                    class="glyphicon glyphicon-comment"></i>2</a><a href="#"><i
                                                    class="glyphicon glyphicon-thumbs-up"></i>152</a><a
                                                href="#"><i class="glyphicon glyphicon-thumbs-down"></i> 26</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="business-inner two">
                            <div class="col-md-6 b-img"><a href="post.blade.php"><img class="img-responsive"
                                        src="{{ asset('front-theme-asset/motive/images/time2.jpg') }}"
                                        alt="" /></a></div>
                            <div class="col-md-6 b-text">
                                <h5><a href="post.blade.php">لورم ایپسوم متن ساختگی با تولید سادگی </a></h5>
                                <h6><i class="glyphicon glyphicon-time"></i>Jun 25, 2015</h6>
                                <div class="icons"><a href="#"><i
                                            class="glyphicon glyphicon-user"></i>ادمین</a><a href="#"><i
                                            class="glyphicon glyphicon-comment"></i>2</a><a href="#"><i
                                            class="glyphicon glyphicon-thumbs-up"></i>152</a><a href="#"><i
                                            class="glyphicon glyphicon-thumbs-down"></i> 26</a></div>
                                <div class="clearfix"></div>
                                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                    گرافیک
                                    است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط
                                    فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد</p>
                                <a class="read" href="post.blade.php">
                                    ادامه مطلب
                                </a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="business-bottom-content">
                                <div class="col-md-6 business-bottom">
                                    <div class="col-md-3 b-bottom-pic">
                                        <a href="post.blade.php"><img class="img-responsive"
                                                src="{{ asset('front-theme-asset/motive/images/ti1.jpg') }}"
                                                alt="" /></a>
                                    </div>
                                    <div class="col-md-9 b-bottom-text">
                                        <h5><a href="post.blade.php">
                                                اکنون زمان برای تغییر کار است
                                            </a></h5>
                                        <h6><i class="glyphicon glyphicon-time"></i>Jun 25, 2015</h6>
                                        <div class="icons"><a href="#"><i
                                                    class="glyphicon glyphicon-user"></i>ادمین</a><a href="#"><i
                                                    class="glyphicon glyphicon-comment"></i>2</a><a href="#"><i
                                                    class="glyphicon glyphicon-thumbs-up"></i>152</a><a
                                                href="#"><i class="glyphicon glyphicon-thumbs-down"></i> 26</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--//business-->
                    <!--//latest-articles-->
                    <!--RTL & Persian LNG & Publicer By Www.20script.ir-->
                    <div class="latest-articles">
                        <h3 class="tittle"><i class="glyphicon glyphicon-file"></i>آخرین مقالات</h3>
                        <div class="world-news-grids">
                            @if ($postModel->getPosts($accountId, $projectId, 'article'))
                                @foreach ($postModel->getPosts($accountId, $projectId, 'article') as $article)
                                    <div class="world-news-grid">
                                        <img src="{{ asset('front-theme-asset/motive/images/a1.jpg') }}"
                                            alt="" />
                                        <a href="post.blade.php" class="wd">{{ $article->title }}</a>
                                        <p>{{ $article->abstract }}</p>
                                        <a class="read" href="post.blade.php">ادامه مطلب</a>
                                    </div>
                                @endforeach
                            @endif
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!--//articles-->
                </div>


                @include('front.theme.motive.sidebar')


                <div class="clearfix"></div>
            </div>
            <!--//end-mag-inner-->




            <div class="mag-bottom">
                <h3 class="tittle bottom">
                    <i class="glyphicon glyphicon-globe"></i>
                    {{ $settingModel->getSetting('blog_title', $accountId, $projectId) }}
                </h3>
                <div class="grid">
                    @php
                        $blogs = $postModel->getPosts('blog', $accountId, $projectId);
                    @endphp
                    @if ($blogs->count() > 0)
                        @foreach($blogs as $blog)
                            @php
                                $permalink = $postModel->getPostPermalink('blogs', $slug, $blog->id);
                            @endphp
                            <div class="col-md-4 m-b">
                                <figure class="effect-layla">
                                    <a href="{{ $permalink }}">
                                        <img src="{{ asset('front-theme-asset/motive/images/pic3.jpg') }}"
                                            alt="{{ $blog->title }}" title="{{ $blog->title }}" />
                                    </a>
                                    <figcaption><h4>{{ $blog->title }}</h4></figcaption>
                                </figure>
                                <div class="m-b-text">
                                    <a href="{{ $permalink }}" class="wd">{{ $blog->title }}</a>
                                    <p>{{ $blog->abstract }}</p>
                                    <a class="read" href="{{ $permalink }} }}">ادامه مطلب</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="clearfix"></div>
                </div>
            </div>
            <!--//mag-bottom-->
        </div>
    </div>

    @include('front.theme.motive.footer')
