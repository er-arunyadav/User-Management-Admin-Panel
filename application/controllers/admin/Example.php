<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Example extends MY_Controller {

	public function __construct(){
		parent::__construct();
			$this->load->model('admin/example_model', 'example_model');
			$this->load->library('pagination'); // loaded codeigniter pagination liberary
			$this->load->library('datatable'); // loaded my custom 'serverside datatable' library

			$this->rbac->check_module_access();
		}

		//---------------------------------------------------
		// Calling Server-side processing View
		public function ajax_datatable(){
			$data['title'] = 'Server-side Datatable';
			$data['view'] = 'admin/examples/ajax_datatable';
			$this->load->view('layout', $data);
		}
		
		//---------------------------------------------------
		// Server-side processing Datatable Example
		public function datatable_json(){				   					   
			$records = $this->example_model->get_all_users();
			$data = array();

			$i=0;
			foreach ($records['data']  as $row) 
			{  
				$status = ($row['is_active'] == 1)? 'checked': '';
				$data[]= array(
					++$i,
					$row['username'],
					$row['email'],
					$row['mobile_no'],
					date_time($row['created_at']),	
					'<input type="checkbox" class="tgl-ios" '.$status.'><label for=""></label>'
				);
			}
			$records['data']=$data;
			echo json_encode($records);						   
		}

		//---------------------------------------------------	
		// simple datatable example
		public function simple_datatable(){
			$data['all_users'] =  $this->example_model->get_all_simple_users();
			$data['title'] = 'Simple Datatable';
			$data['view'] = 'admin/examples/simple_datatable';
			$this->load->view('layout', $data);
		}


		//---------------------------------------------------
		// Pagination Example
		public function pagination(){
			$count = $this->example_model->count_all_users();
			$per_page_record = 10;
			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$url= base_url("admin/example/pagination/");

			$config = $this->functions->pagination_config($url,$count,$per_page_record);
			$config['uri_segment'] = 4;		
			$this->pagination->initialize($config);

			$data['all_users']=$this->example_model->get_all_users_for_pagination($per_page_record,$page);

			$data['title'] = 'Pagination Example';
			$data['view'] = 'admin/examples/pagination';
			$this->load->view('layout', $data);
		}
		
		//---------------------------------------------------
		// Advanced Search Example
		public function advance_search(){
			$this->session->unset_userdata('user_search_type');
			$this->session->unset_userdata('user_search_from');
			$this->session->unset_userdata('user_search_to');

			$data['title'] = 'Advanced Search with Datatable';
			$data['view'] = 'admin/examples/advance_search';
			$this->load->view('layout', $data);
		}

		//-------------------------------------------------------
		function search()
		{
			$this->session->set_userdata('user_search_type',$this->input->post('user_search_type'));
			$this->session->set_userdata('user_search_from',$this->input->post('user_search_from'));
			$this->session->set_userdata('user_search_to',$this->input->post('user_search_to'));
		}

		//---------------------------------------------------
		// Server-side processing Datatable Example with Advance Search
		public function advance_datatable_json(){				   					   
			$records = $this->example_model->get_all_users_by_advance_search();
			$data = array();
			$i=0;
			foreach ($records['data']  as $row) 
			{  
				$status = ($row['is_active'] == 1)? 'checked': '';
				$data[]= array(
					++$i,
					$row['username'],
					$row['email'],
					$row['mobile_no'],
					date_time($row['created_at']),	
					'<input type="checkbox" class="tgl-ios" '.$status.'><label for=""></label>'
				);
			}
			$records['data']=$data;
			echo json_encode($records);						   
		}

		//---------------------------------------------------
		// File Upload
		public function file_upload(){
			if($this->input->post('submit')){
				$config = array(
					'upload_path' => "./uploads/",
					'allowed_types' => "gif|jpg|png|jpeg|pdf",
					'overwrite' => TRUE,
					'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
					'max_height' => "1200",
					'max_width' => "1900"
				);
				$this->load->library('upload', $config);
				if($this->upload->do_upload())
				{
					$data = array('upload_data' => $this->upload->data());
					$data['view'] = 'admin/examples/file_upload';
					$this->load->view('layout', $data);
				}
				else
				{
					$data['error'] = array('error' => $this->upload->display_errors());
					$data['view'] = 'admin/examples/file_upload';
					$this->load->view('layout', $data);
				}
			}
			else{
				$data['title'] = 'File Upload';
				$data['view'] = 'admin/examples/file_upload';
				$this->load->view('layout', $data);
			}
		}

		//---------------------------------------------------
		// Multiple File Upload
		public function multi_file_upload(){
		}

		//---------------------------------------------------------------
		//  Export Users PDF 
		public function create_users_pdf(){
			$this->load->helper('pdf_helper'); // loaded pdf helper
			$data['all_users'] = $this->example_model->get_all_simple_users();
			$this->load->view('admin/examples/users_pdf', $data);
		}


		//---------------------------------------------------------------	
		// Export data in CSV format 
		public function export_csv(){ 
		   // file name 
			$filename = 'users_'.date('Y-m-d').'.csv'; 
			header("Content-Description: File Transfer"); 
			header("Content-Disposition: attachment; filename=$filename"); 
			header("Content-Type: application/csv; ");

		   // get data 
			$user_data = $this->example_model->get_users_for_csv();

		   // file creation 
			$file = fopen('php://output', 'w');

			$header = array("ID", "Username", "First Name", "Last Name", "Email", "Mobile_no", "Created Date"); 
			fputcsv($file, $header);
			foreach ($user_data as $key=>$line){ 
				fputcsv($file,$line); 
			}
			fclose($file); 
			exit; 
		}



	}


	?>