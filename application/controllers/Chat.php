<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {
	function __construct(){
		parent::__construct();

		if ($this->session->userdata('status') != "login") {
			echo "<script>location='".base_url()."';</script>";
		} else {
			$this->load->helper('url');
			$this->load->model('m_data');
			$this->load->model('m_login');
			$this->load->model('m_chat');
			$this->load->model('m_pesan');
		}	
					
	}



	/*Mengirim chat ke admin oleh anggota saat session logged*/
	public function index(){
		$this->load->database();

		$idBarang = strip_tags($this->input->post('idBarang'));
		$pesan    = strip_tags($this->input->post('pesan'));
		$pengirim = $this->session->userdata('id');
		$penerima = 1998;
		$msgDate  = date('Y-m-d H:i:s');
		$ip       = $this->input->ip_address();

		$dataInsert = Array(
			'id_barang'   => $idBarang,
			'id_asal'     => $pengirim,
			'id_pengirim' => $pengirim,
			'id_penerima' => $penerima,
			'pesan'       => $pesan,
			'msg_date'    => $msgDate,
			'ip_address'  => $ip
		);

		$insert = $this->m_chat->sendChatToAdmin($dataInsert);

		if ($insert) {
			echo "<script>alert('chat anda berhasil di kirim');</script>";
			echo "<script>location='".base_url()."shop/produk/".$idBarang."';</script>";
    	} else {
    		echo "<script>alert('Gagal insert chat');</script>";
			echo "<script>location='".base_url()."shop/produk/".$idBarang."';</script>";
    	}
	}

	public function kirimPesan(){
		$post = $this->input->post();
		 
		$data = Array(
			'id_barang'   => $post['id_barang'],
			'id_asal'     => $this->session->userdata('id'),
			'id_pengirim' => $this->session->userdata('id'),
			'id_penerima' => 1998,
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