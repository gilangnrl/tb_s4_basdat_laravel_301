<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductControler extends Controller
{
    public function index()
    {
        $products = Product::with('categories')->orderBy('created_at', 'desc')->get();

        return view('pages.adminPages.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('pages.adminPages.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
        ]);

        $input = $request->all();
        $product = new Product();
        $product->product_name = $input['product_name'];
        $product->product_description = $input['product_description'];
        $product->product_price = $input['product_price'];
        $product->save();

        if (count($input['categories']) > 0) {
            foreach ($input['categories'] as $category) {
                $product->categories()->attach($category);
            }
        }

        return redirect(route('admin.product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('pages.adminPages.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
        ]);

        $product = Product::find($id);
        $input = $request->all();
        $product->product_name = $input['product_name'];
        $product->product_description = $input['product_description'];
        $product->product_price = $input['product_price'];
        $product->save();

        if (count($input['categories']) > 0) {
            $product->categories()->detach();
            foreach ($input['categories'] as $category) {
                $product->categories()->attach($category);
            }
        }

        return redirect(route('admin.product'));
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->categories()->detach();
        $product->delete();

        return redirect(route('admin.product'));
    }
}
