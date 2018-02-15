@extends('layouts.admin')

@section('content')
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <strong>Ordinance {{$ordinance->number}}</strong> : Upload New Update Report
                </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if($ordinance->is_monitoring == 1)
                <form method="POST" action="{{ route('ordinanceStoreUpdateReport') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <input type="hidden" id="ordinance_id" name="ordinance_id" value="{{$ordinance->id}}">

                        <div class="form-group {{$errors->has('pdf') ? 'has-error' : ''}}">
                            <label for="pdf">Update Report</label>
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