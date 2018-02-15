@extends('layouts.admin')
@section('styles')
    <style>
        .panel-login {
            border-color: #ccc;
            -webkit-box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
            box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
        }

        .panel-login > .panel-heading {
            color: #00415d;
            background-color: #fff;
            border-color: #fff;
            text-align: center;
        }

        .panel-login > .panel-heading a {
            text-decoration: none;
            color: #666;
            font-weight: bold;
            font-size: 15px;
            -webkit-transition: all 0.1s linear;
            -moz-transition: all 0.1s linear;
            transition: all 0.1s linear;
        }

        .panel-login > .panel-heading a.active {
            color: #029f5b;
            font-size: 18px;
        }

        .panel-login > .panel-heading hr {
            margin-top: 10px;
            margin-bottom: 0px;
            clear: both;
            border: 0;
            height: 1px;
            background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
            background-image: -moz-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
            background-image: -ms-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
            background-image: -o-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
        }

        .panel-login input[type="text"], .panel-login input[type="email"], .panel-login input[type="password"] {
            height: 45px;
            border: 1px solid #ddd;
            font-size: 16px;
            -webkit-transition: all 0.1s linear;
            -moz-transition: all 0.1s linear;
            transition: all 0.1s linear;
        }

        .panel-login input:hover,
        .panel-login input:focus {
            outline: none;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            border-color: #ccc;
        }

        .btn-login {
            background-color: #59B2E0;
            outline: none;
            color: #fff;
            font-size: 14px;
            height: auto;
            font-weight: normal;
            padding: 14px 0;
            text-transform: uppercase;
            border-color: #59B2E6;
        }

        .btn-login:hover,
        .btn-login:focus {
            color: #fff;
            background-color: #53A3CD;
            border-color: #53A3CD;
        }

        .forgot-password {
            text-decoration: underline;
            color: #888;
        }

        .forgot-password:hover,
        .forgot-password:focus {
            text-decoration: underline;
            color: #666;
        }

        .btn-register {
            background-color: #1CB94E;
            outline: none;
            color: #fff;
            font-size: 14px;
            height: auto;
            font-weight: normal;
            padding: 14px 0;
            text-transform: uppercase;
            border-color: #1CB94A;
        }

        .btn-register:hover,
        .btn-register:focus {
            color: #fff;
            background-color: #1CA347;
            border-color: #1CA347;
        }

    </style>
@endsection
@section('content')
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="panel panel-login">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <a href="#" class="active" id="profile-link">Edit Profile</a>
                    </div>
                    <div class="col-xs-6">
                        <a href="#" id="cp-link">Change Password</a>
                    </div>
                </div>
                <hr>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
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
                        <form id="profile-form" method="post" action="{{ url("/admin/users/{$user->id}/") }}"
                              style="display: block;" enctype="multipart/form-data">
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
                                           placeholder="Enter name"
                                           value="{{old ('name', isset($user) ? $user->name : '' )}}">
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
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary pull-right" type="submit"
                                       value="{{ $submitButtonText or 'Update' }}">
                            </div>
                            <!-- /.box-body -->
                        </form>
                    </div>
                </div>
                <!-- /.box -->

                <!-- form start -->
                <form id="cp-form" method="post" action="/admin/update-password" style="display: none;">
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
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function () {

            $('#profile-link').click(function (e) {
                $("#profile-form").delay(100).fadeIn(100);
                $("#cp-form").fadeOut(100);
                $('#cp-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
            $('#cp-link').click(function (e) {
                $("#cp-form").delay(100).fadeIn(100);
                $("#profile-form").fadeOut(100);
                $('#profile-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });

        });
    </script>
@endsection