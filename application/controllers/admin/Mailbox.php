<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Mailbox extends MY_Controller {

		public function inbox(){
			$data['view'] = 'admin/mailbox/mailbox';
			$this->load->view('layout', $data);
		}
		public function compose(){
			$data['view'] = 'admin/mailbox/compose';
			$this->load->view('layout', $data);
		}
		public function read_mail(){
			$data['view'] = 'admin/mailbox/read-mail';
			$this->load->view('layout', $data);
		}
	}

?>