<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pakar extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
   public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('id_pakar')){
            redirect('welcome');
        }
    }

	public function index()
	{			
   		$this->load->model('M_login');
		$this->load->view('pakar');
	}

	public function tampilHasil() {
		$user_id = $this->uri->segment(3);  
        $this->load->model("M_edit");  
        $data["user_data"] = $this->M_edit->fetch_single_dataH($user_id);  
        $data["fetch_data"] = $this->M_edit->fetch_dataH();
        //$this->load->library('form_validation');   
        $this->load->view("pakar", $data); 
	}

	
}
