<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Edicao extends CI_Controller {

	protected $data = array();
	protected $tabela = 'tb_conteudo';
	protected $view = 'vw_conteudo';

	function __construct() {
		parent::__construct();
		$this -> load -> library('util');
		$this -> load -> model('Model_util');
		$this -> data['base_url'] = base_url();
		$this -> data['local'] = $this -> uri -> segment("1");

		$this -> data['lista_legenda'] = "Edicao";
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

	function paging($busca) {

		//$data['tag']=$this->Model_localevento->localevento_autocomplete(); // autocomplete dos locais

		// Cria a busca

		$table = $this -> view;
		$fields = "*";
		$orderby = 'id desc';

		 

		$where = array('edicao' => $busca, 'publicar'=>1);

		$result = $this -> util -> PaginationOn($table, 100, base_url() . $this -> data['local'] . '/paging', $fields, $where, $orderby, "3", "4");

		//echo $this->db->last_query();
		 
		$data = $result;

		$data['base_url'] = base_url();
		$data['local'] = $this -> data['local'];
		$data['edicao'] = $busca;

		// busca a capa

		$recordset = $this->Model_util->getCapa($busca);

		$data['edicao_capa'] = $recordset['imagem_capa'];
		$data['edicao_numero'] = $recordset['edicao'];

		$this -> parser -> parse('front/edicao', $data);
		// Carrega o view de listagem de materia

	}

}
