<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Enviar extends CI_Controller {

    protected $data = array();


    function __construct() {
        parent::__construct();
        $this -> load -> library('util');
        $this -> load -> model('Model_util');
        $this -> data['base_url'] = base_url();
        $this -> data['local'] = $this -> uri -> segment("2");
        $this -> data['tipo_busca'] = 2;
        $this -> data['lista_legenda'] = "Contato";
        $this -> data['base_url'] = base_url();
    }
    
    
    function index(){
        
                  $this->parser -> parse('mobile/resposta_contato', $this -> data);
    }
        

}

