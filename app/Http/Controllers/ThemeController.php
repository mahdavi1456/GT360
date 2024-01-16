<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

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

        $theme = Theme::create([
            'name' => $request->name,
            'label' => $request->label,
            'category' => $request->category,
            'slogan' => $request->slogan,
            'details' => $request->details,
            'status' => $request->status
        ]);

        Alert::success('موفق', 'قالب جدید با موفقیت ایجاد شد.');
        return back();
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

        $theme->update([
            'name' => $request->name,
            'label' => $request->label,
            'category' => $request->category,
            'slogan' => $request->slogan,
            'details' => $request->details,
            'status' => $request->status
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

            Storage::delete(public_path( $prodcutMedai->image));
        }
    }

}
