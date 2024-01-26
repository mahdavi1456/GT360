<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $tabele = "settings";
    protected $guarded = [];

    public function updateSetting($key, $value)
    {
        $s = Setting::where('key', $key)->first();
        if ($s) {
            $s->update([
                'value' => $value
            ]);
        } else {
            Setting::create([
                'key' => $key,
                'value' => $value
            ]);
        }
    }

    public function getSetting($key)
    {
        $s = Setting::where('key', $key)->first();
        if ($s) {
            return $s->value;
        } else {
            return null;
        }
    }

}
