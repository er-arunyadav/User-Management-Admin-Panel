<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Invoices extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/invoice_model', 'invoice_model');
			$this->load->helper('pdf_helper'); // loaded pdf helper
			$this->load->library('datatable'); // loaded my custom serverside datatable library

			$this->rbac->check_module_access();
		}

		//---------------------------------------------------
		// Get All Invoices
		public function index(){
			$data['invoice_detail'] = $this->invoice_model->get_all_invoices();
			$data['view'] = 'admin/invoices/invoice_list';
			$this->load->view('layout', $data);
		}

		//---------------------------------------------------
		// Add New Invoices
		public function add()
		{
			$this->rbac->check_operation_access(); // check opration permission

			if($this->input->post('submit')){
				$data['company_data'] = array(
					'name' => $this->input->post('company_name'),
					'address1' => $this->input->post('company_address_1'),
					'address2' => $this->input->post('company_address_2'),
					'email' => $this->input->post('company_email'),
					'mobile_no' => $this->input->post('company_mobile_no'),
					'created_date' => date('Y-m-d h:m:s')
				);
				$data = $this->security->xss_clean($data['company_data']);
				$company_id = $this->invoice_model->add_company($data);
				if($company_id){
					$items_detail =  array(
							'product_description' => $this->input->post('product_description'),
							'quantity' => $this->input->post('quantity'),
							'price' => $this->input->post('price'),
							'tax' => $this->input->post('tax'),
							'total' => $this->input->post('total'),
						);
					$items_detail = serialize($items_detail);

					$data['invoice_data'] = array(

						'admin_id' => $this->session->userdata('admin_id'),
						'user_id' => $this->input->post('user_id'),
						'company_id' => $company_id,
						'invoice_no' => $this->input->post('invoice_no'),
						'txn_id' => '',
						'items_detail' => $items_detail,
						'sub_total' => $this->input->post('sub_total'),
						'total_tax' => $this->input->post('total_tax'),
						'discount' => $this->input->post('discount'),
						'grand_total' => $this->input->post('grand_total'),
						'currency ' => 'USD',
						'payment_method' => '',
						'payment_status ' => $this->input->post('payment_status'),
						'client_note ' => $this->input->post('client_note'),
						'termsncondition ' => $this->input->post('termsncondition'),
						'due_date' => date('Y-m-d', strtotime($this->input->post('due_date'))),
						'created_date' => date('Y-m-d', strtotime($this->input->post('billing_date'))),
					);

					$invoice_data = $this->security->xss_clean($data['invoice_data']);

					$result = $this->invoice_model->add_invoice($invoice_data);
					if($result){
						$this->session->set_flashdata('msg', 'Invoice has been Added Successfully!');
						redirect(base_url('admin/invoices'));
					}
				}	
				//print_r($data['invoice_data']);
			}
			else{
				$data['title'] = 'Invoice';
				$data['view'] = 'admin/invoices/invoice_add';
				$data['customer_list'] = $this->invoice_model->get_customer_list();
				$this->load->view('layout', $data);
			}
			
		}

		//---------------------------------------------------
		// Get Customer Detail for Invoice
		public function customer_detail($id=0){
			$data['customer'] = $this->invoice_model->customer_detail($id);
			echo json_encode($data['customer']);
		}

		//---------------------------------------------------
		// Get View Invoice
		public function view($id=0)
		{
			$this->rbac->check_operation_access(); // check opration permission

			$data['invoice_detail'] = $this->invoice_model->get_invoice_by_id($id);
			$data['view'] = 'admin/invoices/invoice_view';
			$this->load->view('layout', $data);
		}


		//---------------------------------------------------
		// Edit Invoice
		public function edit($id=0)
		{
			$this->rbac->check_operation_access(); // check opration permission

			if($this->input->post('submit')){
				$data['company_data'] = array(
					'name' => $this->input->post('company_name'),
					'address1' => $this->input->post('company_address_1'),
					'address2' => $this->input->post('company_address_2'),
					'email' => $this->input->post('company_email'),
					'mobile_no' => $this->input->post('company_mobile_no'),
					'created_date' => date('Y-m-d h:m:s')
				);
				$data = $this->security->xss_clean($data['company_data']);
				$company_id = $this->invoice_model->update_company($data, $this->input->post('company_id'));
				if($company_id){
					$items_detail =  array(
							'product_description' => $this->input->post('product_description'),
							'quantity' => $this->input->post('quantity'),
							'price' => $this->input->post('price'),
							'tax' => $this->input->post('tax'),
							'total' => $this->input->post('total'),
						);
					$items_detail = serialize($items_detail);

					$data['invoice_data'] = array(

						'admin_id' => $this->session->userdata('admin_id'),
						'user_id' => $this->input->post('user_id'),
						'company_id' => $company_id,
						'invoice_no' => $this->input->post('invoice_no'),
						'txn_id' => '',
						'items_detail' => $items_detail,
						'sub_total' => $this->input->post('sub_total'),
						'total_tax' => $this->input->post('total_tax'),
						'discount' => $this->input->post('discount'),
						'grand_total' => $this->input->post('grand_total'),
						'currency ' => 'USD',
						'payment_method' => '',
						'payment_status ' => $this->input->post('payment_status'),
						'client_note ' => $this->input->post('client_note'),
						'termsncondition ' => $this->input->post('termsncondition'),
						'due_date' => date('Y-m-d', strtotime($this->input->post('due_date'))),
						'updated_date' => date('Y-m-d'),
					);

					$invoice_data = $this->security->xss_clean($data['invoice_data']);
						
					$result = $this->invoice_model->update_invoice($invoice_data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Invoice has been updated Successfully!');
						redirect(base_url('admin/invoices/edit/'.$id));
					}
				}	
			}
			else{
				$data['invoice_detail'] = $this->invoice_model->get_invoice_by_id($id);
				$data['customer_list'] = $this->invoice_model->get_customer_list();
				$data['title'] = 'Edit Invoice';
				$data['view'] = 'admin/invoices/invoice_edit';
				$this->load->view('layout', $data);
			}
		}


		//---------------------------------------------------
		// Download PDF Invoices
		public function invoice_pdf_download($id=0){
			$data['invoice_detail'] = $this->invoice_model->get_invoice_by_id($id);
			$this->load->view('admin/invoices/invoice_pdf_download', $data);
		}

		//---------------------------------------------------------------
		// Create PDF invoice at run time for Email
		public function create_pdf($id=0){
			$data['invoice_detail'] = $this->invoice_model->get_invoice_by_id($id);
			$html = $this->load->view('admin/invoices/invoice_pdf', $data, TRUE);
			
			$filename = $data['invoice_detail']['invoice_no'];
		
			$pdf_file_path = FCPATH."/uploads/invoices/".$filename.".pdf";

			$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 
			$mpdf->SetDisplayMode('fullpage');
			$mpdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
			// LOAD a stylesheet
			$stylesheet = file_get_contents(base_url('public/dist/css/mpdfstyletables.css'));
			$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
			$mpdf->WriteHTML($html,2);
			$mpdf->Output($pdf_file_path,'F');
			
			echo base_url()."uploads/invoices/".$filename.".pdf";
			exit;
		
		}


		//---------------------------------------------------------------
		// Sending email with invoice attachemnt
		function send_email_with_invoice(){
		
			$this->load->helper('email_helper');
			
			$to = $this->input->post('email');
			$subject = $this->input->post('subject');
			$message = $this->input->post('message');
			$cc = $this->input->post('cc');
			$file = $this->input->post('file');
			
			$check = sendEmail($to, $subject, $message, $file, $cc);
						  
			  if( $check ){
				  echo 'success';
			  }
			
		}


		//---------------------------------------------------
		// Delete Invoices
		public function delete($id)
		{
			$this->rbac->check_operation_access(); // check opration permission

			$result = $this->db->delete('ci_payments', array('id' => $id));
			if($result){
				$this->session->set_flashdata('msg', 'Record has been deleted Successfully!');
				redirect(base_url('admin/invoices'));
			}

		}

	}

?>	