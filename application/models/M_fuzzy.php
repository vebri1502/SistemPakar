<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_fuzzy extends CI_Model {

	private $table  = 'faktor';
	private $table2 = 'myu';
	private $table3 = 'risiko';

	public function __construct(){
		parent::__construct();
	}

	public function inputMyu($data,$table2)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

}
?>