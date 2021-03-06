@extends('layouts.dashboard.main')

@section('pageContent')

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
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
                    <div class="page-header">
                        <div class="pull-left">
                            <p class="card-title">Books Table</p>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-success"
                                    onclick="location.href='{{ url('admin/book/create/') }}'">
                                <i class="fa fa-plus"></i> Add
                            </button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
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
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($books as $book)
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
                                            <td class="text-center">
                                                <button type="button" class="btn btn-warning" style="color:white"
                                                        onclick="location.href='{{ URL('admin/book/edit/'.$book->id) }}'">
                                                    <i class="fa fa-edit"></i> Edit
                                                </button>

                                            </td>
                                            <td class="text-center">
                                                <form method="POST" action="{{ URL('admin/book/delete/'.$book->id) }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button class="btn btn-danger" type="submit">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </form>
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
    </div>
@stop
