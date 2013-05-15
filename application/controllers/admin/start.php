<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Hermes hermes@hermes-Vostro-3500
 * 1.0
 * 2011-06-09
 * VoleiSP
 *  
 */

class start extends CI_Controller {
	
	protected $data = array();	
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('util'); // lib que contem funcoes comuns 
		$this->util->LogOn(); // verifica se o usuario esta logado
		$this->load->model('Model_util');  // model que contem funcoes comuns				
	}

	function pag_conf()
	{
		$this->data['title']='Login Administrativo';		
		$this->data['js']= 	array(							
		              	   array('js_url' => 'http://code.jquery.com/jquery-latest.min.js'),
                           array('js_url' => 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js'),  
                           array('js_url' =>  base_url().'js/bootstrap.js'),                                                           
                                                                                
							array('js_url' =>  base_url().'js2/jquery_tooltip.js'),
							array('js_url' =>  base_url().'js2/jquery_tooltip_execute.js'),						   					                     
						);												
		$this->data['css']= array(
		                      array('css_url' => base_url().'css/bootstrap.css'),
                       
							array('css_url' => base_url().'css2/style_interno01.css'),
							array('css_url' => base_url().'css2/simpletooltip.css')
							);				
	}

	public function index()
	{
		$this->pag_conf();
		$this->util->ShowADMTopPage( $this->data ); // carrega o topo do adm
		$this->util->ShowADMMenu(0) ; // carrega o menu adm	
		
		$this->util->ShowADMBottomPage(); // Carrega o rodape do adm	
	}
}
