@extends('layouts.admin')


@section('content')
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create new Ordinance</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="/admin/ordinances/">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="number">Number</label>
                        <input name="number" type="text" class="form-control" id="number" placeholder="Enter Ordinance Number" value="{{ old('number') }}">
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="Enter Title" value="{{ old('title')}}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input name="description" type="text" class="form-control" id="description" placeholder="Enter description" value="{{ old('description')}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Authors</label>
                        <input name="authors" type="text" class="form-control" id="authors" placeholder="Enter Authors" value="{{ old('authors')}}">
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="pull-right btn btn-primary">Create</button>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </div>
@endsection