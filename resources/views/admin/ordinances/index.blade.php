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

        .add-magin {
            margin: 10px 0;
        }
    </style>
@endsection

@section('content')
    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-file-text"></i>
                Ordinances under {{$type === 'RR' ? 'Research & Records' : 'Monitoring & Evaluation'}}
            </h3>
        </div>
        <div class="box-body">
            <div class="add-magin">
                <a href="/admin/ordinances/create?type={{$type}}" class="btn btn-success"><span
                            class="fa fa-plus"></span> Add</a>
                <form action="#" method="get" class="pull-right col-md-4">
                    <div class="input-group">
                        <input value="{{ request()->q }}" type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" id="search-btn" class="btn btn-flat">
                              <i class="fa fa-search"></i>
                            </button>
                         </span>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Ordinance Number</th>
                    <th>Series</th>
                    <th>Title</th>
                    <th>Keywords</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ordinances as $ordinance)
                    <tr>
                        <td>{{ $ordinance->number }}</td>
                        <td>{{ $ordinance->series }}</td>
                        <td>{{ str_limit($ordinance->title, $limit = 200, $end = '...') }}</td>
                        <td>{{ str_limit($ordinance->keywords, $limit = 200, $end = '...') }}</td>
                        <td>
                            <a href="/admin/ordinances/{{$ordinance->id}}"
                               class="btn btn-xs btn-primary btn-equal-width ">
                                {{ Request::is('admin/forms*') ? 'Profile' : 'View' }}
                            </a>
                            <a href="/admin/ordinances/{{$ordinance->id}}/edit"
                               class="btn btn-xs btn-warning btn-equal-width ">Edit</a>
                            <form action="/admin/ordinances/{{ $ordinance->id }}" method="post">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button class="btn btn-xs btn-danger btn-equal-width ">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection