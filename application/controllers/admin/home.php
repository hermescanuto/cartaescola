<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Hermes hermes@hermes-Vostro-3500
 * 1.0
 * 2012-04-04
 * cartacapital
 *  
 */

class Home extends CI_Controller {

	protected $data 	= array();	
	protected $tabela 	= 'tb_home';
	protected $view 	= 'vw_home';
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('util'); // lib que contem funcoes comuns 
		$this->util->LogOn(); // verifica se o usuario esta logado
		$this->load->model('Model_util');  // model que contem funcoes comuns
				
	}
	
	private function pag_conf()
	{
		$this->data['title']='Conteúdo';		
		$this->data['js']= 	array(							
							         array('js_url' => 'http://code.jquery.com/jquery-latest.min.js'),
                           array('js_url' => 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js'),  
                           array('js_url' =>  base_url().'js/bootstrap.js'),      
													
							array('js_url' =>  base_url().'js2/ckeditor/ckeditor.js'),
							array('js_url' =>  base_url().'js2/ckeditor/adapters/jquery.js'),													
							array('js_url' =>  base_url().'js2/util.js'),
																	   					                     
						);												
		$this->data['css']= array(
						  array('css_url' => base_url().'css/bootstrap.css'),
                            array('css_url' => 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/base/jquery-ui.css'),
                            array('css_url' => base_url().'css2/style.css'),
							);	
		$this->data['local'] = 	$this->uri->segment("2");	
	}
	
		public function index()
	{
		$this->pag_conf();																		
		$this->util->ShowADMTopPage($this->data); // carrega o topo do adm	
		$this->util->ShowADMMenu(0) ; // carrega o menu adm
		
		$data = $this->Model_util->ByIDtoTemplate($this->tabela,1);		
		
        $data['area3']=$this->Model_util->tipo('tb_conteudo','id as id , titulo as descricao',$data['id3']);    
		$data['area1']=$this->Model_util->tipo('tb_conteudo','id as id , titulo as descricao',$data['id1']);	
		$data['area2']=$this->Model_util->tipo('tb_conteudo','id as id , titulo as descricao',$data['id2']);	
		
				
		$data['save']		= base_url().'admin/'.$this->data['local'].'/save';		
		
		$this->parser->parse($this->data['local'].'/painel_entrada',$data);	
		
		$this->util->ShowADMBottomPage(); // Carrega o rodape do adm	
	}
	
	
	function save()
	{
		
		
		$id = $this->input->post('id');					
		$campos = Array
		(
			'id1' 			=> $this->input->post('id_1'),
			'id2' 			=> $this->input->post('id_2'),
			'id3' 			=> $this->input->post('id_3'),		
			'tb_tipo_conteudo_id'	=> $this->input->post('tb_usuario_area_id')		
		);				
		
		$this->Model_util->setTableData($this->tabela);		
		$this->Model_util->setID($id);		 
		$this->Model_util->setData($campos);
		$this->Model_util->save();
		
		$this->index();		
				
  
		
	}
	
}