<?php

namespace App\Http\Controllers;

use App\Models\Nav;
use App\Models\Theme;
use App\Models\Setting;
use App\Models\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ThemeController extends Controller
{

    public function index()
    {
        $themes = Theme::latest()->get();
        return view('admin.theme.list', compact('themes'));
    }

    public function create()
    {
        return view('admin.theme.create');
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
        return view('admin.theme.edit', compact('theme'));
    }

    public function update(Request $request, string $id)
    {
        $theme = Theme::findOrFail($id);

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
        $theme->update([
            'name' => $request->name,
            'label' => $request->label,
            'category' => $request->category,
            'slogan' => $request->slogan,
            'details' => $request->details,
            'status' => $request->status,
            'preview' => $fileName
        ]);

        Alert::success('موفق', 'قالب با موفقیت ویرایش شد.');
        return redirect()->route('theme.index');
    }

    /**
     * Remove the specified resource from storage.
     */
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
        $themes = Theme::where('status', 'active')->get();
        // dd($themes);
        $account = auth()->user()->account;

        return view('admin.theme.chooseTheme', compact('themes', 'account'));
    }

    public function activeTheme($name)
    {
        $setting = new Setting();
        $setting->updateSetting('active_theme', $name, auth()->user()->account->id);
        Alert::success('موفق', 'قالب با موفقیت انتخاب شد.');
        return back();
    }

    public function selectComponent($theme)
    {
        $theme = Theme::findOrFail($theme);
        $themComponents = $theme->components;
        //dd($themComponents);
        $pluck = $themComponents->pluck('id')->toArray();
        $components = Component::latest()->get();
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
}
