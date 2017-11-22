@extends('layouts.admin')

@section('styles')
    <style>
        form {
            display: inline;
        }
    </style>

@endsection

@section('content')
    <div class="box box-default color-palette-box">
    <div class="box-header with-border">
                <h3 class="box-title">{{ $page->title }}</h3>
            </div>
    <div class="box-body">
        <div>
            <a href="/admin/pages" class="btn btn-info">Back</a>

        </div>
            <div class="box-header">
                    {!! $page->content !!}
            </div>
    </div>
</div>
@endsection