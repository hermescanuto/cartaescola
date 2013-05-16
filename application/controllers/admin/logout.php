<?php

/*
 *
* @autor	Hermes Canuto de Souza
* @Descrição controle de logout do sistema
*/

class logout extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}

	/*
	 *
	* @autor	Hermes Canuto de Souza
	* @Descrição destroi a sessão que valida o usuario
	*/


	function index()
	{
		$this->session->sess_destroy();
		header('Location: ' .  base_url() ."adm" );
	}
}
