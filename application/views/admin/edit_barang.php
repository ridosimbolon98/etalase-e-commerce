<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Jualin Id | Edit Barang</title>
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
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/admin/dist/css/detail_barang.css">

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

        <li class="active">
          <a href="<?= base_url(); ?>admin/daftarBarang">
            <i class="fa fa-cube"></i> <span>Daftar Barang</span>
          </a>
        </li>

        <li>
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
        Detail Barang
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= base_url(); ?>admin/daftarBarang">Daftar Barang</a></li>
        <li class="active"><a href="<?= base_url(); ?>admin/detailBarang">Detail Barang</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Info boxes -->
      <div class="row">

        <div class="col-sm-8">
          <div class="row box-shadow-gambar">

          <?php 
          foreach ($detail_barang as $dbb) { 
            for ($i=0; $i < count(json_decode($dbb->gambar,true)); $i++) { 
          ?>

              <div class="col-sm-6">
                <div class="img img-bg-persegi">
                  <img class="img-fluid isi-gambar" width="250" src="<?= base_url(); ?>img/<?= json_decode($dbb->gambar,true)[$i]; ?>" alt="Gambar Barang"></img>   
                </div>
              </div>

          <?php 
            }
          } 
          ?>
            
          </div>
        </div> 

        <div class="col-sm-4 ml-3">
          <div class="row">
            <div class="col-sm-12">
              
            <?php foreach ($detail_barang as $row) {  ?>

              <div class="detail box-shadow-detail">
                <form class="form-group" action="<?= base_url(); ?>admin/editAksi" method="post">
                  <div class="">
                    <label>Nama Barang</label>
                    <input type="text" hidden name="idBarang" value="<?= $idBarang; ?>">
                    <input class="form-control" type="text" name="nama" value="<?= $row->nama_barang; ?>" required>
                  </div>
                  <div>
                    <label>Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" required><?= $row->deskripsi; ?></textarea>
                  </div>
                  <div>
                    <label>Kategori</label>
                    <select name="kategori" class="form-control" required>
                      <option value="<?= $row->kategori ?>"><?= $row->nama_kategori; ?></option>
                    </select>
                  </div>
                  <div>
                    <label>Harga</label>
                    <input class="form-control" type="text" name="harga" value="<?= $row->harga; ?>" required>
                  </div>
                  <div>
                    <label>Status</label>
                    <?php if($row->status == 'ada') { ?>
                      <div class="form-check form-check-inline mx-4">
                        <input id="ada1" class="form-check-input" type="radio" name="status" value="<?= $row->status; ?>" checked>
                        <label class="form-check-label pl-0" for="ada1">Ada</label>
                      </div>
                      <div class="form-check form-check-inline ml-4">
                        <input id="terjual1" class="form-check-input" type="radio" name="status" value="terjual">
                        <label class="form-check-label pl-0" for="terjual1">Terjual</label>
                      </div>
                    <?php } else { ?>
                      <div class="form-check form-check-inline mx-4">
                        <input id="ada2" class="form-check-input" type="radio" name="status" value="ada">
                        <label class="form-check-label pl-0" for="ada2">Ada</label>
                      </div>
                      <div class="form-check form-check-inline ml-4">
                        <input id="terjual2" class="form-check-input" type="radio" name="status" value="<?= $row->status; ?>" checked>
                        <label class="form-check-label pl-0" for="terjual2">Terjual</label>
                      </div>
                    <?php } ?>
                  </div>
                  <div>
                    <input class="btn btn-primary form-control" type="submit" name="submit" onclick="return confirm('Apakah anda ingin mengubah data barang ?')" value="Simpan Perubahan">
                  </div>
                </form>

                <hr>

                <div>
                  <span class="kategori">Data Penjual</span>
                  <table class="table table-hover float-left">
                    <tr>
                      <td>Nama</td>
                      <td> : </td>
                      <td><?= $row->nama; ?></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td> : </td>
                      <td><?= $row->email; ?></td>
                    </tr>
                    <tr>
                      <td>No HP</td>
                      <td> : </td>
                      <td><?= $row->hp; ?></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td> : </td>
                      <td><?= $row->alamat; ?></td>
                    </tr>
                  </table>
                  <div>
                    <a class="btn btn-success form-control" href="https://api.whatsapp.com/send?phone=62<?php echo intval($row->hp); ?>&text=Hallo%20Pengguna%20Jualin%20Id%20:)" target="_blank">
                      <i class="fa fa-whatsapp"></i>
                       Chat Penjual
                    </a>
                  </div>
                </div>
              </div>

            <?php } ?>

            </div>
          </div>
        </div>

      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




