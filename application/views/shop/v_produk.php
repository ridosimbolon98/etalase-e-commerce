	<!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<div class="row">
			
			<?php foreach ($produk as $row) { ?>

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2 mb-3">
					<ul class="image_list">

					<?php
					for ($i=0; $i < count(json_decode($row->gambar,true)); $i++) { 
          			?>

						<li data-image="<?= base_url(); ?>img/<?= json_decode($row->gambar,true)[$i]; ?>">
							<img src="<?= base_url(); ?>img/<?= json_decode($row->gambar,true)[$i]; ?>" alt="">
						</li>

					<?php } ?>

					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="<?= base_url(); ?>img/<?= json_decode($row->gambar,true)[0]; ?>" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description image_selected text-center">
						<div class="product_category text-primary">
							<?= $row->nama_kategori; ?>
						</div>
						<div class="product_name">
							<?= $row->nama_barang; ?>
						</div>
						<div class="product_text ml-3 mt-3">
							<p><?= $row->deskripsi; ?></p>
						</div>
						<div class="product_price mt-3">
							<?= 'Rp '. number_format($row->harga,2,",","."); ?>
						</div>
						<div class="order_info d-flex flex-row mt-3">
							<div class="d-flex flex-row">
								<div class="btn-adm mb-5">
									<a class="btn btn-primary mr-2 text-white" id="chatBtn"><i class="fa fa-comment"></i> Chat</a>
								</div>
								<div class="btn-adm mb-5">
									<a class="btn btn-success mr-2" href="https://api.whatsapp.com/send?phone=6285361872032&text=Selamat%20Datang%20di%20Jualin%20Id" target="_blank"><i class="fab fa-whatsapp"></i> SMS/WA</a>
								</div>
							</div>
						</div>

					</div>
				</div>

			<?php } ?>

			</div>
		</div>
	</div>

	<!-- Barang Terbaru -->

	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Barang Terbaru</h3>
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
				          	<input type="text" name="nama" autofocus class="form-control text-dark" required placeholder="Nama">
		        		</div>
		        		<div class="form-group">
				          	<label for="title">Username/Email</label>
				          	<input type="email" name="username" class="form-control text-dark" required placeholder="Username/Email">
		        		</div>
				        <div class="form-group">
				          	<label for="title">Password</label>
				          	<input type="password" name="password" class="form-control text-dark" required placeholder="Password">
				        </div>
				        <div class="form-group">
				          	<label for="title">Konfirmasi Password</label>
				          	<input type="password" name="konfirmasi_password" class="form-control text-dark" required placeholder="Konfirmasi Password">
				        </div>
				        <div class="form-group">
				          	<label for="title">Alamat</label>
				          	<input type="text" name="alamat" class="form-control text-dark" required placeholder="Alamat">
				        </div>
				        <div class="form-group">
				          	<label for="title">No.HP</label>
				          	<input type="text" name="no_hp" class="form-control text-dark" required placeholder="08**********">
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


	<!-- CHAT MODAL-->
	<div class="modal fade" id="chatModal">
		<div class="modal-dialog modal-lg">
		  	<div class="modal-content">
			    <div class="modal-header bg-primary text-white">
			      	<h5 class="modal-title"><i class="fa fa-comment"></i> Chat Admin</h5>
			      	<button class="close" data-dismiss="modal"><span>&times;</span></button>
			    </div>
		    	<div class="modal-body">
		      		<!-- Chat Produk -->
					<div class="container kotakChat"> <!-- tambahkan class hilang -->
						<div class="col-md-12">
					      <!-- DIRECT CHAT -->
					      <div class="box box-primary direct-chat direct-chat-primary">
					        <div class="box-header with-border">
					          <h3 class="box-title">Chat dengan admin</h3>
					        </div>
					        <!-- /.box-header -->
					        <div class="box-body">
					          <!-- Conversations are loaded here -->
					          <div class="direct-chat-messages" id="content">

					          	<div id="pesan"></div>

					          </div>
					          <!--/.direct-chat-messages-->
					        </div>
					        <!-- /.box-body -->
					        <div class="box-footer">
					            <div class="input-group">
					              <!-- <input id="idBarang" type="text" hidden name="idBarang" class="idBarang" value="//<?= $id_barang; ?>"> -->
					              <input id="receiver_id" type="text" hidden name="receiver_id" class="receiver_id" value="<?php echo $this->session->userdata('id'); ?>">
					              <input id="inputChat" type="text" name="pesan" placeholder="Tulis pesan anda..." class="form-control message">
					              <span class="input-group-btn">
					              	<button id="kirimPesan" type="submit" name="submit" class="btn btn-primary btn-flat btnSend">Kirim</button>
					              </span>
					            </div>
					        </div>
					        <!-- /.box-footer-->
					      </div>
					      <!--/.direct-chat -->
					    </div>
					    <!-- /.col -->
					</div>
		    	</div>
		  	</div>
		</div>
	</div>
	<!-- AKHIR CHAT MODAL-->