<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublisherRequest;
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
        if ($publisher != null) {
            return view('dashboard.publisher.edit')->with('publisher', $publisher);
        } else {
            return redirect()->route('admin.publisher.index')->withErrors(['Publisher does not exists']);
        }
    }

    public function show($id)
    {
        $publisher = Publisher::where('id', $id)
            ->with('books')
            ->first();

        if ($publisher != null) {
            return view('dashboard.publisher.show')->with('publisher', $publisher);
        } else {
            return redirect()->route('admin.publisher.index')->withErrors(['Publisher does not exists']);
        }
    }

    public function store(PublisherRequest $request)
    {
        $name = $request['name'];
        $address = $request['address'];
        $website = $request['website'];

        if (!Publisher::where([['name', '=', $name]])->exists()) {
            $publisher = new Publisher();
            $publisher->name = $name;
            $publisher->address = $address;
            $publisher->website = $website;
            $publisher->books_count = 0;

            $result = $publisher->save();

            return redirect()->back()->with('add_status', $result);
        } else {
            return redirect()->back()->withErrors(['Another Publisher with same name already exists']);
        }
    }

    public function update(PublisherRequest $request, $id)
    {
        $name = $request['name'];
        $address = $request['address'];
        $website = $request['website'];

        if (!Publisher::where([['id', '!=', $id], ['name', '=', $name]])->exists()) {
            $result = Publisher::where('id', $id)->update(['name' => $name, 'address' => $address, 'website' => $website]);
            return redirect()->back()->with('add_status', $result);
        } else {
            return redirect()->back()->withErrors(['Another Publisher with same name already exists']);
        }
    }

    public function destroy($id)
    {
        $publisher = Publisher::where('id', $id)->first();

        if ($publisher != null) {
            if ($publisher->books_count == 0) {
                $result = $publisher->delete();
                return redirect()->back()->with('add_status', $result);
            } else {
                return redirect()->route('admin.publisher.index')->withErrors(['You have to delete the publisher books first']);
            }
        } else {
            return redirect()->route('admin.publisher.index')->withErrors(['Publisher does not exists']);
        }
    }

    public function restore($id)
    {
        return redirect()->back();
    }
}
