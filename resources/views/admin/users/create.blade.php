@extends('layouts.admin')


@section('content')
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create new user</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="/admin/users/">
                {{ csrf_field() }}
                <div class="box-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input name="password" type="text" class="form-control" id="exampleInputEmail1" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" type="z" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ old('email')}}">
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