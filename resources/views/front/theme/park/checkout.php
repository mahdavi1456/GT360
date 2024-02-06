<?php

use public_html\class\website_shop_cart;
use public_html\class\website_shop_checkout;

$cart = new website_shop_cart();
$checkout = new website_shop_checkout();
$a_id = $_SESSION['a_id'];
?>
<div class="container-fluid mt-5">
	<div class="row mb-5">
		<input hidden id="a_id" value="<?php echo $opt->get_a_id(); ?>">
		<div class="col-12 reserveBox">
			<div id="cnt_checkout_form">
				<h3>تسویه حساب</h3>
				<?php $checkout->load_checkout_form($a_id); ?>
			</div>
		</div>
	</div>
</div>
<?php
$user_mobile = "";
if(isset($_COOKIE['user_mobile'])) {
	$user_mobile = $_COOKIE['user_mobile'];
}
?>
<input type="hidden" id="user_mobile" value="<?php echo $user_mobile; ?>">
