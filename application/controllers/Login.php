<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_login');
	}


	//FUNGSI UNTUK LOGIN ADMIN
	function admin() {
		$this->load->view('admin/login.php');
	}

	function login_aksi() {
		$this->load->database();
		$usr = $this->input->post('username');
		$psw = md5($this->input->post('password'));

		$username = strip_tags($usr);
		$password = strip_tags($psw);

		$where    = array(
			'username'    => $username,
			'password'    => $password
		);

		$cek   = $this->m_login->cek_login("admin",$where)->num_rows();
		$data  = $this->m_login->cek_login("admin",$where)->result();

		if($cek > 0){
			$data_session = array(
				'id'       => $data[0]->id,
				'nama'     => $data[0]->nama,
				'username' => $username,
				'status'   => "login-admin"
			);

			$this->session->set_userdata($data_session);
			echo "<script>location='".base_url()."admin';</script>";
		} else{
			echo "<script>alert('Username dan Password anda salah');</script>";
			echo "<script>location='".base_url()."login/admin';</script>";
		}
	}

	//FUNGSI UNTUK LOGIN ANGGOTA
	public function index() {
		$this->load->database();
		$usr = $this->input->post('username');
		$psw = md5($this->input->post('password'));

		$username = strip_tags($usr);
		$password = strip_tags($psw);

		$where    = array(
			'username'    => $username,
			'password'    => $password
		);

		$cek   = $this->m_login->cek_login("anggota",$where)->num_rows();
		$data  = $this->m_login->cek_login("anggota",$where)->result();

		if($cek > 0){
			$data_session = array(
				'id'       => $data[0]->id,
				'nama'     => $data[0]->nama,
				'username' => $username,
				'status'   => "login",
				'alamat'   => $data[0]->alamat,
				'hp'       => $data[0]->hp
			);

			$this->session->set_userdata($data_session);
			echo "<script>history.go(-1);</script>";
		} else{
			echo "<script>alert('Username dan Password anda salah');</script>";
			echo "<script>location='".base_url()."';</script>";
		}
	}

	//FUNGSI UNTUK DAFTAR ANGGOTA
	function daftar() {
		$this->load->database();

		//ambil data dari modal daftar akun
		$nm        = $this->input->post('nama');
		$usr       = $this->input->post('username');
		$psw       = md5($this->input->post('password'));
		$konf_pass = md5($this->input->post('konfirmasi_password'));
		$almt      = $this->input->post('alamat');
		$no_hp     = $this->input->post('no_hp');

		//cek apakah password sama dengan konfirmasi password
		if ($psw == $konf_pass) {
			//menghilangkan adanya script injection dengan menghilangkan tag html
			$nama     = strip_tags($nm);
			$username = strip_tags($usr);
			$password = strip_tags($psw);
			$konf_psw = strip_tags($konf_pass);
			$alamat   = strip_tags($almt);
			$noHP     = strip_tags($no_hp);

			$data     = array(
				'nama'     => $nama,
				'username' => $username,
				'password' => $password,
				'alamat'   => $alamat,
				'hp'       => $noHP
			);

			$insert  = $this->m_login->daftarAkun("anggota",$data);

			if($insert){
				echo "<script>alert('Akun anda berhasil didaftarkan');</script>";
				echo "<script>history.go(-1); </script>";
			} else{
				echo "<script>alert('Gagal mendaftarkan akun');</script>";
				echo "<script>location='".base_url()."';</script>";
			}
		} else {
			echo "<script>alert('Maaf! Password dan Konfirmasi Password anda tidak sama, Silahkan mendaftarkan akun kembali');</script>";
			echo "<script>location='".base_url()."shop'; </script>";
		}
		
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}


}