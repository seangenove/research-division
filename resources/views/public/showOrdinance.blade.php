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
                                <p> Authors: {{$ordinance->authors}}</p>
                                <p> Date Approved: {{$ordinance->date_approved_by_council}}</p>
                                <p> Date Signed by Vice Mayor: {{$ordinance->date_signed_by_vice_mayor}}</p>
                                <p> Date Signed by Mayor: {{$ordinance->date_signed_by_mayor}}</p>
                                <p> {{$ordinance->description}} </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-10">
                <div class="widget-area no-padding blank">
                    <div class="status-upload">
                        <form>
                            <textarea placeholder="What are your suggestions to this odinance?" ></textarea>
                            <ul>
                                <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Picture"><i class="fa fa-picture-o"></i></a></li>
                            </ul>
                            <button type="submit" class="btn btn-success green"><i class="fa fa-share"></i> Submit </button>
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