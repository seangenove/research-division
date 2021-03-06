@extends('layouts.admin')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <strong>Resolution {{$resolution->number}}</strong> : Upload Status Report
                </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if($resolution->is_monitoring == 1)
                <form method="POST" action="{{ route('resolutionStoreStatusReport') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="box-body">
                            <input type="hidden" id="resolution_id" name="resolution_id" value="{{$resolution->id}}">

                            <div class="form-group {{$errors->has('pdf') ? 'has-error' : ''}}">
                                <label for="pdf">Status Report</label>
                                <input name="pdf" type="file" class="form-control" id="pdf" accept="application/pdf">
                                {!! $errors->first('pdf', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    <div class="box-footer">
                        <button type="submit" class="pull-right btn btn-primary">Upload</button>
                    </div>
                </form>
            @endif
        </div>
        <!-- /.box -->
    </div>
@endsection