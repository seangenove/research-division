@extends('layouts.public')
@section('content')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="resolution">
                        <div style="text-align: center">
                            <div class="resolution-heading">
                                <h1>{{$resolution->title}}</h1>
                            </div>
                            <hr/>

                            <div class="container pb-cmnt-container" style="border-top: dotted lightseagreen; padding-top: 20px">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="panel panel-info">
                                            <div class="panel-body">
                                                <iframe src = "/ViewerJS/#../storage/resolutions/{{substr($resolution->pdf_file_path, strrpos( $resolution->pdf_file_path, '/' ) + 1 )}}"
                                                        width='100%' height='400' allowfullscreen webkitallowfullscreen></iframe>
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
                                                        <td>{{ $resolution->number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Series</th>
                                                        <td>{{ $resolution->series }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Title</th>
                                                        <td>{{ $resolution->title }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Keywords</th>
                                                        <td>{{ $resolution->keywords }}</td>
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