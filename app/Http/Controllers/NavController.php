<?php

namespace App\Http\Controllers;

use App\Models\Nav;
use App\Models\Page;
use App\Models\Theme;
use App\Models\Setting;
use Illuminate\Http\Request;

class NavController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $navs = Nav::latest()->get();
        ert('cd');
        return view('admin.nav.list', compact('navs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $action = 'create';
        $nav = null;
        if (request('action') == 'update') {
            $action = 'update';
            $nav = Nav::findOrFail(request('nav_id'));
        }
        return view('admin.nav.create', compact('action', 'nav'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token', 'q', 'action', 'nav_id');
        if ($request->action == 'create') {
            Nav::create($data);
            alert()->success('موفق', 'فهرست با موفقیت ساخته شد');
        } else if ($request->action == 'update') {
            $nav = Nav::findOrFail($request->nav_id);
            $nav->update($data);
            alert()->success('موفق', 'فهرست موردنظر ویرایش شد');
        }
        return to_route('nav.index');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nav $nav)
    {
        $nav->delete();
        alert()->success('موفق', 'فهرست موردنظر حذف شد');
        return to_route('nav.index');
    }

    public function navItems()
    {
        if (request('type')=='get-nav-info') {
            $nav=Nav::findOrFail(request('nav'));
            $pages=Page::latest()->get();
            return view('admin.nav.editItems',compact('nav','pages'));
        }

        $setting = new Setting();
        $themeName = $setting->getSetting('active_theme', auth()->user()->account->id);
        if (!$themeName) {
            abort(403,"شما قالب فعال ندارید لطفا یک قالب انتخاب کنید");
        }
        $theme=Theme::where('name',$themeName)->first();
        $navs=$theme->navs;
        return view('admin.nav.selectItems',compact('navs'));
    }
}
