<!DOCTYPE html>
<html lang="en">
<head>
	<title>Daftar Produk</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Jualin Id">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/styles/bootstrap4/bootstrap.min.css">
	<link href="<?php echo base_url(); ?>assets/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/slick-1.8.0/slick.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/styles/shop_styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/styles/shop_responsive.css">
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
							<span class="tombol-jual" onclick="jualBarang()">Jual Barang</span>
						</div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_user">
								<div class="user_icon"><img src="<?php echo base_url();?>assets/images/user.svg" alt=""></div>
								
								<?php if (!in_array('login',  $this->session->userdata())) { ?>
									<div><a href="" data-toggle="modal" data-target="#daftarAkunModal">Daftar Akun</a></div>
									<div><a href="" data-toggle="modal" data-target="#loginModal">Login</a></div>
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

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo Jualin-->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="<?php echo base_url(); ?>">Jualin.id</a></div>
						</div>
					</div>

					<!-- Percarian Barang -->
					<div class="col-lg-10 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form method="GET" action="<?= base_url(); ?>shop/search" class="header_search_form clearfix">
										<input name="q" type="search" required="required" class="header_search_input" placeholder="Cari barang disini...">
										<button type="submit" class="header_search_button trans_300" value="Submit"><img src="<?php echo base_url();?>assets/images/search.png" alt=""></button>
									</form>
								</div>
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
									<div class="cat_burger"><span></span><span></span><span></span></div>
									<div class="cat_menu_text">Kategori</div>
								</div>

								<ul class="cat_menu">
									<?php foreach ($kategori as $kat) { ?>
										<li><a href="<?= base_url(); ?>shop/kategori/<?= $kat->nama_kategori; ?>"><?= $kat->nama_kategori; ?></a></li>
									<?php } ?>
								</ul>
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
									<a href="#">Jual Barang<i class="fa fa-angle-down"></i></a>
								</li>
							</ul>
							
							<div class="menu_contact">
								<div class="menu_contact_item">
									<div class="menu_contact_icon">
										<a href="https://api.whatsapp.com/send?phone=6285361872032&text=Selamat%20Datang%20di%20Jualin%20Id" target="_blank"><i class="fab fa-whatsapp mr-3"></i> +62 853 6187 2032</a>
									</div>
								</div>
								<div class="menu_contact_item">
									<div class="menu_contact_icon">
										<img src="<?= base_url();?>assets/images/mail_white.png" alt="">
									</div>
									<a href="mailto:ridosimbolon98@gmail.com">ridosimbolon98@gmail.com</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</header>