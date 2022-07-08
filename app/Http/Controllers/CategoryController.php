<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('pages.adminPages.category.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.adminPages.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|string'
        ]);

        $categories = new Category();
        $input = $request->all();
        $categories->category_name = $input['category_name'];

        $categories->save();

        return redirect(route('admin.category'));
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('pages.adminPages.category.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_name' => 'required|string'
        ]);

        $categories = Category::find($id);
        $input = $request->all();
        $categories->category_name = $input['category_name'];

        $categories->save();

        return redirect(route('admin.category'));
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect(route('admin.category'));
    }
}
