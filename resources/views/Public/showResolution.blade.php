@extends('layouts.public')
@section('content')
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ordinance">
                    <div class="ordinance-heading">
                        <h1>{{$resolution->title}}</h1>
                    </div>
                    <div class="ordinance-right">
                        <div class="ordinance-right-wrapper">
                            <p>{{$resolution->description}}</p>
                        </div>
                    </div>
                    <button onclick="window.location.href='/public/showOrdinance'" class="btn btn-info">Comment</button>
                </div>
            </div>
        </div>
    <br>
    </div>

</div>

<style>
    #content{
        background-color: rgb(240,248,255);
    }
</style>
@endsection