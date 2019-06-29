<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_fuzzy extends CI_Model {

	private $table  = 'faktor';
	private $table2 = 'myu';
	private $table3 = 'risiko';
	private $table4 = 'parameter';

	public function __construct(){
		parent::__construct();
	}

	public function BBrendah_darat()
	{

		$sql = "SELECT batas_bawah FROM 'parameter' WHERE id_parameter = 1";
		return $this->db->get($sql)
						->result_array();
	}

	public function BArendah_darat()
	{
		$BAdarat = "SELECT batas_atas FROM `parameter` WHERE id_parameter = 1 ";
		return $this->db->get($BBdarat)
						->result_array();
	}

	public function BBsedang1_darat()
	{
		$BBdarat = "SELECT batas_bawah FROM `parameter` WHERE id_parameter = 2 ";
		return $this->db->get($BBdarat)
						->result_array();
	}

	public function BAsedang1_darat()
	{
		$BBdarat = "SELECT batas_atas FROM `parameter` WHERE id_parameter = 2 ";
		return $this->db->get($BBdarat)
						->result_array();
	}

	public function BBsedang2_darat()
	{
		$BBdarat = "SELECT batas_bawah FROM `parameter` WHERE id_parameter = 3 ";
		return $this->db->get($BBdarat)
						->result_array();
	}

	public function inputMyu($data,$table)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

}
?>