<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;
use App\Http\Controllers\Controller;

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

    public function show($id)
    {
        $author = Author::where('id', $id)
            ->with('books')
            ->first();

        if ($author != null) {
            return view('dashboard.author.show')->with('author', $author);
        } else {
            return redirect()->route('admin.author.index')->withErrors(['Author does not exists']);
        }
    }

    public function store(AuthorRequest $request)
    {
        $name = $request['name'];
        $country = $request['country'];
        $gender = $request['gender'];

        if (!Author::where('name', '=', $name)->exists()) {
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

        if (!Author::where([['id', '!=', $id], ['name', '=', $name]])->exists()) {
            $result = Author::where('id', $id)->update(['name' => $name, 'country' => $country, 'gender' => $gender]);
            return redirect()->back()->with('add_status', $result);
        } else {
            return redirect()->back()->withErrors(['Another author with same name already exists']);
        }
    }

    public function destroy($id)
    {
        $author = Author::where('id', $id)->first();

        if ($author != null) {
            if ($author->books_count == 0) {
                $result = $author->delete();
                return redirect()->back()->with('add_status', $result);
            } else {
                return redirect()->route('admin.author.index')->withErrors(['You have to delete the author books first']);
            }
        } else {
            return redirect()->route('admin.author.index')->withErrors(['Author does not exists']);
        }
    }

    public function restore($id)
    {
        return redirect()->back();
    }
}
