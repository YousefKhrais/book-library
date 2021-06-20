<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show($id)
    {
        $categories = Category::get();

        $selected_category = Category::where('id', $id)
            ->with('books')
            ->first();

        if ($selected_category != null) {
            return view('user.category.show')
                ->with('categories', $categories)
                ->with('selected_category', $selected_category);
        } else {
            return redirect()->route('user.book.index')->withErrors(['Category does not exists']);
        }
    }
}
