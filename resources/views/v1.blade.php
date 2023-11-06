<!DOCTYPE html>
<html dir="rtl">
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="_token" content="{{ csrf_token() }}">
	<title></title>
	<link rel="stylesheet" type="text/css" href="v1/css/style.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css">
	<script type="text/javascript" src="v1/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="v1/js/jquery-3.6.3.js"></script>
	<script type="text/javascript" src="v1/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="v1/js/script.js"></script>
	<script type="text/javascript" src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
</head>
	<body>
        <div id="loader">
            <div class="loader"></div>
        </div>
		<div id="first-cover" style="background: url(v1/images/banner-2.jpg);">
			<div class="container">
				<header id="top-header">
					<div class="row">
						<div class="col-4">
							<img src="v1/images/logo.png" style="width: 200px;" class="img-fluid">
						</div>
						<div class="col-8">
							<a href="" class="btn btn-success">پروفایل</a>
							<a href="{{ route('showCart') }}" class="btn btn-success"><i class="fa fa-shopping-cart"></i><span class="badge badge-danger" id="cartItemCount">{{ $cartItemCount }}</span></a>
						</div>
					</div>
				</header>
			</div>
		</div>

		<section id="products">
			<div class="container">
				<div class="row">
					@if ($accounts->count() > 0)
						@foreach ($accounts as $account)
						<article class="col-3">
							<a href="{{ route('slug.products', ['slug'=>$account->slug]) }}">
								<img src="{{ asset('images/no-img.jpg') }}" class="img-fluid">
								<h2>{{ $account->company }}</h2>
							</a>
						</article>
						@endforeach
					@else
						<article class="col-12">
							موردی جهت نمایش موجود نیست.
						</article>
					@endif
				</div>
			</div>
		</section>
		<footer>
			<h6>ساخته شده با عشق در <a href="https://gratech.ir/" target="_blank">گراتک</a></h6>
		</footer>
	</body>
</html>
