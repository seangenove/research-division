@extends('layouts.admin')
@section('title')
    Profile
@endsection

@section('content')
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Profile</h3>
            </div>
            <div class="box-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <table class="table table-borderless">
                    <tr>
                        <th>Image</th>
                        <td>{{ Auth::user()->image }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>{{ Auth::user()->role }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ Auth::user()->email }}</td>
                    </tr>
                </table>
            </div>

            <div class="box-footer">
                <a href="/admin/edit" class="pull-right btn btn-primary">Edit</a>
            </div>
        </div>
    </div>


@endsection
