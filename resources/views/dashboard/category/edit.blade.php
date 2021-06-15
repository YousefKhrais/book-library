@extends('layouts.main')

@section('pageContent')
    <div class="col-sm-13">
        <div class="card">
            <div class="card-header"><h4>Edit Category</h4></div>
            <div class="card-body">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{url('admin/category/update/'.$category->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$category->id}}" id="menuElementId"/>
                    <table class="table table-striped table-bordered datatable">
                        <tbody>
                        <tr>
                            <th>
                                Category Name
                            </th>
                            <td>
                                <input type="text" class="form-control" name="name" value=""
                                       placeholder="{{$category->name}}"/>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Description
                            </th>
                            <td>
                                <input type="text" class="form-control" name="description" value=""
                                       placeholder="{{$category->description}}"/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div style="margin-top:16px;">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <a class="btn btn-primary" href="{{ route('admin.category.index') }}">Return</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

