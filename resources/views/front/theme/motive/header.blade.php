<!DOCTYPE html>
<html lang="fa">
<head>
    <title>{{ $settingModel->getSetting('title', $accountId, $projectId) }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $settingModel->getSetting('description', $accountId, $projectId) }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/motive/css/bootstrap-3.1.1.min.css') }}">
    <link href="{{ asset('front-theme-asset/motive/css/owl.carousel.css') }}" rel="stylesheet" type="text/css"
          media="all"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/motive/css/style.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/motive/css/flexslider.css') }}"
          media="screen"/>
    <link rel="stylesheet"
          href="{{ asset('fonts/' . $settingModel->getSetting('font', $accountId, $projectId) . '/face.css') }}">

    <script src="{{ asset('front-theme-asset/motive/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/motive/js/move-top.js') }}"></script>
    <script type="text/javascript" src="{{ asset('front-theme-asset/motive/js/easing.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 900);
            });
        });
    </script>
</head>
