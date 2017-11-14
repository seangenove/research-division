@extends('layouts.admin')

@section('content')
    <div class="col-md-5">
        <div class="box box-default color-palette-box">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-file-text"></i> ORDINANCE {{ $ordinance->number }} : {{  $ordinance->title }}</h3>
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Ordinance Number</th>
                        <td>{{ $ordinance->number }}</td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td>{{ $ordinance->title }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $ordinance->description }}</td>
                    </tr>
                    <tr>
                        <th>Authors</th>
                        <td>{{ $ordinance->authors }}</td>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-7">
        <div class="box box-default color-palette-box">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-comments-o"></i> Comments/Suggestions</h3>
            </div>
            <div class="box-body">
                <h4>FEATURE TO BE IMPLEMENTED</h4>
            </div>
        </div>
    </div>
@endsection