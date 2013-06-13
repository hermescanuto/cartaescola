<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Secoes extends CI_Controller {

	protected $data = array();
	protected $tabela = 'tb_conteudo';
	protected $view = 'vw_conteudo_publicado';

	function __construct() {
		parent::__construct();
		$this -> load -> library('util');
		$this -> load -> model('Model_util');
		$this -> data['base_url'] = base_url();
		$this -> data['local'] = $this -> uri -> segment("2");
		$this -> data['tipo_busca'] = 6;
		$this -> data['lista_legenda'] = "Seções";
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

		if ($busca != null) {

			$where = array($campo_busca => urldecode($busca) , 'tb_tipo_conteudo_id' => $this -> data['tipo_busca'] , 'publicar'=>1);
		} else {
			$where = array( 'tb_tipo_conteudo_id' => $this -> data['tipo_busca'] , 'publicar'=>1);
		}



		$result = $this -> util -> PaginationOn($table, 10, base_url() .  $this -> data['local'] . '/paging', $fields, $where, $orderby);
		// cria a paginação
		$data = $result;

		$data['base_url'] = base_url();
		$data['local'] = $this -> data['local'];
		$data['lista_legenda'] = $this -> data['lista_legenda'] ;
		$this -> parser -> parse('front/lista', $data);
		// Carrega o view de listagem de materia

	}

}
