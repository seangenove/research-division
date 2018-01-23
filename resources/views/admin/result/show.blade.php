@extends('layouts.admin')

@section('styles')
    <style>
        div > li {
            font-size: 25px;
        }
    </style>

@endsection

@section('content')
    <div class="container" style="background-color: #FFFFFF">

        <h1> Results </h1>
            @foreach( $questions as $key)
                <div>
                    <h3> {{ $key->question}} </h3>
                        <ol>
                            @foreach( $answers as $ans )
                                @if( $ans->question_id === $key->id)
                                    <li> {{ $ans->answer }} </li>
                                @endif
                            @endforeach
                        </ol>
                </div>
            @endforeach




        {{--<div>--}}
            {{--<h3>Question: Are you in favor of the Non-Smoking Ordinance?Why?</h3>--}}
            {{--<div id="Q2:">--}}
                {{--<ol>--}}
                    {{--<li>No, Because I regularly smoke when i have the sudden urge to smoke</li>--}}
                    {{--<li>Yes, Because I get irritated when I smell the smoke of the cigarette </li>--}}
                {{--</ol>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div>--}}
            {{--<h3> Question: Are you Against Smoking? </h3>--}}
            {{--<div id="Q3">--}}

            {{--</div>--}}
        {{--</div>--}}

        {{--<div>--}}
            {{--<h3> Question: Why do you Smoke?</h3>--}}
            {{--<div id="Q4">--}}

            {{--</div>--}}
        {{--</div>--}}
    </div>
@endsection

@section('scripts')
    <script src="/bower_components/highcharts/highcharts.js"></script>
    <script>


        Highcharts.chart('Q3', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ' '
            },
            tooltip: {
                pointFormat: '{series.name}: <b>({point.percentage:.1f}%)</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Percent',
                colorByPoint: true,
                data: [{
                    name: 'Yes',
                    y: 76,
                    selected: true
                }, {
                    name: 'No',
                    y: 24,
                    sliced: true,
                    selected: true
                }]
            }]
        });

        Highcharts.chart('Q4', {
            chart: {
                type: 'column'
            },
            title: {
                text: ' '
            },
            subtitle: {
                text: ' '
            },
            xAxis: {
                categories: [
                    ' '
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'number of respondents'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Feeling irritable‚ on edge‚ grouchy',
                data: [15]

            }, {
                name: 'Feeling down or sad',
                data: [40]

            }, {
                name: 'Having trouble sleeping',
                data: [30]

            }, {
                name: 'Feeling restless and jumpy',
                data: [45]

            }, {
                name: 'Having trouble thinking clearly and concentrating',
                data: [30]

            }]
        });
        // 625 respondents
    </script>

    <script>

    </script>
@endsection