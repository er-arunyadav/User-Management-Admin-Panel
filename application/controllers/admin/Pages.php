<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Pages extends MY_Controller {
		public function invoice(){
			$data['view'] = 'admin/pages/invoice';
			$this->load->view('layout', $data);
		}
		public function profile(){
			$data['view'] = 'admin/pages/profile';
			$this->load->view('layout', $data);
		}
		public function login(){
			$this->load->view('admin/pages/login');
		}
		public function register(){
			$this->load->view('admin/pages/register');
		}
		public function lockscreen(){
			$this->load->view('admin/pages/lockscreen');
		}
		public function error404(){
			$data['view'] = 'admin/pages/404';
			$this->load->view('layout', $data);
		}
		public function errro500(){
			$data['view'] = 'admin/pages/500';
			$this->load->view('layout', $data);
		}
		public function blank(){
			$data['view'] = 'admin/pages/blank';
			$this->load->view('layout', $data);
		}
		public function pace(){
			$data['view'] = 'admin/pages/pace';
			$this->load->view('layout', $data);
		}

	}

	?>
