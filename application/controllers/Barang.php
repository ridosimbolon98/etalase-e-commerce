<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
	function __construct(){
		parent::__construct();

		if ($this->session->userdata('status') != "login") {
			echo "<script>location='".base_url()."page';</script>";
		} else {
			$this->load->helper('url');
			$this->load->model('m_data');
			$this->load->model('m_login');
		}	
					
	}

	/*UBAH PASSWORD AKUN*/
	function jual(){
		$this->load->database();

		//ambal data kaytegori barang dari model
		$data['kategori']      = $this->m_data->getAllKategori('kategori')->result();

		$this->load->view('shop/v_jualBarang',$data);
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
					'gambar'          => json_encode($data['gambar'])
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


	//menampilkan detail barang yang dijual anggota
	function detail($idBarang) {
		$this->load->database();

		$id_anggota = $this->session->userdata('id');
		$where = Array('id' => $idBarang);

		$data['kategori'] = $this->m_data->getAllKategori('kategori')->result();
		$data['anggota']  = $this->m_login->getDataAnggota('anggota',$id_anggota)->result();
		$data['detail']   = $this->m_data->getDetail('barang','kategori', $where)->result();

		$this->load->view('v_detail', $data);
	}


	//ubah status barang
	function status($idBarang) {
		$id_anggota = $this->session->userdata('id');

		//ambil data status dari post form
		$status = $this->input->post('status');

		$statData = array ('status' => $status);
		$where = Array('id' => $idBarang);

		$update = $this->m_data->updateStatus('barang', $statData, $where);

		if ($update) {
			echo "<script>alert('Status barang berhasil diperbaharui');</script>";
			echo "<script>location='".base_url('barang/detail/').$idBarang."';</script>";
		} else {
			echo "<script>alert('Status barang gagal diperbaharui');</script>";
			echo "<script>location='".base_url('barang/detail/').$idBarang."';</script>";
		}
		
   
		$data['kategori'] = $this->m_data->getAllKategori('kategori')->result();
		$data['anggota']  = $this->m_login->getDataAnggota('anggota',$id_anggota)->result();
		$data['detail']   = $this->m_data->getDetail('barang','kategori', $where)->result();

		$this->load->view('v_detail', $data);
	}



}