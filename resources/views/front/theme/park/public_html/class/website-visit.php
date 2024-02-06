<?php

namespace public_html\class;

class website_visit
{

    public function set_visit($a_id)
    {
        $db = new db();

        $visitor_ip = $_SERVER['REMOTE_ADDR'];
        $visit_url = $_SERVER['SCRIPT_URI'];
        $visit_date = date('Y-m-d');
        $visit_time = date('H:i:s');
        $browser = $_SERVER['HTTP_USER_AGENT'];
        $platform = $_SERVER['HTTP_SEC_CH_UA_PLATFORM'];

        $sql = "insert into website_visit(visitor_ip, visit_url, visit_date, visit_time, browser, platform, a_id) ";
        $sql .= "values('$visitor_ip', '$visit_url', '$visit_date', '$visit_time', '$browser', '$platform', $a_id) ";
        $db->ex_query($sql);
    }

}
