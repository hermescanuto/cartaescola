<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

/**
 *
 *
 * ription Func›es para acesso ao webservice da Content Stuff
 * 
 * @package ContentStuff
 * @author Hermes Canuto
 * @version Version 2
 */
class Model_util extends MY_Model {
	
	// salva o log
	function log($id, $action, $input, $output, $source = 1) {
		$data = array (
				'tb_subscriber_id' => $id,
				'tb_log_description_id' => $action,
				'input' => $input,
				'output' => $output,
				'source' => $source 
		);
		
		$this->db->insert ( 'tb_log', $data );
	}
	
	// cria o usuario no banco
	function usercreateDB($email, $authToken, $source = 1) {
		$logArr = array (
				'emailAddress' => $email,
				'authToken' => $authToken,
				'source' => $source 
		);
		
		$query = $this->db->get_where ( 'tb_subscriber', array (
				'email' => $email 
		) );
		
		// Verifica se ja existe o usuario no banco
		if ($query->num_rows () > 0) {
			
			// se existe retorna o id
			$row = $query->row_array ();
			
			// salbar o log
			$this->log ( $row ['id'], 4, json_encode ( $logArr ), $row ['id'], $source );
			return $row ['id'];
		} else {
			// se nao existe cria e retorna o id
			
			$data = array (
					'email' => $email,
					'authToken' => $authToken,
					'source' => $source 
			);
			
			// salva no banco o usuario
			$this->db->insert ( 'tb_subscriber', $data );
			$id = $this->db->insert_id ();
			
			// salva log
			$this->log ( $this->db->insert_id (), 3, json_encode ( $logArr ), $this->db->insert_id (), $source );
			
			return $id;
		}
	}
	
	// salva o dispositivo no banco
	function savedevice($id, $device, $source) {
		$query = $this->db->get_where ( 'tb_uuid', array (
				'device' => $device 
		) );
		
		if ($query->num_rows () == 0) {
			
			$data = array (
					'tb_subscriber_id' => $id,
					'device' => $device,
					'source' => $source  
			);
			$this->db->insert ( 'tb_uuid', $data );
			$this->log ( $id, 5, json_encode ( $data ), $device, $source );
			return $this->db->insert_id ();
		}
	}
	
	// salva as edicoes no banco
	function saveEditions($id, $editions) {
		$radix = 'com.editoraconfianca.revistacartanaescola.edicao';
		// deleta a ediÃ§oes
		$this->db->delete ( 'tb_edition', array (
				'tb_subscriber_id' => $id 
		) );
		
		foreach ( $editions as $key => $value ) {
			$data [] = array (
					'tb_subscriber_id' => $id,
					'edition' => $radix . $value 
			);
		}
		
		// adciona os produtos/edicoes especiais ou fora do padrao, que vem do banco
		$query = $this->db->get ( 'tb_edition_special' );
		
		foreach ( $query->result_array () as $row ) {
			$data [] = array (
					'tb_subscriber_id' => $id,
					'edition' => $row ['edition'] 
			);
			;
		}
		
		// Recria as edicoes
		$this->db->insert_batch ( 'tb_edition', $data );
		
		return true;
	}
	
	// retorna as edicoes do banco
	function entitlements($authToken) {
		$query = $this->db->get_where ( 'tb_subscriber', array (
				'authToken' => $authToken 
		) );
		
		if ($query->num_rows () > 0) {
			
			$row = $query->row_array ();
			$id_subscriber = $row ['id'];
			
			$query = $this->db->get_where ( 'tb_edition', array (
					'tb_subscriber_id' => $id_subscriber 
			) );
			
			$data = $query->result_array ();
			
			return $data;
		} else {
			
			return false;
		}
	}
	
	// valida o authtoken
	public function renewauthtoken($authToken) {
		$query = $this->db->get_where ( 'tb_subscriber', array (
				'authToken' => $authToken 
		) );
		
		if ($query->num_rows () > 0) {
			
			$row = $query->row_array ();
			
			if ($row ['authToken'] && $row ['authToken'] == $authToken && $row ['active'] == 1) {
				
				return $row ['id'];
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	// retorna true ou false para o download de uma edicao/ productID
	public function download($authToken, $productID) {
		
		// busca os dados do authtoken
		$return = $this->authtoken ( $authToken );
		
		if ($return) {
			
			$id_subscriber = $return ['id'];
			
			$query = $this->db->get_where ( 'tb_edition', array (
					'tb_subscriber_id' => $id_subscriber,
					'edition' => $productID 
			) );
			
			if ($query->num_rows () > 0) {
				$row = $query->row_array ();
				
				return true;
			} else {
				return false;
			}
		} else {
			
			return false;
		}
	}
	
	// retorna o id do usuario
	public function authToken($authToken) {
		$query = $this->db->get_where ( 'tb_subscriber', array (
				'authToken' => $authToken 
		) );
		if ($query->num_rows () > 0) {
			$row = $query->row_array ();
			return $row;
		} else {
			return false;
		}
	}
}