<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title; ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url(); ?>assets/auth/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url(); ?>assets/auth/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/auth/css/daftar.css">


  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/styles/contact_styles.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/styles/contact_responsive.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/styles/tombol.css">

  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/logo.png">

</head>

<body class="">

  <!-- Header -->
  
  <header class="header">

    <!-- Top Bar -->

    <div class="top_bar">
      <div class="container">
        <div class="row">
          <div class="col d-flex flex-row">
            <div class="top_bar_contact_item">
                <span class="tombol-jual" id="jual">Jual Barang</span>
            </div>
            <div class="top_bar_content ml-auto">
              <div class="top_bar_user">
                <div class="user_icon"><img src="<?= base_url(); ?>assets/images/user.svg" alt=""></div>

                <?php if (!in_array('login',  $this->session->userdata())) { ?>
                  <div><a href="<?= base_url('login/da') ?>">Daftar Akun</a></div>
                  <div><a href="<?= base_url('login') ?>" >Login</a></div>
                <?php } else { ?>
                  <div>
                    <a href="<?= base_url(); ?>Profil"><?= $this->session->userdata("nama"); ?></a>
                  </div>
                  <div>
                    <a href="<?= base_url(); ?>login/logout"><i class="fa fa-user-times"></i> Logout</a>
                  </div>
                <?php } ?>

              </div>
            </div>
          </div>
        </div>
      </div>    
    </div>

    
    <!-- Main Navigation -->

    <nav class="main_nav">
      <div class="container">
        <div class="row">
          <div class="col">
            
            <div class="main_nav_content d-flex flex-row">

              <!-- Categories Menu -->

              <div class="cat_menu_container">
                <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                  <div class="cat_menu_text"><a class="text-white" href="<?= base_url(); ?>">Jualin.Id</a></div>
                </div>
              </div>

              <!-- Main Nav Menu -->

              <div class="main_nav_menu ml-auto">
                <ul class="standard_dropdown main_nav_dropdown">
                  <li><a href="<?= base_url(); ?>">Beranda<i class="fas fa-angle-down"></i></a></li>
                  <li><a href="<?= base_url(); ?>shop">Belanja Disini<i class="fas fa-chevron-down"></i></a></li>
                  <li><a href="<?= base_url(); ?>welcome/kontak">Kontak<i class="fas fa-chevron-down"></i></a></li>
                  <li><a href="#">Tentang Kami<i class="fas fa-chevron-down"></i></a></li>
                </ul>
              </div>

              <!-- Menu Trigger -->

              <div class="menu_trigger_container ml-auto">
                <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                  <div class="menu_burger">
                    <div class="menu_trigger_text">menu</div>
                    <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </nav>

    <!-- Menu Utama-->


    <div class="page_menu">
      <div class="container">
        <div class="row">
          <div class="col">
            
            <div class="page_menu_content">
              
              <div class="page_menu_search">
                <form method="GET" action="<?= base_url(); ?>shop/search">
                  <input name="q" type="search" required="required" class="page_menu_search_input" placeholder="Cari barang disini...">
                </form>
              </div>
              <ul class="page_menu_nav">
                <li class="page_menu_item">
                  <a href="<?= base_url(); ?>">Beranda<i class="fa fa-angle-down"></i></a>
                </li>
                <li class="page_menu_item">
                  <a href="<?= base_url(); ?>shop">Shop<i class="fa fa-angle-down"></i></a>
                </li>
                <li class="page_menu_item">
                  <a href="<?= base_url(); ?>welcome/kontak">Kontak<i class="fa fa-angle-down"></i></a>
                </li>
                <li class="page_menu_item">
                  <a href="#">Tentang Kami<i class="fa fa-angle-down"></i></a>
                </li>
                <li class="page_menu_item">
                  <a href="#" onclick="jualBarang()">Jual Barang<i class="fa fa-angle-down"></i></a>
                </li>
              </ul>
              
              <?php if (!in_array('login',  $this->session->userdata())) { ?>

                <div class="menu_contact">
                  <div class="menu_contact_item">
                    <div class="menu_contact_icon">
                      <div class="user_icon"><img src="<?php echo base_url();?>assets/images/user.svg" alt=""></div>
                      <a href="<?= base_url('login/da') ?>">Daftar Akun</a>
                    </div>
                  </div>
                  <div class="menu_contact_item">
                    <div class="menu_contact_icon">
                      <img src="" alt="">
                    </div>
                    <a href="<?= base_url('login') ?>" >Login</a>
                  </div>
                </div>
              
              <?php } else { ?>
                <div class="menu_contact">
                  <div class="menu_contact_item">
                    <div class="menu_contact_icon">
                      <div class="user_icon"><img src="<?php echo base_url();?>assets/images/user.svg" alt=""></div>
                      <a href="#"><?= $this->session->userdata("nama"); ?></a>
                    </div>
                  </div>
                  <div class="menu_contact_item">
                    <div class="menu_contact_icon">
                      <img src="" alt="">
                    </div>
                    <a href="<?= base_url(); ?>login/logout">Logout</a>
                  </div>
                </div>

              <?php } ?>

            </div>
          </div>
        </div>
      </div>
    </div>

  </header>

  <!-- Contact Info -->

  <div class="container">

    <div class="card daftar o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-md-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Daftar Akun</h1>
              </div>
              <?= $this->session->flashdata('msg_gagal_daftar'); ?>
              <form class="user" method="post" action="<?= base_url('login/daftar'); ?>">
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <label>Nama</label>
                    <input type="text" class="form-control form-control-user text-dark" id="nama" name="nama" placeholder="Nama" autofocus value="<?= set_value('nama'); ?>">
                    <?= form_error('nama', '<p class="validasi pl-3">', '</p>');?>
                  </div>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control form-control-user text-dark" id="email" name="email" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                  <?= form_error('email', '<p class="validasi pl-3">', '</p>');?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>Password</label>
                    <input type="password" class="form-control form-control-user text-dark" id="password1" name="password1" placeholder="Password">
                    <?= form_error('password1', '<p class="validasi pl-3">', '</p>');?>
                  </div>
                  <div class="col-sm-6">
                    <label>Konfirmasi Password</label>
                    <input type="password" class="form-control form-control-user text-dark" id="password2" name="password2" placeholder="Konfirmasi Password">
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control  text-dark" id="alamat" name="alamat" placeholder="Alamat"><?= set_value('alamat'); ?></textarea>
                  <?= form_error('alamat', '<p class="validasi pl-3">', '</p>');?>
                </div>
                <div class="form-group">
                  <label>No Hp/WA</label>
                  <input class="form-control form-control-user text-dark" id="hp" name="hp" placeholder="08**********" value="<?= set_value('hp'); ?>">
                  <?= form_error('hp', '<p class="validasi pl-3">', '</p>');?>
                </div>
                <input type="submit" name="submit" class="btn warna text-white btn-user btn-block" value="Daftar Akun Sekarang">
                <hr>
                <div class="text-center">
                <a class="btn-kembali" href="<?= base_url('login'); ?>">Sudah punya akun? Login disini</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url(); ?>assets/auth/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/auth/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url(); ?>assets/auth/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url(); ?>assets/auth/js/sb-admin-2.min.js"></script>

  <script src="<?php echo base_url();?>assets/js/jquery-3.3.1.min.js"></script>
  <script src="<?php echo base_url();?>assets/styles/bootstrap4/popper.js"></script>
  <script src="<?php echo base_url();?>assets/styles/bootstrap4/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/plugins/greensock/TweenMax.min.js"></script>
  <script src="<?php echo base_url();?>assets/plugins/greensock/TimelineMax.min.js"></script>
  <script src="<?php echo base_url();?>assets/plugins/scrollmagic/ScrollMagic.min.js"></script>
  <script src="<?php echo base_url();?>assets/plugins/greensock/animation.gsap.min.js"></script>
  <script src="<?php echo base_url();?>assets/plugins/greensock/ScrollToPlugin.min.js"></script>
  <script src="<?php echo base_url();?>assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
  <script src="<?php echo base_url();?>assets/plugins/slick-1.8.0/slick.js"></script>
  <script src="<?php echo base_url();?>assets/plugins/easing/easing.js"></script>
  <script src="<?php echo base_url();?>assets/js/custom.js"></script>

  <!-- script untuk jual barang -->
  <script type="text/javascript">
    const jual = document.getElementById('jual');
    jual.addEventListener('click', () => {
      <?php if (!in_array('login',  $this->session->userdata())): ?>
        location = "<?php echo base_url('login'); ?>";
      <?php else: ?>
        location = "<?php echo base_url('barang/jual'); ?>";
      <?php endif ?>
    });
  </script>

</body>

</html>
