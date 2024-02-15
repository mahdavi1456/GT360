<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $tabele = "settings";
    protected $guarded = [];

    public static function updateSetting($key, $value, $account_id=0,$file=null)
    {
        // $s = Setting::where(['key' => $key, 'account_id' => $account_id])->first();
        $s = Setting::where(['key' => $key, 'account_id' => session('account_id'),'project_id'=>session('project_id')])->first();
        if ($s) {
            if ($file=='theme-setting') {
                $fileName=Setting::getSetting($key,session('account_id'));
                if ($fileName and file_exists(public_path(ert('tsp').$fileName))) {
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
                'account_id' => session('account_id'),
                'project_id'=>session('project_id')
            ]);
            return $s;
        }
    }

    public static function getSetting($key,$account_id=0)
    {
        $s = Setting::where(['key' => $key, 'account_id' => session('account_id'),'project_id'=>session('project_id')])->first();
        if ($s) {
            return $s->value;
        } else {
            return null;
        }
    }
}
