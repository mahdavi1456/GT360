$(document).ready(function() {

	$(document).on('click', '.search_term', function(event) {
		$("#term-list").html("<div class='w-100 d-flex justify-content-center'>در حال بارگذاری...</div>");
		var id  = $("#taxonomy_id").val();
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		var formData = {
			id: id,
			search: $("#term-search-text").val(),
		};
		var type = "get";
		var APP_URL = $('meta[name="_base_url"]').attr('content');
		var ajaxurl = APP_URL + "/term";
		$.ajax({
			type: type,
			url: ajaxurl,
			data: formData,
			dataType: 'json',
			success: function (data) {
				$("#term-list").html(data.html);
				$('.select2').select2();
			}
		});
    });

	$(document).on('click', '.term-row-btn', function() {
		var id = $(this).data('id');
		if($(this).find('i').hasClass('fa-plus')) {
			$(this).find('i').removeClass('fa-plus');
			$(this).find('i').addClass('fa-minus ');
			$('#term-row-result' + id).html("<td colspan='6'>لطفا صبر کنید...</td>");
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			var formData = {
				id: id,
				type: 'term',
			};
			var type = "POST";
			var APP_URL = $('meta[name="_base_url"]').attr('content');
			var ajaxurl = APP_URL + "/term/getChildren";
			$.ajax({
				type: type,
				url: ajaxurl,
				data: formData,
				dataType: 'json',
				success: function (data) {
					$('#term-row-result' + id).html(data.html);
				}
			});
		} else {
			$('#term-row-result' + id).html("");
			$(this).find('i').removeClass('fa-minus');
			$(this).find('i').addClass('fa-plus');
		}
	});

	$(document).on('click', '.delete-confirm', function() {
        var id = $(this).data("id");
        var taxonomy_id = $("#taxonomy_id").val();
        event.preventDefault();
        swal({
            title: "حذف",
            text: "آیا از انجام عملیات اطمینان دارید؟",
            icon: "warning",
            dangerMode: true,
            buttons: ["خیر","بله"],

        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = {
                    id: taxonomy_id,
                };
                var type = "DELETE";
                var APP_URL = $('meta[name="_base_url"]').attr('content');
                var ajaxurl = APP_URL+"/term/" + id;
                $.ajax({
                    type: type,
                    url: ajaxurl,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        if(data.status == 'success'){
                            swal({
                                title: "حذف",
                                text: 'مورد با موفقیت حذف شد.',
                                timer: 2000,
                                buttons: false,
                                type: "success",
                                icon: "success",
                            })
                        }else if(data.status="posts"){
                            swal({
                                title: "حذف",
                                text: 'این ترم در نوشته ها استفاده شده وقابل حذف نیست.',
                                timer: 2000,
                                buttons: false,
                                type: "error",
                                icon: "error",
                            })
                        }else{
							swal({
                                title: "حذف",
                                text: 'این ترم در فهرست ها استفاده شده و قابل حذف نیست.',
                                timer: 2000,
                                buttons: false,
                                type: "error",
                                icon: "error",
                            })
						}
						$("#term-list").html(data.html);
						$("#term-form").html(data.form);
                    }
                });
            }
        });
    });

	$(document).on('click', '.term-update-form', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		var id = $(this).data('id');
		var formData = {
				taxonomy_id : $("#taxonomy_id").val(),
			};
		var type = "GET";
        var APP_URL = $('meta[name="_base_url"]').attr('content');
        var ajaxurl = APP_URL + "/term/" + id + '/edit';
		$.ajax({
			type: type,
			url: ajaxurl,
			data: formData,
			dataType: 'json',
			success: function (data) {
				$("#term-form").html(data.form);
				$('.select2').select2();
			}
		});
    });

	$(document).on('click', '.update-term', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		var id = $(this).data('id');
		var formData = {
			name: $("#name").val(),
			slug: $("#slug").val(),
			description: $("#description").val(),
			parent_id: $("#parent_id").val(),
			taxonomy_id: $("#taxonomy_id").val(),
			filepath: $("#filepath").val(),
			onlineshop_status: $("#onlineshop_status").val()
		};
        var type = "PATCH";
        var APP_URL = $('meta[name="_base_url"]').attr('content');
        var ajaxurl = APP_URL+"/term/" + id ;
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                swal({
                    title: "ویرایش آیتم",
                    text: 'آیتم با موفقیت ویرایش شد.',
                    timer: 2000,
                    buttons: false,
                    type: "success",
                    icon: "success",
                })
				$("#term-list").html(data.html);
				$("#term-form").html(data.form);
				$('.select2').select2();
            }
        });
    });

	$(document).on('click', '.menu-children', function() {
		var id = $(this).data('id');
		$('#theme-menu-row-result' + id).html("<td colspan = '7' >در حال بارگذاری...</td>");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		var formData = {
			id: id,
		};
        var type = "post";
        var APP_URL = $('meta[name="_base_url"]').attr('content');
        var ajaxurl = APP_URL+"/theme-menu/children";
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
				$('#theme-menu-row-result' + id).html('<td colspan="7" >' + data.html + '</td>');
            }
        });
    });
});
