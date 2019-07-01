<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_fuzzy extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	public function BBrendah_darat()
	{

		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'rendah');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_bawah'];

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
		return $hasil = $data[0]['batas_atas'];
		//is_integer($data[0]['batas_atas']);
		//echo($data[0]['batas_atas']);
	}

	public function BBsedang1_darat()
	{
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'sedang1');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_bawah'];
	}

	public function BAsedang1_darat()
	{
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'sedang1');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_atas'];
	}

	public function BBsedang2_darat()
	{
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'sedang2');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_bawah'];
	}

	public function BAsedang2_darat(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'sedang2');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_atas'];
	}

	public function BBtinggi_darat(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'tinggi');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_bawah'];
	}

	public function BAtinggi_darat(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'tinggi');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_atas'];
	}

	public function BBsedikit_daerah(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'sedikit');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_bawah'];
	}

	public function BAsedikit_daerah(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'sedikit');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_atas'];
	}

	public function BBsedang1_daerah(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'sedang1');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[1]['batas_bawah'];
	}

	public function BAsedang1_daerah(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'sedang1');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[1]['batas_atas'];
	}

	public function BBsedang2_daerah(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'sedang2');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[1]['batas_bawah'];
	}

	public function BAsedang2_daerah(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'sedang2');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[1]['batas_atas'];
	}

	public function BBbanyak_daerah(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'banyak');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_bawah'];
	}

	public function BAbanyak_daerah(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'banyak');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_atas'];
	}

	public function BBrendah_hujan(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'rendah');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[1]['batas_bawah'];
	}

	public function BArendah_hujan(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'rendah');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[1]['batas_atas'];
	}

	public function BBnormal1_hujan(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'normal1');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_bawah'];
	}

	public function BAnormal1_hujan(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'normal1');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_atas'];
	}

	public function BBnormal2_hujan(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'normal2');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_bawah'];
	}

	public function BAnormal2_hujan(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'normal2');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_atas'];
	}

	public function BBtinggi_hujan(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'tinggi');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[1]['batas_bawah'];
	}

	public function BAtinggi_hujan(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'tinggi');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[1]['batas_atas'];
	}

	public function BBdekat_sungai(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'dekat');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_bawah'];
	}

	public function BAdekat_sungai(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'dekat');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_atas'];
	}

	public function BBsedang1_sungai(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'sedang1');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[2]['batas_bawah'];
	}

	public function BAsedang1_sungai(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'sedang1');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[2]['batas_atas'];
	}

	public function BBsedang2_sungai(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'sedang2');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[2]['batas_bawah'];
	}

	public function BAsedang2_sungai(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'sedang2');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[2]['batas_atas'];
	}

	public function BBjauh_sungai(){
		$this->db->select('batas_bawah');
		$this->db->where('nama_parameter', 'jauh');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_bawah'];
	}

	public function BAjauh_sungai(){
		$this->db->select('batas_atas');
		$this->db->where('nama_parameter', 'jauh');
		$q = $this->db->get('parameter');
		$data = $q->result_array();

		return $hasil = $data[0]['batas_atas'];
	}

	public function inputMyu($data,$table)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

}
?>