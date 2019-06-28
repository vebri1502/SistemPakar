<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_fuzzy extends CI_Model {

	private $table  = 'faktor';
	private $table2 = 'parameter';
	private $table3 = 'risiko';

	public function __construct(){
		parent::__construct();
	}

	public function hitung_fuzzy_daratan(){
		$sql = "SELECT batas_bawah FROM parameter WHERE id_parameter = 1";
		$result = 0;

		foreach($sql->result() as $row) {
		        //$output += $row->harga;
		}

		return $result;
	}

	public function hitung_fuzzy_daerahTinggi(){
		$sql = "SELECT (jenis_faktor) FROM 'faktor' WHERE (id_faktor) = 2";
		return $this->db->query($sql)
						->result_array();
	}

	public function hitung_fuzzy_cHujan(){
		$sql = "SELECT (jenis_faktor) FROM 'faktor' WHERE (id_faktor) = 3";
		return $this->db->query($sql)
						->result_array();
	}

	public function hitung_fuzzy_dSungai(){
		$sql = "SELECT (jenis_faktor) FROM 'faktor' WHERE (id_faktor) = 4";
		return $this->db->query($sql)
						->result_array();
	}
}
?>