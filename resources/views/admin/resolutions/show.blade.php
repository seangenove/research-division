@extends('layouts.admin')

@section('content')
    <div class="col-md-5">
        <div class="box box-default color-palette-box">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-file-text"></i> resolution {{ $resolution->number }}
                    : {{  $resolution->title }}</h3>
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>resolution Number</th>
                        <td>{{ $resolution->number }}</td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td>{{ $resolution->title }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $resolution->description }}</td>
                    </tr>
                    <tr>
                        <th>Authors</th>
                        <td>{{ $resolution->authors }}</td>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-7">
        <div class="box box-default color-palette-box">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-comments-o"></i> Comments/Suggestions</h3>
            </div>

            <div class="box-body box-comments">
                {{--@foreach($resolution->suggestions as $suggestion)--}}
                    {{--<div class="box-comment">--}}
                        {{--<!-- User image -->--}}
                        {{--<img class="img-circle img-sm" src="/dist/img/user3-128x128.jpg" alt="User Image">--}}

                        {{--<div class="comment-text">--}}
                          {{--<span class="username">--}}
                            {{--{{ $suggestion->first_name }} {{ $suggestion->last_name }}--}}
                              {{--<span class="text-muted pull-right">{{ $suggestion->created_at }}</span>--}}
                          {{--</span><!-- /.username -->--}}
                            {{--{{ $suggestion->suggestion }}--}}
                        {{--</div>--}}
                        {{--<!-- /.comment-text -->--}}
                    {{--</div>--}}

                {{--@endforeach--}}

            </div>
        </div>
    </div>
@endsection