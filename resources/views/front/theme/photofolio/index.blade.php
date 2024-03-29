<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
<meta charset="utf-8">
<meta name = "format-detection" content = "telephone=no" />
{{-- <link rel="icon" href="favicon.ico"> --}}
{{-- <link rel="shortcut icon" href="images/favicon.ico" /> --}}
<link rel="stylesheet" href="{{ asset('front-theme-asset/photofolio') }}/css/style.css">
<script src="{{ asset('front-theme-asset/photofolio') }}/js/jquery.js"></script>
<script src="{{ asset('front-theme-asset/photofolio') }}/js/jquery-migrate-1.1.1.js"></script>
<script src="{{ asset('front-theme-asset/photofolio') }}/js/jquery.easing.1.3.js"></script>
<script src="{{ asset('front-theme-asset/photofolio') }}/js/script.js"></script>
<script src="{{ asset('front-theme-asset/photofolio') }}/js/superfish.js"></script>
<script src="{{ asset('front-theme-asset/photofolio') }}/js/jquery.equalheights.js"></script>
<script src="{{ asset('front-theme-asset/photofolio') }}/js/jquery.mobilemenu.js"></script>
<script src="{{ asset('front-theme-asset/photofolio') }}/js/tmStickUp.js"></script>
<script src="{{ asset('front-theme-asset/photofolio') }}/js/jquery.ui.totop.js"></script>
<script src="{{ asset('front-theme-asset/photofolio') }}/js/jquery.shuffle-images.js"></script>
<script>
 $(window).load(function(){
  $().UItoTop({ easingType: 'easeOutQuart' });
  $('#stuck_container').tmStickUp({});
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
<!--==============================
              header
=================================-->
<header>
  <div class="header_top">
    <div class="container">
      <div class="row">
        <div class="grid_12">
          <h1><a href="#">Photo.Folio <br> Capturing Life </a></h1>
          your photographer
        </div>
      </div>
    </div>
  </div>
  <section id="stuck_container">
  <!--==============================
              Stuck menu
  =================================-->
    <div class="container">
      <div class="row">
        <div class="grid_12 ">
          <h1 class="logo">
            <a href="index.html">
              Photo.Folio
            </a>
          </h1>
          <div class="navigation ">
            <nav>
              <ul class="sf-menu">
               <li class="current"><a href="index.html">Home</a></li>
               <li><a href="about.html">About</a></li>
               <li><a href="gallery.html">Gallery</a></li>
               <li><a href="blog.html">Blog</a></li>
               <li><a href="contacts.html">Contacts</a></li>
             </ul>
            </nav>
            <div class="clear"></div>
          </div>
         <div class="clear"></div>
        </div>
     </div>
    </div>
  </section>
</header>
<!--=====================
          Content
======================-->
<section id="content"><div class="ic">More Website Templates @ TemplateMonster.com - August11, 2014!</div>
  <div class="container">
    <div class="row">
      <div class="grid_12">
        <h2 class="ta__center">Recent  Photos</h2>
        <div class="shuffle-group">
          <div class="row">
            <div class="grid_8">
              <div data-si-mousemove-trigger="100"  class="shuffle-me offset__1">
                <a href="gallery.html" class="info" target="_blank"></a>
                <div class="images">
                  <img src="{{ asset('front-theme-asset/photofolio') }}/images/gall_1.jpg" alt="">
                  <img src="{{ asset('front-theme-asset/photofolio') }}/images/gall_1-1.jpg" alt="">
                  <img src="{{ asset('front-theme-asset/photofolio') }}/images/gall_1-2.jpg" alt="">
                </div>
              </div>
            </div>
            <div class="grid_4">
              <div data-si-mousemove-trigger="100" class="shuffle-me">
                <a href="gallery.html" class="info" target="_blank"></a>
                <div class="images">
                  <img src="{{ asset('front-theme-asset/photofolio') }}/images/gall_2.jpg" alt="">
                  <img src="{{ asset('front-theme-asset/photofolio') }}/images/gall_2-1.jpg" alt="">
                  <img src="{{ asset('front-theme-asset/photofolio') }}/images/gall_2-2.jpg" alt="">
                </div>
              </div>
              <div data-si-mousemove-trigger="100" class="shuffle-me offset__1">
                <a href="gallery.html" class="info" target="_blank"></a>
                <div class="{{ asset('front-theme-asset/photofolio') }}/images">
                  <img src="{{ asset('front-theme-asset/photofolio') }}/images/gall_3.jpg" alt="">
                  <img src="{{ asset('front-theme-asset/photofolio') }}/images/gall_3-1.jpg" alt="">
                  <img src="{{ asset('front-theme-asset/photofolio') }}/images/gall_3-2.jpg" alt="">
                </div>
              </div>
            </div>
            <div class="clear"></div>
            <div class="grid_4">
              <div data-si-mousemove-trigger="100" class="shuffle-me">
                <a href="gallery.html" class="info" target="_blank"></a>
                <div class="images">
                  <img src="{{ asset('front-theme-asset/photofolio') }}/images/gall_4.jpg" alt="">
                  <img src="{{ asset('front-theme-asset/photofolio') }}/images/gall_4-1.jpg" alt="">
                  <img src="{{ asset('front-theme-asset/photofolio') }}/images/gall_4-2.jpg" alt="">
                </div>
              </div>
              <div data-si-mousemove-trigger="100" class="shuffle-me">
                <a href="gallery.html" class="info" target="_blank"></a>
                <div class="images">
                  <img src="{{ asset('front-theme-asset/photofolio') }}/images/gall_5.jpg" alt="">
                  <img src="{{ asset('front-theme-asset/photofolio') }}/images/gall_5-1.jpg" alt="">
                  <img src="{{ asset('front-theme-asset/photofolio') }}/images/gall_5-2.jpg" alt="">
                </div>
              </div>
            </div>
            <div class="grid_8">
              <div data-si-mousemove-trigger="100"  class="shuffle-me">
                <a href="gallery.html" class="info" target="_blank"></a>
                <div class="images">
                  <img src="{{ asset('front-theme-asset/photofolio') }}/images/gall_6.jpg" alt="">
                  <img src="{{ asset('front-theme-asset/photofolio') }}/images/gall_6-1.jpg" alt="">
                  <img src="{{ asset('front-theme-asset/photofolio') }}/images/gall_6-2.jpg" alt="">
                </div>
              </div>
            </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  <div class="sep-1"></div>
  <div class="container">
    <div class="row">
      <div class="grid_8">
        <h3>Bio</h3>
        <img src="{{ asset('front-theme-asset/photofolio') }}/images/page1_img1.jpg" alt="" class="img_inner fleft noresize">
        <div class="extra_wrapper"><p class="offset__1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mollis erat mattis neque facilisis, sit amet ultricies erat rutrum. Cras facilisis, nulla vel viverra auctor, leo magna sodales felis, quis malesuada nibh odio ut velit. Proin pharetra luctus diam, a scelerisque eros convallis accumsan. Maecenas vehicula egestas  derto venenatis. Duis massa elit, auctor non pellentesque vel, aliquet sit amet erat.</p></div>
        <div class="clear"></div>
        <p>Find detailed information about the <a href=" http://blog.templatemonster.com/free-website-templates/" rel="nofollow" class="color1"><strong>freebie</strong></a> here. </p>
        <p>Visit TemplateMonster.com to find more <a href="http://www.templatemonster.com/properties/topic/design-photography/" rel="nofollow" class="color1"><strong>goodies</strong></a> of this kind.</p>
        Proin pharetra luctus diam, a scelerisque eros convallis accumsan. Maecenas vehicula egestas venenatis. <br>
        <a href="#" class="btn">more</a>
      </div>
      <div class="grid_4">
        <h3>Follow me</h3>
        <ul class="socials">
          <li>
            <div class="fa fa-facebook"></div>
            <a href="#">Be a fan on Facebook</a>
          </li>
          <li>
            <div class="fa fa-twitter"></div>
            <a href="#">Follow me on Twitter</a>
          </li>
          <li>
            <div class="fa fa-google-plus"></div>
            <a href="#">Follow me on Google+</a>
          </li>
          <li>
            <div class="fa fa-youtube"></div>
            <a href="#">Follow me on YouTube</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="sep-1"></div>
  <div class="container">
    <div class="row">
      <div class="grid_7">
        <h3 class="head__1">From the Blog</h3>
        <time class="time-1" datetime="2014-01-01">24.07 <br> 2014</time><p class="offset__2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mollis erat mattis neque facilisis, sit amet ultricies erat rutrum. Cras facilisis, nulla vel viverra auctor, leo magna sodales felis, quis malesuada nibh odio ut velit. Proin pharetra luctus diam, a scelerisque eros convallis accumsan. Maecenas vehicula egestas  derto venenatis. Duis </p>
        Dorem ipsum dolor sit amet, consectetur adipiscing elit. In mollis erat mattis neque facilisis, sit amet ultricies erat rutrum. Cras facilisis, nulla vel viverra auctor, leo magna sodales felis. <br>
        <a href="#" class="btn">more</a>
      </div>
      <div class="grid_4 preffix_1">
        <h3 class="head__1">Testimonials</h3>
        <blockquote class="bq_1">
          <img src="{{ asset('front-theme-asset/photofolio') }}/images/page1_img2.jpg" alt="" class="img_inner fleft noresize">
          <div class="extra_wrapper">
            <div class="bq_title">Lize Jons</div>
          </div>
          <div class="clear"></div>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. In mollis erat mattis neque facilisis, sit amet ultricies erat rutrum. Cras facilisis, nulla vel viverra auctor...
          <br>
          <a href="#" class="btn">more</a>
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
        <h2>Contacts</h2>
        <div class="footer_phone">+1 800 559 6580</div>
        <a href="#" class="footer_mail">info@demolink.org</a>
        <div class="sub-copy">Website designed by <a href="http://www.templatemonster.com/" rel="nofollow">TemplateMonster.com</a></div>
      </div>
    </div>

  </div>
</footer>
<a href="#" id="toTop" class="fa fa-chevron-up"></a>
</body>
</html>

