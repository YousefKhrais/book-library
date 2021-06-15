@extends('layouts.main')

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
                    <p class="card-title">Categories Table</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="display expandable-table" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center">id</th>
                                        <th class="text-center">Category Name</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Books Count</th>
                                        <th class="text-center">Edit</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td class="text-center">{{$category->id}}</td>
                                            <td class="text-center">{{$category->name}}</td>
                                            <td class="text-center">{{$category->description}}</td>
{{--                                            <td class="text-center">{{$category->books_count}}</td>--}}
                                            <td class="text-center">0</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-secondary"
                                                        onclick="location.href='{{ url('admin/category/edit/'.$category->id) }}'">
                                                    Edit
                                                </button>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-danger"
                                                        onclick="location.href='{{ url('admin/category/delete/'.$category->id) }}'">
                                                    <i class="fa fa-trash"></i>
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <button class="btn btn-primary"
                                    onclick="location.href='{{ url('admin/category/create/') }}'">
                                <i class="fa fa-plus"></i> Add
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
