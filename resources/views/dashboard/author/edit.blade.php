@extends('layouts.main')

@section('pageContent')
    <div class="col-sm-13">
        <div class="card">
            <div class="card-header"><h4>Edit Author</h4></div>
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
                <form action="{{url('admin/author/update/'.$author->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$author->id}}" id="menuElementId"/>
                    <table class="table table-striped table-bordered datatable">
                        <tbody>
                        <tr>
                            <th>
                                Author Name
                            </th>
                            <td>
                                <input type="text" class="form-control" name="name" value=""
                                       placeholder="{{$author->name}}"/>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Country
                            </th>
                            <td>
                                <input type="text" class="form-control" name="country" value=""
                                       placeholder="{{$author->country}}"/>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Gender
                            </th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender"
                                           id="flexRadioDefault1"
                                           @if($author->gender=='male')
                                           checked
                                        @endif
                                    >
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender"
                                           id="flexRadioDefault2"
                                           @if($author->gender=='female')
                                           checked
                                        @endif
                                    >
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Female
                                    </label>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div style="margin-top:16px;">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <a class="btn btn-primary" href="{{ route('admin.author.index') }}">Return</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

