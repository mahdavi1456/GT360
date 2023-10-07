<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->account) {
            $account = Account::find($request->account);
            if ($account) {
                $products = $account->products()->sortDesc();
                $categories = $account->categories();
            } else {
                $products = [];
                $categories = [];
            }
        } else {
            $products = Product::query()->orderBy('created_at', 'desc')->get();
            $categories = Category::all();
        }

        if ($request->category) {
            $category = Category::find($request->category);
            if ($category) {
                $products = $category->products;
            } else {
                $products = [];
            }
        }

        return view('front.product.list', compact('products', 'categories', 'account'));
    }

    public function single($id)
    {
        $product = Product::findOrFail($id);
        $media = $product->media;

        return view('front.product.single', compact('product', 'media'));
    }
}
