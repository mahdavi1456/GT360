$(document).ready(function() {

	const check_validate_mobile = (number) => {
		var regex = new RegExp("^(\\+98|0)?9\\d{9}$");
		var result = regex.test(number);
		return result;
	};

	//var phone = '9137053417';
	//console.log(check_validate_mobile(phone))
		
	$("#send-login-otp").click(function() {
		$("#loading").fadeIn();
		
		var home_url = $('#home-url').val();
		var a_id = $("#a-id").val();
		var mobile = $("#user-mobile-number").val();
		
		if(mobile == "") {
			swal({
				icon: "error",
				title: "اخطار",
				text: "شماره موبایل را وارد کنید",
				button: 'فهمیدم'
				//timer: 2000,
			});
			$("#loading").fadeOut();
			return;
		}
		
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
		
		$.post(home_url + "back/user.php", {
			send_otp: 1,
			a_id: a_id ,
			mobile: mobile ,
		}, function(data) {
			$("#confirm-otp-btn").show();
			$("#send-login-otp").hide();
			$("#confirm-otp-input-wrap").show();
			$("#loading").fadeOut();
		});
    });
	
		
	$("#confirm-otp-btn").click(function(){
		$("#loading").fadeIn();
	
		var home_url = $('#home-url').val();
		var a_id = $("#a-id").val();
		var mobile = $("#user-mobile-number").val();
		var code = $("#confirm-otp-input").val();
		
		if(mobile == "") {
			swal({
				icon: "error",
				title: "اخطار",
				text: "شماره موبایل را وارد کنید",
				button: 'فهمیدم'
				//timer: 2000,
			});
			$("#loading").fadeOut();
			return;
		}

		if(code == "") {
			swal({
				icon: "error",
				title: "اخطار",
				text: "کد تایید را وارد کنید",
				button: 'فهمیدم'
			});
			$("#loading").fadeOut();
			return;
		}
		
		$.post(home_url + "back/user.php", {
			confirm_otp: 1,
			a_id: a_id,
			mobile: mobile,
			code: code,
		}, function(data) {
			
			if(data == "success_auth") {
				swal({
					icon: "success",
					title: "موفق",
					text: "ورود موفقیت آمیز",
					button: 'فهمیدم'
				});
				var redirected_url = document.URL.split('?')[0]
				setTimeout(function(){
					window.location.href = redirected_url;
				},1000);
			} else if(data == "uncorrect_code") {
				swal({
					icon: "error",
					title: "اخطار",
					text: "کد وارد شده اشتباه است",
					button: 'فهمیدم'
				});
			} else if(data == 'expired_code') {
				swal({
					icon: "error",
					title: "اخطار",
					text: "کد وارد شده منقضی شده است، مجددا امتحان کنید",
					button: 'فهمیدم'
				});
			}
			
		});
    });
	
});