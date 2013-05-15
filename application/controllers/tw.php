<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tw extends CI_Controller {

    protected $data = array();

    function __construct() {
        parent::__construct();
        $this -> load -> library('util');
        $this -> load -> library('twitter');
        $this -> load -> model('Model_util');
        $this -> data['base_url'] = base_url();
    }

    public function index() {
        
        $recordset = $this->twitter->getTwitter('cartacapital',10);        
        print_r($recordset);

    }

}
