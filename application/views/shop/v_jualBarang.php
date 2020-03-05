<!DOCTYPE html>
<html lang="en">
<head>
	<title><?= $title; ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Jualin Id">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/styles/bootstrap4/bootstrap.min.css">
	<link href="<?= base_url(); ?>assets/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/styles/contact_styles.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/styles/contact_responsive.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/styles/tombol.css">
	<style type="text/css">
		.validasi {
			font-size: 10px;
			color: #E84A3B;
		}
	</style>

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

	<!-- Form Jual barang -->

	<div class="jual-barang mt-5">
		<div class="container">
	    	<div class="card mb-3 p-2">
			    <div class="row">
				    <div class="col">
						<div class="pt-3 card-header">
							<h3 class="text-center">Hi Pengguna <span class="text-primary">Jualin.Id</span>, jualin barang anda disini <i class="fa fa-heart text-danger"></i></h3>
							<?= $this->session->flashdata('msg_ext'); ?>
						</div>

					<?php foreach ($anggota as $row) { ?>

						<form class="form-group" method="post" action="<?= base_url(); ?>barang/jualBarang" enctype="multipart/form-data">
							<div class="pb-3 pt-3">
								<label>Nama Barang</label>
								<input class="form-control" type="text" name="id_pengguna" hidden value="<?= $this->session->userdata('id') ?>">
								<input class="form-control text-dark" type="text" name="nama_barang" placeholder="Nama Barang" autofocus value="<?= set_value('nama_barang'); ?>">
								<?= form_error('nama_barang', '<small class="validasi pl-2">', '</small>');?>
							</div>
							<div class="pb-3">
								<label>Deskripsi Barang</label>
								<textarea class="form-control text-dark" placeholder="Deskripsi" name="deskripsi"><?= set_value('deskripsi'); ?></textarea>
								<?= form_error('deskripsi', '<small class="validasi pl-2">', '</small>');?>
							</div>
							<div class="pb-3">
								<label>Harga Barang</label>
								<input class="form-control text-dark" type="number" name="harga_barang" step="1" placeholder="Harga Barang" value="<?= set_value('harga_barang'); ?>">
								<?= form_error('harga_barang', '<small class="validasi pl-2">', '</small>');?>
							</div>
							<div class="pb-3">
								<label>Kategori Barang</label>
								<select class="form-control text-dark ml-0" name="kategori">
									<option value="" disabled selected>--Pilih Kategori--</option>
									<?php foreach ($kategori as $kat) { ?>
										<option value="<?= $kat->id_kat; ?>"><?= $kat->nama_kategori; ?></option>
									<?php }	?>
								</select>
								<?= form_error('kategori', '<small class="validasi pl-2">', '</small>');?>
								<!-- <input class="form-control" list="kat" name="kategori" required placeholder="Kategori Barang"> -->
								<!-- <datalist id="kat"> -->
									<!-- <?php //foreach ($kategori as $kat) //{ ?> -->
										<!-- <option value="//<?= $kat->nama_kategori;// ?>"> -->
									<!-- <?php //}	?> -->
								<!-- </datalist> -->
							</div>
							<div class="pb-3">
								<label>Alamat Anda</label>
								<textarea disabled class="form-control text-dark" name="alamat"><?= $row->alamat; ?></textarea>
							</div>
							<div class="pb-3">
								<label>No HP</label>
								<input disabled class="form-control text-dark" name="hp" value="<?= $row->hp; ?>"></input>
							</div>
							<div class="pb-3 upload-btn-wrapper">
								<label>Upload Foto Barang</label><br>
							    <button class="tombol_file">+</button>
								<input id="fileUpload" class="form-control" type="file" multiple name="gambar_barang[]">
								<span id="uploadFile">Tidak ada file dipilih..</span>
								<?= form_error('gambar_barang[]', '<small class="validasi pl-2">', '</small>');?>
							</div>
							<div class="mb-5">
								<input type="submit" class="form-control btn btn-primary text-white" name="submit" value="Upload">
							</div>
						</form>

					<?php } ?>

					</div>
				</div>
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
							<form method="POST" action="<?= base_url(); ?>welcome/langganan" class="newsletter_form">
								<input name="email" type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
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

	document.getElementById("fileUpload").onchange = function () {
	    document.getElementById("uploadFile").innerHTML = this.value;
	};
</script>

</body>

</html>