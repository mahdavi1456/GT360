const { SUCCESS } = require("dropzone");

$(document).ready(function() {
$( "#nav-btn" ).click(function() {
	bx = $('#main-nav');
	if(bx.hasClass('show')){
		$('.closeNav').remove();
		bx.removeClass('show');
	} else {
		$('body').append('<div class="closeNav"></div>');
		bx.addClass('show');
	}
});

$( "#search-show-btn" ).click(function(e) {
	e.preventDefault();
	$('#notification-box').removeClass('show');
	$('#application-box').removeClass('show');
	bx = $('#search-box');
	if(bx.hasClass('show')){
		bx.removeClass('show');
		$(this).removeClass('active');
	} else {
		bx.addClass('show');
		$(this).addClass('active');
	}
});

$( ".single-pr-button-tab" ).click(function(e) {
	e.preventDefault();
	id = $(this).data("id");
	$('.single-pr-button-tab').removeClass("active");
	$(this).addClass("active");
	$('.single-pr__tab-content').css("display", "none");
	$('#' + id).css("display", "block");
});

$( "#application-show-btn" ).click(function(e) {
	e.preventDefault();
	$('#notification-box').removeClass('show');
	$('#search-box').removeClass('show');
	bx = $('#application-box');
	if(bx.hasClass('show')){
		bx.removeClass('show');
		$(this).removeClass('active');
	} else {
		bx.addClass('show');
		$(this).addClass('active');
	}
});


$( "#notification-show-btn" ).click(function(e) {
	e.preventDefault();
	$('#application-box').removeClass('show');
	$('#search-box').removeClass('show');
	bx = $('#notification-box');
	if(bx.hasClass('show')){
		bx.removeClass('show');
		$(this).removeClass('active');
	} else {
		bx.addClass('show');
		$(this).addClass('active');
	}
});

$(document).on('click', '.closeNav', function() {
	$('.closeNav').remove();
	bx.removeClass('show');
});

$('#main-nav li:has(> ul)').addClass('has-child');
$(document).on('click', '.has-child', function(e) {
	e.preventDefault();
});
$('#main-nav ul').find('ul').addClass('sub-menu');
});

$(document).ready(function(){
	$('.owl-price-today').owlCarousel({
		items:1,
		loop:true,
		margin:10,
		rtl:true,
		autoplay:true,
		center: true,
		autoplayTimeout:5000,
		autoplayHoverPause:false,
		responsiveClass:true,
		responsive:{
			768:{
				items:2,
				stagePadding: 50
			},
			992:{
				items:3,
				stagePadding: 100
			},
			1200:{
				items:5,
				stagePadding: 80
			}
		}
	});
});

$(document).ready(function(){
	$('.owl-slider-post').owlCarousel({
		items:1,
		loop:true,
		margin:10,
		rtl:true,
    nav:true,
		autoplay:true,
		center: true,
		autoplayTimeout:5000,
		autoplayHoverPause:false,
		responsiveClass:true,
		responsive:{
			768:{
				items:1
			},
			992:{
				items:1
			},
			1200:{
				items:1
			}
		}
	});
});

$(document).ready(function(){
	$('.owl-members').owlCarousel({
		items:3,
		loop:true,
		margin:10,
		rtl:true,
    	nav:true,
		autoplay:true,
		center: true,
		autoplayTimeout:5000,
		autoplayHoverPause:false,
		responsiveClass:true,
		responsive:{
			768:{
				items:2
			},
			992:{
				items:4
			},
			1200:{
				items:7
			}
		}
	});
});

function addToCart(id) {
	$.ajax({
		url: '/cart/add',
		type: 'POST',
		data: {
			_token: $('meta[name=_token]').attr('content'),
			product: id,
		},
		success: function(result) {
			Swal.fire({
				title: 'موفق',
				text: 'با موفقیت به سبد خرید اضافه شد.',
				icon: 'success'
			});
		},
		error: function(result) {
			Swal.fire({
				title: 'خطا',
				text: result.responseJSON.message,
				icon: 'error'
			});
		}
	})
}