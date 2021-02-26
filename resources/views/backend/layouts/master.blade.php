    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Awan Kita</title>
    <meta name="description" content="Awan Kita">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps&display=swap" rel="stylesheet">
   

    <!-- FAVICONS -->
    <link rel="apple-touch-icon" sizes="144x144" href="assets/apple-touch-icon.png">
    <link rel="shortcut icon" href="{{asset('assets')}}/favicon.ico">
    <meta name="theme-color" content="#3063A0"><!-- End FAVICONS -->
    <!-- BEGIN PLUGINS STYLES -->
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/open-iconic/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/bootstrap-select/css/bootstrap-select.min.css">

    <link rel="stylesheet" href="{{asset('assets')}}/vendor/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/nouisliderribute/nouislider.min.css"><!-- END PLUGINS STYLES -->

    <!-- <link rel="stylesheet" href="assets/vendor/datatables/extensions/buttons/buttons.bootstrap4.min.css"> -->
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"><!-- END PLUGINS STYLES -->

    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" href="{{asset('assets')}}/stylesheets/theme.min.css" data-skin="default">
    <link rel="stylesheet" href="{{asset('assets')}}/stylesheets/theme-dark.min.css" data-skin="dark">
    <link rel="stylesheet" href="{{asset('assets')}}/stylesheets/custom.css">
    <!-- <link rel="stylesheet" href="{{ asset('backend_theme') }}/assets/css/cs-skin-elastic.css"> -->
    <!-- <link rel="stylesheet" href="{{ asset('backend_theme') }}/assets/css/style.css"> -->
    <script>
      var skin = localStorage.getItem('skin') || 'default';
      var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
      // Disable unused skin immediately
      disabledSkinStylesheet.setAttribute('rel', '');
      disabledSkinStylesheet.setAttribute('disabled', true);
      // add loading class to html immediately
      document.querySelector('html').classList.add('loading');
    </script><!-- END THEME STYLES -->

    @yield('css')

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }
    </style>

