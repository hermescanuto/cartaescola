<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Hermes hermes@hermes-Vostro-3500
 * 1.0
 * 2011-06-16
 * 
 *  
 */

class Galeria_upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
	}

	
	function doup()
	{
		if(isset($_FILES['userfile']))
		{
			$files = $this->input->post('userfile');
			print_r ($files) ;
		}		
		
	}
}
