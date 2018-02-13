@extends('layouts.public')
@section('content')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ordinance">
                        <div class="page-header">
                            <h1>Resolutions</h1>
                        </div>
                        <div class="col-md-12" style="margin-bottom: 30px">
                            <div class="pull-left">
                                <a style="min-width: 150px" href="{{ url()->current() }}" class="btn btn-primary">
                                    <i class="fa fa-refresh"></i> Reset Filtering
                                </a>
                            </div>
                            <div class="pull-right">
                                <form action="/resolutions" class="form-inline">
                                    <input value="{{ request()->q }}" name="q" class="form-control" type="search" placeholder="Search...">
                                    <button class="btn" style="height: 35px; width: 35px; margin-right: 65px"><span
                                                class="fa fa-search"></span></button>
                                </form>
                            </div><!-- /.col-lg-6 -->
                        </div>

                        <div class="ordinance-right">
                            @foreach($resolutions as $k => $resolution)
                                {{--<div class="well col-md-5" style="margin: 10px 35px;">--}}
                                    {{--<h3>{{$resolution->title}}</h3>--}}
                                    {{--<p><strong>Series: </strong> {{$resolution->series}} </p>--}}
                                    {{--<p><strong>Keywords: </strong>{{ str_limit($resolution->keywords, $limit = 150, $end = '...') }}</p>--}}
                                    {{--<button onclick="window.location.href='/public/showResolution/{{$resolution->id}}\ ' "--}}
                                            {{--class="btn btn-info">Read More--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                                @if($k % 2 !== 0)
                                    <div class="clearfix"></div>
                                @endif
                            @endforeach
                                <div class="col-md-12">
                                    @if($resolution->first() !== null)
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
                                                        Resolution Number
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
                                                <th><a href="
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
                                                <th>
                                                    Action
                                                </th>
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
                                                        <button onclick="window.location.href='/public/showResolution/{{$resolution->id}}\ ' "
                                                                class="btn btn-info pull-right">Read More
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <div class="row text-center">
                                            <h1>No results found.</h1>
                                        </div>
                                    @endif
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

    <style>
        #content {
            background-color: rgb(240, 248, 255);
        }
    </style>
@endsection