<!DOCTYPE html>
<html lang="fa">
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8">
	<title></title>
	<meta name="description" content="">
	<meta name="theme-color" content="#2cb99c">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="{{ asset('front-theme-asset/park/images/favico.ico') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/park/css/style.css?v=1.70') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/park/font/font-awesome/css/font-awesome.min.css?v=1.0.1') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/park/css/persianDatepicker-default.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css">

    @php
        $pallete = $settingModel->getSetting('pallete', $accountId, $projectId);
        $themeColors = $palleteModel->getByName($pallete);
        if ($themeColors) {
            $first_color = $themeColors->first_color;
            $second_color = $themeColors->secnod_color;
            $third_color = $themeColors->third_color;
            $fourth_color = $themeColors->fourth_color;
        } else {
            $first_color = "#ddd";
            $second_color = "#ddd";
            $third_color = "#ddd";
            $fourth_color = "#ddd";
        }
    @endphp
	<style type="text/css">
		:root {
			--primary-color: #{{ $first_color }};
			--primary-color-text: #{{ $second_color }};
			--secondary-color: #{{ $third_color }};
			--secondary-color-text: #{{ $fourth_color }};
			--footer-background-color: #64727f;
			--footer-copyright-background-color: #5f6c78;
		}
	</style>
</head>
<body>
	<input type="hidden" id="home-url" value="https://levelupgc.com/">
