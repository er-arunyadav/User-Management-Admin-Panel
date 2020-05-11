<?php
class Admin_roles extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->load->model('admin/admin_roles_model', 'admin_roles');

		$this->rbac->check_module_access();
    }

	//-----------------------------------------------------		
	function index()
	{
		$data['records'] = $this->admin_roles->get_all();
		$data['view'] = 'admin/admin_roles/index';
		$this->load->view('layout',$data);
	}

	//-----------------------------------------------------------
	function change_status()
	{   
		$this->rbac->check_operation_access(); // check opration permission

		$this->admin_roles->change_status();
	}
	//------------------------------------------------------------
	function delete($id='')
	{   
		$this->rbac->check_operation_access(); // check opration permission

		//$this->admin_roles->delete($id);
		$this->session->set_flashdata('msg','Delete Operation has been Disabled in demo.');	
		redirect('admin/admin_roles');
	}
	
	//--------------------------------------------------
	function add()
	{	
		$this->rbac->check_operation_access(); // check opration permission

		if($this->input->post('submit'))
		{
			$this->admin_roles->insert();	
			$this->session->set_flashdata('success', 'Record Added Successfully');	
			redirect('admin/admin_roles');
		}
		$data['view']='admin/admin_roles/add';
		$this->load->view('layout',$data);	
	}

	//--------------------------------------------------
	function edit($id="")
	{
		$this->rbac->check_operation_access(); // check opration permission

		if($this->input->post('submit'))
		{
			//$this->admin_roles->update();
			$this->session->set_flashdata('msg', 'Update Operation is Disabled in Demo');		
			redirect('admin/admin_roles');
		}
		if($id=="") redirect('admin/admin_roles');
		$data['record'] = $this->admin_roles->get_role_by_id($id);
		$data['view']='admin/admin_roles/edit';
		$this->load->view('layout',$data);	
	}

	//--------------------------------------------------
	function access($id="")
	{
		$this->rbac->check_operation_access(); // check opration permission

		$data['record']= $this->admin_roles->get_role_by_id($id);
		$data['access']= $this->admin_roles->get_access($id);
		$data['modules']= $this->admin_roles->get_modules();
		$data['view']='admin/admin_roles/access';
		$this->load->view('layout',$data);	
	}

	//-----------------------------------------------------------
	function set_access()
	{   
		$this->admin_roles->set_access();
	}

	//--------------------------------------------------
	function check_admin_role($id=0)
    {
		$this->db->from('admin_roles');
		$this->db->where('admin_role_title',$this->input->post('admin_role_title'));
		$this->db->where('admin_role_id !='.$id);
		$query=$this->db->get();
		if($query->num_rows() >0)
			echo 'false';
		else 
	    	echo 'true';
    }
	
}

?>