<div class="container-fluid mt-5">
	<div class="row mb-5">
		<div class="col-12">
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h5 class="card-title">نتیجه پرداخت</h5>
					<a href="<?php use public_html\class\website_payment;

                    echo "https://helipark.ir/" . $opt->get_slug();  ?>">بازگشت به صفحه اصلی</a>
				</div>
				<div class="card-body">
					<div class="panel panel-success table-responsive">
						<ul class="list-group">
							<?php
							require_once("class/website-payment.php");
							$payment = new website_payment();
							$payment->verify_payment_request($_GET['a_id'], $_GET['record_id'], $_GET['record_type']);
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
