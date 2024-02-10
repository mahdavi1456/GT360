    <footer class="main-footer"><h6>ساخته شده با <i class="fa fa-heart"></i> در گراتک</h6></footer>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script type="text/javascript" src="{{ asset('front-theme-asset/park/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/park/js/video.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/park/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/park/js/aos.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/park/js/script.js?v=1.3') }}"></script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/park/js/persianDatepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/park/js/user.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/park/js/person.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/park/js/shop.js') }}"></script>
	<script type="text/javascript" src="{{ asset('front-theme-asset/park/js/website-reserve.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/park/js/website-shop-checkout.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/park/js/website-shop-cart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/park/js/shop_setting.js') }}"></script>

	<script type="text/css">
		function isValidDate(dateString) {
			var regEx = /^\d{4}-\d{2}-\d{2}$/;
			return dateString.match(regEx) != null;
		}

		$(document).ready(function() {
			let from_year = 1350;
			let end_year = 1450;

			let resticted_years = [];

			for (i = from_year; i < end_year; i++) {
				resticted_years.push(i)
			}

			$(".datepicker").persianDatepicker({
				selectableYears: resticted_years ,
				formatDate: "YYYY-0M-0D",
			});
		});
	</script>
	<div id="loading"><i class="fa fa-refresh fa-spin fa-4x"></i></div>
</body>
</html>
