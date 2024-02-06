<?php

use public_html\class\db;
use public_html\class\digital_menu;
use public_html\class\factor;
use public_html\class\product;
use public_html\class\website_payment;

session_start();
require_once("../class/db.php");
require_once("../class/person.php");
require_once("../class/prime.php");
require_once("../class/option.php");
require_once("../class/gdate.php");
require_once("../class/product.php");
require_once("../class/website-payment.php");
require_once("../class/digital-menu.php");
require_once("../class/factor.php");
require_once("../class/account.php");
require_once("../class/zarinpal.php");

if(isset($_POST['filter_by_cat_id'])) {
	$dm = new digital_menu();

	$cat_id = $_POST['id'];
	$a_id = $_POST['aid'];

	$dm->product_list($a_id, $cat_id);

	exit();
}

if(isset($_POST['add_to_cart'])) {
	$db = new db();
	$dm = new digital_menu();
	$pr = new product();

	$pr_id = $_POST['id'];
	$a_id = $_POST['a_id'];
	$mobile = $_POST['mobile'];

    $pr_price = $pr->get_account_product_price($a_id, $pr_id);

	$res_check = $dm->get_products_on_digitial_menu_cart($a_id, $pr_id, $mobile);

	if(count($res_check) > 0) {
		$cart_id = $res_check[0]['cart_id'];
		$pr_count = $res_check[0]['pr_count'];
		$new_pr_count = $pr_count + 1;
		$dm->update_digital_menu_cart($cart_id, $new_pr_count);
	} else {
		$pr_count = 1;
		$dm->add_product_to_digital_menu_cart($a_id, $pr_id, $pr_price, $pr_count, $mobile);
	}

	$dm->load_cart($a_id, $mobile);

	exit();
}

if(isset($_POST['decrese_product_to_cart'])) {
	$db = new db();
	$dm = new digital_menu();
	$pr = new product();

    $pr_id = $_POST['id'];
	$a_id = $_POST['a_id'];
	$mobile = $_POST['mobile'];

    $pr_price = $pr->get_account_product_price($a_id, $pr_id);

	$res_check = $dm->get_products_on_digitial_menu_cart($a_id, $pr_id, $mobile);

	if (count($res_check) > 0) {
		$cart_id = $res_check[0]['cart_id'];
		$pr_count = $res_check[0]['pr_count'];
		$new_pr_count = ($pr_count - 1) > 0 ? ($pr_count - 1) : 1;
		if ($pr_count == 1) {
			$dm->remove_from_digital_menu_cart($cart_id);
		} else {
			$dm->update_digital_menu_cart($cart_id, $new_pr_count);
		}
	} else {
		$pr_count = 1;
		$dm->add_product_to_digital_menu_cart($a_id, $pr_id, $pr_price, $pr_count, $mobile);
	}

	$dm->load_cart($a_id, $mobile);

	exit();
}

if(isset($_POST['getTotalCount'])) {
	$dm = new digital_menu();

	$a_id = $_POST['a_id'];
	$mobile = $_POST['mobile'];

	echo $dm->getTotalCount($a_id, $mobile);

	exit();
}


if(isset($_POST['remove_from_cart'])) {
	$db = new db();
	$dm = new digital_menu();

	$id = $_POST['id'];
	$a_id = $_POST['a_id'];
	$mobile = $_POST['mobile'];

	$dm->remove_from_digital_menu_cart($id);

	$dm->load_cart($a_id, $mobile);

	exit();
}

if(isset($_POST['checkout_digital_menu'])) {
	$db = new db();
	$pa = new website_payment();
	$pro = new product();
	$fa = new factor();
	$dm = new digital_menu();

	$a_id = $_POST['a_id'];
	$mobile = $_POST['mobile'];

	$fh_date = date('Y-m-d H:i:s');

	$fh_id = $fa->new_factor_head($a_id, $mobile);

	$user_id = 0;
	$person_id = 0;
	$person_fullname = "";

	$sql_get_person = "select * from person where p_mobile = '$mobile' ";
	$res_person = $db->get_select_query($sql_get_person, $a_id);
	if(count($res_person) > 0) {
		$person_id = $res_person[0]['p_id'];
		$person_fullname = $res_person[0]['p_name'] . ' ' . $res_person[0]['p_family'];
	}

	$res_cart = $dm->get_digitial_menu_cart_items($a_id, $mobile);
	$sum = 0;
	if(count($res_cart) > 0) {
		foreach($res_cart as $rc) {
			$pr_id = $rc['pr_id'];
			$pr_price = $rc['pr_price'];
			$pr_count = $rc['pr_count'];
			$pr_name = $pro->get_account_product_name($a_id, $rc['pr_id']);
			$sum += $pr_price * $pr_count;

			$fa->new_factor_body($a_id, $fh_id, $pr_id, $pr_name, $pr_count, $pr_price);
		}
	}
	$pa->payment_request($sum, $a_id, $fh_id, "digital-menu");

	exit();
}
