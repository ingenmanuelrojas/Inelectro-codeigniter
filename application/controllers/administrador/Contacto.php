<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Controller {

	private $permisos;
	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib_admin->control();
		$this->load->model('administrador/contacto_model');
	}

	public function index(){
		$data = array(
			'permisos' => $this->permisos,
			'datos'    => $this->contacto_model->get_datos()
		);

		$this->load->view('administrador/layouts/header');
		$this->load->view('administrador/layouts/aside');
		$this->load->view('administrador/contacto',$data);
		$this->load->view('administrador/layouts/footer');
	}

	public function update(){
		$direccion   = $this->input->post('txt_direccion');
		$correo      = $this->input->post('txt_correo');
		$telefono    = $this->input->post('txt_telefono');
		$descripcion = $this->input->post('txt_descripcion');

		$data = array(
			'direccion'   => $direccion,
			'correo'      => $correo,
			'telefono'    => $telefono,
			'descripcion' => $descripcion
		);

		if ($this->contacto_model->actualizar($data)) {
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