<?php

use public_html\class\website_shop_product;

session_start();
require_once("../class/jdf.php");
require_once("../class/db.php");
require_once("../class/prime.php");
require_once("../class/option.php");
require_once("../class/gdate.php");
require_once("../class/sms.php");

require_once("../class/website-reserve.php");
require_once("../class/website-shop-product.php");

if(isset($_POST['category_filter'])) {
	$product = new website_shop_product();

	$cat_id = $_POST['cat_id'];
	$a_id = $_POST['a_id'];
	if($cat_id == 0) {
		$product->list_product($a_id);
		exit;
	}
	$product->list_product($a_id, $cat_id);

	exit;
}
