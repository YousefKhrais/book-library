@extends('layouts.dashboard.main')

@section('pageContent')
    <div class="col-sm-13">
        <div class="card">
            <div class="card-header"><h4>Author Books</h4></div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <p class="card-title">Books Table</p>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="display expandable-table" style="width:100%">
                                <thead>
                                <tr>
                                    <th class="text-center">id</th>
                                    <th class="text-center">Book Name</th>
                                    <th class="text-center">Author Name</th>
                                    <th class="text-center">Publisher Name</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Version</th>
                                    <th class="text-center">Release Date</th>
                                    <th class="text-center">Book Cover</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($author->books as $book)
                                    <tr>
                                        <td class="text-center">{{$book->id}}</td>
                                        <td class="text-center">{{$book->name}}</td>
                                        <td class="text-center">{{$book->author->name}}</td>
                                        <td class="text-center">{{$book->publisher->name}}</td>
                                        <td class="text-center">{{$book->category->name}}</td>
                                        <td class="text-center">{{$book->version}}</td>
                                        <td class="text-center">{{$book->release_date}}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary"
                                                    onclick="location.href='{{ $book->image_url }}'">
                                                <i class="fa fa-folder"></i> View Image
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

