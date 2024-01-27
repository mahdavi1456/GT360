<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\Setting;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $themes = Theme::where('status', 'active')->get();
        $settingModel = new Setting;
        $defaultTheme = $settingModel->getSetting('default_theme', 0);
        return view('admin.settings.settings', compact('themes', 'defaultTheme'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $account=0;
        if($request->has('action_type') and $request->action_type=='theme'){
            $account=auth()->user()->account->id;
        }
        $settings=$request->except('_token','action_type');
        $setting= new Setting;
        foreach ($settings as $key => $value) {
           $setting->updateSetting($key,$value,$account);
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
