{{ adminBar() }}
<!DOCTYPE html>
<html lnag="fa">
<head>
    <title>{{ $settingModel->getSetting('title', $accountId, $projectId) }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $settingModel->getSetting('title', $accountId, $projectId) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front-theme-asset/white/css/style.css') }}">
</head>
<body>
<div class="container">
    <div class="LogoBox">
        <img id="logo" src="{{ asset(ert('tsp') . $settingModel->getSetting('background_cover', $accountId)) }}" width="450px"/>
    </div>
</div>
</body>
</html>
