@extends('layouts.public')
@section('content')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ordinance">
                        <div style="text-align: center">
                            <div class="ordinance-heading">
                                <h1>Resolutions</h1>
                            </div>

                            <div class="ordinance-right">

                                @foreach($resolutions as $resolution)

                                    <div class="ordinance-right-wrapper">
                                        <h3>{{$resolution->title}}</h3>
                                        <p>{{$resolution->description}}</p>
                                        <button onclick="window.location.href='/public/showResolution/{{$resolution->id}}\ ' "
                                                class="btn btn-info">Read
                                            More
                                        </button>
                                    </div>
                                    <hr>

                                    {{--<tr data-href="/admin/repairs/{{$motorpool->motorpool_id}}"--}}
                                    {{--<tr data-href="/admin/repairs/{{$motorpool->motorpool_id}}"--}}
                                    {{--class="clickable-row">--}}
                                    {{--@foreach($merge as $firestationss)--}}
                                    {{--@if($firestationss->transpo_id === $motorpool->v_id || $firestationss->transpo_id === $motorpool->ft_id)--}}
                                    {{--<td>{{ $firestationss->name}}</td>--}}
                                    {{--<td>{{ $firestationss->plate_num }}</td>--}}
                                    {{--<td>{{ $firestationss->model }}</td>--}}
                                    {{--@endif--}}
                                    {{--@endforeach--}}
                                    {{--<td>{{ $motorpool->scope }}</td>--}}
                                    {{--<td>{{ $motorpool->status }}</td>--}}
                                    {{--<td>{{ $motorpool->date_started }}</td>--}}
                                    {{--<td>{{ $motorpool->date_finished}}</td>--}}
                                    {{--</tr>--}}

                                @endforeach

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