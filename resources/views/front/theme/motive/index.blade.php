@include('front.theme.motive.header')
<body>

    <div class="header" id="home">
        <div class="content white">
            @include('front.theme.motive.nav')
        </div>
    </div>

    @include('front.theme.motive.slider')

    <div class="main-content">
        <div class="container">
            <div class="mag-inner">
                <div class="col-md-8 mag-innert-right">
                    @if($settingModel->getSetting('section1_status', $accountId, $projectId) == 1)
                        <div class="technology">
                            <h2 class="tittle"><i class="glyphicon glyphicon-certificate"></i> {{ $settingModel->getSetting('section1_title', $accountId, $projectId) }}</h2>
                            <div class="col-md-6 tech-img">
                                <img src="{{ asset(ert('tsp') . $settingModel->getSetting('section1_image', $accountId, $projectId)) }}"
                                    class="img-responsive" alt="" />
                            </div>
                            <div class="col-md-6 tech-text">
                                <div class="editor-pics">
                                    @php
                                        $section1_component = $settingModel->getSetting('section1_component', $accountId, $projectId);
                                        $posts = $postModel->getPosts($section1_component, $accountId, $projectId);
                                    @endphp
                                    @if ($posts)
                                        @foreach ($posts as $post)
                                            @php
                                                $permalink = $postModel->getPostPermalink($section1_component, $slug, $post->id);
                                            @endphp
                                            <div class="col-md-3 item-pic">
                                                @if ($post->thumbnail)
                                                    <img src="{{ asset(ert('thumb-path')) . '/' . $post->thumbnail }}" class="img-responsive">
                                                @else
                                                    <img src="{{ asset('front-theme-asset/motive/images/mg1.jpg') }}"
                                                        class="img-responsive" alt="" />
                                                @endif
                                            </div>
                                            <div class="col-md-9 item-details">
                                                <h5 class="inner two">
                                                    <a href="{{ $permalink }}" class="wd">{{ $post->title }}</a>
                                                </h5>
                                                <p>{{ $post->abstract }}</p>
                                                <a href="{{ $permalink }}" class="read">ادامه مطلب</a>
                                                <div class="td-post-date two">{{ $postModel->getShamsiDate($post->created_at) }}</div>
                                                <div class="clearfix"></div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    @endif


                    @if($settingModel->getSetting('section2_status', $accountId, $projectId) == 1)
                        <div class="gallery">
                            <div class="main-title-head">
                                <h3 class="tittle"><i class="glyphicon glyphicon-picture"></i> {{ $settingModel->getSetting('section2_title', $accountId, $projectId) }}</h3>
                            </div>
                            <div class="gallery-images">
                                <div class="course_demo">
                                    <ul id="flexiselDemo">
                                        @php
                                            $section2_component = $settingModel->getSetting('section2_component', $accountId, $projectId);
                                            $posts = $postModel->getPosts($section2_component, $accountId, $projectId);
                                        @endphp
                                        @if ($posts)
                                            @foreach ($posts as $post)
                                                @php
                                                    $permalink = $postModel->getPostPermalink($section2_component, $slug, $post->id);
                                                @endphp
                                                <li>
                                                    <a href="{{ $permalink }}">
                                                        @if ($post->thumbnail)
                                                            <img src="{{ asset(ert('thumb-path')) . '/' . $post->thumbnail }}">
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
                    @endif





                    @if($settingModel->getSetting('section3_status', $accountId, $projectId) == 1)

                        @php
                            $section3_component = $settingModel->getSetting('section3_component', $accountId, $projectId);
                            $posts = $postModel->getPosts($section3_component, $accountId, $projectId);
                        @endphp

                        <div class="business">
                            <h3 class="tittle"><i class="glyphicon glyphicon-briefcase"></i> {{ $settingModel->getSetting('section3_title', $accountId, $projectId) }}</h3>
                            <div class="business-inner">

                                <div class="col-md-6 b-img"><a href="single.html"><img class="img-responsive" src="images/time.jpg" alt=""></a></div>
                                <div class="col-md-6 b-text">
                                    <h5><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ </a></h5>
                                    <h6><i class="glyphicon glyphicon-time"></i>Jun 25, 2015</h6> <div class="icons"><a href="#"><i class="glyphicon glyphicon-user"></i>ادمین</a><a href="#"><i class="glyphicon glyphicon-comment"></i>2</a><a href="#"><i class="glyphicon glyphicon-thumbs-up"></i>152</a><a href="#"><i class="glyphicon glyphicon-thumbs-down"></i> 26</a></div>
                                    <div class="clearfix"></div>
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد</p>
                                    <a class="read" href="single.html">
                                        ادامه مطلب
                                    </a>
                                </div>

                                <div class="clearfix"></div>
                                <div class="business-bottom-content">
                                    <div class="col-md-6 business-bottom">
                                        <div class="col-md-3 b-bottom-pic">
                                            <a href="single.html"><img class="img-responsive" src="images/ti1.jpg" alt=""></a>
                                        </div>
                                        <div class="col-md-9 b-bottom-text">
                                            <h5><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی </a></h5>
                                            <h6><i class="glyphicon glyphicon-time"></i>Jun 25, 2015</h6> <div class="icons"><a href="#"><i class="glyphicon glyphicon-user"></i>ادمین</a><a href="#"><i class="glyphicon glyphicon-comment"></i>2</a><a href="#"><i class="glyphicon glyphicon-thumbs-up"></i>152</a><a href="#"><i class="glyphicon glyphicon-thumbs-down"></i> 26</a></div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-md-6 business-bottom">
                                        <div class="col-md-3 b-bottom-pic">
                                            <a href="single.html"><img class="img-responsive" src="images/ti1.jpg" alt=""></a>
                                        </div>
                                        <div class="col-md-9 b-bottom-text">
                                            <h5><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی </a></h5>
                                            <h6><i class="glyphicon glyphicon-time"></i>Jun 25, 2015</h6> <div class="icons"><a href="#"><i class="glyphicon glyphicon-user"></i>ادمین</a><a href="#"><i class="glyphicon glyphicon-comment"></i>2</a><a href="#"><i class="glyphicon glyphicon-thumbs-up"></i>152</a><a href="#"><i class="glyphicon glyphicon-thumbs-down"></i> 26</a></div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="business-inner two">
                                <div class="col-md-6 b-img"><a href="single.html"><img class="img-responsive" src="images/time2.jpg" alt=""></a></div>
                                <div class="col-md-6 b-text">
                                    <h5><a href="single.html">لورم ایپسوم متن ساختگی با تولید سادگی </a></h5>
                                    <h6><i class="glyphicon glyphicon-time"></i>Jun 25, 2015</h6> <div class="icons"><a href="#"><i class="glyphicon glyphicon-user"></i>ادمین</a><a href="#"><i class="glyphicon glyphicon-comment"></i>2</a><a href="#"><i class="glyphicon glyphicon-thumbs-up"></i>152</a><a href="#"><i class="glyphicon glyphicon-thumbs-down"></i> 26</a></div>
                                    <div class="clearfix"></div>
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد</p>
                                    <a class="read" href="single.html">
                                        ادامه مطلب
                                    </a>
                                </div>
                                <div class="clearfix"></div>
                                <div class="business-bottom-content">
                                    <div class="col-md-6 business-bottom">
                                        <div class="col-md-3 b-bottom-pic">
                                            <a href="single.html"><img class="img-responsive" src="images/ti1.jpg" alt=""></a>
                                        </div>
                                        <div class="col-md-9 b-bottom-text">
                                            <h5><a href="single.html">
                                                    اکنون زمان برای تغییر کار است
                                                </a></h5>
                                            <h6><i class="glyphicon glyphicon-time"></i>Jun 25, 2015</h6> <div class="icons"><a href="#"><i class="glyphicon glyphicon-user"></i>ادمین</a><a href="#"><i class="glyphicon glyphicon-comment"></i>2</a><a href="#"><i class="glyphicon glyphicon-thumbs-up"></i>152</a><a href="#"><i class="glyphicon glyphicon-thumbs-down"></i> 26</a></div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-md-6 business-bottom">
                                        <div class="col-md-3 b-bottom-pic">
                                            <a href="single.html"><img class="img-responsive" src="images/ti1.jpg" alt=""></a>
                                        </div>
                                        <div class="col-md-9 b-bottom-text">
                                            <h5><a href="single.html">
                                                    اکنون زمان برای تغییر کار است
                                                </a></h5>
                                            <h6><i class="glyphicon glyphicon-time"></i>Jun 25, 2015</h6> <div class="icons"><a href="#"><i class="glyphicon glyphicon-user"></i>ادمین</a><a href="#"><i class="glyphicon glyphicon-comment"></i>2</a><a href="#"><i class="glyphicon glyphicon-thumbs-up"></i>152</a><a href="#"><i class="glyphicon glyphicon-thumbs-down"></i> 26</a></div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    @endif


                    @if ($settingModel->getSetting('section4_status', $accountId, $projectId) == 1)
                        <div class="latest-articles">
                            <h3 class="tittle"><i class="glyphicon glyphicon-file"></i> {{ $settingModel->getSetting('section4_title', $accountId, $projectId) }}</h3>
                            <div class="world-news-grids">
                                @php
                                    $section4_component = $settingModel->getSetting('section4_component', $accountId, $projectId);
                                    $posts = $postModel->getPosts($section4_component, $accountId, $projectId);
                                @endphp
                                @if ($posts)
                                    @foreach ($posts as $post)
                                        @php
                                            $permalink = $postModel->getPostPermalink($section4_component, $slug, $post->id);
                                        @endphp
                                        <div class="world-news-grid">
                                            <img src="{{ asset('front-theme-asset/motive/images/a1.jpg') }}"
                                                alt="" />
                                            <a href="post.blade.php" class="wd">{{ $post->title }}</a>
                                            {!! $post->abstract !!}
                                            <a class="read" href="{{ $permalink }}">ادامه مطلب</a>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    @endif

                </div>


                @include('front.theme.motive.sidebar')


                <div class="clearfix"></div>
            </div>


            @if ($settingModel->getSetting('section5_status', $accountId, $projectId) == 1)
                <div class="mag-bottom">
                    <h3 class="tittle bottom">
                        <i class="glyphicon glyphicon-globe"></i> {{ $settingModel->getSetting('section5_title', $accountId, $projectId) }}
                    </h3>
                    <div class="grid">
                        @php
                            $section5_component = $settingModel->getSetting('section5_component', $accountId, $projectId);
                            $posts = $postModel->getPosts($section5_component, $accountId, $projectId);
                        @endphp
                        @if ($posts)
                            @foreach($posts as $post)
                                @php
                                    $permalink = $postModel->getPostPermalink($section5_component, $slug, $post->id);
                                @endphp
                                <div class="col-md-4 m-b">
                                    <figure class="effect-layla">
                                        <a href="{{ $permalink }}">
                                            @if ($post->thumbnail)
                                                <img src="{{ asset(ert('thumb-path')) . '/' . $post->thumbnail }}">
                                            @else
                                                <img src="{{ asset('front-theme-asset/motive/images/mg1.jpg') }}">
                                            @endif
                                        </a>
                                        <figcaption><h4>{{ $post->title }}</h4></figcaption>
                                    </figure>
                                    <div class="m-b-text">
                                        <a href="{{ $permalink }}" class="wd">{{ $post->title }}</a>
                                        {!! $post->abstract !!}
                                        <a class="read" href="{{ $permalink }}">ادامه مطلب</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="clearfix"></div>
                    </div>
                </div>
            @endif

        </div>
    </div>

    @include('front.theme.motive.footer')
