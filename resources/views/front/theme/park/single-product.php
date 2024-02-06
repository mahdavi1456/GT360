<div class="container-fluid mt-5">
    <div class="row mb-5">
        <input hidden id="a_id" value="<?php use public_html\class\prime;
        use public_html\class\website_shop_product;

        echo $opt->get_a_id(); ?>">
        <div class="col-12 reserveBox">
            <style type="text/css">
                .img-thumbnail {
                    height: 300px;
                    width: 100%;
                    object-fit: cover;
                }
                .cnt_gallery_images > div {
                    margin-bottom: 30px;
                }
                .lightbox-overlay {
                    cursor: pointer;
                }
				.content_product {
					line-height:2;
				}
            </style>
            <?php
			$pr = new prime();
			$pr_id = $_GET['pr_id'];
            $a_id = $_SESSION['a_id'];
			$wp = new website_shop_product();
            ?>
            <h3 class="mb-5"><?php echo $wp->get_product_name($pr_id); ?></h3>
			<div class="row">
				<div class="col-md-4">
					<img class="img-thumbnail" src="https://heliapp.ir/gt-content/asset/images/product/<?php echo $wp->get_product_image($pr_id); ?>">
				</div>
				<div class="col-md-8 content_product">
					<?php echo $wp->get_product_content($pr_id); ?>
				</div>
			</div>
			<div class="row mt-5">
				<div class="col-12 text-left">
					<span><b>قیمت محصول: </b></span>
					<span><?php echo $pr->per_number(number_format($wp->get_product_price($pr_id))); ?></span>
					<span>تومان</span>
					<button type="button" class="btn btn-success mr-5 btn-add-cart" data-product_id="<?php echo $pr_id; ?>" data-product_price="<?php echo $wp->get_product_price($pr_id); ?>">افزودن به سبد خرید</button>
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
