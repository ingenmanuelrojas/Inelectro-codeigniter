<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

	private $permisos;
	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib_admin->control();
		$this->load->model('administrador/CategoriaModel');
	}

	public function index(){
		$data = array(
			'permisos'  => $this->permisos,
			'listado'   => $this->CategoriaModel->getCategorias(),
		);

		$this->load->view('administrador/layouts/header');
		$this->load->view('administrador/layouts/aside');
		$this->load->view('administrador/categorias',$data);
		$this->load->view('administrador/layouts/footer');
	}

	public function store(){
		$nombre = $this->input->post('txt_nombre');
		$descripcion = $this->input->post('txt_descripcion');

		$data = array(
			'nombre' => $nombre, 
			'descripcion' => $descripcion, 
		);

		$respuesta = $this->CategoriaModel->save($data);

		if ($respuesta) {
			$data = array(
				'mensaje' => "Categoría almacenada con exito.",
				'resp'    => true
			);
			echo json_encode($data);
		}else{
			$data = array(
				'mensaje' => "Ocurrio un error al guardar la categoría.",
				'resp'    => false
			);
			echo json_encode($data);
		}
	}

	public function update(){
		$id = $this->input->post('txt_id');
		$nombre = $this->input->post('txt_nombre');
		$descripcion = $this->input->post('txt_descripcion');

		$data = array(
			'nombre' => $nombre, 
			'descripcion' => $descripcion, 
		);

		$respuesta = $this->CategoriaModel->update($data,$id);

		if ($respuesta) {
			$data = array(
				'mensaje' => "Categoría editada con exito.",
				'resp'    => true
			);
			echo json_encode($data);
		}else{
			$data = array(
				'mensaje' => "Ocurrio un error al editar la categoría.",
				'resp'    => false
			);
			echo json_encode($data);
		}
	}

	public function delete(){
		$id = $this->input->post('id');
		$respuesta = $this->CategoriaModel->delete($id);
		echo json_encode($respuesta);
	}

	public function getAll(){
		$respuesta = $this->CategoriaModel->getCategorias();
		echo json_encode($respuesta);
	}


	public function search(){
		$id = $this->input->post('id');
		$respuesta = $this->CategoriaModel->getCategoria($id);
		echo json_encode($respuesta);
	}

}

/* End of file CategoriaController.php */
/* Location: ./application/controllers/CategoriaController.php */