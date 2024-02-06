$(document).ready(function(){
	$('.owl-products').owlCarousel({
		items:1,
		rtl:true,
		loop:true,
		autoplay:true,
		margin:10,
		stagePadding: 20,
		autoplayTimeout:3000,
		autoplayHoverPause:true,
		responsiveClass:true,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:2
			},
			1000:{
				items:4
			}
		}
	})
	AOS.init();
	$('#OpenNavBtn > span').on('click',function(){
		$('.MainMenu').addClass('MobileNavShow');
	})
	$('#OpenNavBtnSingleHeader > span').on('click',function(){
		if($(this).hasClass("singleNavOpened")){
			$('.singleNav').removeClass('singleNavShow');
			$(this).removeClass('singleNavOpened');
		}
		else{
			$(this).addClass("singleNavOpened");
			$('.singleNav').addClass('singleNavShow');
		}
	})
	
	$('.MainMenu ul li a').on('click',function(){
		$('.MainMenu').removeClass('MobileNavShow');
	})
	$(document).mouseup(function(e) {
		var container = $(".MainMenu");
		
		// if the target of the click isn't the container nor a descendant of the container
		if (!container.is(e.target) && container.has(e.target).length === 0) 
		{
			container.removeClass('MobileNavShow');
		}
	});
	// Add smooth scrolling to all links
	$("a").on('click', function(event) {
		
		// Make sure this.hash has a value before overriding default behavior
		if (this.hash !== "") {
			// Prevent default anchor click behavior
			event.preventDefault();
			
			// Store hash
			var hash = this.hash;
			
			// Using jQuery's animate() method to add smooth page scroll
			// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
			$('html, body').animate({
				scrollTop: $(hash).offset().top
				}, 800, function(){
				
				// Add hash (#) to URL when done scrolling (default click behavior)
				window.location.hash = hash;
			});
		} // End if
	});
});
