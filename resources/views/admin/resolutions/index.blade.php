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
                <a href="/admin{{$type === 'RR' ? '' : '/forms'}}/resolutions" class="btn btn-primary">
                    <i class="fa fa-refresh"></i> Reset Filtering
                </a>
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
            </div>
            {{--<table class="table table-striped table-bordered">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th>Resolution Number</th>--}}
                    {{--<th>Series</th>--}}
                    {{--<th>Title</th>--}}
                    {{--<th>Keywords</th>--}}
                    {{--<th>Actions</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody>--}}
                {{--@foreach($resolutions as $resolution)--}}
                    {{--<tr>--}}
                        {{--<td>{{ $resolution->number }}</td>--}}
                        {{--<td>{{ $resolution->series }}</td>--}}
                        {{--<td>{{ str_limit($resolution->title, $limit = 200, $end = '...')  }}</td>--}}
                        {{--<td>{{  str_limit($resolution->keywords, $limit = 200, $end = '...')  }}</td>--}}
                        {{--<td>--}}
                            {{--<a href="/admin/resolutions/{{$resolution->id}}"--}}
                               {{--class="btn btn-xs btn-primary btn-equal-width">--}}
                                {{--{{ Request::is('admin/forms*') ? 'Profile' : 'View' }}--}}
                            {{--</a>--}}
                            {{--<a href="/admin/resolutions/{{$resolution->id}}/edit"--}}
                               {{--class="btn btn-xs btn-warning btn-equal-width">Edit</a>--}}
                            {{--<form action="/admin/resolutions/{{ $resolution->id }}" method="post">--}}
                                {{--{{ method_field('DELETE') }}--}}
                                {{--{{ csrf_field() }}--}}
                                {{--<button class="btn btn-xs btn-danger btn-equal-width">Delete</button>--}}
                            {{--</form>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
                {{--</tbody>--}}
            {{--</table>--}}



            @if($resolutions->first() !== null or !request()->has('q'))
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>
                            <a href="
                                    @if(request()->colName === 'number' and request()->order === 'desc')
                            @php
                                $currentUrlQueries = request()->query();
                                $currentUrlQueries['colName'] = 'number';
                                $currentUrlQueries['order'] = 'asc';

                                echo request()->fullUrlWithQuery($currentUrlQueries);
                            @endphp
                            @else
                            @php
                                $currentUrlQueries = request()->query();
                                $currentUrlQueries['colName'] = 'number';
                                $currentUrlQueries['order'] = 'desc';

                                echo request()->fullUrlWithQuery($currentUrlQueries);
                            @endphp
                            @endif">
                                Ordinance Number
                            </a>
                        </th>

                        <th>
                            <a href="
                                    @if(request()->colName === 'series' and request()->order === 'desc')
                            @php
                                $currentUrlQueries = request()->query();
                                $currentUrlQueries['colName'] = 'series';
                                $currentUrlQueries['order'] = 'asc';

                                echo request()->fullUrlWithQuery($currentUrlQueries);
                            @endphp
                            @else
                            @php
                                $currentUrlQueries = request()->query();
                                $currentUrlQueries['colName'] = 'series';
                                $currentUrlQueries['order'] = 'desc';

                                echo request()->fullUrlWithQuery($currentUrlQueries);
                            @endphp
                            @endif">
                                Series
                            </a>
                        </th>

                        <th>
                            <a href="
                                    @if(request()->colName === 'title' and request()->order === 'desc')
                            @php
                                $currentUrlQueries = request()->query();
                                $currentUrlQueries['colName'] = 'title';
                                $currentUrlQueries['order'] = 'asc';

                                echo request()->fullUrlWithQuery($currentUrlQueries);
                            @endphp
                            @else
                            @php
                                $currentUrlQueries = request()->query();
                                $currentUrlQueries['colName'] = 'title';
                                $currentUrlQueries['order'] = 'desc';

                                echo request()->fullUrlWithQuery($currentUrlQueries);
                            @endphp
                            @endif">
                                Title
                            </a>
                        </th>

                        <th>
                            <a href="
                                    @if(request()->colName === 'keywords' and request()->order === 'desc')
                            @php
                                $currentUrlQueries = request()->query();
                                $currentUrlQueries['colName'] = 'keywords';
                                $currentUrlQueries['order'] = 'asc';

                                echo request()->fullUrlWithQuery($currentUrlQueries);
                            @endphp
                            @else
                            @php
                                $currentUrlQueries = request()->query();
                                $currentUrlQueries['colName'] = 'keywords';
                                $currentUrlQueries['order'] = 'desc';

                                echo request()->fullUrlWithQuery($currentUrlQueries);
                            @endphp
                            @endif">
                                Keywords
                            </a>
                        </th>

                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($resolutions as $resolution)
                        <tr>
                            <td>{{ $resolution->number }}</td>
                            <td>{{ $resolution->series }}</td>
                            <td>{{ str_limit($resolution->title, $limit = 200, $end = '...') }}</td>
                            <td>{{ str_limit($resolution->keywords, $limit = 200, $end = '...') }}</td>
                            <td>
                                <a href="/admin/resolutions/{{$resolution->id}}"
                                   class="btn btn-xs btn-primary btn-equal-width ">
                                    {{ Request::is('admin/forms*') ? 'Profile' : 'View' }}
                                </a>
                                <a href="/admin/resolutions/{{$resolution->id}}/edit?type={{$type}}"
                                   class="btn btn-xs btn-warning btn-equal-width ">Edit</a>
                                <form action="/admin/resolutions/{{ $resolution->id }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="btn btn-xs btn-danger btn-equal-width ">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row text-center">
                    {{$resolutions->links()}}
                </div>
            @else
                <div class="row text-center">
                    <h1>No results found.</h1>
                </div>
            @endif
        </div>
    </div>
@endsection