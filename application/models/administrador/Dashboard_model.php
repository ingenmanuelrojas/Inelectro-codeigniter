<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function cant_comunicados(){
		$anio = date("Y");

		$this->db->select('count(id) AS total_comunicados');
		$this->db->from('mov_comunicados_pdf');
		$this->db->where('YEAR(fecha)', $anio);

		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function cant_noticias(){
		$anio = date("Y");

		$this->db->select('count(id) AS total_noticias');
		$this->db->from('mov_noticias');
		$this->db->where('YEAR(fecha)', $anio);

		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function cant_mensajes(){
		$anio = date("Y");

		$this->db->select('count(id) AS total_mensajes');
		$this->db->from('mae_contacto');
		$this->db->where('YEAR(fecha_hora)', $anio);

		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function cant_clubes(){
		$this->db->select('count(id) AS total_clubes');
		$this->db->from('clubes');

		$resultado = $this->db->get();
		return $resultado->row();
	}

}

/* End of file Dashboard_model.php */
/* Location: ./application/models/administrador/Dashboard_model.php */