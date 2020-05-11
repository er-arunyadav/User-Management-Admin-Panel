<?php
class Datatable 
{	
	function __construct()
	{
		$this->obj =& get_instance();
	}
	//--------------------------------------------
	function LoadJson($SQL,$EXTRA_WHERE='',$GROUP_BY='')
	{
		if(!empty($EXTRA_WHERE))
		{
			$SQL.= " WHERE ( $EXTRA_WHERE )";
		}
		else
		{
			$SQL.= " WHERE (1)";
		}
		$query = $this->obj->db->query($SQL);
		$total = $query->num_rows();
		//------------------------------------------------
		if(!empty($_GET['search']['value']))
		{
			$qry = array();
			foreach($_GET['columns'] as $cl)
			{
				if($cl['searchable']=='true')
				$qry[] =" ".$cl['name']." like '%".$_GET['search']['value']."%' ";
			}
			$SQL.= "AND ( ";
			$SQL.= implode("OR",$qry);
			$SQL.= " ) ";	
		}
        //------------------------------------------------
		if(!empty($GROUP_BY))
		{
			$SQL.= $GROUP_BY;
		}
	 	//------------------------------------------------
		$query = $this->obj->db->query($SQL);
		$filtered = $query->num_rows();

		$SQL.= " ORDER BY ";
		$SQL.= $_GET['columns'][$_GET['order'][0]['column']]['name']." ";
		$SQL.= $_GET['order'][0]['dir'];
		$SQL.= " LIMIT ".$_GET['length']." OFFSET ".$_GET['start']." ";

		$query = $this->obj->db->query($SQL);
		$data = $query->result_array();
		
		return array("recordsTotal"=>$total,"recordsFiltered"=>$filtered,'data' => $data);
	}	
}
?>