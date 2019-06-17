<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ContactoController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('administrador/nosotros_model');
		$this->load->model('administrador/contacto_model');
		$this->load->model('administrador/banner_model');
	}

	public function index(){
		$data = array(
			'nosotros'        => $this->nosotros_model->get_datos(),
			'contacto'        => $this->contacto_model->get_datos(),
			'banner_contacto' => $this->banner_model->get_banner(8), 
		);

		$this->load->view('frontend/layout/header');
		$this->load->view('frontend/layout/menu');
		$this->load->view('frontend/contacto',$data);
		$this->load->view('frontend/layout/footer');
	}

}