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
	<?php
    /*
	$primary_bg = $opt->get_option('primary_bg');
	$primary_color = $opt->get_option('primary_color');
	$secondary_bg = $opt->get_option('secondary_bg');
	$secondary_color = $opt->get_option('secondary_color');
    */
	?>
	<style type="text/css">
		:root {
			--primary-color: {{ $settingModel->getSetting('first_color', $accountId, $projectId) }};
			--primary-color-text: {{ $settingModel->getSetting('second_color', $accountId, $projectId) }};
			--secondary-color: {{ $settingModel->getSetting('third_color', $accountId, $projectId) }};
			--secondary-color-text: {{ $settingModel->getSetting('fourth_color', $accountId, $projectId) }};
			--footer-background-color: #64727f;
			--footer-copyright-background-color: #5f6c78;
		}
	</style>
</head>
<body>
	<input type="hidden" id="home-url" value="https://levelupgc.com/">
