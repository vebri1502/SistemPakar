<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BasisPengetahuan extends CI_Controller {

	public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('id_pakar')){
            redirect('welcome');
        }
    $this->load->model('M_edit');
    }
    
	public function index()
	{
		$this->load->view('basis_pengetahuan');
	}

	public function tampilData(){
		$this->load->model('M_edit');
		$data['abc'] = $this->M_edit->viewDatabase();
		$data['data'] = $this->M_edit->showLogMak();
		$data['data'] = $this->M_edit->show();
		$this->load->view('basis_pengetahuan', $data);
	}

	public function editData($id) {
		$user_id = $this->uri->segment(3);  
        $this->load->model("M_edit");  
        $data["user_data"] = $this->M_edit->fetch_single_data($user_id);  
        $data["fetch_data"] = $this->M_edit->fetch_data();
        //$this->load->library('form_validation');   
        $this->load->view("editDatabase", $data); 
	}

	public function editNilaiDB(){
		$id = $this->input->post('id');
		$batas_bawahR = $this->input->post('bb');
		$batas_atasR = $this->input->post('ba');

		$data = array(
			'batas_bawah' => $batas_bawahR,
			'batas_atas' =>$batas_atasR
		);

		
		$where = array(
			'id_parameter' => $id
		);

		$this->M_edit->update_data($where,$data,'parameter');
		redirect('BasisPengetahuan/tampilData');
	}
	
	
}
