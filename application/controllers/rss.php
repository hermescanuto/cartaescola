<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rss extends CI_Controller {

    protected $data = array();
    protected $tabela = 'tb_conteudo';
    protected $view = 'vw_conteudo';

    function __construct() {
        parent::__construct();
        $this -> load -> library('util');
        $this -> load -> model('Model_util');
        $this -> data['base_url'] = base_url();

    }

    public function index() {

        $this -> data['rss_titulo'] = "Carta na Escola";
        $this -> data['rss_link'] = "http://cn.cartacapital.com.br";
        $this -> data['rss_email'] = "contato@cartacapital.com.br";
        $this -> data['rss_descricao'] = "Site de conteúdo escolar";

       

        $recordset = $this -> Model_util -> getCapa();
        $edicao = $recordset['edicao']; 
        $data = $recordset['data_criacao'];
        
        $this -> data['rss_data'] = $this->RFC2822( substr($data,0, 10) , substr($data,11, 10) ) ;
        
        $this -> data['recordset'] = $this -> Model_util -> getRss($edicao);

        $this -> parser -> parse('front/rss', $this -> data);

    }

    function RFC2822($date, $time = '00:00') {
        $date_parts = array_reverse(explode("-", $date));
        $date = implode('-', $date_parts);

        // Set up the format
        $timestamp = strtotime($date . " " . $time);
        $rss_datetime = date(DATE_RFC2822, $timestamp);
        return $rss_datetime;
    }

}
