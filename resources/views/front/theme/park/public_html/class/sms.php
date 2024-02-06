<?php

namespace public_html\class;

class sms
{

    public function send_sms_req($msg_text, $mobile)
    {
        $setting = new setting();
        $panel = $setting->get_setting("active_sms_panel");

        $curl = curl_init("https://heliapp.ir/gt-service/sms/" . $panel . "/methods/send.php");
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, "message=" . $msg_text . "&mobile=" . $mobile);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, FALSE);
        $result = curl_exec($curl);
        curl_close($curl);
    }

    public function get_sms_content_by_code($code)
    {
        $db = new db();

        $sql = "select content from sms_patterns where sms_code = $code";
        $content = $db->get_var_query($sql);
        return $content;
    }

    public function set_log($type, $mobile, $message = NULL)
    {
        $db = new db();
        $opt = new option();

        $set_date = date('Y-m-d');
        $account_id = $opt->get_a_id();
        $set_time = date('H:i:s');

        $sql = "insert into sms_log(set_date, type, account_id, set_time, p_mobile, message) values('$set_date', '$type', $account_id, '$set_time', '$mobile', '$message')";
        $db->ex_query($sql);
    }

    public function send_verification_mobile_code($code, $center, $mobile)
    {
        $msg_text = $this->get_sms_content_by_code("72268");

        $msg_text = str_replace("[code]", $code, $msg_text);
        $msg_text = str_replace("[center]", $center, $msg_text);

        $this->send_sms_req($msg_text, $mobile);

        $this->set_log("reserve", $mobile, "72268");
    }

    public function send_sms_reserve($details, $sans, $date, $center, $mobile)
    {
        $msg_text = $this->get_sms_content_by_code("72213");

        $msg_text = str_replace("[details]", $details, $msg_text);
        $msg_text = str_replace("[sans]", $sans, $msg_text);
        $msg_text = str_replace("[date]", $date, $msg_text);
        $msg_text = str_replace("[center]", $center, $msg_text);

        $this->send_sms_req($msg_text, $mobile);

        $this->set_log("reserve", $mobile, "72213");
    }

    public function send_sms_mobile_authentication($code, $center, $mobile)
    {
        $this->send_verification_code($code, $mobile);
        $this->set_log("reserve", $mobile, "72268");
    }

    public function send_reserve_notify_to_admin($details, $sans, $date, $center, $mobile, $person, $count, $price)
    {
        $msg_text = $this->get_sms_content_by_code("9000");

        $msg_text = str_replace("[details]", $details, $msg_text);
        $msg_text = str_replace("[sans]", $sans, $msg_text);
        $msg_text = str_replace("[date]", $date, $msg_text);
        $msg_text = str_replace("[center]", $center, $msg_text);
        $msg_text = str_replace("[person]", $person, $msg_text);
        $msg_text = str_replace("[count]", $count, $msg_text);
        $msg_text = str_replace("[price]", number_format($price * $count), $msg_text);

        $this->send_sms_req($msg_text, $mobile);

        $this->set_log("reserve", $mobile, "9000");
    }


    //* Digital Menu *//

    public function send_digital_menu_sms_order_to_customer($name, $date, $time, $order_id, $center, $mobile)
    {
        $msg_text = $this->get_sms_content_by_code("50001");

        $msg_text = str_replace("[name]", $name, $msg_text);
        $msg_text = str_replace("[date]", $date, $msg_text);
        $msg_text = str_replace("[time]", $time, $msg_text);
        $msg_text = str_replace("[order_id]", $order_id, $msg_text);
        $msg_text = str_replace("[center]", $center, $msg_text);

        $this->send_sms_req($msg_text, $mobile);

        $this->set_log("digital_menu", $mobile, "50001");
    }

    public function send_digital_menu_sms_order_to_admin($name, $date, $time, $order_id, $customer_mobile, $price, $mobile)
    {
        $msg_text = $this->get_sms_content_by_code("50002");

        $msg_text = str_replace("[name]", $name, $msg_text);
        $msg_text = str_replace("[customer_mobile]", $customer_mobile, $msg_text);
        $msg_text = str_replace("[date]", $date, $msg_text);
        $msg_text = str_replace("[time]", $time, $msg_text);
        $msg_text = str_replace("[order_id]", $order_id, $msg_text);
        $msg_text = str_replace("[price]", $price, $msg_text);

        $this->send_sms_req($msg_text, $mobile);

        $this->set_log("digital_menu", $mobile, "50002");
    }

    public function send_digital_menu_sms_order_to_chef($name, $date, $time, $order_id, $details, $mobile)
    {
        $msg_text = $this->get_sms_content_by_code("50003");

        $msg_text = str_replace("[name]", $name, $msg_text);
        $msg_text = str_replace("[date]", $date, $msg_text);
        $msg_text = str_replace("[time]", $time, $msg_text);
        $msg_text = str_replace("[time]", $time, $msg_text);
        $msg_text = str_replace("[order_id]", $order_id, $msg_text);
        $msg_text = str_replace("[details]", $details, $msg_text);

        $this->send_sms_req($msg_text, $mobile);

        $this->set_log("digital_menu", $mobile, "50003");
    }

    public function get_sms_price_by_code($code)
    {
        $db = new db();

        $sql = "select price from sms_patterns where sms_code = $code";
        $price = $db->get_var_query($sql);
        return $price;
    }

}
