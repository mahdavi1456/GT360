<?php

namespace public_html\class;

class user
{

    public function save_otp($code, $mobile)
    {
        $db = new db();
        date_default_timezone_set("Asia/Tehran");
        $set_time = date('Y-m-d H:i:s');
        $sql = "insert into otp_code(code, mobile, set_time) values('$code', '$mobile', '$set_time')";
        $db->ex_query($sql);
    }

    public function generate_otp($length)
    {
        $code = rand(1000, 9999);
        return $code;
    }

    public function confirm_otp($mobile, $code)
    {
        $db = new db();
        $pr = new prime();

        date_default_timezone_set("Asia/Tehran");

        $code = $pr->eng_number($code);

        $sql_exist_code = "select * from otp_code where code = '$code' and mobile = '$mobile' order by id desc limit 1";
        $res_exist_code = $db->get_select_query($sql_exist_code);

        if (count($res_exist_code) == 0) {
            return "uncorrect_code";
        } else {
            $_SESSION["favcolor"] = 1;
            return "success_auth";
        }
    }

    public function get_fullname_user()
    {
        $db = new db();
        $a_id = $_SESSION['a_id'];
        $fullname = "";
        if (isset($_COOKIE['is_auth']) and !empty($_COOKIE['is_auth'])) {
            $p_mobile = $_COOKIE['user_mobile'];
            $sql = "select * from person where p_mobile = '$p_mobile'";
            $res = $db->get_select_query($sql, 1, $a_id);
            if (count($res) > 0) {
                $fullname = $res[0]['p_name'] . ' ' . $res[0]['p_family'];
            }
        }
        return $fullname;
    }

    public function get_slug_account()
    {
        $db = new db();
        $a_id = $_SESSION['a_id'];
        $slug = $db->get_var_query("select a_slug from account where a_id = $a_id");
        return $slug;
    }

    public function get_users_by_level($a_id, $u_level)
    {
        $db = new db();

        $sql = "select * from user where a_id = $a_id and u_level = $u_level";
        $users = $db->get_select_query($sql);

        return $users;
    }

}
