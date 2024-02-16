<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $tabele = "settings";
    protected $guarded = [];

    public function updateSetting($key, $value, $accountId, $projectId, $file = null)
    {
        // $s = Setting::where(['key' => $key, 'account_id' => $account_id])->first();
        $s = Setting::where([
            'key' => $key,
            'account_id' => $accountId,
            'project_id' => $projectId
        ])->first();
        if ($s) {
            if ($file == "theme-setting") {
                $fileName = Setting::getSetting($key, $accountId);
                if ($fileName and file_exists(public_path(ert('tsp') . $fileName))) {
                    unlink(public_path(ert('tsp') . $fileName));
                }
            }
            $s->update([
                'value' => $value
            ]);
            return $s;
        } else {
            $s = Setting::create([
                'key' => $key,
                'value' => $value,
                'account_id' => $accountId,
                'project_id' => $projectId
            ]);
            return $s;
        }
    }

    public function getSetting($key, $accountId, $projectId)
    {
        $s = Setting::where([
            'key' => $key,
            'account_id' => $accountId,
            'project_id' => $projectId
        ])->first();
        if ($s) {
            return $s->value;
        } else {
            return null;
        }
    }
}
