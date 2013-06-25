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

		$deviceType = ($this->mobile_detect->isMobile() ? ($this->mobile_detect->isTablet() ? 'tablet' : 'phone') : 'computer');



		if ( $deviceType == 'phone' ){

			redirect('/mobile/home/', 'refresh');

		}
			

	}

	public function index() {
			

		// busca a capa

		$recordset = $this->Model_util->getCapa();

		$this->data['edicao_capa'] = $recordset['imagem_capa'];
		$this->data['edicao_numero'] = $recordset['edicao'];



		// busca as materias destaque da home
		$r = $this -> Model_util -> showHome();

		for ($i = 0; $i <= 2; $i++) {
			$this -> data["desc$i"] = $r[$i]['descricao'];


			if ( $r[$i]['imagem_home'] == null ){

				$this -> data["imagem_home$i"] = "970x483.jpg";
			}else{

				$this -> data["imagem_home$i"] = $r[$i]['imagem_home'];
			}


			$this -> data["titulo$i"] = $r[$i]['titulo'];
			$this -> data["destaque_id$i"] = $r[$i]['id'];

		}

		// busca as restantes ,por nao busca as que estao em destaque
		$recordset = $this -> Model_util -> getatualizades($this -> data["destaque_id0"], $this -> data["destaque_id1"], $this -> data["destaque_id2"], $this->data['edicao_numero']);

		for ($i = 0; $i <= 5; $i++) {

			$this -> data["id$i"] = $recordset[$i]["id"];
			$this -> data["titulo$i"] = $recordset[$i]["titulo_home"];
			$this -> data["data_criacao$i"] = date("d-m-Y", strtotime($recordset[$i]["data_criacao"]));

			if ( strlen ( $recordset[$i]["descricao"] ) < 140 ){
				$this -> data["olho$i"] = $recordset[$i]["descricao_home"];
			}else{

				$this -> data["olho$i"] =  substr($recordset[$i]["descricao_home"],0 , 100 ) . "...";
			}




			if ( $recordset[$i]["imagem_fundo"] == null ){

				$this -> data["imagem$i"] = "446x283.jpg";

			}else{

				$this -> data["imagem$i"] = $recordset[$i]["imagem_fundo"];
			}


			if ( $recordset[$i]["sub_classificacao"].'' == ''   ){

				$this -> data["sub$i"] = $recordset[$i]["tipo_conteudo"];

			}else{

				$this -> data["sub$i"] = $recordset[$i]["sub_classificacao"];
			}


		}

		//$this->data["lista_Tweeter"] = $this->twitter->getTwitter('cartacapital',3);

		$this->data["alvo_home"] ='current-menu-item';

		$this -> parser -> parse('front/home', $this -> data);
	}
}


