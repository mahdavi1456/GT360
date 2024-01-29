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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        return $request->all();
        $account = 0;
        if ($request->has('action_type') and $request->action_type == 'theme') {
            $account = auth()->user()->account->id;
        }
        $setting = new Setting;

        $settings = $request->except('_token', 'action_type');

        foreach ($settings as $key => $value) {
            $setting->updateSetting($key, $value, $account);
        }
        if ($request->file()) {
            foreach ($request->file() as $key => $value) {
                $fileName = now()->timestamp . '_' . $value->getClientOriginalName();
                $value->move(public_path(ert('tsp')),$fileName);
             //   dd($fileName);
                $setting->updateSetting($key, $fileName, $account);
            }

        }
        Alert::success('موفق', 'تنظیمات با موفقیت اعمال شدند.');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
