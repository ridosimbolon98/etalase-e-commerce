<?php

class M_login extends CI_Model{
	public function __construct()
    {
        parent::__construct();
    }
  	
  	//query untuk cek akun sewaktu login 
	function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}

	//query untuk cek email akun 
	function cekEmail($table,$where){
		return $this->db->get_where($table,$where);
	}

	//cek password lama= password input anggota
	function cekPassword($table,$id_anggota,$pass_lama){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('id', $id_anggota);
		$this->db->where('password', $pass_lama);
		return $this->db->get();
	}

	//update password anggota
	function updatePass($table,$id_anggota,$data){
		$this->db->where('id', $id_anggota);
		return $this->db->update($table, $data);
	}

	//reset password anggota
	function resetPass($table,$email,$data){
		$this->db->where('email', $email);
		return $this->db->update($table, $data);
	}

	//query daftar akun
	function daftarAkun($table,$data){
		return $this->db->insert($table,$data);
	}

	//edit akun anggota
	function editAkun($table,$data,$id){
		$this->db->where('id',$id);
		return $this->db->update($table,$data);
	}

	function getDataAnggota($table,$id){
		$sql = "SELECT * FROM $table WHERE $table.id = $id ";
		return $this->db->query($sql);
	}

	/* FUNGSI UNTUK BERLANGGANAN */
	function langganan($table, $email){
		return $this->db->insert($table,$email);
	}

	//mengambil data langganan
	function getAllLangganan($table,$start,$limit){
		return $this->db->get($table,$start,$limit);
	}

	//mengambil data jlh langganan
	function getJlhLangganan($table){
		return $this->db->get($table);
	}

}