<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Survey Kepuasan Masyarakat</title>
  
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <link rel="stylesheet" href="{{ url('css/app.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <div class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              LOGOUT
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>


      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="{{ url('img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Survey</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ url('img/profile.png') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ Route('Laporan') }}" class="nav-link">
                    <i class="fas fa-address-card nav-icon"></i>
                    <p>Laporan</p>
                  </a>
              </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          {{-- <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Laporan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Laporan</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row --> --}}
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-6 mt-2">
                      <h5 class="card-title">Laporan Per-Hari</h5>
                    </div>
                    <div class="col-lg-6">
                        <input type="date" class="form-control" id="tanggalFilter">
                    </div>
                  </div>
                  <hr/>
                    <div id="spinnerDays" style="display: none;">
                        <div class="d-flex justify-content-center" >
                          <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                          </div>
                        </div>
                    </div>
                    <div id="nilDataDays"></div>
                    <canvas id="myChartPie" style="width: 500px;height: 500px"></canvas>
                </div>
              </div>

            </div>
            <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-6 mt-2">
                        <h5 class="card-title">Laporan Per-Bulan</h5>
                      </div>
                      <div class="col-lg-6">
                        <input type="month" class="form-control" id="bulanFilter"/>
                      </div>
                    </div>
                  <hr/>
                    <div id="spinnerMonth" style="display: none;">
                      <div class="d-flex justify-content-center" >
                        <div class="spinner-border" role="status">
                          <span class="sr-only">Loading...</span>
                        </div>
                      </div>
                    </div>
                    <div id="nilDataMonth"></div>
                    <canvas id="myChartMonth" style="width: 500px;height: 500px"></canvas>
                  </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
         
            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        RSUD Raja Ahmad Tabib
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2024-2025 <a href="#">Survey Kepuasan Masyarakat</a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- jQuery -->
  <script src="{{ url('js/app.js') }}"></script>

</body>

<script>

    $(document).ready(function() {
        //config harian -----------
        const ctxPie = document.getElementById('myChartPie').getContext('2d');
        // console.log(totalsOnlyDays, "cek total hari")
        const dataPie = {
                labels: null,
                datasets: [{
                        label: 'Data Perhari',
                        data: null,
                        backgroundColor: [
                        'rgb(255, 215, 50)',//kuning
                        'rgb(255, 50, 100)',//merah
                        'rgb(0, 215, 117)',//hujau
                    ],
                    hoverOffset: 4
                }]
                };
        var myChartTanggal = new Chart(ctxPie, {
            type: 'pie',
            data: dataPie,
            options: {
              title: {
                display: true,
                text: "Expense Categories"
              },
              aspectRatio: 1.2
            }
        });

        //config bulan -----------
        const ctxBar = document.getElementById('myChartMonth').getContext('2d');
        const dataBar = {
                labels: null,
                datasets: [{
                        label: "Data Perbulan",
                        data: null,
                        backgroundColor: [
                        'rgb(255, 215, 50)',//kuning
                        'rgb(255, 50, 100)',//merah
                        'rgb(0, 215, 117)',//hujau
                    ],
                    hoverOffset: 4
                }]
                };
        var myChartBulan = new Chart(ctxBar, {
            type: 'bar',
            data: dataBar,
            options: {
              title: {
                display: true,
                text: "Expense Categories"
              }, 
              aspectRatio: 1.2,
              plugins: {
                  legend: {
                      display: false // Menyembunyikan label dataset
                  }
              },
            }
        });

        $.ajax({
            url: '{{ route("GetLaporan") }}',
            type: 'GET',
            beforeSend: function(data) {
              $('#spinnerDays').show(500);
              $('#spinnerMonth').show(500);
              $("#nilDataDays").empty();
              $("#nilDataMonth").empty();
            },  
            success: function(data) {
              //render data
              labelsChange(data, "month")
              labelsChange(data, "days")
              
              $('#spinnerDays').hide(500);
              $('#spinnerMonth').hide(500);
            },
            error: function(data,xhr) {
                console.log(data)
            },
            complete: function() {
            }
        });


        $('#bulanFilter').on('change', function() {
            var bulanPilih = $(this).val();
            $.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
            var urlFix = '{{ route("GetLaporan") }}?bulan=' + bulanPilih;
            $.ajax({
                url: urlFix,
                type: 'GET',
                beforeSend: function(data) {
                  $('#spinnerMonth').show(500);
                  $("#nilDataMonth").empty();
                }, 
                success: function(data) {
                  //render ulang data
                  labelsChange(data, "month")
                  $('#spinnerMonth').hide(500);
                },
                error: function(data,xhr) {
                    alert("terjadi kesalahan #12kmss")
                    console.log(data)
                },
                complete: function() {
                }
            });
        });

        $('#tanggalFilter').on('change', function() {
            var tanggalPilih = $(this).val();
            $.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
            var urlFix = '{{ route("GetLaporan") }}?tanggal=' + tanggalPilih;
            $.ajax({
                url: urlFix,
                type: 'GET',
                beforeSend: function(){
                  $("#nilDataDays").empty();
                  $('#spinnerDays').show(500);
                },
                success: function(data) {
                  //render ulang data
                  labelsChange(data, "days")
                  $('#spinnerDays').hide(500);
                },
                error: function(data,xhr) {
                    alert("terjadi kesalahan #ds22")
                    console.log(data)
                },
                complete: function() {
                }
            });
        });

        function labelsChange(data, type){
          if (type == "month") {
            const combinedDataMonth = data.dataPerMonth.map(item => ({ label: item.value, total: item.total }));
            const totalsOnlymonth = combinedDataMonth.map(item => item.total);
            const labelsOnlymonth = combinedDataMonth.map(item => item.label);
            myChartBulan.data.datasets[0].data = totalsOnlymonth;
            myChartBulan.data.labels = labelsOnlymonth;
            myChartBulan.update();
            
            nilData(totalsOnlymonth.length, "month");
            
          }else if(type == "days"){
            const combinedDataDays = data.dataPerdays.map(item => ({ label: item.value, total: item.total }));
            const totalsOnlydays = combinedDataDays.map(item => item.total);
            const labelsOnlydays = combinedDataDays.map(item => item.label);
            myChartTanggal.data.datasets[0].data = totalsOnlydays;
            myChartTanggal.data.labels = labelsOnlydays;
            myChartTanggal.update();
            
            nilData(totalsOnlydays.length, "days");

          }
        }
        function nilData(totData, idEl){
          const htmlRender = '<div class="alert alert-warning" role="alert"><center>Tidak ada data!</center></div>';
          if (totData == 0 && idEl == "days") {
              $('#nilDataDays').html(htmlRender);
          }else if(totData == 0 && idEl == "month"){
              $('#nilDataMonth').html(htmlRender);
          }
        }

    });
</script>


</html>