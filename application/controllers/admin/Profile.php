<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Profile extends MY_Controller {

	public function __construct(){

		parent::__construct();

		$this->load->model('admin/admin_model', 'admin_model');

	}

	//-------------------------------------------------------------------------

	public function index(){

		if($this->input->post('submit')){

			$data = array(

				'username' => $this->input->post('username'),

				'firstname' => $this->input->post('firstname'),

				'lastname' => $this->input->post('lastname'),

				'email' => $this->input->post('email'),

				'mobile_no' => $this->input->post('mobile_no'),

				'updated_at' => date('Y-m-d : h:m:s'),

			);

			$data = $this->security->xss_clean($data);

			//$result = $this->admin_model->update_user($data);
			$result = true;
			if($result){

				$this->session->set_flashdata('msg', 'Profile has been Disabled in Demo!');

				redirect(base_url('admin/profile'), 'refresh');

			}

		}

		else{

			$data['admin'] = $this->admin_model->get_user_detail();

			$data['title'] = 'Admin Profile';

			$data['view'] = 'admin/profile/index';

			$this->load->view('layout', $data);

		}

	}



	//-------------------------------------------------------------------------

	public function change_pwd(){

		$id = $this->session->userdata('admin_id');

		if($this->input->post('submit')){

			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			$this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'trim|required|matches[password]');

			if ($this->form_validation->run() == FALSE) {

				$data['user'] = $this->admin_model->get_user_detail();

				$data['view'] = 'admin/profile/change_pwd';

				$this->load->view('layout', $data);

			}

			else{

				$data = array(

					'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)

				);

				$data = $this->security->xss_clean($data);

				//$result = $this->admin_model->change_pwd($data, $id);
				$result = true;

				if($result){

					$this->session->set_flashdata('msg', 'Change Password has been disabled in demo successfully!');

					redirect(base_url('admin/profile/change_pwd'));

				}

			}

		}

		else{

			$data['user'] = $this->admin_model->get_user_detail();

			$data['title'] = 'Change Password';

			$data['view'] = 'admin/profile/change_pwd';

			$this->load->view('layout', $data);

		}

	}

}



?>	