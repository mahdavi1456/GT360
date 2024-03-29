<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- <link rel="icon" href="assets/img/favicon.ico"> --}}

    <title>TS - Creative Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('front-theme-asset/ts') }}/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('front-theme-asset/ts') }}/assets/css/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('front-theme-asset/ts') }}/assets/css/style.css" rel="stylesheet">


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('front-theme-asset/ts') }}/assets/js/ie10-viewport-bug-workaround.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div id="main-header">
      <div class="logo">
        <h2>TS</h2>
      </div><!--/logo-->
      <div class="container centered">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h1>TS - Creative Template<br/>provides you to show your portfolio contents in beautiful layout.</h1>
          </div>
        </div><!--/row-->

      </div><!--/container-->
    </div><!--main-header-->
    <section class="features" id="features">
			<div class="container">
				<div class="row">

					<div data-wow-duration="500ms" class="sec-title text-center mb50 wow bounceInDown animated animated" style="visibility: visible; animation-duration: 500ms; animation-name: bounceInDown;">
						<h2>Features</h2>
						<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
					</div>

					<!-- service item -->
					<div data-wow-duration="500ms" class="col-md-4 wow fadeInLeft animated" style="visibility: visible; animation-duration: 500ms; animation-name: fadeInLeft;">
						<div class="service-item">
							<div class="service-icon">
								<i class="fa fa-github fa-2x"></i>
							</div>

							<div class="service-desc">
								<h3>Branding</h3>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore</p>
							</div>
						</div>
					</div>
					<!-- end service item -->

					<!-- service item -->
					<div data-wow-delay="500ms" data-wow-duration="500ms" class="col-md-4 wow fadeInUp animated" style="visibility: visible; animation-duration: 500ms; animation-delay: 500ms; animation-name: fadeInUp;">
						<div class="service-item">
							<div class="service-icon">
								<i class="fa fa-pencil fa-2x"></i>
							</div>

							<div class="service-desc">
								<h3>Development</h3>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore</p>
							</div>
						</div>
					</div>
					<!-- end service item -->

					<!-- service item -->
					<div data-wow-delay="900ms" data-wow-duration="500ms" class="col-md-4 wow fadeInRight animated" style="visibility: visible; animation-duration: 500ms; animation-delay: 900ms; animation-name: fadeInRight;">
						<div class="service-item">
							<div class="service-icon">
								<i class="fa fa-bullhorn fa-2x"></i>
							</div>

							<div class="service-desc">
								<h3>Consulting</h3>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore</p>
							</div>
						</div>
					</div>
					<!-- end service item -->

				</div>
			</div>
		</section>

    <div class="container ptb">
      <div class="row">

		<div class="sec-title text-center">
			<h2>Other Services We Provide</h2>
			<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
		</div>

	  </div>
      <div class="row">

        <div class="col-md-6">
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </div><!--/col-md-6-->
        <div class="col-md-6">
          <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software.</p>
        </div><!--/col-md-6-->
      </div><!--/row-->
    </div><!-- /.container -->
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <img src="{{ asset('front-theme-asset/ts') }}/assets/img/items.png" class="img-responsive" alt="">
        </div>
      </div><!--/row-->
    </div><!--/.container-->

    <div id="themesell-g">
      <div class="container">
      <div class="row">

		<div class="sec-title text-center">
			<h2>Check some of our latest works.</h2>
			<div class="devider"><i class="fa fa-heart-o fa-lg"></i></div>
		</div>

	  </div>
        <div class="row centered">

          <div class="col-md-8 col-md-offset-2">
            <p>Contrary to popular belief, Lorem Ipsum is not simply random text.<br/>It has roots in a piece of classical Latin literature.</p>

          </div><!--/col-md-8-->
        </div><!--/row-->
      </div><!--/.container-->
    <div class="portfolio-centered mt">
      <div class="recentitems portfolio">

        <div class="portfolio-item graphic-design">
          <div class="he-wrap tpl6">
          <img src="{{ asset('front-theme-asset/ts') }}/assets/img/portfolio/portfolio_09.jpg" class="img-responsive" alt="">
            <div class="he-view">
              <div class="bg a0" data-animate="fadeIn">
                <h3 class="a1" data-animate="fadeInDown">A Graphic Design Item</h3>
                <a data-rel="prettyPhoto" href="{{ asset('front-theme-asset/ts') }}/assets/img/portfolio/portfolio_09.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                <a href="#" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-eye"></i></a>
               </div><!-- he bg -->
            </div><!-- he view -->
          </div><!-- he wrap -->
        </div><!-- end col-12 -->

        <div class="portfolio-item web-design">
          <div class="he-wrap tpl6">
          <img src="{{ asset('front-theme-asset/ts') }}/assets/img/portfolio/portfolio_02.jpg" class="img-responsive" alt="">
            <div class="he-view">
              <div class="bg a0" data-animate="fadeIn">
                <h3 class="a1" data-animate="fadeInDown">A Web Design Item</h3>
                <a data-rel="prettyPhoto" href="{{ asset('front-theme-asset/ts') }}/assets/img/portfolio/portfolio_02.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class=" fa fa-search"></i></a>
                <a href="#" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-eye"></i></a>
              </div><!-- he bg -->
            </div><!-- he view -->
          </div><!-- he wrap -->
        </div><!-- end col-12 -->

        <div class="portfolio-item graphic-design">
          <div class="he-wrap tpl6">
          <img src="{{ asset('front-theme-asset/ts') }}/assets/img/portfolio/portfolio_03.jpg" class="img-responsive" alt="">
            <div class="he-view">
              <div class="bg a0" data-animate="fadeIn">
                <h3 class="a1" data-animate="fadeInDown">A Graphic Design Item</h3>
                <a data-rel="prettyPhoto" href="{{ asset('front-theme-asset/ts') }}/assets/img/portfolio/portfolio_03.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                <a href="#" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-eye"></i></a>
              </div><!-- he bg -->
            </div><!-- he view -->
          </div><!-- he wrap -->
        </div><!-- end col-12 -->

        <div class="portfolio-item graphic-design">
          <div class="he-wrap tpl6">
          <img src="{{ asset('front-theme-asset/ts') }}/assets/img/portfolio/portfolio_04.jpg" class="img-responsive" alt="">
            <div class="he-view">
              <div class="bg a0" data-animate="fadeIn">
                <h3 class="a1" data-animate="fadeInDown">A Graphic Design Item</h3>
                <a data-rel="prettyPhoto" href="{{ asset('front-theme-asset/ts') }}/assets/img/portfolio/portfolio_04.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                <a href="#" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-eye"></i></a>
              </div><!-- he bg -->
            </div><!-- he view -->
          </div><!-- he wrap -->
        </div><!-- end col-12 -->

        <div class="portfolio-item books">
          <div class="he-wrap tpl6">
          <img src="{{ asset('front-theme-asset/ts') }}/assets/img/portfolio/portfolio_05.jpg" class="img-responsive" alt="">
            <div class="he-view">
              <div class="bg a0" data-animate="fadeIn">
                <h3 class="a1" data-animate="fadeInDown">A Book Design Item</h3>
                <a data-rel="prettyPhoto" href="{{ asset('front-theme-asset/ts') }}/assets/img/portfolio/portfolio_05.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                <a href="#" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-eye"></i></a>
              </div><!-- he bg -->
            </div><!-- he view -->
          </div><!-- he wrap -->
        </div><!-- end col-12 -->

        <div class="portfolio-item graphic-design">
          <div class="he-wrap tpl6">
          <img src="{{ asset('front-theme-asset/ts') }}/assets/img/portfolio/portfolio_06.jpg" class="img-responsive" alt="">
            <div class="he-view">
              <div class="bg a0" data-animate="fadeIn">
                <h3 class="a1" data-animate="fadeInDown">A Graphic Design Item</h3>
                <a data-rel="prettyPhoto" href="{{ asset('front-theme-asset/ts') }}/assets/img/portfolio/portfolio_06.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                <a href="#" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-eye"></i></a>
               </div><!-- he bg -->
            </div><!-- he view -->
          </div><!-- he wrap -->
        </div><!-- end col-12 -->

        <div class="portfolio-item web-design">
          <div class="he-wrap tpl6">
          <img src="{{ asset('front-theme-asset/ts') }}/assets/img/portfolio/portfolio_07.jpg" class="img-responsive" alt="">
            <div class="he-view">
              <div class="bg a0" data-animate="fadeIn">
                <h3 class="a1" data-animate="fadeInDown">A Web Design Item</h3>
                <a data-rel="prettyPhoto" href="{{ asset('front-theme-asset/ts') }}/assets/img/portfolio/portfolio_07.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                <a href="#" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-eye"></i></a>
              </div><!-- he bg -->
            </div><!-- he view -->
          </div><!-- he wrap -->
        </div><!-- end col-12 -->

        <div class="portfolio-item graphic-design">
          <div class="he-wrap tpl6">
          <img src="{{ asset('front-theme-asset/ts') }}/assets/img/portfolio/portfolio_08.jpg" class="img-responsive" alt="">
            <div class="he-view">
              <div class="bg a0" data-animate="fadeIn">
                <h3 class="a1" data-animate="fadeInDown">A Graphic Design Item</h3>
                <a data-rel="prettyPhoto" href="{{ asset('front-theme-asset/ts') }}/assets/img/portfolio/portfolio_08.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                <a href="#" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-eye"></i></a>
              </div><!-- he bg -->
            </div><!-- he view -->
          </div><!-- he wrap -->
        </div><!-- end col-12 -->

        <div class="portfolio-item graphic-design">
          <div class="he-wrap tpl6">
          <img src="{{ asset('front-theme-asset/ts') }}/assets/img/portfolio/portfolio_01.jpg" class="img-responsive" alt="">
            <div class="he-view">
              <div class="bg a0" data-animate="fadeIn">
                <h3 class="a1" data-animate="fadeInDown">A Graphic Design Item</h3>
                <a data-rel="prettyPhoto" href="{{ asset('front-theme-asset/ts') }}/assets/img/portfolio/portfolio_01.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                <a href="#" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-eye"></i></a>
              </div><!-- he bg -->
            </div><!-- he view -->
          </div><!-- he wrap -->
        </div><!-- end col-12 -->

        <div class="portfolio-item books">
          <div class="he-wrap tpl6">
          <img src="{{ asset('front-theme-asset/ts') }}/assets/img/portfolio/portfolio_10.jpg" class="img-responsive" alt="">
            <div class="he-view">
              <div class="bg a0" data-animate="fadeIn">
                <h3 class="a1" data-animate="fadeInDown">A Book Design Item</h3>
                <a data-rel="prettyPhoto" href="{{ asset('front-theme-asset/ts') }}/assets/img/portfolio/portfolio_10.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                <a href="" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-eye"></i></a>
              </div><!-- he bg -->
            </div><!-- he view -->
          </div><!-- he wrap -->
        </div><!-- end col-12 -->
       </div><!-- portfolio -->
    </div><!-- portfolio container -->

    <div class="container mt">
        <div class="row clients centered">
          <p class="mb">Some of our clients that I had the pleasure to working for.</p>
          <div class="col-sm-2 col-sm-offset-1">
            <img src="{{ asset('front-theme-asset/ts') }}/assets/img/client1.png" alt="">
          </div>
          <div class="col-sm-2">
            <img src="{{ asset('front-theme-asset/ts') }}/assets/img/client3.png" alt="">
          </div>
          <div class="col-sm-2">
            <img src="{{ asset('front-theme-asset/ts') }}/assets/img/client2.png" alt="">
          </div>
          <div class="col-sm-2">
            <img src="{{ asset('front-theme-asset/ts') }}/assets/img/client4.png" alt="">
          </div>
          <div class="col-sm-2">
            <img src="{{ asset('front-theme-asset/ts') }}/assets/img/client5.png" alt="">
          </div>
        </div><!--/row-->
      </div><!--/container-->
    </div><!--/.G-->

    <div id="themesell-sep">
      <div class="container">
        <div class="row centered">
          <div class="col-md-8 col-md-offset-2">
            <h1>We live in the amazing San Francisco</h1>
            <h3 class="mb">Lorem Ipsum is simply dummy text<br/>of the printing and typesetting industry.</h3>
            <button class="btn btn-conf btn-clear">Request for Information</button>
          </div>
        </div><!--/row-->
      </div><!--/container-->
    </div><!--/.sep-->

    <div id="themesell-footer">
      <div class="container">
        <div class="row centered">
          <div class="col-md-8 col-md-offset-2">
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-dribbble"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
          </div><!--/col-md-8-->
        </div>
      </div><!--/container-->
    </div><!--/.F-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('front-theme-asset/ts') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('front-theme-asset/ts') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('front-theme-asset/ts') }}/assets/js/retina-1.1.0.js"></script>
    <script src="{{ asset('front-theme-asset/ts') }}/assets/js/jquery.hoverdir.js"></script>
    <script src="{{ asset('front-theme-asset/ts') }}/assets/js/jquery.hoverex.min.js"></script>
    <script src="{{ asset('front-theme-asset/ts') }}/assets/js/jquery.prettyPhoto.js"></script>
    <script src="{{ asset('front-theme-asset/ts') }}/assets/js/jquery.isotope.min.js"></script>
    <script src="{{ asset('front-theme-asset/ts') }}/assets/js/custom.js"></script>


    <script>
