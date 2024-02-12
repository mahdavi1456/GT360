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

        $message = $result['errors']['message'];
        $code = $result['errors']['code'];
        $transaction->message = $message;
        $transaction->status = $code;
        $transaction->save();

        if ($code == 100) {
            echo 'Transation success. RefID:' . $result['data']['ref_id'];
        } else {
            echo 'code: ' . $this->getStatusDetails($result['errors']['code']);
            echo 'message: ' . $result['errors']['message'];
        }

    }

    public function getStatusDetails($code)
    {
        switch ($code) {
            case -9:
                $msg = "خطای اعتبار سنجی";
                break;
            case -10:
                $msg = "ای پی یا مرچنت كد پذیرنده صحیح نیست.";
                break;
            case -11:
                $msg = "مرچنت کد فعال نیست، پذیرنده مشکل خود را به امور مشتریان زرین‌پال ارجاع دهد.";
                break;
            case -12:
                $msg = "تلاش بیش از دفعات مجاز در یک بازه زمانی کوتاه به امور مشتریان زرین پال اطلاع دهید";
                break;
            case -15:
                $msg = "درگاه پرداخت به حالت تعلیق در آمده است، پذیرنده مشکل خود را به امور مشتریان زرین‌پال ارجاع دهد.";
                break;
            case -16:
                $msg = "سطح تایید پذیرنده پایین تر از سطح نقره ای است.";
                break;
            case -17:
                $msg = "محدودیت پذیرنده در سطح آبی";
                break;
            case 100:
                $msg = "عملیات موفق";
                break;
            case -30:
                $msg = "پذیرنده اجازه دسترسی به سرویس تسویه اشتراکی شناور را ندارد.";
                break;
            case -31:
                $msg = "حساب بانکی تسویه را به پنل اضافه کنید. مقادیر وارد شده برای تسهیم درست نیست. پذیرنده جهت استفاده از خدمات سرویس تسویه اشتراکی شناور، باید حساب بانکی معتبری به پنل کاربری خود اضافه نماید.";
                break;
            case -32:
                $msg = "مبلغ وارد شده از مبلغ کل تراکنش بیشتر است.";
                break;
            case -33:
                $msg = "درصدهای وارد شده صحیح نیست.";
                break;
            case -34:
                $msg = "مبلغ وارد شده از مبلغ کل تراکنش بیشتر است.";
                break;
            case -35:
                $msg = "تعداد افراد دریافت کننده تسهیم بیش از حد مجاز است.";
                break;
            case -36:
                $msg = "حداقل مبلغ جهت تسهیم باید ۱۰۰۰۰ ریال باشد.";
                break;
            case -37:
                $msg = "یک یا چند شماره شبای وارد شده برای تسهیم از سمت بانک غیر فعال است.";
                break;
            case -38:
                $msg = "خطا٬عدم تعریف صحیح شبا٬لطفا دقایقی دیگر تلاش کنید.";
                break;
            case -39:
                $msg = "خطایی رخ داده است به امور مشتریان زرین پال اطلاع دهید";
                break;
            case -40:
                $msg = "پارامترهای ارسالی اضافی یا منقضی شده اند.";
                break;
            case -41:
                $msg = "حداکثر مبلغ پرداختی ۱۰۰ میلیون تومان است.";
                break;
            case -50:
                $msg = "مبلغ پرداخت شده با مقدار مبلغ ارسالی در متد وریفای متفاوت است.";
                break;
            case -51:
                $msg = "پرداخت ناموفق";
                break;
            case -52:
                $msg = "خطای غیر منتظره‌ای رخ داده است. پذیرنده مشکل خود را به امور مشتریان زرین‌پال ارجاع دهد.";
                break;
            case -53:
                $msg = "پرداخت متعلق به این مرچنت کد نیست.";
                break;
            case -54:
                $msg = "اتوریتی نامعتبر است.";
                break;
            case -55:
                $msg = "تراکنش مورد نظر یافت نشد";
                break;
            case 101:
                $msg = "تراکنش وریفای شده است.";
                break;
        }
        return $msg;
    }
}
