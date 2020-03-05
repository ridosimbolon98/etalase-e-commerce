<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Jualin Id | Barang Baru</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="<?= base_url(); ?>assets/admin/dist/css/skins/_all-skins.min.css">

  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/logo.png">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="<?= base_url(); ?>admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>J</b>ID</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b> JUALIN.ID</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url(); ?>assets/admin/dist/img/rido.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $this->session->userdata("username"); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= base_url(); ?>assets/admin/dist/img/rido.png" class="img-circle" alt="User Image">

                <p>
                  <?= $this->session->userdata("username"); ?>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= base_url(); ?>login/logout" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>

          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>


  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url(); ?>assets/admin/dist/img/rido.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata("nama"); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="<?= base_url(); ?>admin">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li>
          <a href="<?= base_url(); ?>admin/daftarBarang">
            <i class="fa fa-cube"></i> <span>Daftar Barang</span>
          </a>
        </li>

        <li class="active">
          <a href="<?= base_url(); ?>admin/barangBaru">
            <i class="fa fa-cube"></i> <span>Barang Baru</span>
          </a>
        </li>

        <li>
          <a href="<?= base_url(); ?>admin/pesan">
            <i class="fa fa-envelope"></i> <span>Pesan</span>
          </a>
        </li>

        <li>
          <a href="<?= base_url(); ?>admin/fp">
            <i class="fa fa-feed"></i> <span>Feedback</span>
          </a>
        </li>

        <li>
          <a href="<?= base_url(); ?>admin/langganan">
            <i class="fa fa-bell"></i> <span>Langganan</span>
          </a>
        </li>

        <li>
          <a href="<?= base_url(); ?>admin/kategori">
            <i class="fa fa-list-alt"></i> <span>Kategori Barang</span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Barang Baru Yang Perlu Diverifikasi
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?= base_url(); ?>admin/barangBaru">Barang Baru</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Info boxes -->
      <div class="row">

        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Barang Baru</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">

                <thead>
                  <tr>
                    <th>Nama Barang</th>
                    <th>Penjual</th>
                    <th>Alamat Penjual</th>
                    <th>No HP Penjual</th>
                    <th>Detail</th>
                  </tr>
                </thead>
                <tbody>

                <?php foreach ($barang_baru as $row) { ?>
                  <tr>
                    <td><?= $row->nama_barang; ?></td>
                    <td><?= $row->nama; ?></td>
                    <td><?= $row->alamat; ?></td>
                    <td><?= $row->hp; ?></td>
                    <!-- <td>
                      <?php /*
                      for ($i=0; $i < count(json_decode($row->gambar,true)); $i++) { 
                        echo '<img width="50"src="'.base_url().'/img/'.json_decode($row->gambar,true)[$i].'">';
                      }
                    */
                      ?>
                    </td> -->
                    <td>
                      <a href="<?= base_url(); ?>admin/detail/<?= $row->id_tmp; ?>" class="btn btn-success">Detail</a>
                    </td>
                  </tr>
                <?php } ?>

                </tbody>
              
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
