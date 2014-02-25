<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Materias extends CI_Controller {

	protected $data = array();
	protected $tabela = 'tb_conteudo';
	protected $view = 'vw_conteudo_publicado';

	function __construct() {
		parent::__construct();
		$this -> load -> library('util');
		$this -> load -> model('Model_util');
		$this -> data['base_url'] = base_url();
		$this -> data['local'] = 'mobile/'. $this -> uri -> segment("2");
		$this -> data['tipo_busca'] = NULL;
		$this -> data['lista_legenda'] = "Matérias";
	}

	public function index() {
		$this -> paging();
		// paginacao
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
		$data['search'] = base_url() . $this -> data['local']  . '/paging/0/';
		$data['view'] = 'util/painel_busca';

		//$data['tag']=$this->Model_localevento->localevento_autocomplete(); // autocomplete dos locais

		// Cria a busca

		$table = $this -> view;
		$fields = "*";
		$orderby = '';

		$busca = $this -> uri -> segment("5");
		if (is_numeric($busca)) {
			$campo_busca = 'edicao';
		} else {

			$campo_busca = 'titulo';
		}

		if ($busca != null) {

			$where = array($campo_busca => urldecode($busca) );
		} else {
			$where = null;
		}



		$result = $this -> util -> PaginationOn($table, 20, base_url() .   $this -> data['local'] . '/paging', $fields, $where, $orderby,"4","5",$this -> data['tipo_busca']);
		// cria a paginação
		$data = $result;

		$data['base_url'] = base_url();
		$data['local'] = $this -> data['local'];
		$data['lista_legenda'] = $this -> data['lista_legenda'] ;
		$this -> parser -> parse('mobile/lista', $data);
		// Carrega o view de listagem de materia

	}

}
