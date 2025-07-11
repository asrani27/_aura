<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DOOR TO DOOR</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/tema/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/tema/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/tema/bower_components/Ionicons/css/ionicons.min.css">
  @stack('css')
  
  <!-- DataTables -->
  <link rel="stylesheet" href="/tema/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="/tema/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/tema/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<!-- IziToast -->
<link rel="stylesheet" href="/notif/dist/css/iziToast.min.css">
<script src="/notif/dist/js/iziToast.min.js" type="text/javascript"></script>
</head>

<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header" style="background-color: #FFD700">

    <!-- Logo -->
    @if(Auth::user()->roles == 'admin')

 <a href="#" class="logo" style="background-color: #FFD700">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" style="color: black">Admin</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="color: black"><b>Admin</b></span>
    </a>

@endif

@if(Auth::user()->roles == 'pegawai')

 <a href="#" class="logo" style="background-color: #FFD700">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" style="color: black">Pegawai</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="color: black"><b>Pegawai</b></span>
    </a>
@endif

@if(Auth::user()->roles == 'pimpinan')
 <a href="#" class="logo" style="background-color: #FFD700">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" style="color: black">Pimpinan</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="color: black"><b>Pimpinan</b></span>
    </a>
@endif

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation"  style="background-color: #FFD700">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      @include('layouts.navbar')
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    @include('layouts.sidebar')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    

    <!-- Main content -->
    <section class="content container-fluid">

        @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      
    </div>
    <!-- Default to the left -->
    <strong>UPPD BANJARMASIN 1</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        
<h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="/tema/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/tema/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/tema/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/tema/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="/tema/dist/js/adminlte.min.js"></script>
<script>
@include('layouts.notif')
</script>
@stack('js')
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
