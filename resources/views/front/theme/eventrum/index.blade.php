<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
<meta charset="utf-8">
<meta name = "format-detection" content = "telephone=no" />
<link rel="icon" href="{{ asset('front-theme-asset/eventrum') }}/images/favicon.ico">
<link rel="shortcut icon" href="{{ asset('front-theme-asset/eventrum') }}/images/favicon.ico" />
<link rel="stylesheet" href="{{ asset('front-theme-asset/eventrum') }}/css/touchTouch.css">
<link rel="stylesheet" href="{{ asset('front-theme-asset/eventrum') }}/css/style.css">
<script src="{{ asset('front-theme-asset/eventrum') }}/js/jquery.js"></script>
<script src="{{ asset('front-theme-asset/eventrum') }}/js/jquery-migrate-1.1.1.js"></script>
<script src="{{ asset('front-theme-asset/eventrum') }}/js/jquery.easing.1.3.js"></script>
<script src="{{ asset('front-theme-asset/eventrum') }}/js/script.js"></script>
<script src="{{ asset('front-theme-asset/eventrum') }}/js/superfish.js"></script>
<script src="{{ asset('front-theme-asset/eventrum') }}/js/jquery.equalheights.js"></script>
<script src="{{ asset('front-theme-asset/eventrum') }}/js/jquery.mobilemenu.js"></script>
<script src="{{ asset('front-theme-asset/eventrum') }}/js/tmStickUp.js"></script>
<script src="{{ asset('front-theme-asset/eventrum') }}/js/jquery.ui.totop.js"></script>
<script src="{{ asset('front-theme-asset/eventrum') }}/js/touchTouch.jquery.js"></script>
<script src="{{ asset('front-theme-asset/eventrum') }}/js/jquery.shuffle-images.js"></script>
<script>
  $(window).load(function(){
    $().UItoTop({ easingType: 'easeOutQuart' });
    $('.gallery .info').touchTouch();
  });

   $(document).ready(function(){
       $(".shuffle-me").shuffleImages({
         target: ".images > img"
       });
    });
</script>
<!--[if lt IE 8]>
 <div style=' clear: both; text-align:center; position: relative;'>
   <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
     <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
   </a>
</div>
<![endif]-->
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">
<![endif]-->
</head>

<body class="page1" id="top">
  <div class="main">
<!--==============================
              header
=================================-->
<header>
  <div class="container">
    <div class="row">
      <div class="grid_12">
        <h1>
          <a href="index.html">
            <img src="{{ asset('front-theme-asset/eventrum') }}/images/logo.png" alt="Logo alt">
          </a>
        </h1>
        <div class="socials">
          <a href="#" class="fa fa-twitter"></a>
          <a href="#" class="fa fa-facebook"></a>
          <a href="#" class="fa fa-google-plus"></a>
        </div>
        <div class="navigation ">
          <nav>
            <ul class="sf-menu">
             <li class="current"><a href="{{ asset('front-theme-asset/eventrum') }}/index.html">Home</a></li>
             <li><a href="about.html">About</a></li>
             <li><a href="services.html">Services</a></li>
             <li><a href="gallery.html">Gallery</a></li>
             <li><a href="contacts.html">Contacts</a></li>
           </ul>
          </nav>
          <div class="clear"></div>
        </div>
      </div>
    </div>
  </div>
</header>
<!--=====================
          Content
