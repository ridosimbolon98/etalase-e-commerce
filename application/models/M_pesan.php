<?php

class M_pesan extends CI_Model{
	public function __construct()
    {
        parent::__construct();
    }

    //mengirim data feedback ke database
	function send_feedback($table, $data){
		return $this->db->insert($table,$data);
	}

	//mengambil data feedback
	function getAllfeedback($table){
		return $this->db->get($table);
	}






}
