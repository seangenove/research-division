@extends('layouts.public')
@section('content')
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ordinance">
                    {{--@foreach($ordinances as $ordinance)--}}
                        <div class="ordinance-heading">
                            <h1>{{$ordinances->title}}</h1>
                        </div>
                        <div class="ordinasnce-right">
                            <div class="ordinance-right-wrapper">
                                <p> Authors: {{$ordinances->authors}}</p>
                                <p> Date Approved: {{$ordinances->date_approved_by_council}}</p>
                                <p> Date Signed by Vice Mayor: {{$ordinances->date_signed_by_vice_mayor}}</p>
                                <p> Date Signed by Mayor: {{$ordinances->date_signed_by_mayor}}</p>
                                <p> {{$ordinances->description}} </p>
                            </div>
                        </div>
                    {{--@endforeach--}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="widget-area no-padding blank">
                    <div class="status-upload">
                        <form>
                            <textarea placeholder="What are your suggestions to this odinance?" ></textarea>
                            <button type="submit" class="btn btn-success green"><i class="fa fa-paper-plane"></i> Submit </button>
                        </form>
                    </div><!-- Status Upload  -->
                </div><!-- Widget Area -->
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

<script>
    $(document).ready(function(){
        $("[data-toggle=tooltip]").tooltip();
    });
</script>
@endsection