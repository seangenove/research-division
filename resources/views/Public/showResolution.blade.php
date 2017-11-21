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
                                </div>
                            </div>

                            <div class="container pb-cmnt-container" style="border-top: dotted lightseagreen; padding-top: 20px">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="panel panel-info">
                                            <div class="panel-body">
                                                <textarea placeholder="Write your comment here!" class="pb-cmnt-textarea"></textarea>
                                                <form class="form-inline">
                                                    <button class="btn btn-primary pull-right" type="button">Share</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
    </style>
@endsection