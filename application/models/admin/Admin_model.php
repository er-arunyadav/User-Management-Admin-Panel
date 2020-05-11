<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Admin_model extends CI_Model{



	public function get_user_detail(){

		$id = $this->session->userdata('admin_id');

		$query = $this->db->get_where('ci_admin', array('admin_id' => $id));

		return $result = $query->row_array();

	}

	//--------------------------------------------------------------------

	public function update_user($data){

		$id = $this->session->userdata('admin_id');

		$this->db->where('admin_id', $id);

		$this->db->update('ci_admin', $data);

		return true;

	}

	//--------------------------------------------------------------------

	public function change_pwd($data, $id){

		$this->db->where('admin_id', $id);

		$this->db->update('ci_admin', $data);

		return true;

	}

	//-----------------------------------------------------

	function get_admin_roles()

	{

		$this->db->from('ci_admin_roles');

		$this->db->where('admin_role_status',1);

		$query=$this->db->get();

		return $query->result_array();

	}



	//-----------------------------------------------------

	function get_admin_by_id($id)

	{

		$this->db->from('ci_admin');

		$this->db->join('ci_admin_roles','ci_admin_roles.admin_role_id=ci_admin.admin_role_id');

		$this->db->where('admin_id',$id);

		$query=$this->db->get();

		return $query->row_array();

	}



	//-----------------------------------------------------

	function get_all()

	{

		$this->db->from('ci_admin');

		$this->db->join('ci_admin_roles','ci_admin_roles.admin_role_id=ci_admin.admin_role_id');

		

		if($this->session->userdata('filter_type')!='')

			$this->db->where('ci_admin.admin_role_id',$this->session->userdata('filter_type'));



		if($this->session->userdata('filter_status')!='')

			$this->db->where('ci_admin.is_active',$this->session->userdata('filter_status'));



		$filterData = $this->session->userdata('filter_keyword');

		$where = "(

		ci_admin_roles.admin_role_title like '%$filterData%' OR

		ci_admin.firstname like '%$filterData%' OR

		ci_admin.lastname like '%$filterData%' OR

		ci_admin.email like '%$filterData%' OR

		ci_admin.mobile_no like '%$filterData%' OR

		ci_admin.username like '%$filterData%'

	)";

	$this->db->where($where);

	$this->db->order_by('ci_admin.admin_id','desc');

		//$this->db->limit($limit, $offset);

	$query = $this->db->get();

	$module = array();

	if ($query->num_rows() > 0) 

	{

		$module = $query->result_array();

	}

	return $module;

}



	//-----------------------------------------------------

public function add_admin($data){

	$this->db->insert('ci_admin', $data);

	return true;

}



	//---------------------------------------------------

	// Edit Admin Record

public function edit_admin($data, $id){

	$this->db->where('admin_id', $id);

	$this->db->update('ci_admin', $data);

	return true;

}



	//-----------------------------------------------------

function change_status()

{		

	$this->db->set('is_active',1);

	$this->db->where('admin_id',$this->input->post('id'));

	$this->db->update('ci_admin');

} 



	//-----------------------------------------------------

function delete($id)

{		

	$this->db->where('admin_id',$id);

	$this->db->delete('ci_admin');

} 



}



?>