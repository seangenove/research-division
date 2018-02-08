@extends('layouts.admin')


@section('content')
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create new user</h3>
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
                <form method="POST" action="{{ url('/admin/users/') }}">
                    {{ csrf_field() }}
                    <div class="box-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input name="name" type="text" class="form-control"
                                   placeholder="Enter name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Role</label>
                            <select name="role" class="form-control">
                                <option value="">Please select..</option>
                                <option value="admin">Admin</option>
                                <option value="rr">Research and Records</option>
                                <option value="me">Monitoring and Evaluation</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input name="password" type="password" class="form-control"
                                   placeholder="Password" value="{{ old('password') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input name="repassword" type="password" class="form-control"
                                   placeholder="Re enter password" value="{{ old('repassword') }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input name="email" type="z" class="form-control"
                                   placeholder="Enter email" value="{{ old('email')}}">
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="pull-right btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.box -->

    </div>
@endsection