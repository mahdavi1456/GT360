<!DOCTYPE html>
<html dir="rtl">
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="_token" content="{{ csrf_token() }}">
	<title></title>
	<link rel="stylesheet" type="text/css" href="v1/css/style.css">
	<script type="text/javascript" src="v1/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="v1/js/jquery-3.6.3.js"></script>
	<script type="text/javascript" src="v1/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="v1/js/script.js"></script>
	<script type="text/javascript" src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
</head>
	<body>
		<div id="first-cover" style="background: url(v1/images/banner-2.jpg);">
			<div class="container">
				<header id="top-header">
					<div class="row">
						<div class="col-4">
							<img src="v1/images/logo.png" style="width: 200px;" class="img-fluid">
						</div>
						<div class="col-8">
							<a href="" class="btn btn-success">پروفایل</a>
						</div>
					</div>
				</header>
			</div>
			<div class="container">
				<div class="row">
					<div id="category-list">
					<ul>
						<li>
							<a href="/">همه</a>
						</li>
						@foreach ($categories as $category)
							<li onclick="document.getElementById('cat-form-{{ $category->id }}').submit()">{{ $category->cname }}</li>
						@endforeach
					</ul>
					@foreach ($categories as $category)
						<form action="" id="cat-form-{{ $category->id }}">
							<input type="hidden" name="category" value="{{ $category->id }}">
						</form>
					@endforeach
					</div>
				</div>
			</div>
		</div>

		<section id="products">
			<div class="container">
				<div class="row">
					@if ($products->count() > 0)
						@foreach ($products as $product)
						<article class="col-3">
							<img src="{{ $product->primaryImage() ? asset($product->primaryImage()) : asset('images/no-img.jpg') }}" class="img-fluid">
							<h2>{{ $product->product_name }}</h2>
							<span>{{ fa_number(number_format($product->sales_price)) }}</span>
							<button class="btn btn-success" onclick="addToCart(664646)">+</button>
						</article>
						@endforeach
					@else
						<article class="col-12">
							متاسفانه محصولی یافت نشد.
						</article>
					@endif
					<!-- <article class="col-3">
						<img src="v1/images/products/1.png" class="img-fluid">
						<h2>سس مایونز مهرام</h2>
						<span>250.000</span>
						<button class="btn btn-success">+</button>
					</article>
					<article class="col-3">
						<img src="v1/images/products/1.png" class="img-fluid">
						<h2>سس مایونز مهرام</h2>
						<span>250.000</span>
						<button class="btn btn-success">+</button>
					</article>
					<article class="col-3">
						<img src="v1/images/products/1.png" class="img-fluid">
						<h2>سس مایونز مهرام</h2>
						<span>250.000</span>
						<button class="btn btn-success">+</button>
					</article>
					<article class="col-3">
						<img src="v1/images/products/1.png" class="img-fluid">
						<h2>سس مایونز مهرام</h2>
						<span>250.000</span>
						<button class="btn btn-success">+</button>
					</article>
					<article class="col-3">
						<img src="v1/images/products/1.png" class="img-fluid">
						<h2>سس مایونز مهرام</h2>
						<span>250.000</span>
						<button class="btn btn-success">+</button>
					</article>
					<article class="col-3">
						<img src="v1/images/products/1.png" class="img-fluid">
						<h2>سس مایونز مهرام</h2>
						<span>250.000</span>
						<button class="btn btn-success">+</button>
					</article>
					<article class="col-3">
						<img src="v1/images/products/1.png" class="img-fluid">
						<h2>سس مایونز مهرام</h2>
						<span>250.000</span>
						<button class="btn btn-success">+</button>
					</article>
					<article class="col-3">
						<img src="v1/images/products/1.png" class="img-fluid">
						<h2>سس مایونز مهرام</h2>
						<span>250.000</span>
						<button class="btn btn-success">+</button>
					</article> -->
				</div>
			</div>
		</section>
		<footer>
			<h6>ساخته شده با عشق در گراتک</h6>
		</footer>
	</body>
</html>
