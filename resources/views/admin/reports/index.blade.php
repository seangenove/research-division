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
    </script>
@endsection