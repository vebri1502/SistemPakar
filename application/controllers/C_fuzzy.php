<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_fuzzy extends CI_Controller {

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
	// public function __construct(){
	// 	parent::__construct();
	// 	$this->load->library('session');
	// }

	public function index()
	{			
   		$this->load->view('user_biasa');
		$this->load->model('M_login');
	}

	    public function fuzzy(){

    	if (isset($_POST['kirim'])) {
			$TPermukaan = $this->input->post('inputPermukaan', true);
			$BDaerah = $this->input->post('banyakDaerah', true);
			$JSungai = $this->input->post('inputSungai', true);
			$CHujan = $this->input->post('inputCHujan', true);

			$data = array(
				'' 				=> $nama,
				'jenis_kelamin' 	=> $jenis_kelamin,
				'usia' 				=> $usia,
				// 'gejala'			=> $gejala_penyakit
				'id_petugas'		=> $this->session->userdata('id_petugas')
			);

			#Untuk Daratan
			if ($TPermukaan >= 10 && $TPermukaan <= 110) {
				$myuDarat1 = (110 - $TPermukaan)/(100-10);
				#masukin nilai myu ke database

			} else {
				$myuDarat1 = 0;
			}

			if ($TPermukaan >= 50 && $TPermukaan <= 150) {
				$myuDarat2 = ($TPermukaan - 50)/(150-50);
				#masukin nilai myu ke database
			} else {
				$myuDarat2 = 0;
			}

			if ($TPermukaan >= 150 && $TPermukaan <= 250) {
				$myuDarat3 = (250 - $TPermukaan)/(250-150);
				#masukin nilai myu ke database
			} else {
				$myuDarat3 = 0;
			}

			if ($TPermukaan >=200 && $TPermukaan >= 400) {
				$myuDarat4 = ($TPermukaan - 200)/(400-200);
				#masukin nilai myu ke database
			} else {
				$myuDarat4 = 0;
			}

			

			#Untuk banyak daerah tinggi
			if ($BDaerah >= 1 && $BDaerah <= 5) {
				$myuDaerah1 = ($BDaerah-1)/(5-1);
			} else {
				$myuDaerah1 = 0;
			}

			if ($BDaerah >= 4 && $BDaerah <= 8) {
				$myuDaerah2 = (8-$BDaerah)/(8-4);
			} else {
				$myuDaerah2 = 0;
			}

			if ($BDaerah >= 8 && $BDaerah <= 12) {
				$myuDaerah3 = ($BDaerah-8)/(12-8);
			} else {
				$myuDaerah3 = 0;
			}

			if ($BDaerah >= 10 && $BDaerah <= 15) {
				$myuDaerah4 = (15-$BDaerah)/(15-10);
			} else {
				$myuDaerah4 = 0;
			}
			
			
			#Untuk jarak dengan sungai
			if ($JSungai >= 5 && $JSungai <= 15) {
				$myuSungai1 = (15 - $JSungai)/(15-5);
			} else {
				$myuSungai1 = 0;
			}

			if ($JSungai >= 10 && $JSungai <= 20) {
				$myuSungai2 = ($JSungai-10)/(20-10);
			} else {
				$myuSungai2 = 0;
			}

			if ($JSungai >= 20 && $JSungai <= 30) {
				$myuSungai3 = (30-$JSungai)/(30-20);
			} else {
				$myuSungai3 = 0;
			}

			if ($JSungai >= 25 && $JSungai <= 50) {
				$myuSungai4 = ($JSungai-25)/(50-25);
			} else {
				$myuSungai4 = 0;
			}


			#Untuk curah hujan
			if ($CHujan >= 60 && $CHujan <= 160) {
				$myuHujan1 = (160 - $CHujan)/(160-60); 
			} else {
				$myuHujan1 = 0;
			}

			if ($CHujan >= 100 && $CHujan <= 200) {
				$myuHujan2 = ($CHujan-100)/(200-100);
			} else {
				$myuHujan2 = 0;
			}

			if ($CHujan >= 200 && $CHujan <= 300) {
				$myuHujan3 >= (300 - $CHujan)/(300-200);
			} else {
				$myuHujan3 = 0;
			}

			if ($CHujan >= 250 && $CHujan <=500) {
				$myuHujan4 = ($CHujan-250)/(500-250);
			} else {
				$myuHujan4 = 0;
			}

			

			$myuDarat = max($myuDarat1,$myuDarat2,$myuDarat3,$myuDarat4);
			$myuHujan = max($myuHujan1,$myuHujan2,$myuHujan3,$myuHujan4);
			$myuSungai = max($myuSungai1, $myuSungai2, $myuSungai3, $myuSungai4);
			$myuDaerah = max($myuDaerah1, $myuDaerah2, $myuDaerah3, $myuDaerah4);

			$arr = min($myuDarat,$myuSungai,$myuHujan,$myuDaerah);  // Stores values in array $arr
			echo "$arr";
			
		}
    }
}