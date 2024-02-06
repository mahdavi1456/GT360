$("#save-transport-form").click(function(){
	
    var home_url = $('#home-url').val();
    var a_id = $("#a_id").val();
	var list = $("form.form-transport *").serialize();
	
	let is_error = false;
	$('form.form-transport input:required').each(function() {
		$(this).removeClass('is-invalid')
		if ($(this).val() === ''){
			is_error = true;
			$(this).addClass('is-invalid');
		}
	});

	if(is_error){
		swal({
			icon: "error",
			title: "خطا",
			text: "همه موارد ستاره دار را پر کنید.",
			button: 'فهمیدم'
		});
		return;
	}
	
    $.post(home_url + "back/shop_setting.php", {
        save_transport_form: 1,
        list: list,
        a_id: a_id,
    }, function(data) {
		swal({
			icon: "success",
			title: "موفق",
			text: "مورد با موفقیت انجام شد.",
			button: 'فهمیدم'
		});
		$("#cnt_transport_methods").html(data);	
    });

});

$("#edit-transport-form").click(function(){
	
    var home_url = $('#home-url').val();
    var a_id = $("#a_id").val();
	var list = $("form.form-transport *").serialize();
	
	let is_error = false;
	$('form.form-transport input:required').each(function() {
		$(this).removeClass('is-invalid')
		if ($(this).val() === ''){
			is_error = true;
			$(this).addClass('is-invalid');
		}
	});

	if(is_error){
		swal({
			icon: "error",
			title: "خطا",
			text: "همه موارد ستاره دار را پر کنید.",
			button: 'فهمیدم'
		});
		return;
	}
	
    $.post(home_url + "back/shop_setting.php", {
        save_transport_form: 1,
        list: list,
        a_id: a_id,
    }, function(data) {
		swal({
			icon: "success",
			title: "موفق",
			text: "مورد با موفقیت انجام شد.",
			button: 'فهمیدم'
		});
    });

});

$(".transport-item-edit").click(function(){
	var transport_id = $(this).data('transport_id');
	var home_url = $('#home-url').val();
	var ths = $(this);
	$(this).parent().find('.heli_loading').show();
    $.post(home_url + "back/shop_setting.php", {
        edit_transport_form: 1,
        transport_id: transport_id,
    }, function(data) {
		ths.parent().find('.heli_loading').hide();
		$("#cnt_transport_form").html(data);
		window.scrollTo({top: 0, behavior: 'smooth'});
    });
});

$(".transport-item-remove").click(function(){
	var transport_id = $(this).data('transport_id');
	var home_url = $('#home-url').val();
	var ths = $(this);
	var a_id = $("#a_id").val();

	swal({
		title: "حذف ",
		text: 'آیا از حذف مطمئن هستید؟' ,
		icon: "warning",
		buttons: {
			cancel: {
				text: "انصراف",
				value: null,
				visible: true,
				className: "",
				closeModal: true,
			},
			confirm: {
				text: "تایید",
				value: true,
				visible: true,
				className: "",
				closeModal: true
			}
		}
	}).then((willDelete) => {
		if(willDelete){
			ths.parent().find('.heli_loading').show();
			$.post(home_url + "back/shop_setting.php", {
				remove_transport_form: 1,
				transport_id: transport_id,
				a_id: a_id,
			}, function(data) {
				ths.parent().find('.heli_loading').hide();
				$("#cnt_transport_methods").html(data);
			});
		}
		else{
		}
	})
	
	
});