<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BooksController extends Controller
{

    public function index()
    {
        $books = Book::
        with('author')
            ->with('category')
            ->with('publisher')
            ->select('*')
            ->get();

        return view('dashboard.book.index')->with('books', $books);
    }

    public function create()
    {
        $categories = Category::select('*')->get();
        $authors = Author::select('*')->get();
        $publishers = Publisher::select('*')->get();

        return view('dashboard.book.create', array(
            'categories' => $categories,
            'authors' => $authors,
            'publishers' => $publishers
        ));
    }

    public function edit($id)
    {
        return view('dashboard.book.edit');
    }

    public function show($id)
    {
        return view('dashboard.book.show');
    }

    public function store(Request $request)
    {
        $name = $request['name'];
        $author_id = $request['author_id'];
        $publisher_id = $request['publisher_id'];
        $category_id = $request['category_id'];
        $version = $request['version'];
        $release_date = $request['release_date'];

        $book = new Book();
        $book->name = $name;
        $book->author_id = $author_id;
        $book->publisher_id = $publisher_id;
        $book->category_id = $category_id;
        $book->version = $version;
        $book->release_date = $release_date;

        $result = $book->save();
        $request->session()->flash('message', 'Successfully created a new book -> ' . $result);
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
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
