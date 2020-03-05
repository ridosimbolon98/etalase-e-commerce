<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kontak Jualin Id</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Jualin Id">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/styles/bootstrap4/bootstrap.min.css">
	<link href="<?= base_url(); ?>assets/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/styles/contact_styles.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/styles/contact_responsive.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/styles/tombol.css">

	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/logo.png">

</head>

<body>
<div class="super_container">
	
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

							<div class="">
								<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
									<div class="cat_menu_text"><a class="text-primary" href="<?= base_url(); ?>">Jualin.Id</a></div>
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
									<a href="#">Jual Barang<i class="fa fa-angle-down"></i></a>
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

	<?php echo $this->session->flashdata('message'); ?>
  
	<div class="contact_info">
		<div class="container">

			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="<?= base_url();?>assets/images/contact_1.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Phone</div>
								<div class="contact_info_text">+62 853 6187 2032</div>
							</div>
						</div>

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="<?= base_url();?>assets/images/contact_2.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Email</div>
								<div class="contact_info_text">ridosimbolon98@gmail.com</div>
							</div>
						</div>

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="<?= base_url();?>assets/images/contact_3.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Alamat</div>
								<div class="contact_info_text">JL.Mulawarman Barat Dalam I No.10 A</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact Form -->

	<div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_form_container">
						<div class="contact_form_title">Kirim kami pesan feedback anda</div>

						<form method="POST" action="<?= base_url(); ?>welcome/feedback" id="contact_form">
							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<input name="nama_pengirim" type="text" id="contact_form_name" class="contact_form_name input_field text-dark" placeholder="Nama Anda"  value="<?= set_value('nama_pengirim'); ?>">
								<?= form_error('nama_pengirim', '<small class="validasi pl-3">', '</small>');?>
								<input name="email_pengirim" type="text" id="contact_form_email" class="contact_form_email input_field  text-dark" placeholder="Email Anda" value="<?= set_value('email_pengirim'); ?>">
								<?= form_error('email_pengirim', '<small class="validasi pl-3">', '</small>');?>
								<input name="no_hp_pengirim" type="text" id="contact_form_phone" class="contact_form_phone input_field text-dark" placeholder="Nomor HP Anda" value="<?= set_value('no_hp_pengirim'); ?>">
								<?= form_error('no_hp_pengirim', '<small class="validasi pl-3">', '</small>');?>
							</div>
							<div class="contact_form_text">
								<textarea id="contact_form_message" class="text_field contact_form_message text-dark" name="pesan" rows="4" placeholder="Pesan"><?= set_value('pesan'); ?></textarea>
								<?= form_error('pesan', '<small class="validasi pl-3">', '</small>');?>
							</div>
							<div class="contact_form_button">
								<button type="submit" class="button contact_submit_button">Kirim Feedback</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
		<div class="panel"></div>
	</div>

	<!-- Map -->

	<div class="contact_map">
		<div id="google_map" class="google_map">
			<div class="map_container">
				<div id="map"></div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="<?= base_url();?>assets/images/send.png" alt=""></div>
							<div class="newsletter_title">Sign up untuk berita terbaru</div>
						</div>
						<div class="newsletter_content clearfix">
							<form action="#" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
								<button class="newsletter_button">Langganan</button>
							</form>
							<div class="newsletter_unsubscribe_link"><a href="#">Berhenti langganan</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="#">Jualin.id</a></div>
						</div>
						<div class="footer_title">Ada pertanyaan? Hubungi Kami 24/7</div>
						<div class="footer_phone">+62 853 6187 2032</div>
						<div class="footer_contact_text">
							<p>JL. Mulawarman Barat 1 No.10 A</p>
							<p>Tembalang, Kota Semarang, Jawa Tengah</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="https://www.facebook.com/rido.simbolon.54" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="https://twitter.com/MartupaSimbolon?s=06" target="_blank"><i class="fab fa-twitter" target="_blank"></i></a></li>
								<li><a href="https://www.youtube.com/channel/UCjzo6071wdnJiWEKnfWSMoA" target="_blank"><i class="fab fa-youtube" target="_blank"></i></a></li>
								<li><a href="https://www.melekdata.com/" target="_blank"><i class="fab fa-google"></i></a></li>
								<li><a href="https://www.instagram.com/marthupa.simbolon/" target="_blank"><i class="fab fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-4 offset-lg-2">
					<div class="footer_column">
						<div class="footer_title">Bookmarks</div>
						<ul class="footer_list">
							<?php foreach ($kategori as $kat) { ?>
								<li><a href="#"><?= $kat->nama_kategori; ?></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<div class="footer_title">Layanan Pelanggan</div>
						<ul class="footer_list">
							<li><a href="#">Akun</a></li>
							<li><a href="#">Barang</a></li>
							<li><a href="#">Customer Services</a></li>
							<li><a href="#">Returns / Exchange</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="#">Product Support</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</footer>

	<!-- Copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content">
							Copyright &copy; 2019 | Rido Simbolon
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<!-- --------------------------------------------------------------------------------------------------------------- -->


<script src="<?= base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url(); ?>assets/styles/bootstrap4/popper.js"></script>
<script src="<?= base_url(); ?>assets/styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/greensock/TweenMax.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/greensock/TimelineMax.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/greensock/animation.gsap.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/easing/easing.js"></script>
<script src="<?= base_url(); ?>assets/js/contact_custom.js"></script>

<!-- script untuk jual barang -->
<script>
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