<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('m_data');
		$this->load->model('m_login');	
                $this->load->model('m_chat');  
		$this->load->library('pagination');	
	}

	/*MENAMPILKAN SEMUA DAFTAR BARANG*/
	function index(){
		$this->load->database();

		//konfigurasi pagination
                $config['base_url']    = base_url().'shop/index'; //site url
                $config['total_rows']  = $this->m_data->getJlhBarang('barang')->num_rows();
                $config['per_page']    = 20;  //show record per halaman
                $config["uri_segment"] = 3;  // uri parameter
                $choice                = $config["total_rows"] / $config["per_page"];
                $config["num_links"]   = floor($choice);
         
                // Membuat Style pagination untuk BootStrap v4
                $config['first_link']       = 'First';
                $config['last_link']        = 'Last';
                $config['next_link']        = 'Next';
                $config['prev_link']        = 'Prev';
                $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
                $config['full_tag_close']   = '</ul></nav></div>';
                $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                $config['num_tag_close']    = '</span></li>';
                $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
                $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
                $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
                $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['prev_tagl_close']  = '</span>Next</li>';
                $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
                $config['first_tagl_close'] = '</span></li>';
                $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['last_tagl_close']  = '</span></li>';
         
                $this->pagination->initialize($config);
                $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
         
                //panggil function get_file_list yang ada pada mmodel.
                  
                $data['barang']        = $this->m_data->getAllBarang('barang','kategori',$config["per_page"], $data['page'])->result(); 
                $data['pagination']    = $this->pagination->create_links();

		//ambal data barang dari model
		$data['kategori']      = $this->m_data->getAllKategori('kategori')->result();
		$data['barangTerbaru'] = $this->m_data->getAllBarangTerbaru('barang','kategori')->result();
		$data['jlhBarang']     = $this->m_data->getJlhBarang('barang')->num_rows();

		$this->load->view('shop/v_header',$data);
		$this->load->view('shop/v_index',$data);
		$this->load->view('shop/v_footer',$data);
	}

	/*MENAMPILKAN DETAIL PER PRODUK YANG DIPILIH*/
	function produk($id_barang) {
		$this->load->database();
		$data['id_barang']     = $id_barang;

		//ambil detail barang berdasarkan id_barang
		$data['produk']        = $this->m_data->getProduk('barang','kategori', $id_barang)->result();

		//ambil data barang terbaru dan kategori
		$data['kategori']      = $this->m_data->getAllKategori('kategori')->result();
		$data['barangTerbaru'] = $this->m_data->getAllBarangTerbaru('barang','kategori')->result();

        //ambil history chat tentang produk ber id $id_barang
        if ($this->session->userdata('status') == 'login') {
            $id_anggota    = $this->session->userdata('id');
            $nama          = $this->m_chat->getPengirim('chat', 'anggota', $id_barang, $id_anggota)->result();
            $data['nama_pengirim'] = $nama[0]; 
            $data['chat']  = $this->m_chat->getAllChat('chat', 'anggota', $id_barang, $id_anggota)->result();  

            $receiver_id   = 1998;
            $Logged_sender_id = $this->session->userdata('id');
             
            // $data['chat'] = $this->m_chat->GetReciverChatHistory($receiver_id);
            $data['receiver_id'] = $receiver_id;

            //print_r($history);
        } else {
            $id_anggota    = 0;
            $data['chat']  = $this->m_chat->getAllChat('chat', 'anggota', $id_barang, $id_anggota)->result();     
        }

		$this->load->view('shop/v_header_produk',$data);
		$this->load->view('shop/v_produk',$data);
		$this->load->view('shop/v_footer_produk',$data);
	}


    //MENAMPILKAN CHAT HISTORY
    public function getChatHistory($id_barang){
        $this->load->database();
        $admin            = 1998;
        $Logged_sender_id = $this->session->userdata('id');

        $chat             = $this->m_chat->getAllChat('chat', 'anggota', $id_barang, $Logged_sender_id)->result();  

        foreach ($chat as $msg):

        ?>
        <?php if($msg->id_asal == $Logged_sender_id) { ?>           
            <?php if($msg->id_pengirim != $admin) { ?>     
                  <!-- Message. Default to the left --> 
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"><?= $msg->nama; ?></span>
                        <span class="direct-chat-timestamp pull-right"><?= $msg->msg_date; ?></span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <div class="direct-chat-text">
                         <?= $msg->pesan ;?>
                      </div>
                      <!-- /.direct-chat-text -->
                      
                    </div>
                    <!-- /.direct-chat-msg -->
            <?php } else { ?>
                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right"> Admin</span>
                        <span class="direct-chat-timestamp pull-left"><?= $msg->msg_date; ?></span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <div class="direct-chat-text">
                        <?= $msg->pesan; ?>
                       </div>
                       <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
            <?php }

        }
        ?>

<?php        
        endforeach;   
    }

	// CARI BARANG INDEX SHOP
	function search(){
		$this->load->database();
		$cari     = strip_tags($this->input->get('q'));
                $kategori = $this->input->get('kategori');

                if ($kategori == '') {
                        $config['base_url']    = base_url().'shop/index'; //site url
                        $config['total_rows']  = $this->m_data->getJlhCariBarang('barang','kategori',$cari)->num_rows();
                        $config['per_page']    = 20;  //show record per halaman
                        $config["uri_segment"] = 3;  // uri parameter
                        $choice                = $config["total_rows"] / $config["per_page"];
                        $config["num_links"]   = floor($choice);
                 
                        // Membuat Style pagination untuk BootStrap v4
                        $config['first_link']       = 'First';
                        $config['last_link']        = 'Last';
                        $config['next_link']        = 'Next';
                        $config['prev_link']        = 'Prev';
                        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
                        $config['full_tag_close']   = '</ul></nav></div>';
                        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                        $config['num_tag_close']    = '</span></li>';
                        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
                        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
                        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
                        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
                        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                        $config['prev_tagl_close']  = '</span>Next</li>';
                        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
                        $config['first_tagl_close'] = '</span></li>';
                        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
                        $config['last_tagl_close']  = '</span></li>';
                 
                        $this->pagination->initialize($config);
                        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                 
                        //panggil function get_file_list yang ada pada mmodel.
                          
                        $data['barang']        = $this->m_data->getCariBarang('barang','kategori',$cari, $config["per_page"], $data['page'])->result(); 
                        $data['pagination']    = $this->pagination->create_links();

                        //ambal data barang dari model
                        $data['kategori']      = $this->m_data->getAllKategori('kategori')->result();
                        $data['barangTerbaru'] = $this->m_data->getAllBarangTerbaru('barang','kategori')->result();
                        $data['jlhBarang']     = $this->m_data->getJlhCariBarang('barang','kategori',$cari)->num_rows();

                        $this->load->view('shop/v_header',$data);
                        $this->load->view('shop/v_index',$data);
                        $this->load->view('shop/v_footer',$data);
                } else {
                        //konfigurasi pagination
                        $config['base_url']    = base_url().'shop/index'; //site url
                        $config['total_rows']  = $this->m_data->getJlhCariBarangKat('barang','kategori',$cari,$kategori)->num_rows();
                        $config['per_page']    = 20;  //show record per halaman
                        $config["uri_segment"] = 3;  // uri parameter
                        $choice                = $config["total_rows"] / $config["per_page"];
                        $config["num_links"]   = floor($choice);
                 
                        // Membuat Style pagination untuk BootStrap v4
                        $config['first_link']       = 'First';
                        $config['last_link']        = 'Last';
                        $config['next_link']        = 'Next';
                        $config['prev_link']        = 'Prev';
                        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
                        $config['full_tag_close']   = '</ul></nav></div>';
                        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                        $config['num_tag_close']    = '</span></li>';
                        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
                        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
                        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
                        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
                        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                        $config['prev_tagl_close']  = '</span>Next</li>';
                        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
                        $config['first_tagl_close'] = '</span></li>';
                        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
                        $config['last_tagl_close']  = '</span></li>';
                 
                        $this->pagination->initialize($config);
                        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                 
                        //panggil function get_file_list yang ada pada mmodel.
                          
                        $data['barang']        = $this->m_data->getCariBarangKat('barang','kategori',$cari, $kategori, $config["per_page"], $data['page'])->result(); 
                        $data['pagination']    = $this->pagination->create_links();

                        //ambal data barang dari model
                        $data['kategori']      = $this->m_data->getAllKategori('kategori')->result();
                        $data['barangTerbaru'] = $this->m_data->getAllBarangTerbaru('barang','kategori')->result();
                        $data['jlhBarang']     = $this->m_data->getJlhCariBarangKat('barang','kategori',$cari,$kategori)->num_rows();

                        $this->load->view('shop/v_header',$data);
                        $this->load->view('shop/v_index',$data);
                        $this->load->view('shop/v_footer',$data);
                }
                
                
	}



        /*MENAMPILKAN SEMUA DAFTAR BARANG BERDASARKAN KATEGORI*/
        function kategori($kat){
                $this->load->database();

                //konfigurasi pagination
                $config['base_url']    = base_url().'shop/kategori'; //site url
                $config['total_rows']  = $this->m_data->getJlhBarangKategori('barang','kategori',$kat)->num_rows();
                $config['per_page']    = 20;  //show record per halaman
                $config["uri_segment"] = 4;  // uri parameter
                $choice                = $config["total_rows"] / $config["per_page"];
                $config["num_links"]   = floor($choice);
         
                // Membuat Style pagination untuk BootStrap v4
                $config['first_link']       = 'First';
                $config['last_link']        = 'Last';
                $config['next_link']        = 'Next';
                $config['prev_link']        = 'Prev';
                $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
                $config['full_tag_close']   = '</ul></nav></div>';
                $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                $config['num_tag_close']    = '</span></li>';
                $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
                $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
                $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
                $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['prev_tagl_close']  = '</span>Next</li>';
                $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
                $config['first_tagl_close'] = '</span></li>';
                $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['last_tagl_close']  = '</span></li>';
         
                $this->pagination->initialize($config);
                $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
         
                //panggil function get_file_list yang ada pada mmodel.
                  
                $data['barang']        = $this->m_data->getAllBarangKategori('barang','kategori', $kat, $config["per_page"], $data['page'])->result(); 
                $data['pagination']    = $this->pagination->create_links();

                //ambal data barang dari model
                $data['kategori']      = $this->m_data->getAllKategori('kategori')->result();
                $data['barangTerbaru'] = $this->m_data->getAllBarangTerbaru('barang','kategori')->result();
                $data['jlhBarang']     = $this->m_data->getJlhBarangKategori('barang','kategori',$kat)->num_rows();

                $this->load->view('shop/v_header',$data);
                $this->load->view('shop/v_index',$data);
                $this->load->view('shop/v_footer',$data);
        }



}