<?php

use public_html\class\website_shop_setting;

$cart = new cart();
$shop_setting = new website_shop_setting();
$a_id = $_SESSION['a_id'];
?>
<div class="container-fluid mt-5">
    <div class="row mb-5">
        <input hidden id="a_id" value="<?php echo $opt->get_a_id(); ?>">
        <div class="col-12 reserveBox">
			<div id="cnt_transport_form">
				<?php $shop_setting->form_transport(); ?>
			</div>
			<div class="mt-5">
				<h4>روش های حمل و نقل</h4>
				<div id="cnt_transport_methods">
					<?php $shop_setting->load_transport($a_id); ?>
				</div>
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
<input type="hidden" value="<?php echo $user_mobile; ?>" id="user_mobile">
