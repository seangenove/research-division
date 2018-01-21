@extends('layouts.public')

@section('content')
<div class="container">
    <div class="col-md-8">
        <div class="ordinance-heading">
            <h1>Ordinances:</h1>
            <hr>
        </div>
        @foreach($ordinances as $ordinance)
            <div class="ordinance-right-wrapper">
                <h3>{{$ordinance->title}}</h3>
                <p>Date Signed by Mayor: {{$ordinance->date_signed_by_mayor}} </p>
                <p>By: {{$ordinance->authors}} </p>
                <p>{{$ordinance->description}}</p>
                <button onclick="window.location.href='/public/showOrdinanceQuestionnaire/{{$ordinance->id}}\ ' " class="btn btn-success">
                    Answer Questionnaire
                </button>
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
                <p>Date Signed by Mayor: {{$resolution->date_signed_by_mayor}} </p>
                <p>By: {{$resolution->authors}} </p>
                <p>{{$resolution->description}}</p>
                <a href="public/showResolutionQuestionnaire/{{$resolution->id}}\">
                <button class="btn-sm btn-success">
                    Answer Questionnaire
                </button>
                </a>
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