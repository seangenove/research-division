@extends('layouts.admin')


@section('content')
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Resolution {{ $resolution->number }} : {{  $resolution->title }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="/admin/resolutions/{{ $resolution->id }}/">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="number">Number</label>
                        <input name="number" type="text" class="form-control" id="number" placeholder="Enter resolution Number" value="{{ $resolution->number }}">
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="Enter Title" value="{{ $resolution->title }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input name="description" type="text" class="form-control" id="description" placeholder="Enter description" value="{{ $resolution->description }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Authors</label>
                        <input name="authors" type="text" class="form-control" id="authors" placeholder="Enter Authors" value="{{ $resolution->authors }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Date Approved By Council</label>
                        <input name="date_approved_by_council" type="date" class="form-control" id="date_approved_by_council" value="{{ $resolution->date_approved_by_council }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Date Signed By Vice Mayor</label>
                        <input name="date_signed_by_vice_mayor" type="date" class="form-control" id="date_signed_by_vice_mayor" value="{{ $resolution->date_signed_by_vice_mayor }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Date Signed By Mayor</label>
                        <input name="date_signed_by_mayor" type="date" class="form-control" id="date_signed_by_mayor" value="{{ $resolution->date_signed_by_mayor   }}">
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="pull-right btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </div>
@endsection