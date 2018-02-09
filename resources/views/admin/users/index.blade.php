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
                    <th>Name</th>
                    <th>Role</th>
                    <th>Email</th>
                    {{--<th>Status</th>--}}
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->email }}</td>
                        {{--<td>{{ $user->status }}</td>--}}
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                            <a  href="/admin/users/{{$user->id}}/edit" class="btn btn-xs btn-warning" >Edit</a>
                            <form action="/admin/users/{{ $user->id }}" method="post">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button class="btn btn-xs btn-danger">Delete</button>
                            </form>
                            <a  href="/admin/reset-password/{{$user->id}}/" class="btn btn-xs btn-info resetPasswordButton" >Reset Password</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{--<div class="col-md-12">--}}
        {{--<div class="box box-primary">--}}
            {{--<div class="box-header with-border">--}}
                {{--<h3 class="box-title">--}}
                    {{--<i class="fa fa-users"></i> Users--}}
                {{--</h3>--}}
            {{--</div>--}}
            {{--<div class="box-header with-border">--}}

                {{--<form class="create-form" action="/admin/users/create">--}}
                    {{--<button type="submit" class="btn btn-success btn-block" value="Add New User">--}}
                {{--</form>--}}
            {{--</div>--}}

            {{--<div class="box-body">--}}

                {{--<table id="users" class="table table-responsive table-condensed">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th>Name</th>--}}
                        {{--<th>Email</th>--}}
                        {{--<th>Status</th>--}}
                        {{--<th>Created At</th>--}}
                        {{--<th>Updated At</th>--}}
                        {{--<th>Actions</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tfoot>--}}
                    {{--<tr>--}}
                        {{--<th>Name</th>--}}
                        {{--<th>Email</th>--}}
                        {{--<th>Status</th>--}}
                        {{--<th>Created At</th>--}}
                        {{--<th>Updated At</th>--}}
                        {{--<th>Actions</th>--}}
                    {{--</tr>--}}
                    {{--</tfoot>--}}
                    {{--<tbody>--}}
                    {{--@foreach($users as $user)--}}
                        {{--@if($user->name === 'Super Admin')--}}

                        {{--@else--}}
                            {{--<tr>--}}
                                {{--<td>{{ $user->name}}</td>--}}
                                {{--<td>{{ $user->email }}</td>--}}
                                {{--<td>{{ $user->status }}</td>--}}
                                {{--<td>{{ $user->created_at }}</td>--}}
                                {{--<td>{{ $user->updated_at }}</td>--}}
                                {{--<td class="table-commands">--}}
                                    {{--<form action="/admin/users/{{$user->id}}/edit">--}}
                                        {{--<input type="submit" class="btn btn-sm btn-warning" value="Edit">--}}
                                    {{--</form>--}}
                                {{--</td>--}}
                                {{--<td class="table-commands">--}}
                                    {{--<form action="/admin/users/{{$user->id}}/reset-password">--}}
                                        {{--<input type="submit" class="btn btn-sm btn-info" value="Reset Password">--}}
                                    {{--</form>--}}
                                {{--</td>--}}
                                {{--@endif--}}
                            {{--</tr>--}}
                            {{--@endforeach--}}
                    {{--</tbody>--}}
                {{--</table>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection
@section('scripts')
    <script type="text/javascript">
        $('.resetPasswordButton').click(function(e) {
            var link = e.target;
            console.log();
            var name = $(link).parent().parent().children().first().text();

            name.charAt(name.length-1) == 's' ? name+="'" : name+="'s"

            return confirm( "Are you sure you want reset " + name +" password?");
        });
    </script>
@endsection