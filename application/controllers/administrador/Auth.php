<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("administrador/usuarios_model");
	}

	public function index(){
		if ($this->session->userdata("login")) {
			redirect(base_url()."administrador/dashboard");
		}else{
			$this->load->view('administrador/login');
		}
	}

	public function login(){
		$username = $this->input->post("txt_username");
		$password = $this->input->post("txt_password");

		$resp = $this->usuarios_model->login($username, sha1($password));

		if (!$resp) {
			$this->session->set_flashdata("error","Usuario y contraseña son incorrectos...");
			redirect(base_url()."administrador");
		}else{
			$data = array(
				'id'       => $resp->id, 
				'nombre'   => $resp->nombres,
				'apellido' => $resp->apellidos,
				'email'    => $resp->email, 
				'imagen'   => $resp->imagen, 
				'rol'      => $resp->rol, 
				'login'    => TRUE, //ES LA QUE SE CARGA EN EL IF DEL METODO INDEX
			);
			$this->session->set_userdata($data);
			redirect(base_url()."administrador/dashboard");
		}
	}

	public function logout(){
		//$this->session->sess_destroy();
		$this->session->unset_userdata('login');
		redirect(base_url()."administrador");
	}
}