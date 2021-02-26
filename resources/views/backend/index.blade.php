@extends('backend.layouts.master')

@section('content')

<!-- <div class="animated fadeIn"> -->

<header class="page-title-bar">
  <div class="d-flex flex-column flex-md-row">
    <p class="lead">
      <span class="font-weight-bold">Hi, {{Auth::user()->name}}.</span> <span class="d-block text-muted">Here’s what’s happening with your business today.</span>
    </p>
    <div class="ml-auto">
      <!-- .dropdown -->
      <div class="dropdown">
        <button class="btn btn-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>This Week</span> <i class="fa fa-fw fa-caret-down"></i></button> <!-- .dropdown-menu -->
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-md stop-propagation">
          <div class="dropdown-arrow"></div><!-- .custom-control -->
          <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="dpToday" name="dpFilter" data-start="2019/03/27" data-end="2019/03/27"> <label class="custom-control-label d-flex justify-content-between" for="dpToday"><span>Today</span> <span class="text-muted">Mar 27</span></label>
          </div><!-- /.custom-control -->
          <!-- .custom-control -->
          <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="dpYesterday" name="dpFilter" data-start="2019/03/26" data-end="2019/03/26"> <label class="custom-control-label d-flex justify-content-between" for="dpYesterday"><span>Yesterday</span> <span class="text-muted">Mar 26</span></label>
          </div><!-- /.custom-control -->
          <!-- .custom-control -->
          <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="dpWeek" name="dpFilter" data-start="2019/03/21" data-end="2019/03/27" checked> <label class="custom-control-label d-flex justify-content-between" for="dpWeek"><span>This Week</span> <span class="text-muted">Mar 21-27</span></label>
          </div><!-- /.custom-control -->
          <!-- .custom-control -->
          <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="dpMonth" name="dpFilter" data-start="2019/03/01" data-end="2019/03/27"> <label class="custom-control-label d-flex justify-content-between" for="dpMonth"><span>This Month</span> <span class="text-muted">Mar 1-31</span></label>
          </div><!-- /.custom-control -->
          <!-- .custom-control -->
          <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="dpYear" name="dpFilter" data-start="2019/01/01" data-end="2019/12/31"> <label class="custom-control-label d-flex justify-content-between" for="dpYear"><span>This Year</span> <span class="text-muted">2019</span></label>
          </div><!-- /.custom-control -->
          <!-- .custom-control -->
          <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="dpCustom" name="dpFilter" data-start="2019/03/27" data-end="2019/03/27"> <label class="custom-control-label" for="dpCustom">Custom</label>
            <div class="custom-control-hint my-1">
              <!-- datepicker:range -->
              <input type="text" class="form-control" id="dpCustomInput" data-toggle="flatpickr" data-mode="range" data-disable-mobile="true" data-date-format="Y-m-d"> <!-- /datepicker:range -->
            </div>
          </div><!-- /.custom-control -->
        </div><!-- /.dropdown-menu -->
      </div><!-- /.dropdown -->
    </div>
  </div>
