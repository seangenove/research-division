@extends('layouts.public')
@section('content')
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ordinance">
                    @foreach($ordinances as $ordinance)
                        <div class="ordinance-heading">
                            <h1>{{$ordinance->title}}</h1>
                        </div>
                        <div class="ordinasnce-right">
                            <div class="ordinance-right-wrapper">
                                <p> {{$ordinance->authors}}</p>
                                <p> {{$ordinance->description}} </p>
                            </div>
                        </div>
                    @endforeach
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