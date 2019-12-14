<!DOCTYPE html>
<html lang="en">
<head>
	<title>Profil Anggota Jualin Id</title>
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
						    <span class="tombol-jual" onclick="jualBarang()">Jual Barang</span>
						</div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_user">
								<div class="user_icon"><img src="<?= base_url(); ?>assets/images/user.svg" alt=""></div>

								<?php if (!in_array('login',  $this->session->userdata())) { ?>
									<div><a href="" data-toggle="modal" data-target="#daftarAkunModal">Daftar Akun</a></div>
									<div><a href="#" data-toggle="modal" data-target="#loginModal">Login</a></div>
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
						</div>
					</div>
				</div>
			</div>
		</div>

	</header>



<!-- Bagian Utama -->

<?php foreach ($anggota as $row) { ?>

	<div class="profil">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 mt-3">
					<div class="">
						<h4><i class="fa fa-th-large"></i> Profil <?= $row->nama; ?></h4>
						<p>Jumlah barang yang dijual 24</p>
					</div>
					<div class="">
						<table class="table table-default">
							<tr>
								<td>Nama</td>
								<td>:</td>
								<td><?= $row->nama; ?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>:</td>
								<td><?= $row->alamat; ?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td>:</td>
								<td><?= $row->username; ?></td>
							</tr>
							<tr>
								<td>No HP</td>
								<td>:</td>
								<td><?= $row->hp; ?></td>
							</tr>
							<tr>
								<td colspan="3">
									<a class="btn btn-primary mb-2 tombol-sama" href="" data-toggle="modal" data-target="#editProfilModal"><i class="fa fa-cogs"></i> Edit Profil</a>
									<a class="btn btn-secondary mb-2 tombol-sama" href=""  data-toggle="modal" data-target="#gantiPasswordModal"><i class="fa fa-cog"></i> Ubah Password</a>
								</td>
							</tr>
						</table>
					</div>
				</div>


				<div class="col-sm-6 m-3">
					<div class="text-center">
						<h4>Daftar barang</h4>
					</div>
					<!-- menampilkan daftar barang yg dijual akun session -->
					<div class="row">
						<?php foreach ($barang as $brg) { ?>
							<div class="col-sm-4 p-2 text-center mb-3">
								<a href="<?php echo base_url(); ?>barang/detail/<?= $brg->id; ?>">	
									<div class="product_image d-flex flex-column align-items-center justify-content-center">
										<img class="img-fluid" src="<?= base_url(); ?>img/<?= json_decode($brg->gambar,true)[0]; ?>" alt="Gambar Barang">
									</div>
								</a>
								<div class="" hidden><?= $brg->harga ?></div>
								<div class="text-danger">
									<b><?= 'Rp '.number_format($brg->harga,2,",","."); ?></b>
								</div>
								<div class="">
									<div>
										<a class="text-dark" href="<?php echo base_url(); ?>barang/detail/<?= $brg->id; ?>"><?= $brg->nama_barang; ?></a>
									</div>
								</div>
								<div>
									<a href="<?php echo base_url(); ?>barang/detail/<?= $brg->id; ?>" class="btn btn-primary">Detail</a>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="panel"></div>
	</div>

<?php } ?>


<!-- Akhir bagian utama -->



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
								<li><a href="https://s.id/cektemperamen" target="_blank"><i class="fab fa-google"></i></a></li>
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

	<!--EDIT PROFIL MODAL-->
	<div class="modal fade" id="editProfilModal">
		<div class="modal-dialog modal-lg">
		  	<div class="modal-content">
			    <div class="modal-header bg-primary text-white">
			      	<h5 class="modal-title">Edit Profil Anggota</h5>
			      	<button class="close" data-dismiss="modal"><span>&times;</span></button>
			    </div>
		    	<div class="modal-body">
		      		<form method="post" action="<?php echo base_url(); ?>profil/edit">
		        		<div class="form-group">
				          	<label for="title">Nama</label>
				          	<input type="text" name="nama" autofocus class="form-control" required value="<?= $row->nama; ?>">
		        		</div>
		        		<div class="form-group">
				          	<label for="title">Alamat</label>
				          	<input type="text" name="alamat" class="form-control" value="<?= $row->alamat; ?>">
		        		</div>
				        <div class="form-group">
				          	<label for="title">Email</label>
				          	<input type="email" name="email" class="form-control" value="<?= $row->username; ?>" readonly>
				        </div>
				        <div class="form-group">
				          	<label for="title">No HP</label>
				          	<input type="text" name="hp" class="form-control" required value="<?= $row->hp; ?>">
				        </div>
				        
				        <div class="modal-footer">
				          	<button class="btn btn-primary" type="submit" name="submit">Simpan</button>
				          	<button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				        </div>
		      		</form>
		    	</div>
		  	</div>
		</div>
	</div>
	<!-- AKHIR EDIT PROFIL MODAL-->

	<!-- UBAH PASSWORD MODAL-->
	<div class="modal fade" id="gantiPasswordModal">
		<div class="modal-dialog modal-lg">
		  	<div class="modal-content">
			    <div class="modal-header bg-secondary text-white">
			      	<h5 class="modal-title">Ubah Password Anggota</h5>
			      	<button class="close" data-dismiss="modal"><span>&times;</span></button>
			    </div>
		    	<div class="modal-body">
		      		<form method="post" action="<?php echo base_url(); ?>profil/up">
		        		<div class="form-group">
				          	<label for="title">Password Lama</label>
				          	<input type="password" name="password_lama" autofocus class="form-control" required placeholder="Password lama">
		        		</div>
		        		<div class="form-group">
				          	<label for="title">Password Baru</label>
				          	<input id="passBaru" type="password" name="password_baru" class="form-control" placeholder="Password baru" required>
		        		</div>
				        <div class="form-group">
				          	<label for="title">Konfirmasi Password Baru</label>
				          	<input id="konfPass" type="password" name="konfirmasi_password" class="form-control" required placeholder="Konfirmasi password baru">
				          	<span id="alertPass" class="text-danger"></span>
				        </div>
				        
				        <div class="modal-footer">
				          	<button id="btnSimpanUbahPass" class="btn btn-primary" type="submit" name="submit">Simpan</button>
				          	<button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				        </div>
		      		</form>
		    	</div>
		  	</div>
		</div>
	</div>
	<!-- AKHIR UBAH PASSWORD MODAL-->



	<!--LOGIN MODAL-->
	<div class="modal fade" id="loginModal">
		<div class="modal-dialog modal-lg">
		  	<div class="modal-content">
			    <div class="modal-header bg-primary text-white">
			      	<h5 class="modal-title">Login Anggota</h5>
			      	<button class="close" data-dismiss="modal"><span>&times;</span></button>
			    </div>
		    	<div class="modal-body">
		      		<form method="post" action="<?php echo base_url(); ?>login">
		        		<div class="form-group">
				          	<label for="title">Username/Email</label>
				          	<input type="email" name="username" autofocus class="form-control" required placeholder="Username/Email">
		        		</div>
				        <div class="form-group">
				          	<label for="title">Password</label>
				          	<input type="password" name="password" class="form-control" required placeholder="Password">
				        </div>

				        <div class="modal-footer">
				        	<div class="row">
				        		<div class="col-sm-3">	
				          			<button class="btn btn-primary" type="submit" name="submit">Login</button>
				          		</div>
				          		<div class="col-sm-3"></div>
				          			<button class="btn btn-secondary ml-3" data-dismiss="modal">Tutup</button>
				        		</div>
				        		<div class="col-sm-6">
				        			Belum mempunyai akun? <a id="daftarAkun" href="" data-toggle="modal" data-target="#daftarAkunModal" class="text-primary pr-3">Daftar Disini | </a><br>	
				        			<a href="#" class="text-primary pr-3">Lupa password?</a>
				        		</div>
				        	</div>
				        </div>
		      		</form>
		    	</div>
		  	</div>
		</div>
	</div>
	<!-- AKHIR LOGIN MODAL-->

	<!--DAFTAR AKUN MODAL-->
	<div class="modal fade" id="daftarAkunModal">
		<div class="modal-dialog modal-lg">
		  	<div class="modal-content">
			    <div class="modal-header bg-primary text-white">
			      	<h5 class="modal-title">Daftar Akun Anggota</h5>
			      	<button class="close" data-dismiss="modal"><span>&times;</span></button>
			    </div>
		    	<div class="modal-body">
		      		<form method="post" action="<?php echo base_url(); ?>login/daftar">
		        		<div class="form-group">
				          	<label for="title">Nama</label>
				          	<input type="text" name="nama" autofocus class="form-control" required placeholder="Nama">
		        		</div>
		        		<div class="form-group">
				          	<label for="title">Username/Email</label>
				          	<input type="email" name="username" class="form-control" required placeholder="Username/Email">
		        		</div>
				        <div class="form-group">
				          	<label for="title">Password</label>
				          	<input type="password" name="password" class="form-control" required placeholder="Password">
				        </div>
				        <div class="form-group">
				          	<label for="title">Konfirmasi Password</label>
				          	<input type="password" name="konfirmasi_password" class="form-control" required placeholder="Konfirmasi Password">
				        </div>
				        <div class="form-group">
				          	<label for="title">Alamat</label>
				          	<input type="text" name="alamat" class="form-control" required placeholder="Alamat">
				        </div>
				        <div class="form-group">
				          	<label for="title">No.HP</label>
				          	<input type="text" name="no_hp" class="form-control" required placeholder="+62 8**********">
				        </div>

				        <div class="modal-footer">
				          	<button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				          	<button class="btn btn-primary" type="submit" name="submit">Daftar</button>
				        </div>
		      		</form>
		    	</div>
		  	</div>
		</div>
	</div>
	<!-- AKHIR DAFTAR AKUN MODAL-->



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
	var jualBarang = () => {
	    <?php if (!in_array('login',  $this->session->userdata())): ?>
			$('#loginModal').modal('show');
		<?php else: ?>
			window.location = "<?= base_url(); ?>barang/jual";
		<?php endif ?>
	}

	
	//ubah password validasi
	const passBaru = document.getElementById('passBaru');
	const konfPass = document.getElementById('konfPass');

	konfPass.addEventListener('input', () => {
		let alertPass = document.getElementById('alertPass');
		
		if (passBaru.value != konfPass.value) {
			alertPass.innerHTML = '*Konfirmasi password tidak sama!';
		} else {
			alertPass.setAttribute('class', 'text-success');
			alertPass.innerHTML = '<i class="fa fa-check mt-2"></i>';
		}
	});

	//memastikan keyakinan ubah password
	const btnUbahPass = document.getElementById('btnSimpanUbahPass');

	btnUbahPass.addEventListener('click', () => {
		alert('Apakah anda yakin mengubah password lama anda ?');
		window.location = "<?= base_url('profil'); ?>";
	});

</script>



</body>

</html>