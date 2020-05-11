<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Access_denied extends CI_Controller {

	public function index($back_to=''){

		$data['back_to'] = $this->functions->decode($back_to);
		$this->load->view('access_denied', $data);
	}
}