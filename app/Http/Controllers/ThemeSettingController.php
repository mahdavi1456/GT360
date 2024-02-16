<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Setting;
use Illuminate\Http\Request;

class ThemeSettingController extends Controller
{

    public function index()
    {
        $settingModel = new Setting;
        $accountId = auth()->user()->account->id;
        $projectId = Project::checkOpenProject($accountId)->id;
        dd($projectId);
        $themeName = $settingModel->getSetting('active_theme', $accountId, $projectId);
        return view('admin.theme-setting.index', compact('settingModel', 'accountId', 'projectId', 'themeName'));
    }

    public function getImages(Request $req)
    {
        $setting=new Setting();
        $images=[];
        $account_id=auth()->user()->account->id;
        foreach ($req->all() as $key=> $value) {
            if ($name=$setting->getSetting($value,$account_id)) {
                $images[$key]['key']=$value;
                $images[$key]['value']=$name;
            }
        }
        //  return $images;
        if ($images) {
            return view('admin.settings.image_table_setting',compact('images'));
        }
    }

    public function destroyImage()
    {

        $setting=new Setting();
        $setting->updateSetting(request('key'),null,auth()->user()->account->id,'theme-setting');
        return true;
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
