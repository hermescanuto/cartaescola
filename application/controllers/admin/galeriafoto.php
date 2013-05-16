<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Hermes hermes@hermes-Vostro-3500
* 1.0
* 2011-06-16
*
*
*/

class Galeriafoto extends CI_Controller {

	protected $data 	= array();
	protected $tabela 	= 'tb_galeria_foto';
	protected $view 	= 'vw_galeria_foto2';

	function __construct()
	{
		parent::__construct();
		$this->load->library('util'); // lib que contem funcoes comuns
		$this->util->LogOn(); // verifica se o usuario esta logado
		$this->load->model('Model_util');  // model que contem funcoes comuns
	}

	public function index()
	{
		echo 'galeriafoto';
	}

	private function pag_conf()
	{
		$this->data['title']='Galeria';
		$this->data['js']= 	array(
				array('js_url' => 'https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js'),
					
				array('js_url' =>  base_url().'js/jquery_tooltip.js'),
				array('js_url' =>  base_url().'js/jquery_tooltip_execute.js'),

				array('js_url' =>  base_url().'js/util.js'),

				array('js_url' =>  base_url().'js/lista_confirma_delete.js'),
		);
		$this->data['css']= array(
				array('css_url' => 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/base/jquery-ui.css'),
				array('css_url' => base_url().'css/style_interno01.css'),
				array('css_url' => base_url().'css/simpletooltip.css')

		);
		$this->data['base_url']	= base_url();
		$this->data['local'] 	= $this->uri->segment("2");
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


		$table = $this->view;
		$fields = "*";
		$orderby = 'id desc';

			
		if ( $this->uri->segment("5") != null ) {
			$where = array ('tb_galeria_id' => urldecode($this->uri->segment("5")) );
		}
		else
		{
			$where = '';
		}

		$result=$this->util->PaginationOn($table,10,base_url().'admin/'.$this->data['local'].'/paging',$fields,$where,$orderby); // cria a paginação
		$data = $result;
		$data['galeria_id']= $this->uri->segment("4").'/'.$this->uri->segment("5");


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

	function DeleteReport($idx,$page,$cur)
	{

		$this->data['local']=$this->uri->segment("2");

		$this->Model_util->setTableData($this->tabela);
		$this->Model_util->setID($idx);
		$this->Model_util->setData(Array('visivel'=> 0));
		//$this->Model_util->delete();
		$this->Model_util->save();
		redirect(base_url().'admin/'.$this->data['local'].'/paging/'.$page.'/'.$cur); // retorna para pagina que foi chamado

	}
}
