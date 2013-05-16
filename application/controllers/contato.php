<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Index Page for this controller.
*/

class Contato extends CI_Controller {

	protected $data = array();

	function __construct() {
		parent::__construct();
		$this -> load -> library('util');
		$this -> load -> library('twitter');
		$this -> load -> model('Model_util');
		$this -> data['base_url'] = base_url();
	}

	public function index() {
		$this -> data["alvo_contato"] = 'current-menu-item';
		$this -> parser -> parse('front/contato', $this -> data);
	}

	public function enviar() {

		$name = $this -> input -> post('name');
		$email = $this -> input -> post('email');
		$web = $this -> input -> post('web');
		$comments = $this -> input -> post('comments');

		$msg = "";
		$msg += "<br/> Nome:$name ";
		$msg += "<br/> Email:$email ";
		$msg += "<br/> Website:$$web ";
		$msg += "<br/> Comentario:<br/>$name ";

		echo $msg;

		$this -> load -> library('email');

		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['protocol'] = 'sendmail';
		$config['wordwrap'] = TRUE;

		$this -> email -> initialize($config);

		$this -> email -> from('cartanaescola@cartanaescola.com.br', 'contato');
		$this -> email -> to('escola@cartacapital.com.br');

		$this -> email -> subject('Contato');
		$this -> email -> message($msg);

		$this -> email -> send();

		echo $this -> email -> print_debugger();

	}

}
