<?php

use public_html\class\digital_menu;
use public_html\class\option;
use public_html\class\person;
use public_html\class\user;
use public_html\class\website_reserve;
use public_html\class\website_shop_checkout;

$opt = new option();
$a_id = $opt->get_a_id();
$user = new user();
$person = new person();
$reserve = new website_reserve();
$dgm = new digital_menu();
$wsc = new website_shop_checkout();

if(!isset($_COOKIE['is_auth']) or empty($_COOKIE['is_auth'])) {
	$slug = $user->get_slug_account();
	$redirect_url = ROOT_URL . '/' . $slug;
	header("location: " . $redirect_url);
}

$month = jdate('m');
$day = jdate('d');
//ini_set('display_errors' , 1);
?>
<div class="container-fluid mt-5">
	<div class="row mb-5">
		<input hidden id="a_id" value="<?php echo a_id; ?>">
		<div class="col-12 reserveBox">
			<?php
			$fullname = $user->get_fullname_user();
			if(!empty($fullname)) {
			    ?>
			    <p><span>کاربر گرامی، </span><?php echo $fullname; ?><span> خوش آمدید</span></p>
			    <?php
            } else { ?>
			    <p><span>کاربر گرامی، </span><?php echo $fullname; ?><span> خوش آمدید</span></p>
			    <?php
            } ?>
            <ul class="nav nav-tabs">
				<li><a data-toggle="tab" href="#edit_profile" class="btn btn-primary tab-item m-2">ویرایش پروفایل</a></li>
                <li><a data-toggle="tab" href="#home" class="btn btn-primary tab-item m-2">سوابق رزرو</a></li>
                <li><a data-toggle="tab" href="#menu1" class="btn btn-primary tab-item m-2">منوی دیجیتال</a></li>
                <li><a data-toggle="tab" href="#menu2" class="btn btn-primary tab-item m-2">فروشگاه آنلاین</a></li>
                <li><a data-toggle="tab" href="#menu3" class="btn btn-primary tab-item m-2">لیست سفارشات</a></li>
            </ul>
            <div class="tab-content">
				<div id="edit_profile" class="tab-pane fade in active">
                    <h3 class="mt-4">ویرایش پروفایل</h3>
                    <?php $person->edit_person_profile_form(); ?>
                </div>
                <div id="home" class="tab-pane fade in">
                    <h3 class="mt-4">سوابق رزرو</h3>
                    <?php $reserve->reserve_list_user($month, $day, $_SESSION['a_id']); ?>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <h3 class="mt-4">لیست سفارشات</h3>
					<?php $dgm->list_digital_menu(); ?>
					<?php //$reserve->reserve_list_user($month, $day, $_SESSION['a_id']); ?>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <h3 class="mt-4">فروشگاه آنلاین</h3>
                    <p></p>
                </div>
				<div id="menu3" class="tab-pane fade">
                    <h3 class="mt-4">سفارشات فروشگاه</h3>
					<?php $wsc->load_orders(); ?>
                </div>
            </div>
		</div>
	</div>
</div>

<style>
	.cnt_page_tabs{
		margin-top:50px;
	}

	.page_tabs{
		display: flex;
		justify-content:space-between;
	}

	.tab-item{
		width: 200px;
		border-radius: 10px;
	}
</style>
