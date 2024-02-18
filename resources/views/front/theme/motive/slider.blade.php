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
