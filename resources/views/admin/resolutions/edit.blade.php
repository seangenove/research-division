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
            <form method="post" action="{{ url("/admin/resolutions/{$resolution->id }/") }}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="number">Number</label>
                        <input name="number" type="text" class="form-control" id="number" placeholder="Enter resolution Number" value="{{ $resolution->number }}">
                    </div>

                    <div class="form-group">
                        <label for="series">Series</label>
                        <input name="series" type="text" class="form-control" id=series"
                               placeholder="Enter Ordinance Series" value="{{ $ordinance->series }}">
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="Enter Title" value="{{ $resolution->title }}">
                    </div>

                    <div class="form-group">
                        <label for="keywords">Keywords</label>
                        <textarea class="form-control" rows="5" name="keywords" id="keywords">{{ $ordinance->keywords }}</textarea>
                    </div>

                    <label for="is_accepting">Comments/Suggestions</label>
                    <div class="checkbox">
                        <label><input name="is_accepting" type="checkbox" value=1 @if($ordinance->is_accepting==1) {{"checked"}} @endif>Accept Comments</label>
                    </div>

                    <div class="form-group">
                        <label for="pdf">PDF File</label>
                        <input name="pdf" type="file" class="form-control" id="pdf" accept="application/pdf">
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