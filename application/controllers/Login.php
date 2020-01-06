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



	//FUNGSI UNTUK GANTI EMAIL
	public function getToken() {
		$this->load->database();

		$email = strip_tags($this->input->post('email'));

		$where = array('username' => $email);

		$getEmail = $this->m_login->cekEmail('anggota', $where)->row_array();
		if ($getEmail) {
			//kirim token email otomatis

			//buat token random
			$tkn = base64_encode(random_bytes(32));
			$user_token = [
				'email'        =>$email,
				'token'        =>$tkn,
				'date_created' => time()
			];

			$this->db->insert('token', $user_token);

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
			$this->email->to($email);
			$this->email->subject('Reset Password Akun Jualin.id');
			$this->email->message('Silahkan klik link berikut ini untuk mendapatkan password akun anda : <a href="' . base_url(). 'login/resetPassword?email='. $email .'&token='. urlencode($tkn). '">Reset Password</a>');

			if($this->email->send()) {
			     echo "<sript>alert('Cek email anda untuk mereset password baru anda!');</script>";
			     echo "<script>location='".base_url()."'; </script>";
			}
			else {
			     echo "<sript>alert('Email gagal dikirim');</script>";
			     echo '<br />';
			     echo $this->email->print_debugger();
			}
		} else {
			echo "<script>alert('Maaf! email anda belum terdaftar di database, Silahkan mendaftarkan akun anda dengan email ini');</script>";
			echo "<script>location='".base_url()."'; </script>";
		}
		

	}

	public function resetPassword() {
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user  = $this->db->get_where('anggota', ['username' => $email])->row_array();
		if ($user) {
			//cek token apakah ada di tabel token ?
			$user_token = $this->db->get_where('token', ['token' => $token])->row_array();
			if ($user_token) {
				//redirect ke halaman reset password
				$this->session->set_userdata('reset_email', $email);
				$this->ubahPass();
			} else {
				echo "<script>alert('Maaf! token tidak ada di database,reset password gagal');</script>";
				echo "<script>location='".base_url()."'; </script>";
			}
			
		} else {
			echo "<script>alert('Maaf! email anda belum terdaftar di database,reset password gagal');</script>";
			echo "<script>location='".base_url()."'; </script>";
		}
		
	}


	public function ubahPass() {
		if (!$this->session->userdata('reset_email')) {
			echo "<script>location='".base_url()."'; </script>";
		} else {
			$this->load->view('ubah_password');
		}
		
	}

	public function resetPass() {
		if (!$this->session->userdata('reset_email')) {
			echo "<script>location='".base_url()."'; </script>";
		} else {
			$this->load->database();
			$email = $this->session->userdata('reset_email');

			$pass_baru = strip_tags($this->input->post('password'));
			$konf_pass = strip_tags($this->input->post('konfirmasi_password'));

			$data = array ('password' => md5($pass_baru));
			$updatePass = $this->m_login->resetPass('anggota', $email, $data);

			if ($updatePass) {
				$this->session->unset_userdata('reset_email');

				echo "<script>alert('Password lama anda berhasil diperbaharui');</script>";
				echo "<script>location='".base_url('')."';</script>";
			} else {
				echo "<script>alert('Gagal memperbaharui password lama anda!');</script>";
				echo "<script>location='".base_url('')."';</script>";
			}
		}		

	}




}