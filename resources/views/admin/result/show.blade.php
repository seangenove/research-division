@extends('layouts.admin')

@section('styles')
    <style>
        ul.answer-values > li {
            list-style: none;
            font-size: 15px;
        }

        ul.answer-values {
            height: 200px;
            overflow-y: scroll;
        }

        div.box-primary {
            padding: 5%;
        }
        div.question-print, .rd-header, .code-container{
            display: none;
        }

        @media print {
            .box-header, ul.nav-tabs, .highcharts-button{
                display: none;
            }

            rect.highcharts-container {
                width: 40%;
                height: 50%;
            }

            ul.answer-values {
                display: none;
                overflow: hidden;
            }

            div.question-print{
                display: block;
            }

            .rd-header{
                display: block;
            }
        }

        .fa.fa-print{
            margin-right: 5px;
        }

        a.print{
             text-decoration: none;
             display: inline-block;
             width: 100px;
             margin: 20px auto;
             background: #dc143c;
             background: linear-gradient(#e3647e, #DC143C);
             text-align: center;
             color: #fff;
             padding: 3px 6px;
             border-radius: 3px;
             border: 1px solid #e3647e;
         }

        a.print:hover{
            background: linear-gradient(#DC143C, #e3647e);
            color: #fff;
        }
    </style>

@endsection

@section('content')
    <div id="_token" class="hidden" data-token="{{ csrf_token() }}"></div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <a href="/admin/result/download/{{ $questionnaire->id }}" class="btn btn-success btn-md pull-right">
                <span class="fa fa fa-file-excel-o"> </span> Download Excel
            </a>

            <h1 class="box-title">Results for: <strong>{{ $questionnaire->name }}</strong></h1>
            <p>{{ $questionnaire->description }}</p>

            <a href="" onclick="window.print()" class="print btn btn-md pull-right ">
                <i class=" fa fa-print">
                    Print
                </i>
            </a>
        </div>
        <div class="box-body">
            <div class="content">
                <div class="rd-header row">
                    <div class="col-md-8">
                        place image here
                    </div>
                    lorem ipsum...
                    <div class="col-md-12">

                    </div>
                </div>
                @foreach( $questionnaire->questions as $question)
                    <div class="row box box-widget" style="margin: 5% 0">
                        <div class="box-header with-border">
                            <div class="user-block">
                                <h3> {{ $question->question}} </h3>
                            </div>
                            <div class="box-tools">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>

                        </div>
                        <div class="box-body">
                            <div class="col-md-5">
                                <ul class="answer-values">
                                    @foreach( $question->answers as $answer )
                                            <li>
                                                @if($question->type === "short")
                                                    <a href="" class="update" data-url="{{ url('/admin/updateAnswer/') }}" data-name="name" data-type="text" data-pk="{{$answer->id}}" data-title="Enter answer">{{ $answer->answer }}</a>
                                                @elseif($question->type === "long")
                                                    <a href="" class="update" data-url="{{ url('/admin/updateAnswer/') }}" data-name="name" data-type="textarea" data-pk="{{$answer->id}}" data-title="Enter answer">{{ $answer->answer }}</a>
                                                @else
                                                    {{$answer->answer}}
                                                @endif
                                                    <form action="/admin/result/{{ $answer->id }}" method="post">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-xs btn-danger btn-equal-width ">Delete</button>
                                                    </form>
                                            </li>
                                    @endforeach
                                </ul>
                            </div>
                            {{-- Put graphs below  for each question --}}
                            <div class="col-md-7">
                                <code class="code-container">
                                    {{-- Here is the data--}}
                                    {{ $question->getAnswerCounts() }}
                                </code>
                                {{-- start of drop down list--}}

                                <!-- Nav tabs -->
                                <div class="question-print">
                                    <h3> {{ $question->question}} </h3>
                                </div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link selected" data-toggle="tab" role="tab" href={{ '#pie' . $question->id }} >Pie</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" role="tab" href={{ '#bar'. $question->id}} >Bar</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" role="tabpanel" id={{ 'pie'. $question->id}} >
                                        <div class="pieChart"></div>
                                    </div>
                                    <div class="tab-pane " role="tabpanel" id={{ 'bar'. $question->id}} >
                                        <div class="barGraph"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/bower_components/highcharts/highcharts.js"></script>
    <script src="/bower_components/highcharts/exporting.js"></script>
    <script src="/bower_components/highcharts/offline-exporting.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    {{--pie chart --}}
    <script>
        $(document).ready(function () {
            $('code').each(function (i, v) {
                var that = this;
                var object = JSON.parse($(v).text());
                var dataArr = []
                var keys = Object.keys(object);
                for (key in keys) {
                    dataArr.push({
                        name: keys[key],
                        y: object[keys[key]],
                        selected: true
                    });
                }
                //alert(JSON.stringify($(v).parent().find('.currentChart')));
                $(v).parent().find('.pieChart').highcharts({
                    chart: {
                        height: 400, //(3 / 4 * 100) + '%', // 16:9 ratio
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    exporting: {
                        enabled: true,
                        filename: "",
                    },
                    title: {
                        text: 'Results'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Answers',
                        colorByPoint: true,
                        data: dataArr
                    }]
                });
                //alert(JSON.stringify(dataArr));
            });


        });
    </script>

    {{--bar graph--}}
    <script>
        $(document).ready(function () {
            $('code').each(function (i, v) {
                var that = this;
                var object = JSON.parse($(v).text());
                var dataArr = []
                var keys = Object.keys(object);
                for (key in keys) {
                    dataArr.push({
                        name: keys[key],
                        y: object[keys[key]],
                        selected: true
                    });
                }
                //alert(JSON.stringify($(v).parent().find('.currentChart')));
                $(v).parent().find('.barGraph').highcharts({
                    chart: {
                        height: 400,//(3 / 4 * 100) + '%', 4:3 16:9 ratio
                        type: 'column'
                    },
                    exporting: {
                        enabled: true,
                        filename: "",
                    },
                    title: {
                        text: 'Results'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        bar: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Answers',
                        colorByPoint: true,
                        data: dataArr
                    }]
                });
//                alert(JSON.stringify(dataArr));
            });


        });
    </script>

    <script>
//        $.fn.editable.defaults.send = "always";
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

        $.fn.editable.defaults.mode = 'inline';
        $(function(){
            $('.update').editable({
                params: function(params) {
                    // add additional params from data-attributes of trigger element
                    params._token = $("#_token").data("token");
                    params.name = $(this).editable().data('name');
                    return params;
                },
                validate: function(value) {
                    if($.trim(value) == '')
                        return 'This field is required';
                },
                title: 'Enter answer'
            });
        });
        $(function(){
            $('.update').editable.editable('validate');
        });
    </script>
@endsection