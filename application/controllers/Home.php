<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('administrador/slider_model');
		$this->load->model('administrador/productos_model');
		$this->load->model('administrador/nosotros_model');
		$this->load->model('administrador/banner_model');
		$this->load->model('administrador/contacto_model');
	}

	public function index(){
		$data = array(
			'sliders'       => $this->slider_model->getAll(),
			'ultimos'       => $this->productos_model->getUltimos(),
			'vendidos'      => $this->productos_model->getMasVendidos(),
			'banner_porque' => $this->banner_model->get_banner(1),
			'promocion_1'   => $this->banner_model->get_banner(2),
			'promocion_2'   => $this->banner_model->get_banner(3),
			'promocion_3'   => $this->banner_model->get_banner(4),
			'nosotros'      => $this->nosotros_model->get_datos(),
			'contacto'      => $this->contacto_model->get_datos(),
		);

		$this->load->view('frontend/layout/header');
		$this->load->view('frontend/layout/menu');
		$this->load->view('frontend/index',$data);
		$this->load->view('frontend/layout/footer');
	}
}
