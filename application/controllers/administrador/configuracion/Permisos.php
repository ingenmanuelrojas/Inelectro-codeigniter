<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permisos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('administrador/permisos_model');
		$this->load->model('administrador/usuarios_model');
	}

	public function index(){
		$data = array(
			'permisos'  => $this->permisos_model->getPermisos(),
			'roles'  => $this->usuarios_model->getRoles(),
			'menus'  => $this->permisos_model->getMenus()
		);

		$this->load->view('administrador/layouts/header');
		$this->load->view('administrador/layouts/aside');
		$this->load->view('administrador/configuracion/permisos/permisos',$data);
		$this->load->view('administrador/layouts/footer');
	}

	public function add(){
		$data = array(
			'roles'  => $this->usuarios_model->getRoles(),
			'menus'  => $this->permisos_model->getMenus()
		);

		$this->load->view('administrador/layouts/header');
		$this->load->view('administrador/layouts/aside');
		$this->load->view('administrador/configuracion/permisos/add',$data);
		$this->load->view('administrador/layouts/footer');
	}

	public function store(){
		$rol      = $this->input->post("cmb_rol");
		$menu     = $this->input->post("cmb_menu");
		$leer     = $this->input->post("rd_leer");
		$agregar  = $this->input->post("rd_agregar");
		$editar   = $this->input->post("rd_editar");
		$eliminar = $this->input->post("rd_eliminar");

		$data = array(
			'rol_id'  => $rol, 
			'menu_id' => $menu,
			'read'    => $leer,
			'insert'  => $agregar,
			'update'  => $editar, 
			'delete'  => $eliminar
		);	

		if ($this->permisos_model->save($data)) {
			$data = array(
				'mensaje' => "Permiso creado con exito.",
				'resp'    => true
			);
			echo json_encode($data);
		}else{
			$data = array(
				'mensaje' => "Error al crear el permiso",
				'resp'    => false
			);
			echo json_encode($data);
		}
	}

	public function edit($id=null){
		$data = $this->permisos_model->getPermisoPorId($id);
		echo json_encode($data);
	}

	public function listado_permisos(){
		$listado_permisos = $this->permisos_model->getPermisos();
		echo json_encode($listado_permisos);
	}

	public function update(){
		$id       = $this->input->post("txt_id");
		$leer     = $this->input->post("rd_leer");
		$agregar  = $this->input->post("rd_agregar");
		$editar   = $this->input->post("rd_editar");
		$eliminar = $this->input->post("rd_eliminar");
			
		$data = array(
			'read'    => $leer,
			'insert'  => $agregar,
			'update'  => $editar, 
			'delete'  => $eliminar
		);

		if ($this->permisos_model->update($id,$data)) {
			$data = array(
				'mensaje' => "Permiso editado con exito.",
				'resp'    => true
			);
			echo json_encode($data);
		}else{
			$data = array(
				'mensaje' => "Error al editar el permiso.",
				'resp'    => false
			);
			echo json_encode($data);
		}
	
	}

	public function delete($id){
		if ($this->permisos_model->delete($id)) {
			$data = array(
				'mensaje' => "Permiso Eliminado con Exito.",
				'resp'    => true
			);
			echo json_encode($data);
		}else{
			$data = array(
				'mensaje' => "Error al eliminar el Permiso.",
				'resp'    => false
			);
			echo json_encode($data);
		}
	}

}

