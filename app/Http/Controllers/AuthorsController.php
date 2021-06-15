<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function index()
    {
        $authors = Author::get();
        return view('dashboard.author.index')->with('authors', $authors);
    }

    public function create()
    {
        return view('dashboard.author.create');
    }

    public function edit($id)
    {
        $author = Author::where('id', $id)->first();
        return view('dashboard.author.edit')->with('author', $author);
    }

    public function show($id)
    {
        return view('dashboard.author.show');
    }

    public function store(Request $request)
    {
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
