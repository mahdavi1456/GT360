<?php

namespace App\Helpers;

class TextHelper
{

    public static function breadcrumb($title) { ?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo $title; ?></h1>
                    </div>
                    <!-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active">فرم‌های پیشرفته</li>
                    </ol>
                </div> -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <?php
    }

    public function fa_number($string) {
        $en = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        $fa = array("۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹");
        return str_replace($en, $fa, $string);
    }

    public function sendSMS() {
        $username = "arsha-74390";
        $password = "XuKAZDHX0i2USZKA";
        $domain = "magfa";

        //soap
        $url = "https://sms.magfa.com/api/soap/sms/v2/server?wsdl";

        //soap options
        $options = [
            'login'          => "$username/$domain", 'password' => $password, // -Credientials
            'cache_wsdl'     => WSDL_CACHE_NONE, // -No WSDL Cache
            'compression'    => (SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | 5), // -Compression *
            'trace'          => false, // -Optional (debug)
            'stream_context' => stream_context_create(
                [
                    'ssl' => [
                        'verify_peer'       => false,
                        'verify_peer_name'  => false,
                        'allow_self_signed' => true
                    ]
                ]
            )
        ];

        // * Accept response compression and compress requests using gzip with compression level 5

        // soap client
        $client = new SoapClient($url, $options);

        $mobile = $_POST['mobile'];
        $message = $_POST['message'];

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

}
