<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Hermes hermes@hermes-Vostro-3500
* 1.0
* 2011-06-10
* VoleiSP
*
*/

class Edicao extends CI_Controller {

	protected $data 	= array();
	protected $tabela 	= 'tb_edicao';
	protected $view 	= 'vw_edicao';

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

		$data["imagem_capa"] = "http://placehold.it/446x283";
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
		$this -> pag_conf();
		$this -> util -> ShowADMTopPage($this -> data);
		// carrega o topo do adm
		$this -> util -> ShowADMMenu(0);
		// carrega o menu adm

		$data = $this -> Model_util -> ByIDtoTemplate($this -> tabela, $idx);



		if ($data["imagem_capa"] == null ) {
			$data["imagem_capa"] = "http://placehold.it/446x283";
			$data["up_imagem_capa"]=null;
		} else {

			$data["up_imagem_home"]="<a href='".base_url()."admin/upload_imagem/prepara/$idx/3'  ><i class='icon-th-large'></i></a>";
			$data["imagem_capa"] = base_url() . "upload/capa/" . $data["imagem_capa"];
		}
		 

		if ( $idx !== null ) {
			$data["up_imagem_capa"]="<a href='".base_url()."admin/upload_imagem/prepara/$idx/3'  title='Upload da imagem da Capa da Edição'  data-toggle='tooltip' data-placement='top' rel='tooltip'><i class='icon-th-large'></i></a>";
		}
		 

		//$data['galeria_id'] = $this->Model_util->tipo('tb_galeria','id as id , titulo as descricao',$data['galeria']);

		$data['save'] = base_url() . 'admin/' . $this -> data['local'] . '/save';
		$data['base_url'] = base_url();

		$this -> parser -> parse($this -> data['local'] . '/painel_entrada', $data);
		$this -> util -> ShowADMBottomPage();
		// Carrega o rodape do adm
	}
	/*
	 *
	* @autor	Hermes Canuto de Souza
	* salva o registro no banco de dados
	*
	*/


	function save()
	{

		/*		$this->pag_conf();
		 $this->util->ShowADMTopPage($this->data); // carrega o topo do adm
		$this->util->ShowADMMenu(0) ; // carrega o menu adm	 */

		$id = $this->input->post('id');
		$campos = $_POST;

		$this->Model_util->setTableData($this->tabela);
		$this->Model_util->setID($id);
		$this->Model_util->setData($campos);
		$this->Model_util->save();

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
		$data['view'] 		= 'util/painel_busca';

		//$data['tag']=$this->Model_localevento->localevento_autocomplete(); // autocomplete dos locais
		$this->util->ShowSearch($data); // Cria a busca


		$table = $this->view;
		$fields = "*";
		$orderby = 'id desc';



		if ( $this->uri->segment("5") != null ) {
			$where = array ('edicao' => urldecode($this->uri->segment("5")) );
		}
		else
		{
			$where = '';
		}

		//print_r ($where);

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
		
		
		$data = $this -> Model_util -> ByIDtoTemplate($this -> tabela, $idx);
		if ( $data['atual']=='sim'){
			
			$this->pag_conf();
			$this->util->ShowADMTopPage($this->data); // carrega o topo do adm
			$this->util->ShowADMMenu(0) ; // carrega o menu adm
				
			$data['msg']= "Este ID não pode ser deletado, pois está marcado como Capa Atual";
				
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
	* @autor   Hermes Canuto de Souza
	* marca esta edição como a atual.
	*/

	function capa($id){
		$this->Model_util->setCapa($id);

		$this->data['local']=$this->uri->segment("2");
		redirect(base_url().'admin/'.$this->data['local'] );
	}


}
?>
