<?php

use public_html\class\db;
use public_html\class\option;
use public_html\class\prime;
use public_html\class\sms;
use public_html\class\website_reserve;

session_start();
require_once("../class/jdf.php");
require_once("../class/db.php");
require_once("../class/setting.php");
require_once("../class/prime.php");
require_once("../class/option.php");
require_once("../class/gdate.php");
require_once("../class/sms.php");
require_once("../class/website-reserve.php");

if(isset($_POST['reserve_filter'])) {
    $wr = new website_reserve();

    $month = $_POST['month'];
    $day = $_POST['day'];
	$a_id = $_POST['a_id'];
    $wr->reserve_list($month, $day, $a_id);

    exit();
}

if(isset($_POST['reserve_step2'])) {
    $wr = new website_reserve();

	$a_id = $_POST['a_id'];
    $wr->reserve_step2($a_id);

    exit();
}

if(isset($_POST['save_reserve'])) {
	$db = new db();
	$opt = new option();
	$sms = new sms();
	$pr = new prime();

	$list = $_POST['list'];
	parse_str($list, $new);
	$id = $new['plan_id'];
	$reserve_plan = $db->get_select_query("select * from reserve_plan where ID = $id");

	$rp_count = $reserve_plan[0]['rp_count'];
	$ro_date = $reserve_plan[0]['rp_date'];
	$rs_name = $reserve_plan[0]['rs_name'];
	$rs_details = $reserve_plan[0]['rs_details'];
	$rs_price = $reserve_plan[0]['rs_price'];
	$a_id = $_POST['a_id'];
	$ro_name = $new['ro_name'];
	$ro_count = $new['ro_count'];
	$ro_mobile = $pr->eng_number($new['ro_mobile']);
	$ro_create = date('Y-m-d H:i');
	$reserved_count = $db->get_var_query("select sum(ro_count) from reserve_order where rs_details = '$rs_details' and ro_date = '$ro_date' and a_id = $a_id and ro_status = 1");

	if($reserved_count + $ro_count <= $rp_count) {
		$ro_auth_code = rand(1000, 9999);
		$sql = "insert into reserve_order(ro_date, rs_name, rs_details, rs_price, a_id, ro_name, ro_count, ro_mobile, ro_create, ro_status, ro_auth_code) ";
		$sql .= "values('$ro_date', '$rs_name', '$rs_details', $rs_price, $a_id, '$ro_name', $ro_count, '$ro_mobile', '$ro_create', 0, '$ro_auth_code')";
		$record_id = $db->ex_query($sql);

		$account_name = $db->get_var_query("select a_center from account where a_id = $a_id");
		$sms->send_verification_mobile_code($ro_auth_code, $account_name, $ro_mobile);

		$slug = $db->get_var_query("select a_slug from account where a_id = $a_id");
		echo  $opt->root_url() . $slug . "?page=reserve-auth.php&record_id=" . $record_id;
	} else {
		echo "error";
	}
    exit();
}

if(isset($_POST['resend_code'])) {
	$db = new db();
	$sms = new sms();
	$pr = new prime();

	$ro_auth_code = rand(1000, 9999);
	$id = $_POST['id'];
	$a_id = $_POST['a_id'];
	$sql = "update reserve_order set ro_auth_code = '$ro_auth_code' where id = $id";
	$db->ex_query($sql);

	$ro_mobile = $pr->eng_number($db->get_var_query("select ro_mobile from reserve_order where id = $id"));
	$account_name = $db->get_var_query("select a_center from account where a_id = $a_id");
	$sms->send_sms_mobile_authentication($ro_auth_code, $account_name, $ro_mobile);

    exit();
}
