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
                            <p class="card-title">Authors Table</p>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-success"
                                    onclick="location.href='{{ url('admin/author/create/') }}'">
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
                                        <th class="text-center">Author Name</th>
                                        <th class="text-center">Country</th>
                                        <th class="text-center">Gender</th>
                                        <th class="text-center">Books Count</th>
                                        <th class="text-center">Books</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($authors as $author)
                                        <tr>
                                            <td class="text-center">{{$author->id}}</td>
                                            <td class="text-center">{{$author->name}}</td>
                                            <td class="text-center">{{$author->country}}</td>
                                            <td class="text-center">{{$author->gender}}</td>
                                            <td class="text-center">{{$author->books_count}}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary"
                                                        onclick="location.href='{{ url('admin/author/show/'.$author->id) }}'">
                                                    <i class="fa fa-book"></i> View Books
                                                </button>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-warning" style="color:white"
                                                        onclick="location.href='{{ url('admin/author/edit/'.$author->id) }}'">
                                                    <i class="fa fa-edit"></i> Edit
                                                </button>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-danger"
                                                        onclick="location.href='{{ url('admin/author/delete/'.$author->id) }}'">
                                                    <i class="fa fa-trash"></i> Delete
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
    </div>
@stop
