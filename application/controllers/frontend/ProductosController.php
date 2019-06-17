<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProductosController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('administrador/nosotros_model');
		$this->load->model('administrador/contacto_model');
		$this->load->model('administrador/banner_model');
		$this->load->model('administrador/CategoriaModel');
		$this->load->model('administrador/productos_model');
	}

	public function index(){
		$data = array(
			'nosotros'         => $this->nosotros_model->get_datos(),
			'contacto'         => $this->contacto_model->get_datos(),
			'banner_productos' => $this->banner_model->get_banner(7), 
			'categorias'       => $this->CategoriaModel->getCategorias(),
			'productos'        => $this->productos_model->getTodos(),
		);

		$this->load->view('frontend/layout/header');
		$this->load->view('frontend/layout/menu');
		$this->load->view('frontend/productos',$data);
		$this->load->view('frontend/layout/footer');
	}

	public function get_productos_categoria(){
		$id = $this->input->post('id');
		$resultado = $this->productos_model->get_productos_categoria($id);
		echo json_encode($resultado);
	}

	public function buscador(){
		$texto = $this->input->post('texto');
		$resultado = $this->productos_model->buscador($texto);
		echo json_encode($resultado);
	}

}