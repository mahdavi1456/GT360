<?php

namespace App\Models;

use Carbon\Carbon;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Gate;

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
        return $setting;
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

    public static function getProjectFullSlug($accountId)
    {
        // $projectId = Project::checkOpenProject($accountId)->project_id;
         $checkOpenProject = Project::checkOpenProject($accountId);
        // $project = Project::find($projectId);
        if ($checkOpenProject) {
            $project = Project::find($checkOpenProject->project_id);
            // return "https://app.gtch.ir/web/" . $project->slug;
            return url('web') .'/'. $project->slug;
        } else {
            return null;
        }
    }
    public function charge()
    {
        if (Gate::allows('SuperAccount')) {
           return true;
        }

            $expirationTime = Carbon::parse($this->expire);
            if (Carbon::now()->lt($expirationTime)) {
                return true;
            }

        return false;
    }
    public function deltaExpire()
    {
        if ($this->expire) {
            if ($this->charge()) {
                return "تا پایان اعتبار: " .Carbon::parse($this->expire)->diffForHumans(['parts'=>2]);
            }else {
                return "پایان یافته: " .Carbon::parse($this->expire)->diffForHumans(['parts'=>2]);
            }
         }

        return false;
    }

}
