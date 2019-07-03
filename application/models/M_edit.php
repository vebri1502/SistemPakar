<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_edit extends CI_Model {

	private $table  = 'faktor';
	private $table2 = 'hasil';
	private $table3 = 'risiko';
	private $table4 = 'parameter';
  private $table5 = 'masukan';

	public function editParameter($where, $table){
		return $this->db->get_where($table4, $where);;
	}
	public function show(){
		return $this->db->join($this->table,'faktor.id_faktor=parameter.id_faktor')
						->get($this->table4)
						->result_array();
	}

  public function showH(){
    return $this->db->get($this->table5)
            ->result_array();
  }

	public function input($data)
	{
		$this->db->insert('hasil', $data);
	}

  public function inputM($data)
  {
    $this->db->insert('masukan', $data);
  }

	function fetch_data()  
      {  
           $this->db->select("*");  
           $this->db->from("parameter");  
           $query = $this->db->get();  
           return $query;  
      }

      function fetch_dataH()  
      {  
           $this->db->select("*");  
           $this->db->from("hasil");  
           $query = $this->db->get();  
           return $query;  
      }

      function fetch_single_data($id)  
      {  
           $this->db->where("id_parameter", $id);  
           $query = $this->db->get("parameter");  
           return $query;  
      }  

      function id_terakhir(){
      	$this->db->select('id_masukan');
        $this->db->order_by('id_masukan',"desc");
        $this->db->limit(1);
        $hasil = $this->db->get('masukan')->row();

        return $hasil;
      }

      function fetch_single_dataH()  
      {  
        $id = $this->id_terakhir();
        $hasilID = $id->id_masukan;

      	$id = $hasilID;
        $this->db->where("id_masukan", $id);  
        $query = $this->db->get("masukan");  
        return $query;  
      }  

    public function showLogMak()
	{
		return $this->db->get($this->table4)
						->result_array();
	}

    public function viewDatabase(){
		return $this->db->get('parameter')->result();
	}

  public function viewH(){
    return $this->db->get('masukan')->result();
  }

  public function showHistory()
  {
    return $this->db->get($this->table5)
            ->result_array();
  }
      

      function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	} 

	
}
?>