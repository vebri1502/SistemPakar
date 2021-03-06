<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_riwayat extends CI_Controller {

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
		$this->load->view('riwayat_input');
	}

	public function tampilData(){
		$this->load->model('M_edit');
		$data['abc'] = $this->M_edit->viewH();
		$data['data'] = $this->M_edit->showHistory();
		$data['data'] = $this->M_edit->showH();
		$this->load->view('riwayat_input', $data);
	}

	
}
