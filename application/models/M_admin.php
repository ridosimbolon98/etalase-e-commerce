<?php

class M_admin extends CI_Model{
	public function __construct()
    {
        parent::__construct();
    }

    //ambil data semua barang dari database dengan paginasi
	function getAllBarang($table, $table2){
		$sql = "SELECT * FROM `$table` JOIN `$table2` WHERE `$table`.`kategori`=`$table2`.`id_kat` ";
		return $this->db->query($sql);
	}

	//ambil id barang terakhir
	function getIdBarangAkhir($table){
		$sql = "SELECT id FROM `$table` ORDER BY id DESC limit 1 ";
		return $this->db->query($sql);
	}


	//ambil data semua barang baru dari database
	function getAllBarangBaru($table,$table2){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join($table2, $table.'.id_anggota='.$table2.'.id');
		return $this->db->get();
	}

	//ambil data detail barang baru dari database
	function getDetailBarangBaru($table,$table2,$where){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join($table2, $table.'.id_anggota='.$table2.'.id');
		$this->db->where($where);
		return $this->db->get();
	}

	//ambil data detail dan kategori barang baru dari database
	function getDetailBarangKategori($table,$table2,$where){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join($table2, $table.'.kategori_barang='.$table2.'.id_kat');
		$this->db->where($where);
		return $this->db->get();
	}	

	//ambil data detail barang baru dan anggota dari database
	function getDetailBarangAnggota($table,$table2,$where){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join($table2, $table.'.id_anggota='.$table2.'.id');
		$this->db->where($where);
		return $this->db->get();
	}	

	//simpan data barang baru yang sudah diverifikasi ke tabel barang di database
	function simpanDataBarangVerif($table,$data){
		return $this->db->insert($table,$data);
	}

	//hapus data barang baru yang sudah diverifikasi dari tabel tmp_barang di database
	function deleteBarangDetail($table,$id_tmp){
		$this->db->where('id_tmp',$id_tmp);
		return $this->db->delete($table);
	}






}