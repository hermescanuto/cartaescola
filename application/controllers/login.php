<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Index Page for this controller.
*/

class login extends CI_Controller {

	protected $data = array();

	function __construct() {
		parent::__construct();

		$this -> load -> library('util');
		$this -> load -> model('Model_util');
		$this -> data['base_url'] = base_url();



	}

	public function index() {

		$this->data['msg'] = NULL;
		$this -> parser -> parse('front/login', $this->data);		

	}



	function on(){



		$user = $this->input->post('nome'); //'AppEditoraConfianca'
		$pass = $this->input->post('senha'); //'GDfr1rsf313#'

		$client = new SoapClient('https://webservices.assinaja.com/tablet/WS_ValidacaoAssTabletExterno.asmx?WSDL');

		$edicao = array();

		$UUID='2E0BCACD-4D55-4375-83DB-4778B5205FFC';
		$Device_txt='';
		$AppId='br.com.cartanaescola';
		$WSUserName='AppEditoraConfianca';
		$WSUserPassW='GDfr1rsf313#';
		$MetodoValidacao_id='1';
		$CodCliente='';
		$Email_txt=$user ;// 'mmoreira@contentstuff.com';
		$Senha_txt=$pass ;//CScap2013';
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
		
		$this->savelog( $Email_txt=$user,'Usuario autenticado Contentstuff',json_encode($dados) , json_encode($result->CSWF_TabletLoginExternoBooleanResult)  );
		
		if ( $result->CSWF_TabletLoginExternoBooleanResult ){
			
			//echo "Logado<br />\n";
			$result = $client->CSWF_TabletEdicoesExterno ( $dados );
			
			$result_arr = $this->objectToArray($result) ;
			
			$lista = $this->objectToArray($result->CSWF_TabletEdicoesExternoResult);

			

			//print_r( $lista['anyType'] ) ;

			if ( is_numeric ( $lista['anyType'] ) )
			{
				
				for ( $i=1; $i < $lista['anyType']+1 ; $i++) { 
					$edicao[] = array( 'edicao' => $i ) ;
				}

			}

			else

			{

				$arx = $lista['anyType'];

				rsort ($arx);

				$primeiro = $arx[0]; //$lista['anyType'][0];

				for ( $i=1; $i < $primeiro+1 ; $i++) { 
					$edicao[] = array( 'edicao' => $i ) ;
				}

			

		}
		


			
			
			
			//foreach ($lista['anyType'] as $value) {
				 //echo "Edicao: $value<br />\n";
			//	$edicao[] = array('edicao' => $value );
			//}

			$this->savelog( $Email_txt=$user ,'Importando titulos Contentstuff',json_encode($dados),json_encode($edicao) );

			$this->data['lista_edicao'] = $edicao;
			$this->data['user'] = $Email_txt ;
			$this->data['senha']=  urlencode(  $this->encrypt($Senha_txt,'10101972') );

			$this->data['msg'] = '' ;
			$this -> parser -> parse('front/edicao_download', $this->data);	

			
		}else{
			
			$this->data['msg'] = 'Usuário ou senha invalido' ;
			$this -> parser -> parse('front/login', $this->data);	
		}


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


	function showdpf() {
		$id= $this->uri->segment("3");
		$usuario = $this->uri->segment("4");
		$senha = $this->decrypt( urldecode( $this->uri->segment("5") ) , '10101972') ;

		$dados = array( 'Email_txt' => $usuario) ;
		$this->savelog( $usuario,'Download',json_encode($dados), $id  );
		
		$this->load->helper('download');

		$file = base_url()."acervos/pdf/$id.pdf";

		$file= realpath("acervos/pdf/$id.pdf");

		$data = file_get_contents($file); 
		$name = "Cartanaescola_$id.pdf";
		force_download($name, $data);

	}

	function showpdfhtml() {

		$id= $this->uri->segment("3");
		$usuario = $this->uri->segment("4");
		$senha = $this->decrypt( urldecode( $this->uri->segment("5") ) , '10101972') ;

		$dados = array( 'Email_txt' => $usuario) ;
		$this->savelog( $usuario,'Lendo',json_encode($dados), $id  );

		//header( "Location: /acervos/html5/$id"  );

		$data['id'] = $id;
		$this -> parser -> parse('front/visualizarpdf', $data);	




	}

	private function savelog($id ='',$acao='',$entrada='',$saida=''){

		$campos = array( 'id_subscriptions' => $id , 'acao' => $acao , 'entrada' => $entrada , 'saida' => $saida);

		$this->Model_util->setTableData('log');
		$this->Model_util->setData($campos);
		$this->Model_util->save();

	}


	function encrypt($str, $key)
	{
		$block = mcrypt_get_block_size('des', 'ecb');
		$pad = $block - (strlen($str) % $block);
		$str .= str_repeat(chr($pad), $pad);

		return mcrypt_encrypt(MCRYPT_DES, $key, $str, MCRYPT_MODE_ECB);
	}

	function decrypt($str, $key)
	{   
		$str = mcrypt_decrypt(MCRYPT_DES, $key, $str, MCRYPT_MODE_ECB);

		$block = mcrypt_get_block_size('des', 'ecb');
		$pad = ord($str[($len = strlen($str)) - 1]);
		return substr($str, 0, strlen($str) - $pad);
	}


}


