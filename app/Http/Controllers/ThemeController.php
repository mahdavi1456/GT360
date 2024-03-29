<?php

namespace App\Http\Controllers;

use App\Models\Nav;
use App\Models\Font;
use App\Models\Plan;
use App\Models\Theme;
use App\Models\Pallete;
use App\Models\Project;
use App\Models\Setting;
use App\Models\PlanType;
use App\Models\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ThemeController extends Controller
{

    public function show()
    {
    }

    public function index()
    {
        $themes = Theme::latest()->with('plan')->get();
        return view('admin.theme.list', compact('themes'));
    }

    public function create()
    {
        $plans = Plan::latest()->get();
        return view('admin.theme.create',compact('plans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'label' => 'required',
            'category' => 'required'
        ]);
        $fileName = null;
        if ($request->file('preview')) {
            $fileName = now()->timestamp . '_' . $request->file('preview')->getClientOriginalName();
            $request->file('preview')->move(public_path(ert('theme-path')), $fileName);
        }
        $theme = Theme::create([
            'name' => $request->name,
            'label' => $request->label,
            'category' => $request->category,
            'slogan' => $request->slogan,
            'details' => $request->details,
            'status' => $request->status,
            'preview' => $fileName
        ]);

        Alert::success('موفق', 'قالب جدید با موفقیت ایجاد شد.');
        return to_route('theme.index');
    }

    public function edit(string $id)
    {
        $theme = Theme::findOrFail($id);
        $plans = Plan::latest()->get();
        return view('admin.theme.edit', compact('theme','plans'));
    }

    public function update(Request $request, string $id)
    {
        $theme = Theme::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'label' => 'required',
            'category' => 'required'
        ]);

        if ($request->file('preview')) {
            $fileName = now()->timestamp . '_' . $request->file('preview')->getClientOriginalName();
            $request->file('preview')->move(public_path(ert('theme-path')), $fileName);
            $theme->update([
                'name' => $request->name,
                'label' => $request->label,
                'category' => $request->category,
                'slogan' => $request->slogan,
                'details' => $request->details,
                'status' => $request->status,
                'preview' => $fileName
            ]);
        } else {
            $theme->update([
                'name' => $request->name,
                'label' => $request->label,
                'category' => $request->category,
                'slogan' => $request->slogan,
                'details' => $request->details,
                'status' => $request->status,
            ]);
        }


        Alert::success('موفق', 'قالب با موفقیت ویرایش شد.');
        return redirect()->route('theme.index');
    }

    public function destroy(string $id)
    {
        $theme = Theme::findOrFail($id);
        $theme->delete();
        Alert::success('موفق', 'قالب با موفقیت حذف شد.');
        return redirect()->route('theme.index');
    }

    public function searchTheme(Request $request)
    {
        $category = $request->input('category');
        $productName = $request->input('product_name');

        $products = Product::query();

        $products = Product::query()
            ->when($category, function ($query) use ($category) {
                $query->whereHas('categories', function ($query) use ($category) {
                    $query->where('cname', $category);
                });
            })
            ->when($productName, function ($query) use ($productName) {
                $query->where('product_name', 'like', '%' . $productName . '%');
            })
            ->get();

        return view('admin.product.list', compact('products', 'categories'));
    }

    public function deleteImage(Request $request)
    {
        $imageId = $request->input('image_id');

        $prodcutMedai = ProductMedia::find($imageId);

        if ($prodcutMedai) {
            $prodcutMedai->delete();

            Storage::delete(public_path($prodcutMedai->image));
        }
    }

    public function choose()
    {
        $settingModel = new Setting;
        $themes = Theme::where('status', 'active')->get();

        $accountId = auth()->user()->account->id;
        $projectId = Project::checkOpenProject($accountId)->project_id;

        $themeName = $settingModel->getSetting('active_theme', $accountId, $projectId);
        $activeTheme = Theme::where(['name' => $themeName])->first();

        return view('admin.theme.chooseTheme', compact('themes', 'accountId', 'projectId', 'themeName', 'activeTheme'));
    }

    public function activeTheme($name)
    {
        $setting = new Setting();

        $accountId = auth()->user()->account->id;
        $projectId = Project::checkOpenProject($accountId)->project_id;

        $setting->updateSetting('active_theme', $name, $accountId, $projectId);
        forgetSite();
        Alert::success('موفق', 'قالب با موفقیت انتخاب شد.');
        return back();
    }

    public function selectComponent($theme)
    {
        $theme = Theme::findOrFail($theme);
        $themComponents = $theme->components;
        //dd($themComponents);
        $pluck = $themComponents->pluck('id')->toArray();
        $components = Component::where('status', 'active')->latest()->get();

        return view('admin.theme.selectComponent', compact('theme', 'components', 'themComponents', 'pluck'));
    }

    public function selectNav($theme)
    {
        $theme = Theme::findOrFail($theme);
        $themNavs = $theme->navs;
        $pluck = $themNavs->pluck('id')->toArray();
        $navs = Nav::latest()->get();
        return view('admin.theme.selectNavs', compact('theme', 'navs', 'themNavs', 'pluck'));
    }

    public function componentStore(Request $request, $theme)
    {
        $theme = Theme::findOrFail($theme);
        $theme->relComponents()->sync($request->components);
        Alert::success('موفق', 'بخش ها تخصیص داده شد.');
        return back();
    }

    public function navStore(Request $request, $theme)
    {
        $theme = Theme::findOrFail($theme);
        $theme->navs()->sync($request->navs);
        Alert::success('موفق', 'فهرست ها تخصیص داده شد.');
        return back();
    }

    public function imageDestroy($theme)
    {
        $theme = Theme::findOrFail($theme);
        if (file_exists(public_path(ert('theme-path') . $theme->preview))) {
            unlink(public_path(ert('theme-path') . $theme->preview));
        }
        $theme->update([
            'preview' => null
        ]);
        Alert::success('موفق', 'تصویر مورد نظر حذف شد');
        return back();
    }

    public function personalize()
    {
        $fonts = Font::all();
        $palletes = Pallete::all();
        $settingModel = new Setting;

        $accountId = auth()->user()->account->id;
        $projectId = Project::checkOpenProject($accountId)->project_id;

        return view('admin.theme.personalize', compact('fonts', 'palletes', 'settingModel', 'accountId', 'projectId'));
    }

    public function updatePersonalize(Request $request)
    {
        $settingModel = new Setting;
        $data = $request->request;

        $accountId = auth()->user()->account->id;
        $projectId = Project::checkOpenProject($accountId)->project_id;

        foreach ($data as $key => $value) {
            $settingModel->updateSetting($key, $value, $accountId, $projectId);
        }

        Alert::success('موفق', 'تنظیمات با موفقیت اعمال شدند.');
        return back();
    }
}
