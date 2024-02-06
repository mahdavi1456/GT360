<div class="container-fluid mt-5">
	<div class="row mb-5">
		<div class="col-12 reserveBox">
			<div class="reserveBoxSelect">
				<div class="row">
					<?php

                    use public_html\class\account;
                    use public_html\class\option;
                    use public_html\class\website_reserve;

                    $m = jdate('m');
					$d = jdate('d');
					?>
					<div class="col">
						<label>ماه</label>
						<select id="reserve-filter-month" class="w-100">
							<option value="1" <?php echo $m == 1 ? 'selected' : '';?>>فروردین</option>
							<option value="2" <?php echo $m == 2 ? 'selected' : '';?>>اردیبهشت</option>
							<option value="3" <?php echo $m == 3 ? 'selected' : '';?>>خرداد</option>
							<option value="4" <?php echo $m == 4 ? 'selected' : '';?>>تیر</option>
							<option value="5" <?php echo $m == 5 ? 'selected' : '';?>>مرداد</option>
							<option value="6" <?php echo $m == 6 ? 'selected' : '';?>>شهریور</option>
							<option value="7" <?php echo $m == 7 ? 'selected' : '';?>>مهر</option>
							<option value="8" <?php echo $m == 8 ? 'selected' : '';?>>آبان</option>
							<option value="9" <?php echo $m == 9 ? 'selected' : '';?>>آذر</option>
							<option value="10" <?php echo $m == 10 ? 'selected' : '';?>>دی</option>
							<option value="11" <?php echo $m == 11 ? 'selected' : '';?>>بهمن</option>
							<option value="12" <?php echo $m == 12 ? 'selected' : '';?>>اسفند</option>
						</select>
					</div>
					<div class="col">
						<label>روز</label>
						<select id="reserve-filter-day" class="w-100">
							<?php
							for($i = 1; $i <= 31; $i++) { ?>
								<option value="<?php echo $i; ?>" <?php if($i == $d) echo "selected"; ?>><?php echo $i; ?></option>
								<?php
							} ?>
						</select>
					</div>
					<div class="col d-flex justify-content-end">
						<button type="button" id="reserve-filter-btn" class="btn btn-success" data-a_id="<?php echo $a_id; ?>">نمایش</button>
					</div>
				</div>
			</div>
			<?php
			$month = jdate('m');
			$day = jdate('d');

			$acc = new account();
			//var_dump($a_id);
			$merchant_id = $acc->get_account_column($a_id, "a_zarinpal");
			if($merchant_id != "") {
				$reserve = new website_reserve();
				$reserve->reserve_list($month, $day, $_SESSION['a_id']);
			} else {
				?>
				<div class="alert alert-danger"><b>خطا، </b> رزرو آنلاین این مجموعه غیرفعال می باشد.</div>
				<?php
			}
			?>
		</div>
	</div>
</div>
<?php $opt = new option(); ?>
<script type="text/javascript" src="<? echo $opt->get_root_url() . "dist/js/website-reserve.js"; ?>"></script>
