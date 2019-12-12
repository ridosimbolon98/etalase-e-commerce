<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	function __construct(){
		parent::__construct();

		if ($this->session->userdata('status') != "login") {
			echo "<script>alert('Silahkan login terlebih dahulu!');</script>";
			echo "<script>location='".base_url()."';</script>";
		} else {
			$this->load->helper('url');
			$this->load->model('m_data');
			$this->load->model('m_login');
		}	
					
	}

	/*FUNGSI UNTUK TAMPIL PROFIL ANGGOTA */
	public function index() {
		$this->load->database();
		$id_anggota = $this->session->userdata('id');

		$data['anggota'] = $this->m_login->getDataAnggota('anggota',$id_anggota)->result();
		
		$this->load->view('v_profil.php', $data);
	}
	/*AKHIR FUNGSI UNTUK TAMPIL PROFIL ANGGOTA */

	//FUNGSI UNTUK EDIT PROFIL ANGGOTA
	function edit() {
		$this->load->database();
		$id_anggota = $this->session->userdata('id');

		//ambil data dari modal daftar akun
		$nm        = $this->input->post('nama');
		$usr       = $this->input->post('email');
		$almt      = $this->input->post('alamat');
		$no_hp     = $this->input->post('hp');

		//menghilangkan adanya script injection dengan menghilangkan tag html
		$nama     = strip_tags($nm);
		$username = strip_tags($usr);
		$alamat   = strip_tags($almt);
		$noHP     = strip_tags($no_hp);

		$data     = array(
			'nama'     => $nama,
			'username' => $username,
			'alamat'   => $alamat,
			'hp'       => $noHP
		);

		$update  = $this->m_login->editAkun("anggota",$data,$id_anggota);

		if($update){
			echo "<script>alert('Data profil anda berhasil diperbaharui');</script>";
			echo "<script>location='".base_url('profil')."';</script>";
		} else{
			echo "<script>alert('Gagal memperbaharui profil!');</script>";
			echo "<script>location='".base_url()."';</script>";
		}
	}

	//FUNGSI UNTUK MENGUBAH PASSWORD AKUN ANGGOTA
	function up() {
		$this->load->database();
		$id_anggota = $this->session->userdata('id');

		//ambil data password anggota dari modal
		$pass_lama = strip_tags(md5($this->input->post('password_lama')));
		$pass_baru = strip_tags(md5($this->input->post('password_baru')));
		$kpas_baru = strip_tags(md5($this->input->post('konfirmasi_password')));

		//ambil password lama dari tabel database
		$cekPass = $this->m_login->cekPassword('anggota',$id_anggota,$pass_lama)->num_rows();

		//cek apakah pass tabel == pass input?
		if ($cekPass > 0) {
			$data = array ('password' => $pass_baru);
			$updatePass = $this->m_login->updatePass('anggota',$id_anggota,$data);

			if ($updatePass) {
				echo "<script>alert('Password lama anda berhasil diperbaharui');</script>";
				echo "<script>location='".base_url('profil')."';</script>";
			} else {
				echo "<script>alert('Gagal memperbaharui password lama anda!');</script>";
				echo "<script>location='".base_url('profil')."';</script>";
			}
			
		} else {
			echo "<script>alert('Password yang anda input tidak sama dengan password lama anda!');</script>";
			echo "<script>location='".base_url('profil')."';</script>";
		}
		

	}

	



}