// Portfolio
(function($) {
  "use strict";
  var $container = $('.portfolio'),
    $items = $container.find('.portfolio-item'),
    portfolioLayout = 'fitRows';

    if( $container.hasClass('portfolio-centered') ) {
      portfolioLayout = 'masonry';
    }

    $container.isotope({
      filter: '*',
      animationEngine: 'best-available',
      layoutMode: portfolioLayout,
      animationOptions: {
      duration: 750,
      easing: 'linear',
      queue: false
    },
    masonry: {
    }
    }, refreshWaypoints());

    function refreshWaypoints() {
      setTimeout(function() {
      }, 1000);
    }

    $('nav.portfolio-filter ul a').on('click', function() {
        var selector = $(this).attr('data-filter');
        $container.isotope({ filter: selector }, refreshWaypoints());
        $('nav.portfolio-filter ul a').removeClass('active');
        $(this).addClass('active');
        return false;
    });

    function getColumnNumber() {
      var winWidth = $(window).width(),
      columnNumber = 1;

      if (winWidth > 1200) {
        columnNumber = 5;
      } else if (winWidth > 950) {
        columnNumber = 4;
      } else if (winWidth > 600) {
        columnNumber = 3;
      } else if (winWidth > 400) {
        columnNumber = 2;
      } else if (winWidth > 250) {
        columnNumber = 1;
      }
        return columnNumber;
      }

      function setColumns() {
        var winWidth = $(window).width(),
        columnNumber = getColumnNumber(),
        itemWidth = Math.floor(winWidth / columnNumber);

        $container.find('.portfolio-item').each(function() {
          $(this).css( {
          width : itemWidth + 'px'
        });
      });
    }

    function setPortfolio() {
      setColumns();
      $container.isotope('reLayout');
    }

    $container.imagesLoaded(function () {
      setPortfolio();
    });

    $(window).on('resize', function () {
    setPortfolio();
  });
})(jQuery);
</script>
  </body>
</html>
