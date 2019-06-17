<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

	private $permisos;
	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib_admin->control();
		$this->load->model('administrador/banner_model');
	}

	public function index(){
		$data = array(
			'permisos' => $this->permisos,
			'listado'  => $this->banner_model->getAll(),
		);

		$this->load->view('administrador/layouts/header');
		$this->load->view('administrador/layouts/aside');
		$this->load->view('administrador/banner',$data);
		$this->load->view('administrador/layouts/footer');
	}

	public function get_banner(){
		$id = $this->input->post("id");
		$resultado = $this->banner_model->get_banner($id);
		echo json_encode($resultado);
	}

	public function save_banner(){
		$id     = $this->input->post('txt_id');
		$link   = $this->input->post('txt_link');
		$width  = $this->input->post('txt_width');
		$height = $this->input->post('txt_height');
		$file   = $this->input->post('txt_file');

		if (isset($file)) {
			$data = array(
            	'link' => $link,
            );

            if ($this->banner_model->save_banner($data,$id)) {
            	$data = array(
					'mensaje' => "Banner Editado con Exito.",
					'resp'    => true
				);

				echo json_encode($data);
            }else{
            	$data = array(
					'mensaje' => "Error al actualizar el Banner.",
					'resp'    => false
				);

				echo json_encode($data);
            }
		}else{
		 	$config['upload_path']   = './public/administrador/uploads/banners/';
	        $config['allowed_types'] = 'jpg|png|jpeg';
	        $config['encrypt_name']  = true;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('txt_file')){
	        	$data = array(
					'mensaje' => "Ocurrio un error al mover la imagen al servidor.",
					'resp'    => false
				);
				echo json_encode($data);
	        }else{
	            $img = $this->upload->data();
	            $file_name = $img['file_name'];

	            if ($file_name != "") {
		            $data = array(
		            	'image'=> $file_name, 
		            	'link' => $link,
		            );

		 			if ($this->banner_model->save_banner($data,$id)) {
		 				$ruta   = "public/administrador/uploads/banners/";
		            	$width  = $width;
		            	$height = $height;

		            	if ($this->resize_img($file_name,$width,$height,$ruta) == false){

					        $data = array(
								'mensaje' => "Error al redimensionar la imagen.",
								'resp'    => false
							);

							echo json_encode($data);

						}else{
							$data = array(
								'mensaje' => "El Banner se actualizo con exito.",
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