<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('m_data');
		$this->load->model('m_login');
		$this->load->model('m_pesan');
		$this->load->model('m_admin');
					
	}

	/*MENAMPILKAN DASHBOARD ADMIN*/
	public function index(){
		$this->load->database();

		$where = array (
			'status' => 'terjual'
		);

		//ambal data kaytegori barang dari model
		$data['anggota']        = $this->m_data->getAllAnggota('anggota')->num_rows();
		$data['barang']         = $this->m_admin->getAllBarang('barang','kategori')->num_rows();
		$data['barang_terjual'] = $this->m_data->getAllBarangTerjual('barang',$where)->num_rows();
		$data['kategori']       = $this->m_data->getAllKategori('kategori')->result();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/index',$data);
		$this->load->view('admin/footer',$data);
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
                
        if ($insert) {
        	$delete = $this->m_admin->deleteBarangDetail('tmp_barang', $id_tmp);

        	if ($delete) {
				echo "<script>alert('Barang sudah di verifikasi');</script>";
				echo "<script>location='".base_url()."admin';</script>";
        	} else {
        		echo "<script>alert('Gagal menghapus data temporary barang');</script>";
				echo "<script>location='".base_url()."admin/detail/".$id_tmp."';</script>";
        	}

		} else {
			echo "<script>alert('Gagal memverifikasi barang');</script>";
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



}