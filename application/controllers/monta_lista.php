<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class monta_lista extends CI_Controller {

	protected $data = array();
	protected $tabela = 'tb_conteudo';
	protected $view = 'vw_conteudo_publicado';
	protected $tipo_busca;

	function __construct() {
		parent::__construct();
		$this -> load -> library('util');
		$this -> load -> model('Model_util');
		$this -> data['base_url'] = base_url();
		$this -> data['local'] = $this -> uri -> segment("1");

	}

	public function index() {
		$this -> paging();
		// paginacao
	}
	
	
	public function tipo($id) {
		
		$recordset = $this -> Model_util -> ByIDtoTemplate('tipo_conteudo', $id);			
		$this -> tipo_busca = $id;
		$this -> data['lista_legenda'] = $recordset['tipo_conteudo'];	
		$this -> paging();
		
	}

	/*
	 *
	* @autor   Hermes Canuto de Souza
	* paginação
	*
	*/

	function paging() {

		// Cria a busca
		$data['new_record'] = base_url() . $this -> data['local'] . '/novo';
		$data['search'] = base_url() . $this -> data['local'] . '/paging/0/';
		$data['view'] = 'util/painel_busca';

		//$data['tag']=$this->Model_localevento->localevento_autocomplete(); // autocomplete dos locais

		// Cria a busca

		$table = $this -> view;
		$fields = "*";
		$orderby = '';

		$busca = $this -> uri -> segment("4");
		if (is_numeric($busca)) {
			$campo_busca = 'edicao';
		} else {

			$campo_busca = 'titulo';
		}

		echo $this -> tipo_busca;
		
		if ($busca != null) {

			$where = array($campo_busca => urldecode($busca) );
		} else {
			$where = '';
		}



		$result = $this -> util -> PaginationOn($table, 10, base_url() .  $this -> data['local'] . '/paging', $fields, $where, $orderby,"4","5", $this -> tipo_busca);
		
		echo $this->db->last_query();
		
		// cria a paginação
		$data = $result;

		$data['base_url'] = base_url();
		$data['local'] = $this -> data['local'];
		$data['lista_legenda'] = $this -> data['lista_legenda'] ;
		$this -> parser -> parse('front/lista', $data);
		// Carrega o view de listagem de materia

	}

}
