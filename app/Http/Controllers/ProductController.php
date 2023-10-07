<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('admin.product.list', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required',
            'purchase_price' => 'numeric',
            'sales_price' => 'numeric',
            'inventory' => 'numeric',
        ]);

        $product = Product::create([
            'product_name' => $request->product_name,
            'purchase_price' => $request->purchase_price,
            'sales_price' => $request->sales_price,
            'inventory' => $request->inventory,
            'user_id' => Auth::user()->id
        ]);

        $product->categories()->sync($request->categories);

        if (!is_null($request->get('files'))) {
            $files = json_decode($request->get('files'));
            foreach ($files as $file) {
                ProductMedia::create([
                    'product_id' => $product->id,
                    'image' => $file
                ]);
            }
        };

        Alert::success('موفق', 'محصول جدید با موفقیت ایجاد شد.');
        return back();
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
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'product_name' => 'required',
        ]);

        $product->update([
            'product_name' => $request->product_name,
            'purchase_price' => $request->purchase_price,
            'sales_price' => $request->sales_price,
            'inventory' => $request->inventory,
        ]);

        $product->categories()->sync($request->categories);

        Alert::success('موفق', 'محصول با موفقیت ایجاد شد.');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        Alert::success('موفق', 'محصول با موفقیت حذف شد.');
        return redirect()->route('product.index');
    }


    public function searchproduct(Request $request)
    {
        $categories = Category::all();
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

}
