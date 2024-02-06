<?php

use App\Models\Setting;

function breadcrumb($title)
{ ?>
    <div class="col-md-6">
        <h1 class="p-4" style="font-size: 25px"><?php echo $title; ?></h1>
    </div>
    <!--
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item active">فرم‌های پیشرفته</li>
        </ol>
    </div> -->
<?php
}

function fa_number($string)
{
    $en = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
    $fa = array("۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹");
    return str_replace($en, $fa, $string);
}

function getSetting($key)
{
    $s = Setting::where('key', $key)->first();
    if ($s) {
        $value = $s->value;
    } else {
        $value = null;
    }

    return $value;
}

function sendSMS($mobile, $message)
{
    $username = "arsha-74390";
    $password = "XuKAZDHX0i2USZKA";
    $domain = "magfa";

    //soap
    $url = "https://sms.magfa.com/api/soap/sms/v2/server?wsdl";

    //soap options
    $options = [
        'login' => "$username/$domain", 'password' => $password, // -Credientials
        'cache_wsdl' => WSDL_CACHE_NONE, // -No WSDL Cache
        'compression' => (SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | 5), // -Compression *
        'trace' => false, // -Optional (debug)
        'stream_context' => stream_context_create(
            [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ]
            ]
        )
    ];

    // * Accept response compression and compress requests using gzip with compression level 5

    // soap client

    $client = new SoapClient($url, $options);

    // send
    $response = $result['send'] = $client->send(
        [$message], // messages
        ["+98300074390"], // short numbers can be 1 or same count as recipients (mobiles)
        [$mobile], // recipients
        [], // client-side unique IDs.
        [], // Encodings are optional, The system will guess it, itself ;)
        [], // UDHs, Please read Magfa UDH Documnet
        [] // Message priorities (unused).
    );

    //$status = $response->status;
    $id = $response->id;
    //$parts = $response->parts;
    //$tariff = $response->tariff;
    echo $id;
}


function active_menu($route)
{
    if (is_array($route))
        return in_array(request()->route()->getName(), $route) ? ' active' : '';
    else
        return request()->route()->getName() == $route ? ' active' : '';
}

function active_dropdown($route)
{
    if (is_array($route)) {
        return in_array(request()->route()->getName(), $route) ? ' menu-open' : '';
    } else {
        return request()->route()->getName() == $route ? ' menu-open' : '';
    }
}

function active_list($route)
{
    if (is_array($route)) {
        return in_array(request()->route()->getName(), $route) ? 'style=display:block;' : '';
    } else {
        return request()->route()->getName() == $route ? 'style=display:block;' : '';
    }
}

function make_slug($string)
{
    return preg_replace('/\s+/u', '-', trim($string));
}

function convertToPersian($string)
{
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];

    $num = range(0, 9);
    $convertedPersianNums = str_replace($num, $persian, $string);
    $englishNumbersOnly = str_replace($num, $arabic, $convertedPersianNums);

    return $englishNumbersOnly;
}

function zaman($date)
{
    if ($date) {
        return convertToPersian(verta($date)->format('H:i Y/m/d'));
    }
}

function price($amount)
{
    if ($amount) {
        return convertToPersian(number_format($amount));
    }
}

function ert($variable)
{
    if ($variable == 'thumb-path') {
        return 'uploads/thumbs';
    }
    if ($variable == 'theme-path') {
        return 'uploads/themes/';
    }
    if ($variable == 'tsp') {  //theme-setting-path
        return 'uploads/themeSetting/';
    }
    if ($variable == 'pip') {  //page-image-path
        return 'uploads/pageImages/';
    }
    if ($variable == 'aip') {  //account-image-path
        return 'uploads/account/';
    }
    if ($variable == 'cd') {  //confirmDelete
        confirmDelete('مطمئنید؟', 'آیا از حذف این مورد اطمینان دارید؟');
        return true;
    }
    dd('ورودی اشتباهه');
}

function imageLoader($key)
{
    $setting = new Setting();
    return $setting->getSetting($key,auth()->user()->account->id);
}
