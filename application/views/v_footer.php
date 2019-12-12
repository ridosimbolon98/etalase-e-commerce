	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="<?php echo base_url();?>assets/images/send.png" alt=""></div>
							<div class="newsletter_title">Sign up untuk berita terbaru</div>
						</div>
						<div class="newsletter_content clearfix">
							<form method="POST" action="<?= base_url(); ?>welcome/langganan" class="newsletter_form">
								<input name="email" type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
								<button class="newsletter_button">Langganan</button>
							</form>
							<div class="newsletter_unsubscribe_link"><a href="#">Batalkan langganan</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer" id="<?= md5('kontak'); ?>">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="#">Jualin.id</a></div>
						</div>
						<div class="footer_title">Ada pertanyaan? Hubungi Kami 24/7</div>
						<div class="footer_phone">
							<i class="fa fa-whatsapp"> </i>
							 +62 853 6187 2032
						</div>
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
							<li><a href="#">Elektronik</a></li>
							<li><a href="#">Perkakas</a></li>
							<li><a href="#">Buku</a></li>
							<li><a href="#">Smartphone</a></li>
							<li><a href="#">Aksesoris</a></li>
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

<script>


	//const btnCari = document.querySelector('#tombol_cari');

	// btnCari.addEventListener('click', () => {
	// 	let kategori = $('#pilihan_kategori').val();
	// 	if(kategori != ''){
	// 		let input = $('#input_cari').val();

	// 		$.ajax({
	// 			url      : "<?php //echo base_url(); ?>shop/search",
	// 			type     : 'GET',
	// 			dataType : 'html',
	// 			data     : 'q='+input+'&kat='+kategori,
	// 			success  : function(respons){
	// 				console.log(respons);
	// 			},
	// 		})
	// 	}
	// });

</script>


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
</body>

</html>