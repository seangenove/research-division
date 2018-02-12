@extends('layouts.public')
@section('content')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ordinance">

                        <div class="page-header">
                            <h1>Ordinances</h1>
                        </div>
                        <div class="col-md-12" style="margin-bottom: 30px">
                            <div class="pull-right">
                                <form action="/ordinances" class="form-inline">
                                    <input name="q" value="{{ request()->q }}" class="form-control" type="search" placeholder="Search...">
                                    <button class="btn" style="height: 35px; width: 35px; margin-right: 65px"><span
                                                class="fa fa-search"></span></button>
                                </form>
                            </div><!-- /.col-lg-6 -->
                        </div>

                        <div class="ordinance-right">
                            @foreach($ordinances as $k => $ordinance)
                                <div class="well col-md-5" style="margin: 10px 35px;">
                                    <h3>{{ str_limit($ordinance->title, $limit = 100, $end = '...') }}</h3>
                                    <p>Series: {{$ordinance->series}} </p>
                                    <p>{{ str_limit($ordinance->keywords, $limit = 150, $end = '...') }}</p>
                                    <button onclick="window.location.href='/public/showOrdinance/{{$ordinance->id}}\ ' "
                                            class="btn btn-info pull-right">Read More
                                    </button>

                                </div>
                                @if($k % 2 !== 0)
                                    <div class="clearfix"></div>
                                @endif

                            @endforeach

                            {{--<div class="ordinance-right-wrapper">
                                <h3>Ordinance 1</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.</p>
                                <button onclick="window.location.href='/showOrdinance'" class="btn btn-info">Read More</button>
                            </div>
                            <hr>
                            <div class="ordinance-right-wrapper">
                                <h3>Ordinance 2</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.</p>
                                <button onclick="window.location.href='/showOrdinance'" class="btn btn-info">Read More</button>
                            </div>
                            <hr>
                            <div class="ordinance-right-wrapper">
                                <h3>Ordinance 3</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.</p>
                                <button onclick="window.location.href='/showOrdinance'" class="btn btn-info">Read More</button>
                            </div>
                            <hr>
                            <div class="ordinance-right-wrapper">
                                <h3>Ordinance 4</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.</p>
                                <button onclick="window.location.href='/showOrdinance'" class="btn btn-info">Read More</button>
                            </div>
                            <hr>
                            <div class="ordinance-right-wrapper">
                                <h3>Ordinance 5</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin interdum dolor ac auctor. Phasellus eleifend ex id massa faucibus, cursus accumsan urna placerat.</p>
                                <button onclick="window.location.href='/sshowOrdinance'" class="btn btn-info">Read More</button>
                            </div>--}}
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