<?php

namespace public_html\class;

use database;

class charge
{

    public function check_account_has_sms_charge($type)
    {
        $db = new database();
        $opt = new option();

        $need = $opt->get_option($type . "_cost");
        $st = $_SESSION['account_id'];
        $account = $db->get_select_query("select * from account where a_id = $st", 1);
        $a_sms_sharj = $account[0]['a_sms_sharj'];

        if ($a_sms_sharj >= $need) {
            return true;
        } else {
            return false;
        }
    }

    public function minus_account_sms_charge($code, $a_id)
    {
        $db = new db();
        $sms = new sms();

        $need = $sms->get_sms_price_by_code($code);
        $account = $db->get_select_query("select * from account where a_id = $a_id");
        $a_sms_sharj = $account[0]['a_sms_sharj'];
        $remain = $a_sms_sharj - $need;

        $db->ex_query("update account set a_sms_sharj = $remain where a_id = $a_id");
    }

    public function check_send_sms_perm($type)
    {
        $opt = new option();
        $login_user_sms = $opt->get_option($type);
        if ($login_user_sms) {
            return true;
        } else {
            return false;
        }
    }

}
