<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Forms extends MY_Controller {
		public function general(){
			$data['view'] = 'admin/forms/general';
			$this->load->view('layout', $data);
		}
		public function advanced(){
			$data['view'] = 'admin/forms/advanced';
			$this->load->view('layout', $data);
		}
		public function editors(){
			$data['view'] = 'admin/forms/editors';
			$this->load->view('layout', $data);
		}

	}

	?>
