<?php

use public_html\class\option;
use public_html\class\user;

$opt = new option();
$a_id = $opt->get_a_id();
$user = new user();
?>
<style type="text/css">
	#heli_loading {
		visibility: hidden;
	}
</style>
<div class="container-fluid mt-5">
	<div class="row mb-5">
		<input hidden id="a-id" value="<?php echo $a_id; ?>">
		<div class="col-12 reserveBox">
            <div class="form-group">
                <label>شماره موبایل</label>
                <input type="text" class="form-control" id="user-mobile-number" placeholder="شماره موبایل...">
            </div>
            <div class="form-group" id="confirm-otp-input-wrap" style="display: none">
                <label>کد ورود</label>
                <input class="form-control" id="confirm-otp-input">
            </div>
            <div>
                <button class="btn btn-success" id="send-login-otp">ارسال کد</button>
                <button class="btn btn-primary" id="confirm-otp-btn" style="display: none">تایید کد</button>
				<i class="fa fa-cog fa-spin" id="heli_loading"></i>
            </div>
		</div>
	</div>
</div>
