{{ adminBar() }}
<!DOCTYPE html>
<html lnag="fa">
<head>
    <title>{{ $siteEngine->getSetting('title') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $siteEngine->getSetting('title') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/white/css/style.css') }}">
    <style type="text/css">
        body {
            background: {{ $siteEngine->getSetting('body_bg_color') }};
        }
    </style>
</head>
<body>
<div class="container">
    <div class="LogoBox">
        <img id="logo" src="{{ asset(ert('tsp') . $siteEngine->getSetting('background_cover')) }}" width="450px"/>
    </div>
</div>
</body>
</html>
