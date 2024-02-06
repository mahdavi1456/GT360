<?php

namespace public_html\class;

class gallery
{

    public $table_gallery = 'website_gallery';

    public function get_image_gallery()
    {
        $db = new db();
        $a_id = $this->get_a_id();
        $type = 'image';
        $sql = "select * from $this->table_gallery where a_id=$a_id and type='$type'";
        $res = $db->get_select_query($sql);
        return $res;
    }


    public function get_video_gallery()
    {
        $db = new db();
        $a_id = $this->get_a_id();
        $type = 'video';
        $sql = "select * from $this->table_gallery where a_id=$a_id and type='$type'";
        $res = $db->get_select_query($sql);
        return $res;
    }

    public function get_a_id()
    {
        $db = new db();
        $slug = explode('?', trim(str_replace('/', ' ', $_SERVER['REQUEST_URI'])))[0];
        $a_id = $db->get_var_query("select a_id from account where a_slug = '$slug'");
        return $a_id;
    }


}
