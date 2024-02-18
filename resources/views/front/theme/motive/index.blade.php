@include('front.theme.motive.header')

<body>

    <div class="header" id="home">
        <div class="content white">
            @include('front.theme.motive.nav')
        </div>
    </div>

    <div class="banner">
        <div class="container">
            <div class="banner-inner">
                <div class="callbacks_container">
                    <ul class="rslides callbacks callbacks1" id="slider4">
                        @php
                            $text_sliders = $postModel->getPosts('text_slider', $accountId, $projectId);
                        @endphp
                        @if ($text_sliders)
                            @foreach ($text_sliders as $text_slider)
                                <li class="callbacks1_on"
                                    style="display: block; float: right; position: relative; opacity: 1; z-index: 2; transition: opacity 500ms ease-in-out;">
                                    <div class="banner-info">
                                        <h3>{{ $text_slider->title }}</h3>
                                        <p>{!! $text_slider->abstract !!}</p>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>

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

    <!--/start-main-->

    <div class="main-content">
        <div class="container">
            <div class="mag-inner">
                <div class="col-md-8 mag-innert-right">

                    @if($settingModel->getSetting('event_status', $accountId, $projectId) == 1)
                        <div class="technology">
                            <h2 class="tittle"><i class="glyphicon glyphicon-certificate"></i> {{ $settingModel->getSetting('event_title', $accountId, $projectId) }}</h2>
                            <div class="col-md-6 tech-img">
                                <img src="{{ asset(ert('tsp') . $settingModel->getSetting('event-image', $accountId, $projectId)) }}"
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
                                                $permalink = $postModel->getPostPermalink('event', $slug, $event->id);
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
                    @endif


                    @if($settingModel->getSetting('gallery_status', $accountId, $projectId) == 1)
                        <div class="gallery">
                            <div class="main-title-head">
                                <h3 class="tittle"><i class="glyphicon glyphicon-picture"></i> {{ $settingModel->getSetting('gallery_title', $accountId, $projectId) }}</h3>
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
                    @endif




                    @if ($settingModel->getSetting('article_status', $accountId, $projectId) == 1)
                        <div class="latest-articles">
                            <h3 class="tittle"><i class="glyphicon glyphicon-file"></i> {{ $settingModel->getSetting('article_title', $accountId, $projectId) }}</h3>
                            <div class="world-news-grids">
                                @php
                                    $articles = $postModel->getPosts('article', $accountId, $projectId);
                                @endphp
                                @if ($articles)
                                    @foreach ($articles as $article)
                                        @php
                                            $permalink = $postModel->getPostPermalink('articles', $slug, $article->id);
                                        @endphp
                                        <div class="world-news-grid">
                                            <img src="{{ asset('front-theme-asset/motive/images/a1.jpg') }}"
                                                alt="" />
                                            <a href="post.blade.php" class="wd">{{ $article->title }}</a>
                                            {!! $article->abstract !!}
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
            <!--//end-mag-inner-->


            @if ($settingModel->getSetting('blog_status', $accountId, $projectId) == 1)
                <div class="mag-bottom">
                    <h3 class="tittle bottom">
                        <i class="glyphicon glyphicon-globe"></i> {{ $settingModel->getSetting('blog_title', $accountId, $projectId) }}
                    </h3>
                    <div class="grid">
                        @php
                            $blogs = $postModel->getPosts('blog', $accountId, $projectId);
                        @endphp
                        @if ($blogs)
                            @foreach($blogs as $blog)
                                @php
                                    $permalink = $postModel->getPostPermalink('blog', $slug, $blog->id);
                                @endphp
                                <div class="col-md-4 m-b">
                                    <figure class="effect-layla">
                                        <a href="{{ $permalink }}">
                                            @if ($blog->thumbnail)
                                                <img src="{{ asset(ert('thumb-path')) . '/' . $blog->thumbnail }}">
                                            @else
                                                <img src="{{ asset('front-theme-asset/motive/images/mg1.jpg') }}">
                                            @endif
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
            @endif

        </div>
    </div>

    @include('front.theme.motive.footer')
