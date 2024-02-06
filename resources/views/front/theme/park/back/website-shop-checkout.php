<?php

use public_html\class\db;
use public_html\class\website_payment;
use public_html\class\website_shop_checkout;

ob_start();
session_start();
require_once("../class/jdf.php");
require_once("../class/db.php");
require_once("../class/account.php");
require_once("../class/prime.php");
require_once("../class/option.php");
require_once("../class/gdate.php");
require_once("../class/sms.php");

require_once("../class/website-shop-cart.php");
require_once("../class/website-shop-product.php");
require_once("../class/website-shop-checkout.php");
require_once("../class/website-shop-transport.php");
require_once("../class/website-payment.php");
require_once("../class/zarinpal.php");

if(isset($_POST['save_checkout_form'])) {
	$wshch = new website_shop_checkout();
	$wp = new website_payment();

	$list = $_POST['list'];

	$wshch->save_checkout($list);

	parse_str($list, $data);

	$amount = $data['price'];
	$a_id = $data['a_id'];
	$record_id = $data['cart_id'];
	$record_type = "shop";

	$wp->payment_request($amount, $a_id, $record_id, $record_type);

	exit();
}

if(isset($_POST['update_checkout_transport_type'])) {
	$db = new db();
	$wshch = new website_shop_checkout();

	$checkout_id = $_POST['checkout_id'];
	$transport_type = $_POST['transport_type'];
	$transport_price = $_POST['transport_price'];

	$sql_update = "update website_shop_checkout set transport_type = '$transport_type', transport_price = $transport_price where id = $checkout_id";
	$db->ex_query($sql_update);

	$wshch->show_prefactor($checkout_id);

	exit();
}
