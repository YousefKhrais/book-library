<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('dashboard.category.index')->with('categories', $categories);
    }

    public function create()
    {
        return view('dashboard.category.create');
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        return view('dashboard.category.edit')->with('category', $category);
    }

    public function show($id)
    {
        return view('dashboard.category.show');
    }

    public function store(Request $request)
    {
        $name = $request['name'];
        $description = $request['description'];

        $category = new Category();
        $category->name = $name;
        $category->description = $description;

        $result = $category->save();

        $request->session()->flash('message', 'Successfully created a new category');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->session()->flash('message', 'Updated Successfully ');
        return redirect()->back();
    }

    public function destroy($id)
    {
        return redirect()->back();
    }

    public function restore($id)
    {
        return redirect()->back();
    }
}
