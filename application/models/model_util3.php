<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * Hermes hermes.canuto@gmail.com
 * 1.0
 * 2011-06-08
 * VoleiSP
 *
 */

class Model_util extends MY_Model {

    function __construct() {
        parent::__construct();
    }

    /*
     *  Lista as 3 materias destaque da home, desde que contenham a imagem grande
     */

    function showHome( $id = 1 ) {
        $r = $this -> db -> get_where('tb_home', array('id' => $id));
        $r = $r -> result_array();
        
      

        $campo = array('id' => $r[0]['id1'], 'id' => $r[0]['id2'], 'id' => $r[0]['id3']);
        
        $id = array($r[0]['id1'], $r[0]['id2'], $r[0]['id3']);
        
        $this -> db -> where_in('id', $id);
        
        $this -> db -> order_by("id", "RANDOM");
        
        $recordset = $this -> db -> get_where('vw_conteudo', array('imagem_home !=' => "", 'publicar' => 1));
        

        return $recordset -> result_array();
    }

    function listagaleria($id) {
        $recordset = $this -> db -> get_where('tb_galeria_foto', array('tb_galeria_id' => $id));
        return $recordset -> result_array();
    }

    /*
     *
     * @autor	Hermes Canuto de Souza
     * @Descrição valida o usuario no banco de dados
     */

    function valid_user($user, $pass) {
        $fields = array('usuario' => $user, 'senha' => md5($pass));
        $query = $this -> db -> get_where('tb_usuario', $fields);
        if ($query -> num_rows() > 0) {
            return $query -> row();
        } else {
            return false;
        }

    }

    /*
     *
     * @autor	Hermes Canuto de Souza
     * @Descrição retorna os itens do menu
     */

    function getmenu($menu) {

        $this -> db -> order_by("id", "asc");
        $query = $this -> db -> get_where('tb_menu', array('pai' => $menu));
        return $query -> result_array();

    }

    /*
     *
     * @autor	Hermes Canuto de Souza
     * @Descrição busca numa determinada tabela,
     * executa uma clausula sql.
     */

    function ExecSql($table, $fields, $where = '', $page_size = 10, $start = 0, $orderby = '' , $tipo_conteudo = '' ) {
        // para vericar quanto registro tem no banco
        $this -> db -> select($fields);
        //$this->db->where($where);
        if ($where != '') {
            //;$this->db->where($where);
            $this -> db ->where($where);
        }
        
        if( $tipo_conteudo != ''){
        	$this -> db ->where('tb_tipo_conteudo_id', $tipo_conteudo);
        }
        
        $query = $this -> db -> get($table);
        $total = $query -> num_rows();

        //echo '<br/>'.$total;
        
        
        if( $tipo_conteudo != ''){
        	$this -> db ->where('tb_tipo_conteudo_id', $tipo_conteudo);
        }

        // para vericar quanto registro tem no banco com limite de paginacao
        $this -> db -> select($fields);
        if ($where != '') {
            $this -> db -> where($where);
        }
        
     

        if ($orderby != '') {
            $this -> db -> order_by($orderby);
        }

        //$this->db->limit($page_size, $start);

        $query = $this -> db -> get($table, $page_size, $start);

        //echo '<br/>'.$this->db->last_query();

        return array('recordset' => $query -> result_array(), 'record_count' => $total);
    }

    /*
     *
     * @autor	Hermes Canuto de Souza
     * @Descrição busca numa determinada tabela,
     * e ja traz o valores para o template
     */

    function ByIDtoTemplate($tabela, $id, $field = 'id') {
    	$data = array();
    	$query = $this -> db -> get_where($tabela, array( $field  => $id));

    	//echo $this->db->last_query();


    	if ($query->num_rows() > 0)
    	{
    		$x = $query -> result_array();
    		foreach ($x[0] as $i => $v) {
    			$data[$i] = $v;
    		}
    		return $data;
    	}else {
    		
    		return $this->FieldTemplateNull($tabela);
    	}
    }

    function FieldTemplateNull($tabela) {
        $query = $this -> db -> query('SHOW COLUMNS FROM ' . $tabela);
        $x = $query -> result_array();

        foreach ($query->result_array() as $row) {
            $data[$row['Field']] = NULL;
        }
        return ($data);

    }

    /*
     *
     * @autor	Hermes Canuto de Souza
     * @Descrição busca numa determinada tabela,
     * executa uma clausula sql.
     */

    // Retorna Select List para lookup
    function tipo2($tabela, $fields) {
        $this -> db -> select($fields);
        $query = $this -> db -> get($tabela);

        $options = $query -> result_array();

        return $options;
    }

