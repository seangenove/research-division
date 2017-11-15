@extends('layouts.admin')

@section('styles')
    <style>
        form {
            display: inline;
        }
    </style>

@endsection

@section('content')
    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-users"></i> Users</h3>
        </div>
        <div class="box-body">
            <div>
                <a href="/admin/users/create" class="btn btn-success">Create</a>

            </div>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <a  href="/admin/users/{{$user->id}}/edit" class="btn btn-xs btn-warning" >Edit</a>
                            <form action="/admin/users/{{ $user->id }}" method="post">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button class="btn btn-xs btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection