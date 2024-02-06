<?php

namespace public_html\class;

class option
{

    public function root_url()
    {
        echo "https://levelupgc.com/";
    }

    public function get_root_url()
    {
        return "https://levelupgc.com/";
    }

    public function get_site_url()
    {
        //$slug = explode('?', trim(str_replace('/', ' ', $_SERVER['REQUEST_URI'])))[0];
        //return "https://levelupgc.com/" . $slug;
        return "https://levelupgc.com/";
    }

    public function get_a_id()
    {
        $db = new db();
        //$slug = explode('?', trim(str_replace('/', ' ', $_SERVER['REQUEST_URI'])))[0];
        //$a_id = $db->get_var_query("select a_id from account where a_slug = '$slug'");
        $a_id = $db->get_var_query("select a_id from account where a_slug = 'levelup'");
        return $a_id;
    }

    public function get_slug()
    {
        $slug = explode('?', trim(str_replace('/', ' ', $_SERVER['REQUEST_URI'])))[0];
        return $slug;
    }

    public function get_option($key)
    {
        $db = new db();
        $a_id = $this->get_a_id();
        $sql = "select meta_value from site_setting where meta_key = '$key' and a_id = $a_id";
        $res = $db->get_var_query($sql);
        return $res;
    }

    public function get_global_option($key)
    {
        $db = new db();
        $slug = explode('?', trim(str_replace('/', ' ', $_SERVER['REQUEST_URI'])))[0];
        $a_id = $db->get_var_query("select a_id from account where a_slug = '$slug'");

        $sql = "select meta_value from setting where meta_key = '$key'";
        $res = $db->get_var_query($sql);
        return $res;
    }

    public function get_site_home($slug)
    {
        if ($slug == '/') {
            return $this->get_root_url();
        } else {
            return $slug;
        }
    }

    public function get_site_title($slug)
    {
        if ($slug == '/') {
            return "هلی پارک";
        } else {
            return $this->get_option('website_name');
        }
    }

    public function get_main_asset_url()
    {
        return "https://heliapp.ir/gt-content/asset/";
    }

}
