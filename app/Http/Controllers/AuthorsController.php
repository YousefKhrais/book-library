<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

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
        if ($author != null) {
            return view('dashboard.author.edit')->with('author', $author);
        } else {
            return redirect()->route('admin.author.index')->withErrors(['Author does not exists']);
        }
    }

    public function store(AuthorRequest $request)
    {
        $name = $request['name'];
        $country = $request['country'];
        $gender = $request['gender'];

        if (Author::where('name', '=', $name)->count() == 0) {
            $author = new Author();
            $author->name = $name;
            $author->country = $country;
            $author->gender = $gender;
            $author->books_count = 0;

            $result = $author->save();

            return redirect()->back()->with('add_status', $result);
        } else {
            return redirect()->back()->withErrors(['Another author with same name already exists']);
        }
    }

    public function update(AuthorRequest $request, $id)
    {
        $name = $request['name'];
        $country = $request['country'];
        $gender = $request['gender'];

        if (Author::where('name', '=', $name)->count() == 0) {
            $result = Author::where('id', $id)->update(['name' => $name, 'country' => $country, 'gender' => $gender]);
            return redirect()->back()->with('add_status', $result);
        } else {
            return redirect()->back()->withErrors(['Another author with same name already exists']);
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
