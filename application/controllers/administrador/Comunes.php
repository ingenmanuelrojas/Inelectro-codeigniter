<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comunes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('administrador/comunes_model');
	}

}

/* End of file Comunes.php */
/* Location: ./application/controllers/Comunes.php */