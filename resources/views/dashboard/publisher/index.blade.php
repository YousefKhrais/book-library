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
                            <p class="card-title">Publishers Table</p>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-success"
                                    onclick="location.href='{{ url('admin/publisher/create/') }}'">
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
                                        <th class="text-center">Publisher Name</th>
                                        <th class="text-center">Address</th>
                                        <th class="text-center">Website</th>
                                        <th class="text-center">Books Count</th>
                                        <th class="text-center">View Books</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($publishers as $publisher)
                                        <tr>
                                            <td class="text-center">{{$publisher->id}}</td>
                                            <td class="text-center">{{$publisher->name}}</td>
                                            <td class="text-center">{{$publisher->address}}</td>
                                            <td class="text-center">
                                                <a target="_blank"
                                                   href="{{$publisher->website}}">{{$publisher->website}}</a>
                                            </td>
                                            <td class="text-center">{{$publisher->books_count}}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary"
                                                        onclick="location.href='{{ url('admin/publisher/show/'.$publisher->id) }}'">
                                                    <i class="fa fa-book"></i> View Books
                                                </button>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-warning" style="color:white"
                                                        onclick="location.href='{{ url('admin/publisher/edit/'.$publisher->id) }}'">
                                                    <i class="fa fa-edit"></i> Edit
                                                </button>
                                            </td>
                                            <td class="text-center">
                                                <form method="POST" action="{{ URL('admin/publisher/delete/'.$publisher->id) }}">
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
