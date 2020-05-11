<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Ui extends CI_Controller {
		
		public function widgets(){
			$data['view'] = 'admin/ui/widgets';
			$this->load->view('layout', $data);
		}

		public function buttons(){
			$data['view'] = 'admin/ui/buttons';
			$this->load->view('layout', $data);
		}
		public function general(){
			$data['view'] = 'admin/ui/general';
			$this->load->view('layout', $data);
		}
		public function icons(){
			$data['view'] = 'admin/ui/icons';
			$this->load->view('layout', $data);
		}
		public function modals(){
			$data['view'] = 'admin/ui/modals';
			$this->load->view('layout', $data);
		}
		public function sliders(){
			$data['view'] = 'admin/ui/sliders';
			$this->load->view('layout', $data);
		}
		public function timeline(){
			$data['view'] = 'admin/ui/timeline';
			$this->load->view('layout', $data);
		}
		
		public function calendar(){
			$data['view'] = 'admin/ui/calendar';
			$this->load->view('layout', $data);
		}
		public function inbox(){
			$data['view'] = 'admin/ui/mailbox';
			$this->load->view('layout', $data);
		}
		public function compose(){
			$data['view'] = 'admin/ui/compose';
			$this->load->view('layout', $data);
		}
		public function read_mail(){
			$data['view'] = 'admin/ui/read-mail';
			$this->load->view('layout', $data);
		}
		public function invoice(){
			$data['view'] = 'admin/ui/invoice';
			$this->load->view('layout', $data);
		}
		public function profile(){
			$data['view'] = 'admin/ui/profile';
			$this->load->view('layout', $data);
		}
		public function login(){
			$this->load->view('admin/ui/login');
		}
		public function register(){
			$this->load->view('admin/ui/register');
		}
		public function lockscreen(){
			$this->load->view('admin/ui/lockscreen');
		}
		public function error404(){
			$data['view'] = 'admin/ui/404';
			$this->load->view('layout', $data);
		}
		public function errro500(){
			$data['view'] = 'admin/ui/500';
			$this->load->view('layout', $data);
		}
		public function blank(){
			$data['view'] = 'admin/ui/blank';
			$this->load->view('layout', $data);
		}
		public function pace(){
			$data['view'] = 'admin/ui/pace';
			$this->load->view('layout', $data);
		}




	}