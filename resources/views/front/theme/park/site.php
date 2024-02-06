<?php

use public_html\class\account;

if(isset($_GET['page']) && $_GET['page'] == 'menu')
	include 'menu.php';
else
	include "partials/single-header.php";
$acc = new account();
if(isset($_GET['page'])) {
	$page = $_GET['page'];
	include $page;
} else {
	$a_id = $opt->get_a_id();
	?>
	<div class="MainSlider" style="background-image:url('dist/img/wall.jpg');">
		<h1><?php echo $opt->get_option('website_name'); ?></h1>
		<p><?php echo $opt->get_option('website_description'); ?></p>
	</div>
	<div class="container-fluid">
		<div class="MainWidgetBtn">
			<a href="?page=reserve.php">رزرو آنلاین</a>
			<a href="?page=menu">منوی دیجیتال</a>
            <a href="<?php echo $acc->get_active_feedback_url($a_id); ?>" target="_blank">نظرسنجی</a>
            <a disabled href="?page=gallery.php">گالری تصاویر</a>
			<a disabled href="?page=shop.php">فروشگاه <small>(آزمایشی)</small></a>
		</div>
		<div class="row">
			<?php
			if($opt->get_option('website_introduce')) { ?>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4">
					<div class="website-introduce">
						<?php echo $opt->get_option('website_introduce'); ?>


			<a referrerpolicy='origin' target='_blank' href='https://trustseal.enamad.ir/?id=214737&Code='><img referrerpolicy='origin' src='https://trustseal.enamad.ir/logo.aspx?id=214737&Code=' alt='' style='cursor:pointer' Code=''></a>
					</div>
				</div>
				<?php
			}
			if($opt->get_option('website_video')) { ?>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4">
					<div class="website-video">
						<?php echo $opt->get_option('website_video'); ?>
					</div>
				</div>
				<?php
			} ?>
		</div>
		<!--div class="row mb-5">
			<div class="owl-title col-lg-12">
				<h2>دوره ها</h2>
			</div>
			<div class="col-lg-12">
				<div class="owl-carousel owl-theme owl-products">
					<div class="item">
						<a href="#">
							<img src="https://gratech.ir/wp-content/uploads/2022/07/Increase-File-Upload-Size.jpg">
							<div class="owl-products-text">
								<h2>دوره یک</h2>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row mb-5">
			<div class="owl-title col-lg-12">
				<h2>فروشگاه</h2>
			</div>
			<div class="col-lg-12">
				<div class="owl-carousel owl-theme owl-products">
					<div class="item">
						<a href="#">
							<img src="https://gratech.ir/wp-content/uploads/2022/07/Increase-File-Upload-Size.jpg">
							<div class="owl-products-text">
								<h2>دوره یک</h2>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div-->
	</div>
	<?php
}
?>
