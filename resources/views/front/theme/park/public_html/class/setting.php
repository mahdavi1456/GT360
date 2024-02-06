<?php

namespace public_html\class;

class setting
{

    public function get_setting($key)
    {
        $db = new db();

        $sql = "select meta_value from setting where meta_key = '$key'";
        $res = $db->get_var_query($sql);
        return $res;
    }

}
