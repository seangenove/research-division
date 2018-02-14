@extends('layouts.admin')
@section('content')
    <div class="col-md-2"></div>
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

                <form method="post" action="{{ url("/admin/users/{$user->id}/") }}" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="box-body">

                        <div class="form-group">
                            <label for="image">Profile Picture</label>
                            <input name="image" type="file" id="image"
                                   value="{{ old ('image', isset($user) ? $user->image : '' )}}">
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name"
                                   placeholder="Enter name" value="{{old ('name', isset($user) ? $user->name : '' )}}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input name="email" type="email" class="form-control" id="email"
                                   placeholder="Enter email"
                                   value="{{ old ('email', isset($user) ? $user->email : '') }}" readonly>
                        </div>

                        @if(Auth::user()->role == "admin")
                            <div class="form-group">
                                <label for="Role">Role</label>
                                <select name="role" class="form-control" disabled>
                                    <option value="{{ old ('role', isset($user) ? $user->role : '') }}">Please
                                        select..
                                    </option>
                                    <option {{ $user->role ===  'admin' ? 'selected' : ''}}  value="admin">
                                        Admin
                                    </option>
                                    <option {{ $user->role ===  'rr' ? 'selected' : ''}} value="rr">Research
                                        and
                                        Records
                                    </option>
                                    <option {{ $user->role ===  'me' ? 'selected' : ''}} value="me">
                                        Monitoring
                                        and
                                        Evaluation
                                    </option>
                                </select>
                            </div>
                        @endif

                        <div class="form-group">
                            <input class="btn btn-primary pull-right" type="submit"
                                   value="{{ $submitButtonText or 'Update' }}">
                        </div>
                    </div>
                    <!-- /.box-body -->

                </form>
            </div>
        </div>
        <!-- /.box -->

        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Change User Password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="/admin/update-password">
                {{ csrf_field() }}
                <div class="box-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Old Password</label>
                        <input name="old-password" type="password" class="form-control" id="exampleInputEmail1"
                               value="{{ old('old-password') }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">New Password</label>
                        <input name="new-password" type="password" class="form-control" id="exampleInputEmail1">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Re-enter Password</label>
                        <input name="email" type="password" class="form-control" id="exampleInputEmail1" ">
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