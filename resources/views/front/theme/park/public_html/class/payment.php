<?php

namespace public_html\class;

class payment
{

    public function payment_request($amount, $a_id, $record_id)
    {
        include "zarinpal.php";
        $db = new db();
        $acc = new account();
        $zp = new zarinpal();

        $merchant_id = $acc->get_account_column($a_id, "a_zarinpal");

        $z_amount = $amount;
        $description = "رزرو آنلاین - سند شماره: " . $record_id;
        //$slug = $db->get_var_query("select a_slug from account where a_id = $a_id");
        $slug = "levelup";
        $callback_url = "https://levelupgc.com/?page=verify.php&a_id=" . $a_id . "&record_id=" . $record_id;
        $email = "";
        $mobile = "";
        $zarin_gate = false;
        $sandbox = false;

        $result = $zp->request($merchant_id, $z_amount, $description, $email, $mobile, $callback_url, $sandbox, $zarin_gate);

        $authority = $result["Authority"];
        $status = "0";
        $ref_id = "0";
        $record_id = 0;
        $message = "0";
        $date = date('Y/m/d H:i:s');

        $sql = "insert reserve_payment(authority, status, ref_id, record_id, message, set_date, price, a_id) ";
        $sql .= "values('$authority', '$status', '$ref_id', $record_id, '$message', '$date', $amount, $a_id)";
        $db->ex_query($sql);

        if (isset($result["Status"]) && $result["Status"] == 100) {
            $url = $result["StartPay"];
            ?>
            <form action="<?php echo $url; ?>" name="paymentForm">
                <button type="submit" class="btn btn-success mt-2">اتصال به درگاه پرداخت...</button>
            </form>
            <script>
                document.paymentForm.submit();
            </script>
            <?php
        } else { ?>
            <div class="alert aleret-danger">
                خطا در ایجاد تراکنش
                <br>
                کد خطا: <?php echo $result["Status"]; ?>
                <br>
                تفسیر و علت خطا: <?php echo $result["Message"]; ?>
            </div>
            <?php
        }
    }

    public function verify_payment_request($record_id, $a_id) {
        include "zarinpal.php";

        $db = new db();
        $pr = new prime();
        $gdate = new gdate();
        $sms = new sms();
        $zp	= new zarinpal();
        $acc = new account();
        $merchant_id = $acc->get_account_column($a_id, "a_zarinpal");
        $zarin_gate = false;
        $sandbox = false;

        $authority = $_GET["Authority"];
        $amount = $db->get_var_query("select price from reserve_payment where authority = '$authority'");

        $z_amount = $amount;
        $result = $zp->verify($merchant_id, $z_amount, $sandbox, $zarin_gate);

        $ref_id = $result["RefID"];
        $status = $result["Status"];
        $message = $result["Message"];
        if($result["Status"] == 100 || $result["Status"] == 101) {
            $db->ex_query("update reserve_order set ro_status = 1 where ID = $record_id");
            $order = $db->get_select_query("select * from reserve_order where ID = $record_id");

            ?>
            <div class="alert alert-success">
                تراکنش با موفقیت انجام شد
                <br>
                <b>مبلغ: </b><?php echo number_format($result["Amount"]); ?>
                <br>
                <b>کد پیگیری: </b><?php echo $ref_id; ?>
                <br>
                <b>رسید دیجیتال: </b><?php echo ltrim($authority, '0'); ?>
                <br>
                <b>تاریخ و ساعت رزرو: </b><?php echo $pr->per_number($gdate->miladi_to_shamsi($order[0]['ro_date']) . ' - ' . $order[0]['rs_details']);
            </div>
            <?php
            $account_name = $db->get_var_query("select a_center from account where a_id = $a_id");
            $account_mobile = $db->get_var_query("select a_mobile from account where a_id = $a_id");

            $rs_name = $order[0]['rs_name'];
            $rs_details = $order[0]['rs_details'];
            $ro_date = $order[0]['ro_date'];
            $ro_mobile = $order[0]['ro_mobile'];
            $ro_name = $order[0]['ro_name'];
            $ro_count = $order[0]['ro_count'];
            $rs_price = $order[0]['rs_price'];

            $sms->send_sms_reserve($rs_name, $rs_details, $gdate->miladi_to_shamsi($ro_date), $account_name, $ro_mobile);
            $sms->send_reserve_notify_to_admin($rs_name, $rs_details, $gdate->miladi_to_shamsi($ro_date), $account_name, $account_mobile, $ro_name, $ro_count, $rs_price);

        } else {
            ?>
            <div class="alert alert-danger">
                تراکنش با خطا مواجه شده است
                <br>
                <b>کد خطا: </b><?php echo $result["Status"]; ?>
                <br>
                <b>تفسیر و علت خطا: </b><?php echo $result["Message"]; ?>
            </div>
            <?php
        }
        if ($record_type == "reserve") {
            $sql = "update reserve_payment set status = '$status', ref_id = '$ref_id', record_id = $record_id, message = '$message' ";
            $sql .= "where authority = '$authority'";
            $db->ex_query($sql);
        }
    }

}
