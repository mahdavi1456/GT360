<?php

use public_html\class\sms;
use public_html\class\user;

require_once("../class/jdf.php");
require_once("../class/db.php");
require_once("../class/prime.php");
require_once("../class/option.php");
require_once("../class/gdate.php");
//require_once("../class/reserve.php");
require_once("../class/sms.php");
require_once("../class/user.php");
require_once("../class/setting.php");

if(isset($_POST['send_otp'])) {
	$user = new user();
	$sms = new sms();

	$mobile = $_POST['mobile'];
	$code = $user->generate_otp(3);
	$user->save_otp($code, $mobile);

	$sms->send_verification_mobile_code($code, "levelup", $mobile);
	exit;
}

if(isset($_POST['confirm_otp'])) {
	$user = new user();

	$mobile = $_POST['mobile'];
	$code = $_POST['code'];
	$a = $user->confirm_otp($mobile, $code);
	if($a == "success_auth") {

		$_SESSION['is_auth'] = "success";

		setcookie('is_auth', 'yes', time() + (86400 * 30), "/"); // 86400 = 1 day
		setcookie('user_mobile', $mobile , time() + (86400 * 30), "/"); // 86400 = 1 day
	}
	echo $a;
	exit;
}
