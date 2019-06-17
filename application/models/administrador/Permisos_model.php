<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permisos_model extends CI_Model {

	public function getPermisos(){
		$this->db->select('a.*, b.nombre AS menu, c.descripcion AS rol');
		$this->db->from('permisos_admin a');
		$this->db->join('mae_codigos c', 'a.rol_id = c.id');
		$this->db->join('menus_admin b', 'a.menu_id = b.id');
		$this->db->where('c.codigo_tabla', 'RO');

		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function getPermisoPorId($id){
		$this->db->select('a.*, b.nombre AS menu, b.id AS menu_id, c.descripcion AS rol, c.id AS rol_id');
		$this->db->from('permisos_admin a');
		$this->db->join('mae_codigos c', 'a.rol_id = c.id');
		$this->db->join('menus_admin b', 'a.menu_id = b.id');
		$this->db->where('c.codigo_tabla', 'RO');
		$this->db->where('a.id', $id);

		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getMenus(){
		$resultados = $this->db->get('menus_admin');
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert('permisos_admin', $data);
	}

	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("permisos_admin",$data);
	}

	public function delete($id){
		$this->db->where('id', $id);
		return $this->db->delete('permisos_admin');
	}
}

/* End of file Permisos_model.php */
/* Location: ./application/models/Permisos_model.php */