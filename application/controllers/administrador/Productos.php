<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productos extends CI_Controller {

	private $permisos;
	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib_admin->control();
		$this->load->model('administrador/productos_model');
		$this->load->model('administrador/CategoriaModel');
	}

	public function index(){
		$data = array(
			'permisos'   => $this->permisos,
			'listado'    => $this->productos_model->getAll(),
			'categorias' => $this->CategoriaModel->getCategorias()
		);

		$this->load->view('administrador/layouts/header');
		$this->load->view('administrador/layouts/aside');
		$this->load->view('administrador/productos',$data);
		$this->load->view('administrador/layouts/footer');
	}

	public function getAll(){
		$respuesta = $this->productos_model->getAll();
		echo json_encode($respuesta);
	}

	public function search(){
		$id = $this->input->post('id');
		$respuesta = $this->productos_model->getId($id);
		echo json_encode($respuesta);
	}

	public function store(){
		$nombre          = $this->input->post('txt_nombre');
		$categoria       = $this->input->post('cmb_categoria');
		$estatus         = $this->input->post('cmb_estatus');
		$desc_corta      = $this->input->post('txt_desc_corta');
		$desc_larga      = $this->input->post('txt_desc_larga');
		$caracteristicas = $this->input->post('txt_caracteristicas');

		$data = array(
			'nombre'            => $nombre,
			'descripcion_corta' => $desc_corta,
			'descripcion_larga' => $desc_larga,
			'caracteristicas'   => $caracteristicas,
			'id_categoria'      => $categoria,
			'estatus'           => $estatus
		);

		$respuesta = $this->productos_model->save($data);

		if ($respuesta) {
			$data = array(
				'mensaje' => "Producto almacenado con exito.",
				'resp'    => true
			);
			echo json_encode($data);
		}else{
			$data = array(
				'mensaje' => "Ocurrio un error al almacenar el producto.",
				'resp'    => false
			);
			echo json_encode($data);
		}
	}

	public function update(){
		$id              = $this->input->post('id');
		$nombre          = $this->input->post('txt_nombre');
		$categoria       = $this->input->post('cmb_categoria');
		$estatus         = $this->input->post('cmb_estatus');
		$desc_corta      = $this->input->post('txt_desc_corta');
		$desc_larga      = $this->input->post('txt_desc_larga');
		$caracteristicas = $this->input->post('txt_caracteristicas');

		$data = array(
			'nombre'            => $nombre,
			'descripcion_corta' => $desc_corta,
			'descripcion_larga' => $desc_larga,
			'caracteristicas'   => $caracteristicas,
			'id_categoria'      => $categoria,
			'estatus'           => $estatus
		);

		$respuesta = $this->productos_model->update($data,$id);

		if ($respuesta) {
			$data = array(
				'mensaje' => "Producto editado con exito.",
				'resp'    => true
			);
			echo json_encode($data);
		}else{
			$data = array(
				'mensaje' => "Ocurrio un error al editar el producto.",
				'resp'    => false
			);
			echo json_encode($data);
		}
	}

	public function delete(){
		$id = $this->input->post('id');
		if ($this->productos_model->delete($id)) {
			$data = array(
				'mensaje' => "Producto eliminado con exito.",
				'resp'    => true
			);
			echo json_encode($data);
		}else{
			$data = array(
				'mensaje' => "Ocurrio un error al eliminar el producto.",
				'resp'    => false
			);
			echo json_encode($data);
		}
	}

	public function adjuntar(){
		$id = $this->input->post('txt_id_prod');
		$orden = $this->input->post('txt_orden');

		$buscar_orden = $this->productos_model->buscar_orden($id,$orden);

		if ($buscar_orden) {
			$data = array(
				'mensaje' => "El orden se encuentra repetido, por favor validar.",
				'resp'    => false
			);
			echo json_encode($data);
		}else{
			//Primero subimos el archivo
		 	$config['upload_path']   = './public/administrador/uploads/productos/';
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

	            $data = array(
	            	'image'       => $file_name, 
	            	'id_producto' => $id, 
	            	'orden'       => $orden
	            );

	 			if ($this->productos_model->save_image($data)) {
	 				$ruta   = "public/administrador/uploads/productos/";
	            	$width  = 800;
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

	public function galeria(){
		$id = $this->input->post('id');
		$resultado = $this->productos_model->galeria($id);
		echo json_encode($resultado);
	}

	public function delete_image(){
		$id = $this->input->post('id');

		if ($this->productos_model->delete_image($id)){
	        $data = array(
				'mensaje' => "Imágen eliminada con exito.",
				'resp'    => true
			);
			echo json_encode($data);

		}else{
			$data = array(
				'mensaje' => "Error al eliminar la Imágen.",
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