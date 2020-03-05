<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_data');
		$this->load->model('m_login');
		$this->load->model('m_pesan');
		$this->load->library('pagination');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->database();

		//ambali data barang dari model
		$data['kategori']      = $this->m_data->getAllKategori('kategori')->result();
		$data['barang']        = $this->m_data->tampilBarang('barang','kategori')->result();
		$data['barangTerbaru'] = $this->m_data->getAllBarangTerbaru('barang','kategori')->result();
		$data['feedback']      = $this->m_pesan->getFeedback('feedback')->result();

		$this->load->view('v_header', $data);
		$this->load->view('v_home', $data);
		$this->load->view('v_footer', $data);
	}

	//informasi kontak controller
	public function kontak()
	{
		$this->load->database();
		//ambali data barang dan kategori barang dari model
		$data['kategori']      = $this->m_data->getAllKategori('kategori')->result();
		$data['barang']        = $this->m_data->getSemuaBarang('barang','kategori')->result();
		$data['barangTerbaru'] = $this->m_data->getAllBarangTerbaru('barang','kategori')->result();

		$this->load->view('v_kontak', $data);
	}

	//KIRIM PESAN DARI ANGGOTA DARI HALAMAN KONTAK
	public function feedback(){
		$this->load->database();

		//aturan validasi
		$this->form_validation->set_rules('nama_pengirim', 'Nama', 'required|trim', [
			'required' => '*Nama pengirim harus diisi!'
		]);
		$this->form_validation->set_rules('email_pengirim', 'Email', 'required|trim|valid_email', [
			'required' => '*Email pengirim harus diisi!',
			'valid_email' => '*Email pengirim harus valid!'
		]);
		$this->form_validation->set_rules('no_hp_pengirim', 'Hp', 'required|trim|min_length[12]', [
			'required' => '*No HP pengirim harus diisi!',
			'min_length' => '*No HP pengirim min 12 karakter!'
		]);
		$this->form_validation->set_rules('pesan', 'Pesan', 'required|trim', [
			'required' => '*Pesan pengirim harus diisi!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->database();
			//ambali data barang dan kategori barang dari model
			$data['kategori']      = $this->m_data->getAllKategori('kategori')->result();
			$data['barang']        = $this->m_data->getSemuaBarang('barang','kategori')->result();
			$data['barangTerbaru'] = $this->m_data->getAllBarangTerbaru('barang','kategori')->result();

			$this->load->view('v_kontak', $data);
		} else {
			$nama_pengirim  = htmlspecialchars($this->input->post('nama_pengirim'));
			$email_pengirim = htmlspecialchars($this->input->post('email_pengirim'));
			$no_hp_pengirim = htmlspecialchars($this->input->post('no_hp_pengirim'));
			$pesan          = htmlspecialchars($this->input->post('pesan'));

			$data = array (
				'nama_pengirim'  => strip_tags($nama_pengirim),
				'email_pengirim' => strip_tags($email_pengirim),
				'no_hp_pengirim' => strip_tags($no_hp_pengirim),
				'pesan' 		 => strip_tags($pesan)
			);

			$insert = $this->m_pesan->send_feedback('feedback', $data);

			if ($insert) {
				echo "<script>alert('Terimakasih atas feedback anda.');</script>";
				echo "<script>location='".base_url('welcome/kontak')."'; </script>";
			} else{
				echo "<script>alert('Gagal mengirim feedback');</script>";
				echo "<script>location='".base_url('welcome/kontak')."';</script>";
			}
		}
	}

	//submit email langganan ke database
	public function langganan()
	{
		$this->load->database();
		$langganan = $this->input->post('email');

		//insert data email pelanggan
		$email     = array(
			'email'     => $langganan
		);

		$insert  = $this->m_login->langganan("langganan",$email);

		if($insert){
			echo "<script>alert('Terimakasih sudah berlangganan di Jualin.id. Anda akan menerima setiap informasi terbaru dari kami lewat email');</script>";
			echo "<script>location='".base_url()."'; </script>";
		} else{
			echo "<script>alert('Gagal berlangganan');</script>";
			echo "<script>location='".base_url()."';</script>";
		}


		//ambali data barang dan kategori barang dari model
		$data['kategori']      = $this->m_data->getAllKategori('kategori')->result();
		$data['barang']        = $this->m_data->getAllBarang('barang','kategori')->result();
		$data['barangTerbaru'] = $this->m_data->getAllBarangTerbaru('barang','kategori')->result();

		$this->load->view('v_kontak', $data);
	}
}
