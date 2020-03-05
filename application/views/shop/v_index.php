	
	<!-- Home -->

	<style type="text/css">
		.data {
			margin-top: 7vh;
		}
		.paginasi {
			margin: 10px auto;
			padding: 10px auto;
		}
	</style>

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url(); ?>assets/images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">Jualin Aja di Sini</h2>
		</div>
	</div>

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Kategori</div>
							<ul class="sidebar_categories">

							<?php foreach ($kategori as $kat) { ?>
								<li><a href="#"><?= $kat->nama_kategori; ?></a></li>
							<?php } ?>

							</ul>
						</div>
						<div class="sidebar_section filter_by_section">
							<div class="sidebar_title">Filter By</div>
							<div class="sidebar_subtitle">Harga</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range"></div>
								<p>Range: </p>
								<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							</div>
						</div>
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span><?= $jlhBarang; ?></span> barang</div>
							<div class="shop_sorting">
								<span>Urutkan berdasarkan:</span>
								<ul>
									<li>
										<span class="sorting_text">terbaru<i class="fas fa-chevron-down"></span></i>
										<ul>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>terbaru</li>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>nama</li>
											<li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>harga</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>

						<div class="product_grid">
							<div class="product_grid_border"></div>

						<?php foreach ($barang as $brg) { ?>

							<div class="product_item is_new">
								<div class="product_border"></div>
								<a href="<?= base_url(); ?>shop/produk/<?= $brg->id; ?>">	
									<div class="product_image d-flex flex-column align-items-center justify-content-center">
										<img src="<?= base_url(); ?>img/<?= json_decode($brg->gambar,true)[0]; ?>" alt="Gambar Barang">
									</div>
								</a>
								<div class="product_content">
									<div class="product_price" hidden><?= $brg->harga ?></div>
									<div class="product_name data">
										<b><?= 'Rp '.number_format($brg->harga,2,",","."); ?></b>
									</div>
									<div class="product_name">
										<div>
											<a href="<?= base_url(); ?>shop/produk/<?= $brg->id; ?>" tabindex="0"><?= $brg->nama_barang; ?></a>
										</div>
									</div>
								</div>
								<ul class="product_marks">
									<li class="product_mark product_new"><?= $brg->status ?></li>
								</ul>
							</div>

						<?php } ?>

						</div>

						<!-- Shop Page Navigation -->
						<div class="row paginasi">
				            <div class="col">
				              <!--Tampilkan pagination-->
				              <?php echo $pagination; ?>
				            </div>
				        </div>

					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Barang Terbaru -->

	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">6 Barang Terbaru</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<div class="viewed_slider_container">
						
						<!-- Barang Terbaru Slider -->

						<div class="owl-carousel owl-theme viewed_slider">
							
						<?php foreach ($barangTerbaru as $bt) { ?>

							<!-- Barang Terbaru Item -->
							<div class="owl-item">
								<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
								    <a href="<?= base_url(); ?>shop/produk/<?= $bt->id; ?>">
										<div class="viewed_image">
											<img src="<?= base_url(); ?>img/<?= json_decode($bt->gambar,true)[0]; ?>" alt="Gambar Barang">
										</div>
									</a>
									<div class="viewed_content text-center">
										<div class="viewed_price">
											<?= number_format($bt->harga,2,",","."); ?>	
										</div>
										<div class="viewed_name">
											<a href="<?= base_url(); ?>shop/produk/<?= $bt->id; ?>"><?= $bt->nama_barang; ?></a>
										</div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">
											<?= $bt->status; ?>
										</li>
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

<!-- --------------------------------------------------------------------------------------------------------------- -->


