<?php

	class Backend_lib_admin{
		private $CI;
		public function __construct(){
			$this->CI = & get_instance();
		}

		public function control(){
			if (!$this->CI->session->userdata('login')) {
				redirect(base_url()."administrador");
			}else{
				$url = $this->CI->uri->segment(1);
				if ($this->CI->uri->segment(2)) {
					$url = $this->CI->uri->segment(1)."/".$this->CI->uri->segment(2);
				}
				$info_menu = $this->CI->Backend_model->get_id_admin($url);

				$permisos = $this->CI->Backend_model->get_permisos_admin($info_menu->id,$this->CI->session->userdata("rol"));

				if ($permisos->read == 0) {
					redirect(base_url()."administrador/dashboard");
				}else{
					return $permisos;
				}
			}
		}

		public function getMenu(){
			$menu = '';
			$parents = $this->CI->Backend_model->getParents_admin($this->CI->session->userdata("rol"));
			foreach ($parents as $parent) {
				$children = $this->CI->Backend_model->getChildren_admin($this->CI->session->userdata("rol"),$parent->id);
				$linkParent = $parent->link == '#' ? '#': base_url($parent->link);
				if (!$children) {
					$menu .= '<li>
	                        <a href="'.$linkParent.'">
	                            <i class="'.$parent->icon.'"></i> <span>'.$parent->nombre.'</span>
	                        </a>
	                    </li>';
				} else {
					$menu .= '<li class="treeview">
		                        <a href="#">
		                            <i class="'.$parent->icon.'"></i> <span>'.$parent->nombre.'</span>
		                            <span class="pull-right-container">
		                                <i class="fa fa-angle-left pull-right"></i>
		                            </span>
		                        </a><ul class="treeview-menu">';

		            foreach ($children as $child) {
		            	$menu .= '<li><a href="'.base_url($child->link).'"><i class="fa fa-circle-o"></i>'.$child->nombre.'</a></li>';

		            }
		            $menu .= '</ul></li>';
				}
			}
			return $menu;
		}
	}