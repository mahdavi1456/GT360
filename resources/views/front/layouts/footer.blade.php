    <footer>
		<h6>ساخته شده با عشق در گراتک</h6>
	</footer>

    <script type="text/javascript" src="{{ asset('v1/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('v1/js/jquery-3.6.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('v1/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <script type="text/javascript" src="{{ asset('v1/js/script.js') }}"></script>

    <!-- bootstrap touchspin -->
    <script src="{{ asset('asset/plugins/bootstrap-touchspin-master/jquery.bootstrap-touchspin.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.touchspin').TouchSpin({
                buttondown_class: 'btn',
                buttonup_class: 'btn',
                initval: 1,
                min: 1,
            });

            $('.owl-carousel').owlCarousel({
                items: 3,
                rtl: true,
                nav: true,
                loop: true,
                center: true,
                margin: 10,
                autoplay: true,
		        responsiveClass:true,
                responsive:{
                    0: {
                        items:1
                    },
                    480: {
                        items:1
                    },
                    768:{
                        items:2
                    },
                    1200:{
                        items:4
                    }
                }
            });
        });
    </script>