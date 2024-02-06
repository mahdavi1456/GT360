$(document).ready(function() {

	$(".category-item").on("click", function() {
		var home_url = $('#home-url').val();
		var cat_id = $(this).data('cat_id');
		var a_id = $("#a_id").val();
		$("#heli_loading").css('display' , 'inline-block');
		$.post(home_url + "back/website-shop-product.php", {
			category_filter: 1,
			cat_id: cat_id ,
			a_id: a_id
		}, function(data) {
			$("#heli_loading").css('display', 'none');
			$('.cnt_helipark_products').html(data);
		});
    });
	
	$("#btn_search_heli_product").on("click", function() {
		var home_url = $('#home-url').val();
		var cat_id = $(this).data('cat_id');
		var a_id = $("#a_id").val();
		$("#heli_loading").css('display' , 'inline-block');
		$.post(home_url + "back/website-shop-product.php", {
			category_filter: 1,
			cat_id: cat_id ,
			a_id: a_id
		}, function(data) {
			$("#heli_loading").css('display', 'none');
			$('.cnt_helipark_products').html(data);
		});
    });
	
});