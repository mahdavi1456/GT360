<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>MABUR Bootstarp Website Template | Home :: w3layouts</title>
<link href="{{ asset('front-theme-asset/mabur') }}/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('front-theme-asset/mabur') }}/js/jquery.min.js"></script>
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="{{ asset('front-theme-asset/mabur') }}/js/move-top.js"></script>
<script type="text/javascript" src="{{ asset('front-theme-asset/mabur') }}/js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
<!---- start-smoth-scrolling---->
<!-- Custom Theme files -->
<link href="{{ asset('front-theme-asset/mabur') }}/css/theme-style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<!----font-Awesome----->
<link rel="stylesheet" href="{{ asset('front-theme-asset/mabur') }}/fonts/css/font-awesome.min.css">
<!----font-Awesome----->
<!----webfonts---->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>
<!----//webfonts---->
<!----start-top-nav-script---->
		<script>
			$(function() {
				var pull 		= $('#pull');
					menu 		= $('nav ul');
					menuHeight	= menu.height();
				$(pull).on('click', function(e) {
					e.preventDefault();
					menu.slideToggle();
				});
				$(window).resize(function(){
	        		var w = $(window).width();
	        		if(w > 320 && menu.is(':hidden')) {
	        			menu.removeAttr('style');
	        		}
	    		});
			});
		</script>
		<!----//End-top-nav-script---->
