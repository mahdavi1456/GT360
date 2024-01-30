<?php

namespace App\Servieses;

class Sms
{

    public static function sendWithPattern($pattern, $parameters, $toNum)
    {
        // you api key that generated from panel
        $apiKey = "KjvXuMxy-QJt2UgNbsY4sxA0OkGWuyfIGbWBMUzl_Ok=";

        $client = new \IPPanel\Client($apiKey);

        $messageId = $client->sendPattern(
            $pattern,    // pattern code
            '3000505',      // originator
            $toNum,  // recipient
            $parameters,  // pattern values
        );
        return $messageId;
    }
}
