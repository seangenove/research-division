@extends('layouts.admin')

@section('styles')
    <style>
        div > li {
            font-size: 30px;
        }

        div > ul {
            list-style: none;
            font-size: 20px;

        }

        ul.answer-values {
            height: 200px;
            overflow-y: scroll;
        }

        div.box-primary {
            padding: 5%;
        }
    </style>

@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <a href="/admin/result/download/{{ $questionnaire->id }}" class="btn btn-success btn-md pull-right">
                <span class="fa fa fa-file-excel-o"> </span> Download Excel
            </a>
            <h1 class="box-title">Results for: <strong>{{ $questionnaire->name }}</strong></h1>
            <p>{{ $questionnaire->description }}</p>
        </div>
        <div class="box-body">
            <div class="content">
                @foreach( $questionnaire->questions as $question)
                    <div class="row box box-widget" style="margin: 5% 0">
                        <div class="box-header with-border">
                            <div class="user-block">
                                <h3> {{ $question->question}} </h3>
                            </div>
                            <div class="box-tools">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>

                        </div>
                        <div class="box-body">
                            <div class="col-md-5">
                                <ul class="answer-values">
                                    @foreach( $question->answers as $answer )
                                        <li>{{ $answer->answer }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            {{-- Put graphs below  for each question --}}
                            <div class="col-md-7">
                                <code>
                                    {{-- Here is the data--}}
                                    {{ $question->getAnswerCounts() }}
                                </code>
                                        <div class="pieChart"></div>
                                        <div class="barGraph"></div>

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
                alert(JSON.stringify(dataArr));
            });


        });
    </script>
@endsection