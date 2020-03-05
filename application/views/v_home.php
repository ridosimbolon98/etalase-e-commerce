	
	<!-- Banner -->

	<div class="banner">
		<div class="banner_background" style="background-image:url(<?php echo base_url();?>assets/images/banner_background.jpg)"></div>
		<div class="container fill_height">
			<div class="row fill_height">
				<div class="banner_product_image"><img src="<?php echo base_url();?>assets/images/banner_product.png" alt=""></div>
				<div class="col-lg-5 offset-lg-4 fill_height">
					<div class="banner_content">
						<h1 class="banner_text">Jualin.id</h1>
						<p>Tempat kamu jual beli barang bekas berkualitas. Yuk pasang iklan kamu sekarang, dijamin gampang!</p>
						<div class="button banner_button"><a href="<?= base_url(); ?>shop">Belanja Disini</a></div>
						<div class="button banner_button btn-success"><a class="btn-success" href="#" onclick="jualBarang()">Jualin Disini</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Characteristics -->

	<div class="characteristics">
		<div class="container">
			<div class="row">

				<!-- Char. Item -->
				<div class="col-lg-4 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="<?php echo base_url();?>assets/images/char_1.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Respon Cepat</div>
							<div class="char_subtitle">24/7</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-4 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="<?php echo base_url();?>assets/images/char_3.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Lebih Murah</div>
							<div class="char_subtitle">Dari harga pasaran</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-4 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="<?php echo base_url();?>assets/images/char_4.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Kualitas Terjamin</div>
							<div class="char_subtitle">Diverifikasi langsung</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Daftar Barang -->

	<div class="deals_featured">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">Rekomendasi barang</div>
							<ul class="clearfix">
								<li class="active">On Sale</li>
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>

						<div class="bestsellers_panel panel active">

							<!-- Best Sellers Slider -->

							<div class="bestsellers_slider slider">
							
							<?php foreach ($barang as $row) {  ?>

								<!-- Best Sellers Item -->
								<div class="bestsellers_item discount">
									<div class="img bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
										<div class="bestsellers_image img-fluid"><img src="<?= base_url(); ?>img/<?= json_decode($row->gambar,true)[0]; ?>" alt="Gambar Barang" width="350"></div>
										<div class="bestsellers_content">
											<div class="bestsellers_category"><a href="#"><?php echo $row->nama_kategori; ?></a></div>
											<div class="bestsellers_name"><a href="<?= base_url(); ?>shop/produk/<?= $row->id; ?>"><?php echo $row->nama_barang; ?></a></div>
											<div class="bestsellers_category"><p><?php echo $row->deskripsi; ?></p></div>
											<div class="bestsellers_price"><?php echo 'Rp '. number_format($row->harga,2,",","."); ?></div>
										</div>
									</div>
									<ul class="bestsellers_marks">
										<li class="bestsellers_mark bestsellers_discount"><?php echo $row->status; ?></li>
									</ul>
								</div>

							<?php } ?>

							</div>

						</div>
					</div>
						
				</div>
			</div>
		</div>
	</div>

	<!-- Barang Baru -->

	<div class="trends" id="<?= md5('new'); ?>">
		<div class="trends_background" style="background-image:url(<?= base_url(); ?>assets/images/trends_background.jpg)"></div>
		<div class="trends_overlay"></div>
		<div class="container">
			<div class="row">

				<!-- Trends Content -->
				<div class="col-lg-3">
					<div class="trends_container">
						<h2 class="trends_title">6 Barang Terbaru</h2>
						<div class="trends_slider_nav">
							<div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
							<div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
						</div>
					</div>
				</div>

				<!-- Trends Slider -->
				<div class="col-lg-9">
					<div class="trends_slider_container">

						<!-- Trends Slider -->

						<div class="owl-carousel owl-theme trends_slider">

						<?php foreach ($barangTerbaru as $row) { ?>

							<!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item is_new">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="<?= base_url(); ?>img/<?= json_decode($row->gambar,true)[0]; ?>" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#"><?php echo $row->nama_kategori; ?></a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="<?= base_url(); ?>shop/produk/<?= $row->id; ?>"><?php echo $row->nama_barang; ?></a></div><br>
											<div class="bestsellers_price"><?php echo 'Rp '. number_format($row->harga,2,",","."); ?></div>
										</div>
									</div>
									<ul class="trends_marks">
										<li class="trends_mark trends_discount"><?= $row->status; ?></li>
										<li class="trends_mark trends_new">new</li>
									</ul>
								</div>
							</div>

						<?php } ?>

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Reviews -->

	<div class="reviews">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="reviews_title_container">
						<h3 class="reviews_title">Feedback Pengguna Jualin</h3>
					</div>

					<div class="reviews_slider_container">
						
						<!-- Reviews Slider -->
						<div class="owl-carousel owl-theme reviews_slider">
							
						<?php foreach ($feedback as $fb) { ?>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div class="review_content">
										<div class="review_name"><?php echo $fb->nama_pengirim ?></div>
										<div class="review_rating_container">
											<div class="review_time"><?php echo $fb->date; ?></div>
										</div>
										<div class="review_text"><p><?= $fb->pesan; ?></p></div>
									</div>
								</div>
							</div>

						<?php } ?>

						</div>
						<div class="reviews_dots"></div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Daftar Brands -->

	<div class="brands">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="brands_slider_container">
						
						<!-- Brands Slider -->

						<div class="owl-carousel owl-theme brands_slider">
							
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="<?php echo base_url();?>assets/images/brands_1.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="<?php echo base_url();?>assets/images/brands_2.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="<?php echo base_url();?>assets/images/brands_3.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="<?php echo base_url();?>assets/images/brands_4.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="<?php echo base_url();?>assets/images/brands_5.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="<?php echo base_url();?>assets/images/brands_6.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="<?php echo base_url();?>assets/images/brands_7.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="<?php echo base_url();?>assets/images/brands_8.jpg" alt=""></div></div>

						</div>
						
						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

					</div>
				</div>
			</div>
		</div>
	</div>

<!-- --------------------------------------------------------------------------------------------------------------- -->



