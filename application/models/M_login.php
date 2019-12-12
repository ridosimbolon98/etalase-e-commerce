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
		$sql = "SELECT id, nama, username, alamat, hp FROM $table WHERE $table.id = $id ";
		return $this->db->query($sql);
	}

	function get_akun($table,$table2,$id){
		$sql = "SELECT `$table`.`nama_instansi` FROM `$table` JOIN `$table2` WHERE `$table`.`idkelurahan`=`$table2`.`id_kel` AND `$table`.`id`=$id ";
		return $this->db->query($sql);
	}

	function cek_nama($password, $username){
		$sql = "SELECT nama_instansi FROM akun WHERE username = '$username' AND password = '$password' ";
		return $this->db->query($sql);
	}

	function cek_pass($table, $where){
		return $this->db->get_where($table,$where);
	}

	function ubah_pass($table, $id, $kategori, $level, $password, $pl){
		$sql = "UPDATE $table SET password='$password' WHERE password='$pl' AND kategori='$kategori' AND level='$level' AND id='$id' ";
		return $this->db->query($sql);
	}

	function tambah_akun($table,$data){
		return $this->db->insert($table,$data);
	}

	function ubah_akun($table,$nama,$username,$level,$kategori,$id){
		$update = "UPDATE $table SET nama='$nama', username='$username', level='$level', kategori='$kategori' WHERE id='$id' ";
		return $this->db->query($update);
	}

	function hapus_akun($table,$id){
		$delete = "DELETE FROM $table WHERE id='$id' ";
		return $this->db->query($delete);
	}



	/* FUNGSI UNTUK BERLANGGANAN */
	function langganan($table, $email){
		return $this->db->insert($table,$email);
	}

	//mengambil data langganan
	function getAllLangganan($table){
		return $this->db->get($table);
	}

}