<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Index Page for this controller.
*/

class Single extends CI_Controller {

	protected $data = array();

	function __construct() {
		parent::__construct();
		$this -> load -> library('util');
		$this -> load -> model('Model_util');
		$this -> data['base_url'] = base_url();
	}

	public function index() {
		echo "single_page";
	}

	function show($idx) {
		$data = $this -> Model_util -> ByIDtoTemplate("vw_conteudo", $idx);

		setlocale(LC_ALL, NULL);
		setlocale(LC_ALL, 'pt_br');

		$data["dia"] = date('d', strtotime($data["data_criacao"]));
		$data["mes"] = date('m', strtotime($data["data_criacao"]));
		$data["ano"] = date('Y', strtotime($data["data_criacao"]));

		if ($data["imagem_home"] == null ) {
			$data["imagem_home"] = "970x483.jpg";
		}

		if( $data["pdf_free"] != null){

			$data["pdf_free"] =  "<a href='" .  $this -> data['base_url']. "upload/pdf_free/" . $data["pdf_free"]."' >Click para fazer o download do pdf</a>";;
		}





		$data["texto_extra"] = nl2br($data["texto_extra"]);

		$this -> parser -> parse('front/single', $this -> data + $data);
	}

}
