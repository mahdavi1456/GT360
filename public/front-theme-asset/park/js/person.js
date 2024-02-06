$("#update-person-profile").click(function(){
    var home_url = $('#home-url').val();
    var a_id = $("#a-id").val();

    var p_name = $("#p-name").val();
    var p_family = $("#p-family").val();
    var p_gender = $("#p-gender").find("option:selected").val();
    var p_birthday = $("#p-birthday").val();
    var p_id = $("#p-id").val();
    var u_id = $("#u-id").val();
	
	if( p_birthday!= "" && !isValidDate(p_birthday) ){
		let err_swal_text = "فرمت تاریخ اشتباه می باشد" + "." + "نمونه تاریخ صحیح: " + "01-01-1400";
		swal({
			type: "error",
			title: "خطا در فرمت تاریخ",
			text: err_swal_text,
			button: 'فهمیدم'
		});
		return;
	}

    $.post(home_url + "back/person.php", {
        update_person_profile: 1,
        a_id: a_id,
        p_name: p_name,
        p_family: p_family,
        p_gender: p_gender,
        p_birthday: p_birthday,
        p_id: p_id ,
        u_id: u_id ,
    }, function(data) {
		swal({
			icon: "success",
			title: "موفق",
			text: "ویرایش اطلاعات با موفقیت انجام شد",
			button: 'فهمیدم'
		});
    });

});