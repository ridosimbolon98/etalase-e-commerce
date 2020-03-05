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

<script src="<?= base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url(); ?>assets/styles/bootstrap4/popper.js"></script>
<script src="<?= base_url(); ?>assets/styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/greensock/TweenMax.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/greensock/TimelineMax.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/greensock/animation.gsap.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?= base_url(); ?>assets/plugins/easing/easing.js"></script>
<script src="<?= base_url(); ?>assets/js/product_custom.js"></script>

<!-- script untuk jual barang -->

  <script>
    const chatBtn = document.getElementById('chatBtn');
    chatBtn.addEventListener('click', () => {
      let kotakChat = document.querySelector('.kotakChat');
      let inputChat = document.getElementById('inputChat');
      
      <?php if (!in_array('login',  $this->session->userdata())): ?>
        location = "<?php echo base_url('login'); ?>";
      <?php else: ?>
        $('#chatModal').modal('show');
      <?php endif ?>

    });


    /*fungsi jquery untuk chat*/
    /*fungsi jquery untuk chat*/
    let pesan      = document.getElementById('pesan');
    const kirim    = document.querySelector('.btnSend');
    const pesanTxt = document.querySelector('#inputChat');

    $('#inputChat').keypress(function(event){
      var keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == '13'){
         sendTxtMessage($(this).val());
      }
    });

    kirim.addEventListener('click', () => {
      sendTxtMessage(pesanTxt.value);
    });

    function ScrollDown(){
      var elmnt = document.getElementById("content");
        var h     = elmnt.scrollHeight;
        $('#content').animate({scrollTop: h}, 1000);
    }
    window.onload = ScrollDown();

    function DisplayMessage(message){
      var Sender_Name = '<?php echo $this->session->userdata('nama'); ?>';
      
      var str ='<div class="direct-chat-msg right">';
        str+='<div class="direct-chat-info clearfix">';
        str+='<span class="direct-chat-name pull-right">'+Sender_Name ;
        str+='</span><span class="direct-chat-timestamp pull-left"></span>'; //23 Jan 2:05 pm
        str+='<div class="direct-chat-text">'+message;
        str+='</div></div>';

      $('#pesan').append(str);
    }

    //mengirim pesand dengan ajax tanpa reload
    function sendTxtMessage(message){
      var messageTxt = message.trim();
      if(messageTxt != ''){
        //console.log(message);
        DisplayMessage(messageTxt);

        let receiver_id = $('#receiver_id').val();
        $.ajax({
          dataType : "json",
          type : 'post',
          data : {messageTxt : messageTxt, receiver_id : receiver_id},
          url  : '<?php echo base_url(); ?>chat/kirimPesan?receiver_id='+receiver_id,
          success:function(data)
          {
            GetChatHistory(receiver_id);     
          },
          error: function (jqXHR, status, err) {
            alert('gagal kirim pesan')
          }
        });
              
        ScrollDown();
        $('.message').val('');
        $('.message').focus();
      } else{
        $('.message').focus();
      }
    }

    //ambil history chat dari database
    function GetChatHistory(receiver_id){
      $.ajax({
        url   : '<?php echo base_url(); ?>shop/getChatHistory?receiver_id='+receiver_id,
        success:function(data)
        {
          $('#pesan').html(data);
          ScrollDown();  
        },
        error: function (jqXHR, status, err) {
            console.log('error');
        }
      });
    }

    //load data chat tanpa reload
    setInterval(function(){ 
      var receiver_id = $('#receiver_id').val();
      if(receiver_id != ''){
        GetChatHistory(receiver_id);
      }
    }, 3000);


    /*akhir fungsi chat*/ 

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