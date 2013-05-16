<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Index Page for this controller.
*/



class Home extends CI_Controller {

	protected $data = array();

	function __construct() {
		parent::__construct();
		$this -> load -> library('util');
		$this -> load -> library('mobile_detect');
		$this -> load -> library('twitter');
		$this -> load -> model('Model_util');
		$this -> data['base_url'] = base_url();

		if ($this -> mobile_detect -> isMobile() === false) {

			// echo " Melhor visto em pc";
		}

	}

	public function index() {

		$r = $this -> Model_util -> showHome();

		for ($i = 0; $i <= 2; $i++) {
			$this -> data["desc$i"] = $r[$i]['descricao'];


			if ( $r[$i]['imagem_home'] == null ){

				$this -> data["imagem_home$i"] = "970x483.jpg";
			}else{

				$this -> data["imagem_home$i"] = $r[$i]['imagem_home'];
			}

			$this -> data["id$i"] = $r[$i]['id'];
			$this -> data["descricao$i"] = $r[$i]['descricao'];
			$this -> data["titulo$i"] = $r[$i]['titulo'];
			$this -> data["destaque_id$i"] = $r[$i]['id'];
		}

		$recordset = $this -> Model_util -> getatualizades($this -> data["destaque_id0"], $this -> data["destaque_id1"], $this -> data["destaque_id2"]);

		$this -> data['lista_materias'] = $recordset ;


		$this -> parser -> parse('mobile/home', $this -> data);
	
	}

}
