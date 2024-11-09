@extends('kepala.layouts.master')
@section('title','Grafik')
@section('judul','Grafik')

@section('content')
        
        <!-- /.row (main row) -->
        <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header"></div>
            <div class="card-body">
    <div id="container"></div>
    </div>
    </div>
    </div>
        <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header"></div>
            <div class="card-body">
    <div id="container1"></div>
    </div>
    </div>
    </div>
    </div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var pendatang = <?php echo json_encode($datang)?>;
    var pindah = <?php echo json_encode($pindah)?>;

    Highcharts.chart('container', {
        title: {
            text: 'Grafik Pendatang dan Pindah'
        },
        subtitle: {
            text: 'Desa Salamnunggal'
        },
        xAxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ]
        },
        yAxis: {
            title: {
                text: 'Nomor Pendatang dan Pindah'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'pendatang',
            data: pendatang
        },
        {
            name: 'pindah',
            data: pindah
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });

</script>
<script type="text/javascript">
    var lahir = <?php echo json_encode($lahir)?>;
    var meninggal = <?php echo json_encode($meninggal)?>;

    Highcharts.chart('container1', {
        title: {
            text: 'Grafik Lahir dan Meninggal'
        },
        subtitle: {
            text: 'Desa Salamnunggal'
        },
        xAxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ]
        },
        yAxis: {
            title: {
                text: 'Nomor Lahir dan Meninggal'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'lahir',
            data: lahir
        },
        {
            name: 'meninggal',
            data: meninggal
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });

</script>
      </div
      

@stop

