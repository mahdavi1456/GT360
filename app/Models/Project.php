<?php

namespace App\Models;

use App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "projects";
    protected $guarded = [];

    public static function accountProjects($accountId)
    {
        $projects = Project::where('account_id', $accountId)->latest()->get();
        return $projects;
    }

    public static function checkOpenProject($accountId)
    {
        $key = "open_project";
        $res = Setting::where([
            'key' => $key,
            'account_id' => $accountId
        ])->first();
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    public static function openProject($accountId, $projectId)
    {
        $setting = Setting::where('key', 'open_project')->where('account_id', $accountId)->first();
        if ($setting) {
            $setting->project_id = $projectId;
            $setting->save();
        } else {
            Setting::create([
                'key' => 'open_project',
                'value' => $projectId,
                'account_id' => $accountId,
                'project_id' => $projectId
            ]);
        }
    }

    public static function closeProject($accountId)
    {
        $projectId = Project::checkOpenProject($accountId)->id;
        $key = "open_project";
        $settingModel = new Setting;
        $settingModel->updateSetting($key, 0, $accountId, $projectId);
    }

    public static function getProjectName($projectId)
    {
        $project = Project::find($projectId);
        if ($project) {
            return $project->title;
        } else {
            return null;
        }
    }

}
