<?php

use public_html\class\website_shop_cart;

$cart = new website_shop_cart();
$a_id = $_SESSION['a_id'];
//var_dump($a_id);
?>
<div class="container-fluid mt-5">
    <div class="row mb-5">
        <input hidden id="a_id" value="<?php echo $opt->get_a_id(); ?>">
        <div class="col-12 reserveBox">
			<h3>سبد خرید</h3>
			<div id="cnt_table_cart" class="table-responsive">
				<?php $cart->load_cart($a_id); ?>
			</div>
			<div class="col-12 text-left">
				<a href="?page=checkout.php" class="btn btn-info">تسویه حساب</a>
			</div>
        </div>
    </div>
</div>
<?php
$user_mobile = '';
if(isset($_COOKIE['user_mobile'])) {
	$user_mobile = $_COOKIE['user_mobile'];
}
?>
<input type="hidden" id="user_mobile" value="<?php echo $user_mobile; ?>">
