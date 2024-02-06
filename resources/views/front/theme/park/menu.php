<?php use public_html\class\db;
use public_html\class\digital_menu;
use public_html\class\factor;
use public_html\class\option;

include "autoload.php"; $opt = new option(); ?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>منوی دیجیتال</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex">
    <link rel="stylesheet" type="text/css" href="<?php echo $opt->get_root_url(); ?>dist/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $opt->get_root_url(); ?>dist/css/menu.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $opt->get_root_url(); ?>dist/css/face.css">
</head>
<body>
	<?php
	$db = new db();
	$dm = new digital_menu();

	//$slug = explode('?', trim(str_replace('/', ' ', $_SERVER['REQUEST_URI'])))[0];
	$slug = "levelup";

	if($slug != "") {
        $a_id = $db->get_var_query("select a_id from account where a_slug = '$slug'");
        if($a_id) {
			if(isset($_GET['mobile'])) {
				//$pr = new prime();
				?>
				<section class="main">
					<nav id="side">
						<div class="logo"><img src="https://heliapp.ir/gt-content/asset/images/heli-logo.png" class="img-fluid mb-4"></div>
						<ul>
							<li class="filter-category-btn" data-id="0"><a href="#">همه</a></li>
							<?php
							$cats = $db->get_account_select_query("select * from product_category where cat_status = 2 or cat_status = 3", $a_id);
							if(count($cats) > 0) {
								foreach($cats as $cat) {
									?>
									<li class="filter-category-btn" data-id="<?php echo $cat['cat_id']; ?>"><a href="#"><?php echo $cat['cat_name']; ?></a></li>
									<?php
								}
							} ?>
						</ul>
					</nav>
					<div id="content">
						<div id="loader-bx"><div class="loader"></div></div>
						<div id="result" class="main-content">
							<?php $dm->product_list($a_id); ?>
						</div>
					</div>
					<aside id="cart">
						<div class="cart-title">
							<h4>سبد خرید</h4>
							<button class="close-cart-btn">بستن</button>
						</div>
						<div id="cart-result">
							<?php $dm->load_cart($a_id, $_GET['mobile']); ?>
							<?php $fa = new factor(); $fa->list_products_sms($a_id, 77); ?>
						</div>
					</aside>
				</section>
				<div class="mobile-btn-area">
					<div class="mobile-category-btn">
						<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M3 4h18v2H3V4zm0 7h18v2H3v-2zm0 7h18v2H3v-2z"/></svg>
						دسته بندی
					</div>
					<div class="mobile-cart-btn">
						<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M4 16V4H2V2h3a1 1 0 0 1 1 1v12h12.438l2-8H8V5h13.72a1 1 0 0 1 .97 1.243l-2.5 10a1 1 0 0 1-.97.757H5a1 1 0 0 1-1-1zm2 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm12 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>
						سبد خرید
						<span id="cart-total-count"><?php //echo $dm->getTotalCount($a_id, $_GET['mobile']) ?></span>
					</div>
				</div>
				<?php
			} else { ?>
				<div class="container-fluid mt-2">
					<div class="row">
						<div class="col-12 text-center">
							<form action="" method="get">
								<label>لطفا شماره موبایل خود را وارد کنید: <span class="text-danger">*</span></label>
								<input type="number" name="mobile" class="form-control" placeholder="موبایل شما..." oninvalid="this.setCustomValidity('لطفا شماره موبایل خود را وارد کنید')" oninput="setCustomValidity('')" required>
								<button type="submit" class="btn btn-success btn-lg w-100 mt-2">ثبت و مشاهده منو</button>
								<input type="hidden" name="id" value="<?php echo $a_id; ?>">
								<input type="hidden" name="page" value="menu">
							</form>
						</div>
						<div class="col-12 text-center">
							<a href="<?php echo $opt->get_root_url() . $slug; ?>" class="btn btn-info btn-lg w-100 mt-2">بازگشت به هلی پارک</a>
						</div>
					</div>
				</div>
				<?php
			}
		} else { ?>
			<div class="row">
				<div class="col-12">
					<div class="alert alert-danger text-center m-2">آدرس وارد شده نامعتبر است.</div>
				</div>
			</div>
			<?php
		}
	} else {
		$a_id = 0;
		?>
		<div class="alert alert-danger">پیوند نامعتبر است.</div>
		<?php
	}
	?>
	<script src="<?php echo $opt->get_root_url(); ?>dist/js/jquery-3.5.1.min.js"></script>
	<script src="<?php echo $opt->get_root_url(); ?>dist/js/digital-menu.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	<input type="hidden" id="back-url" value="https://levelupgc.com/back/">
	<input type="hidden" id="a-id" value="<?php echo $a_id; ?>">
	</body>
</html>
