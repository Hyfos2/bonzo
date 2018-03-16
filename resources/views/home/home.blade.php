@extends('master')
@section('content')
    {!! Charts::assets() !!}
<div class="row">

    <div class="col-md-6">
        <a>
            <div class="box box-info">
                <div class="box-header">
                    <h5 class="box-title" style="margin-left:5px;">Staff on Leave</h5>
                    <hr class="whiter m-b-20">
                </div>
                <div style="margin-left:20px;">
                <div class="box-body chart-responsive">
                    {{--{!! $staffOnLeave->render() !!}--}}
                    <div id="taskCharts" style="height: 400px"></div>
                </div>
                </div>
            </div>
        </a>



    </div>
    <div class="col-md-6">

            <a>
                <div class="box box-info">
                    <div class="box-header">
                        <h5 class="box-title">Working Staff</h5>
                        <hr class="whiter m-b-20">
                    </div>

                    <div style="margin-right:20px;">
                        <div class="box-body chart-responsive">
                            {{--{!! $staffOnLeave->render() !!}--}}
                            <div id="container" style="height: 400px"></div>
                        </div>
                    </div>
                </div>
            </a>
    </div>
</div>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- <script src="{{asset('js/highcharts.js')}}"></script> -->
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
     <!--  <script src="{{asset('js/drilldown.js')}}"></script>
    <script src="{{asset('js/exporting.js')}}"></script> -->
     <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script>

        var first =   {!! $first !!};
        var two =     {!! $two !!};
        var third =     {!! $third !!};
        var forth =     {!! $forth !!};
        var fifth =     {!! $fifth !!};

        Highcharts.chart('taskCharts', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'column'
            },
            credits: {
                enabled: false
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '<b>{point.percentage:.1f}% ({point.y})</b>'
            },
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            },
             plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'Departments',
                colorByPoint: true,
                data: [
                    {
                        name: 'Finance',
                        y: first
                    },  {
                        name: 'Human Resources',
                        y: two,
                        sliced: true,
                        selected: true

                    }
                    ,  {
                        name: 'Mining',
                        y: third,
                        sliced: true,
                        selected: true

                    }
                    ,  {
                        name: 'Technical Services',
                        y: forth,
                        sliced: true,
                        selected: true

                    }
                    ,  {
                        name: 'Security',
                        y: fifth,
                        sliced: true,
                        selected: true

                    }]
            }],
            drilldown: {
                series: [
                {
                    id: 'Finance',
                    data: [
                        ['Cats', 4],
                        ['Dogs', 2],
                        ['Cows', 1],
                        ['Sheep', 2],
                        ['Pigs', 1]
                    ]
                },
                {
                    id: 'Human Resources',
                    data: [
                        ['Cats', 4],
                        ['Dogs', 2],
                        ['Cows', 1],
                        ['Sheep', 2],
                        ['Pigs', 1]
                    ]
                },
                {
                    id: 'Mining',
                    data: [
                        ['Cats', 4],
                        ['Dogs', 2],
                        ['Cows', 1],
                        ['Sheep', 2],
                        ['Pigs', 1]
                    ]
                },
                {
                    id: 'Technical Services',
                    data: [
                        ['Cats', 4],
                        ['Dogs', 2],
                        ['Cows', 1],
                        ['Sheep', 2],
                        ['Pigs', 1]
                    ]
                },
                {
                    id: 'Security',
                    data: [
                        ['Cats', 4],
                        ['Dogs', 2],
                        ['Cows', 1],
                        ['Sheep', 2],
                        ['Pigs', 1]
                    ]
                }
                  ]
            }

        });
    </script>
    <script>
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Click to see more per column'
            },
            xAxis: {
                type: 'category'
            },
            exporting: {
                buttons: [
                    {
                        symbol: 'diamond',
                        x: -62,
                        symbolFill: '#B5C9DF',
                        hoverSymbolFill: '#779ABF',
                        _titleKey: 'printButtonTitle',
                        onclick: function() {
                            alert('click!')
                        }
                    }
                ]
            },

            legend: {
                enabled: false
            },
            credits: {
                enabled: false
            },

            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true
                    }
                }
            },

            series: [{
                name: 'Things',
                colorByPoint: true,
                data: [{
                    name: 'Animals',
                    y: 5,
                    drilldown: 'animals'
                }, {
                    name: 'Fruits',
                    y: 2,
                    drilldown: 'fruits'
                }, {
                    name: 'Cars',
                    y: 4,
                    drilldown: 'cars'
                }]
            }],

            drilldown: {
                series: [{
                    id: 'animals',
                    data: [
                        ['Cats', 4],
                        ['Dogs', 2],
                        ['Cows', 1],
                        ['Sheep', 2],
                        ['Pigs', 1]
                    ]
                }, {
                    id: 'fruits',
                    data: [
                        ['Apples', 4],
                        ['Oranges', 2]
                    ]
                }, {
                    id: 'cars',
                    data: [
                        ['Toyota', 4],
                        ['Opel', 2],
                        ['Volkswagen', 2]
                    ]
                }]
            }
        });
    </script>

    @endsection