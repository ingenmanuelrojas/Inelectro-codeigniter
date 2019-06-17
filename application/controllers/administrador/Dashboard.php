<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('administrador/dashboard_model');

		if (!$this->session->userdata("login")) {
			redirect(base_url()."administrador");
		}
	}

	public function index(){
		$this->load->view('administrador/layouts/header');
		$this->load->view('administrador/layouts/aside');
		$this->load->view('administrador/dashboard');
		$this->load->view('administrador/layouts/footer');
	}
}