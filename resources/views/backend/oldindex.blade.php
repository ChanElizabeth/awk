@extends('backend.layouts.master')

@section('content')
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            @can('isAdmin', Auth::user())
            <div class="col-lg-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-wallet"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text">Rp<span class="count">{{ $balance->balance }}</span></div>
                                    <div class="stat-heading">Balance</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endcan

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-credit"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{$total_transaction}}</span></div>
                                    <div class="stat-heading">Transaction</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib">
                                <i class="ti-check text-success border-success"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{$success}}</span></div>
                                    <div class="stat-heading">Success</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib">
                                <i class="ti-loop text-warning border-warning"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{$pending}}</span></div>
                                    <div class="stat-heading">Pending</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib"><i class="ti-close text-danger border-danger"></i></div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{$failed}}</span></div>
                                    <div class="stat-heading">Failed</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Widgets -->

        <!--  Traffic  -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title mb-3">Rekap Pembayaran</strong>
                        <button id="btn-bulanan" class="btn btn-outline-info btn-sm">Bulanan</button>
                        <button id="btn-tahunan" class="btn btn-info btn-sm">Tahunan</button>
                    </div>
                    <div class="card-body">
                        <h4 id="chartTitle"></h4>
                        <canvas id="singleBarChart"></canvas>
                    </div>
                </div>
            </div><!-- /# column -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Pembayaran Terakhir</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                  <th scope="col">Nomor Akun</th>
                                  <th scope="col">Bank Tujuan</th>
                                  <th scope="col">Jumlah</th>
                                  <th scope="col">Status</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($response as $item)
                                    <tr>
                                        <td>{{$item->account_number}}</td>
                                        <td>{{$item->bank_code}}</td>
                                        <td>{{$item->amount}}</td>
                                        <td>{{$item->status}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-link" href="{{route('dashboard.disbursement.index')}}">View More</a>
                    </div>
                </div>
            </div>
        </div>
        <!--  /Traffic -->

        <div class="clearfix"></div>

        <!-- Orders -->
        <!-- /.orders -->

        <!-- Calender Chart Weather  -->
        <!-- /Calender Chart Weather -->

    </div>
    <!-- .animated -->
@endsection

@section('script')
        <script>
        jQuery(document).ready(function($) {
            "use strict";

            let ctx = $( "#singleBarChart" );
            ctx.height = 150;
            let myChart = new Chart( ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
                    datasets: [
                        {
                            label: "Pembayaran",
                            data: {{$transactions}},
                            borderColor: "rgba(0, 194, 146, 0.9)",
                            borderWidth: "0",
                            backgroundColor: "rgba(0, 194, 146, 0.5)"
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [ {
                            ticks: {
                                beginAtZero: true
                            }
                                        } ]
                    }
                }
            });

            $("#btn-bulanan").click(function(){
                $("#btn-bulanan").attr('class', 'btn btn-info btn-sm');
                $("#btn-tahunan").attr('class', 'btn btn-info-outline btn-sm');

                myChart.destroy();
                var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                var d = new Date();
                let dates = [];
                var i;
                for (i = 1; i <= 31; i++){
                    dates.push(i);
                }
                $("#chartTitle").html('Pembayaran ' + monthNames[d.getMonth()]);
                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: dates,
                        datasets: [
                            {
                                label: "Pembayaran",
                                data: {{$transactions_current}},
                                borderColor: "rgba(0, 194, 146, 0.9)",
                                borderWidth: "0",
                                backgroundColor: "rgba(0, 194, 146, 0.5)"
                            }
                        ]
                    },
                    options: {
                        scales: {
                            yAxes: [ {
                                ticks: {
                                    beginAtZero: true
                                }
                            } ]
                        }
                    }
                });
            });

            $("#btn-tahunan").click(function(){
                $("#btn-tahunan").attr('class', 'btn btn-info btn-sm');
                $("#btn-bulanan").attr('class', 'btn btn-info-outline btn-sm');

                $("#chartTitle").html('');

                myChart.destroy();
                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
                        datasets: [
                            {
                                label: "Pembayaran",
                                data: {{$transactions}},
                                borderColor: "rgba(0, 194, 146, 0.9)",
                                borderWidth: "0",
                                backgroundColor: "rgba(0, 194, 146, 0.5)"
                            }
                        ]
                    },
                    options: {
                        scales: {
                            yAxes: [ {
                                ticks: {
                                    beginAtZero: true
                                }
                            } ]
                        }
                    }
                });
            });
        });
    </script>
@endsection
