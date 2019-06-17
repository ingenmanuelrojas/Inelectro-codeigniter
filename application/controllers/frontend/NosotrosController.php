<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NosotrosController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('administrador/nosotros_model');
		$this->load->model('administrador/contacto_model');
		$this->load->model('administrador/banner_model');
	}

	public function index(){
		$data = array(
			'nosotros' => $this->nosotros_model->get_datos(),
			'contacto' => $this->contacto_model->get_datos(),
			'banner_nosotros' => $this->banner_model->get_banner(6), 
		);
		$this->load->view('frontend/layout/header');
		$this->load->view('frontend/layout/menu');
		$this->load->view('frontend/nosotros',$data);
		$this->load->view('frontend/layout/footer');
	}

}

/* End of file NosotrosController.php */
/* Location: ./application/controllers/NosotrosController.php */