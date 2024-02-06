<?php use public_html\class\website_shop_product;

$month = jdate('m'); ?>
<div class="container-fluid mt-5">
    <div class="row mb-5">
        <input hidden id="a_id" value="<?php echo $opt->get_a_id(); ?>">
        <div class="col-12 reserveBox">
            <style>
                .img-thumbnail {
                    height: 100%;
                    width: 100%;
                    object-fit: cover;
                }
                .cnt_gallery_images > div {
                    margin-bottom: 30px;
                }
                .lightbox-overlay {
                    cursor: pointer;
                }
            </style>
            <?php
            $a_id = $_SESSION['a_id'];
			$slug = $db->get_var_query("select a_slug from account where a_id = $a_id");
			if(!$slug or $slug == '') {
				$slug = '';
			}
            $product = new website_shop_product();
            $categories = $product->get_categories($a_id);
            ?>
            <div>
                <div class="product-category-wrap text-center" style="display: none;">
					<a class="btn btn-info category-item" data-cat_id="0" >همه محصولات</a>
					<?php
					if(count($categories) > 0) {
						foreach($categories as $category) { ?>
							<a class="btn btn-info category-item" data-cat_id="<?php echo $category['cat_id']; ?>"><?php echo $category['cat_name']; ?></a>
							<?php
						}
					} else {
						?>
						<div class="alert alert-danger text-center">هیچ دسته بندی هنوز تعریف نشده است.</div>
						<?php
					} ?>
				</div>
				<div class="row mt-4">
					<form method="get" action="/<?php echo $slug; ?>?page=shop.php">
						<input type="hidden" name="page" value="shop.php" >
						<input type="hidden" name="category_id" value="0" >
						<button type="submit" class="btn btn-info ml-3" name="filter_by_category">همه</button>
					</form>
					<?php
					$cat_id = null;
					$product_name = null;
					if(isset($_GET['filter_by_category'])) {
						$cat_id = $_GET['category_id'];
						if($cat_id == 0) {
							$cat_id = null;
						}
					}
					if(isset($_GET['filter_by_name'])) {
						$product_name = $_GET['product_name'];
						/* if($product_name == 0){
							$product_name = '';
						} */
					}

					if(count($categories) > 0) {
						foreach($categories as $category) { ?>
							<form method="get" action="/<?php echo $slug; ?>?page=shop.php">
								<input type="hidden" name="page" value="shop.php">
								<input type="hidden" name="category_id" value="<?php echo $category['cat_id']; ?>">
								<button type="submit" class="btn btn-info ml-3" name="filter_by_category" ><?php echo $category['cat_name']; ?></button>
							</form>
							<?php
						}
					} ?>
				</div>
				<form>
					<div class="row mt-4">
						<input type="hidden" name="page" value="shop.php" >
						<input type="hidden" name="category_id" value="<?php echo $cat_id; ?>" >
						<div class="col-md-8">
							<input class="form-control" type="text" name="product_name" placeholder="جستجو کنید..." value="<?php if($product_name != '') { echo $product_name; } ?>">
						</div>
						<div class="col-md-4">
							<button type="button" name="filter_by_name" class="btn btn-success w-100" id="btn_search_heli_product"><i class="fa fa-search"></i> جستجو</button>
						</div>
					</div>
				</form>
				<div style="margin-top: 20px; text-align: center;">
					<i class="fa fa-spinner fa-spin" id="heli_loading" style="display: none"></i>
				</div>
            </div>
            <div class="row cnt_helipark_products">
                <?php
                $product->list_product($a_id, $cat_id, $product_name);
                ?>
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
<input type="hidden" value="<?php echo $user_mobile; ?>" id="user_mobile" />
