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
									<a class="btn btn-primary mr-2 text-white" id="chatBtn"><i class="fa fa-comment"></i> Chat Admin</a>
								</div>
								<div class="btn-adm mb-5">
									<a class="btn btn-success mr-2" href="https://api.whatsapp.com/send?phone=6285292133150&text=Halo%20Admin%20di%20Jualin%20Id" target="_blank"><i class="fab fa-whatsapp"></i> WA Admin</a>
								</div>
								<div class="btn-adm mb-5">
									<a class="btn btn-warning mr-2" href="https://api.whatsapp.com/send?phone=62<?= intval($penjual[0]->hp); ?>&text=Halo%20Gan%20di%20" target="_blank"><i class="fab fa-whatsapp"></i> WA Penjual</a>
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