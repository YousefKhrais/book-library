<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
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
        $categories = Category::select('id', 'name')->get();
        $authors = Author::select('id', 'name')->get();
        $publishers = Publisher::select('id', 'name')->get();

        return view('dashboard.book.create', array(
            'categories' => $categories,
            'authors' => $authors,
            'publishers' => $publishers
        ));
    }

    public function edit($id)
    {
        $book = Book::where('id', $id)->first();
        if ($book != null) {
            $categories = Category::select('id', 'name')->get();
            $authors = Author::select('id', 'name')->get();
            $publishers = Publisher::select('id', 'name')->get();

            return view('dashboard.book.edit', array(
                'book' => $book,
                'categories' => $categories,
                'authors' => $authors,
                'publishers' => $publishers
            ));
        } else {
            return redirect()->route('admin.book.index')->withErrors(['Book does not exists']);
        }
    }

    public function store(BookRequest $request)
    {
        $name = $request['name'];
        $author_id = $request['author_id'];
        $publisher_id = $request['publisher_id'];
        $category_id = $request['category_id'];
        $version = $request['version'];
        $release_date = $request['release_date'];
        $image_url = $request['image_url'];

        if (Book::where('name', '=', $name)->count() == 0) {
            $book = new Book();
            $book->name = $name;
            $book->author_id = $author_id;
            $book->publisher_id = $publisher_id;
            $book->category_id = $category_id;
            $book->version = $version;
            $book->release_date = $release_date;
            $book->image_url = $image_url;

            $result = $book->save();

            return redirect()->back()->with('add_status', $result);
        } else {
            return redirect()->back()->withErrors(['Another Book with same name and version already exists']);
        }
    }

    public function update(BookRequest $request, $id)
    {
        $name = $request['name'];
        $author_id = $request['author_id'];
        $publisher_id = $request['publisher_id'];
        $category_id = $request['category_id'];
        $version = $request['version'];
        $release_date = $request['release_date'];
        $image_url = $request['image_url'];

        if (Book::where('name', '=', $name)->count() == 0) {
            $result = Book::where('id', $id)->update([
                'name' => $name,
                'author_id' => $author_id,
                'publisher_id' => $publisher_id,
                'category_id' => $category_id,
                'version' => $version,
                'release_date' => $release_date,
                'image_url' => $image_url
            ]);
            return redirect()->back()->with('add_status', $result);
        } else {
            return redirect()->back()->withErrors(['Another Book with same name and version already exists']);
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
