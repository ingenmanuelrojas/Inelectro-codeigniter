<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model {

	public function buscar_orden($orden){
		$this->db->select('*');
		$this->db->from('mae_slider');
		$this->db->where('orden', $orden);

		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function save_image($data){
		return $this->db->insert('mae_slider', $data);
	}

	public function getAll(){
		$this->db->select('*');
		$this->db->from('mae_slider');
		$this->db->order_by('orden', 'asc');

		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function delete($id){
		$this->db->where('id', $id);
		return $this->db->delete('mae_slider');
	}

}