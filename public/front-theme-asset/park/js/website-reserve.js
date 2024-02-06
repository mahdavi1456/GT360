function check_mobile(mobile) {
	var regex = new RegExp('(0|98|0098|98)?([ ]|-|[()]){0,2}9[0-9]([ ]|-|[()]){0,2}(?:[0-9]([ ]|-|[()]){0,2}){8}');
	var result = regex.test(mobile);
	if(result == true) {
		return true;
	} else {
		return false;
	}
}

function start_timer() {
	$(".resend-code").attr("disabled", "disabled");
	let s = 60;
	var interval = setInterval(function() {
		if(s > 0) {
			s--;
			$(".login-timer").html(s);
		} else {
			$(".resend-code").removeAttr("disabled");
			$(".login-timer").html("");
			clearInterval(interval);
		}
	}, 1000);
}

function check_number(num) {
	let x = num;
	let text;
	if (isNaN(x) || x < 1 || x > 10) {
		text = false;
	} else {
		text = true;
	}
	return text;
}

$(window).on("load", start_timer());

$(document).ready(function() {

	$(document.body).on("click", "#reserve-filter-btn", function () {
		$("#loading").fadeIn();
		var month = $("#reserve-filter-month").find("option:selected").val();
		var day = $("#reserve-filter-day").find("option:selected").val();
		var a_id = $(this).data('a_id');
		var home_url = $('#home-url').val();
		$.post(home_url + "back/website-reserve.php", {
			reserve_filter: 1,
			month: month,
			day: day,
			a_id: a_id
		}, function(data) {
			$('.reserveBoxResult').html(data);
			$("#loading").fadeOut();
		});
    });
	
	$(document.body).on("click", ".reserve-step2", function() {
		$("#loading").fadeIn();
		var id = $(this).data('id');
		var a_id = $(this).data('a_id');
		$("#a_id").val(a_id);
		var home_url = $('#home-url').val();
		$.post(home_url + "back/website-reserve.php", {
			reserve_step2:1,
			id:id,
			a_id:a_id
		}, function(data) {
			$('.reserveBox').html(data);
			$("#reserve-plan-id").val(id);
			$("#loading").fadeOut();
		});
    });
	
	$(document.body).on("click", ".resend-code", function() {
		var id = $(this).data('id');
		var a_id = $(this).data('a_id');
		var home_url = $('#home-url').val();
		$.post(home_url + "back/website-reserve.php", {
			resend_code:1,
			id: id,
			a_id: a_id,
		}, function(data) {
			swal({
				icon: "success",
				text: "کد اعتبار سنجی با موفقیت ارسال شد.",
				timer: 2000,
				buttons: false
			});
			start_timer();
		});
    });
	
	$(document.body).on("click", "#save-reserve", function() {
		$("#loading").fadeIn();
		if($("#confirm-reserve-roles-checkbox").is(":checked")) {
			var ro_mobile = $("#ro-mobile").val();
			var ro_name = $("#ro-name").val();
			var ro_count = $("#ro-count").val();
			
			if(ro_mobile != "" && ro_name != "" &&  ro_count != "") {
				if(check_number(ro_count) == true) {
					var mobile = $("#ro-mobile").val();
					if(check_mobile(mobile) == true) {
						var list = $(".reserveBox *").serialize();
						var home_url = $("#home-url").val();
						$.post(home_url + "back/website-reserve.php", {
							save_reserve: 1,
							list: list,
							a_id: $("#a_id").val()
						}, function(data) {
							if(data == "error") {
								swal({
									icon: "error",
									text: "ظرفیت این سانس در حال حاضر تکمیل و امکان رزرو فراهم نیست.",
									timer: 2000,
									buttons: false
								});
								$("#loading").fadeOut();
							} else {
								window.location = data;
							}
						});
					} else {
						swal({
							icon: "error",
							title: "اخطار",
							text: "شماره موبایل وارد شده صحیح نمی باشد.",
							timer: 2000,
							buttons: false
						});
						$("#loading").fadeOut();
					}
				} else {
					swal({
						icon: "error",
						title: "اخطار",
						text: "در کادر تعداد فقط امکان وارد کردن عدد می باشد.",
						timer: 2000,
						buttons: false
					});
					$("#loading").fadeOut();
				}
			} else {
				swal({
					icon: "error",
					title: "اخطار",
					text: "لطفا فیلدهای ستاره دار را پر کنید.",
					timer: 2000,
					buttons: false
				});
				$("#loading").fadeOut();
			}
		} else {
			swal({
				icon: "error",
				title: "اخطار",
				text: "لطفا ابتدا قوانین رزرو را تایید نمایید.",
				timer: 2000,
				buttons: false
			});
			$("#loading").fadeOut();
		}
    });
	
	$(document.body).on("click", "#pay-reserve", function() {
		$("#loading").fadeIn();
    });
	
});