@extends('layouts.public')

@section('content')
<div class="container">
    <div class="page-header">
        <h1>Monitoring & Evaluation</h1>
    </div>
    <div class="col-md-12" style="margin-bottom: 30px">
        <div class="pull-right">
            <form action="#" class="form-inline">
                <input name="q" value="{{ request()->q }}" class="form-control" type="search" placeholder="Search...">
                <button class="btn" style="height: 35px; width: 35px; margin-right: 65px"><span
                            class="fa fa-search"></span></button>
            </form>
        </div><!-- /.col-lg-6 -->
    </div>
    <div class="col-md-12">
        <div class="ordinance-heading">
            <h1>Ordinances</h1>

        </div>

        @foreach($ordinances as $ordinance)
            <div class="ordinance-right-wrapper">
                <h3>{{$ordinance->title}}</h3>

                <p> {{$ordinance->series}} </p>
                <p> {{$ordinance->number}} </p>
                <a href="/public/showOrdinance/{{$ordinance->id}}">
                    <button class="btn-sm btn-info">
                        Read More
                    </button>
                </a>
                {{--<a href="public/showOrdinanceQuestionnaire/{{$ordinance->id}}\">--}}
                    {{--<button class="btn-sm btn-success">--}}
                        {{--Answer Questionnaire--}}
                    {{--</button>--}}
                {{--</a>--}}
            </div>
            <div class="row text-center">
                {{$ordinances->links()}}
            </div>
            <hr>
        @endforeach

        <div class="resolution-heading">
            <h1>Resolutions</h1>
            <hr>
        </div>
        @foreach($resolutions as $resolution)
            <div class="resolution-right-wrapper">
                <h3>{{$resolution->title}}</h3>
                <p>{{$resolution->series}} </p>
                <p>{{$resolution->number}} </p>
                <a href="/public/showResolution/{{$resolution->id}}">
                    <button class="btn-sm btn-info">
                        Read More
                    </button>
                </a>
                {{--<a href="public/showResolutionQuestionnaire/{{$resolution->id}}\">--}}
                {{--<button class="btn-sm btn-success">--}}
                    {{--Answer Questionnaire--}}
                {{--</button>--}}
                {{--</a>--}}
            </div>
            <div class="row text-center">
                {{$resolutions->links()}}
            </div>
            <hr>
        @endforeach
        {{--<form>--}}
                {{--<div class="form-group">--}}
                    {{--<label for="email"> Q1: Where do you Smoke?</label>--}}
                    {{--<input type="text" class="form-control" id="email">--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                    {{--<label for="email"> Q2: Are you in favor of the Non-Smoking Ordinance? Why?</label>--}}
                    {{--<textarea class="form-control" rows="5" id="comment"></textarea>--}}
                {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--<label for="email"> Q3: Are you Against Smoking?</label>--}}
                {{--<div class="radio">--}}
                    {{--<label><input type="radio" name="optradio">Yes</label>--}}
                {{--</div>--}}
                {{--<div class="radio">--}}
                    {{--<label><input type="radio" name="optradio">No</label>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--<label for="email"> Q4: Why do you Smoke?</label>--}}
                {{--<div class="checkbox">--}}
                    {{--<label><input type="checkbox" value="">Feeling irritable‚ on edge‚ grouchy</label>--}}
                {{--</div>--}}
                {{--<div class="checkbox">--}}
                    {{--<label><input type="checkbox" value="">Feeling down or sad</label>--}}
                {{--</div>--}}
                {{--<div class="checkbox">--}}
                    {{--<label><input type="checkbox" value="">Having trouble sleeping</label>--}}
                {{--</div>--}}
                {{--<div class="checkbox">--}}
                    {{--<label><input type="checkbox" value="">Feeling restless and jumpy</label>--}}
                {{--</div>--}}
                {{--<div class="checkbox">--}}
                    {{--<label><input type="checkbox" value="">Having trouble thinking clearly and concentrating</label>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<button type="submit" class="btn btn-default">Submit</button>--}}
        {{--</form>--}}
    </div>
</div>
@endsection