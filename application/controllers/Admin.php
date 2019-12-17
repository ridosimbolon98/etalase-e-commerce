<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();

		if ($this->session->userdata('status') != "login-admin") {
			echo "<script>location='".base_url()."login/admin';</script>";
		} else {
			$this->load->helper('url');
			$this->load->model('m_data');
			$this->load->model('m_login');
        	$this->load->model('m_chat');  
			$this->load->model('m_admin');
			$this->load->model('m_pesan');
			$this->load->library('pagination');	
		}	
					
	}



	/*MENAMPILKAN DASHBOARD ADMIN*/
	public function index(){
		$this->load->database();

		$where = array (
			'status' => 'terjual'
		);

		$ada = array (
			'status' => 'ada'
		);

		//ambal data kaytegori barang dari model
		$data['anggota']        = $this->m_data->getAllAnggota('anggota')->num_rows();
		$data['barang']         = $this->m_admin->getAllBarang('barang','kategori')->num_rows();
		$data['barang_ada']     = $this->m_admin->getAllBarangAda('barang',$ada)->num_rows();
		$data['barang_terjual'] = $this->m_data->getAllBarangTerjual('barang',$where)->num_rows();
		$data['barang_baru']    = $this->m_admin->getAllBarangBaru('tmp_barang','anggota')->num_rows();
		$data['kategori']       = $this->m_data->getAllKategori('kategori')->result();
		$data['feedback']       = $this->m_pesan->getJlhFeedback('feedback')->num_rows();
		$data['langganan']      = $this->m_login->getJlhLangganan('langganan')->num_rows();
		$data['pesan']          = $this->m_chat->getPesan('chat')->num_rows(); //jumlah pesan yang belum dibaca
		// $data['pesan']          = $this->m_pesan->getAllPesan('pesan')->result();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/index',$data);
		$this->load->view('admin/footer',$data);
	}

	//menampilkan daftar barang yang masih ready atau status ada
	function daftarBarang() {
		$this->load->database();

		//konfigurasi pagination
        $config['base_url']    = base_url().'admin/daftarBarang'; //site url
        $config['total_rows']  = $this->m_admin->getAllBarang('barang','kategori')->num_rows();
        $config['per_page']    = 5; //show record per halaman
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
          
        $data['barang']     = $this->m_admin->ambilSemuaBarang('barang','kategori',$config["per_page"], $data['page'])->result(); 
        $data['pagination'] = $this->pagination->create_links();

		$this->load->view('admin/daftar_barang',$data);
		$this->load->view('admin/footer',$data);
	}

	//menampilkan detail barang 
	function detailBarang($id){
		$this->load->database();

		//ambil data detail barang dan kategori 
		$data['detail_barang'] = $this->m_admin->getDetBrgKat('barang','kategori','anggota',$id)->result();

		$data['idBarang'] = $id;

		$this->load->view('admin/detail_barang',$data);
		$this->load->view('admin/footer',$data);
	}

	//menampilkan edit barang 
	function editBarang($id){
		$this->load->database();

		//ambil data detail barang dan kategori 
		$data['detail_barang'] = $this->m_admin->getDetBrgKat('barang','kategori','anggota',$id)->result();

		$data['idBarang'] = $id;

		$this->load->view('admin/edit_barang',$data);
		$this->load->view('admin/footer',$data);
	}

	//edit barang aksi
	function editAksi() {
		$this->load->database();

		//cek jika di submit
		if ($this->input->post('submit')) {
			$idBarang  = strip_tags($this->input->post('idBarang'));
			$nama      = strip_tags($this->input->post('nama'));
			$deskripsi = strip_tags($this->input->post('deskripsi'));
			$kategori  = strip_tags($this->input->post('kategori'));
			$harga     = strip_tags($this->input->post('harga'));
			$status    = strip_tags($this->input->post('status'));

			//data yang mau diupdate
			$data = array(
		        'nama_barang' => $nama,
		        'deskripsi'   => $deskripsi,
		        'harga'       => $harga,
		        'status'      => $status,
		        'kategori'    => $kategori
			);

			$update = $this->m_admin->updateDataBarang('barang',$idBarang,$data);

			if ($update) {
				echo "<script>alert('Data barang berhasil diperbaharui');</script>";
				echo "<script>location='".base_url()."admin/editBarang/".$idBarang."';</script>";
			} else {
				echo "<script>alert('Gagal memperbaharui data barang');</script>";
				echo "<script>location='".base_url()."admin/editBarang".$idBarang."';</script>";
			} 

		}
	}

	//ubah status barang
	function status($idBarang) {
		$this->load->database();

		//ambil data status dari post form
		$status   = $this->input->post('status');

		$statData = array ('status' => $status);
		$where    = array('id' => $idBarang);

		$update   = $this->m_data->updateStatus('barang', $statData, $where);

		if ($update) {
			echo "<script>alert('Status barang berhasil diperbaharui');</script>";
			echo "<script>location='".base_url('admin/detailBarang/').$idBarang."';</script>";
		} else {
			echo "<script>alert('Status barang gagal diperbaharui');</script>";
			echo "<script>location='".base_url('admin/detailBarang/').$idBarang."';</script>";
		}
	
	}

	//menampilkan daftar barang baru yg perlu diverifikasi
	function barangBaru(){
		$this->load->database();

		$where = array (
			'status' => 'terjual'
		);

		//ambil data barang baru yng perlu diverifikasi dari database
		$data['barang_baru'] = $this->m_admin->getAllBarangBaru('tmp_barang','anggota')->result();

		$this->load->view('admin/barang_baru',$data);
		$this->load->view('admin/footer',$data);
	}

	//menampilkan detail barang baru yang belum diverifikasi
	function detail($id_tmp){
		$this->load->database();

		$where = array (
			'id_tmp' => $id_tmp
		);

		//ambil data barang baru yng perlu diverifikasi dari database
		$data['detail_barang_baru'] = $this->m_admin->getDetailBarangBaru('tmp_barang','anggota',$where)->result();
		$data['detail_barang'] = $this->m_admin->getDetailBarangKategori('tmp_barang','kategori',$where)->result();

		$data['id_tmp'] = $id_tmp;

		$this->load->view('admin/detail_barang_baru',$data);
		$this->load->view('admin/footer',$data);
	}

	//fungsi untuk memverifikasi barang baru dan memindahkan ke database barang
	function verifikasi($id_tmp){
		$this->load->database();

		$data_pelanggan     = $this->m_login->getAllLangganan('langganan')->result();

		$where = array (
			'id_tmp' => $id_tmp
		);

		$data_verif_barang = $this->m_admin->getDetailBarangKategori('tmp_barang','kategori',$where)->result();

		$data_insert =  array (
			'nama_barang' => $data_verif_barang[0]->nama_barang,
			'deskripsi'   => $data_verif_barang[0]->deskripsi_barang,
			'harga'       => $data_verif_barang[0]->harga_barang,
			'gambar'      => $data_verif_barang[0]->gambar,
			'status'      => 'ada',
			'kategori'    => $data_verif_barang[0]->kategori_barang,
			'penjual'     => $data_verif_barang[0]->id_anggota
		);

		$insert = $this->m_admin->simpanDataBarangVerif('barang', $data_insert); 
		$id_brg = $this->m_admin->getIdBarangAkhir('barang')->result();  
		foreach ($id_brg as $id_key) {
			$id = $id_key->id;
		}
		$url    = base_url('shop/produk/').$id;
                
        if ($insert) {
        	$delete = $this->m_admin->deleteBarangDetail('tmp_barang', $id_tmp);

        	if ($delete) {
				echo "<script>alert('Barang sudah di verifikasi');</script>";
				echo "<script>location='".base_url()."admin';</script>";
        	} else {
        		echo "<script>alert('Gagal menghapus data temporary barang');</script>";
				echo "<script>location='".base_url()."admin/detail/".$id_tmp."';</script>";
        	}


        	
        	foreach ($data_pelanggan as $row) {
				$email = $this->input->post('email');

	        	//kirim email otomatis
				$config = Array(
				  'mailtype'  => 'html',
				  'charset'   => 'iso-8859-1',
				  'protocol'  => 'smtp',
				  'smtp_host' => 'ssl://smtp.gmail.com',
				  'smtp_user' => 'ridosimbolon99@gmail.com',  // Email gmail
				  'smtp_pass' => 'S4y@ngku',  // Password gmail
				  'smtp_port' => 465,
				  'crlf'      => "\r\n",
				  'newline'   => "\r\n"
				);
				
				$this->load->library('email', $config);
				$this->email->from('ridosimbolon99@gmail.com', 'jualin.id');
				$this->email->to($row->email);
				$this->email->subject('Ada barang baru ni jualers :)');
				$this->email->message('Hai jualers, kita ada barang baru nih, yuk cek sekarang
				     di '.$url.'. Terimakasih <3');

				if($this->email->send()) {
				     echo "<sript>alert('Email berhasil dikirim');</script>";
				}
				else {
				     echo "<sript>alert('Email gagal dikirim');</script>";
				     echo '<br />';
				     echo $this->email->print_debugger();
				}
        	}

		} else {
			echo "<script>alert('Gagal memverifikasi barang');</script>";
			echo "<script>location='".base_url()."admin/detail/".$id_tmp."';</script>";
		}
	}

	//fungsi untuk membatalkan barang baru dan menghapus data barang dari temporary database barang
	function batalkan($id_tmp){
		$this->load->database();

		$where = array (
			'id_tmp' => $id_tmp
		);

		$data_tmp_barang = $this->m_admin->getDetailBarangKategori('tmp_barang','kategori',$where)->result();
		for ($i=0; $i < count(json_decode($data_tmp_barang[0]->gambar,true)); $i++) { 
  			$file   = "img/".json_decode($data_tmp_barang[0]->gambar,true)[$i];
			
			if(file_exists($file)){
			    unlink($file);
			} else {
				echo "<script>alert('Gagal menghapus data gambar temporary barang');</script>";
				echo "<script>location='".base_url()."admin/detail/".$id_tmp."';</script>";
			} 
		}

		$delete = $this->m_admin->deleteBarangDetail('tmp_barang', $id_tmp);   
                
    	if ($delete) {
			echo "<script>alert('Barang berhasil di hapus');</script>";
			echo "<script>location='".base_url()."admin/barangBaru';</script>";
    	} else {
    		echo "<script>alert('Gagal menghapus data temporary barang');</script>";
			echo "<script>location='".base_url()."admin/detail/".$id_tmp."';</script>";
    	}
	}



	//upload data barang yang akan dijual oleh anggota
	function jualBarang() {
		$this->load->database();

		$data['gambar'] = array();

        // apakah file sudah di submit
        if($this->input->post('submit') && !empty($_FILES['gambar_barang']['name'])){

        	//ambil data dari form jual barang
			$id_pengguna   = strip_tags($this->input->post('id_pengguna'));
			$nama_brg      = strip_tags($this->input->post('nama_barang'));
			$deskripsi_brg = strip_tags($this->input->post('deskripsi'));
			$harga_brg     = strip_tags($this->input->post('harga_barang'));
			$kategori_brg  = strip_tags($this->input->post('kategori'));
			$alamat        = strip_tags($this->input->post('alamat'));
			$hp            = strip_tags($this->input->post('hp'));

            $jumlah = count($_FILES['gambar_barang']['name']);

            for($i = 0; $i < $jumlah; $i++){
                $_FILES['file']['name']     = $_FILES['gambar_barang']['name'][$i];
                $_FILES['file']['type']     = $_FILES['gambar_barang']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['gambar_barang']['tmp_name'][$i];
                $_FILES['file']['error']    = $_FILES['gambar_barang']['error'][$i];
                $_FILES['file']['size']     = $_FILES['gambar_barang']['size'][$i];
                
                //Konfigurasi file upload
                $uploadPath              = 'img/';
                $config['upload_path']   = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png';
                
                // Load dan inisialisasi librari upload
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload file ke direktori (server)
                if($this->upload->do_upload('file')){
                    // Uploaded file data
                    $fileData                      = $this->upload->data();
                    $uploadData[$i]['file_name']   = $fileData['file_name'];
                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
                }
                $data['gambar'][$i] = $uploadData[$i]['file_name'];
            }
            
            if(!empty($uploadData)){
                // Insert files ke database
            	$data_barang = array (
					'id_anggota'      => $id_pengguna,
					'nama_barang'     => $nama_brg,
					'deskripsi_barang'=> $deskripsi_brg,
					'harga_barang'    => $harga_brg,
					'kategori_barang' => $kategori_brg,
					'alamat'          => $alamat,
					'hp'              => $hp,
					'gambar'          => json_encode($data['gambar'], true)
				);
                
                $insert = $this->m_data->simpanDataBarangAnggota('tmp_barang', $data_barang);   
                
                if ($insert) {
					echo "<script>alert('Barang anda akan segera diproses admin dan ditampilkan di halaman utama');</script>";
					echo "<script>location='".base_url()."';</script>";
				} else {
					echo "<script>alert('Gagal memproses barang anda');</script>";
					echo "<script>location='".base_url()."barang/jual';</script>";
				}            
            }
        }
	}





	/*MENAMPILKAN HALAMAN FEEDBACK*/
	function fp () {
		$this->load->database();

		//konfigurasi pagination
        $config['base_url']    = base_url().'admin/fp'; //site url
        $config['total_rows']  = $this->m_pesan->getJlhFeedback('feedback')->num_rows();
        $config['per_page']    = 15; //show record per halaman
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
          
        $data['feedback']   = $this->m_pesan->getAllFeedback('feedback',$config["per_page"], $data['page'])->result(); 
        $data['pagination'] = $this->pagination->create_links();

		$this->load->view('admin/feedback',$data);
		$this->load->view('admin/footer',$data);
	}

	/*MENAMPILKAN HALAMAN LANGGANAN*/
	function langganan () {
		$this->load->database();

		//konfigurasi pagination
        $config['base_url']    = base_url().'admin/langganan'; //site url
        $config['total_rows']  = $this->m_login->getJlhLangganan('langganan')->num_rows();
        $config['per_page']    = 15; //show record per halaman
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
          
        $data['langganan']  = $this->m_login->getAllLangganan('langganan',$config["per_page"], $data['page'])->result(); 
        $data['pagination'] = $this->pagination->create_links();

		$this->load->view('admin/langganan',$data);
	}

	/*MENAMPILKAN HALAMAN PESAN*/
	function pesan() {
		$this->load->database();

		$data['anggota'] = $this->m_admin->getAllAnggota('anggota')->result();

		$this->load->view('admin/pesan', $data);
		$this->load->view('admin/footer_pesan', $data);
	}

	/*MENGAMBIL CHAT HISTORY*/
	public function getChatHistory(){
        $this->load->database();
        $receiver_id      = $this->input->get('id');
        $admin            = 1998;
        $Logged_sender_id = $this->session->userdata('id');

        $chat             = $this->m_chat->getChat('chat', 'anggota', $receiver_id)->result();  

        foreach ($chat as $msg):

        ?>
        <?php if($msg->id_asal == $receiver_id) { ?>           
            <?php if($msg->id_pengirim == $admin) { ?>     
                  <!-- Message. Default to the left --> 
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"> Admin</span>
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
                        <span class="direct-chat-name pull-right"><?= $msg->nama; ?></span>
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

    /*KIRIM PESAN ADMIN*/
    public function kirimPesan(){
		$post = $this->input->post();
		 
		$data = Array(
			'id_asal'     => $post['receiver_id'],
			'id_pengirim' => $this->session->userdata('id'),
			'id_penerima' => $post['receiver_id'],
			'pesan'       => $post['messageTxt'],
			'msg_date'    => date('Y-m-d H:i:s'),
			'ip_address'  => $this->input->ip_address()
		);
  
		$query    = $this->m_chat->sendChatToAdmin($data); 
		$response = '';

		if($query == true){
			$response = ['status' => 1 ,'message' => '' ];
		}else{
			$response = ['status' => 0 ,'message' => 'sorry we re having some technical problems. please try again !' 						];
		}
             
 		echo json_encode($response);
	}


}