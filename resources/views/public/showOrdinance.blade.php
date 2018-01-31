@extends('layouts.public')
@section('content')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ordinance">
                        <div class="ordinance-heading">
                            <h1>{{$ordinance->title}}</h1>
                        </div>
                    </div>
                </div>
                @if($ordinance->is_monitoring == 1)
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
                        <a href="/public/showOrdinanceQuestionnaire/{{$ordinance->id}}">
                            <button class="btn-sm btn-success">
                                Answer Questionnaire
                            </button>
                        </a>
                    @endif

                    @if(true)
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
                                            <form method="post" action="{{ url("/suggestions/{$ordinance->id }/") }}">
                                                {{ csrf_field() }}
                                                <input class="form-control" type="text" name="first_name"
                                                       placeholder="First Name">
                                                <input class="form-control" type="text" name="last_name"
                                                       placeholder="Last Name">
                                                <input class="form-control" type="hidden" name="type" value="ordinance">
                                                <input class="form-control" type="email" name="email" placeholder="Email">
                                                <textarea required class="form-control" name="suggestion" rows="5"
                                                          placeholder="Please give us your suggestion on this ordinance"></textarea>
                                                <br>
                                                <div class="form-inline">
                                                    <button class="btn btn-success pull-right" type="submit"><i
                                                                class="fa fa-paper-plane"></i> Send Now
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endif
                @endif

                            <div class="row">
                                <div class="col-md-7">
                                    <div class="panel panel-info">
                                        <div class="panel-body">
                                            <iframe src = "/ViewerJS/#../storage/ordinances/{{substr($ordinance->pdf_file_path, strrpos( $ordinance->pdf_file_path, '/' ) + 1 )}}"
                                                    width='100%' height='350' allowfullscreen webkitallowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="panel panel-info">
                                        <div class="panel-body">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Resolution Number</th>
                                                    <td>{{ $ordinance->number }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Series</th>
                                                    <td>{{ $ordinance->series }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Title</th>
                                                    <td>{{ $ordinance->title }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Keywords</th>
                                                    <td>{{ $ordinance->keywords }}</td>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
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

        .form-control {
            margin-bottom: 10px;
        }
    </style>
@endsection