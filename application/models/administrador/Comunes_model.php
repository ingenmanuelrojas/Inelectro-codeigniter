<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comunes_model extends CI_Model {

	public function get_departamentos(){
		$this->db->select('*');	
		$this->db->from('mae_departamentos');
		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function get_provincias($cod_departamento){
		$this->db->select('*');	
		$this->db->from('mae_provincias');
		$this->db->where('referencia', $cod_departamento);
		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function get_distritos($cod_provincia){
		$this->db->select('*');	
		$this->db->from('mae_distritos');
		$this->db->where('referencia', $cod_provincia);
		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function get_nacionalidades(){
		$this->db->select('*');	
		$this->db->from('mae_paises');
		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function save_direccion($data_direccion){
		return $this->db->insert('mae_direccion', $data_direccion);
	}

	public function update_direccion($id, $data_direccion){
		$this->db->where('referencia', $id);
		return $this->db->update('mae_direccion', $data_direccion);
	}

	public function get_categorias(){
		$this->db->select('*');	
		$this->db->from('mae_codigos');
		$this->db->where('codigo_tabla', 'CT');
		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function get_grados(){
		$this->db->select('*');	
		$this->db->from('mae_codigos');
		$this->db->where('codigo_tabla', 'GR');
		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function get_tipo_categorias(){
		$this->db->select('*');	
		$this->db->from('mae_codigos');
		$this->db->where('codigo_tabla', 'TP');
		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function get_categorias_por_tipo($tipo){
		$this->db->select('*');
		$this->db->from('mae_codigos');
		$this->db->where('codigo_tabla', 'CT');
		$this->db->where('referencia', $tipo);

		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function get_torneos(){
		$this->db->select('a.*, date_add(a.fecha_fin, INTERVAL -1 DAY) AS fecha_fin, b.descripcion AS grado, c.descripcion AS tipo_categoria');
		$this->db->from('mae_torneo a');
		$this->db->join('mae_codigos b', 'a.grado = b.id');
		$this->db->join('mae_codigos c', 'a.tipo_categoria = c.id');
		$this->db->where('b.codigo_tabla', 'GR');
		$this->db->where('c.codigo_tabla', 'TP');
		$this->db->order_by('a.fecha_inicio', 'desc');

		$resultado = $this->db->get();
		return $resultado->result();
	}

}
