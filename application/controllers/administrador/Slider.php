<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	private $permisos;
	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib_admin->control();
		$this->load->model('administrador/slider_model');
	}

	public function index(){
		$data = array(
			'permisos' => $this->permisos,
			'listado'  => $this->slider_model->getAll()
		);

		$this->load->view('administrador/layouts/header');
		$this->load->view('administrador/layouts/aside');
		$this->load->view('administrador/slider',$data);
		$this->load->view('administrador/layouts/footer');
	}

	public function save(){
		$orden       = $this->input->post('txt_orden');
		$texto_1     = $this->input->post('txt_texto_1');
		$texto_2     = $this->input->post('txt_texto_2');
		$descripcion = $this->input->post('txt_descripcion');

		$buscar_orden = $this->slider_model->buscar_orden($orden);

		if ($buscar_orden) {
			$data = array(
				'mensaje' => "El orden se encuentra repetido, por favor validar.",
				'resp'    => false
			);
			echo json_encode($data);
		}else{
			//Primero subimos el archivo
		 	$config['upload_path']   = './public/administrador/uploads/sliders/';
	        $config['allowed_types'] = 'jpg|png|jpeg';
	        $config['encrypt_name']  = true;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('txt_file_img')){
	        	$data = array(
					'mensaje' => "Ocurrio un error al mover la imagen al servidor.",
					'resp'    => false
				);
				echo json_encode($data);
	        }else{
	            $img = $this->upload->data();
	            $file_name = $img['file_name'];

	            $data = array(
	            	'image'       => $file_name, 
	            	'orden'       => $orden, 
	            	'texto_1'     => $texto_1,
	            	'texto_2'     => $texto_2,
	            	'descripcion' => $descripcion
	            );

	 			if ($this->slider_model->save_image($data)) {
	 				$ruta   = "public/administrador/uploads/sliders/";
	            	$width  = 1920;
	            	$height = 800;

	            	if ($this->resize_img($file_name,$width,$height,$ruta) == false){

				        $data = array(
							'mensaje' => "Error al redimensionar la imagen.",
							'resp'    => false
						);

						echo json_encode($data);

					}else{
						$data = array(
							'mensaje' => "Imagen guardada con éxito.",
							'resp'    => true
						);
						
						echo json_encode($data);
					}	
	 			}else{
	 				$data = array(
						'mensaje' => "Ocurrio un error al guardar la imagen en la base de datos.",
						'resp'    => false
					);
					echo json_encode($data);
	 			}
	        }
		}
	}

	public function getAll(){
		$resultado = $this->slider_model->getAll();
		echo json_encode($resultado);
	}

	public function delete(){
		$id = $this->input->post('id');

		if ($this->slider_model->delete($id)){
	        $data = array(
				'mensaje' => "Slider eliminado con exito.",
				'resp'    => true
			);
			echo json_encode($data);

		}else{
			$data = array(
				'mensaje' => "Error al eliminar el Slider.",
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