@extends('layouts.admin')


@section('content')
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                {{--'number', 'title', 'description', 'authors'--}}
                <h3 class="box-title">Edit ORDINANCE {{ $ordinance->number }} : {{  $ordinance->title }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ url("/admin/ordinances/{$ordinance->id}/") }}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="number">Number</label>
                        <input name="number" type="text" class="form-control" id="number"
                               placeholder="Enter Ordinance Number" value="{{ $ordinance->number }}">
                    </div>

                    <div class="form-group">
                        <label for="series">Series</label>
                        <input name="series" type="text" class="form-control" id=series"
                               placeholder="Enter Ordinance Series" value="{{ $ordinance->series }}">
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="Enter Title"
                               value="{{ $ordinance->title }}">
                    </div>

                    <div class="form-group">
                        <label for="keywords">Keywords</label>
                        <textarea class="form-control" rows="5" name="keywords" id="keywords">{{ $ordinance->keywords }}</textarea>
                    </div>

                    <label for="is_accepting">Comments/Suggestions</label>
                    <div class="checkbox">
                        <label><input name="is_accepting" type="checkbox" value=1 @if($ordinance->is_accepting==1) {{"checked"}} @endif>Accept Comments</label>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label for="description">Keywords</label>--}}
                        {{--<input name="keywords" type="text" class="form-control" id="description"--}}
                               {{--placeholder="Enter description" value="{{ $ordinance->keywords }}">--}}
                    {{--</div>--}}

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