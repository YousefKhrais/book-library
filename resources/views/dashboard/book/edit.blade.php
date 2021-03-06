@extends('layouts.dashboard.main')

@section('pageContent')
    <div class="col-sm-13">
        <div class="card">
            <div class="card-header"><h4>Edit Author</h4></div>
            <div class="card-body">
                @if (session()->has('add_status'))
                    @if (session('add_status'))
                        <div class="alert alert-success">Updated Successfully</div>
                    @else
                        <div class="alert alert-danger">Failed to update book</div>
                    @endif
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
                <form action="{{url('admin/book/update/'.$book->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="0" id="menuElementId"/>
                    <table class="table table-striped table-bordered datatable">
                        <tbody>
                        <tr>
                            <th>
                                Book Name
                            </th>
                            <td>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    value="{{$book->name}}"
                                    placeholder="Name"
                                    required/>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Author
                            </th>
                            <td>
                                <select class="form-select" name="author_id" id="author" required>
                                    @foreach ($authors as $author)
                                        <option
                                            value="{{$author->id}}"
                                            @if($book->author_id == $author->id)
                                            selected="selected"
                                            @endif>
                                            {{$author->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Publisher
                            </th>
                            <td>
                                <select class="form-select" name="publisher_id" id="publisher" required>
                                    @foreach ($publishers as $publisher)
                                        <option
                                            value="{{$publisher->id}}"
                                            @if($book->publisher_id == $publisher->id)
                                            selected="selected"
                                            @endif>
                                            {{$publisher->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Category
                            </th>
                            <td>
                                <select class="form-select" name="category_id" id="category" required>
                                    @foreach ($categories as $category)
                                        <option
                                            value="{{$category->id}}"
                                            @if($book->category_id == $category->id)
                                            selected="selected"
                                            @endif>
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Version
                            </th>
                            <td>
                                <input
                                    type="number"
                                    class="form-control"
                                    name="version"
                                    value="{{$book->version}}"
                                    placeholder="Version"
                                    required/>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Book Cover
                            </th>
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Book Cover/Image URL"
                                           name="image_url" aria-label="Book Cover/Image URL"
                                           aria-describedby="button-addon2" value="{{$book->image_url}}" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                                            Upload Image
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Release Date
                            </th>
                            <td>
                                <input
                                    type="date"
                                    class="form-control"
                                    name="release_date"
                                    value="{{$book->release_date}}"
                                    placeholder="Release Date"
                                    required/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div style="margin-top:16px;">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <a class="btn btn-primary" href="{{ route('admin.book.index') }}">Return</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

