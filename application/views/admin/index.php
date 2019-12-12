
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?= base_url(); ?>admin">Dashboard</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- TAMPILAN UNTUK DASHBOARD TOTAL BARANG, PENGUNJUNG, BARANG TERJUAL, DAN DAFTAR ANGGOTA -->
      <!-- Info boxes -->
      <div class="row">

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <a class="text-bc" href="">
              <span class="info-box-icon bg-aqua"><i class="fa fa-cubes"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Barang</span>
                <span class="info-box-number"><?php echo $barang; ?></span>
              </div>
            </a>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <a class="text-bc" href="">
              <span class="info-box-icon bg-red"><i class="fa fa-line-chart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pengunjung</span>
                <span class="info-box-number">4.010</span>
              </div>
            </a>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <a class="text-bc" href="">
              <span class="info-box-icon bg-green"><i class="ion ion-ios-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Barang Terjual</span>
                <span class="info-box-number"><?php echo $barang_terjual; ?></span>
              </div>
            </a>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <a class="text-bc" href="">
              <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Daftar Anggota</span>
                <span class="info-box-number"><?php echo $anggota; ?></span>
              </div>
            </a>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->

      <!-- TAMPILAN UNTUK DASHBOARD PESAN, FEEDBACK DAN LANGGANAN -->
      <!-- Info boxes -->
      <div class="row">

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <a class="text-bc" href="<?= base_url(); ?>admin/langganan">
              <span class="info-box-icon bg-aqua-marine"><i class="fa fa-bell"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Daftar Berlangganan</span>
                <span class="info-box-number"><?php echo $langganan; ?></span>
              </div>
            </a>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <a class="text-bc" href="<?= base_url(); ?>admin/fp">
              <span class="info-box-icon bg-light-coral"><i class="fa fa-feed"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Feedback</span>
                <span class="info-box-number"><?php echo $feedback; ?></span>
              </div>
            </a>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <a class="text-bc" href="">
              <span class="info-box-icon bg-lime-green"><i class="fa fa-envelope"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pesan</span>
                <span class="info-box-number">0</span>
              </div>
            </a>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <a class="text-bc" href="">
              <span class="info-box-icon bg-light-yellow"><i class="ion ion-ios-people-outline"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Kosong</span>
                <span class="info-box-number">0</span>
              </div>
            </a>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
