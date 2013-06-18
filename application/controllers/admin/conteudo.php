<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Hermes hermes@hermes-Vostro-3500
* 1.0
* 2011-06-10
* corta na  escola
*
*/

class Conteudo extends CI_Controller {

	protected $data 	= array();
	protected $tabela 	= 'tb_conteudo';
	protected $view 	= 'vw_conteudo';

	function __construct()
	{
		parent::__construct();
		$this->load->library('util'); // lib que contem funcoes comuns
		$this->util->LogOn(); // verifica se o usuario esta logado
		$this->load->model('Model_util');  // model que contem funcoes comuns
		$this->data['base_url'] = base_url();
		 
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
				array('js_url' =>  base_url().'js2/lista_confirma_delete.js'),
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

		$data = $this->model_util->FieldTemplateNull($this->tabela);
		
		$data['autocomplete']=$this->Model_util->conteudo_sub_classificacao();

		$data['edicao_lista']=$this->Model_util->tipo('vw_edicao','edicao as id , edicao descricao');
		$data['area']=$this->Model_util->tipo('tipo_conteudo','id as id , tipo_conteudo as descricao');
		
		
		
		//$data['galeria_id']=$this->Model_util->tipo('tb_galeria','id as id , titulo as descricao');
		$data["imagem_home"] = "http://placehold.it/970x483";
		$data["imagem_fundo"] = "http://placehold.it/446x283";
		$data["up_imagem_home"]=null;
		$data["up_imagem_fundo"]=null;

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
	function ShowReport($idx) {
		
		
		$data = $this -> Model_util -> ByIDtoTemplate('vw_lock', $idx, 'tb_conteudo_id');
		
		// verifica se o registro esta livre
		if ( $data['id'] == null or $data['tb_usuario_id'] == $this->session->userdata('user_id') ){
			
			
          // registro sava no banco 
				
			if ( $data['tb_usuario_id'] != $this->session->userdata('user_id') ){
				$campos= array(
						'tb_conteudo_id' => $idx,
						'tb_usuario_id'  => $this->session->userdata('user_id')
				);
				$this->Model_util->setTableData('tb_lock');
				$this->Model_util->setID(NULL);
				$this->Model_util->setData($campos);
				$this->Model_util->save();
			}	
			
			
		
		$this -> pag_conf();
		$this -> util -> ShowADMTopPage($this -> data);
		// carrega o topo do adm
		$this -> util -> ShowADMMenu(0);
		// carrega o menu adm

		$data = $this -> Model_util -> ByIDtoTemplate($this -> tabela, $idx);
		
		$data['autocomplete']=$this->Model_util->conteudo_sub_classificacao();
		
		$data['area'] = $this -> Model_util -> tipo('tipo_conteudo', 'id as id , tipo_conteudo as descricao', $data['tb_tipo_conteudo_id']);
		$data['edicao_lista']=$this->Model_util->tipo('vw_edicao','edicao as id , edicao descricao', $data['edicao'] );

		if ($data["imagem_home"] == null ) {
			$data["imagem_home"] = "http://placehold.it/970x483";
			$data["up_imagem_home"]=null;
		} else {

			$data["up_imagem_home"]="<a href='".base_url()."admin/upload_imagem/prepara/$idx/1'  ><i class='icon-th-large'></i></a>";
			$data["imagem_home"] = base_url() . "upload/" . $data["imagem_home"];
		}



		if ($data["imagem_fundo"] == null  ) {
			$data["imagem_fundo"] = "http://placehold.it/446x283";
			$data["up_imagem_fundo"]=null;

		} else {
			$data["up_imagem_fundo"]="<a href='".base_url()."admin/upload_imagem/prepara/$idx/2' ><i class='icon-th'></i></a>";
			$data["imagem_fundo"] = base_url() . "upload/" . $data["imagem_fundo"];
		}




		if ( $idx !== null ) {
			$data["up_imagem_home"]="<a href='".base_url()."admin/upload_imagem/prepara/$idx/1'  title='Upload da imagem da home'  data-toggle='tooltip' data-placement='top' rel='tooltip'><i class='icon-th-large'></i></a>";
			$data["up_imagem_fundo"]="<a href='".base_url()."admin/upload_imagem/prepara/$idx/2'  title='Upload da imagem Painel Menor'  data-toggle='tooltip' data-placement='top' rel='tooltip'><i class='icon-th'></i></a>";
		}
		 
		


		//$data['galeria_id'] = $this->Model_util->tipo('tb_galeria','id as id , titulo as descricao',$data['galeria']);

		$data['save'] = base_url() . 'admin/' . $this -> data['local'] . '/save';
		$data['base_url'] = base_url();

		$this -> parser -> parse($this -> data['local'] . '/painel_entrada', $data);
		$this -> util -> ShowADMBottomPage();
		// Carrega o rodape do adm
		
		}else{
				
			
			$recordset = $this -> Model_util -> ByIDtoTemplate('tb_usuario', $data['tb_usuario_id'] );
			
			$data['msg']= 'Conteúdo Trancado por '.$recordset['nome'].' em '. $data['data_criacao']. ' ID: '.$idx; ;
			
			
			$this->pag_conf();
			$this->util->ShowADMTopPage($this->data); // carrega o topo do adm
			$this->util->ShowADMMenu(0) ; // carrega o menu adm
				
			
				
			$this -> parser -> parse('util/msg', $data);
			
			$this->util->ShowADMBottomPage(); // Carrega o rodape do adm
				
		}
				
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
        
		$campos = $_POST;
		

		$campos['texto'] = $this->input->post('texto_ckeditor');
		$campos['texto_extra'] = $this->input->post('texto_extra_ckeditor');
		$campos['tb_tipo_conteudo_id'] = $this->input->post('tb_usuario_area_id');
		
        
       if ($id){
            
            $campos['alterador'] = $this->session->userdata('user_id');
            $campos['data_alteracao'] = date("Y-m-d H:i:s");
        }else{
            
            $campos['criador'] = $this->session->userdata('user_id');
        }

		$this->Model_util->setTableData($this->tabela);
		$this->Model_util->setID($id);
		$this->Model_util->setData($campos);
		$this->Model_util->save();
		
		// se existe id entao checkou na materia
		
		if ( $id ){
			
			$data = $this -> Model_util -> ByIDtoTemplate('vw_lock', $id, 'tb_conteudo_id');
			
			$id=$data['id'];	
			$this->Model_util->setTableData('tb_lock');
			$this->Model_util->setID($id);
			$this->Model_util->setData(Array('visivel'=> 0,'data_checkout' => date("Y-m-d H:i:s") ));
			$this->Model_util->save();
						
		}
		
		
		

		$this->paging();

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
		$data['view'] 		= 'util/painel_busca';

		//$data['tag']=$this->Model_localevento->localevento_autocomplete(); // autocomplete dos locais
		$this->util->ShowSearch($data); // Cria a busca


		$table = $this->view;
		$fields = "*";
		$orderby = 'id desc';


		$busca = $this->uri->segment("5") ;
		if ( is_numeric($busca) )  {
			$campo_busca = 'edicao' ;
			$orderby = 'edicao asc';
		}else{

			$campo_busca = 'titulo';
		}


		if ( $busca != null ) {


			$where = array ($campo_busca => urldecode($busca) );
		}
		else
		{
			$where = '';
		}

		//print_r ($where);

		$result=$this->util->PaginationOn($table,20,base_url().'admin/'.$this->data['local'].'/paging',$fields,$where,$orderby); // cria a paginação
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

		$r = $this -> Model_util -> showHome();

		for ($i = 0; $i <= 2; $i++) {
			$this -> data["id_$i"] = $r[$i]['id'];
		}




		if ( 	$idx == $this -> data["id_0"] or
		$idx == $this -> data["id_1"] or
		$idx == $this -> data["id_0"] ){
				
			$this->pag_conf();
			$this->util->ShowADMTopPage($this->data); // carrega o topo do adm
			$this->util->ShowADMMenu(0) ; // carrega o menu adm
			
			$data['msg']= "Este ID não pode ser deletado, pois está marcado no carrosel da HOME";
			
			$this -> parser -> parse('util/msg', $data);

			$this->util->ShowADMBottomPage(); // Carrega o rodape do adm
				
		}else{
			
			$this->Model_util->setTableData($this->tabela);
			$this->Model_util->setID($idx);
			$this->Model_util->setData(Array('visivel'=> 0));
			//$this->Model_util->delete();
			$this->Model_util->save();
			redirect(base_url().'admin/'.$this->data['local'].'/paging/'.$page); // retorna para pagina que foi chamado
		}

	}
	
	
	/*
	 *
	* @autor	Hermes Canuto de Souza
	* publica ou nao a materia no site
	* idx = id do relatorio
	* $status = status atual da mateira
	*/
	
	function publish($idx,$status){
		
		$this->data['local']=$this->uri->segment("2");
		
		$new_status = ($status == 1) ? 0 : 1;	
		
		$this->Model_util->setTableData($this->tabela);
		$this->Model_util->setID($idx);
		$this->Model_util->setData(Array('publicar'=> $new_status));
		$this->Model_util->save();
		
		redirect( base_url().'admin/'.$this->data['local'] );
		
	}

}
?>
