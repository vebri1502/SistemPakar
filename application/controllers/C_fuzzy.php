<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_fuzzy extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_fuzzy');
		$this->load->model('M_edit');
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

			#Risiko
			$batasBawahKecilRisiko = $this->M_fuzzy->BBkecilRisiko();
			$batasAtasKecilRisiko = $this->M_fuzzy->BAkecilRisiko();
			$batasBawahTinggiRisiko = $this->M_fuzzy->BBTinggiRisiko();
			$batasAtasTinggiRisiko = $this->M_fuzzy->BATinggiRisiko();
			
			#Untuk Daratan
			if ($TPermukaan <= $batasAtasrendahD && $TPermukaan >= $batasBawahrendahD) {
				$myuDaratRendah = ($batasAtasrendahD - $TPermukaan)/($batasAtasrendahD-$batasBawahrendahD);
				#masukin nilai myu ke database

			} else {
				$myuDaratRendah = 0;
			}

			if ($TPermukaan <= $batasAtassedang1D && $TPermukaan >= $batasBawahsedang1D) {
				$myuDaratSedang1 = ($TPermukaan - $batasBawahsedang1D)/($batasAtassedang1D-$batasBawahsedang1D);
				#masukin nilai myu ke database
			} else {
				$myuDaratSedang1 = 0;
			}

			if ($TPermukaan >= $batasBawahsedang2D && $TPermukaan <= $batasAtassedang2D) {
				$myuDaratSedang2 = ($batasAtassedang2D - $TPermukaan)/($batasAtassedang2D-$batasBawahsedang2D);
				#masukin nilai myu ke database
			} else {
				$myuDaratSedang2 = 0;
			}

			if ($TPermukaan <= $batasAtastinggiD && $TPermukaan >=$batasBawahtinggiD) {
				$myuDarat4 = ($TPermukaan - $batasBawahtinggiD)/($batasAtastinggiD-$batasBawahtinggiD);
				#masukin nilai myu ke database
			} else {
				$myuDaratTinggi = 0;
			}

			

			#Untuk banyak daerah tinggi
			if ($BDaerah <= $batasAtassedikitDa && $BDaerah >= $batasBawahsedikitDa) {
				$myuDaerahSedikit = ($batasAtassedikitDa - $BDaerah)/($batasAtassedikitDa-$batasBawahsedikitDa);
			} else {
				$myuDaerahSedikit = 0;
			}

			if ($BDaerah <= $batasAtassedang1Da && $BDaerah >= $batasBawahsedang1Da) {
				$myuDaerahSedang1 = ($batasAtassedang1Da-$BDaerah)/($batasAtassedang1Da-$batasBawahsedang1Da);
			} else {
				$myuDaerahSedang1 = 0;
			}

			if ($BDaerah <= $batasAtassedang2Da && $BDaerah >= $batasBawahsedang2Da) {
				$myuDaerahSedang2 = ($BDaerah-$batasBawahsedang2Da)/($batasAtassedang2Da-$batasBawahsedang2Da);
			} else {
				$myuDaerahSedang2 = 0;
			}

			if ($BDaerah <= $batasAtasbanyakDa && $BDaerah >= $batasBawahbanyakDa) {
				$myuDaerahBanyak = ($BDaerah-$batasBawahbanyakDa)/($batasAtasbanyakDa-$batasBawahbanyakDa);
			} else {
				$myuDaerahBanyak = 0;
			}
			
			
			#Untuk jarak dengan sungai
			if ($JSungai >= $batasBawahdekatS && $JSungai <= $batasAtasdekatS) {
				$myuSungaiDekat = ($batasAtasdekatS - $JSungai)/($batasAtasdekatS-$batasBawahdekatS);
			} else {
				$myuSungaiDekat = 0;
			}

			if ($JSungai >= $batasBawahsedang1S && $JSungai <= $batasAtassedang1S) {
				$myuSungaiSedang1 = ($JSungai-$batasBawahsedang1S)/($batasAtassedang1S-$batasBawahsedang1S);
			} else {
				$myuSungaiSedang1 = 0;
			}

			if ($JSungai >= $batasBawahsedang2S && $JSungai <= $batasAtassedang2S) {
				$myuSungaiSedang2 = ($batasAtassedang2S-$JSungai)/($batasAtassedang2S-$batasBawahsedang2S);
			} else {
				$myuSungaiSedang2 = 0;
			}

			if ($JSungai >= $batasBawahjauhS && $JSungai <= $batasAtasjauhS) {
				$myuSungaiJauh = ($JSungai-$batasBawahjauhS)/($batasAtasjauhS-$batasBawahjauhS);
			} else {
				$myuSungaiJauh = 0;
			}


			#Untuk curah hujan
			if ($CHujan >= $batasBawahrendahH && $CHujan <= $batasAtasrendahH) {
				$myuHujanRendah = ($batasAtasrendahH - $CHujan)/($batasAtasrendahH-$batasBawahrendahH); 
			} else {
				$myuHujanRendah = 0;
			}

			if ($CHujan <= $batasAtasnormal1H && $CHujan >= $batasBawahnormal1H) {
				$myuHujanNormal1 = ($CHujan-$batasBawahnormal1H)/($batasAtasnormal1H-$batasBawahnormal1H);
			} else {
				$myuHujanNormal1 = 0;
			}

			if ($CHujan <= $batasAtasnormal2H && $CHujan >= $batasBawahnormal2H) {
				$myuHujanNormal2 >= ($batasAtasnormal2H - $CHujan)/($batasAtasnormal2H-$batasBawahnormal2H);
			} else {
				$myuHujanNormal2 = 0;
			}

			if ($CHujan <=$batasAtastinggiH && $CHujan >= $batasBawahtinggiH) {
				$myuHujanTinggi = ($CHujan-$batasBawahtinggiH)/($batasAtastinggiH-$batasBawahtinggiH);
			} else {
				$myuHujanTinggi = 0;
			}

			// If A rendah, B banyak, C tinggi, D dekat, Then E besar
			// If A tinggi, B sedikit, C rendah, D jauh Then E kecil
			// If A tinggi, B banyak, C rendah, D jauh Then E kecil
			// If A tinggi, B banyak, C rendah, D dekat Then E kecil

			#Aturan pertama
			$AturanPertama = min($myuDaratRendah,$myuDaerahBanyak,$myuHujanTinggi,$myuSungaiDekat);
			$AturanKedua = min($myuDaratTinggi,$myuDaerahSedikit,$myuHujanRendah,$myuSungaiJauh);
			$AturanKetiga = min($myuDaratTinggi,$myuDaerahBanyak,$myuHujanRendah,$myuSungaiJauh);
			$AturanKeempat = min($myuDaratTinggi,$myuDaerahBanyak,$myuHujanRendah,$myuSungaiDekat);

			if ($AturanPertama != 0) {
				$r1 = ($AturanPertama * ($batasAtasTinggiRisiko - $batasBawahTinggiRisiko)) + $batasBawahTinggiRisiko;
			} else {
				$r1 = 1;
			}

			if ($AturanKedua != 0) {
				$r2 = $batasAtasKecilRisiko - ($AturanKedua * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r2 = 1;
			}

			if ($AturanKetiga != 0) {
				$r3 = $batasAtasKecilRisiko - ($AturanKetiga * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r3 = 1;
			}

			if ($AturanKetiga != 0) {
				$r4 = $batasAtasKecilRisiko - ($AturanKeempat * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r4 = 1;
			}
			

			$hasil1 = (($r1*$AturanPertama)+($r2*$AturanKedua) + ($r3*$AturanKetiga) + ($r4 * $AturanKeempat))/($AturanPertama+$AturanKedua+$AturanKetiga+$AturanKeempat);
			

			$data = array(
				'hasil1' 				=> $hasil1
			);
			// Masukkan ke DB
			$insert = $this->M_edit->input($data, 'hasil');
			redirect(base_url().'Welcome');
			
		}
    }
}