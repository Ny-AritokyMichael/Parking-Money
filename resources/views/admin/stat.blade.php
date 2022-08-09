@extends('admin.app.header')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 align="center">
                <i class="fa fa-cab"></i> Chart Review
                <small></small>
                <h1 style="margin-left: 675px">
                    <div id="heure"></div>
                </h1>
            </h1>
        </section>
        <br>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <canvas id="canvas" height="280" width="600"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8">
                        </script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
                        <script>
                            var url = "{{url('stock/chart')}}";
                            var free = new Array();
                            var busy = new Array();
                            var infraction = new Array();
                            $(document).ready(function() {
                                $.get(url, function(response) {
                                    response.forEach(function(data) {
                                        free.push(data.free);
                                        busy.push(data.busy);
                                        infraction.push(data.infraction);
                                    });
                                    var ctx = document.getElementById("canvas");
                                    ctx.height = 300;
                                    var myChart = new Chart(ctx, {
                                        type: 'doughnut',
                                        data: {
                                            datasets: [{
                                                data: [free,busy,infraction],
                                                backgroundColor: [
                                                    "green",
                                                    "orange",
                                                    "red"
                                                ],
                                                hoverBackgroundColor: [
                                                    "green",
                                                    "orange",
                                                    "red"
                                                ]

                                            }],
                                            labels: [
                                                 " free",
                                                 " busy",
                                                 " infraction"
                                            ]
                                        },
                                        options: {
                                            responsive: true
                                        }
                                    })
                                })
                            });




                            // var url = "";
                            // var Years = new Array();
                            // var Labels = new Array();
                            // var Prices = new Array();
                            // $(document).ready(function() {
                            //     $.get(url, function(response) {
                            //         response.forEach(function(data) {
                            //             Years.push(data.stockYear);
                            //             Labels.push(data.stockName);
                            //             Prices.push(data.stockPrice);
                            //         });
                            //         var ctx = document.getElementById("canvas").getContext('2d');
                            //         var myChart = new Chart(ctx, {
                            //             type: 'bar',
                            //             data: {
                            //                 labels: ["2010", "2011", "2012", "2013", "2014",
                            //                     "2015", "2016"
                            //                 ],
                            //                 datasets: [{
                            //                     label: 'Infosys Price',
                            //                     data: [0, 7, 3, 5, 2, 10, 7],
                            //                     borderWidth: 1
                            //                 }]
                            //             },
                            //             options: {
                            //                 scales: {
                            //                     yAxes: [{
                            //                         ticks: {
                            //                             beginAtZero: true
                            //                         }
                            //                     }]
                            //                 }
                            //             }
                            //         });
                            //     });
                            // });
                        </script>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
