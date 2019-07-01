<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_edit extends CI_Model {

	private $table  = 'faktor';
	private $table2 = 'myu';
	private $table3 = 'risiko';
	private $table4 = 'parameter';

	public function editParameter($where, $table){
		return $this->db->get_where($table4, $where);;
	}

	function fetch_data()  
      {  
           $this->db->select("*");  
           $this->db->from("parameter");  
           $query = $this->db->get();  
           return $query;  
      }

      function fetch_single_data($id)  
      {  
           $this->db->where("id_parameter", $id);  
           $query = $this->db->get("parameter");  
           return $query;  
           //Select * FROM tbl_user where id = '$id'  
      }  

    public function showLogMak()
	{
		return $this->db->get($this->table4)
						->result_array();
	}

    public function viewDatabase(){
		return $this->db->get('parameter')->result();
	}

      

      function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	} 

	
}
?>