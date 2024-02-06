<?php

namespace public_html\class;

class account
{

    public function get_all_city()
    {
        $db = new db();
        $sql = "select distinct a_city from account where a_slug != '' order by a_city asc";
        $res = $db->get_select_query($sql);
        return $res;
    }

    public function get_sites($city = "")
    {
        $db = new db();
        if ($city != "") {
            $sql = "select * from account where a_slug != '' and a_city = '$city' order by a_id asc";
        } else {
            $sql = "select * from account where a_slug != '' order by a_id asc";
        }
        $res = $db->get_select_query($sql);
        return $res;
    }

    public function get_account_column($a_id, $column)
    {
        $db = new db();
        $sql = "select $column from account where a_id = $a_id";
        $res = $db->get_var_query($sql);
        return $res;
    }

    public function get_active_feedback_url($a_id)
    {
        $db = new db();
        $sql = "select f.f_id from feedback f inner join feedback_question fq on f.f_id = fq.f_id where f.a_id = $a_id and f.f_status = 1";
        $f_id = $db->get_var_query($sql);
        return $url = "https://heliapp.ir/f.php?id=" . $f_id;
    }

}
