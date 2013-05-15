<?php

/* 
 *
 * @autor	Hermes Canuto de Souza
 * @Descrição controle home do administrativo 
 * Monta o upload administrativo do site.
 * 
 */

class Upload  extends CI_Controller {

	var $data = '';
	var $id = '';
	var $table = '' ;

	function __construct()
    {
        parent::__construct(); 		
		$this->load->library('util'); // lib que contem funcoes comuns 
		$this->util->LogOn(); // verifica se o usuario esta logado
		$this->load->model('model_util');  // model que contem funcoes comuns	
		$this->id	= $this->uri->segment("4");
	    $this->table = $this->uri->segment("5");   	
    }
		
	function index()
	{				
	  // $this->id	= $this->uri->segment("4");
	 //  $this->table = $this->uri->segment("5"); 
	   
	   echo 'id:'. $this->id.'<br/>tabela:'.$this->table;
			
	}
	
	function get($id = 0,$table=null)
	{
		$this->pagconf();
		$this->parser->parse('util/uploadform',$this->data);
	}
	
	
	function pagconf()
	{
		$this->data['base_url'] = base_url();	
		$this->data['id']	 = $this->uri->segment("4");
		$this->data['option'] = $this->uri->segment("5");
		$this->data['error'] = '';		
	}
	
	function do_upload($id = 0,$table=null)	
	{
	
		$this->pagconf();
		
		//echo 'tabela:'. $this->table ; 
	
		switch ($this->table)
		{
			case 'colaborador':		
			 		$folder='./up/colaboradores/';
					$table='tb_juiz';
					$data['folder']=1;		
			break;
			case 'classificado':
					$folder='./up/classificado/';	
					$table='tb_classificados';
					$data['folder']=2;		
			break;		
			case 'biblioteca' :
					$folder='./up/biblioteca/';
					$table='tb_biblioteca';
					$data['folder']=3;	
			break;		
		}
		
		
	
		
		$config['upload_path'] = $folder;
		$config['allowed_types'] = 'gif|jpg|png|jpeg|';
		$config['max_size']	= '2048';
				
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload())
		{
			$this->data['error'] = $this->upload->display_errors();			
			$this->parser->parse('util/uploadform', $this->data);
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());	
			$upload_data=$this->upload->data();	
						
			$data['arquivo']=$upload_data['file_name'];
			$data['base_url']=base_url();		
			
			$campos = Array
			(
				'foto'	=> $upload_data['file_name'],
				'pasta'	=> $folder
			);
				
			$this->model_util->setTableData($table);
			$this->model_util->setID($this->id);	
			$this->model_util->setData($campos);
			$this->model_util->save();
						
			$this->parser->parse('util/uploadsuccess', $data);
		}
		
	}
	
}