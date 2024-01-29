<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $tabele = "settings";
    protected $guarded = [];

    public function updateSetting($key, $value, $account_id,$file=null)
    {
        $s = Setting::where(['key' => $key, 'account_id' => $account_id])->first();
        if ($s) {
            if ($file=='theme-setting') {
                $fileName=$this->getSetting($key,$account_id);
                if (file_exists(public_path(ert('tsp').$fileName))) {
                   unlink(public_path(ert('tsp').$fileName));
                }
            }
            $s->update([
                'value' => $value
            ]);
            return $s;
        } else {
            $s=Setting::create([
                'key' => $key,
                'value' => $value,
                'account_id' => $account_id
            ]);
            return $s;
        }
    }

    public function getSetting($key, $account_id)
    {
        $s = Setting::where(['key' => $key, 'account_id' => $account_id])->first();
        if ($s) {
            return $s->value;
        } else {
            return null;
        }
    }
}
