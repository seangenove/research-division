@extends('layouts.admin')

@section('styles')

@endsection

@section('content')
    <div class="container" style="background-color: #FFFFFF">
       <h1> Results </h1>
        <div>
            <h3>Question: lorem ipsum </h3>
        <div id="test"></div>
        </div>

        <div>
            <h3>Question: Are you in favor of the Non-Smoking Ordinance?Why?</h3>
            <div id="Q2:">
                <ol>
                    <li>No, Because I regularly smoke when i have the sudden urge to smoke</li>
                    <li>Yes, Because I get irritated when I smell the smoke of the cigarette </li>
                </ol>
            </div>
        </div>

        <div>
            <h3> Question: Are you Against Smoking? </h3>
            <div id="Q3">

            </div>
        </div>

        <div>
            <h3> Question: If you do Smoke How many sticks do you smoke?</h3>
            <div id="Q4">

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/bower_components/highcharts/highcharts.js"></script>
    <script>
        Highcharts.chart('test', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Lorem Ipsum' // question title
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>' //hover
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
            }, // ^^ display info
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'Yes',
                    y: 56.33,
                    sliced: true,
                    selected: true
                }, {
                    name: 'No',
                    y: 24.03,
                    sliced: true,
                    selected: true
                }]
            }]// ^^ points
        });

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
                    'Number of Sticks'
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
                '<td style="padding:0"><b>{point.y:.1f} sticks</b></td></tr>',
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
                name: '1 - 3',
                data: [15]

            }, {
                name: '4 - 7',
                data: [40]

            }, {
                name: '8 - 11',
                data: [30]

            }, {
                name: '12 or more',
                data: [45]

            }]
        });
        // 625 respondents
    </script>

    <script>

    </script>
@endsection