<body>

    <!-- Left Panel -->
    @component('backend.layouts.panel')

    @endcomponent
    <!-- /#left-panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel" >

    <!-- Header-->
    @component('backend.layouts.header')

    @endcomponent
    <!-- /#header -->
        <!-- Content -->
        <div class="content">
            @yield('content')
        </div>
        <!-- /.content -->

        <div class="clearfix"></div>

        <!-- Footer -->
        <!-- <footer class="app-footer">
            <div class="footer-inner bg-transparent">
                <div class="row">
                 
                    <div class="col-sm-6 text-right">
                        Copyright &copy; 2021 Awan Kita

                    </div>
                </div>
            </div>
        </footer> -->
        <!-- <div> -->
       
    </div>
     <!-- /#right-panel -->

    <!-- Scripts -->
   

     <!-- BEGIN BASE JS -->
     <script src="{{asset('assets')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('assets')}}/vendor/popper/popper.min.js"></script>
    <script src="{{asset('assets')}}/vendor/bootstrap/js/bootstrap.min.js"></script> <!-- END BASE JS -->
    <!-- BEGIN PLUGINS JS -->
    <script src="{{asset('assets')}}/vendor/pace-progress/pace.min.js"></script>
    <script src="{{asset('assets')}}/vendor/stacked-menu/js/stacked-menu.min.js"></script>
    <script src="{{asset('assets')}}/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{asset('assets')}}/vendor/flatpickr/flatpickr.min.js"></script>
    <script src="{{asset('assets')}}/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="{{asset('assets')}}/vendor/chart.js/Chart.min.js"></script> <!-- END PLUGINS JS -->

    <script src="{{asset('assets')}}/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>


    <script src="{{asset('assets')}}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets')}}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('assets')}}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{asset('assets')}}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{asset('assets')}}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <!-- BEGIN THEME JS -->
    <script src="{{asset('assets')}}/javascript/theme.min.js"></script> <!-- END THEME JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="{{asset('assets')}}/javascript/pages/dashboard-demo.js"></script> <!-- END PAGE LEVEL JS -->
    <script src="{{asset('assets')}}/javascript/pages/dataTables.bootstrap.js"></script>
    <script src="{{asset('assets')}}/javascript/pages/datatables-demo.js"></script> <!-- END PAGE LEVEL JS -->

    <!-- <script src="{{asset('assets')}}/javascript/pages/colorpicker-demo.js"></script> -->
    <!-- <script src="{{asset('assets')}}/javascript/pages/uploader-demo.js"></script> -->
    <!-- <script src="{{asset('assets')}}/javascript/pages/slider-demo.js"></script> -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116692175-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-116692175-1');
    </script>

    @yield('script')
    <!--Local Stuff-->
    {{-- <script>
        jQuery(document).ready(function($) {
            "use strict";

            // Pie chart flotPie1
            var piedata = [
                { label: "Desktop visits", data: [[1,32]], color: '#5c6bc0'},
                { label: "Tab visits", data: [[1,33]], color: '#ef5350'},
                { label: "Mobile visits", data: [[1,35]], color: '#66bb6a'}
            ];

            $.plot('#flotPie1', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        innerRadius: 0.65,
                        label: {
                            show: true,
                            radius: 2/3,
                            threshold: 1
                        },
                        stroke: {
                            width: 0
                        }
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true
                }
            });
            // Pie chart flotPie1  End
            // cellPaiChart
            var cellPaiChart = [
                { label: "Direct Sell", data: [[1,65]], color: '#5b83de'},
                { label: "Channel Sell", data: [[1,35]], color: '#00bfa5'}
            ];
            $.plot('#cellPaiChart', cellPaiChart, {
                series: {
                    pie: {
                        show: true,
                        stroke: {
                            width: 0
                        }
                    }
                },
                legend: {
                    show: false
                },grid: {
                    hoverable: true,
                    clickable: true
                }

            });
            // cellPaiChart End
            // Line Chart  #flotLine5
            var newCust = [[0, 3], [1, 5], [2,4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

            var plot = $.plot($('#flotLine5'),[{
                data: newCust,
                label: 'New Data Flow',
                color: '#fff'
            }],
            {
                series: {
                    lines: {
                        show: true,
                        lineColor: '#fff',
                        lineWidth: 2
                    },
                    points: {
                        show: true,
                        fill: true,
                        fillColor: "#ffffff",
                        symbol: "circle",
                        radius: 3
                    },
                    shadowSize: 0
                },
                points: {
                    show: true,
                },
                legend: {
                    show: false
                },
                grid: {
                    show: false
                }
            });
            // Line Chart  #flotLine5 End
            // Traffic Chart using chartist
            if ($('#traffic-chart').length) {
                var chart = new Chartist.Line('#traffic-chart', {
                  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                  series: [
                  [0, 18000, 35000,  25000,  22000,  0],
                  [0, 33000, 15000,  20000,  15000,  300],
                  [0, 15000, 28000,  15000,  30000,  5000]
                  ]
              }, {
                  low: 0,
                  showArea: true,
                  showLine: false,
                  showPoint: false,
                  fullWidth: true,
                  axisX: {
                    showGrid: true
                }
            });

                chart.on('draw', function(data) {
                    if(data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }
            // Traffic Chart using chartist End
            //Traffic chart chart-js
            if ($('#TrafficChart').length) {
                var ctx = document.getElementById( "TrafficChart" );
                ctx.height = 150;
                var myChart = new Chart( ctx, {
                    type: 'line',
                    data: {
                        labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ],
                        datasets: [
                        {
                            label: "Visit",
                            borderColor: "rgba(4, 73, 203,.09)",
                            borderWidth: "1",
                            backgroundColor: "rgba(4, 73, 203,.5)",
                            data: [ 0, 2900, 5000, 3300, 6000, 3250, 0 ]
                        },
                        {
                            label: "Bounce",
                            borderColor: "rgba(245, 23, 66, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(245, 23, 66,.5)",
                            pointHighlightStroke: "rgba(245, 23, 66,.5)",
                            data: [ 0, 4200, 4500, 1600, 4200, 1500, 4000 ]
                        },
                        {
                            label: "Targeted",
                            borderColor: "rgba(40, 169, 46, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(40, 169, 46, .5)",
                            pointHighlightStroke: "rgba(40, 169, 46,.5)",
                            data: [1000, 5200, 3600, 2600, 4200, 5300, 0 ]
                        }
                        ]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }

                    }
                } );
            }
            //Traffic chart chart-js  End
            // Bar Chart #flotBarChart
            $.plot("#flotBarChart", [{
                data: [[0, 18], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6],[16,15], [18, 9],[20,17], [22,7],[24,4], [26,9],[28,11]],
                bars: {
                    show: true,
                    lineWidth: 0,
                    fillColor: '#ffffff8a'
                }
            }], {
                grid: {
                    show: false
                }
            });
            // Bar Chart #flotBarChart End
        });
    </script> --}}
</body>

