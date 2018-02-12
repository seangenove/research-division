@extends('layouts.app')

@section('styles')
    <style>
        .btn-equal-width {
            margin: 0 auto;
            width: 62px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col-md-8 col-md-offset-2">
                <h1>File was successfully deleted from Google Drive!</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="col-md-6">
                    <a class="btn btn-lg btn-success" href="/admin/{{$directory}}/{{$instance->id}}">
                        <i class="fa fa-file-text"></i>
                        Go back to {{$directory === 'ordinances' ? 'Ordinance' : 'Resolution'}} {{$instance->number}}
                    </a>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-lg btn-primary" href="/admin">
                        <i class="fa fa-dashboard"></i>
                        Go to Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection