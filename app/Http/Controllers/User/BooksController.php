<?php

namespace App\Http\Controllers\User;

use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        $categories = Category::get();

        $books = Book::
        with('author')
            ->with('category')
            ->select('*')
            ->get();

        return view('user.book.index')
            ->with('books', $books)
            ->with('categories', $categories);
    }

    public function show($id)
    {
        $book = Book::where('id', $id)
            ->with('category')
            ->with('author')
            ->with('publisher')
            ->first();

        if ($book != null) {
            return view('user.book.show')->with('book', $book);
        } else {
            return redirect()->route('user.book.index')->withErrors(['Book does not exists']);
        }
    }

    public function search(Request $request)
    {
        $search_input = $request['search_input'];
        dd($search_input);
    }
}
