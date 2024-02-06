<?php

namespace public_html\class;

class website_payment
{

    public function payment_request($amount, $a_id, $record_id, $record_type)
    {
        $db = new db();
        $acc = new account();
        $zp = new zarinpal();

        if ($record_type == "reserve") {
            $record_type_name = "رزور آنلاین";
        } else if ($record_type == "shop") {
            $record_type_name = "فروشگاه آنلاین";
        } else if ($record_type == "digital-menu") {
            $record_type_name = "منوی دیجیتال";
        }

        $merchant_id = $acc->get_account_column($a_id, "a_zarinpal");
        $slug = $acc->get_account_column($a_id, "a_slug");
        $description = $record_type_name . " - " . " سند شماره " . $record_id;
        $callback_url = "https://levelupgc.com/?page=verify.php&a_id=" . $a_id . "&record_id=" . $record_id . "&record_type=" . $record_type;
        $email = "";
        $mobile = "";
        $zarin_gate = false;
        $sandbox = false;

        $result = $zp->request($merchant_id, $amount, $description, $email, $mobile, $callback_url, $sandbox, $zarin_gate);

        $authority = $result["Authority"];
        $status = "0";
        $ref_id = "0";
        $message = "0";
        $date = date('Y/m/d H:i:s');

        $sql = "insert website_payment(authority, status, ref_id, record_id, record_type, message, set_date, price, a_id) ";
        $sql .= "values('$authority', '$status', '$ref_id', $record_id, '$record_type', '$message', '$date', $amount, $a_id)";
        $db->ex_query($sql);

        if (isset($result["Status"]) && $result["Status"] == 100) {
            ?>
            <script type="text/javascript">
                window.location.href = "<?php echo $result["StartPay"]; ?>";
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

    public function verify_payment_request($a_id, $record_id, $record_type)
    {
        $db = new db();
        $pr = new prime();
        $gdate = new gdate();
        $sms = new sms();
        $zp = new zarinpal();
        $acc = new account();
        $fa = new factor();
        $ch = new charge();
        $u = new user();
        $dm = new digital_menu();

        $merchant_id = $acc->get_account_column($a_id, "a_zarinpal");
        $zarin_gate = false;
        $sandbox = false;

        $authority = $_GET["Authority"];
        $amount = $db->get_var_query("select price from website_payment where authority = '$authority'");

        $z_amount = $amount;
        $result = $zp->verify($merchant_id, $z_amount, $sandbox, $zarin_gate);

        $ref_id = $result["RefID"];
        $status = $result["Status"];
        $message = $result["Message"];

        if ($result["Status"] == 100 || $result["Status"] == 101) {

            if ($record_type == "reserve") {
                $db->ex_query("update reserve_order set ro_status = 1 where ID = $record_id");
                $order = $db->get_select_query("select * from reserve_order where ID = $record_id");
                ?>
                <div class="alert alert-success text-center">
                    تراکنش با موفقیت انجام شد
                    <br>
                    <b>مبلغ: </b><?php echo $pr->per_number(number_format($result["Amount"])); ?>
                    <br>
                    <b>کد پیگیری: </b><?php echo $pr->per_number($ref_id); ?>
                    <br>
                    <b>رسید دیجیتال: </b><?php echo $pr->per_number(ltrim(str_replace("A", "", $authority), '0')); ?>
                    <br>
                    <b>تاریخ و ساعت
                        رزرو: </b><?php echo $pr->per_number($gdate->miladi_to_shamsi($order[0]['ro_date'])) . ' - ' . $order[0]['rs_details']; ?>
                </div>
                <?php
                $account_name = $acc->get_account_column($a_id, "a_center");
                $account_mobile = $acc->get_account_column($a_id, "a_mobile");

                $rs_name = $order[0]['rs_name'];
                $rs_details = $order[0]['rs_details'];
                $ro_date = $order[0]['ro_date'];
                $ro_mobile = $order[0]['ro_mobile'];
                $ro_name = $order[0]['ro_name'];
                $ro_count = $order[0]['ro_count'];
                $rs_price = $order[0]['rs_price'];

                $sms->send_sms_reserve($rs_name, $rs_details, $gdate->miladi_to_shamsi($ro_date), $account_name, $ro_mobile);
                // $ch->minus_account_sms_charge("72213", $a_id);
                $sms->send_reserve_notify_to_admin($rs_name, $rs_details, $gdate->miladi_to_shamsi($ro_date), $account_name, $account_mobile, $ro_name, $ro_count, $rs_price);
                // $ch->minus_account_sms_charge("9000", $a_id);

            } else if ($record_type == "shop") {
                ?>
                <div class="alert alert-success text-center">
                    خرید شما با موفقیت انجام شد.
                    <br>
                    <b>مبلغ: </b><?php echo $pr->per_number(number_format($result["Amount"])); ?>
                    <br>
                    <b>کد پیگیری: </b><?php echo $pr->per_number($ref_id); ?>
                    <br>
                    <b>رسید دیجیتال: </b><?php echo $pr->per_number(ltrim(str_replace("A", "", $authority), '0')); ?>
                </div>
                <?php
            } else if ($record_type == "digital-menu") {
                $sql = "select * from website_payment where record_id = $record_id and record_type = 'digital-menu'";
                $res = $db->get_select_query($sql);
                $date = $res[0]['set_date'];
                ?>
                <div class="alert alert-success text-center">
                    تراکنش سفارش از منوی دیجیتال با موفقیت انجام شد.
                    <br>
                    <b>مبلغ: </b><?php echo $pr->per_number(number_format($result["Amount"])); ?>
                    <br>
                    <b>کد پیگیری: </b><?php echo $pr->per_number($ref_id); ?>
                    <br>
                    <b>رسید دیجیتال: </b><?php echo $pr->per_number(ltrim(str_replace("A", "", $authority), '0')); ?>
                    <br>
                    <b>تاریخ و ساعت: </b><?php echo $pr->per_number($gdate->miladi_to_shamsi_datetime($date)); ?>
                </div>
                <?php
                $fh_id = $record_id;
                $fh_status = "پرداخت شده";
                $fa->update_factor_status($a_id, $fh_id, $fh_status);

                // send sms
                $sql_f = "select * from factor_head where fh_id = $record_id";
                $res_f = $db->get_select_query($sql_f, 1, $a_id);
                $name = $res_f[0]['p_fullname'] != null ? $res_f[0]['p_fullname'] : "مشتری";
                $mobile = $res_f[0]['p_mobile'];
                $time = $gdate->get_time($date);
                $account_name = $acc->get_account_column($a_id, "a_center");
                $account_mobile = $acc->get_account_column($a_id, "a_mobile");
                $price = number_format($fa->get_factor_total_price($a_id, $record_id));
                $chefs = $u->get_users_by_level($a_id, 9);
                $details = $fa->list_products_sms($a_id, $record_id);

                $sms->send_digital_menu_sms_order_to_customer($name, $gdate->miladi_to_shamsi($date), $time, $record_id, $account_name, $mobile);
                $ch->minus_account_sms_charge("50001", $a_id);
                $sms->send_digital_menu_sms_order_to_admin($name, $gdate->miladi_to_shamsi($date), $time, $record_id, $mobile, $price, $account_mobile);
                $ch->minus_account_sms_charge("50002", $a_id);
                foreach ($chefs as $user) {
                    $sms->send_digital_menu_sms_order_to_chef($name, $gdate->miladi_to_shamsi($date), $time, $record_id, $details, $user["u_mobile"]);
                    $ch->minus_account_sms_charge("50003", $a_id);
                }

            }
        } else {
            ?>
            <div class="alert alert-danger text-center">
                تراکنش با خطا مواجه شده است
                <br>
                <b>کد خطا: </b><?php echo $pr->per_number($result["Status"]); ?>
                <br>
                <b>تفسیر و علت خطا: </b><?php echo $result["Message"]; ?>
            </div>
            <?php
        }
        $sql = "update website_payment set status = '$status', ref_id = '$ref_id', message = '$message' ";
        $sql .= "where authority = '$authority'";
        $db->ex_query($sql);
    }

}
