<?php

class M_data extends CI_Model{
	public function __construct()
    {
        parent::__construct();
    }

    //ambil data semua barang dari database tanpa paginasi
	function tampilBarang($table, $table2){
		$sql = "SELECT * FROM `$table` JOIN `$table2` WHERE `$table`.`kategori`=`$table2`.`id_kat` ";
		return $this->db->query($sql);
	}
    
    //ambil data semua barang dari database dengan paginasi
	function getAllBarang($table, $table2, $limit, $start){
		$sql = "SELECT * FROM `$table` JOIN `$table2` WHERE `$table`.`kategori`=`$table2`.`id_kat` LIMIT $start, $limit";
		return $this->db->query($sql);
	}

	//ambil data semua barang dari database berdasarkan id penjual
	function getBarangAnggota($table, $table2, $id_penjual){
		$sql = "SELECT * FROM `$table` JOIN `$table2` ON `$table`.`kategori`=`$table2`.`id_kat` WHERE `$table`.`penjual`='$id_penjual' ";
		return $this->db->query($sql);
	}

	function getSemuaBarang($table, $table2){
		$sql = "SELECT * FROM `$table` JOIN `$table2` WHERE `$table`.`kategori`=`$table2`.`id_kat` ";
		return $this->db->query($sql);
	}

	//ambil data barang terbaru dari database
	function getAllBarangTerbaru($table, $table2){
		$sql = "SELECT * FROM `$table` JOIN `$table2` WHERE `$table`.`kategori`=`$table2`.`id_kat` ORDER BY `$table`.`id` DESC LIMIT 6 ";
		return $this->db->query($sql);
	}

	//ambil data kategori barang dari database
	function getAllKategori($table){
		return $this->db->get($table);
	}

	//ambil jumlah barang dari database
	function getJlhBarang($table){
		$sql = "SELECT nama_barang FROM `$table` ";
		return $this->db->query($sql);
	}

	//ambil detail barang dari database berdasarkan id_barang
	function getProduk($table,$table2,$id_barang){
		$sql = "SELECT * FROM `$table` JOIN `$table2` WHERE `$table`.`kategori`=`$table2`.`id_kat` AND `$table`.`id` = '$id_barang' ";
		return $this->db->query($sql);
	}

	//menyimpan data barang anggota ke database tmp_barang
	function simpanDataBarangAnggota($table,$data){
		return $this->db->insert($table,$data);
	}


	/*FUNGSI UNTUK HALAMAN ADMIN*/
	//ambil data semua anggota dari database
	function getAllAnggota($table){
		return $this->db->get($table);
	}

	//ambil data semua barang terjual dari database
	function getAllBarangTerjual($table,$where){
		return $this->db->get_where($table,$where);
	}


	/*FUNGSI UNTUK MENGAMBIL DATA BARANG DENGAN FILTER CARI*/
	//ambil jumlah barang dari database dengan filter cari
	function getJlhCariBarang($table, $table2, $cari){
		$sql = "SELECT * FROM `$table` JOIN `$table2` ON `$table`.`kategori`=`$table2`.`id_kat` WHERE (`$table`.`nama_barang` LIKE '%$cari%' OR `$table`.`deskripsi` LIKE '%$cari%')";
		return $this->db->query($sql);
	}

	//ambil data barang dengan filter cari
	function getCariBarang($table, $table2, $cari, $limit, $start){
		$sql = "SELECT * FROM `$table` JOIN `$table2` ON `$table`.`kategori`=`$table2`.`id_kat` WHERE (`$table`.`nama_barang` LIKE '%$cari%' OR `$table`.`deskripsi` LIKE '%$cari%') LIMIT $start, $limit";
		return $this->db->query($sql);
	}

	//ambil jumlah barang dari database dengan filter cari berdasarkan kategori
	function getJlhCariBarangKat($table, $table2, $cari, $kategori){
		$sql = "SELECT * FROM `$table` JOIN `$table2` ON `$table`.`kategori`=`$table2`.`id_kat` WHERE `$table2`.`nama_kategori`='$kategori' AND (`$table`.`nama_barang` LIKE '%$cari%' OR `$table`.`deskripsi` LIKE '%$cari%')";
		return $this->db->query($sql);
	}

	//ambil data barang dengan filter cari berdasarkan kategori
	function getCariBarangKat($table, $table2, $cari, $kategori, $limit, $start){
		$sql = "SELECT * FROM `$table` JOIN `$table2` ON `$table`.`kategori`=`$table2`.`id_kat` WHERE `$table2`.`nama_kategori`='$kategori' AND (`$table`.`nama_barang` LIKE '%$cari%' OR `$table`.`deskripsi` LIKE '%$cari%') LIMIT $start, $limit";
		return $this->db->query($sql);
	}



	/*FUNGSI QUERY UNTUK MENGAMBIL DATA BARANG BERDASARKAN KATEGORI */
	//mengambil jumlah barang berdasarkan kategori
	function getJlhBarangKategori($table,$table2,$kategori){
		$sql = "SELECT * FROM `$table` JOIN `$table2` ON `$table`.`kategori`=`$table2`.`id_kat` WHERE `$table2`.`nama_kategori`='$kategori' ";
		return $this->db->query($sql);
	}

	//mengambil data barang berdasarkan kategori
	function getAllBarangKategori($table,$table2,$kategori,$limit,$start){
		$sql = "SELECT * FROM `$table` JOIN `$table2` ON `$table`.`kategori`=`$table2`.`id_kat` WHERE `$table2`.`nama_kategori`='$kategori' LIMIT $start, $limit";
		return $this->db->query($sql);
	}





}