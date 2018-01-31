@extends('layouts.admin')


@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Resolution {{ $resolution->number }} : {{  $resolution->title }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{ url("/admin/resolutions/{$resolution->id }/") }}" id="resolutionsForm" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group {{$errors->has('number') ? 'has-error' : ''}}">
                            <label for="number">Number</label>
                            <input name="number" type="text" class="form-control" id="number"
                                   value="{{ $resolution->number }}">
                            {!! $errors->first('number', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {{$errors->has('series') ? 'has-error' : ''}}">
                            <label for="series">Series</label>
                            <input name="series" type="text" class="form-control" id=series"
                                   placeholder="Enter Ordinance Series" value="{{ $resolution->series }}">
                            {!! $errors->first('series', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                            <label for="title">Title</label>
                            <input name="title" type="text" class="form-control" id="title" placeholder="Enter Title"
                                   value="{{ $resolution->title }}">
                            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group {{$errors->has('keywords') ? 'has-error' : ''}}">
                            <label for="keywords">Keywords</label>
                            <textarea class="form-control" rows="5" name="keywords" id="keywords" form="resolutionsForm">{{ $resolution->keywords }}</textarea>
                            {!! $errors->first('keywords', '<p class="help-block">:message</p>') !!}
                        </div>

                        @if(request()->type === 'ME')
                            <label for="is_accepting">Comments/Suggestions</label>
                            <div class="checkbox">
                                <label><input name="is_accepting" type="checkbox" value=1
                                            {{$resolution->is_accepting == 1 ? 'checked' : '' }}>Accept Comments</label>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pdf">
                                {{$resolution->pdf_file_path == "" ? 'No File Uploaded': ('PDF File: ' . substr($resolution->pdf_file_path, strrpos( $resolution->pdf_file_path, '/' ) + 1 ))}}
                            </label>
                            <input name="pdf" type="file" class="form-control" id="pdf" accept="application/pdf">
                        </div>
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
    <div class="col-md-6">

    </div>
@endsection