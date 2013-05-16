<?php

/*
 *
* @autor   Hermes Canuto de Souza
* @Descrição controle home do administrativo
* Monta o upload administrativo do site.
*
*/

class Upload_pdf  extends CI_Controller {

	var $data = '';
	var $id = '';
	var $table = '' ;

	function __construct()
	{
		parent::__construct();
		$this->load->library('util'); // lib que contem funcoes comuns
		$this->util->LogOn(); // verifica se o usuario esta logado
		$this->load->model('model_util');  // model que contem funcoes comuns
		$this->id   = $this->uri->segment("4");
		$this->table = $this->uri->segment("5");
		$this->titulo = $this->uri->segment("6");
	}

	function index()
	{
		echo 'upload';
	}

	function prepara()
	{
		$this->novo();
	}

	private function pag_conf()
	{
		$this->data['title']='Conteúdo';
		$this->data['js']=  array(
				array('js_url' => 'http://code.jquery.com/jquery-latest.min.js'),
				array('js_url' => 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js'),
				array('js_url' =>  base_url().'js/bootstrap.js'),

				array('js_url' =>  base_url().'js2/util.js'),
				 
		);
		$this->data['css']= array(
				array('css_url' => base_url().'css/bootstrap.css'),
				array('css_url' => 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/base/jquery-ui.css'),
				array('css_url' => base_url().'css2/style.css'),
		);
		$this->data['local'] =  $this->uri->segment("2");
	}

	function novo()
	{

		$pic[1] = 'Pdf Free';
		$pic[2] = 'Pdf Pago ';
		$pic[3] = 'Imagem da CAPA';
		$pic[4] = 'Imagens ilustrativa 245px de largura por altura livre';
		$pic[5] = 'Thumb 100px por 100px';




		$this->pag_conf();
		$this->util->ShowADMTopPage($this->data); // carrega o topo do adm
		$this->util->ShowADMMenu(0) ; // carrega o menu adm
		$data['error'] = '';
		$data['id'] = $this->id;
		$data['t'] = $this->table;
		$data['pic'] = $pic[$this->table] ;
		$data['base_url'] = base_url();
		$data['save']       = base_url().'admin/'.$this->data['local'].'/save';

		$recordset = $this->ShowReport($this->id,$this->table);


		if ( $this->table == 1 ){
			$data["pdf"] = $recordset["pdf_free"] ;
			$folder = "pdf_free";
			 
		}

		if ( $this->table == 2 ){
			$data["pdf"] = $recordset["pdf"] ;
			$folder = "pdf";
		}



		if ($data["pdf"] != null) {

			$data["pdf"]  = "<a href='" . $data['base_url']. "upload/$folder/" . $data["pdf"]."' >PDF Atual</a>";
		}




		$data["titulo"] = $recordset["titulo"] ;
		$data["data_criacao"] = $recordset["data_criacao"] ;

		$this->parser->parse( 'util/upload_form_pdf',$data);

		$this->util->ShowADMBottomPage(); // Carrega o rodape do adm
	}

	function do_upload( )
	{
		switch ($this->table)
		{
			case 1:
				$campo='pdf_free';
				$tbl='tb_conteudo';
				$folder = "pdf_free/";
				break;
			case 2:

				$campo='pdf';
				$tbl='tb_conteudo';
				$folder = "pdf";
				break;
			case 3 :

				$campo='imagem_capa';
				$tbl='tb_edicao';
				$folder = "capa/";
				break;
			case 4 :

				$campo='imagem_ilustrativa';
				$tbl='tb_conteudo';
				break;
			case 5 :
				$campo='thumb';
				$tbl='tb_galeria_foto';
				break;

		}


		$config['upload_path'] = './upload/'.$folder;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '8048';
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$this->data['error'] = $this->upload->display_errors();
			$this->parser->parse('util/uploadform', $this->data);
		}
		else
		{
			$upload_data=$this->upload->data();
			$data['arquivo']=$upload_data['file_name'];
			$data['base_url']=base_url();

			$campos = Array
			(
					$campo  => $upload_data['file_name']
			);

			$this->model_util->setTableData($tbl);
			$this->model_util->setID($this->id);
			$this->model_util->setData($campos);
			$this->model_util->save();

			$this->pag_conf();
			$this->util->ShowADMTopPage($this->data); // carrega o topo do adm
			$this->util->ShowADMMenu(0) ; // carrega o menu adm
			$data['error'] = '';
			$data['id'] = $this->id;
			$data['arquivo'] =  $folder.'/'.$upload_data['file_name'];
			$data['base_url'] = base_url();
			$data['save']       = base_url().'admin/'.$this->data['local'].'/save';

			 

			$this->parser->parse( 'util/upload_pdf_ok',$data);

			$this->util->ShowADMBottomPage(); // Carrega o rodape do adm

		}


	}

	/*
	 *
	* @autor   Hermes Canuto de Souza
	* busca no banco a materia por id
	* idx = id da materia
	*/
	function ShowReport($idx, $tbl) {

		if ($tbl == 3) {

			$data = $this -> model_util -> ByIDtoTemplate("tb_edicao", $idx);

			$data['titulo'] = "Edição:" . $data['edicao'] . "  Mês:" . $data['mes'] . "  Ano:" . $data['ano'];

			if ($data["imagem_capa"] == null) {
				$data["imagem_capa"] = "446x283.jpg";
			}

		} else {

			$data = $this -> model_util -> ByIDtoTemplate("tb_conteudo", $idx);

			if ($data["imagem_home"] == null) {
				$data["imagem_home"] = "http://placehold.it/970x483";
			} else {
				$data["imagem_home"] = base_url() . "upload/" . $data["imagem_home"];
			}

			if ($data["imagem_fundo"] == null) {
				$data["imagem_fundo"] = "http://placehold.it/446x283";

			} else {

				$data["imagem_fundo"] = base_url() . "upload/" . $data["imagem_fundo"];
			}
		}

		return $data;

	}

	function zerar(){

		switch ($this->table)
		{
			case 1:
				$campo='pdf_free';
				$tbl='tb_conteudo';

				break;
			case 2:

				$campo='pdf';
				$tbl='tb_conteudo';
				 
				break;


		}

		$campos = array( $campo => NULL);
		$this->model_util->setTableData($tbl);
		$this->model_util->setID($this->id);
		$this->model_util->setData($campos);
		$this->model_util->save();


		$this->pag_conf();
		$this->util->ShowADMTopPage($this->data); // carrega o topo do adm
		$this->util->ShowADMMenu(0) ; // carrega o menu adm

		$this->parser->parse( 'util/pdf_zerado',$this->data);

		$this->util->ShowADMBottomPage(); // Carrega o rodape do adm

	}

}
