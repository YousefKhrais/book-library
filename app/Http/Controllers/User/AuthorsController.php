<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;

class AuthorsController extends Controller
{
    public function index()
    {
        $authors = Author::get();
        $books = Book::get();

        return view('user.author.index')
            ->with('authors', $authors)
            ->with('books', $books);
    }

    public function show($id)
    {
        $authors = Author::get();

        $selected_author = Author::where('id', $id)
            ->with('books')
            ->first();

        if ($selected_author != null) {
            return view('user.author.show')
                ->with('authors', $authors)
                ->with('selected_author', $selected_author);
        } else {
            return redirect()->route('user.author.index')->withErrors(['Author does not exists']);
        }
    }
}
