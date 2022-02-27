@extends('layouts.home')

@section('content')
    <div class="content-wrapper" style="min-height: 568px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Jumlah yg Vote</span>
                                <span class="info-box-number">
                                    {{-- {{ count($vote) }} --}}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Jumlah Kandidat</span>
                                <span class="info-box-number">
                                    {{-- {{ count($candidate) }} --}}

                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">User Belum Vote</span>
                                <span class="info-box-number">
                                    {{ count($not_vote) }}

                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">User</span>
                                <span class="info-box-number">
                                    {{ count($user) }}

                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-md-6">

                        <!-- DONUT CHART -->
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Persentasi hasil vote BEM</h3>

                            </div>
                            <div class="card-body">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="donutChartBEM"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;"
                                    width="487" height="250" class="chartjs-render-monitor"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>

                    <div class="col-md-6">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Persentasi hasil vote DPM</h3>

                            </div>
                            <div class="card-body">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="donutChartDPM"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;"
                                    width="487" height="250" class="chartjs-render-monitor"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">

                        <!-- DONUT CHART -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Persentasi hasil vote HIMA</h3>

                            </div>
                            <div class="card-body">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="donutChartHIMA"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;"
                                    width="487" height="250" class="chartjs-render-monitor"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>

                    <div class="col-md-6">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Persentasi hasil vote HIMAKU</h3>

                            </div>
                            <div class="card-body">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="donutChartHIMAKU"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;"
                                    width="487" height="250" class="chartjs-render-monitor"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>

                <!-- /.card -->
                <div class="row">

                    <div class="col-md-12">
                        <!-- USERS LIST -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Kandidat</h3>

                                <div class="card-tools">
                                    <span class="badge badge-danger">8 Kandidat</span>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <ul class="users-list clearfix">
                                    {{-- @foreach ($candidate as $item)
                                        <li>
                                            <img src="./img/candidate/{{ $item->image }}" alt="User Image">
                                            <a class="users-list-name" href="#">{{ $item->name }} </a>
                                            <span class="users-list-date">{{ $item->fakultas }} </span>
                                        </li>
                                    @endforeach --}}
                                </ul>
                                <!-- /.users-list -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!--/.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('js')
    <script src="./plugins/chart.js/Chart.min.js"></script>

    <script>
        $(function() {
            var candidateBEM = <?php echo json_encode($candidate_BEM); ?>;
            var percentageBEM = <?php echo json_encode($percentage_BEM); ?>;
            var labelsBEM = [];


            candidateBEM.forEach(data => {
                labelsBEM.push(data.name)
            });

            var candidateDPM = <?php echo json_encode($candidate_DPM); ?>;
            var percentageDPM = <?php echo json_encode($percentage_DPM); ?>;
            var labelsDPM = [];


            candidateDPM.forEach(data => {
                labelsDPM.push(data.name)
            });

            var candidateHIMA = <?php echo json_encode($candidate_HIMA); ?>;
            var percentageHIMA = <?php echo json_encode($percentage_HIMA); ?>;
            var labelsHIMA = [];


            candidateHIMA.forEach(data => {
                labelsHIMA.push(data.name)
            });

            var candidateHIMAKU = <?php echo json_encode($candidate_HIMAKU); ?>;
            var percentageHIMAKU = <?php echo json_encode($percentage_HIMAKU); ?>;
            var labelsHIMAKU = [];


            candidateHIMAKU.forEach(data => {
                labelsHIMAKU.push(data.name)
            });
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */



            //-------------
            //- DONUT CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var donutChartCanvasBEM = $('#donutChartBEM').get(0).getContext('2d')

            var donutDataBEM = {
                labels: labelsBEM,
                datasets: [{
                    data: percentageBEM,
                    backgroundColor: [
                        'salmon',
                        'aqua',
                        'lime',
                        'pink',
                        'teal',
                        'royalblue',
                        'burlywood',
                        'lavender',
                        'grey',
                        'violet',
                        'tomato',
                    ],
                }]
            }

            var donutChartCanvasDPM = $('#donutChartDPM').get(0).getContext('2d')
            var donutDataDPM = {
                labels: labelsDPM,
                datasets: [{
                    data: percentageDPM,
                    backgroundColor: [
                        'tomato',
                        'lime',
                        'aqua',
                        'salmon',
                        'teal',
                        'pink',
                        'royalblue',
                        'burlywood',
                        'lavender',
                        'grey',
                        'violet',
                    ],
                }]
            }

            var donutChartCanvasHIMA = $('#donutChartHIMA').get(0).getContext('2d')
            var donutDataHIMA = {
                labels: labelsHIMA,
                datasets: [{
                    data: percentageHIMA,
                    backgroundColor: [
                        'pink',
                        'aqua',
                        'teal',
                        'salmon',
                        'royalblue',
                        'lime',
                        'grey',
                        'burlywood',
                        'lavender',
                        'violet',
                        'tomato',
                    ],
                }]
            }

            var donutChartCanvasHIMAKU = $('#donutChartHIMAKU').get(0).getContext('2d')
            var donutDataHIMAKU = {
                labels: labelsHIMAKU,
                datasets: [{
                    data: percentageHIMAKU,
                    backgroundColor: [
                        'lime',
                        'teal',
                        'salmon',
                        'pink',
                        'lavender',
                        'aqua',
                        'grey',
                        'burlywood',
                        'violet',
                        'royalblue',
                        'tomato',
                    ],
                }]
            }


            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(donutChartCanvasBEM, {
                type: 'doughnut',
                data: donutDataBEM,
                options: donutOptions
            })

            new Chart(donutChartCanvasDPM, {
                type: 'doughnut',
                data: donutDataDPM,
                options: donutOptions
            })

            new Chart(donutChartCanvasHIMA, {
                type: 'doughnut',
                data: donutDataHIMA,
                options: donutOptions
            })

            new Chart(donutChartCanvasHIMAKU, {
                type: 'doughnut',
                data: donutDataHIMAKU,
                options: donutOptions
            })


            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
                tooltips: {
                    callbacks: {
                        label: function(index, data) {
                            console.log(data.datasets[0].data[index.index]);
                            return data.datasets[0].data[index.index] + "%"
                        }
                    }
                }
            }

        })
    </script>
@endsection
