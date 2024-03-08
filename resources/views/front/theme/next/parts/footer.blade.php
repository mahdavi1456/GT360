
<!-- footer -->
<footer class="footer_style_2">
    <div class="container-fuild">
        <div class="row">
            <div class="map_section">
                <div id="map"></div>
            </div>
            <div class="footer_blog">
                <div class="row">
                    <div class="col-md-6">
                        <div class="main-heading left_text">
                            <h2>موضوع بعدی</h2>
                        </div>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                            چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>
                        <ul class="social_icons">
                            <li class="social-icon fb"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            </li>
                            <li class="social-icon tw"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </li>
                            <li class="social-icon gp"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="main-heading left_text">
                            <h2>پیوندهای اضافی</h2>
                        </div>
                        <ul class="footer-menu">
                            <li><a href="it_about.html"><i class="fa fa-angle-left"></i> درباره ما</a></li>
                            <li><a href="it_term_condition.html"><i class="fa fa-angle-left"></i> شرایط و ضوابط</a></li>
                            <li><a href="it_privacy_policy.html"><i class="fa fa-angle-left"></i> سیاست حفظ حریم
                                    خصوصی</a></li>
                            <li><a href="it_news.html"><i class="fa fa-angle-left"></i> اخبار</a></li>
                            <li><a href="it_contact.html"><i class="fa fa-angle-left"></i> با ما تماس بگیرید</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="main-heading left_text">
                            <h2>خدمات</h2>
                        </div>
                        <ul class="footer-menu">
                            <li><a href="it_data_recovery.html"><i class="fa fa-angle-left"></i> بازیابی اطلاعات</a>
                            </li>
                            <li><a href="it_computer_repair.html"><i class="fa fa-angle-left"></i> تعمیر رایانه</a></li>
                            <li><a href="it_mobile_service.html"><i class="fa fa-angle-left"></i> سرویس موبایل</a></li>
                            <li><a href="it_network_solution.html"><i class="fa fa-angle-left"></i> راه حل های شبکه</a>
                            </li>
                            <li><a href="it_techn_support.html"><i class="fa fa-angle-left"></i> پشتیبانی فنی</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="main-heading left_text">
                            <h2>با ما تماس بگیرید</h2>
                        </div>
                        <p>123 خیابان دوم خیابان پنجم ،<br>
                            منهتن ، نیویورک<br>
                            <span style="font-size:18px;"><a href="tel:+9876543210">+987 654 3210</a></span></p>
                        <div class="footer_mail-section">
                            <form>
                                <fieldset>
                                    <div class="field">
                                        <input placeholder="ایمیل" type="text">
                                        <button class="button_custom"><i class="fa fa-envelope" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cprt">
                <p>© کپی رایت 2019 طراحی توسط html.design</p>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
<!-- js section -->
<script src="{{ asset('front-theme-asset/next/') }} js/jquery.min.js"></script>
<script src="{{ asset('front-theme-asset/next/') }} js/bootstrap.min.js"></script>
<!-- menu js -->
<script src="{{ asset('front-theme-asset/next/') }} js/menumaker.js"></script>
<!-- wow animation -->
<script src="{{ asset('front-theme-asset/next/') }}js/wow.js"></script>
<!-- custom js -->
<script src="{{ asset('front-theme-asset/next/') }}js/custom.js"></script>
<!-- revolution js files -->
<script src="{{ asset('front-theme-asset/next/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('front-theme-asset/next/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('front-theme-asset/next/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('front-theme-asset/next/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('front-theme-asset/next/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('front-theme-asset/next/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('front-theme-asset/next/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('front-theme-asset/next/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('front-theme-asset/next/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('front-theme-asset/next/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('front-theme-asset/next/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
<!-- map js -->
<script>
    // This example adds a marker to indicate the position of Bondi Beach in Sydney,
    // Australia.
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 11,
            center: {lat: 40.645037, lng: -73.880224},
            styles: [
                {
                    elementType: 'geometry',
                    stylers: [{color: '#fefefe'}]
                },
                {
                    elementType: 'labels.icon',
                    stylers: [{visibility: 'off'}]
                },
                {
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#616161'}]
                },
                {
                    elementType: 'labels.text.stroke',
                    stylers: [{color: '#f5f5f5'}]
                },
                {
                    featureType: 'administrative.land_parcel',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#bdbdbd'}]
                },
                {
                    featureType: 'poi',
                    elementType: 'geometry',
                    stylers: [{color: '#eeeeee'}]
                },
                {
                    featureType: 'poi',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#757575'}]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'geometry',
                    stylers: [{color: '#e5e5e5'}]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#9e9e9e'}]
                },
                {
                    featureType: 'road',
                    elementType: 'geometry',
                    stylers: [{color: '#eee'}]
                },
                {
                    featureType: 'road.arterial',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#3d3523'}]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'geometry',
                    stylers: [{color: '#eee'}]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#616161'}]
                },
                {
                    featureType: 'road.local',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#9e9e9e'}]
                },
                {
                    featureType: 'transit.line',
                    elementType: 'geometry',
                    stylers: [{color: '#e5e5e5'}]
                },
                {
                    featureType: 'transit.station',
                    elementType: 'geometry',
                    stylers: [{color: '#000'}]
                },
                {
                    featureType: 'water',
                    elementType: 'geometry',
                    stylers: [{color: '#c8d7d4'}]
                },
                {
                    featureType: 'water',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#b1a481'}]
                }
            ]
        });

        var image = 'images/it_service/location_icon_map_cont.png';
        var beachMarker = new google.maps.Marker({
            position: {lat: 40.645037, lng: -73.880224},
            map: map,
            icon: image
        });
    }
</script>
<!-- google map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
<!-- end google map js -->
</body>
</html>
