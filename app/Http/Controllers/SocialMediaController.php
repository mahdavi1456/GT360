<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;


class SocialMediaController extends Controller
{
    public function index()
    {
        $settingModel = new Setting;
        return view('admin.social-media.list', compact('settingModel'));
    }

    public function store(Request $request)
    {
        $settingModel = new Setting;
        $data = $request->request;

        foreach ($data as $key => $value) {
            $settingModel->updateSetting($key, $value,0);
        }
        Alert::success('موفق', 'تنظیمات با موفقیت اعمال شدند.');
        return back();
    }

}