</head>
<body>
		<!----start-container---->
			<!----start-header---->
		<div id="home" class="header scroll">
			<div class="container">
				<!---- start-logo---->
				<div class="logo">
					<a href="index.html"><img src="{{ asset('front-theme-asset/mabur') }}/images/logo.png" title="Mabur" /></a>
				</div>
				<!---- //End-logo---->
				<!----start-top-nav---->
				 <nav class="top-nav">
					<ul class="top-nav">
						<li class="active"><a href="#home" class="scroll">Home</a></li>
						<li class="page-scroll"><a href="#fea" class="scroll">Features</a></li>
						<li class="page-scroll"><a href="#port" class="scroll">Portfolio</a></li>
						<li class="page-scroll"><a href="#blog" class="scroll">Blog</a></li>
						<li class="page-scroll"><a href="#test" class="scroll">Testimonials</a></li>
						<li class="contatct-active" class="page-scroll"><a href="#contact" class="scroll">Contact</a></li>
					</ul>
					<a href="#" id="pull"><img src="{{ asset('front-theme-asset/mabur') }}/images/nav-icon.png" title="menu" /></a>
				</nav>
				<div class="clearfix"> </div>
				<div class="slide-text text-center">
					<h1>High Quality Template</h1>
					<span>Built with love.</span>
					<a class="slide-btn" href="#">Learn More</a>
				</div>
				<!----//End-top-nav---->
			</div>
		</div>
		<!----//End-header---->
		<!----start-feartures----->
		<div id="fea" class="features">
			<div class="container">
				<div class="head text-center">
					<h3><span> </span> Our Features</h3>
					<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </p>
				</div>
				<!---- start-features-grids---->
				<div class="features-grids text-center">
					<div class="col-md-3 features-grid">
						<span class="fea-icon1"><i class="fa fa-star"> </i> </span>
						<h3><a href="#">Premium</a></h3>
						<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean.</p>
					</div>
					<div class="col-md-3 features-grid">
						<span class="fea-icon1"><i class="fa fa-thumbs-up"> </i> </span>
						<h3><a href="#">Easy</a></h3>
						<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean.</p>
					</div>
					<div class="col-md-3 features-grid">
						<span class="fea-icon1"><i class="fa fa-tachometer"> </i> </span>
						<h3><a href="#">Fast</a></h3>
						<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean.</p>
					</div>
					<div class="col-md-3 features-grid">
						<span class="fea-icon1"><i class="fa fa-mobile"> </i> </span>
						<h3><a href="#">Responsive</a></h3>
						<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<!---- //End-features-grids---->
			</div>
		</div>
		<!----//End-feartures----->
		<!---- start-work---->
		<div class="work">
			<div class="container">
				<div class="head text-center work-head">
					<h3><span> </span> How We Work</h3>
					<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </p>
				</div>
				<!---- start-work-grids----->
				<div class="work-grids">
					<div class="col-md-4 work-grid">
						<span class="col-md-5 w-icon"> <i class="fa fa-search"> </i></span>
						<div class="col-md-7 work-info">
							<h4>Research</h4>
							<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat </p>
						</div>
					</div>
					<div class="col-md-4 work-grid center-work-grid">
						<span class="col-md-5 w-icon"> <i class="fa fa-cogs"> </i></span>
						<div class="col-md-7 work-info">
							<h4>Design</h4>
							<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat </p>
						</div>
					</div>
					<div class="col-md-4 work-grid">
						<span class="col-md-5 w-icon"><i class="fa fa-code"> </i> </span>
						<div class="col-md-7 work-info">
							<h4>Develop</h4>
							<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat </p>
						</div>
					</div>
					<div class="clearfix"> </div>
					<div class="work-map">
						<span> </span>
					</div>
				</div>
				<!---- //End-work-grids----->
			</div>
		</div>
		<!---- //End-work---->
		<!----start-portfolio----->
		<div id="port" class="portfolio portfolio-box">
				<div class="head text-center">
					<h3><span> </span> Portofolio</h3>
					<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </p>
				</div>
				<!----start-portfolio---->
               <div id="port" class="portfolio-main">
	        	<!---- start-portfolio-script----->
					<script type="text/javascript" src="{{ asset('front-theme-asset/mabur') }}/js/jquery.mixitup.min.js"></script>
					<script type="text/javascript">
						$(function () {
							var filterList = {
								init: function () {

									// MixItUp plugin
									// http://mixitup.io
									$('#portfoliolist').mixitup({
										targetSelector: '.portfolio',
										filterSelector: '.filter',
										effects: ['fade'],
										easing: 'snap',
										// call the hover effect
										onMixEnd: filterList.hoverEffect()
									});

								},
								hoverEffect: function () {
									// Simple parallax effect
									$('#portfoliolist .portfolio').hover(
										function () {
											$(this).find('.label').stop().animate({bottom: 0}, 200, 'easeOutQuad');
											$(this).find('img').stop().animate({top: -30}, 500, 'easeOutQuad');
										},
										function () {
											$(this).find('.label').stop().animate({bottom: -40}, 200, 'easeInQuad');
											$(this).find('img').stop().animate({top: 0}, 300, 'easeOutQuad');
										}
									);

								}

							};
							// Run the show!
							filterList.init();
						});
					</script>
					<!----//End-portfolio-script----->
					<ul id="filters" class="clearfix">
						<li><span class="filter active" data-filter="app card icon logo web">All</span></li>
						<li><span class="filter" data-filter="app">Web</span></li>
						<li><span class="filter" data-filter="card">Print</span></li>
					</ul>
					<div id="portfoliolist">
					<div class="portfolio logo1 mix_all" data-cat="logo" style="display: inline-block; opacity: 1;">
						<div class="portfolio-wrapper">
							<div class="port-grid">
								<div class="port-grid-text">
									<p>//Lorem Ipsum</p>
									<label class="arrow-icon1"> </label>
								</div>
								<div class="port-grid-pic block last">
									<a href="#" class="b-link-stripe b-animate-go  thickbox">
								     <img src="{{ asset('front-theme-asset/mabur') }}/images/p1.jpg" /><div class="b-wrapper"><h2 class="b-animate b-from-left    b-delay03 "><img src="{{ asset('front-theme-asset/mabur') }}/images/plus.png" alt=""/></h2>
								  	</div></a>
								</div>
								<div class="clearfix"> </div>
							</div>
		                </div>
					</div>
					<div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
						<div class="portfolio-wrapper">
							<div class="port-grid">
								<div class="port-grid-text port-grid-text-c">
									<p>//Lorem Ipsum</p>
									<label class="arrow-icon1 arrow-icon1-l"> </label>
								</div>
								<div class="port-grid-pic block last">
									<a href="#" class="b-link-stripe b-animate-go  thickbox">
								     <img src="{{ asset('front-theme-asset/mabur') }}/images/p2.jpg" /><div class="b-wrapper"><h2 class="b-animate b-from-left    b-delay03 "><img src="{{ asset('front-theme-asset/mabur') }}/images/plus.png" alt=""/></h2>
								  	</div></a>
								</div>
								<div class="clearfix"> </div>
							</div>
		                </div>
					</div>
					<div class="portfolio web mix_all" data-cat="web" style="display: inline-block; opacity: 1;">
						<div class="portfolio-wrapper">
							<div class="port-grid">
								<div class="port-grid-text port-grid-text-c">
									<p>//Lorem Ipsum</p>
									<label class="arrow-icon1 arrow-icon1-l"> </label>
								</div>
								<div class="port-grid-pic block last">
									<a href="#" class="b-link-stripe b-animate-go  thickbox">
								     <img src="{{ asset('front-theme-asset/mabur') }}/images/p3.jpg" /><div class="b-wrapper"><h2 class="b-animate b-from-left    b-delay03 "><img src="{{ asset('front-theme-asset/mabur') }}/images/plus.png" alt=""/></h2>
								  	</div></a>
								</div>
								<div class="clearfix"> </div>
							</div>
		                </div>
					</div>
					<div class="portfolio icon mix_all" data-cat="icon" style="display: inline-block; opacity: 1;">
						<div class="portfolio-wrapper">
							<div class="port-grid">
								<div class="port-grid-pic block last">
									<a href="#" class="b-link-stripe b-animate-go  thickbox">
								     <img src="{{ asset('front-theme-asset/mabur') }}/images/p4.jpg" /><div class="b-wrapper"><h2 class="b-animate b-from-left    b-delay03 "><img src="{{ asset('front-theme-asset/mabur') }}/images/plus.png" alt=""/></h2>
								  	</div></a>
								</div>
								<div class="port-grid-text port-grid-text-c">
									<p>//Lorem Ipsum</p>
									<label class="arrow-icon1 arrow-icon1-r"> </label>
								</div>
								<div class="clearfix"> </div>
							</div>
		                </div>
					</div>
					<div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
						<div class="portfolio-wrapper">
							<div class="port-grid">
								<div class="port-grid-pic block last">
									<a href="#" class="b-link-stripe b-animate-go  thickbox">
								     <img src="{{ asset('front-theme-asset/mabur') }}/images/p5.jpg" /><div class="b-wrapper"><h2 class="b-animate b-from-left    b-delay03 "><img src="{{ asset('front-theme-asset/mabur') }}/images/plus.png" alt=""/></h2>
								  	</div></a>
								</div>
								<div class="port-grid-text port-grid-text-c">
									<p>//Lorem Ipsum</p>
									<label class="arrow-icon1  arrow-icon1-r"> </label>
								</div>
								<div class="clearfix"> </div>
							</div>
		                </div>
					</div>
					<div class="portfolio card mix_all" data-cat="card" style="display: inline-block; opacity: 1;">
						<div class="portfolio-wrapper">
							<div class="port-grid">
								<div class="port-grid-pic block last">
									<a href="#" class="b-link-stripe b-animate-go  thickbox">
								     <img src="{{ asset('front-theme-asset/mabur') }}/images/p6.jpg" /><div class="b-wrapper"><h2 class="b-animate b-from-left    b-delay03 "><img src="{{ asset('front-theme-asset/mabur') }}/images/plus.png" alt=""/></h2>
								  	</div></a>
								</div>
								<div class="port-grid-text port-grid-text-c">
									<p>//Lorem Ipsum</p>
									<label class="arrow-icon1  arrow-icon1-r"> </label>
								</div>
								<div class="clearfix"> </div>
							</div>
		                </div>
					</div>
					<div class="clearfix"> </div>
				</div>
		</div>
		</div>
		<div class="clearfix"> </div>
		<!----//End-portfolio----->
		<!----start-blog---->
		<div id="blog" class="blog">
			<div class="container">
				<div class="head text-center">
					<h3><span> </span> Blog</h3>
					<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </p>
				</div>
			</div>
			<!---- start-blog-time-line---->
			<div class="blog-time-line">
				<div class="col-md-6 blog-time-line-left">
				</div>
				<div class="col-md-6 blog-time-line-right">
					<div class="blog-post">
						<div class="col-md-2 blog-post-date">
							<span><label>2 jan</label></span>
						</div>
						<div class="col-md-10 blog-post-info">
							<span class="categorie">Category : <a href="#">Traveling</a></span>
							<h4 class="post-head"><a href="#">Lorem Ipsum Dolor Sit Amet</a></h4>
							<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet </p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
					<div class="blog-post">
						<div class="col-md-2 blog-post-date">
							<span><label>1 jan</label></span>
						</div>
						<div class="col-md-10 blog-post-info">
							<span class="categorie">Category : <a href="#">Food</a></span>
							<h4 class="post-head"><a href="#">Etiam placerat mauris orci. </a></h4>
							<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet </p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
					<div class="blog-post">
						<div class="col-md-2 blog-post-date">
							<span><label>31 Des</label></span>
						</div>
						<div class="col-md-10 blog-post-info">
							<span class="categorie">Category : <a href="#">Traveling</a></span>
							<h4 class="post-head"><a href="#"> consectetur adipiscing elit. </a></h4>
							<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet </p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
					<div class="blog-post">
						<div class="col-md-2 blog-post-date">
							<span><label>28 des</label></span>
						</div>
						<div class="col-md-10 blog-post-info">
							<span class="categorie">Category : <a href="#">Adventure</a></span>
							<h4 class="post-head"><a href="#">Ut convallis risus vitae mauris sodales</a></h4>
							<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet </p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
					<div class="blog-post-time-line-connector">
						<span> </span>
					</div>
					<div class="more-blog-post-time-line-connector">
						<a href="#"><span>More</span></a>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!---- //End-blog-time-line---->
		</div>
		<!----//End-blog---->
		<!----start-test-monials---->
		<div  id="test" class="testmonials">
			<div class="container">
				<div class="head text-center">
						<h3><span> </span> Testimonial</h3>
						<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. </p>
				</div>
			<!----start-testmonial-time-line---->
			<div class="test-monial-time-line">
				<div class="col-md-6 test-monial-time-line-left">
					<div class="test-monial-time-line-grid test-monial-time-line-grid-l1">
						<div class="col-md-9 test-monial-time-line-left-text">
							<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a.</p>
						</div>
						<div class="col-md-3 test-monial-time-line-left-pic">
							<img src="{{ asset('front-theme-asset/mabur') }}/images/pic1.jpg" title="name" />
							<a href="#">John Doe</a>
						</div>
						<span class="grid-point"> </span>
					</div>
				</div>
				<div class="col-md-6 test-monial-time-line-right">
					<div class="test-monial-time-line-grid test-monial-time-line-grid-r1">
						<div class="col-md-3 test-monial-time-line-left-pic">
							<img src="{{ asset('front-theme-asset/mabur') }}/images/pic2.png" title="name" />
							<a href="#">John Doe</a>
						</div>
						<div class="col-md-9 test-monial-time-line-left-text">
							<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a.</p>
						</div>
						<span class="grid-point grid-point1"> </span>
					</div>
					<div class="test-monial-time-line-grid test-monial-time-line-grid-r2">
						<div class="col-md-3 test-monial-time-line-left-pic">
							<img src="{{ asset('front-theme-asset/mabur') }}/images/pic2.png" title="name" />
							<a href="#">John Doe</a>
						</div>
						<div class="col-md-9 test-monial-time-line-left-text">
							<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a.</p>
						</div>
						<span class="grid-point grid-point1"> </span>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="test-monial-timeline-connector">
					<span> </span>
				</div>
				<div class="clearfix"> </div>
				<a class="more-testmonial-time-line" href="#"> <span>More</span></a>
			</div>
			</div>
		</div>
		<div class="clearfix"> </div>
			<!----//End-testmonial-time-line---->
			<!----start-contact---->
				<div id="contact" class="contact">
					<div class="contact-map">
						<iframe src="https://maps.google.com/maps?t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=embed&amp;q=United+States&amp;ie=UTF8&amp;hq=&amp;hnear=United+States&amp;ll=37.359243,-91.525727&amp;spn=0.409036,0.837021&amp;z=11&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=embed&amp;q=United+States&amp;ie=UTF8&amp;hq=&amp;hnear=United+States&amp;ll=37.359243,-91.525727&amp;spn=0.409036,0.837021&amp;z=11&amp;source=embed"> </a></small>
					</div>
						<div class="contact-grids">
							<div class="col-md-6 contact-left">
								<h3><span> </span> Contact</h3>
								<p><i class="fa fa-map-marker"> </i> Jl. Ringroad Utara no 17AB, Yogyakarta, 55282</p>
								<form>
									<input type="text" value="Name " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
									<input type="text" value="info@mail.com *" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email@domain.com *';}">
									<textarea onfocus="if(this.value == 'Message *') this.value='';" onblur="if(this.value == '') this.value='Message *;">Message *</textarea>
									<p class="conditions"> <label><span>*</span>scelerisque sit amet felis sit nunc.</label></p>
									<span class="submit-btn"><input type="submit" value="Send"></span>
								</form>
							</div>
							<div class="col-md-6 contact-right">
								<span class="pin-map"> </span>
							</div>
							<div class="clearfix"> </div>
						</div>
				</div>
			<!----//End-contact---->
		<!----start-footer---->
		<div class="footer">
			<div class="container">
				<div class="footer-left">
					<a href="#"><img src="{{ asset('front-theme-asset/mabur') }}/images/footer-logo.png" title="mabur" /></a>
					<p>Template by <a href="http://w3layouts.com/">W3layouts</a></p>
				</div>
				<script type="text/javascript">
				$(document).ready(function() {
					/*
					var defaults = {
			  			containerID: 'toTop', // fading element id
						containerHoverID: 'toTopHover', // fading element hover id
						scrollSpeed: 1200,
						easingType: 'linear'
			 		};
					*/

					$().UItoTop({ easingType: 'easeOutQuart' });

				});
			</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
			</div>
		</div>
		<!----//End-footer---->
		<!----//End-container---->
	</body>
</html>

