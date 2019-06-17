<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos_model extends CI_Model {

	public function getAll(){
		$this->db->select('a.*, b.nombre AS categoria');
		$this->db->from('mae_productos a');
		$this->db->join('mae_categoria b', 'a.id_categoria = b.id');
		$this->db->order_by('a.id', 'desc');

		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function getId($id){
		$this->db->select('*');
		$this->db->from('mae_productos');
		$this->db->where('id', $id);

		$resultado = $this->db->get();
		return $resultado->row(); 
	}

	public function save($data){
		return $this->db->insert('mae_productos', $data);
	}

	public function update($data,$id){
		$this->db->where('id', $id);
		return $this->db->update('mae_productos', $data);
	}

	public function delete($id){
		$this->db->where('id', $id);
		return $this->db->delete('mae_productos');
	}

	public function delete_image($id){
		$this->db->where('id', $id);
		return $this->db->delete('mae_images');
	}

	public function save_image($data){
		return $this->db->insert('mae_images', $data);
	}

	public function galeria($id){
		$this->db->select('*');
		$this->db->from('mae_images');
		$this->db->where('id_producto', $id);
		$this->db->order_by('orden', 'asc');

		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function buscar_orden($id,$orden){
		$this->db->select('*');
		$this->db->from('mae_images');
		$this->db->where('id_producto', $id);
		$this->db->where('orden', $orden);

		$resultado = $this->db->get();
		return $resultado->row();
	}


	/*QUERYS FRONTEND*/
	public function getTodos(){
		$this->db->select('a.*, b.nombre AS categoria, c.image');
		$this->db->from('mae_productos a');
		$this->db->join('mae_categoria b', 'a.id_categoria = b.id');
		$this->db->join('mae_images c', 'a.id = c.id_producto');
		$this->db->order_by('a.id', 'DESC');
		$this->db->group_by('a.id');

		$resultado = $this->db->get();
		return $resultado->result();
	}	

	public function getUltimos(){
		$this->db->select('a.*, b.nombre AS categoria, c.image');
		$this->db->from('mae_productos a');
		$this->db->join('mae_categoria b', 'a.id_categoria = b.id');
		$this->db->join('mae_images c', 'a.id = c.id_producto');
		$this->db->order_by('a.fecha_hora', 'DESC');
		$this->db->group_by('a.id');

		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function getMasVendidos(){
		$this->db->select('a.*, b.nombre AS categoria, c.image');
		$this->db->from('mae_productos a');
		$this->db->join('mae_categoria b', 'a.id_categoria = b.id');
		$this->db->join('mae_images c', 'a.id = c.id_producto');
		$this->db->where('a.estatus', 'Mas Vendidos');
		$this->db->order_by('a.fecha_hora', 'DESC');
		$this->db->group_by('a.id');

		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function get_productos_categoria($id){
		$this->db->select('a.*, b.nombre AS categoria, c.image');
		$this->db->from('mae_productos a');
		$this->db->join('mae_categoria b', 'a.id_categoria = b.id');
		$this->db->join('mae_images c', 'a.id = c.id_producto');
		$this->db->where('a.id_categoria', $id);
		$this->db->order_by('a.fecha_hora', 'DESC');
		$this->db->group_by('a.id');

		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function buscador($texto){
		$this->db->select('a.*, b.nombre AS categoria, c.image');
		$this->db->from('mae_productos a');
		$this->db->join('mae_categoria b', 'a.id_categoria = b.id');
		$this->db->join('mae_images c', 'a.id = c.id_producto');
		$this->db->like('a.nombre', $texto, 'BOTH');
		$this->db->order_by('a.fecha_hora', 'DESC');
		$this->db->group_by('a.id');

		$resultado = $this->db->get();
		return $resultado->result();
	}

}