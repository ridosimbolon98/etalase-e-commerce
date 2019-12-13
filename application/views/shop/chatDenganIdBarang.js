<!-- script untuk jual barang -->

  <script>
    const chatBtn = document.getElementById('chatBtn');
    chatBtn.addEventListener('click', () => {
      let kotakChat = document.querySelector('.kotakChat');
      let inputChat = document.getElementById('inputChat');
      
      <?php if (!in_array('login',  $this->session->userdata())): ?>
        $('#loginModal').modal('show');
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

        var id_brg  = document.querySelector('.idBarang');
        let id_barang = id_brg.value;
        $.ajax({
          dataType : "json",
          type : 'post',
          data : {messageTxt : messageTxt},
          url  : '<?php echo base_url(); ?>chat/kirimPesan',
          success:function(data)
          {
            GetChatHistory(id_barang);     
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
    function GetChatHistory(id_barang){
      $.ajax({
                url   : '<?php echo base_url(); ?>shop/getChatHistory/'+id_barang,
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
      var id_barang = document.getElementById('idBarang');
      if(id_barang.value != ''){
        GetChatHistory(id_barang.value);
      }
    }, 3000);


    /*akhir fungsi chat*/ 


    var jualBarang = () => {
        <?php if (!in_array('login',  $this->session->userdata())): ?>
        $('#loginModal').modal('show');
      <?php else: ?>
        window.location = "<?= base_url(); ?>barang/jual";
      <?php endif ?>
    }
  </script>