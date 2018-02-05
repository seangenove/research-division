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

                                <div class="well col-md-5" style="margin: 10px 35px;">

                                    <h3>{{$resolution->title}}</h3>
                                    <p><strong>Series: </strong> {{$resolution->series}} </p>
                                    <p><strong>Keywords: </strong>{{ str_limit($resolution->keywords, $limit = 150, $end = '...') }}</p>
                                    <button onclick="window.location.href='/public/showResolution/{{$resolution->id}}\ ' "
                                            class="btn btn-info">Read More
                                    </button>
                                </div>
                                @if($k % 2 !== 0)
                                    <div class="clearfix"></div>
                                @endif
                            @endforeach
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