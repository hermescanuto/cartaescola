<?php

class Uploadf extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index(){
		echo 'Upload';
	}

	function do_upload()
	{
		
		$config['upload_path'] = '/upload/';		
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['overwrite'] = FALSE;

		$this->load->library('upload'); 
 
		$funcNum = $this->input->get('CKEditorFuncNum'); //$_GET['CKEditorFuncNum']

		$this->upload->initialize($config);
         
		if (!$this->upload->do_upload('upload'))

		{ 

			// upload the file, 'upload' is the name of the field from CKEditor
			// failed upload

			$message =  $this->upload->display_errors('<span>','</span>') ;

			$url = '';

     
		}else{ // success copy to wp server
			
			$up = $this->upload->data();
			
			$upload_result = base_url() . 'upload/'.$up['file_name'];
			$upload_name = $up;
		
			//print_r( $this->upload->data() );
 
			$url = $upload_result;
			$message = 'Upload success!';
		}


		echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
		
		
	}
	
	
}
?>