======================-->
<section id="content"><div class="ic">More Website Templates @ TemplateMonster.com - July 14, 2014!</div>
  <div class="container">
    <div class="row">
      <div class="page1_block">
        <div class="grid_6">
          <img src="{{ asset('front-theme-asset/eventrum') }}/images/page1_img1.jpg" alt="">
        </div>
        <div class="grid_6">
          <h2>Best Ideas for <br> Your Parties</h2>
          <div class="row">
            <div class="grid_3">
              <img src="{{ asset('front-theme-asset/eventrum') }}/images/page1_img2.jpg" alt="">
            </div>
            <div class="grid_3">
              <img src="{{ asset('front-theme-asset/eventrum') }}/images/page1_img3.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="grid_10 preffix_1">
        <div class="block1">
          <div class="block1_title">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mollis erat mattis neque facilisis, sit amet ultricies erat rutrumas facilisis, nulla vel viverra
            <span>Auctor, leo magna sodales felis, quis malesuada nibh odio ut velit</span>
          </div>
          <a href="#" class="btn">View Portfolio</a>
        </div>
      </div>

    </div>
  </div>
  <div class="shuffle-group">
    <div class="container">
      <div class="row">
        <div class="grid_8">
           <div data-si-mousemove-trigger="100" class="shuffle-me">
            <a href="#" class="info"><div class="shuffle_title">Birthday Parties <span>More</span></div></a>
            <div class="images">
              <img src="{{ asset('front-theme-asset/eventrum') }}/images/page1_img4.jpg" alt="">
              <img src="{{ asset('front-theme-asset/eventrum') }}/images/shuffle_1.jpg" alt="">
              <img src="{{ asset('front-theme-asset/eventrum') }}/images/shuffle_2.jpg" alt="">
            </div></div>
        </div>
        <div class="grid_4">
           <div data-si-mousemove-trigger="100" class="shuffle-me shuff__1">
            <a href="#" class="info"><div class="shuffle_title">Wedding Planning <span>More</span></div></a>
            <div class="images">
              <img src="{{ asset('front-theme-asset/eventrum') }}/images/page1_img5.jpg" alt="">
              <img src="{{ asset('front-theme-asset/eventrum') }}/images/shuffle_3.jpg" alt="">
              <img src="{{ asset('front-theme-asset/eventrum') }}/images/shuffle_4.jpg" alt="">
            </div></div>
             <div data-si-mousemove-trigger="100" class="shuffle-me shuff__1">
            <a href="#" class="info"><div class="shuffle_title">Corporate Event <span>More</span></div></a>
            <div class="images">
              <img src="{{ asset('front-theme-asset/eventrum') }}/images/page1_img6.jpg" alt="">
              <img src="{{ asset('front-theme-asset/eventrum') }}/images/shuffle_5.jpg" alt="">
              <img src="{{ asset('front-theme-asset/eventrum') }}/images/shuffle_6.jpg" alt="">
            </div></div>
        </div>
        <div class="grid_12">
          <h3>Welcome</h3>
          <img src="{{ asset('front-theme-asset/eventrum') }}/images/page1_img7.jpg" alt="" class="img_inner fleft">
          <div class="extra_wrapper">
            <p class="text1">Follow the link to find information about this <a href="http://blog.templatemonster.com/free-website-templates/" class="color1"  rel="nofollow">freebie</a>. </p>
            <p class="text1 offset__1">Want more <a href="http://www.templatemonster.com/category/event-planner-wordpress-themes/" rel="nofollow" class="color1">goodies</a> of this kind? Visit TemplateMonster.com</p>
            Curabitur vel lorem sit amet nulla ullamcorper fermentum. In vitae varius augue, eu consectetur ligula. Etiam dui eros, laoreet site amet est vel, commodo venenatis eros. Fusce adipiscing quam id risus sagittis, non consequat lacus interdum. Proin ut tinciduntl nulla, eu sodales arcu. Quisque viverra nulla nunc, eu ultrices libero ultricies eget. Phasellus accumsan justo vitae feugiat  placer. Praesent vel ultrices velit. Suspendisse risus justo, lacinia vitae eleifend sed, cursus sit amet massa. <br> <a href="#" class="link1">More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container gallery">
    <div class="row">
      <div class="grid_8">
        <h4>Recent Events</h4>
        <div class="row">
          <div class="grid_4">
            <div class="view">
              <img src="{{ asset('front-theme-asset/eventrum') }}/images/page1_img8.jpg" alt="" />
              <div class="mask">
                <a href="{{ asset('front-theme-asset/eventrum') }}/images/gallery/big1.jpg" class="info fa fa-search" title="Full Image"></a>
              </div>
            </div>
          </div>
          <div class="grid_4">
            <div class="view">
              <img src="{{ asset('front-theme-asset/eventrum') }}/images/page1_img9.jpg" alt="" />
              <div class="mask">
                <a href="{{ asset('front-theme-asset/eventrum') }}/images/gallery/big2.jpg" class="info fa fa-search" title="Full Image"></a>
              </div>
            </div>
          </div>
          <div class="grid_4">
            <div class="view">
              <img src="{{ asset('front-theme-asset/eventrum') }}/images/page1_img10.jpg" alt="" />
              <div class="mask">
                <a href="{{ asset('front-theme-asset/eventrum') }}/images/gallery/big3.jpg" class="info fa fa-search" title="Full Image"></a>
              </div>
            </div>
          </div>
          <div class="grid_4">
            <div class="view">
              <img src="{{ asset('front-theme-asset/eventrum') }}/images/page1_img11.jpg" alt="" />
              <div class="mask">
                <a href="{{ asset('front-theme-asset/eventrum') }}/images/gallery/big4.jpg" class="info fa fa-search" title="Full Image"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="grid_4">
        <h4>Testimonials</h4>
        <blockquote class="bq1">
          <img src="{{ asset('front-theme-asset/eventrum') }}/images/page1_img12.jpg" alt="">
          <div class="extra_wrapper">
            <p>“Curabitur vel lorem sit amet nulla erero fermentum. In vitae varius auguectetu ligula. Etiam dui eros, laoreet site am est vel commodo venenatisipiscing... ”</p>
            <div class="color2">- Eva Smith, Client</div>
          </div>
        </blockquote>
        <blockquote class="bq1">
          <img src="{{ asset('front-theme-asset/eventrum') }}/images/page1_img13.jpg" alt="">
          <div class="extra_wrapper">
            <p>“Hurabitur vel lorem sit amet nulla erero fermentum. In vitae varius auguectetu ligula. Etiam dui eros, laoreet site am est vel commodo venenatisipgolo... ”</p>
            <div class="color2">- Mike Brown, Client</div>
          </div>
        </blockquote>
      </div>
    </div>
  </div>
</section>

<!--==============================
              footer
=================================-->
<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="grid_12">
        <div class="copyright"><a href="#" class="f_logo"><img src="{{ asset('front-theme-asset/eventrum') }}/images/f_logo.png" alt=""></a> &copy; <span id="copyright-year"></span> | <a href="#">Privacy Policy</a>
          <div class="sub_copyright">
            Website designed by <a href="http://www.templatemonster.com/" rel="nofollow">TemplateMonster.com</a>
          </div>
        </div>
      </div>
    </div>

  </div>
</footer>
<a href="#" id="toTop" class="fa fa-chevron-up"></a>
</div>
</body>

</html>

