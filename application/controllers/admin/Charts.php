<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Charts extends MY_Controller {
		public function chartjs(){
			$data['view'] = 'admin/charts/chartjs';
			$this->load->view('layout', $data);
		}
		public function morris(){
			$data['view'] = 'admin/charts/morris';
			$this->load->view('layout', $data);
		}
		public function flot(){
			$data['view'] = 'admin/charts/flot';
			$this->load->view('layout', $data);
		}
		public function inline(){
			$data['view'] = 'admin/charts/inline';
			$this->load->view('layout', $data);
		}

	}

	?>
