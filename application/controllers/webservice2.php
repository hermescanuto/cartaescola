<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class webservice extends CI_Controller {

	protected $data = array();


	function __construct() {
		parent::__construct();
		$this -> load -> library('util');
		$this -> load -> model('Model_util');
		$this -> data['base_url'] = base_url();
		$this -> data['local'] = $this -> uri -> segment("2");
	}


	function index(){

		$client = new SoapClient('https://webservices.assinaja.com/tablet/WS_ValidacaoAssTabletExterno.asmx?WSDL');
			
		$UUID='2E0BCACD-4D55-4375-83DB-4778B5205FFC';
		$Device_txt='';
		$AppId='br.com.cartacapital';
		$WSUserName='AppEditoraConfianca';
		$WSUserPassW='GDfr1rsf313#';
		$MetodoValidacao_id='1';
		$CodCliente='';
		$Email_txt='mmoreira@contentstuff.com';
		$Senha_txt='CScap2013';
		$CPFCNPJ_txt='';
		$CEP_txt='';
		
		$dados =Array(
				"UUID" 				=> $UUID,
				"Device_txt" 		=> $Device_txt,
				"AppId"				=> $AppId,
				"WSUserName"		=> $WSUserName,
				"WSUserPassW"		=> $WSUserPassW,
				"MetodoValidacao_id"=> $MetodoValidacao_id,
				"CodCliente"		=> $CodCliente,
				"Email_txt"			=> $Email_txt,
				"Senha_txt"			=> $Senha_txt,
				"CPFCNPJ_txt" 		=> $CPFCNPJ_txt,
				"CEP_txt"			=> $CEP_txt
		);
		
			
		$result = $client->CSWF_TabletLoginExternoBoolean( $dados );
		
		
		if ( $result->CSWF_TabletLoginExternoBooleanResult ){
			
			echo "Logado<br />\n";
			$result = $client->CSWF_TabletEdicoesExterno ( $dados );
			
			$result_arr = $this->objectToArray($result) ;
			
			$lista = $this->objectToArray($result->CSWF_TabletEdicoesExternoResult);
			
			
			foreach ($lista['anyType'] as $value) {
				echo "Edicao: $value<br />\n";
			}
			

			
		}else{
			
			echo 'Erro:';
		}

		/*if ( $result->CSWF_TabletLoginExternoBooleanResult == false ){
			echo 'Falso';
		}else{
		echo 'Verdadeiro';
		}*/
			
		


	}

	function objectToArray ($object) {
		if ( count($object) > 1 ) {
			$arr = array();
			for ( $i = 0; $i < count($object); $i++ ) {
				$arr[] = get_object_vars($object[$i]);
			}

			return $arr;

		} else {
			return get_object_vars($object);
		}
	}

}


