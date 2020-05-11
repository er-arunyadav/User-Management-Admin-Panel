<?php defined('BASEPATH') OR exit('No direct script access allowed');



	class Export extends MY_Controller {



		public function __construct(){

			parent::__construct();

        	$this->load->helper('download');

        	$this->load->library('zip');

        	

        	$this->rbac->check_module_access();

		}



		public function index(){

			$data['title'] = 'Export Database';

			$data['view'] = 'admin/export/db_export';

			$this->load->view('layout', $data);

		}



		public function dbexport(){

			redirect(base_url('permission_denied/index'));

			/*$this->load->dbutil();

			$db_format = array(

				'ignore' => array($this->ignore_directories),

				'format'=> 'zip',

				'filename'=> 'my_db_backup.sql',

				'add_insert' => TRUE,

				'newline' => "\n"

			);

			$backup = & $this->dbutil->backup($db_format);

			$dbname = 'backup-on-'.date('Y-m-d').'.zip';

			$save = 'uploads/db_backup/'.$dbname;

			write_file($save, $backup);

			force_download($dbname, $backup);*/

		}



	}



?>		