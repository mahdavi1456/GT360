<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $tabele = "settings";
    protected $guarded = [];

    public function updateSetting($key, $value, $account_id)
    {
        $s = Setting::where(['key' => $key, 'account_id' => $account_id])->first();
        if ($s) {
            $s->update([
                'value' => $value
            ]);
        } else {
            Setting::create([
                'key' => $key,
                'value' => $value,
                'account_id' => $account_id
            ]);
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
