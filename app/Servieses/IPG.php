<?php

namespace App\Servieses;

use App\Models\Transaction;
use http\Env\Request;

class IPG
{
    public function start($recordId, $recordType, $Price)
    {
        $data = array(
            "merchant_id" => "22e6f21a-1348-4887-9c44-995e65e27472",
            "amount" => $Price,
            "callback_url" => route('transaction.verify'),
            "description" => "خرید تست",
            "sandbox" => true,
            "metadata" => ["email" => "info@email.com", "mobile" => "09121234567"],
        );
        $jsonData = json_encode($data);
        $ch = curl_init('https://api.zarinpal.com/pg/v4/payment/request.json');
        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));

        $result = curl_exec($ch);
        $err = curl_error($ch);
        $result = json_decode($result, true, JSON_PRETTY_PRINT);
        curl_close($ch);

        Transaction::create([
            'account_id' => auth()->user()->account->id,
            'authority' => $result['data']['authority'],
            'record_id' => $recordId,
            'record_type' => $recordType,
            'price' => $Price
        ]);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            if (empty($result['errors'])) {
                if ($result['data']['code'] == 100) {
                    $url = "https://www.zarinpal.com/pg/StartPay/" . $result['data']['authority'];
                    echo $url;
                }
            } else {
                echo 'Error Code: ' . $result['errors']['code'];
                echo 'message: ' . $result['errors']['message'];
            }
        }
    }

    public function verify()
    {
        $Authority = $_GET['Authority'];
        $transaction = Transaction::where("authority", $Authority)->first();
        $price = $transaction->price;

        $data = array(
            "merchant_id" => "22e6f21a-1348-4887-9c44-995e65e27472",
            "authority" => $Authority,
            "amount" => $price
        );
        $jsonData = json_encode($data);
        $ch = curl_init('https://api.zarinpal.com/pg/v4/payment/verify.json');
        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v4');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));

        $result = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        $result = json_decode($result, true);

        dd($result);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            if ($result['data']['code'] == 100) {
                echo 'Transation success. RefID:' . $result['data']['ref_id'];
            } else {
                echo 'code: ' . $result['errors']['code'];
                echo 'message: ' . $result['errors']['message'];
            }
        }
    }
}
