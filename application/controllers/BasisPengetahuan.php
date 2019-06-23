<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BasisPengetahuan extends CI_Controller {

	public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('id_pakar')){
            redirect('welcome');
        }
    }
    
	public function index()
	{
		$this->load->view('basis_pengetahuan');
	}
}