</header>
<!-- /.page-title-bar -->
<!-- .page-section -->
<!-- <div class="page-section"> -->
  <!-- .section-block -->
  <div class="section-block">
    <!-- metric row -->
    <div class="metric-row">
      <div class="col">
        <div class="metric-row metric-flush">

          @can('isAdmin', Auth::user())
          <!-- metric column -->
          <div class="col">
            <!-- .metric -->
            <a href="user-teams.html" class="metric metric-bordered align-items-center">
              <h2 class="metric-label"> Balance </h2>
              <p class="metric-value h3">
                <div class="stat-text">Rp<span class="count">{{ $balance->balance }}</span></div>

                <!-- <sub><i class="oi oi-people"></i></sub> <span class="value">8</span> -->
              </p>
            </a> <!-- /.metric -->
          </div><!-- /metric column -->
          @endcan
          <!-- metric column -->
          <div class="col">
            <!-- .metric -->
            <a href="user-projects.html" class="metric metric-bordered align-items-center">
              <h2 class="metric-label"> Transaction </h2>
              <p class="metric-value h3">
                <div class="stat-text"><span class="count">{{$total_transaction}}</span></div>

                <!-- <sub><i class="oi oi-fork"></i></sub> <span class="value">12</span> -->
              </p>
            </a> <!-- /.metric -->
          </div><!-- /metric column -->
          <!-- metric column -->
          <div class="col">
            <!-- .metric -->
            <a href="user-tasks.html" class="metric metric-bordered align-items-center">
              <h2 class="metric-label"> Success </h2>
              <p class="metric-value h3">
                <div class="stat-text"><span class="count">{{$success}}</span></div>

                <!-- <sub><i class="fa fa-tasks"></i></sub> <span class="value">64</span> -->
              </p>
            </a> <!-- /.metric -->
          </div><!-- /metric column -->
          <!-- metric column -->
          <div class="col">
            <!-- .metric -->
            <a href="user-tasks.html" class="metric metric-bordered align-items-center">
              <h2 class="metric-label"> Pending </h2>
              <p class="metric-value h3">
              <div class="stat-text"><span class="count">{{$pending}}</span></div>

              </p>
            </a> <!-- /.metric -->
          </div><!-- /metric column -->

          <!-- metric column -->
          <div class="col">
            <!-- .metric -->
            <a href="user-tasks.html" class="metric metric-bordered align-items-center">
              <h2 class="metric-label"> Failed </h2>
              <p class="metric-value h3">
              <div class="stat-text"><span class="count">{{$failed}}</span></div>

              <!-- <div class="stat-text"><span class="count">{{$pending}}</span></div> -->

              </p>
            </a> <!-- /.metric -->
          </div><!-- /metric column -->

        </div>
      </div><!-- metric column -->
    </div><!-- /metric row -->
  </div><!-- /.section-block -->
  <!-- grid row -->
  <div class="row">

    <!--  Traffic  -->
      <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-4">Rekap Pembayaran</h3>
                    <button id="btn-bulanan" class="btn btn-outline-info btn-sm">Bulanan</button>
                    <button id="btn-tahunan" class="btn btn-info btn-sm">Tahunan</button>
                </div>
                <div class="card-body">
                    <!-- <h4 id="chartTitle"></h4>
                    <canvas id="singleBarChart"></canvas> -->
                    <div class="chartjs" style="height: 200px">
                      <canvas id="completion-tasks"></canvas>
                    </div>
                </div>
            </div>
      </div><!-- /# column -->
      <div class="col">
              <div class="card card-fluid">
                <!-- .card-header -->
                <div class="card-header">
                  <div class="d-flex align-items-center">
                    <span class="mr-auto">Pembayaran Terakhir</span>  
                  </div>
                </div><!-- /.card-header -->
                <!-- .table-responsive -->
                <div class="table-responsive">
                  <!-- .table -->
                  <table class="table table-bordered">
                    <!-- thead -->
                    <thead class="thead-">
                      <tr>
                        <th style="min-width:100px"> Nomor Akun </th>
                        <th> Bank Tujuan </th>
                        <th> Jumlah </th>
                        <th> Status </th>
                      </tr>
                    </thead><!-- /thead -->
                    <!-- tbody -->
                    <tbody>
                        <tr>
                                <td>example</td>
                                <td>example</td>
                                <td>example</td>
                                <td>example</td>
                            </tr>
                        @foreach ($response as $item)
                            <tr>
                                <td>{{$item->account_number}}</td>
                                <td>{{$item->bank_code}}</td>
                                <td>{{$item->amount}}</td>
                                <td>{{$item->status}}</td>
                            </tr>
                        @endforeach
                      </tbody><!-- /tbody -->
                    </table><!-- /.table -->
                  </div><!-- /.table-responsive -->
                  <div class="card-footer">
                      <a class="btn btn-link" href="{{route('dashboard.disbursement.index')}}">View More</a>
                  </div>
              </div><!-- /.card -->
              
          </div>
        </div>
    
    <!--  /Traffic -->
  
  </div>
</div>
<!-- </div> -->
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
