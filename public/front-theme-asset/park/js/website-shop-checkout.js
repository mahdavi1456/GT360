$("#save-checkout-form").click(function() {
	$("#loading").fadeIn();
		
    var home_url = $('#home-url').val();
    var a_id = $("#a-id").val();
	var list = $("form.form-checkout *").serialize();
	
	var transport_type = $("#transport-type").val();
	var transport_price = $("#transport-price").val();
	
	let is_error = false;
	
	if(transport_type == "" || transport_price == "") {
		is_error = true;
	}
	
	$("form.form-checkout input:required, form.form-checkout select:required").each(function() {
		$(this).removeClass("is-invalid");
		if($(this).val() === "") {
			is_error = true;
			$(this).addClass("is-invalid");
		}
	});

	if(is_error) {
		swal({
			icon: "error",
			title: "خطا",
			text: "همه موارد ستاره دار را پر کنید.",
			button: 'فهمیدم'
		});
		return;
		$("#loading").fadeOut();
	}
	
	const p2e = s => s.replace(/[۰-۹]/g, d => '۰۱۲۳۴۵۶۷۸۹'.indexOf(d))

	const check_validate_mobile = (number) => {
		var regex = new RegExp("^(\\+98|0)?9\\d{9}$");
		number = p2e(mobile);
		var result = regex.test(number);
		return result;
		$("#loading").fadeOut();
	};
	
	var mobile = $("#mobile").val();

	//console.log(check_validate_mobile(mobile))
	//return
	if(!check_validate_mobile(mobile)) {
		swal({
			icon: "error",
			title: "اخطار الگوی شماره موبایل",
			text: "نمونه صحیح الگوی موبایل: 09130000000",
			button: 'فهمیدم'
		});
		$("#loading").fadeOut();
		return;
	}
	
	var code_posti = $("#code_posti").val();
	if(code_posti.length != 10) {
		swal({
			icon: "error",
			title: "خطا",
			text: "کد پستی باید ده رقم باشد.",
			button: 'فهمیدم'
		});
		$("#loading").fadeOut();
		return;
	}
	
    $.post(home_url + "back/website-shop-checkout.php", {
        save_checkout_form: 1,
        list: list
    }, function(data) {
		$("#website-payment-result").html(data);
		$("#loading").fadeOut();
    });

});

$(document.body).on("change", "#checkout-transport-type", function() {
	$("#loading").fadeIn();
	
	var home_url = $("#home-url").val();
    var a_id = $("#a-id").val();
	var checkout_id = $("#checkout-id").val();
	
	var transport = $(this).find("option:selected").val();
	var transport_type = transport.split("|")[0];
	var transport_price = transport.split("|")[1];
	$("#transport-type").val(transport_type);
	$("#transport-price").val(transport_price);
	
    $.post(home_url + "back/website-shop-checkout.php", {
        update_checkout_transport_type: 1,
        checkout_id: checkout_id,
		transport_type: transport_type,
		transport_price: transport_price
    }, function(data) {
		$("#website-prepayment-result").html(data);
		$("#loading").fadeOut();
	});
	
});

/* $(document.body).on("click", ".load-website-shop-checkout-order-label", function(){
	var id = $(this).data("id");
	var inc_url = $('#inc_url').val();
	$.post(inc_url + "script/helipark/website-shop-checkout.php", {load_website_shop_checkout_order_label:1, id:id}, function(data) {
		$("#load-website-shop-checkout-order-label-result").html(data);
	});
}); */