<?php


/*
 *
* @autor	Hermes Canuto de Souza
* @Descrição model generica
*/


class Model_util extends MY_Model {

	function __construct()
	{
		//parent::Model();
		parent::__construct();
	}

	/*
	 *
	* @autor	Hermes Canuto de Souza
	* @Descrição retorna os itens do menu
	*/

	function get_menu($menu)
	{
			
		$this->db->order_by("id", "asc");
		$query = $this->db->get_where('tb_menu', array('tipo' => $menu));
		return $query->result_array();

	}



	/*
	 *
	* @autor	Hermes Canuto de Souza
	* @Descrição valida o usuario no banco de dados
	*/

	function valid_user_loggon($user,$pass)
	{
		$fields = array ('usuario' => $user, 'senha' => $pass) ;
		$query = $this->db->get_where('tb_usuario',$fields);
		if ($query->num_rows() > 0)
		{
			return $query->row();
				
		}else{
			return '0';
		}
		 
	}

	/*
	 *
	* @autor	Hermes Canuto de Souza
	* @Descrição busca numa determinada tabela,
	* e ja traz o valores para o template
	*/
	 
	 
	function ByIDtoTemplate($tabela, $id)
	{
		$data = array();
		$query = $this->db->get_where($tabela, array('id' => $id));

		//echo $this->db->last_query();
			
		$x =  $query->result_array();
		foreach ( $x[0] as $i => $v )
		{
			$data[$i] =  $v;
		}
		return $data;
	}


	/*
	 *
	* @autor	Hermes Canuto de Souza
	* @Descrição busca numa determinada tabela,
	* executa uma clausula sql.
	*/

	function Executesql($table,$fields,$where='',$page_size=0,$start=0,$orderby='')
	{
		// para vericar quanto registro tem no banco
		$this->db->select($fields);
		$this->db->where($where);
		$query=$this->db->get($table);
		$total = $query->num_rows();
			
		//echo '<br/>'.$total;

		// para vericar quanto registro tem no banco com limite de paginacao
		$this->db->select($fields);
		if ($where != '' )
		{
			$this->db->where($where);
		}

		if ( $orderby != '' ){
			$this->db->order_by($orderby);
		}
			
		$this->db->limit($page_size, $start);

		$query=$this->db->get($table,$page_size,$start);

		//echo '<br/>'.$this->db->last_query();
			
		return array( 'recordset' => $query->result_array() , 'record_count' => $total );
	}

	/*
	 *
	* @autor	Hermes Canuto de Souza
	* @Descrição busca numa determinada tabela,
	* executa uma clausula sql.
	*/


	// Retorna Select List para lookup
	function tipo($tabela,$fields)
	{
		$this->db->select($fields);
		$query = $this->db->get($tabela);

		$options = $query->result_array();

		return $options;
	}

}

