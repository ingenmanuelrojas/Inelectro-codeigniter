<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	public function login($username,$password){
		$this->db->where("username",$username);
		$this->db->where("password",$password);
		$this->db->where("tipo",1);

		$resultados = $this->db->get("usuarios");

		if ($resultados->num_rows() > 0) {
			return $resultados->row();//Se usa el row porque solo retornara un registro
		}else{
			return false;
		}
	}

	public function getUsuarios(){
		$this->db->select('a.*,b.descripcion AS rol');
		$this->db->from('usuarios a');
		$this->db->join('mae_codigos b', 'a.rol = b.id');
		$this->db->where('b.codigo_tabla', 'RO');
		$this->db->where('a.estado',1);
		$this->db->where('a.tipo',1);

		$resultado = $this->db->get();
		return $resultado->result(); 
	}

	public function getUsuarioPorId($id){
		$this->db->select('a.*,b.descripcion');
		$this->db->from('usuarios a');
		$this->db->join('mae_codigos b', 'a.rol = b.id');
		$this->db->where('b.codigo_tabla', 'RO');
		$this->db->where("a.id",$id);
		$this->db->where("a.estado","1");

		$resultado = $this->db->get();
		return $resultado->row(); 
	}

	public function getRoles(){
		$this->db->select('*');
		$this->db->from('mae_codigos');
		$this->db->where('codigo_tabla', 'RO');

		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function save($data){
		return $this->db->insert('usuarios', $data);
	}

	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("usuarios",$data);
	}

}