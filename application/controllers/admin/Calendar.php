<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Calendar extends MY_Controller {
		public function index(){
			$data['view'] = 'admin/calendar/calendar';
			$this->load->view('layout', $data);
		}

	}

?>	