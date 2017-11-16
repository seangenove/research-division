@extends('layouts.admin')


@section('content')
    <div class="col-md-8">
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
                        <input name="old-password" type="password" class="form-control" id="exampleInputEmail1"  value="{{ old('old-password') }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">New Password</label>
                        <input name="new-password" type="password" class="form-control" id="exampleInputEmail1" >
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Re-enter Password</label>
                        <input name="email" type="password" class="form-control" id="exampleInputEmail1"  ">
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