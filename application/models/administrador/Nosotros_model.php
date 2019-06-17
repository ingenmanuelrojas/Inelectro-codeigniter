<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nosotros_model extends CI_Model {

	public function get_datos(){
		$this->db->select('*');
		$this->db->from('mae_nosotros');

		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function update($data){
		$this->db->where('id', 1);
		return $this->db->update('mae_nosotros', $data);
	}

}
