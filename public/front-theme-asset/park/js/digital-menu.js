$(document).ready(function() {
	
	$(document.body).on("click", ".mobile-cart-btn", function() {
		if($('#cart').hasClass("show")) {
			$('#cart').removeClass("show");
			$(this).removeClass("active");
		} else{
			$('#cart').addClass("show");
			$('#side').removeClass("show");
			$(this).addClass("active");
			$( ".closeNav").remove();
			$('.mobile-category-btn').removeClass('active');
		}
	});
	
	$(document.body).on("click", ".mobile-category-btn", function() {
		if($('#side').hasClass('show')) {
			$('#side').removeClass('show');
			$(this).removeClass('active');
			$( ".closeNav" ).remove();
		} else{
			$('body').append( "<div class='closeNav'></div>");
			$('#cart').removeClass('show');
			$('#side').addClass('show');
			$('.mobile-cart-btn').removeClass('active');
			$(this).addClass('active');
		}
	});
	
	$(document.body).on("click", ".closeNav", function() {
		$("#side").removeClass("show");
		$(".closeNav").remove();
		$(".mobile-category-btn").removeClass("active");
	});
	
	$(document.body).on("click", ".close-cart-btn", function() {
		$("#cart").removeClass("show");
		$(".mobile-cart-btn").removeClass("active");
	});
	
	$(document.body).on("click", ".filter-category-btn", function(e) {
		e.preventDefault();
		var id = $(this).data('id');
		var aid = $('#a-id').val();
		$("#loader-bx").css("display", "flex");
		$('.filter-category-btn').removeClass('active');
		$(this).addClass('active');
		
		var back_url = $('#back-url').val() + "digital-menu.php";
		
		$.post(back_url, {filter_by_cat_id:1, id:id , aid:aid}, function(data) {
			$("#loader-bx").css("display", "none");
			$("#result").html(data);
		});
	});
	
	$(document.body).on("click", ".product-item-add-cart", function(e){
		e.preventDefault();
		
		var back_url = $('#back-url').val() + "digital-menu.php";
		
		var id = $(this).data('id');
		var a_id = $('#a-id').val();
		var mobile = $(this).data('mobile');
		
		$("#loader-bx").css("display", "flex");
		$.post(back_url, {add_to_cart:1, id:id, a_id:a_id, mobile:mobile}, function(data){		
			$("#loader-bx").css("display", "none");
			$("#cart-result").html(data);
		});

		updateTotalCount(back_url, a_id , mobile);
	});

	$(document.body).on("click", ".plus-product", function(e){
		e.preventDefault();
	
		var back_url = $('#back-url').val() + "digital-menu.php";
		
		var id = $(this).data('id');
		var a_id = $('#a-id').val();
		var mobile = $(this).data('mobile');
		
		$("#loader-bx").css("display", "flex");
		$.post(back_url, {add_to_cart:1, id:id, a_id:a_id, mobile:mobile}, function(data){		
			$("#loader-bx").css("display", "none");
			$("#cart-result").html(data);
		});

		updateTotalCount(back_url , a_id , mobile);
	});

	function updateTotalCount(back_url , a_id , mobile){
		$.post(back_url, {getTotalCount:1, a_id:a_id, mobile:mobile}, function(data){		
			$("#loader-bx").css("display", "none");
			$("#cart-total-count").html(data);
		});
	}

	$(document.body).on("click", ".mines-product", function(e){
		e.preventDefault();
		
		var back_url = $('#back-url').val() + "digital-menu.php";
		
		var id = $(this).data('id');
		var a_id = $('#a-id').val();
		var mobile = $(this).data('mobile');
		
		$("#loader-bx").css("display", "flex");
		$.post(back_url, {decrese_product_to_cart:1, id:id, a_id:a_id, mobile:mobile}, function(data){		
			$("#loader-bx").css("display", "none");
			$("#cart-result").html(data);
		});

		updateTotalCount(back_url , a_id , mobile);
	});
	
	$(document.body).on("click", ".remove-item-from-cart", function() {
		var back_url = $('#back-url').val() + "digital-menu.php";
	
		var id = $(this).data('id');
		var a_id = $('#a-id').val();
		var mobile = $(this).data('mobile');

		$("#loader-bx").css("display", "flex");
		$.post(back_url, {remove_from_cart:1, id:id, a_id:a_id, mobile:mobile}, function(data){		
			$("#loader-bx").css("display", "none");
			$("#cart-result").html(data);
		});

		updateTotalCount(back_url , a_id , mobile);
	});
	
	$(document.body).on("click", "#checkout-digital-menu-btn", function() {
		var back_url = $('#back-url').val() + "digital-menu.php";
	
		$("#loader-bx").css("display", "flex");
		var a_id = $(this).data("a_id");
		var mobile = $(this).data("mobile");

		$.post(back_url, {checkout_digital_menu:1, a_id:a_id, mobile:mobile}, function(data) {
			$("#loader-bx").css("display", "none");
			$("#checkout-cart-result").html(data);
		});
	});
	
});