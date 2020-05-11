<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Joins extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/join_model', 'join_model');
			$this->load->library('datatable'); // loaded my custom serverside datatable library

			$this->rbac->check_module_access();
		}

		//------------------------------------------
		// Server side database join example
		public function index(){
			$data['view'] = 'admin/joins/serverside_join';
			$this->load->view('layout', $data);
		}

		public function datatable_json(){
			$records = $this->join_model->get_all_serverside_payments();
	        $data = array();
	        foreach ($records['data']  as $row) 
			{  
				$data[]= array(
					$row['client_name'],
					$row['client_email'],
					$row['client_mobile_no'],
					$row['invoice_no'],
					$row['grand_total'].$row['currency'],
					$row['created_date'],
				);
	        }
			$records['data']=$data;
	        echo json_encode($records);		
		}

		//------------------------------------------
		// Simple database join example with codeigniter active record
		public function simple(){
			$data['payment_detail'] = $this->join_model->get_user_payment_details();

			$data['title'] = 'simple join';
			$data['view'] = 'admin/joins/simple_join';
			$this->load->view('layout', $data);
		}



	}

?>	