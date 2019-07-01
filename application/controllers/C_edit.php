<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_edit extends CI_Controller {

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
		$this->load->view('basis_pengetahuan');
	}

	public function editParameter() {
		if (!$_POST) {
			$this->load->view('basis_pengetahuan');
		} else {
			// Ambil data dari form
			$jenis_pakaian  = $this->input->post('jenisP');
			$nama_pakaian  	= $this->input->post('namaP');
			$jumlah 		= $this->input->post('jmlh');
				
			// Membuat associative array
			$data = array(
				'jenis_pakaian' 	=> $jenis_pakaian,
				'nama_pakaian' 		=> $nama_pakaian,
				'jum_pakaian'		=> $jumlah
			);
	
			// Masukkan ke DB
			$insert = $this->M_admin->inputPakaian($data, 'pakaian');

			if ($insert) {
				redirect(base_url().'C_admin/tambahPakaian');
			} else {
			echo "Gagal!";
			}
		}
	}

	public function tampil_data(){
		$this->load->model('M_edit');
		$data['data'] = $this->M_edit->show();
		$this->load->view('user_biasa', $data);
	}
}
?>