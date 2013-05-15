<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class MY_Model extends CI_Model 
{		
		
	protected $table	= ''; 
	protected $fields	= array(); 
	protected $id		= NULL;
	protected $label	= NULL;  
	protected $data		= array();
	protected $insertID	= NULL;
	protected $errors = array();
	
	
	public function __construct()
	{
		parent::__construct();
	}
	
	
    // limpa campos, dados , id
	public function clear()
	{
		$this->id = NULL;
		$this->label = NULL;
		$this->data = array();
		$this->fields = array();
	}


	//seta a tabela	 
	public function setTableData($table = 'default')
	{
		if ($this->db->table_exists($table))
		{
			$this->table = $table;
			$this->fields = $this->db->list_fields($this->table);
		}
		else
		{
			$this->errors[] = 'Nao existe a tabela';
			return FALSE;	
		}
	} 
	
	//seta a tabela	o id 
	public function setID($id,$label = 'id')
	{
		$this->id = $id;
		$this->label = $label;
	} 
	
	// retorna o id
	public function getID($label = 'id')
	{
		return $this->id;
	}
	
	
	// retorna o inserido
	public function getInsertID()
	{
		return $this->insertID;
	}
	 
	//seta os valores do campos
	// array = ( nome => 'hermes canuto' ) 
	// setdata(array)
	public function setData($data)
	{
		if ( is_array($data) AND count($data) > 0)
			{
			foreach ($data as $key => $value)
			{
				if (array_search($key, $this->fields) === FALSE)
			{
			unset($data[$key]);
			}
			}
			$this->data = $data;
		}
	}
	
	
	// salva os campos
	// se o campo setID ou $this->id tiver valor ele faz update
	public function save()	 
	{
		if ($this->data == NULL)
		{
			$this->errors[] = 'Nao existe campos com valores';
			return FALSE;
		}

		if ($this->id == NULL)
		{
			$this->db->insert($this->table, $this->data);
			$this->insertID = $this->db->insert_id();			
			return $this->insertID;
		}	
		else
		{
			$this->db->where($this->label, $this->id)->update($this->table, $this->data);
			return $this->db->affected_rows();
		}
	}
	
	// deleta um registro
	// depende do campo setID ou $this->id 
	public function delete()
	{
		if ($this->id == NULL)
		{
			$this->errors[] = 'Nao existe campo ID';
			return FALSE;
		}
		$this->db->where('id', $this->id)->delete($this->table);
		return TRUE;
	}
	
	// Exibe os erros
	public function getErrors($errPrefix = '<p>')
	{
		if( count($this->errors) === 0)
		{
			return '';
		}		
		$errorString = '';
		$errorSufix = str_replace( '<', '</' , $errPrefix);
		foreach ($this->errors as $error)
		{
			$errorString .= $errPrefix . $error . $errorSufix;		 
		}
		return $errorString;
	}
	
	
}	
