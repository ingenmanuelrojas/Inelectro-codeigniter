<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	private $permisos;
	public function __construct()
	{
		parent::__construct();
		$this->permisos = $this->backend_lib_admin->control();
		$this->load->model('administrador/usuarios_model');
	}

	public function index(){
		$data = array(
			'permisos'  => $this->permisos, 
			'usuarios'  => $this->usuarios_model->getUsuarios(),
			'roles'     => $this->usuarios_model->getRoles()
		);

		$this->load->view('administrador/layouts/header');
		$this->load->view('administrador/layouts/aside');
		$this->load->view('administrador/configuracion/usuarios/usuarios',$data);
		$this->load->view('administrador/layouts/footer');
	}

	public function add(){
		$data = array(
			'roles'  => $this->usuarios_model->getRoles()
		);

		$this->load->view('administrador/layouts/header');
		$this->load->view('administrador/layouts/aside');
		$this->load->view('administrador/configuracion/usuarios/add',$data);
		$this->load->view('administrador/layouts/footer');
	}

	public function store(){

		$nombre   = strtoupper($this->input->post("txt_nombre"));
		$apellido = strtoupper($this->input->post("txt_apellido"));
		$telefono = $this->input->post("txt_telefono");
		$email    = $this->input->post("txt_email");
		$usuario  = $this->input->post("txt_usuario");
		$clave    = sha1($this->input->post("txt_clave"));
		$rol      = $this->input->post("cmb_rol");

		//Primero subimos el archivo
	 	$config['upload_path']   = './assets/uploads/usuarios/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name']  = true;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('txt_file_img')){	

            $data = array(
				'nombres'   => $nombre, 
				'apellidos' => $apellido,
				'telefono'  => $telefono,
				'email'     => $email,
				'username'  => $usuario, 
				'password'  => $clave,
				'rol'       => $rol,
				'estado'    => 1,
				'tipo'      => 1
			);	

			if ($this->usuarios_model->save($data)) {
				
				$data = array(
					'mensaje' => "Usuario creado con exito, sin imagen de perfil.",
					'resp'    => true
				);
				echo json_encode($data);
			}
        }else{
        	//Obtener el nombre del archivo
            $img = $this->upload->data();
            $file_name = $img['file_name'];

            $data = array(
				'nombres'   => $nombre, 
				'apellidos' => $apellido,
				'telefono'  => $telefono,
				'email'     => $email,
				'imagen'    => $file_name,
				'username'  => $usuario, 
				'password'  => $clave,
				'rol'       => $rol,
				'estado'    => 1,
				'tipo'      => 1
			);	

			if ($this->usuarios_model->save($data)) {
				$ruta   = "assets/uploads/usuarios/";
            	$width  = 80;
            	$height = 80;

            	//Redimensionar la Imagen
				if ($this->resize_img($file_name,$width,$height,$ruta) == false){

			        $data = array(
						'mensaje' => "Error al redimensionar la imagen.",
						'resp'    => false
					);

					echo json_encode($data);

				}else{
					$data = array(
						'mensaje' => "Usuario Creado con Exito.",
						'resp'    => true
					);
					
					echo json_encode($data);
				}
			}else{
				$data = array(
					'mensaje' => "Error al guardar el usuario.",
					'resp'    => false
				);
					
				echo json_encode($data);
			}
        }
	}

	public function listar_usuarios(){
		$listado_usuarios = $this->usuarios_model->getUsuarios();
		echo json_encode($listado_usuarios);
	}

	public function edit($id=null){
		$data = $this->usuarios_model->getUsuarioPorId($id);
		echo json_encode($data);
	}

	public function update(){
		$id       = $this->input->post("txt_id");
		$nombre   = strtoupper($this->input->post("txt_nombre"));
		$apellido = strtoupper($this->input->post("txt_apellido"));
		$telefono = $this->input->post("txt_telefono");
		$email    = $this->input->post("txt_email");
		$usuario  = $this->input->post("txt_usuario");
		$clave    = sha1($this->input->post("txt_clave"));
		$rol      = $this->input->post("cmb_rol");

		//Primero subimos el archivo
	 	$config['upload_path']   = './assets/uploads/usuarios/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name']  = true;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('txt_file_img')){	
			$data = array(
				'nombres'   => $nombre, 
				'apellidos' => $apellido,
				'telefono'  => $telefono,
				'email'     => $email,
				'username'  => $usuario, 
				'password'  => $clave,
				'rol'       => $rol,
				'estado'    => 1
			);
			if ($this->usuarios_model->update($id,$data)) {
				$data = array(
					'mensaje' => "Usuario Editado con exito.",
					'resp'    => true
				);
					
				echo json_encode($data);
			}else{
				$data = array(
					'mensaje' => "Error al editar el usuario.",
					'resp'    => false
				);
					
				echo json_encode($data);
			}
        }else{
        	//Obtener el nombre del archivo
            $img = $this->upload->data();
            $file_name = $img['file_name'];

			$data = array(
				'nombres'   => $nombre, 
				'apellidos' => $apellido,
				'telefono'  => $telefono,
				'email'     => $email,
				'imagen'     => $file_name,
				'username'  => $usuario, 
				'password'  => $clave,
				'rol'       => $rol,
				'estado'    => 1
			);

			if ($this->usuarios_model->update($id,$data)) {
				$ruta   = "assets/uploads/usuarios/";
            	$width  = 80;
            	$height = 80;
				//Redimensionar la Imagen
				if ($this->resize_img($file_name,$width,$height,$ruta) == false){

			       $data = array(
						'mensaje' => "Error al redimensionar la imagen.",
						'resp'    => false
					);
						
					echo json_encode($data);

				}else{

					$data = array(
						'mensaje' => "Usuario Editado con exito.",
						'resp'    => true
					);
						
					echo json_encode($data);
				}
			}else{
				$data = array(
					'mensaje' => "Error al editar el usuario.",
					'resp'    => false
				);
					
				echo json_encode($data);
			}
        }
	}

	public function delete($id){
		$data = array(
			'estado' => '0', 
		);
		if ($this->usuarios_model->update($id,$data)) {
			$data = array(
				'mensaje' => "Usuario Eliminado con exito.",
				'resp'    => true
			);
				
			echo json_encode($data);
		}else{
			$data = array(
				'mensaje' => "Error al eliminar el usuario.",
				'resp'    => false
			);
				
			echo json_encode($data);
		}
	}

	public function resize_img($file_name,$width,$height,$ruta){
		$config['image_library']  = 'gd2';
		$config['source_image']   = $ruta.$file_name;
		$config['new_image']      = $ruta.'new_'.$file_name;
		$config['maintain_ratio'] = FALSE;
		$config['width']          = $width;
		$config['height']         = $height;

		$this->image_lib->clear();
		$this->image_lib->initialize($config);
		$this->image_lib->resize();

		if ($this->image_lib->resize()) {
			return true;
		}else{
			return false;
		}
	}
}

	

/* End of file usuarios.php */
/* Location: ./application/controllers/configuracion/usuarios.php */