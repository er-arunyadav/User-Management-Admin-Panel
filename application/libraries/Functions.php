<?php

	class Functions 
	{
		function __construct()
		{
			$this->obj =& get_instance(); 
		}

		//--------------------------------------------------------
		// Paginaiton function 
		public function pagination_config($url,$count,$perpage) 
		{
			$config = array();
			$config["base_url"] = $url;
			$config["total_rows"] = $count;
			$config["per_page"] = $perpage;
			$config['full_tag_open'] = '<ul class="pagination pagination-split">';
			$config['full_tag_close'] = '</ul>';
			$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '&gt;';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';

			$config['first_link'] = '&lt;&lt;';
			$config['last_link'] = '&gt;&gt;';
			return $config;
		}


		// --------------------------------------------------------------
		/*
		* Function Name : File Upload
		* Param1 : Location
		* Param2 : HTML File ControlName
		* Param3 : Extension
		* Param4 : Size Limit
		* Return : FileName
		*/
	   
		function file_insert($location, $controlname, $type, $size)
		{
			$return = array();
			$type = strtolower($type);
			if(isset($_FILES[$controlname]) && $_FILES[$controlname]['name'] != NULL)
	        {
				$filename = $_FILES[$controlname]['name'];
				$file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
				$filesize = $_FILES[$controlname]["size"];	
						
				if($type == 'image')
				{
					if($file_extension == 'jpg' || $file_extension == 'jpeg' || $file_extension == 'png' || $file_extension == 'gif')
					{
						if ($filesize <= $size) 
						{
							$return['msg'] = $this->file_upload($location, $controlname);
							$return['status'] = 1;
						}
						else
						{
							$size=$size/1024;
							$return['msg'] = 'File must be smaller then  '.$size.' KB';
							$return['status'] = 0;
						}
					}
					else
					{
						$return['msg'] = 'File Must Be In jpg,jpeg,png,gif Format';
						$return['status'] = 0;
						
					}
				}
				elseif($type == 'pdf')
				{
					if($file_extension == 'pdf')
					{
						if ($filesize <= $size) 
						{
							$return['msg'] = $this->file_upload($location, $controlname);
							$return['status'] = 1;
						}
						else
						{
							$size = $size/1024;
							$return['msg'] = 'File must be smaller then  '.$size.' KB';
							$return['status'] = 0;
						}
					}
					else
					{
						$return['msg'] = 'File Must Be In PDF Format';
						$return['status'] = 0;	
					}
				}
				elseif($type == 'excel')
				{
					if( $file_extension == 'xlsx' || $file_extension == 'xls')
					{
						if ($filesize <= $size) 
						{
							$return['msg'] = $this->file_upload($location, $controlname);
							$return['status'] = 1;
							
						}
						else
						{
							$size = $size/1024;
							$return['msg'] = 'File must be smaller then  '.$size.' KB';
							$return['status'] = 0;
						}
					}
					else
					{
						$return['msg'] = 'File Must Be In Excel Format Only allow .xlsx and .xls extension';
						$return['status'] = 0;
					}
				}
				elseif($type == 'doc')
				{
					if( $file_extension == 'doc' || $file_extension == 'docx' || $file_extension == 'txt' || $file_extension == 'rtf')
					{
						if ($filesize <= $size) 
						{
							$return['msg'] = $this->file_upload($location, $controlname);
							$return['status'] = 1;
						}
						else
						{
							$size=$size/1024;
							$return['msg'] = 'File must be smaller then  '.$size.' KB';
							$return['status'] = 0;
						}
					}
					else
					{
						$return['msg'] = 'File Must Be In doc,docx,txt,rtf Format'; 
						$return['status'] = 0;		
					}
				}
				else
				{
					$return['msg'] = 'Not Allow other than image,pdf,excel,doc file..';
					$return['status'] = 0;	
				}

			}
	        else
	        {
	            $return['msg'] = '';
				$return['status'] = 1;
	        }
			return $return;
		}

		//--------------------------------------------------------
		/*
		* Function Name : File Upload
		* Param1 : Location
		* Param2 : HTML File ControlName
		* Return : FileName
		*/
		function file_upload($location, $controlname)
		{
			if ( ! file_exists(FCPATH.$location))
			{
				$create = mkdir(FCPATH.$location,0777,TRUE);
				if ( ! $create)
					return '';
			}
	        
			$new_filename=  $_FILES[$controlname]['name'];
			if(move_uploaded_file(realpath($_FILES[$controlname]['tmp_name']),$location.$new_filename))
			{
				return $new_filename;
			}
			else
			{
				return '';
			}     
		}

	//============================================================
	function encode($input) 
	{
		return urlencode(base64_encode($input));
	}

	//============================================================
	function decode($input) 
	{
		return base64_decode(urldecode($input) );
	}

	}



?>