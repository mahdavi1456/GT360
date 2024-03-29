<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('front-theme-asset/macro') }}/ico/favicon.png">

    <title>MARCO - One Page Bootstrap 3 Theme</title>

    <link href="{{ asset('front-theme-asset/macro') }}/css/hover_pack.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('front-theme-asset/macro') }}/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('front-theme-asset/macro') }}/css/main.css" rel="stylesheet">
    <link href="{{ asset('front-theme-asset/macro') }}/css/colors/color-74c9be.css" rel="stylesheet">
    <link href="{{ asset('front-theme-asset/macro') }}/css/animations.css" rel="stylesheet">
    <link href="{{ asset('front-theme-asset/macro') }}/css/font-awesome.min.css" rel="stylesheet">


    <!-- JavaScripts needed at the beginning
    ================================================== -->
    <script type="text/javascript" src="http://alvarez.is/demo/marco/assets/js/twitterFetcher_v10_min.js"></script>

    <!-- MAP SCRIPT - ALL CONFIGURATION IS PLACED HERE - VIEW OUR DOCUMENTATION FOR FURTHER INFORMATION -->
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&sensor=false"></script>
    <script type="text/javascript">
        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 11,

                scrollwheel: false,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(40.6700, -73.9400), // New York

                // How you would like to style the map.
                // This is where you would paste any style found on Snazzy Maps.
                styles: [{
                    featureType: 'water',
                    stylers: [{
                        color: '#74c9be'
                    }, {
                        visibility: 'on'
                    }]
                }, {
                    featureType: 'landscape',
                    stylers: [{
                        color: '#f2f2f2'
                    }]
                }, {
                    featureType: 'road',
                    stylers: [{
                        saturation: -100
                    }, {
                        lightness: 45
                    }]
                }, {
                    featureType: 'road.highway',
                    stylers: [{
                        visibility: 'simplified'
                    }]
                }, {
                    featureType: 'road.arterial',
                    elementType: 'labels.icon',
                    stylers: [{
                        visibility: 'off'
                    }]
                }, {
                    featureType: 'administrative',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#444444'
                    }]
                }, {
                    featureType: 'transit',
                    stylers: [{
                        visibility: 'off'
                    }]
                }, {
                    featureType: 'poi',
                    stylers: [{
                        visibility: 'off'
                    }]
                }]
            };

            // Get the HTML DOM element that will contain your map
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');

            // Create the Google Map using out element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);
        }
    </script>


    <!-- Main Jquery & Hover Effects. Should load first -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="{{ asset('front-theme-asset/macro') }}/js/hover_pack.js"></script>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>


    <!==========HEADERWRAP=================================================================================================================================================================================================================================>
        <div id="headerwrap">
            <div class="container">
                <div class="row centered">
                    <div class="col-lg-8 col-lg-offset-2 mt">
                        <h1 class="animation slideDown">{{ $settingModel->getSetting('title', $accountId, $projectId) }}
                        </h1>
                        <p class="mt"><button type="button"
                                class="btn btn-cta btn-lg">{{ $settingModel->getSetting('button_title', $accountId, $projectId) }}</button>
                        </p>
                    </div>

                </div><!-- /row -->
            </div><!-- /container -->
        </div> <!-- /headerwrap -->

        <!==========BLOG
            POSTS=================================================================================================================================================================================================================================>
            <div class="container">

                <div class="row mt centered ">
                    <div class="col-lg-4 col-lg-offset-4">
                        <h3>{{ $settingModel->getSetting('title_sec1', $accountId, $projectId) }}</h3>
                        <hr>
                    </div>
                </div><!-- /row -->

                <div class="row mt">
                    <div class="col-lg-4 col-md-4 col-xs-12 desc">
                        <a class="b-link-fade b-animate-go" href="#"><img width="350"
                                src="{{ asset(ert('tsp') . $settingModel->getSetting('image1_sec1', $accountId, $projectId)) }}"
                                alt="" />
                            <div class="b-wrapper">
                                <h4 class="b-from-left b-animate b-delay03">Post 1</h4>
                                <p class="b-from-right b-animate b-delay03">Read More.</p>
                            </div>
                        </a>
                        <p>{{ $settingModel->getSetting('title1_sec1', $accountId, $projectId) }}</p>
                        <p class="lead">{{ $settingModel->getSetting('subtitle1_sec1', $accountId, $projectId) }}</p>
                        <hr-d>
                            <p class="time"><i class="fa fa-comment-o"></i> 3 | <i class="fa fa-calendar"></i> 14 Nov.
                            </p>
                    </div><!-- col-lg-4 -->

                    <div class="col-lg-4 col-md-4 col-xs-12 desc">
                        <a class="b-link-fade b-animate-go" href="#"><img width="350"
                                src="{{ asset(ert('tsp') . $settingModel->getSetting('image2_sec1', $accountId, $projectId)) }}"
                                alt="" />
                            <div class="b-wrapper">
                                <h4 class="b-from-left b-animate b-delay03">Post 2</h4>
                                <p class="b-from-right b-animate b-delay03">Read More.</p>
                            </div>
                        </a>
                        <p>{{ $settingModel->getSetting('title2_sec1', $accountId, $projectId) }}</p>
                        <p class="lead">{{ $settingModel->getSetting('subtitle2_sec1', $accountId, $projectId) }}</p>
                        <hr-d>
                            <p class="time"><i class="fa fa-comment-o"></i> 1 | <i class="fa fa-calendar"></i> 13 Oct.
                            </p>
                    </div><!-- col-lg-4 -->

                    <div class="col-lg-4 col-md-4 col-xs-12 desc">
                        <a class="b-link-fade b-animate-go" href="#"><img width="350"
                                src="{{ asset(ert('tsp') . $settingModel->getSetting('image3_sec1', $accountId, $projectId)) }}"
                                alt="" />
                            <div class="b-wrapper">
                                <h4 class="b-from-left b-animate b-delay03">Post 3</h4>
                                <p class="b-from-right b-animate b-delay03">Read More.</p>
                            </div>
                        </a>
                        <p>{{ $settingModel->getSetting('title3_sec1', $accountId, $projectId) }}</p>
                        <p class="lead">{{ $settingModel->getSetting('subtitle3_sec1', $accountId, $projectId) }}
                        </p>
                        <hr-d>
                            <p class="time"><i class="fa fa-comment-o"></i> 1 | <i class="fa fa-calendar"></i> 13 Oct.
                            </p>
                    </div><!-- col-lg-4 -->

                </div><!-- /row -->
            </div><!-- /container -->

            <!==========CALL TO ACTION
                1===========================================================================================================================================================================================================================>
                <div id="cta01">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <h2>{{ $settingModel->getSetting('title_sec2', $accountId, $projectId) }}</h2>
                                <button type="button"
                                    class="btn btn-cta btn-lg">{{ $settingModel->getSetting('button_title_sec2', $accountId, $projectId) }}</button>
                            </div>
                        </div><!-- /row -->
                    </div><!-- /container -->
                </div>
                <! --/cta01 -->

                    <!==========PORTFOLIO
                        SECTION==========================================================================================================================================================================================================================>
                        <div class="container">
                            <div class="row mt centered ">
                                <div class="col-lg-4 col-lg-offset-4">
                                    <h3>{{ $settingModel->getSetting('title_sec3', $accountId, $projectId) }}</h3>
                                    <hr>
                                </div>
                            </div><!-- /row -->
                            <div class="row mt centered">
                                <div class="col-lg-4 desc">
                                    <a class="b-link-fade b-animate-go" href="#"><img width="350"
                                            src="{{ asset(ert('tsp') . $settingModel->getSetting('image1_sec3', $accountId, $projectId)) }}"
                                            alt="" />
                                        <div class="b-wrapper">
                                            <h4 class="b-from-left b-animate b-delay03">Project 1</h4>
                                            <p class="b-from-right b-animate b-delay03">View Details</p>
                                        </div>
                                    </a>
                                    <p>{{ $settingModel->getSetting('title1_sec3', $accountId, $projectId) }} <i
                                            class="fa fa-heart-o"></i></p>
                                </div>
                                <div class="col-lg-4 desc">
                                    <a class="b-link-fade b-animate-go" href="#"><img width="350"
                                            src="{{ asset(ert('tsp') . $settingModel->getSetting('image2_sec3', $accountId, $projectId)) }}"
                                            alt="" />
                                        <div class="b-wrapper">
                                            <h4 class="b-from-left b-animate b-delay03">Project 2</h4>
                                            <p class="b-from-right b-animate b-delay03">View Details</p>
                                        </div>
                                    </a>
                                    <p>{{ $settingModel->getSetting('title2_sec3', $accountId, $projectId) }}<i
                                            class="fa fa-heart-o"></i></p>
                                </div>
                                <div class="col-lg-4 desc">
                                    <a class="b-link-fade b-animate-go" href="#"><img width="350"
                                            src="{{ asset(ert('tsp') . $settingModel->getSetting('image3_sec3', $accountId, $projectId)) }}"
                                            alt="" />
                                        <div class="b-wrapper">
                                            <h4 class="b-from-left b-animate b-delay03">Project 3</h4>
                                            <p class="b-from-right b-animate b-delay03">View Details</p>
                                        </div>
                                    </a>
                                    <p>{{ $settingModel->getSetting('title3_sec3', $accountId, $projectId) }}<i
                                            class="fa fa-heart-o"></i></p>
                                </div>
                            </div><!-- /row -->
                            <div class="row mt centered">
                                <div class="col-lg-4 desc">
                                    <a class="b-link-fade b-animate-go" href="#"><img width="350"
                                            src="{{ asset(ert('tsp') . $settingModel->getSetting('image4_sec3', $accountId, $projectId)) }}"
                                            alt="" />
                                        <div class="b-wrapper">
                                            <h4 class="b-from-left b-animate b-delay03">Project 4</h4>
                                            <p class="b-from-right b-animate b-delay03">View Details</p>
                                        </div>
                                    </a>
                                    <p>{{ $settingModel->getSetting('title4_sec3', $accountId, $projectId) }} <i
                                            class="fa fa-heart-o"></i></p>
                                </div>
                                <div class="col-lg-4 desc">
                                    <a class="b-link-fade b-animate-go" href="#"><img width="350"
                                            src="{{ asset(ert('tsp') . $settingModel->getSetting('image5_sec3', $accountId, $projectId)) }}"
                                            alt="" />
                                        <div class="b-wrapper">
                                            <h4 class="b-from-left b-animate b-delay03">Project 5</h4>
                                            <p class="b-from-right b-animate b-delay03">View Details</p>
                                        </div>
                                    </a>
                                    <p>{{ $settingModel->getSetting('title5_sec3', $accountId, $projectId) }} <i
                                            class="fa fa-heart-o"></i></p>
                                </div>
                                <div class="col-lg-4 desc">
                                    <a class="b-link-fade b-animate-go" href="#"><img width="350"
                                            src="{{ asset(ert('tsp') . $settingModel->getSetting('image6_sec3', $accountId, $projectId)) }}"
                                            alt="" />
                                        <div class="b-wrapper">
                                            <h4 class="b-from-left b-animate b-delay03">Project 6</h4>
                                            <p class="b-from-right b-animate b-delay03">View Details</p>
                                        </div>
                                    </a>
                                    <p>{{ $settingModel->getSetting('title6_sec3', $accountId, $projectId) }}<i
                                            class="fa fa-heart-o"></i></p>
                                </div>
                            </div><!-- /row -->

                            <div class="row mt centered">
                                <div class="col-lg-4 col-lg-offset-4">
                                    <button type="button" class="btn btn-theme btn-lg">VIEW OUR PORTFOLIO</button>
                                </div>
                            </div><!-- /row -->
                        </div><!-- /container -->

                        <!==========BRANDS &
                            CLIENTS============================================================================================================================================================================================================================>
                            <div id="grey">
                                <div class="container">
                                    <div class="row mt centered ">
                                        <div class="col-lg-4 col-lg-offset-4">
                                            <h3>{{ $settingModel->getSetting('title_sec4', $accountId, $projectId) }}
                                            </h3>
                                            <hr>
                                        </div><!-- /col-lg-4 -->
                                    </div><!-- /row -->

                                    <div class="row centered">
                                        <div class="col-lg-3 pt">
                                            <img class="img-responsive"
                                                src="{{ asset(ert('tsp') . $settingModel->getSetting('image1_sec4', $accountId, $projectId)) }}"
                                                alt="">
                                        </div>
                                        <div class="col-lg-3 pt">
                                            <img class="img-responsive"
                                                src="{{ asset(ert('tsp') . $settingModel->getSetting('image2_sec4', $accountId, $projectId)) }}"
                                                alt="">
                                        </div>
                                        <div class="col-lg-3 pt">
                                            <img class="img-responsive"
                                                src="{{ asset(ert('tsp') . $settingModel->getSetting('image3_sec4', $accountId, $projectId)) }}"
                                                alt="">
                                        </div>
                                        <div class="col-lg-3 pt">
                                            <img class="img-responsive"
                                                src="{{ asset(ert('tsp') . $settingModel->getSetting('image4_sec4', $accountId, $projectId)) }}"
                                                alt="">
                                        </div>

                                    </div><!-- /row -->
                                </div><!-- /container -->
                            </div><!-- /grey -->


                            <!==========BLACK
                                SECTION==============================================================================================================================================================================================================================>
                                <div id="black">
                                    <div class="container">
                                        <div class="row mt centered">
                                            <div class="col-lg-4 col-lg-offset-4">
                                                <h3>{{ $settingModel->getSetting('title1_sec5', $accountId, $projectId) }}
                                                </h3>
                                                <hr>
                                            </div><!-- /col-lg-4 -->
                                        </div><!-- /row -->

                                        <div class="row mt">
                                            <div class="col-lg-8 col-lg-offset-2">
                                                <p>{{ $settingModel->getSetting('title2_sec5', $accountId, $projectId) }}
                                                </p>
                                            </div>
                                            <! --/col-lg-8 -->
                                        </div><!-- /row -->
                                    </div><!-- /container -->
                                </div><!-- /black -->


                                <!==========FEATURED
                                    ICONS=============================================================================================================================================================================================================================>
                                    <div id="white">
                                        <div class="container">
                                            <div class="row mt">
                                                <div class="col-lg-4 col-lg-offset-4 centered">
                                                    <h3>{{ $settingModel->getSetting('title_sec6', $accountId, $projectId) }}
                                                    </h3>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row mt">
                                                <div class="col-lg-3">
                                                    <p class="capitalize">1</p>
                                                    <h4>{{ $settingModel->getSetting('title1_sec6', $accountId, $projectId) }}
                                                    </h4>
                                                    <p>{{ $settingModel->getSetting('subtitle1_sec6', $accountId, $projectId) }}
                                                    </p>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="capitalize">2</p>
                                                    <h4>{{ $settingModel->getSetting('title2_sec6', $accountId, $projectId) }}
                                                    </h4>
                                                    <p>{{ $settingModel->getSetting('subtitle2_sec6', $accountId, $projectId) }}
                                                    </p>
                                                </div>
                                                <div class="col-lg-3">
                                                    <p class="capitalize">3</p>
                                                    <h4>{{ $settingModel->getSetting('title3_sec6', $accountId, $projectId) }}
                                                    </h4>
                                                    <p>{{ $settingModel->getSetting('subtitle3_sec6', $accountId, $projectId) }}
                                                    </p>
                                                </div>

                                                <div class="col-lg-3">
                                                    <p class="capitalize">4</p>
                                                    <h4>{{ $settingModel->getSetting('title4_sec6', $accountId, $projectId) }}
                                                    </h4>
                                                    <p>{{ $settingModel->getSetting('subtitle4_sec6', $accountId, $projectId) }}
                                                    </p>
                                                </div>
                                            </div><!-- /row -->
                                        </div><!-- /container -->
                                    </div><!-- /white -->

                                    <!==========CALL TO ACTION
                                        2===========================================================================================================================================================================================================================>
                                        <div id="cta02">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-8 col-lg-offset-2">
                                                        <h2>{{ $settingModel->getSetting('title_sec7', $accountId, $projectId) }}
                                                        </h2>
                                                        <button type="button"
                                                            class="btn btn-cta btn-lg">{{ $settingModel->getSetting('button_title_sec7', $accountId, $projectId) }}</button>
                                                    </div>
                                                </div><!-- /row -->
                                            </div><!-- /container -->
                                        </div>
                                        <! --/cta02 -->

                                            <!==========FEATURED
                                                ICONS=============================================================================================================================================================================================================================>
                                                <div class="container">
                                                    <div class="row mt">
                                                        <div class="col-lg-4 centered si">
                                                            <i class="fa fa-flask"></i>
                                                            <h4>{{ $settingModel->getSetting('title1_sec8', $accountId, $projectId) }}
                                                            </h4>
                                                            <p>{{ $settingModel->getSetting('subtitle1_sec8', $accountId, $projectId) }}
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-4 centered si">
                                                            <i class="fa fa-eye"></i>
                                                            <h4>{{ $settingModel->getSetting('title2_sec8', $accountId, $projectId) }}
                                                            </h4>
                                                            <p>{{ $settingModel->getSetting('subtitle2_sec8', $accountId, $projectId) }}
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-4 centered si">
                                                            <i class="fa fa-mobile"></i>
                                                            <h4>{{ $settingModel->getSetting('title3_sec8', $accountId, $projectId) }}
                                                            </h4>
                                                            <p>{{ $settingModel->getSetting('subtitle3_sec8', $accountId, $projectId) }}
                                                            </p>
                                                        </div>

                                                        <div class="col-lg-4 centered si">
                                                            <i class="fa fa-cog"></i>
                                                            <h4>{{ $settingModel->getSetting('title4_sec8', $accountId, $projectId) }}
                                                            </h4>
                                                            <p>{{ $settingModel->getSetting('subtitle4_sec8', $accountId, $projectId) }}
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-4 centered si">
                                                            <i class="fa fa-flag"></i>
                                                            <h4>{{ $settingModel->getSetting('title5_sec8', $accountId, $projectId) }}
                                                            </h4>
                                                            <p>{{ $settingModel->getSetting('subtitle5_sec8', $accountId, $projectId) }}
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-4 centered si">
                                                            <i class="fa fa-heart"></i>
                                                            <h4>{{ $settingModel->getSetting('title6_sec8', $accountId, $projectId) }}
                                                            </h4>
                                                            <p>{{ $settingModel->getSetting('subtitle6_sec8', $accountId, $projectId) }}
                                                            </p>
                                                        </div>
                                                    </div><!-- /row -->
                                                </div><!-- /container -->

                                                <!==========OUR
                                                    TEAM===================================================================================================================================================================================================================================>

                                                    <div id="white">
                                                        <div class="container">
                                                            <div class="row mt">
                                                                <div class="col-lg-4 col-lg-offset-4 centered">
                                                                    <h3>{{ $settingModel->getSetting('title_sec9', $accountId, $projectId) }}</h3>
                                                                    <hr>
                                                                </div>
                                                            </div>
                                                            <! --/row -->

                                                                <div class="row">
                                                                    <div class="col-lg-4 centered">
                                                                        <div class="members">
                                                                            <img src="{{ asset(ert('tsp') . $settingModel->getSetting('image1_sec9', $accountId, $projectId)) }}"
                                                                                alt="">
                                                                            <div class="team-info">
                                                                                <div class="subhead">
                                                                                    {{ $settingModel->getSetting('title1_sec9', $accountId, $projectId) }}
                                                                                </div>
                                                                                <h2 class="team-name">
                                                                                    {{ $settingModel->getSetting('subtitle1_sec9', $accountId, $projectId) }}
                                                                                </h2>
                                                                                <p class="team-description"><i
                                                                                        class="fa fa-facebook"></i><i
                                                                                        class="fa fa-twitter"></i><i
                                                                                        class="fa fa-dribbble"></i></p>
                                                                            </div>
                                                                        </div>
                                                                    </div><!-- /col-lg-4 -->

                                                                    <div class="col-lg-4 centered">
                                                                        <div class="members">
                                                                            <img src="{{ asset(ert('tsp') . $settingModel->getSetting('image2_sec9', $accountId, $projectId)) }}"
                                                                                alt="">
                                                                            <div class="team-info">
                                                                                <div class="subhead">
                                                                                    {{ $settingModel->getSetting('title2_sec9', $accountId, $projectId) }}
                                                                                </div>
                                                                                <h2 class="team-name">
                                                                                    {{ $settingModel->getSetting('subtitle2_sec9', $accountId, $projectId) }}
                                                                                </h2>
                                                                                <p class="team-description"><i
                                                                                        class="fa fa-facebook"></i><i
                                                                                        class="fa fa-twitter"></i><i
                                                                                        class="fa fa-dribbble"></i></p>
                                                                            </div>
                                                                        </div>
                                                                    </div><!-- /col-lg-4 -->

                                                                    <div class="col-lg-4 centered">
                                                                        <div class="members">
                                                                            <img src="{{ asset(ert('tsp') . $settingModel->getSetting('image3_sec9', $accountId, $projectId)) }}"
                                                                                alt="">
                                                                            <div class="team-info">
                                                                                <div class="subhead">
                                                                                    {{ $settingModel->getSetting('title3_sec9', $accountId, $projectId) }}
                                                                                </div>
                                                                                <h2 class="team-name">
                                                                                    {{ $settingModel->getSetting('subtitle3_sec9', $accountId, $projectId) }}
                                                                                </h2>
                                                                                <p class="team-description"><i
                                                                                        class="fa fa-facebook"></i><i
                                                                                        class="fa fa-twitter"></i><i
                                                                                        class="fa fa-dribbble"></i></p>
                                                                            </div>
                                                                        </div>
                                                                    </div><!-- /col-lg-4 -->

                                                                </div>
                                                                <! --/row -->
                                                        </div>
                                                        <! --/container -->
                                                    </div>
                                                    <! --/white -->

                                                        <!==========BLACK
                                                            SECTION==============================================================================================================================================================================================================================>
                                                            <div id="black">
                                                                <div class="container pt">
                                                                    <div class="row mt centered">
                                                                        <div class="col-lg-3">
                                                                            <p><i class="fa fa-instagram"></i></p>
                                                                            <h1>{{ $settingModel->getSetting('title1_sec10', $accountId, $projectId) }}
                                                                            </h1>
                                                                            <hr>
                                                                            <h4>{{ $settingModel->getSetting('subtitle1_sec10', $accountId, $projectId) }}
                                                                            </h4>
                                                                        </div>

                                                                        <div class="col-lg-3">
                                                                            <p><i class="fa fa-music"></i></p>
                                                                            <h1>{{ $settingModel->getSetting('title2_sec10', $accountId, $projectId) }}
                                                                            </h1>
                                                                            <hr>
                                                                            <h4>{{ $settingModel->getSetting('subtitle2_sec10', $accountId, $projectId) }}
                                                                            </h4>
                                                                        </div>

                                                                        <div class="col-lg-3">
                                                                            <p><i class="fa fa-trophy"></i></p>
                                                                            <h1>{{ $settingModel->getSetting('title3_sec10', $accountId, $projectId) }}
                                                                            </h1>
                                                                            <hr>
                                                                            <h4>{{ $settingModel->getSetting('subtitle3_sec10', $accountId, $projectId) }}
                                                                            </h4>
                                                                        </div>

                                                                        <div class="col-lg-3">
                                                                            <p><i class="fa fa-ticket"></i></p>
                                                                            <h1>{{ $settingModel->getSetting('title4_sec10', $accountId, $projectId) }}
                                                                            </h1>
                                                                            <hr>
                                                                            <h4>{{ $settingModel->getSetting('subtitle4_sec10', $accountId, $projectId) }}
                                                                            </h4>
                                                                        </div>

                                                                    </div><!-- /row -->
                                                                </div><!-- /container -->
                                                            </div><!-- /black -->

                                                            <!==========TESTIMONIAL
                                                                CAROUSEL=======================================================================================================================================================================================================================>

                                                                <div class="container">
                                                                    <div class="row mt">
                                                                        <div class="col-lg-4 col-lg-offset-4 centered">
                                                                            <h3>{{ $settingModel->getSetting('title1_sec11', $accountId, $projectId) }}
                                                                            </h3>
                                                                            <hr>
                                                                        </div>
                                                                    </div>
                                                                    <! --/row -->

                                                                        <div class="row mt">
                                                                            <div
                                                                                class="col-lg-8 col-lg-offset-2 centered">
                                                                                <div id="carousel-example-generic"
                                                                                    class="carousel slide"
                                                                                    data-ride="carousel">
                                                                                    <!-- Wrapper for slides -->
                                                                                    <div class="carousel-inner">
                                                                                        <div class="item active">
                                                                                            <h2>{{ $settingModel->getSetting('title2_sec11', $accountId, $projectId) }}
                                                                                            </h2>
                                                                                            <h5>{{ $settingModel->getSetting('title3_sec11', $accountId, $projectId) }}
                                                                                            </h5>
                                                                                        </div>

                                                                                        <div class="item">
                                                                                            <h2>{{ $settingModel->getSetting('title4_sec11', $accountId, $projectId) }}
                                                                                            </h2>
                                                                                            <h5>{{ $settingModel->getSetting('title5_sec11', $accountId, $projectId) }}
                                                                                            </h5>
                                                                                        </div>
                                                                                    </div><!-- /carousel-inner -->

                                                                                </div>
                                                                                <! --/carousel-example -->
                                                                            </div><!-- /col-lg-8 -->
                                                                        </div>
                                                                        <! --/row -->
                                                                </div><!-- /container -->


                                                                <!==========CONTACT
                                                                    SECTION============================================================================================================================================================================================================================>

                                                                    <div id="white">
                                                                        <div class="container">
                                                                            <div class="row mt">
                                                                                <div
                                                                                    class="col-lg-4 col-lg-offset-4 centered">
                                                                                    <h3>{{ $settingModel->getSetting('title1_sec12', $accountId, $projectId) }}</h3>
                                                                                    <hr>
                                                                                </div>
                                                                            </div>
                                                                            <! --/row -->
                                                                        </div><!-- /container -->
                                                                        <div id="map"></div>
                                                                    </div><!-- /white -->




                                                                    <!==========CALL TO ACTION
                                                                        BAR============================================================================================================================================================================================================================>
                                                                        <div id="cta-bar">
                                                                            <div class="container">
                                                                                <div class="row centered">
                                                                                    <a href="#">
                                                                                        <h4>{{ $settingModel->getSetting('title1_sec13', $accountId, $projectId) }}</h4>
                                                                                    </a>
                                                                                </div>
                                                                            </div><!-- /container -->
                                                                        </div><!-- /cta-bar -->

                                                                        <!==========FOOTER=====================================================================================================================================================================================================================================>

                                                                            <div id="f">
                                                                                <div class="container">
                                                                                    <div class="row">
                                                                                        <!-- ADDRESS -->
                                                                                        <div class="col-lg-3">
                                                                                            <h4>Our Studio</h4>
                                                                                            <p>
                                                                                                Some Ave. 987,<br />
                                                                                                Postal 64733<br />
                                                                                                London, UK.<br />
                                                                                            </p>
                                                                                            <p>
                                                                                                <i
                                                                                                    class="fa fa-mobile"></i>
                                                                                                +55 4893.8943<br />
                                                                                                <i
                                                                                                    class="fa fa-envelope-o"></i>
                                                                                                hello@yourdomain.com
                                                                                            </p>
                                                                                        </div>
                                                                                        <! --/col-lg-3 -->

                                                                                            <!-- TWEETS -->
                                                                                            <div class="col-lg-3">
                                                                                                <h4>Recent Tweets</h4>
                                                                                                <div id="showtweets">
                                                                                                </div>
                                                                                                <script>
                                                                                                    twitterFetcher.fetch('258157205101088768', 'showtweets', 2, true, false, false, '', false, handleTweets, false);

                                                                                                    function handleTweets(tweets) {
                                                                                                        var x = tweets.length;
                                                                                                        var n = 0;
                                                                                                        var element = document.getElementById('showtweets');
                                                                                                        var html = '<ul>';
                                                                                                        while (n < x) {
                                                                                                            html += '<li>' + tweets[n] + '</li>';
                                                                                                            n++;
                                                                                                        }
                                                                                                        html += '</ul>';
                                                                                                        element.innerHTML = html;
                                                                                                    }
                                                                                                </script>
                                                                                                <p>Follow us
                                                                                                    <b>@Alvrz_is</b>
                                                                                                </p>
                                                                                            </div><!-- /col-lg-3 -->

                                                                                            <!-- LATEST POSTS -->
                                                                                            <div class="col-lg-3">
                                                                                                <h4>Latest Posts</h4>
                                                                                                <p>
                                                                                                    <i
                                                                                                        class="fa fa-angle-right"></i>
                                                                                                    A post with an
                                                                                                    image<br />
                                                                                                    <i
                                                                                                        class="fa fa-angle-right"></i>
                                                                                                    Other post with a
                                                                                                    video<br />
                                                                                                    <i
                                                                                                        class="fa fa-angle-right"></i>
                                                                                                    A full width
                                                                                                    post<br />
                                                                                                    <i
                                                                                                        class="fa fa-angle-right"></i>
                                                                                                    We talk about
                                                                                                    something nice<br />
                                                                                                    <i
                                                                                                        class="fa fa-angle-right"></i>
                                                                                                    Yet another single
                                                                                                    post<br />
                                                                                                </p>
                                                                                            </div><!-- /col-lg-3 -->

                                                                                            <!-- NEW PROJECT -->
                                                                                            <div class="col-lg-3">
                                                                                                <h4>New Project</h4>
                                                                                                <a href="#"><img
                                                                                                        class="img-responsive"
                                                                                                        src="{{ asset('front-theme-asset/macro') }}/img/portfolio/port03.jpg"
                                                                                                        alt="" /></a>
                                                                                            </div><!-- /col-lg-3 -->


                                                                                    </div>
                                                                                    <! --/row -->
                                                                                </div><!-- /container -->
                                                                            </div><!-- /f -->



                                                                            <!-- Bootstrap core JavaScript
    ================================================== -->
                                                                            <!-- Placed at the end of the document so the pages load faster -->
                                                                            <script src="{{ asset('front-theme-asset/macro') }}/js/bootstrap.min.js"></script>
                                                                            {{-- <script src="{{ asset('front-theme-asset/macro') }}/js/retina.js"></script> --}}


                                                                            <script>
                                                                                $(window).scroll(function() {
                                                                                    $('.si').each(function() {
                                                                                        var imagePos = $(this).offset().top;

                                                                                        var topOfWindow = $(window).scrollTop();
                                                                                        if (imagePos < topOfWindow + 400) {
                                                                                            $(this).addClass("slideUp");
                                                                                        }
                                                                                    });
                                                                                });
                                                                            </script>




</body>

</html>
