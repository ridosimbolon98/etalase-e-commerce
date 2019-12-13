<?php

class M_chat extends CI_Model{
	public function __construct()
    {
        parent::__construct();
    }

    private $Table = 'chat';
    private $User = 'anggota';

    //ambil data semua chat per $id_penerima
	function getAllChat($table, $table2, $id_anggota){
		$sql = "SELECT * FROM `$table` JOIN `$table2` ON `$table`.`id_asal`=`$table2`.`id` WHERE `$table`.`id_asal`='$id_anggota' ";
		return $this->db->query($sql);
	}

	//ambil data semua chat per $id_penerima
	function getChat($table, $table2, $id_penerima){
		$sql = "SELECT * FROM `$table` JOIN `$table2` ON `$table`.`id_asal`=`$table2`.`id` WHERE `$table`.`id_penerima`='$id_penerima' OR `$table`.`id_pengirim`='$id_penerima' ";
		return $this->db->query($sql);
	}

	//ambil data nama pengirim
	function getPengirim($table, $table2, $id_barang, $id_anggota){
		$sql = "SELECT `nama` FROM `$table` JOIN `$table2` ON `$table`.`id_asal`=`$table2`.`id` WHERE `$table`.`id_barang`='$id_barang' ";
		return $this->db->query($sql);
	}


	//kirim pesand ari anggota ke admin
	function sendChatToAdmin($dataInsert) {
		return $this->db->insert('chat',$dataInsert);
	}	





}