<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model {

	public function get_id($link){
		$this->db->like('link', $link);
		$resultado = $this->db->get('menus_admin');
		return $resultado->row();
	}

	public function get_permisos($menu,$rol){
		$this->db->where('menu_id', $menu);
		$this->db->where('rol_id', $rol);
		$resultado = $this->db->get('permisos_admin');
		return $resultado->row();
	}

	public function getParents($rol){
		$this->db->select("m.*");
		$this->db->from("menus_admin m");
		$this->db->join("permisos_admin p", "p.menu_id = m.id");
		$this->db->where("p.rol_id",$rol);
		$this->db->where("p.read","1");
		$this->db->where("m.parent","0");

		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
			echo $this->db->last_query();
		}else{
			return false;
		}
	}

	public function getParents_admin($rol){
		$this->db->select("m.*");
		$this->db->from("menus_admin m");
		$this->db->join("permisos_admin p", "p.menu_id = m.id");
		$this->db->where("p.rol_id",$rol);
		$this->db->where("p.read","1");
		$this->db->where("m.parent","0");

		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
			echo $this->db->last_query();
		}else{
			return false;
		}
	}

	public function getChildren($rol,$idMenu){
		$this->db->select("m.*");
		$this->db->from("menus_admin m");
		$this->db->join("permisos_admin p", "p.menu_id = m.id");
		$this->db->where("p.rol_id",$rol);
		$this->db->where("p.read","1");
		$this->db->where("m.parent",$idMenu);

		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else{
			return false;
		}
	}

	public function getMenu(){
		$this->db->select('*');
		$this->db->from('mae_codigos');
		$this->db->where('codigo_tabla', 'ME');

		$resultado = $this->db->get();
		return $resultado->result();
	}

}

/* End of file Backend_model.php */
/* Location: ./application/models/Backend_model.php */