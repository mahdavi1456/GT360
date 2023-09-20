<?php

namespace App\Http\Controllers;

use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_categories = Category::all();

        $categories = Category::pluck('cname', 'id');
        return view('admin.category.list', compact('categories', 'all_categories'));
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
            'cparent' => 'nullable|exists:categories,id', // بررسی وجود دسته والد معتبر
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category = new Category;
        $category->cname = $request->input('cname');
        $category->cdetails = $request->input('cdetails');
        $category->cparent = $request->input('cparent');

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/categories'), $imageName);
        }

        $category->image = $imageName;

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
        $category = Category::find($id);

        return view('categories.edit', ['category' => $category]);
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
    public function destroy(string $id)
    {
        //
    }
}
