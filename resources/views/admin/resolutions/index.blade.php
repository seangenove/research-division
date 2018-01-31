@extends('layouts.admin')

@section('styles')
    <style>
        form {
            display: inline;
        }

        .btn-equal-width {
            margin: 0 auto;
            width: 57px;
        }

        .add-magin{
            margin: 7px 0;
        }
    </style>
@endsection

@section('content')
    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-file-text"></i>
                Resolutions under {{$type === 'RR' ? 'Research & Records' : 'Monitoring & Evaluation'}}
            </h3>
        </div>
        <div class="box-body">
            <div class="add-magin">
                <a href="/admin/resolutions/create?type={{$type}}" class="btn btn-success"><span
                            class="fa fa-plus"></span> Add</a>
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Resolution Number</th>
                    <th>Series</th>
                    <th>Title</th>
                    <th>Keywords</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($resolutions as $resolution)
                    <tr>
                        <td>{{ $resolution->number }}</td>
                        <td>{{ $resolution->series }}</td>
                        <td>{{ $resolution->title }}</td>
                        <td>{{  str_limit($resolution->keywords, $limit = 200, $end = '...')  }}</td>
                        <td>
                            <a href="/admin/resolutions/{{$resolution->id}}"
                               class="btn btn-xs btn-primary btn-equal-width">
                                {{ Request::is('admin/forms*') ? 'Profile' : 'View' }}
                            </a>
                            <a href="/admin/resolutions/{{$resolution->id}}/edit"
                               class="btn btn-xs btn-warning btn-equal-width">Edit</a>
                            <form action="/admin/resolutions/{{ $resolution->id }}" method="post">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button class="btn btn-xs btn-danger btn-equal-width">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection