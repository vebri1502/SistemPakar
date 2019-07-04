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
			} else if ($TPermukaan<=$batasBawahrendahD) {
				$myuDaratRendah = 1;
			} else {
				$myuDaratRendah = 0;
			}

			if ($TPermukaan < $batasAtassedang1D && $TPermukaan > $batasBawahsedang1D) {
				$myuDaratSedang = ($TPermukaan - $batasBawahsedang1D)/($batasAtassedang1D-$batasBawahsedang1D);
				#masukin nilai myu ke database
			} else if ($TPermukaan > $batasBawahsedang2D && $TPermukaan < $batasAtassedang2D) {
				$myuDaratSedang = ($batasAtassedang2D - $TPermukaan)/($batasAtassedang2D-$batasBawahsedang2D);
			} else if ($TPermukaan == $batasAtassedang1D ) {
				$myuDaratSedang = 1;
			} else {
				$myuDaratSedang = 0;
			}

			if ($TPermukaan <= $batasAtastinggiD && $TPermukaan >=$batasBawahtinggiD) {
				$myuDaratTinggi = ($TPermukaan - $batasBawahtinggiD)/($batasAtastinggiD-$batasBawahtinggiD);
			} else if ($TPermukaan >= $batasAtastinggiD) {
				$myuDaratTinggi = 1;
			} else {
				$myuDaratTinggi = 0;
			}

			

			#Untuk banyak daerah tinggi
			if ($BDaerah <= $batasAtassedikitDa && $BDaerah >= $batasBawahsedikitDa) {
				$myuDaerahSedikit = ($batasAtassedikitDa - $BDaerah)/($batasAtassedikitDa-$batasBawahsedikitDa);
			} elseif ($BDaerah<=$batasBawahsedikitDa) {
				$myuDaerahSedikit = 1;
			} else {
				$myuDaerahSedikit = 0;
			}

			if ($BDaerah > $batasBawahsedang1Da && $BDaerah < $batasAtassedang1Da) {
				$myuDaerahSedang = ($BDaerah-$batasAtassedang1Da)/($batasAtassedang1Da-$batasBawahsedang1Da);
			} else if ($BDaerah < $batasAtassedang2Da && $BDaerah > $batasBawahsedang2Da) {
				$myuDaerahSedang = ($batasBawahsedang2Da-$BDaerah)/($batasAtassedang2Da-$batasBawahsedang2Da);
			} else if ($TPermukaan == $batasAtassedang1D ) {
				$myuDaerahSedang = 1;
			} else {
				$myuDaerahSedang = 0;
			}

			if ($BDaerah <= $batasAtasbanyakDa && $BDaerah >= $batasBawahbanyakDa) {
				$myuDaerahBanyak = ($BDaerah-$batasBawahbanyakDa)/($batasAtasbanyakDa-$batasBawahbanyakDa);
			} else if ($BDaerah>=$batasAtasbanyakDa) {
				$myuDaerahBanyak = 1;
			} else {
				$myuDaerahBanyak = 0;
			}
			
			
			#Untuk jarak dengan sungai
			if ($JSungai >= $batasBawahdekatS && $JSungai <= $batasAtasdekatS) {
				$myuSungaiDekat = ($batasAtasdekatS - $JSungai)/($batasAtasdekatS-$batasBawahdekatS);
			} else if ($JSungai<=$batasBawahdekatS) {
				$myuSungaiDekat = 1;
			} else {
				$myuSungaiDekat = 0;
			}

			if ($JSungai > $batasBawahsedang1S && $JSungai < $batasAtassedang1S) {
				$myuSungaiSedang = ($JSungai-$batasBawahsedang1S)/($batasAtassedang1S-$batasBawahsedang1S);
			} else if ($JSungai > $batasBawahsedang2S && $JSungai < $batasAtassedang2S) {
				$myuSungaiSedang = ($batasAtassedang2S-$JSungai)/($batasAtassedang2S-$batasBawahsedang2S);
			} else if ($JSungai == $batasAtassedang1S ) {
				$myuSungaiSedang = 1;
			} else {
				$myuSungaiSedang = 0;
			}

			if ($JSungai >= $batasBawahjauhS && $JSungai <= $batasAtasjauhS) {
				$myuSungaiJauh = ($JSungai-$batasBawahjauhS)/($batasAtasjauhS-$batasBawahjauhS);
			} else if ($JSungai>=$batasAtasjauhS) {
				$myuSungaiJauh = 1;
			} else {
				$myuSungaiJauh = 0;
			}


			#Untuk curah hujan
			if ($CHujan >= $batasBawahrendahH && $CHujan <= $batasAtasrendahH) {
				$myuHujanRendah = ($batasAtasrendahH - $CHujan)/($batasAtasrendahH-$batasBawahrendahH); 
			} else if ($CHujan<=$batasBawahrendahH) {
				$myuHujanRendah = 1;
			} else {
				$myuHujanRendah = 0;
			}

			if ($CHujan < $batasAtasnormal1H && $CHujan > $batasBawahnormal1H) {
				$myuHujanNormal = ($CHujan-$batasBawahnormal1H)/($batasAtasnormal1H-$batasBawahnormal1H);
			} else if ($CHujan <=$batasAtasnormal2H && $CHujan > $batasBawahnormal2H) {
				$myuHujanNormal = ($batasAtasnormal2H - $CHujan)/($batasAtasnormal2H-$batasBawahnormal2H);
			} else if ($CHujan == $batasAtasnormal1H ) {
				$myuHujanNormal = 1;
			} else {
				$myuHujanNormal = 0;
			}

			if ($CHujan <=$batasAtastinggiH && $CHujan >= $batasBawahtinggiH) {
				$myuHujanTinggi = ($CHujan-$batasBawahtinggiH)/($batasAtastinggiH-$batasBawahtinggiH);
			} else if ($CHujan>=$batasAtastinggiH) {
				$myuHujanTinggi = 1;
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
			$aturan5 = min($myuDaratRendah,$myuDaerahBanyak,$myuHujanTinggi,$myuSungaiSedang,$myuSungaiSedang);
			$aturan6 = min($myuDaratRendah,$myuDaerahBanyak,$myuHujanTinggi,$myuSungaiJauh);
			$aturan7 = min($myuDaratRendah,$myuDaerahBanyak,$myuHujanNormal,$myuHujanNormal,$myuSungaiDekat);
			$aturan8 = min($myuDaratRendah,$myuDaerahBanyak,$myuHujanNormal,$myuHujanNormal,$myuSungaiSedang,$myuDaratSedang);
			$aturan9 = min($myuDaratRendah,$myuDaerahBanyak,$myuHujanNormal,$myuHujanNormal,$myuSungaiJauh);
			$aturan10 = min($myuDaratRendah,$myuDaerahBanyak,$myuHujanRendah,$myuSungaiDekat);
			$aturan11 = min($myuDaratRendah,$myuDaerahBanyak,$myuHujanRendah,$myuSungaiSedang,$myuSungaiSedang);
			$aturan12 = min($myuDaratRendah,$myuDaerahBanyak,$myuHujanRendah,$myuSungaiJauh);
			$aturan13 = min($myuDaratRendah,$myuDaerahSedang,$myuDaerahSedang,$myuHujanTinggi,$myuSungaiDekat);
			#kecil
			$aturan14 = min($myuDaratRendah,$myuDaerahSedang,$myuDaerahSedang,$myuHujanTinggi,$myuSungaiSedang,$myuSungaiSedang);
			$aturan15 = min($myuDaratRendah,$myuDaerahSedang,$myuDaerahSedang,$myuHujanTinggi,$myuSungaiJauh);
			$aturan16 = min($myuDaratRendah,$myuDaerahSedang,$myuDaerahSedang,$myuHujanNormal,$myuHujanNormal,$myuSungaiDekat);
			$aturan17 = min($myuDaratRendah,$myuDaerahSedang,$myuDaerahSedang,$myuHujanNormal,$myuHujanNormal,$myuSungaiSedang,$myuSungaiSedang);
			$aturan18 = min($myuDaratRendah,$myuDaerahSedang,$myuDaerahSedang,$myuHujanNormal,$myuHujanNormal,$myuSungaiJauh);
			$aturan19 = min($myuDaratRendah,$myuDaerahSedang,$myuDaerahSedang,$myuHujanRendah,$myuSungaiDekat);
			$aturan20 = min($myuDaratRendah,$myuDaerahSedang,$myuDaerahSedang,$myuHujanRendah,$myuSungaiSedang,$myuSungaiSedang);
			$aturan21 = min($myuDaratRendah,$myuDaerahSedang,$myuDaerahSedang,$myuHujanRendah,$myuSungaiJauh);
			$aturan22 = min($myuDaratRendah,$myuDaerahSedikit,$myuHujanTinggi,$myuSungaiDekat);
			#dkecil
			$aturan23 = min($myuDaratRendah,$myuDaerahSedikit,$myuHujanTinggi,$myuSungaiSedang);
			$aturan24 = min($myuDaratRendah,$myuDaerahSedikit,$myuHujanTinggi,$myuSungaiJauh);
			$aturan25 = min($myuDaratRendah,$myuDaerahSedikit,$myuHujanNormal,$myuSungaiDekat);
			$aturan26 = min($myuDaratRendah,$myuDaerahSedikit,$myuHujanNormal,$myuSungaiSedang);
			$aturan27 = min($myuDaratRendah,$myuDaerahSedikit,$myuHujanNormal,$myuSungaiJauh);
			$aturan28 = min($myuDaratRendah,$myuDaerahSedikit,$myuHujanRendah,$myuSungaiDekat);
			$aturan29 = min($myuDaratRendah,$myuDaerahSedikit,$myuHujanRendah,$myuSungaiSedang);
			$aturan30 = min($myuDaratRendah,$myuDaerahSedikit,$myuHujanRendah,$myuSungaiJauh);
			$aturan31 = min($myuDaratSedang,$myuDaerahBanyak,$myuHujanTinggi,$myuSungaiDekat);
			#kecil
			$aturan32 = min($myuDaratSedang,$myuDaerahBanyak,$myuHujanTinggi,$myuSungaiSedang);
			$aturan33 = min($myuDaratSedang,$myuDaerahBanyak,$myuHujanTinggi,$myuSungaiJauh);
			$aturan34 = min($myuDaratSedang,$myuDaerahBanyak,$myuHujanNormal,$myuSungaiDekat);
			$aturan35 = min($myuDaratSedang,$myuDaerahBanyak,$myuHujanNormal,$myuSungaiSedang);
			$aturan36 = min($myuDaratSedang,$myuDaerahBanyak,$myuHujanNormal,$myuSungaiJauh);
			$aturan37 = min($myuDaratSedang,$myuDaerahBanyak,$myuHujanRendah,$myuSungaiDekat);
			$aturan38 = min($myuDaratSedang,$myuDaerahBanyak,$myuHujanRendah,$myuSungaiSedang);
			$aturan39 = min($myuDaratSedang,$myuDaerahBanyak,$myuHujanRendah,$myuSungaiJauh);
			$aturan40 = min($myuDaratSedang,$myuDaerahSedang,$myuHujanTinggi,$myuSungaiDekat);
			#kecil
			$aturan41 = min($myuDaratSedang,$myuDaerahSedang,$myuHujanTinggi,$myuSungaiSedang);
			$aturan42 = min($myuDaratSedang,$myuDaerahSedang,$myuHujanTinggi,$myuSungaiJauh);
			$aturan43 = min($myuDaratSedang,$myuDaerahSedang,$myuHujanNormal,$myuSungaiDekat);
			$aturan44 = min($myuDaratSedang,$myuDaerahSedang,$myuHujanNormal,$myuSungaiSedang);
			$aturan45 = min($myuDaratSedang,$myuDaerahSedang,$myuHujanNormal,$myuSungaiJauh);
			$aturan46 = min($myuDaratSedang,$myuDaerahSedang,$myuHujanRendah,$myuSungaiDekat);
			$aturan47 = min($myuDaratSedang,$myuDaerahSedang,$myuHujanRendah,$myuSungaiSedang);
			$aturan48 = min($myuDaratSedang,$myuDaerahSedang,$myuHujanRendah,$myuSungaiJauh);
			$aturan49 = min($myuDaratSedang,$myuDaerahSedikit,$myuHujanTinggi,$myuSungaiDekat);
			$aturan50 = min($myuDaratSedang,$myuDaerahSedikit,$myuHujanTinggi,$myuSungaiSedang);
			$aturan51 = min($myuDaratSedang,$myuDaerahSedikit,$myuHujanTinggi,$myuSungaiJauh);
			$aturan52 = min($myuDaratSedang,$myuDaerahSedikit,$myuHujanNormal,$myuSungaiDekat);
			$aturan53 = min($myuDaratSedang,$myuDaerahSedikit,$myuHujanNormal,$myuSungaiSedang);
			$aturan54 = min($myuDaratSedang,$myuDaerahSedikit,$myuHujanNormal,$myuSungaiJauh);
			$aturan55 = min($myuDaratSedang,$myuDaerahSedikit,$myuHujanRendah,$myuSungaiDekat);
			$aturan56 = min($myuDaratSedang,$myuDaerahSedikit,$myuHujanRendah,$myuSungaiSedang);
			$aturan57 = min($myuDaratSedang,$myuDaerahSedikit,$myuHujanRendah,$myuSungaiJauh);
			#besar
			$aturan58 = min($myuDaratTinggi,$myuDaerahBanyak,$myuHujanTinggi,$myuSungaiDekat);
			$aturan59 = min($myuDaratTinggi,$myuDaerahBanyak,$myuHujanTinggi,$myuSungaiSedang);
			$aturan60 = min($myuDaratTinggi,$myuDaerahBanyak,$myuHujanTinggi,$myuSungaiJauh);
			$aturan61 = min($myuDaratTinggi,$myuDaerahBanyak,$myuHujanNormal,$myuSungaiDekat);
			$aturan62 = min($myuDaratTinggi,$myuDaerahBanyak,$myuHujanNormal,$myuSungaiSedang);
			$aturan63 = min($myuDaratTinggi,$myuDaerahBanyak,$myuHujanNormal,$myuSungaiJauh);
			$aturan64 = min($myuDaratTinggi,$myuDaerahBanyak,$myuHujanRendah,$myuSungaiSedang);
			#besar
			$aturan65 = min($myuDaratTinggi,$myuDaerahSedang,$myuHujanTinggi,$myuSungaiDekat);
			$aturan66 = min($myuDaratTinggi,$myuDaerahSedang,$myuHujanTinggi,$myuSungaiSedang);
			$aturan67 = min($myuDaratTinggi,$myuDaerahSedang,$myuHujanTinggi,$myuSungaiJauh);
			$aturan68 = min($myuDaratTinggi,$myuDaerahSedang,$myuHujanNormal,$myuSungaiDekat);
			$aturan69 = min($myuDaratTinggi,$myuDaerahSedang,$myuHujanNormal,$myuSungaiSedang);
			$aturan70 = min($myuDaratTinggi,$myuDaerahSedang,$myuHujanNormal,$myuSungaiJauh);
			$aturan71 = min($myuDaratTinggi,$myuDaerahSedang,$myuHujanRendah,$myuSungaiDekat);
			$aturan72 = min($myuDaratTinggi,$myuDaerahSedang,$myuHujanRendah,$myuSungaiSedang);
			$aturan73 = min($myuDaratTinggi,$myuDaerahSedang,$myuHujanRendah,$myuSungaiJauh);
			#besar
			$aturan74 = min($myuDaratTinggi,$myuDaerahSedang,$myuHujanRendah,$myuSungaiDekat);
			$aturan75 = min($myuDaratTinggi,$myuDaerahSedikit,$myuHujanTinggi,$myuSungaiSedang);
			$aturan76 = min($myuDaratTinggi,$myuDaerahSedikit,$myuHujanNormal,$myuSungaiDekat);
			$aturan77 = min($myuDaratTinggi,$myuDaerahSedikit,$myuHujanNormal,$myuSungaiSedang);
			$aturan78 = min($myuDaratTinggi,$myuDaerahSedikit,$myuHujanNormal,$myuSungaiJauh);
			$aturan79 = min($myuDaratTinggi,$myuDaerahSedikit,$myuHujanRendah,$myuSungaiDekat);
			$aturan80 = min($myuDaratTinggi,$myuDaerahSedikit,$myuHujanRendah,$myuSungaiSedang);
			$aturan81 = min($myuDaratTinggi,$myuDaerahSedikit,$myuHujanRendah,$myuSungaiJauh);









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

			if ($aturan5 != 0) {
				$r5 = ($aturan5 * ($batasAtasTinggiRisiko - $batasBawahTinggiRisiko)) + $batasBawahTinggiRisiko;
			} else {
				$r5 = 1;
			}

			if ($aturan6 != 0) {
				$r6 = ($aturan6 * ($batasAtasTinggiRisiko - $batasBawahTinggiRisiko)) + $batasBawahTinggiRisiko;
			} else {
				$r6 = 1;
			}

			if ($aturan7 != 0) {
				$r7 = ($aturan7 * ($batasAtasTinggiRisiko - $batasBawahTinggiRisiko)) + $batasBawahTinggiRisiko;
			} else {
				$r7 = 1;
			}

			if ($aturan8 != 0) {
				$r8 = ($aturan8 * ($batasAtasTinggiRisiko - $batasBawahTinggiRisiko)) + $batasBawahTinggiRisiko;
			} else {
				$r8 = 1;
			}

			if ($aturan9 != 0) {
				$r9 = ($aturan9 * ($batasAtasTinggiRisiko - $batasBawahTinggiRisiko)) + $batasBawahTinggiRisiko;
			} else {
				$r9 = 1;
			}

			if ($aturan10 != 0) {
				$r10 = ($aturan10 * ($batasAtasTinggiRisiko - $batasBawahTinggiRisiko)) + $batasBawahTinggiRisiko;
			} else {
				$r10 = 1;
			}

			if ($aturan11 != 0) {
				$r11 = ($aturan11 * ($batasAtasTinggiRisiko - $batasBawahTinggiRisiko)) + $batasBawahTinggiRisiko;
			} else {
				$r11 = 1;
			}

			if ($aturan12 != 0) {
				$r12 = ($aturan12 * ($batasAtasTinggiRisiko - $batasBawahTinggiRisiko)) + $batasBawahTinggiRisiko;
			} else {
				$r12 = 1;
			}

			if ($aturan13 != 0) {
				$r13 = ($aturan13 * ($batasAtasTinggiRisiko - $batasBawahTinggiRisiko)) + $batasBawahTinggiRisiko;
			} else {
				$r13 = 1;
			}

			if ($aturan14 != 0) {
				$r14 = $batasAtasKecilRisiko - ($aturan14 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r14 = 1;
			}

			if ($aturan15 != 0) {
				$r15 = $batasAtasKecilRisiko - ($aturan15 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r15 = 1;
			}

			if ($aturan16 != 0) {
				$r16 = $batasAtasKecilRisiko - ($aturan16 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r16 = 1;
			}

			if ($aturan17 != 0) {
				$r17 = $batasAtasKecilRisiko - ($aturan17 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r17 = 1;
			}
			
			if ($aturan18 != 0) {
				$r18 = $batasAtasKecilRisiko - ($aturan18 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r18 = 1;
			}

			if ($aturan19 != 0) {
				$r19 = $batasAtasKecilRisiko - ($aturan19 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r19 = 1;
			}

			if ($aturan20 != 0) {
				$r20 = $batasAtasKecilRisiko - ($aturan20* ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r20 = 1;
			}

			if ($aturan21 != 0) {
				$r21 = $batasAtasKecilRisiko - ($aturan21 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r21 = 1;
			}


			if ($aturan22 != 0) {
				$r22 = ($aturan22 * ($batasAtasTinggiRisiko - $batasBawahTinggiRisiko)) + $batasBawahTinggiRisiko;
			} else {
				$r22 = 1;
			}

			if ($aturan23 != 0) {
				$r23 = $batasAtasKecilRisiko - ($aturan23 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r23 = 1;
			}

			if ($aturan24 != 0) {
				$r24 = $batasAtasKecilRisiko - ($aturan24 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r24 = 1;
			}

			if ($aturan25 != 0) {
				$r25 = $batasAtasKecilRisiko - ($aturan25 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r25 = 1;
			}

			if ($aturan26 != 0) {
				$r26 = $batasAtasKecilRisiko - ($aturan26 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r26 = 1;
			}

			if ($aturan27 != 0) {
				$r27 = $batasAtasKecilRisiko - ($aturan27 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r27 = 1;
			}

			if ($aturan28 != 0) {
				$r28 = $batasAtasKecilRisiko - ($aturan28 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r28 = 1;
			}

			if ($aturan29 != 0) {
				$r29 = $batasAtasKecilRisiko - ($aturan29 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r29 = 1;
			}

			if ($aturan30 != 0) {
				$r30 = $batasAtasKecilRisiko - ($aturan30 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r30 = 1;
			}

			if ($aturan31 != 0) {
				$r31 = $batasAtasKecilRisiko - ($aturan31 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r31 = 1;
			}

			if ($aturan32 != 0) {
				$r32 = $batasAtasKecilRisiko - ($aturan32 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r32 = 1;
			}

			if ($aturan33 != 0) {
				$r33 = $batasAtasKecilRisiko - ($aturan33 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r33 = 1;
			}

			if ($aturan34 != 0) {
				$r34 = $batasAtasKecilRisiko - ($aturan34 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r34 = 1;
			}

			if ($aturan35 != 0) {
				$r35 = $batasAtasKecilRisiko - ($aturan35 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r35 = 1;
			}

			if ($aturan36 != 0) {
				$r36 = $batasAtasKecilRisiko - ($aturan36 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r36 = 1;
			}

			if ($aturan37 != 0) {
				$r37 = $batasAtasKecilRisiko - ($aturan37 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r37 = 1;
			}

			if ($aturan38 != 0) {
				$r38 = $batasAtasKecilRisiko - ($aturan38 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r38 = 1;
			}

			if ($aturan39 != 0) {
				$r39 = $batasAtasKecilRisiko - ($aturan39 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r39 = 1;
			}

			if ($aturan40 != 0) {
				$r40 = ($aturan40 * ($batasAtasTinggiRisiko - $batasBawahTinggiRisiko)) + $batasBawahTinggiRisiko;
			} else {
				$r40 = 1;
			}

			if ($aturan41 != 0) {
				$r41 = $batasAtasKecilRisiko - ($aturan41 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r41 = 1;
			}

			if ($aturan42 != 0) {
				$r42 = $batasAtasKecilRisiko - ($aturan42 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r42 = 1;
			}

			if ($aturan43 != 0) {
				$r43 = $batasAtasKecilRisiko - ($aturan43 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r43 = 1;
			}

			if ($aturan44 != 0) {
				$r44 = $batasAtasKecilRisiko - ($aturan44 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r44 = 1;
			}

			if ($aturan45 != 0) {
				$r45 = $batasAtasKecilRisiko - ($aturan45 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r45 = 1;
			}

			if ($aturan46 != 0) {
				$r46 = $batasAtasKecilRisiko - ($aturan46 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r46 = 1;
			}

			if ($aturan47 != 0) {
				$r47 = $batasAtasKecilRisiko - ($aturan47 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r47 = 1;
			}

			if ($aturan48 != 0) {
				$r48 = $batasAtasKecilRisiko - ($aturan48 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r48 = 1;
			}

			if ($aturan49 != 0) {
				$r49 = ($Aturan49 * ($batasAtasTinggiRisiko - $batasBawahTinggiRisiko)) + $batasBawahTinggiRisiko;
			} else {
				$r49 = 1;
			}

			if ($aturan50 != 0) {
				$r50 = $batasAtasKecilRisiko - ($aturan50 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r50 = 1;
			}

			if ($aturan51 != 0) {
				$r51 = $batasAtasKecilRisiko - ($aturan51 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r51 = 1;
			}

			if ($aturan52 != 0) {
				$r52 = $batasAtasKecilRisiko - ($aturan52 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r52 = 1;
			}

			if ($aturan53 != 0) {
				$r53 = $batasAtasKecilRisiko - ($aturan53 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r53 = 1;
			}

			if ($aturan54 != 0) {
				$r54 = $batasAtasKecilRisiko - ($aturan54 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r54 = 1;
			}

			if ($aturan55 != 0) {
				$r55 = $batasAtasKecilRisiko - ($aturan55 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r55 = 1;
			}

			if ($aturan56 != 0) {
				$r56 = $batasAtasKecilRisiko - ($aturan56 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r56 = 1;
			}

			if ($aturan57 != 0) {
				$r57 = (($Aturan63 * ($batasAtasTinggiRisiko - $batasBawahTinggiRisiko)) + $batasBawahTinggiRisiko);
			} else {
				$r57 = 1;
			}

			if ($aturan58 != 0) {
				$r58 = ($Aturan58 * ($batasAtasTinggiRisiko - $batasBawahTinggiRisiko)) + $batasBawahTinggiRisiko;
			} else {
				$r58 = 1;
			}


			if ($aturan59 != 0) {
				$r59 = $batasAtasKecilRisiko - ($aturan59 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r59 = 1;
			}

			if ($aturan60 != 0) {
				$r60 = $batasAtasKecilRisiko - ($aturan60 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r60 = 1;
			}

			if ($aturan61 != 0) {
				$r61 = $batasAtasKecilRisiko - ($aturan61 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r61 = 1;
			}

			if ($aturan62 != 0) {
				$r62 = $batasAtasKecilRisiko - ($aturan62 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r62 = 1;
			}

			if ($aturan63 != 0) {
				$r63 = $batasAtasKecilRisiko - ($aturan66 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r63 = 1;
			}

			if ($aturan64 != 0) {
				$r64 = $batasAtasKecilRisiko - ($aturan64 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r64 = 1;
			}

			if ($aturan65 != 0) {
				$r65 = ($Aturan65 * ($batasAtasTinggiRisiko - $batasBawahTinggiRisiko)) + $batasBawahTinggiRisiko;
			} else {
				$r65 = 1;
			}

			if ($aturan66 != 0) {
				$r66 = $batasAtasKecilRisiko - ($aturan66 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r66 = 1;
			}

			if ($aturan67 != 0) {
				$r67 = $batasAtasKecilRisiko - ($aturan67 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r67 = 1;
			}
			if ($aturan68 != 0) {
				$r68 = $batasAtasKecilRisiko - ($aturan68 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r68 = 1;
			}
			if ($aturan69 != 0) {
				$r69 = $batasAtasKecilRisiko - ($aturan69 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r69 = 1;
			}
			if ($aturan70 != 0) {
				$r70 = $batasAtasKecilRisiko - ($aturan70 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r70 = 1;
			}
			if ($aturan71 != 0) {
				$r71 = $batasAtasKecilRisiko - ($aturan71 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r71 = 1;
			}
			if ($aturan72 != 0) {
				$r72 = $batasAtasKecilRisiko - ($aturan72 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r72 = 1;
			}
			if ($aturan73 != 0) {
				$r73 = $batasAtasKecilRisiko - ($aturan73 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r73 = 1;
			}

			if ($aturan74 != 0) {
				$r74 = ($Aturan74 * ($batasAtasTinggiRisiko - $batasBawahTinggiRisiko)) + $batasBawahTinggiRisiko;
			} else {
				$r74 = 1;
			}

			if ($aturan75 != 0) {
				$r75 = $batasAtasKecilRisiko - ($aturan75 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r75 = 1;
			}

			if ($aturan76 != 0) {
				$r76 = $batasAtasKecilRisiko - ($aturan76 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r76 = 1;
			}

			if ($aturan77 != 0) {
				$r77 = $batasAtasKecilRisiko - ($aturan77 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r77 = 1;
			}

			if ($aturan78 != 0) {
				$r78 = $batasAtasKecilRisiko - ($aturan78 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r78 = 1;
			}

			if ($aturan79 != 0) {
				$r79 = $batasAtasKecilRisiko - ($aturan79 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r79 = 1;
			}

			if ($aturan80 != 0) {
				$r80 = $batasAtasKecilRisiko - ($aturan80 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r80 = 1;
			}

			if ($aturan81 != 0) {
				$r81 = $batasAtasKecilRisiko - ($aturan81 * ($batasAtasKecilRisiko - $batasBawahKecilRisiko));
			} else {
				$r81 = 1;
			}


			$hasil1 = (($r1*$AturanPertama)+($r2*$AturanKedua) + ($r3*$AturanKetiga) + ($r4 * $AturanKeempat) + ($r5 * $aturan5)+ ($r6 * $aturan6)+ ($r7 * $aturan7)+ ($r8 * $aturan8)+ ($r9 * $aturan9)+ ($r10 * $aturan10) + ($r11*$aturan11) + ($r12*$aturan12) + ($r13*$aturan13) + ($r14*$aturan14) + ($r15*$aturan15) + ($r16*$aturan16) + ($r17*$aturan17) + ($r18*$aturan18) + ($r19*$aturan19) + ($r20*$aturan20) + ($r21*$aturan21) + ($r22*$aturan22) + ($r23*$aturan23) + ($r24*$aturan24) + ($r25*$aturan25) + ($r26*$aturan26) + ($r27*$aturan27) + ($r28*$aturan28) + ($r29*$aturan29) + ($r30*$aturan30) + ($r31*$aturan31) + ($r32*$aturan32) + ($r33*$aturan33) + ($r34*$aturan34) + ($r35*$aturan35) + ($r36*$aturan36) + ($r37*$aturan37) + ($r38*$aturan38) + ($r39*$aturan39) + ($r40*$aturan40) + ($r41*$aturan42) + ($r43*$aturan42) + ($r44*$aturan44) + ($r45*$aturan45) + ($r46*$aturan46) + ($r47*$aturan47) + ($r48*$aturan48) + ($r49*$aturan49) + ($r50*$aturan50) + ($r51*$aturan51) + ($r52*$aturan52) + ($r53*$aturan53) + ($r54*$aturan54) + ($r55*$aturan55) + ($r56*$aturan56) + ($r57*$aturan57) + ($r58*$aturan58) + ($r59*$aturan59) + ($r60*$aturan60) + ($r61*$aturan61) + ($r62*$aturan62) + ($r63*$aturan63) + ($r64*$aturan64) + ($r65*$aturan65) + ($r66*$aturan66) + ($r67*$aturan67) + ($r68*$aturan68) + ($r69*$aturan69) + ($r70*$aturan70) + ($r71*$aturan71) + ($r72*$aturan72) + ($r73*$aturan73) + ($r74*$aturan74) + ($r75*$aturan75) + ($r76*$aturan76) + ($r77*$aturan77) + ($r78*$aturan78) + ($r79*$aturan79) + ($r80*$aturan80) + ($r81*$aturan81))/($AturanPertama+$AturanKedua+$AturanKetiga+$AturanKeempat+$aturan5+$aturan6+$aturan7+$aturan8+$aturan9+$aturan10+$aturan11+$aturan12+$aturan13+$aturan14+$aturan15+$aturan16+$aturan17+$aturan18+$aturan19+$aturan20+$aturan21+$aturan22+$aturan23+$aturan24+$aturan25+$aturan26+$aturan27+$aturan28+$aturan29+$aturan30+$aturan31+$aturan32+$aturan33+$aturan34+$aturan35+$aturan36+$aturan37+$aturan38+$aturan39+$aturan40+$aturan41+$aturan42+$aturan43+$aturan44+$aturan45+$aturan46+$aturan47+$aturan48+$aturan49+$aturan50+$aturan51+$aturan52+$aturan53+$aturan54+$aturan55+$aturan56+$aturan57+$aturan58+$aturan59+$aturan60+$aturan61+$aturan62+$aturan63+$aturan64+$aturan65+$aturan66+$aturan67+$aturan68+$aturan69+$aturan70+$aturan71+$aturan72+$aturan73+$aturan74+$aturan75+$aturan76+$aturan77+$aturan78+$aturan79+$aturan80+$aturan81);
			$hasil2 = 100 - $hasil1;

			$data = array(
				'hasil1' 					=> $hasil1,
				'hasil2'					=> $hasil2,
				'tinggi_permukaan' 			=> $TPermukaan,
				'jumlah_daerahT'			=> $BDaerah,
				'jarak_sungai' 				=> $JSungai,
				'curah_hujan'				=> $CHujan
			);

			// Masukkan ke DB
			
			$insertM = $this->M_edit->inputM($data, 'masukan');
			if ($session['login']=true) {
				redirect(base_url().'Pakar/tampilHasil');
			} else {
				redirect(base_url().'BasisPengetahuan/tampilHasil');	
			}

		}
    }
}