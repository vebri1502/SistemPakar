<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function ceklogin($user, $pass)
	{
		
		$hasil=$this->db->where('username', $user)
						->where('pass',$pass)
						->limit(1)
						->get('pakar')
						->row();

		if(count($hasil)) {
			$session=['login'=>true, 'id_pakar'=>$hasil->id_pakar, 'nama'=>$hasil->nama, 'username'=>$hasil->username];

			$this->session->set_userdata($session);
			return true;
		} else {
			return false;
		}

		// $this->db->where('username', $user);	
		// $this->db->where('password', $pass);
		// return $this->db->get('petugas')->row();
	}


}
?>