$(document).ready(function() {
	
	$(document.body).on("click", ".product-item-add-cart, .btn-add-cart", function() {
		$("#loading").fadeIn();
		
		var home_url = $("#home-url").val();
		var product_id = $(this).data("product_id");
		var product_price = $(this).data("product_price");
		var a_id = $("#a_id").val();
		var mobile = $("#user_mobile").val();
		
		if(mobile == "" || !mobile) {
			swal({
				icon: "error",
				title: "اخطار",
				text: "برای خرید ابتدا باید وارد حساب کاربری خود شوید.",
				button: "متوجه شدم"
			});
			$("#loading").fadeOut();
			return;
		}
		
		$.post(home_url + "back/website-shop-cart.php", {
			add_cart: 1,
			product_id: product_id,
			product_price: product_price,
			a_id: a_id,
			mobile: mobile,
		}, function(data) {
			if (data == "not_stock") {
				swal({
					icon: "error",
					title: "اخطار",
					text: "موجودی محصول کافی نیست.",
					button: "متوجه شدم"
				});
				return;
			}
			swal({
				icon: "success",
				title: "موفق",
				text: "با موفقیت به سبد اضافه شد.",
				button: "ادامه خرید"
			});
			$.post(home_url + "back/website-shop-cart.php", {
				quantity_cart_items: 1,
				a_id: a_id ,
			}, function(response) {
				$("#heli_quantity_cart_items").html(response);
				$("#loading").fadeOut();
			});
		});
    });
	
	$(document.body).on("click", ".product-item-remove-cart", function() {
		$("#loading").fadeIn();
		
		var home_url = $("#home-url").val();
		var product_id = $(this).data("product_id");
		var a_id = $("#a_id").val();
		var mobile = $("#user_mobile").val();
		$.post(home_url + "back/website-shop-cart.php", {
			remove_cart: 1,
			product_id: product_id ,
			a_id: a_id ,
			mobile: mobile ,
		}, function(data) {
			$("#cnt_table_cart").html(data);
			swal({
				icon: "success",
				title: "موفق",
				text: "با موفقیت از سبد حذف شد.",
				button: "متوجه شدم"
			});
			$.post(home_url + "back/website-shop-cart.php", {
				quantity_cart_items: 1,
				a_id: a_id,
			}, function(response) {
				$("#heli_quantity_cart_items").html(response);
				$("#loading").fadeOut();
			});
		});
    });
	
	
	$(document.body).on("input", ".product-item-count-cart", function() {
		$("#loading").fadeIn();
		
		var count = $(this).val();
		var old_count = $(this).data('oldvalue');
		var home_url = $("#home-url").val();
		var product_id = $(this).data("product_id");
		var a_id = $("#a_id").val();
		var mobile = $("#user_mobile").val();
		
		var ths = $(this);
		
		if(count == '' || count <= 0) {
			return;
		}
		
		$.post(home_url + "back/website-shop-cart.php", {
			update_count_cart: 1,
			product_id: product_id ,
			a_id: a_id ,
			mobile: mobile ,
			count: count
		}, function(data) {
			if (data == "not_stock") {
				swal({
					icon: "error",
					title: "اخطار",
					text: "موجودی این محصول کافی نیست.",
					button: "متوجه شدم"
				});
				ths.val(old_count);
				return;
				$("#loading").fadeOut();
			}
			$("#cnt_table_cart").html(data);
			swal({
				icon: "success",
				title: "موفق",
				text: "با موفقیت انجام شد.",
				button: "متوجه شدم"
			});
			$.post(home_url + "back/website-shop-cart.php", {
				quantity_cart_items: 1,
				a_id: a_id
			}, function(response) {
				$("#heli_quantity_cart_items").html(response);
				$("#loading").fadeOut();
			});
		});
    });
	
});