    function tipo($tabela, $fields, $selected = NULL) {
        $data = array();
        $this -> db -> select($fields);
        $query = $this -> db -> get($tabela);

        $x = $query -> result_array();

        if ($selected == NULL) {
            $data[] = array('valor' => -1, 'legenda' => 'Escolha:', 'selected' => 'selected="yes"');
        }

        foreach ($x as $item) {
            if ($item['id'] == $selected) {
                $slc = 'selected="yes"';
            } else {
                $slc = '';
            }

            $data[] = array('valor' => $item['id'], 'legenda' => $item['descricao'], 'selected' => $slc);

        }
        return $data;
    }
    
    
    function tipo3($tabela, $fields, $selected = NULL) {
    	$data = array();
    	$this -> db -> select($fields);

    	$query = $this -> db -> get_where($tabela, array("visivel" => 1, "publicar" => 1, "imagem_fundo !=" => "","tb_tipo_conteudo_id !=" => 11 ) );
    
    	$x = $query -> result_array();
    
    	if ($selected == NULL) {
    		$data[] = array('valor' => -1, 'legenda' => 'Escolha:', 'selected' => 'selected="yes"');
    	}
    
    	foreach ($x as $item) {
    		if ($item['id'] == $selected) {
    			$slc = 'selected="yes"';
    		} else {
    			$slc = '';
    		}
    
    		$data[] = array('valor' => $item['id'], 'legenda' => $item['descricao'], 'selected' => $slc);
    
    	}
    	return $data;
    }

    function busca_categoria($id) {
        $this -> db -> order_by("id", "desc");
        $this -> db -> limit(1);
        $query = $this -> db -> get_where('tb_conteudo', array('tb_tipo_conteudo_id' => $id));
        $recorset = $query -> result_array();
        if ($query -> num_rows() > 0) {
            return $recorset[0]['id'];
        } else {
            return false;
        }

    }

    // Retorna lista de 6 materias para atualidades, porem despresa os ids abaixo,
    // retorna somente os conteudo que tem a imagem nenor
    function getatualizades($id0, $id1, $id2, $edicao) {

        $ids = array($id0, $id1, $id2);
        $this -> db -> where_not_in('id', $ids);
        
        $edicoes = array ($edicao,($edicao-1) );
        $this->db->where_in('edicao', $edicoes);
        
        $this -> db -> order_by("title", "RANDOM");
        $this -> db -> limit(6);
       
        $query = $this -> db -> get_where('vw_conteudo', array("visivel" => 1, "publicar" => 1, "imagem_fundo !=" => "","tb_tipo_conteudo_id !=" => 11 ));
        $recorset = $query -> result_array();
        return $recorset;

    }

    /*
     *
     * @autor   Hermes Canuto de Souza
     * marca esta edição como a atual.
     */

    function setCapa($id) {

        $this -> db -> update('tb_edicao', array('atual' => null));

        $this -> db -> where('id', $id);
        $this -> db -> update('tb_edicao', array('atual' => "sim"));

    }

    /*
     *
     * @autor   Hermes Canuto de Souza
     * traz a capa atual.
     */

    function getCapa($id = null) {
    	
        if ($id === null) {

            $query = $this -> db -> get_where('vw_edicao', array('atual' => "sim"));

        } else {
            $query = $this -> db -> get_where('vw_edicao', array('edicao' => $id));
        }
        

        if ($query->num_rows() > 0)
        {
        	 $recordset = $query -> result_array();
        	 return $recordset[0];
        }else{
        	
        	return array('imagem_capa' => 'capa_nula.gif', 'edicao' => 0);
        }

        
        

        

    }

    /**
     * @author hermes
     *  retorna o autocomplete do conteudo sub_classificacao
     */

    function conteudo_sub_classificacao() {

        $query = $this -> db -> get("vw_sub_classificacao");
        $recorset = $query -> result_array();
        return $recorset;

    }

    /**
     * @author hermes
     *  retorna um lista de materias para um rss
     */
    
    
    function getRss($edicao) {
        $query = $this -> db -> get_where('vw_conteudo_publicado', array( "visivel" => 1 , "edicao" => $edicao ));
        $recorset = $query -> result_array();
        return  $recorset;
    }
    
    /**
     * @author hermes
     *  retorna um lista das bancas que tem a revista
     */
    
    function lista_bancas(){
    	
    	$this->db->order_by('Cidade , Bairro ');
    	
    	$query = $this -> db -> get('tb_banca');
    	$recorset = $query -> result_array();
    	return  $recorset;
    	
    }
    
    /**
     * @author hermes
     *  retorna um lista das capas do acervo
     */
    
    function lista_acervo(){

    	
    	$this->db->where('edicao >=', 62 ) ;
        $this->db->order_by('edicao desc') ;
    	$query = $this -> db -> get('vw_edicao');
    	$recorset = $query -> result_array();
    	return  $recorset;
    	 
    }
}
