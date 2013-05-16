<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Index Page for this controller.
*/

class Sobre extends CI_Controller {

	protected $data = array();

	function __construct() {
		parent::__construct();
		$this -> load -> library('util');
		$this -> load -> library('twitter');
		$this -> load -> model('Model_util');
		$this -> data['base_url'] = base_url();
	}

	public function index() {

		$this->data["alvo_sobre"] ='current-menu-item';
		$this -> parser -> parse('front/sobre', $this -> data);
	}

}
