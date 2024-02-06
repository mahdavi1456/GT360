<?php

use public_html\class\db;
use public_html\class\prime;
use public_html\class\website_shop_cart;

ob_start();
session_start();
require_once("../class/jdf.php");
require_once("../class/db.php");
require_once("../class/prime.php");
require_once("../class/option.php");
require_once("../class/gdate.php");
require_once("../class/sms.php");
require_once("../class/website-reserve.php");
require_once("../class/website-shop-cart.php");
require_once("../class/website-shop-product.php");

if(isset($_POST['add_cart'])) {
	$db = new db();

	$product_id = $_POST['product_id'];
	$product_price = $_POST['product_price'];
	$a_id = $_POST['a_id'];
	$mobile = $_POST['mobile'];

	$wsc = new website_shop_cart();
	$check_enough_stock = $wsc->check_enough_stock($product_id,0 , $mobile, $a_id);

	if(!$check_enough_stock) {
		echo "not_stock";
		exit;
	}

	$sql_exist_cart_header = "select * from website_shop_cart_header where a_id = $a_id and mobile = '$mobile' and cart_status = 0";
	$res_cart_header = $db->get_select_query($sql_exist_cart_header);

	if(count($res_cart_header) > 0) {
		$cart_id = $res_cart_header[0]['id'];

		$sql_check_exist_product = "select * from website_shop_cart_body where cart_id = $cart_id and product_id = $product_id";
		$res_exist_product = $db->get_select_query($sql_check_exist_product);

		if(count($res_exist_product)) {
			$sql_update_cart_body = "update website_shop_cart_body set count = count + 1 where cart_id = $cart_id and product_id = $product_id";
			$db->ex_query($sql_update_cart_body);
		} else {
			$sql = "insert into website_shop_cart_body(product_id, cart_id, count, price) values($product_id, $cart_id, 1, $product_price)";
			$db->ex_query($sql);
		}
	} else {
		$datetime = date('Y-m-d H:i:s');
		$sql = "insert into website_shop_cart_header(a_id, mobile, datetime, cart_status) values($a_id, '$mobile', '$datetime', 0)";
		$cart_id = $db->ex_query($sql);

		$sql = "insert into website_shop_cart_body(product_id, cart_id, count, price) values($product_id, $cart_id, 1, $product_price)";
		$db->ex_query($sql);
	}
	exit;
}

if(isset($_POST['remove_cart'])) {
	$cart = new website_shop_cart();
	$db = new db();

	$product_id = $_POST['product_id'];
	$a_id = $_POST['a_id'];
	$mobile = $_POST['mobile'];

	$sql_exist_cart_header = "select * from website_shop_cart_header where a_id = $a_id and mobile = '$mobile' and cart_status = 0";
	$res_cart_header = $db->get_select_query($sql_exist_cart_header);

	if(count($res_cart_header) > 0) {
		$cart_id = $res_cart_header[0]['id'];
		$sql_remove_cart_body = "delete from website_shop_cart_body where cart_id = $cart_id and product_id = $product_id";
		$db->ex_query($sql_remove_cart_body);
	}
	$cart->load_cart($a_id);
	exit;
}

if(isset($_POST['update_count_cart'])) {
	$cart = new website_shop_cart();
	$db = new db();

	$product_id = $_POST['product_id'];
	$a_id = $_POST['a_id'];
	$mobile = $_POST['mobile'];
	$count = $_POST['count'];

	$wsc = new website_shop_cart();
	$check_enough_stock = $wsc->check_enough_stock($product_id, $count, $mobile , $a_id);

	//var_dump($check_enough_stock);
	//exit;
	if(!$check_enough_stock){
		echo "not_stock";
		exit;
	}

	$sql_exist_cart_header = "select * from website_shop_cart_header where a_id = $a_id and mobile = '$mobile' and cart_status = 0";
	$res_cart_header = $db->get_select_query($sql_exist_cart_header);

	if(count($res_cart_header) > 0) {
		$cart_id = $res_cart_header[0]['id'];
		$sql_update_cart_body = "update website_shop_cart_body set count = $count where cart_id = $cart_id and product_id = $product_id";
		$db->ex_query($sql_update_cart_body);
	}
	$cart->load_cart($a_id);
	exit;
}

if(isset($_POST['quantity_cart_items'])) {
	$cart = new website_shop_cart();
	$pr = new prime();

	$a_id = $_POST['a_id'];
	$count_items = $cart->get_count_items($a_id);
	echo $pr->per_number($count_items);
}
