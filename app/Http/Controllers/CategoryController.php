<?php

namespace App\Http\Controllers;

use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();

        if (Auth::user()->account->account_acl != 'super-account') {
            $categories = Auth::user()->account->categories->sortDesc();
        }

        return view('admin.category.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cname' => 'required|string|max:255',
            'cdetails' => 'nullable|string',
            'cparent' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category = new Category;
        $category->cname = $request->input('cname');
        $category->cdetails = $request->input('cdetails');
        $category->cparent = $request->input('cparent');
        $category->project_id=getProjectId();
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/categories'), $imageName);
            $category->image = $imageName;
        }

        $category->user_id = Auth::user()->id;
        $category->account_id = Auth::user()->account_id;

        $category->save();

        Alert::success('موفق', 'دسته بندی با موفقیت ایجاد شد.');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all();
        return view('admin.category.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'cname' => 'required|string|max:255',
            'cdetails' => 'nullable|string',
            'cparent' => 'nullable|exists:categories,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category = Category::find($id);

        $category->cname = $request->input('cname');
        $category->cdetails = $request->input('cdetails');
        $category->cparent = $request->input('cparent');
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/categories'), $imageName);
            $category->image = $imageName;
        }
        $category->save();

        Alert::success('موفق', 'دسته بندی با ویرایش شد.');
        return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();

        Alert::success('موفق', 'دسته بندی با موفقیت حذف شد.');
        return redirect()->route('category.index');
    }

    public function deleteImage(Request $request)
    {
        $imageId = $request->input('image_id');

        $category = Category::find($imageId);

        $category_image = $category->image;

        if ($category) {

            $category->update([
                'image' => null
            ]);

            Storage::delete(public_path('images/categories/' . $category_image));
        }
    }

}
