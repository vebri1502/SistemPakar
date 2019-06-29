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

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_fuzzy');
	}

	public function index()
	{			
   		$this->load->view('user_biasa');
		
	}

	    public function fuzzy(){

    	if (isset($_POST['kirim'])) {
			$TPermukaan = $this->input->post('inputPermukaan', true);
			$BDaerah = $this->input->post('banyakDaerah', true);
			$JSungai = $this->input->post('inputSungai', true);
			$CHujan = $this->input->post('inputCHujan', true);

			// $data = array(
			// 	'' 				=> $nama,
			// 	'jenis_kelamin' 	=> $jenis_kelamin,
			// 	'usia' 				=> $usia,
			// 	// 'gejala'			=> $gejala_penyakit
			// 	'id_petugas'		=> $this->session->userdata('id_petugas')
			// );

			$batasBawahrendahD = $this->M_fuzzy->BBrendah_darat();
			$batasAtasrendahD = $this->M_fuzzy->BArendah_darat();
			$batasBawahsedang1D = $this->M_fuzzy->BBsedang1_darat();
			$batasAtassedang1D = $this->M_fuzzy->BAsedang1_darat();
			$batasBawahsedang2D = $this->M_fuzzy->BBsedang2_darat();
			$batasAtassedang2D = $this->M_fuzzy->BAsedang2_darat();
			$batasBawahtinggiD = $this->M_fuzzy->BBtinggi_darat();
			$batasAtastinggiD = $this->M_fuzzy->BAtinggi_darat();

			# Daerah
			$batasBawahsedikitDa = $this->M_fuzzy->BBsedikit_daerah();
			$batasAtassedikitDa = $this->M_fuzzy->BAsedikit_daerah();
			$batasBawahsedang1Da = $this->M_fuzzy->BBsedang1_daerah();
			$batasAtassedang1Da = $this->M_fuzzy->BAsedang1_daerah();
			$batasBawahsedang2Da = $this->M_fuzzy->BBsedang2_daerah();
			$batasAtassedang2Da = $this->M_fuzzy->BAsedang2_daerah();
			$batasBawahbanyakDa = $this->M_fuzzy->BBbanyak_daerah();
			$batasAtasbanyakDa = $this->M_fuzzy->BAbanyak_daerah();

			# Curah Hujan
			$batasBawahrendahH = $this->M_fuzzy->BBrendah_hujan();
			$batasAtasrendahH = $this->M_fuzzy->BArendah_hujan();
			$batasBawahnormal1H = $this->M_fuzzy->BBnormal1_hujan();
			$batasAtasnormal1H = $this->M_fuzzy->BAnormal1_hujan();
			$batasBawahnormal2H = $this->M_fuzzy->BBnormal2_hujan();
			$batasAtasnormal2H = $this->M_fuzzy->BAnormal2_hujan();
			$batasBawahtinggiH = $this->M_fuzzy->BBtinggi_hujan();
			$batasAtastinggiH = $this->M_fuzzy->BAtinggi_hujan();

			#Jarak ke sungai
			$batasBawahdekatS = $this->M_fuzzy->BBdekat_sungai();
			$batasAtasdekatS = $this->M_fuzzy->BAdekat_sungai();
			$batasBawahsedang1S = $this->M_fuzzy->BBsedang1_sungai();
			$batasAtassedang1S = $this->M_fuzzy->BAsedang1_sungai();
			$batasBawahsedang2S = $this->M_fuzzy->BBsedang2_sungai();
			$batasAtassedang2S = $this->M_fuzzy->BAsedang2_sungai();
			$batasBawahjauhS = $this->M_fuzzy->BBjauh_sungai();
			$batasAtasjauhS = $this->M_fuzzy->BAjauh_sungai();
			//is_integer('$batasBawahrendahD');
			
			#Untuk Daratan
			if ($TPermukaan <= $batasAtasrendahD) {
				if ($TPermukaan >= $batasBawahrendahD) {
					$myuDarat11 = ($batasAtasrendahD - $TPermukaan)/($batasAtasrendahD-$batasBawahrendahD);
				}
				$myuDarat1 = ($batasAtasrendahD - $TPermukaan)/($batasAtasrendahD-$batasBawahrendahD);
				#masukin nilai myu ke database

			} else {
				$myuDarat1 = 0;
			}

			if ($TPermukaan <= $batasAtassedang1D) {
				if ($TPermukaan >= $batasBawahsedang1D) {
					$myuDarat2 = ($TPermukaan - $batasBawahsedang1D)/($batasAtassedang1D-$batasBawahsedang1D);
				}
				$myuDarat2 = ($TPermukaan - $batasBawahsedang1D)/($batasAtassedang1D-$batasBawahsedang1D);
				#masukin nilai myu ke database
			} else {
				$myuDarat2 = 0;
			}

			if ($TPermukaan >= $batasBawahsedang2D) {
				if ($TPermukaan <= $batasAtassedang2D){
					$myuDarat3 = ($batasAtassedang2D - $TPermukaan)/($batasAtassedang2D-$batasBawahsedang2D);
				}
				$myuDarat3 = ($batasAtassedang2D - $TPermukaan)/($batasAtassedang2D-$batasBawahsedang2D);
				#masukin nilai myu ke database
			} else {
				$myuDarat3 = 0;
			}

			if ($TPermukaan <= $batasAtastinggiD) {
				if ($TPermukaan >=$batasBawahtinggiD ) {
					$myuDarat4 = ($TPermukaan - $batasBawahtinggiD)/($batasAtastinggiD-$batasBawahtinggiD);
				}
				$myuDarat4 = ($TPermukaan - $batasBawahtinggiD)/($batasAtastinggiD-$batasBawahtinggiD);
				#masukin nilai myu ke database
			} else {
				$myuDarat4 = 0;
			}

			

			#Untuk banyak daerah tinggi
			if ($BDaerah <= $batasAtassedikitDa) {
				if ($BDaerah >= $batasBawahsedikitDa) {
					$myuDaerah1 = ($BDaerah-$batasBawahsedikitDa)/($batasAtassedikitDa-$batasBawahsedikitDa);
				}
				$myuDaerah1 = ($BDaerah-$batasBawahsedikitDa)/($batasAtassedikitDa-$batasBawahsedikitDa);
			} else {
				$myuDaerah1 = 0;
			}

			if ($BDaerah <= $batasAtassedang1Da) {
				if ($BDaerah >= $batasBawahsedang1Da) {
					$myuDaerah2 = ($batasAtassedang1Da-$BDaerah)/($batasAtassedang1Da-$batasBawahsedang1Da);
				}
				$myuDaerah2 = ($batasAtassedang1Da-$BDaerah)/($batasAtassedang1Da-$batasBawahsedang1Da);
			} else {
				$myuDaerah2 = 0;
			}

			if ($BDaerah <= $batasAtassedang2Da) {
				if ($BDaerah >= $batasBawahsedang2Da) {
					$myuDaerah3 = ($BDaerah-$batasBawahsedang2Da)/($batasAtassedang2Da-$batasBawahsedang2Da);
				}
				$myuDaerah3 = ($BDaerah-$batasBawahsedang2Da)/($batasAtassedang2Da-$batasBawahsedang2Da);
			} else {
				$myuDaerah3 = 0;
			}

			if ($BDaerah <= $batasAtasbanyakDa) {
				if ($BDaerah >= $batasBawahbanyakDa) {
					$myuDaerah4 = ($BDaerah-$batasBawahbanyakDa)/($batasAtasbanyakDa-$batasBawahbanyakDa);
				}
				$myuDaerah4 = ($BDaerah-$batasBawahbanyakDa)/($batasAtasbanyakDa-$batasBawahbanyakDa);
			} else {
				$myuDaerah4 = 0;
			}
			
			
			#Untuk jarak dengan sungai
			if ($JSungai >= $batasBawahdekatS) {
				if ($JSungai <= $batasAtasdekatS) {
					$myuSungai1 = ($batasAtasdekatS - $JSungai)/($batasAtasdekatS-$batasBawahdekatS);
				}
				$myuSungai1 = ($batasAtasdekatS - $JSungai)/($batasAtasdekatS-$batasBawahdekatS);
			} else {
				$myuSungai1 = 0;
			}

			if ($JSungai >= $batasBawahsedang1S) {
				if ($JSungai <= $batasAtassedang1S) {
					$myuSungai2 = ($JSungai-$batasBawahsedang1S)/($batasAtassedang1S-$batasBawahsedang1S);
				}
				$myuSungai2 = ($JSungai-$batasBawahsedang1S)/($batasAtassedang1S-$batasBawahsedang1S);
			} else {
				$myuSungai2 = 0;
			}

			if ($JSungai >= $batasBawahsedang2S) {
				if ($JSungai <= $batasAtassedang2S) {
					$myuSungai3 = ($batasAtassedang2S-$JSungai)/($batasAtassedang2S-$batasBawahsedang2S);
				}
				$myuSungai3 = ($batasAtassedang2S-$JSungai)/($batasAtassedang2S-$batasBawahsedang2S);
			} else {
				$myuSungai3 = 0;
			}

			if ($JSungai >= $batasBawahjauhS) {
				if ($JSungai <= $batasAtasjauhS) {
					$myuSungai4 = ($JSungai-$batasBawahjauhS)/($batasAtasjauhS-$batasBawahjauhS);
				}
				$myuSungai4 = ($JSungai-$batasBawahjauhS)/($batasAtasjauhS-$batasBawahjauhS);
			} else {
				$myuSungai4 = 0;
			}


			#Untuk curah hujan
			if ($CHujan >= $batasBawahrendahH) {
				if ($CHujan <= $batasAtasrendahH) {
					$myuHujan1 = ($batasAtasrendahH - $CHujan)/($batasAtasrendahH-$batasBawahrendahH);
				}
				$myuHujan1 = ($batasAtasrendahH - $CHujan)/($batasAtasrendahH-$batasBawahrendahH); 
			} else {
				$myuHujan1 = 0;
			}

			if ($CHujan <= $batasAtasnormal1H) {
				if ($CHujan >= $batasBawahnormal1H) {
					$myuHujan2 = ($CHujan-$batasBawahnormal1H)/($batasAtasnormal1H-$batasBawahnormal1H);
				}
				$myuHujan2 = ($CHujan-$batasBawahnormal1H)/($batasAtasnormal1H-$batasBawahnormal1H);
			} else {
				$myuHujan2 = 0;
			}

			if ($CHujan <= $batasAtasnormal2H) {
				if ($CHujan >= $batasBawahnormal2H) {
					$myuHujan3 >= ($batasAtasnormal2H - $CHujan)/($batasAtasnormal2H-$batasBawahnormal2H);
				}
				$myuHujan3 >= ($batasAtasnormal2H - $CHujan)/($batasAtasnormal2H-$batasBawahnormal2H);
			} else {
				$myuHujan3 = 0;
			}

			if ($CHujan <=$batasAtastinggiH) {
				if ($CHujan >= $batasBawahtinggiH) {
					$myuHujan4 = ($CHujan-$batasBawahtinggiH)/($batasAtastinggiH-$batasBawahtinggiH);
				}
				$myuHujan4 = ($CHujan-$batasBawahtinggiH)/($batasAtastinggiH-$batasBawahtinggiH);
			} else {
				$myuHujan4 = 0;
			}

			

			$myuDarat = max($myuDarat1,$myuDarat2,$myuDarat3,$myuDarat4);
			$myuHujan = max($myuHujan1,$myuHujan2,$myuHujan3,$myuHujan4);
			$myuSungai = max($myuSungai1, $myuSungai2, $myuSungai3, $myuSungai4);
			$myuDaerah = max($myuDaerah1, $myuDaerah2, $myuDaerah3, $myuDaerah4);

			$arr = min($myuDarat,$myuSungai,$myuHujan,$myuDaerah);  // Stores values in array $arr
			echo "$myuDarat";
			echo "$myuHujan";
			echo "$myuSungai";
			echo "$myuDaerah";
			
		}
    }
}