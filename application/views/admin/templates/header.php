<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php echo base_url('assets/logo.jpg') ?>" type="image/x-icon">

  <title>STTP PMB</title>

  <script src="<?php echo base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="<?php echo base_url('assets/') ?>plugins/chart.js/Chart.min.js"></script>
  

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>DataTables/datatables.min.css"/>
  <script type="text/javascript" src="<?php echo base_url('assets/') ?>DataTables/datatables.min.js"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->

        <!-- Messages Dropdown Menu -->

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
            <span class="badge badge-warning navbar-badge"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="<?php echo site_url('adminku/auth/logout') ?>" class="dropdown-item">
              <i class="fas fa-key mr-2"></i>Logout
            </a>
          </div>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="<?php echo base_url('assets/logo.jpg') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <h4 class="brand-text font-weight-light">PMB STTP</h4>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo base_url('assets/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <h5 style="color: white;" class="d-block"><?php echo ucfirst($user['name_user']); ?></h5>
          </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

           <?php if ($user['lvl_user']==3):?>

            <li class="nav-item">
              <a href="<?php echo site_url('adminku') ?>" class="nav-link <?php echo $title=='Dashboard' ? 'active':'' ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo site_url('adminku/pendaftaran') ?>" class="nav-link <?php echo $title=='Pendaftaran' ? 'active':'' ?>">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Pendaftaran
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo site_url('adminku/ta') ?>" class="nav-link <?php echo $title=='Tahun Ajaran' ? 'active':'' ?>">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                  Tahun Ajaran
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo site_url('adminku/jurusan') ?>" class="nav-link <?php echo $title=='Jurusan' ? 'active':'' ?> ">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Jurusan
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo site_url('adminku/user') ?>" class="nav-link <?php echo $title=='User' ? 'active':'' ?> ">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                  User
                </p>
              </a>
            </li>

            <?php elseif ($user['lvl_user']==2):?>

              <li class="nav-item">
                <a href="<?php echo site_url('adminku') ?>" class="nav-link <?php echo $title=='Dashboard' ? 'active':'' ?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo site_url('adminku/pendaftaran') ?>" class="nav-link <?php echo $title=='Pendaftaran' ? 'active':'' ?>">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Pendaftaran
                  </p>
                </a>
              </li>

            <?php endif ?>

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
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"><?php echo $title; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <!-- <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol> -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <!-- /.content-header -->