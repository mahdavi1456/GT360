<?php

use public_html\class\website_shop_setting;

ob_start();
session_start();
require_once("../class/jdf.php");
require_once("../class/db.php");
require_once("../class/prime.php");
require_once("../class/option.php");
require_once("../class/gdate.php");
require_once("../class/reserve.php");
require_once("../class/sms.php");
require_once("../class/cart.php");
require_once("../class/website-product.php");
require_once("../class/website-checkout.php");
require_once("../class/website-shop-setting.php");

if(isset($_POST['save_transport_form'])){
	$wc = new website_shop_setting();

	$list = $_POST['list'];
	$a_id = $_POST['a_id'];
	$wc->save_transport($list,$a_id);
	$wc->load_transport($a_id);
}

if(isset($_POST['edit_transport_form'])){
	$wc = new website_shop_setting();

	$transport_id = $_POST['transport_id'];
	$wc->form_transport($transport_id);
}

if(isset($_POST['remove_transport_form'])) {
	$wc = new website_shop_setting();

	$transport_id = $_POST['transport_id'];
	$a_id = $_POST['a_id'];
	$wc->remove_transport($transport_id);
	$wc->load_transport($a_id);
}
