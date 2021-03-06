@extends('layouts.dashboard.main')

@section('pageContent')
    <div class="col-sm-13">
        <div class="card">
            <div class="card-header"><h4>Create Author</h4></div>
            <div class="card-body">
                @if (session()->has('add_status'))
                    @if (session('add_status'))
                        <div class="alert alert-success">Created Successfully</div>
                        @else
                            <div class="alert alert-danger">Failed to create author</div>
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
                <form action="{{ route('admin.author.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="0" id="menuElementId"/>
                    <table class="table table-striped table-bordered datatable">
                        <tbody>
                        <tr>
                            <th>
                                Author Name
                            </th>
                            <td>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    value=""
                                    placeholder="Name"
                                    required/>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Country
                            </th>
                            <td>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="country"
                                    value=""
                                    placeholder="country"
                                    required/>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Gender
                            </th>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender"
                                           value="Male" id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender"
                                           value="Female" id="flexRadioDefault2">
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

