<?php

use public_html\class\db;
use public_html\class\option;

$opt = new option();
$month = jdate('m');
$a_id = $opt->get_a_id();
?>
<div class="container-fluid mt-5">
	<div class="row mb-5">
		<input hidden id="a_id" value="<?php echo a_id; ?>">
		<div class="col-12 reserveBox">
			<?php
			$db = new db();
			$p_slug = $_GET['title'];
			$p_content = $db->get_var_query("select p_content from website_page where a_id = $a_id and p_slug = '$p_slug'");
			echo $p_content;
			?>
		</div>
	</div>
</div>
<?php $opt = new option(); ?>
<script type="text/javascript" src="<? echo $opt->get_root_url() . "js/reserve.js"; ?>"></script>
