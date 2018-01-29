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
                                        {{-- Re formatted this below--}}
                                        {{--@if( $answer->question_id === $question->id)--}}
                                        {{--<li> {{ $answer->answer }} </li>--}}
                                        {{--@endif--}}
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
                                <div class="currentChart"></div>
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
    {{--<script>--}}


    {{--Highcharts.chart('Q3', {--}}
    {{--chart: {--}}
    {{--plotBackgroundColor: null,--}}
    {{--plotBorderWidth: null,--}}
    {{--plotShadow: false,--}}
    {{--type: 'pie'--}}
    {{--},--}}
    {{--title: {--}}
    {{--text: ' '--}}
    {{--},--}}
    {{--tooltip: {--}}
    {{--pointFormat: '{series.name}: <b>({point.percentage:.1f}%)</b>'--}}
    {{--},--}}
    {{--plotOptions: {--}}
    {{--pie: {--}}
    {{--allowPointSelect: true,--}}
    {{--cursor: 'pointer',--}}
    {{--dataLabels: {--}}
    {{--enabled: false--}}
    {{--},--}}
    {{--showInLegend: true--}}
    {{--}--}}
    {{--},--}}
    {{--series: [{--}}
    {{--name: 'Percent',--}}
    {{--colorByPoint: true,--}}
    {{--data: [{--}}
    {{--name: 'Yes',--}}
    {{--y: 76,--}}
    {{--selected: true--}}
    {{--}, {--}}
    {{--name: 'No',--}}
    {{--y: 24,--}}
    {{--sliced: true,--}}
    {{--selected: true--}}
    {{--}]--}}
    {{--}]--}}
    {{--});--}}

    {{--Highcharts.chart('Q4', {--}}
    {{--chart: {--}}
    {{--type: 'column'--}}
    {{--},--}}
    {{--title: {--}}
    {{--text: ' '--}}
    {{--},--}}
    {{--subtitle: {--}}
    {{--text: ' '--}}
    {{--},--}}
    {{--xAxis: {--}}
    {{--categories: [--}}
    {{--' '--}}
    {{--],--}}
    {{--crosshair: true--}}
    {{--},--}}
    {{--yAxis: {--}}
    {{--min: 0,--}}
    {{--title: {--}}
    {{--text: 'number of respondents'--}}
    {{--}--}}
    {{--},--}}
    {{--tooltip: {--}}
    {{--headerFormat: '<span style="font-size:10px">{point.key}</span><table>',--}}
    {{--pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +--}}
    {{--'<td style="padding:0"><b>{point.y} </b></td></tr>',--}}
    {{--footerFormat: '</table>',--}}
    {{--shared: true,--}}
    {{--useHTML: true--}}
    {{--},--}}
    {{--plotOptions: {--}}
    {{--column: {--}}
    {{--pointPadding: 0.2,--}}
    {{--borderWidth: 0--}}
    {{--}--}}
    {{--},--}}
    {{--series: [{--}}
    {{--name: 'Feeling irritable‚ on edge‚ grouchy',--}}
    {{--data: [15]--}}

    {{--}, {--}}
    {{--name: 'Feeling down or sad',--}}
    {{--data: [40]--}}

    {{--}, {--}}
    {{--name: 'Having trouble sleeping',--}}
    {{--data: [30]--}}

    {{--}, {--}}
    {{--name: 'Feeling restless and jumpy',--}}
    {{--data: [45]--}}

    {{--}, {--}}
    {{--name: 'Having trouble thinking clearly and concentrating',--}}
    {{--data: [30]--}}

    {{--}]--}}
    {{--});--}}
    {{--</script>--}}
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
                $(v).parent().find('.currentChart').highcharts({
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
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
                        name: 'Brands',
                        colorByPoint: true,
                        data: dataArr
                    }]
                });
                //alert(JSON.stringify(dataArr));


            });


        });
    </script>
@endsection