@extends('layouts.admin')


@section('content')
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit {{ $user->name }}</h3>
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
            <!-- /.box-header -->
                <!-- form start -->

                    @if(Auth::user()->role == "superadmin")
                <form method="post" action="{{ url("/admin/users/{$user->id}/") }}">
                    @else
                <form method="post" action="{{ url("/admin/show") }}">
                    @endif
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="box-body">

                        <div class="form-group">
                            <label for="image">Profile Picture</label>
                            <input name="image" type="file" class="form-control" id="image"
                                   placeholder="Upload Picture" value="{{ $user->image }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter name" value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter email" value="{{ $user->email }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Role</label>
                            <select name="role" class="form-control">
                                <option value="">Please select..</option>
                                <option {{ $user->role ===  'admin' ? 'selected' : ''}}  value="admin">
                                    Admin
                                </option>
                                <option {{ $user->role ===  'rr' ? 'selected' : ''}} value="rr">Research and
                                    Records
                                </option>
                                <option {{ $user->role ===  'me' ? 'selected' : ''}} value="me">Monitoring
                                    and
                                    Evaluation
                                </option>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="pull-right btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->

        </div>
@endsection