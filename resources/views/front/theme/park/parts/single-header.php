<?php

use public_html\class\db;
use public_html\class\prime;
use public_html\class\user;
use public_html\class\website_shop_cart;

$user = new user();
$cart = new website_shop_cart();
$pr = new prime();
?>
<header class="single-header">
	<div class="container-fluid">
		<div class="row">
			<div class="singleLogo col-lg-4 col-md-6 col-4">
				<?php
				$logo = $opt->get_option('website_logo');
				$logo = "https://heliapp.ir/gt-content/upload/" . $logo;
				if($logo == "") {
					$logo = "/images/helionlinelogo.png";
				}
				?>
				<h1><a href="<?php echo $opt->get_site_home($slug); ?>"><img class="img-fluid" id="logo" src="<?php echo $logo; ?>"></a></h1>
			</div>
			<div id="OpenNavBtnSingleHeader" class="d-lg-none col-4 text-center">
				<span class="mt-2 d-block">
					<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32"><path fill="none" d="M0 0h24v24H0z"/><path d="M3 4h18v2H3V4zm0 7h18v2H3v-2zm0 7h18v2H3v-2z"/></svg>
				</span>
			</div>
			<div class="singleNav col-lg-4 col-md-4 col-sm-12 co-xs-12">
				<nav>
					<ul>
						<?php
						$db = new db();
						$a_id = $opt->get_a_id();
						$pages = $db->get_select_query("select * from website_page where a_id = $a_id and p_show = 1 order by p_order asc");
						foreach($pages as $page) {
						    ?>
							<li><a href="?page=page.php&title=<?php echo $page['p_slug']; ?>"><?php echo $page['p_title']; ?></a></li>
						    <?php
                        } ?>
					</ul>
				</nav>
			</div>
			<div class="singleBtnHead col-4 text-left">
				<!-- <a href="?page=shop.php">فروشگاه</a>
				<a href="?page=reserve.php">رزرو آنلاین</a> -->
				<?php
                if(isset($_COOKIE['is_auth']) and !empty($_COOKIE['is_auth'])) {
				$quantity_cart = $cart->get_count_items($a_id);
				?>
					<a href='?page=cart.php'>
						<span>سبد خرید</span>
						<span id="heli_quantity_cart_items"><?php echo $pr->per_number($quantity_cart); ?></span>
					</a>
					<a href='?page=panel.php'><i class="fa fa-user"></i></a>
					<a class="btn_logout" href="?page=logout.php"><i class="fa fa-power-off"></i></a>
				    <?php
                } else { ?>
					<a href='?page=login.php'>ورود</a>
				    <?php
                } ?>
			</div>
		</div>
	</div>
</header>
