@extends('layouts.public')
@section('content')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ordinance">
                        <div style="text-align: center">
                            <div class="ordinance-heading">
                                <h1>{{$resolutions->title}}</h1>
                            </div>
                            <hr/>
                            <div class="ordinance-right">
                                <div class="ordinance-right-wrapper">
                                    <p>{{$resolutions->description}}</p>
                                    <p>By: {{$resolutions->authors}} </p>
                                    <p>Date Signed by Mayor: {{$resolutions->date_signed_by_mayor}} </p>
                                </div>
                            </div>
                            @if($resolutions->is_monitoring == 1)
                                <a href="">
                                    <button class="btn-sm btn-info">
                                        View Status Report
                                    </button>
                                </a>
                                <br>
                                <a href="">
                                    <button class="btn-sm btn-info">
                                        View Updates
                                    </button>
                                </a>
                            <br>
                                @if(!$questionnaire->isEmpty())
                                    <a href="/public/showResolutionQuestionnaire/{{$resolutions->id}}">
                                        <button class="btn-sm btn-success">
                                            Answer Questionnaire
                                        </button>
                                    </a>
                                @endif
                                @if($resolutions->is_accepting == 1)
                                    {{--<a href="">--}}
                                        {{--<button class="btn-sm btn-success">--}}
                                            {{--Give Comment--}}
                                        {{--</button>--}}
                                    {{--</a>--}}
                                    <div class="container pb-cmnt-container" style="border-top: dotted lightseagreen; padding-top: 20px">
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-3">
                                                <div class="panel panel-info">
                                                    <div class="panel-body">
                                                        <form method="post" action="{{ url("/suggestions/{$resolutions->id }/") }}">
                                                        {{ csrf_field() }}
                                                            <input class="form-control" type="text" name="first_name" placeholder="First Name">
                                                            <input class="form-control" type="text" name="last_name" placeholder="Last Name">
                                                            <input class="form-control" type="hidden" name="type" value="resolution">
                                                            <input class="form-control" type="email" name="email" placeholder="Email">
                                                            <textarea required class="form-control" name="suggestion" rows="5" placeholder="Please give us your suggestion on this resolution"></textarea>
                                                            <br>
                                                            <div class="form-inline">
                                                                <button class="btn btn-success pull-right" type="submit"><i class="fa fa-paper-plane"></i> Send Now</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif


                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>

    </div>

    <style>
        #content {
            background-color: rgb(240, 248, 255);
        }

        .pb-cmnt-container {
            font-family: Lato;
            margin-top: 100px;
        }

        .pb-cmnt-textarea {
            resize: none;
            padding: 20px;
            height: 130px;
            width: 100%;
            border: 1px solid #F2F2F2;
        }

        .form-control {
            margin-bottom: 10px;
        }
    </style>
@endsection