<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublishersController extends Controller
{
    public function index()
    {
        $publishers = Publisher::get();
        return view('dashboard.publisher.index')->with('publishers', $publishers);
    }

    public function create()
    {
        return view('dashboard.publisher.create');
    }

    public function edit($id)
    {
        $publisher = Publisher::where('id', $id)->first();
        return view('dashboard.publisher.edit')->with('publisher', $publisher);
    }

    public function show($id)
    {
        return view('dashboard.publisher.show');
    }

    public function store(Request $request)
    {
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
