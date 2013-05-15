<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Hermes hermes.canuto@gmail.com
 * 1.0
 * 2011-06-08
 * carta escola
 *  
 */

class adm extends CI_Controller {
	
	protected $data = array();		
		
	public function __construct()
	{
		parent::__construct();			
		        
	}

	function pag_conf()
	{
		$this->data['title']='Login Administrativo';		
		$this->data['js']= array(
						   array('js_url' => 'http://code.jquery.com/jquery-latest.min.js'),
						   array('js_url' => 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js'),	
						   array('js_url' =>  base_url().'js/bootstrap.js'),                                                           
                                                                   					   					                     
						);												
		$this->data['css']= array(
							array('css_url' => base_url().'css/bootstrap.min.css'),
							array('css_url' => base_url().'bootstrap-responsive.min.css'),
							array('css_url' => base_url().'css2/style.css'),
                            
							);				
	}
	
	
	public function index()
	{
		//if ( $_SERVER['SERVER_NAME']=='www.voleisp.com.br') header ('Location: http://www.voleisp.com.br') ;
		
		$this->pag_conf();
				
		$usuario = $this->input->post('user');
		$senha = $this->input->post('pass');

		if ( $usuario == false OR $senha == false) 
		{
			$this->start('inicio normal');			
		}
		else 
		{
			$this->load->model('Model_util');
			$logon=$this->Model_util->valid_user($usuario,$senha);
			if ($logon != false) 
			{
				$this->create_session($logon);				
				header('Location: ' . base_url(). 'admin/start');
			}
			else
			{
				$this->start('Dados incorretos');
			}
		}	
			
	}
	
	
	function start($msg='')      
	{
		$this->data['str_login_msg']	= $msg; // msg de erro inciailmente em branco
		$this->data['logon']		= base_url().'adm'; 	
        $this->data['base_url']        = base_url(); 	
		$this->parser->parse('adm/login', $this->data);
	}
	
	
	function create_session($logon)
	{
		$this->load->library('session');
		$session = array
		(
				'user_id'	=> $logon->id, // id do usuario 
				'nome'		=> $logon->nome,	// nome usuario 							
				'logged_in'	=> TRUE // ele está logado 
		);				
		$this->session->set_userdata($session);	
	}
}


?>
