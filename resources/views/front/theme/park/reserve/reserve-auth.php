<?php use public_html\class\db;
use public_html\class\option;
use public_html\class\website_payment;
use public_html\class\website_reserve;

$month = jdate('m');  $opt = new option(); ?>
<div class="container-fluid mt-5">
	<div class="row mb-5 reserveBox d-flex flex-column justify-content-center align-items-center">
		<form method="post" class="sansform col-6 d-flex flex-column">
			<label class="text-center">کد اعتبارسنجی را وارد کنید <span>*</span></label>
			<input hidden name="record_id" value="<?php echo $_GET['record_id'];?>">
			<input name="auth_code" class="form-control">
			<button type="submit" name="pay-reserve" id="pay-reserve" class="mt-2">تایید و پرداخت</button>
		</form>
		<div class="col-6 d-flex flex-column px-1">
			<button data-type="login" class="btn btn-danger btn-block btn-flat resend-code" disabled style="font-size:0.9rem;" data-a_id="<?php echo $opt->get_a_id(); ?>" data-id="<?php echo $_GET['record_id'];?>">ارسال مجدد کد اعتبارسنجی</button>
			<div class="d-flex justify-content-center mt-2"><span class="login-timer" style="color: #999999;"></span></div>
			<?php
			if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pay-reserve'])) {
				$db = new db();
				$opt = new option();
				$reserve = new website_reserve();
				$pm = new website_payment();

				$auth_code = $_POST['auth_code'];
				$record_id = $_POST['record_id'];
				$a_id = $opt->get_a_id();
				$code = $db->get_var_query("select ro_auth_code from reserve_order where ID = $record_id");
				$ro_count = $db->get_var_query("select ro_count from reserve_order where ID = $record_id");
				if ($auth_code == $code) {
					//$reserve_price = $opt->get_global_option('reserve_price');
					$reserve_price = $db->get_var_query("select rs_price from reserve_order where ID = $record_id") * $ro_count;
					$pm->payment_request($reserve_price, $a_id, $record_id, "reserve");
				} else {
					echo "<div class='alert alert-danger w-100 mx-3'>کد اعتبارسنجی نامعتبر است.</div>";
				}
			}
			?>
		</div>
	</div>
</div>
<script type="text/javascript" src="<? echo $opt->get_root_url() . "js/website-reserve.js"; ?>"></script>
