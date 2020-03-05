<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_login');
		$this->load->library('form_validation');
	}

	//FUNGSI VIEW DAFTAR AKUN BARU ANGGOTA
	public function da() {
		$data['title'] = 'Daftar Akun Anggota';
		$this->load->view('auth/daftar', $data);
	}

	//FUNGSI AKSI DAFTAR AKUN BARU ANGGOTA
	public function daftar()
	{
		//aturan validasi
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required' => '*Nama harus diisi!'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[anggota.email]', [
			'required' => '*Email harus diisi!',
			'valid_email' => '*Email harus valid!',
			'is_unique' => '*Email ini sudah pernah didaftarkan!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
			'required' => '*Password harus diisi!',
			'matches' => '*Password tidak sama!',
			'min_length' => '*Password min 8 karakter!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[8]|matches[password1]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[4]', [
			'required' => '*Alamat harus diisi!',
			'min_length' => '*Alamat minimal 4 karakter!'
		]);
		$this->form_validation->set_rules('hp', 'Hp', 'required|trim|min_length[12]', [
			'required'   => '*No HP harus diisi!',
			'min_length' => '*No HP minimal 12 angka!'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Daftar Akun Anggota';
			$this->load->view('auth/daftar', $data);
		} else {
			$data = [
				'nama'     => $this->input->post('nama'),
				'email'    => $this->input->post('email'),
				'password' => md5($this->input->post('password1')),
				'alamat'   => $this->input->post('alamat'),
				'hp'       => $this->input->post('hp')
 			];
			
			$insert  = $this->m_login->daftarAkun("anggota",$data);

			if($insert){
				$this->session->set_flashdata('msg_daftar', '<div class="alert alert-success" role="alert">Selamat, akun anda berhasil difartarkan. Silahkan login.</div>');
				redirect('login');
			} else{
				$this->session->set_flashdata('msg_gagal_daftar', '<div class="alert alert-danger" role="alert">Gagal mendaftarkan akun. Pastikan data diisi dengan benar!</div>');
				redirect('login/da');
			}
		}
	}

	//FUNGSI UNTUK LOGIN ANGGOTA
	public function index() {
		$data['title'] = 'Login Anggota Jualin.id';

		$this->load->view('auth/login', $data);
	}
	
	//FUNGSI UNTUK LOGIN AKSI ANGGOTA
	public function login() {
		//Validasi Email password
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
			'required'    => '*Email harus diisi!',
			'valid_email' => '*Email harus valid!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required'    => '*Password harus diisi!'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Anggota Jualin.id';
			$this->load->view('auth/login', $data);
		} else {
			$email    = strip_tags($this->input->post('email'));
			$password = md5(strip_tags($this->input->post('password')));

			$where    = array(
				'email'    => $email,
				'password' => $password
			);

			$cek   = $this->m_login->cek_login("anggota",$where)->num_rows();
			$data  = $this->m_login->cek_login("anggota",$where)->result();

			if($cek > 0){
				$data_session = array(
					'id'       => $data[0]->id,
					'nama'     => $data[0]->nama,
					'email'    => $email,
					'status'   => "login",
					'alamat'   => $data[0]->alamat,
					'hp'       => $data[0]->hp
				);

				$this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
					  Selamat datang pengguna jualin.id	</div>');
				$this->session->set_userdata($data_session);
				redirect(base_url());
			} else{
				echo "<script>alert('Email atau Password anda salah, silahkan login kembali!');</script>";
				echo "<script>location='".base_url('login')."';</script>";
			}
		}
	}

	//FUNGSI UNTUK LOGIN ADMIN
	function admin() {
		$this->load->view('admin/login.php');
	}

	function login_aksi() {
		//Validasi Email password
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
			'required'    => '*Email harus diisi!',
			'valid_email' => '*Email harus valid!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required'    => '*Password harus diisi!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/login.php');
		} else {
			$this->load->database();
			$eml = $this->input->post('email');
			$psw = md5($this->input->post('password'));

			$email    = strip_tags($eml);
			$password = strip_tags($psw);

			$where    = array(
				'email'    => $email,
				'password' => $password
			);

			$cek   = $this->m_login->cek_login("admin",$where)->num_rows();
			$data  = $this->m_login->cek_login("admin",$where)->result();

			if($cek > 0){
				$data_session = array(
					'id'       => $data[0]->id,
					'username' => $data[0]->username,
					'email'    => $email,
					'status'   => "login-admin"
				);

				$this->session->set_userdata($data_session);
				echo "<script>location='".base_url()."admin';</script>";
			} else{
				echo "<script>alert('Email atau Password anda salah');</script>";
				echo "<script>location='".base_url()."login/admin';</script>";
			}
		}
	}

	//FUNGSI LOGOUT
	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

	//FUNGSI UNTUK GANTI EMAIL
	public function getToken() {
		$this->load->database();

		$email = trim(strip_tags($this->input->post('email')));
		$where = array('email' => $email);
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
			$config = [
			  'mailtype'  => 'html',
			  'charset'   => 'utf-8',
			  'protocol'  => 'smtp',
			  'smtp_host' => 'smtp.gmail.com',
			  'smtp_user' => 'datamelek@gmail.com',  // Email gmail
			  'smtp_pass' => 'S4y@ngku',  // Password gmail
			  'smtp_port' => 465,
			  'smtp_crypto' => 'ssl',
			  'crlf'      => "\r\n",
			  'newline'   => "\r\n"
			];
			
			$this->load->library('email', $config);
			$this->email->from('datamelek@gmail.com', 'jualin.id');
			$this->email->to($email);
			$this->email->subject('Reset Password Akun Jualin.id');
			$this->email->message('Silahkan klik link berikut ini untuk mendapatkan password akun anda : <a href="' . base_url(). 'login/resetPassword?email='. $email .'&token='. urlencode($tkn). '">Reset Password</a>');

			if($this->email->send()) {
			     echo "<script>alert('Silahkan cek email anda untuk mereset password baru!');</script>";
			     echo "<script>location='".base_url('login')."'; </script>";
			}
			else {
			     echo "<sript>alert('Email gagal dikirim');</script>";
			     echo '<br />';
			     echo $this->email->print_debugger();
			}
		} else {
			echo "<script>alert('Maaf! email anda belum terdaftar di akun manapun!, Silahkan mendaftarkan akun anda dengan email ini');</script>";
			echo "<script>location='".base_url('login')."'; </script>";
		}
	}

	public function resetPassword() {
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user  = $this->db->get_where('anggota', ['email' => $email])->row_array();
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
			echo "<script>alert('Maaf! email anda belum terdaftar di akun manapun! Reset password gagal');</script>";
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