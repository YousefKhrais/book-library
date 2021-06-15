<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
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
        if ($category != null) {
            return view('dashboard.category.edit')->with('category', $category);
        } else {
            return redirect()->route('admin.category.index')->withErrors(['Category does not exists']);
        }
    }

    public function store(CategoryRequest $request)
    {
        $name = $request['name'];
        $description = $request['description'];

        if (Category::where('name', '=', $name)->count() == 0) {
            $category = new Category();
            $category->name = $name;
            $category->description = $description;

            $result = $category->save();

            return redirect()->back()->with('add_status', $result);
        } else {
            return redirect()->back()->withErrors(['Another Category with same name already exists']);
        }
    }

    public function update(CategoryRequest $request, $id)
    {
        $name = $request['name'];
        $description = $request['description'];

        if (Category::where('name', '=', $name)->count() == 0) {
            $result = Category::where('id', $id)->update(['name' => $name, 'description' => $description]);
            return redirect()->back()->with('add_status', $result);
        } else {
            return redirect()->back()->withErrors(['Another Category with same name already exists']);
        }
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
