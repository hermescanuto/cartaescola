<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Hermes hermes@hermes-Vostro-3500
 * 1.0
 * 2011-06-10
 * VoleiSP
 *  
 */

class Galeria extends CI_Controller {

	protected $data 	= array();	
	protected $tabela 	= 'tb_galeria';
	protected $view 	= 'vw_galeria2';
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('util'); // lib que contem funcoes comuns 
		$this->util->LogOn(); // verifica se o usuario esta logado
		$this->load->model('Model_util');  // model que contem funcoes comuns
		
		//$this->load->model('Model_localevento'); // model que contem funcoes para local de eventos
		$this->load->model('Model_galeria'); // model que contem funcoes para local de eventos				
	}
	
	private function pag_conf()
	{
		$this->data['title']='Galeria';		
		$this->data['js']= 	array(							
							array('js_url' => 'https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js'),						
							
							array('js_url' =>  base_url().'js/jquery_tooltip.js'),
							array('js_url' =>  base_url().'js/jquery_tooltip_execute.js'),							
								
							array('js_url' =>  base_url().'js/lightbox.js'),
												
							array('js_url' =>  base_url().'js/util.js'),	
							array('js_url' =>  base_url().'js/galeria_painel_entrada.js'),	
							array('js_url' =>  base_url().'js/lista_confirma_delete.js'),											   					                     
						);												
		$this->data['css']= array(
							array('css_url' => 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/base/jquery-ui.css'),
							array('css_url' => base_url().'css/style_interno01.css'),
							array('css_url' => base_url().'css/simpletooltip.css'),
							
							array('css_url' => base_url().'css/jquery.lightbox-0.5.css'),
							array('css_url' => base_url().'css/galeria.css')
							);
		$this->data['base_url']	= base_url();
		$this->data['local'] 	= $this->uri->segment("2");	
	}


	public function index()
	{
		$this->paging(); // paginacao	
	}

	
	/* 
 *
 * @autor	Hermes Canuto de Souza
 * Criação do registro que vai receber os dados da materia
 * 
 */	
	
	function novo()
	{	
		$this->pag_conf();																		
		$this->util->ShowADMTopPage($this->data); // carrega o topo do adm		
		$this->util->ShowADMMenu(0) ; // carrega o menu adm
		
		$data['id']='';
		$data['titulo']='';
		$data['descricao']='';	
		
		$data['save']		= base_url().'admin/'.$this->data['local'].'/save';
	    $this->parser->parse( $this->data['local'].'/painel_entrada',$data);	
	    		
		$this->util->ShowADMBottomPage(); // Carrega o rodape do adm			
	}
/* 
 *
 * @autor	Hermes Canuto de Souza
 * busca no banco a materia por id
 * idx = id da materia
 */	

	
	function ShowReport($idx)
	{
		$this->pag_conf();																		
		$this->util->ShowADMTopPage($this->data); // carrega o topo do adm		
		$this->util->ShowADMMenu(0) ; // carrega o menu adm
	
		$data = $this->Model_util->ByIDtoTemplate($this->tabela,$idx);		
		
		$data['save']		= base_url().'admin/'.$this->data['local'].'/save';		
		$this->parser->parse($this->data['local'].'/painel_entrada',$data);	
		
		$this->util->ShowADMBottomPage(); // Carrega o rodape do adm		
	}
		
	
	/* 
 *
 * @autor	Hermes Canuto de Souza
 * salva o registro no banco de dados
 * 
 */	
	
	
	function save()
	{
		
	
		
		$id = $this->input->post('id');					
		$campos = Array
		(
			'titulo' 			=> $this->input->post('titulo'),
			'descricao' 		=> $this->input->post('descricao')	
		);			
				
		$this->Model_util->setTableData($this->tabela);		
		$this->Model_util->setID($id);		 
		$this->Model_util->setData($campos);
		$this->Model_util->save();
		
		$pasta = $this->Model_util->getInsertID();	
		/*if ( $pasta != '' ) 
		{
			$this->Makedir($pasta);
		}*/	
						
		$this->paging();				

		$this->util->ShowADMBottomPage(); // Carrega o rodape do adm
	}	

	/* 
 *
 * @autor	Hermes Canuto de Souza
 * paginação
 * 
 */		
	
	 function paging()	 
	{		
		
				
		$this->pag_conf();																		
		$this->util->ShowADMTopPage($this->data); // carrega o topo do adm		
		$this->util->ShowADMMenu(0) ; // carrega o menu adm
		
		// Cria a busca 
		$data['new_record'] = base_url().'admin/'.$this->data['local'].'/novo';
		$data['search']		= base_url().'admin/'.$this->data['local'].'/paging/0/';
		$data['view'] 		= $this->data['local'].'/painel_busca'; 
						
	//	$data['tag']=$this->Model_localevento->localevento_autocomplete(); // autocomplete dos locais					
		$this->util->ShowSearch($data); // Cria a busca
				
	
		$table = $this->view; 
	    $fields = "*";	
		$orderby = 'id desc';	
		
		
		
		if ( $this->uri->segment("5") != null ) {
			$where = array ('titulo' => urldecode($this->uri->segment("5")) );
		}
		else 
		{
			$where = '';
		}		
	
		print_r ($where);
			 
		$result=$this->util->PaginationOn($table,10,base_url().'admin/'.$this->data['local'].'/paging',$fields,$where,$orderby); // cria a paginação			
		$data = $result;
				
		$data['base_url']=base_url();
		$data['local'] = $this->data['local']; 	
		$this->parser->parse($this->data['local'].'/lista',$data); // Carrega o view de listagem de materia	
			
		$this->util->ShowADMBottomPage(); // Carrega o rodape do adm
	}
	
/* 
 *
 * @autor	Hermes Canuto de Souza
 * deleta a materia do banco.
 * e retorna para pagina que foi chamado
 * idx = id do relatorio
 * page = pagina de retorno ou numero da paginacao
 */		
	
	function DeleteReport($idx,$page)
	{
		
		$this->data['local']=$this->uri->segment("2");
		
		$this->Model_util->setTableData($this->tabela);		
		$this->Model_util->setID($idx);		 
		$this->Model_util->setData(Array('visivel'=> 0));
		//$this->Model_util->delete();
		$this->Model_util->save();
		redirect(base_url().'admin/'.$this->data['local'].'/paging/'.$page); // retorna para pagina que foi chamado 
		
	}	
	
/* 
 *
 * @autor	Hermes Canuto de Souza
 * cria a pasta da galeria .
 */		
	function Makedir($pasta) 
	{
		$thisdir = getcwd(); // pasta corrente 	

		if(mkdir($thisdir ."/galeria/".$pasta ))
		{
			echo "Directory has been created successfully...";
		}
		else
		{
			echo "Failed to create directory...";
		} 
		
		
	}

/* 
 *
 * @autor	Hermes Canuto de Souza
 *  deleta a pasta da galeria .
 */	

	function Deletedir($pasta)
	{
		$thisdir = getcwd();
		rmdir($thisdir ."/galeria/".$pasta);
		
	}
	
/* 
 *
 * @autor	Hermes Canuto de Souza
 *  prepara o upload de imagens .
 */		
	
	function uploadpic($idx)
	{
		$this->load->helper(array('form', 'url'));
		
		$this->pag_conf();																		
		$this->util->ShowADMTopPage($this->data); // carrega o topo do adm		
		$this->util->ShowADMMenu(0) ; // carrega o menu adm
	
		$data = $this->Model_util->ByIDtoTemplate($this->tabela,$idx);		
		
		$data['klog'] =$idx;
		$data['url'] = base_url().'admin/'.$this->data['local'].'/upload';	
	
		$this->parser->parse($this->data['local'].'/painel_upload',$data);	
		
		$this->util->ShowADMBottomPage(); // Carrega o rodape do adm	
		
		
	}
/* 
 *
 * @autor	Hermes Canuto de Souza
 *  upload de imagens .
 */		
		
function upload()
{
		$this->load->helper(array('form', 'url'));
	
		$this->pag_conf();																		
		$this->util->ShowADMTopPage($this->data); // carrega o topo do adm		
		$this->util->ShowADMMenu(0) ; // carrega o menu adm
		
		$pasta=$this->input->post('klog');
		$legenda=$this->input->post('legenda');
		//$data['base_url']=base_url();
			
	    $config['upload_path'] 		= './upload/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|';         

        $this->load->library('upload', $config);     
            
		$files = $this->upload->do_upload();
        if ( ! $files )
        {
			echo $this->upload->display_errors();
		}
		else
		{
			$result= $this->upload->data();
			
			$x=$result['file_name'];
			
			$campos = Array
			(
				'tb_galeria_id'		=> $pasta,
				'pasta' 			=> $pasta,
				'arquivo' 			=> $result['file_name'],
				'legenda' 			=> $legenda	
			);				
			$this->Model_util->setTableData('tb_galeria_foto');		 
			$this->Model_util->setData($campos);
			$this->Model_util->save();
		}
		
		$data = $this->Model_util->ByIDtoTemplate($this->tabela,$pasta);		
		$data['klog'] =$pasta;
		$data['arquivo'] = $x;
		$data['tamanho'] =$result['file_size'];	
		$data['legenda'] =$legenda;		
		$data['base_url']=base_url();
		$data['pasta'] =$pasta;		
		$data['url'] = base_url().'admin/'.$this->data['local'].'/upload';			
			
		$this->parser->parse($this->data['local'].'/painel_upload',$data);	
		
		$this->util->ShowADMBottomPage(); // Carrega o rodape do adm	
	
	
	
}	


}
