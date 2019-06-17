<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoriaModel extends CI_Model {

	public function getCategorias(){
		$this->db->select('*');
		$this->db->from('mae_categoria');

		$resultado = $this->db->get();
		return $resultado->result(); 
	}

	public function save($data){
		return $this->db->insert('mae_categoria', $data);
	}

	public function update($data,$id){
		$this->db->where('id', $id);
		return $this->db->update('mae_categoria', $data);
	}

	public function delete($id){
		$this->db->where('id', $id);
		return $this->db->delete('mae_categoria');
	}

	public function getCategoria($id){
		$this->db->select('*');
		$this->db->from('mae_categoria');
		$this->db->where('id', $id);

		$resultado = $this->db->get();
		return $resultado->row(); 
	}
}

/* End of file CategoriaModel.php */
/* Location: ./application/models/administrador/CategoriaModel.php */