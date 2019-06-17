<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto_model extends CI_Model {

	public function get_datos(){
		$this->db->select('*');
		$this->db->from('mae_contacto');

		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function actualizar($data){
		$this->db->where('id', 1);
		return $this->db->update('mae_contacto', $data);
	}

}

/* End of file Contacto_model.php */
/* Location: ./application/models/Contacto_model.php */