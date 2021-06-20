@extends('layouts.dashboard.main')

@section('pageContent')
    <div class="col-sm-13">
        <div class="card">
            <div class="card-header"><h4>Edit Publisher</h4></div>
            <div class="card-body">
                @if (session()->has('add_status'))
                    @if (session('add_status'))
                        <div class="alert alert-success">Updated Successfully</div>
                    @else
                        <div class="alert alert-danger">Failed to update author</div>
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
                <form action="{{url('admin/publisher/update/'.$publisher->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$publisher->id}}" id="menuElementId"/>
                    <table class="table table-striped table-bordered datatable">
                        <tbody>
                        <tr>
                            <th>
                                Publisher Name
                            </th>
                            <td>
                                <input type="text" class="form-control" name="name" value="{{$publisher->name}}"
                                       placeholder="Name" required/>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Address
                            </th>
                            <td>
                                <input type="text" class="form-control" name="address" value="{{$publisher->address}}"
                                       placeholder="Address" required/>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Website
                            </th>
                            <td>
                                <input type="text" class="form-control" name="website" value="{{$publisher->website}}"
                                       placeholder="Website" required/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div style="margin-top:16px;">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <a class="btn btn-primary" href="{{ route('admin.publisher.index') }}">Return</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

