<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\Setting;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{

    public function index()
    {
        $themes = Theme::where('status', 'active')->get();
        $settingModel = new Setting;
        $defaultTheme = $settingModel->getSetting('default_theme', 0);
        return view('admin.settings.settings', compact('themes', 'defaultTheme'));
    }

    public function store(Request $request)
    {

        $account = 0;
        if ($request->has('action_type') and $request->action_type == 'theme') {
            $account = auth()->user()->account->id;
        }
        $setting = new Setting;
        if ($request->has('send_type') and $request->send_type == 'ajax') {
            if ($request->file()) {
                foreach ($request->file() as $key => $value) {
                    $fileName = now()->timestamp . '_' . $value->getClientOriginalName();
                    $value->move(public_path(ert('tsp')), $fileName);
                    $image = $setting->updateSetting($key, $fileName, auth()->user()->account->id, 'theme-setting');
                }
            }
            return '  <div class="imageLoader">
                        <img src="' .asset(ert('tsp') . $image['value'] ). '" class="w-100 object-fit-contain">
                              </div>';
        }

        $fileIndexes = array_keys($request->file());
        $fileIndexes[] = '_token';
        $fileIndexes[] = 'action_type';
        $fileIndexes[] = 'send_type';
        $fileIndexes[] = 'form_id';

        $settings = $request->except($fileIndexes);
        foreach ($settings as $key => $value) {
            $setting->updateSetting($key, $value, $account);
        }

        alert()->success('موفق', 'موارد مورد نظر ثبت شد');
        return back();
    }
}
