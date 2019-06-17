<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_model extends CI_Model {

	public function getAll(){
		$this->db->select('*');
		$this->db->from('mae_banners');

		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function get_banner($id){
		$this->db->select('*');
		$this->db->from('mae_banners');
		$this->db->where('id', $id);

		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function save_banner($data,$id){
		$this->db->where('id', $id);
		return $this->db->update('mae_banners', $data);
	}

}