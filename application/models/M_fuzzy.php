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

		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'rendah');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		//echo($data[0]['age']);
		//echo($data[0]['batas_bawah']);
		//is_integer($data[0]['batas_bawah']);
		//echo($data[0]['batas_bawah']);
	}

	public function BArendah_darat()
	{
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'rendah');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		//echo($data[0]['age']);
		//echo($data[0]['batas_atas']);
		//is_integer($data[0]['batas_atas']);
		//echo($data[0]['batas_atas']);
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