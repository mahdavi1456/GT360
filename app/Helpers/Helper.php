<?php

namespace App\Helpers;

use App\Models\Setting;

class Helper
{
    function breadcrumb($title)
    { ?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo $title; ?></h1>
                    </div>
                    <!-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">خانه</a></li>
                        <li class="breadcrumb-item active">فرم‌های پیشرفته</li>
                    </ol>
                </div> -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
<?php
    }

    function fa_number($string)
    {
        $en = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        $fa = array("۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹");
        return str_replace($en, $fa, $string);
    }

    function getSetting($key)
    {
        $s = Setting::where('key', $key)->first();
        if($s) {
            $value = $s->value;
        } else {
            $value = null;
        }

        return $value;
    }
}
