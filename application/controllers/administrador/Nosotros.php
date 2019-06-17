<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nosotros extends CI_Controller {

	private $permisos;
	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib_admin->control();
		$this->load->model('administrador/nosotros_model');
	}

	public function index(){
		$data = array(
			'permisos' => $this->permisos,
			'datos'    => $this->nosotros_model->get_datos()
		);

		$this->load->view('administrador/layouts/header');
		$this->load->view('administrador/layouts/aside');
		$this->load->view('administrador/nosotros',$data);
		$this->load->view('administrador/layouts/footer');
	}

	public function update(){
		$quienes_somos    = $this->input->post('txt_quienes_somos');
		$mision           = $this->input->post('txt_mision');
		$vision           = $this->input->post('txt_vision');
		$porque_elegirnos = $this->input->post('txt_porque_elegirnos');

		$data = array(
			'quienes_somos'    => $quienes_somos,
			'mision'           => $mision,
			'vision'           => $vision,
			'porque_elegirnos' => $porque_elegirnos
		);

		if ($this->nosotros_model->update($data)) {
			$data = array(
				'mensaje' => "Datos actualizados con exito.",
				'resp'    => true
			);
			echo json_encode($data);
		}else{
			$data = array(
				'mensaje' => "Ocurrio un error al editar los datos.",
				'resp'    => false
			);
			echo json_encode($data);
		}
	}

}