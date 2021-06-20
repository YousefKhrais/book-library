<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Publisher;

class PublishersController extends Controller
{
    public function index()
    {
        $publishers = Publisher::get();
        $books = Book::get();

        return view('user.publisher.index')
            ->with('publishers', $publishers)
            ->with('books', $books);
    }

    public function show($id)
    {
        $publishers = Publisher::get();

        $selected_publisher = Publisher::where('id', $id)
            ->with('books')
            ->first();

        if ($selected_publisher != null) {
            return view('user.publisher.show')
                ->with('publishers', $publishers)
                ->with('selected_publisher', $selected_publisher);
        } else {
            return redirect()->route('user.publisher.index')->withErrors(['Publisher does not exists']);
        }
    }
}
