<?php
/*
Class de conexão com o webservice da content stuff
*/
class contentstuff {

    private $userID = null;
    private $authToken = false ;
    private $productId = null;

    private $UUID = '';
    private $Device_txt = '';
    private $AppId = 'br.com.cartacapital';
    private $WSUserName = 'AppEditoraConfianca';
    private $WSUserPassW = 'GDfr1rsf313#';
    private $MetodoValidacao_id = 1;
    private $CodCliente = '';
    private $Email_txt = '';
    private $Senha_txt = '';
    private $CPFCNPJ_txt = '';
    private $CEP_txt = '';

    private $wsurl = 'https://webservices.assinaja.com/tablet/WS_ValidacaoAssTabletExterno.asmx?WSDL';

    private $db_host = 'localhost';
    private $db_name = 'adobe';
    private $db_user = 'adobeuser01';
    private $db_pass = 'XQLFaZeCrz4nebHJ';

    // Get dos atributo da classe
    // __get('$AppId');
    public function __get( $attribute ) {
        if ( isset( $this->{$attribute} ) ) {
            return $this->{$attribute};
        } else {
            return false;
        }
    }


    // Set dos atributos da classe
    // __set('$AppId', 'teste01')
    public function __set( $attribute, $value ) {
        if ( isset( $this->{$attribute} ) ) {
            return $this->{$attribute} = $value;
        }
    }


    /*
    Valida o usuario na content
    retorna 1 = validado 
    0 = nao validado
    */
    public function validUserContentstuff( ) {

        $client = new SoapClient( $this->wsurl );

        $dados  = Array(
         "UUID"               => $this->UUID,
         "Device_txt"         => $this->Device_txt,
         "AppId"              => $this->AppId,
         "WSUserName"         => $this->WSUserName,
         "WSUserPassW"        => $this->WSUserPassW,
         "MetodoValidacao_id" => $this->MetodoValidacao_id,
         "CodCliente"         => $this->CodCliente,
         "Email_txt"          => $this->Email_txt,
         "Senha_txt"          => $this->Senha_txt,
         "CPFCNPJ_txt"        => $this->CPFCNPJ_txt,
         "CEP_txt"            => $this->CEP_txt 
         );

        $result = $client->CSWF_TabletLoginExternoBoolean( $dados );



        if ( $result->CSWF_TabletLoginExternoBooleanResult ) {

           $r= array( 'id' =>$this->userID , 'authtoken'=> $this->authToken , 'emailAddress' => $this->Email_txt, 'password' => md5($this->Senha_txt)  );
           $this->savelog($this->userID,'Usuario autenticado Contentstuff',json_encode($_REQUEST), json_encode($r) );
             $this->userdbcheck(); //checa o usuario no banco e atualiza a lista de titulos

         }else{

            $r= array( 'id' =>$this->userID , 'authtoken'=> $this->authToken , 'emailAddress' => $this->Email_txt, 'password' => md5($this->Senha_txt)  );
            $ip = array( 'ip1 ' => $_SERVER['HTTP_X_FORWARDED_FOR'] , 'ip2' => $_SERVER['REMOTE_ADDR'] , 'emailAddress' => $this->Email_txt, 'password' => $this->Senha_txt );
            $this->savelog($this->userID,'Falha na autenticacao ',json_encode($_REQUEST), json_encode($ip) );

        }

        return $result->CSWF_TabletLoginExternoBooleanResult;
    }

    // Valida o usuario 
    // se houver authtoken , valida no banco
    // caso não executa a validacao na content

    public function validUser(){

        if ( $this->authToken ) {

           $resultado = $this->checkuser();

           if (  is_null( $resultado['id'] ) ){
                  return false ;
           }else{
          // print_r ($resultado  );
           $r= array( 'id' =>$this->userID , 'authtoken'=> $this->authToken , 'emailAddress' => $this->Email_txt, 'password' => md5($this->Senha_txt)  );
           $this->savelog($this->userID,'Usuario autenticado DB',json_encode($_REQUEST), json_encode($resultado) );           
           return true;
           }

       }else{

            return $this->validUserContentstuff();

       }

   }


    // retorna a lista de titulos disponiveis para o usuario do webservice
    public function entitlement( ) {
        $edicao = array( );
        $client = new SoapClient( $this->wsurl );

        $dados  = Array(
           "UUID"               => $this->UUID,
           "Device_txt"         => $this->Device_txt,
           "AppId"              => $this->AppId,
           "WSUserName"         => $this->WSUserName,
           "WSUserPassW"        => $this->WSUserPassW,
           "MetodoValidacao_id" => $this->MetodoValidacao_id,
           "CodCliente"         => $this->CodCliente,
           "Email_txt"          => $this->Email_txt,
           "Senha_txt"          => $this->Senha_txt,
           "CPFCNPJ_txt"        => $this->CPFCNPJ_txt,
           "CEP_txt"            => $this->CEP_txt 
           );

        $result = $client->CSWF_TabletEdicoesExterno( $dados );
        $lista  = $this->objectToArray( $result->CSWF_TabletEdicoesExternoResult );

        if ( array_key_exists( 'anyType', $lista ) ) {
            foreach ( $lista['anyType'] as $value ) {
                $edicao[] = array(
                   'edicao' => $value 
                   );
            }
           
        } else {
            $edicao = false;

        }

        $this->savelog($this->userID,'Importando titulos Contentstuff',json_encode($_REQUEST),json_encode($edicao) );
        return $edicao;
    }

     // retorna a lista de titulos disponiveis para o usuario do banco de dados
    public function entitlementDB( ) {

       // $this->userdbcheck(); // checa o usuario no banco

        $check = $this->checkuser();
        $id = $check['id'];

        if ( $id ){

            if ( mysql_connect( $this->db_host, $this->db_user, $this->db_pass ) && mysql_select_db( $this->db_name ) ) {
                $edicao = array( );
                $sql    = "SELECT * FROM  applications WHERE id_subscriptions = $id ";
                $result = mysql_query( $sql );
                $num_rows = mysql_num_rows($result);

                if ( $num_rows > 0 ) {
                    while ( $row = mysql_fetch_assoc( $result ) ) {
                        $edicao[] = array(
                         'edicao' => $row['issuenumber'] 
                         );
                    }

                    $this->savelog($this->userID,'Lendo titulos DB',json_encode($_REQUEST),json_encode($edicao) );
                    return $edicao;
                } else {
                    $this->savelog($this->userID,'Lendo titulos DB',json_encode($_REQUEST),false );
                    return false;
                }
            } else {
                echo "error access database: " . mysql_error();
                return false;
            }

        }else{
            return false ;
        }

    }



    // Retorna a lista de titulos disponivel para o usuario em xml do webservice
    public function entitlementXML( $st = 'com.editoraconfianca.revistacartacapital.edicao' ) {

        $result = $this->entitlement();

        $xml    = simplexml_load_string( "<result/>" );

        if ( $result == false ) {
            $xml->addAttribute( "httpResponseCode", "401" );
             $this->savelog($this->userID,'Gerando XML Formato ADOBE :401',json_encode($_REQUEST),json_encode($edicao) );
        } else {
            $entitlements = $xml->addChild( "entitlements" );

            foreach ( $result as $key => $value ) {
                $productNode = $entitlements->addChild( "productId", $st . $result[$key]['edicao'] );
                $productNode->addAttribute( "subscriberType", "direct" );
                $productNode->addAttribute( "subscriberId", $this->Email_txt );
            }

            $success = true;
            $xml->addAttribute( "httpResponseCode", "200" );
            $this->savelog($this->userID,'Gerando XML Formato ADOBE :200',json_encode($_REQUEST),json_encode($result) );
        }

        header( "Content-Type: application/xml" );
        echo $xml->asXML();
    }

    // Retorna a lista de titulos disponivel para o usuario em xml do banco de dados
    public function entitlementXMLDB( $st = 'air.com.editoraconfianca.revistacartacapital.edicao' ) {

        $result = $this->entitlementDB();

        $xml    = simplexml_load_string( "<result/>" );

        if ( $result == false ) {
            $xml->addAttribute( "httpResponseCode", "401" );
            $this->savelog($this->userID,'Gerando XML Formato ADOBE  DB:401',json_encode($_REQUEST),json_encode($result) );

        } else {
            $entitlements = $xml->addChild( "entitlements" );

            foreach ( $result as $key => $value ) {
             $productNode = $entitlements->addChild( "productId", $st . $result[$key]['edicao'] );
            // $productNode->addAttribute( "subscriberType", "direct" );
            // $productNode->addAttribute( "subscriberId", $this->userID );
            }

            $success = true;
            $xml->addAttribute( "httpResponseCode", "200" );
            $this->savelog($this->userID,'Gerando XML Formato ADOBE  DB:200',json_encode($_REQUEST),json_encode($result) );
        }

        header( "Content-Type: application/xml" );
        echo $xml->asXML();
    }


    // Valida se a edição pode ser feita o download
    //  retorna true ou false
    public function validEntitlement( $id ) {

        $client = new SoapClient( $this->wsurl );

        $dados  = Array(
           "UUID"               => $this->UUID,
           "Device_txt"         => $this->Device_txt,
           "AppId"              => $this->AppId,
           "WSUserName"         => $this->WSUserName,
           "WSUserPassW"        => $this->WSUserPassW,
           "MetodoValidacao_id" => $this->MetodoValidacao_id,
           "CodCliente"         => $this->CodCliente,
           "Email_txt"          => $this->Email_txt,
           "Senha_txt"          => $this->Senha_txt,
           "CPFCNPJ_txt"        => $this->CPFCNPJ_txt,
           "CEP_txt"            => $this->CEP_txt,
           "ProductID"          => $id 
           );

        $result = $client->CSWF_TabletDownloadExterno( $dados );
        return $result->CSWF_TabletLoginExternoBooleanResult;

    }

    //Valida se a edicao pode ser feita o download pelo banco
    // retorna um XML ADOBE
    public function validEntitlementDB( $id ){

        $resultado = $this->checkuser();
        $user=$resultado['id'];

        $productid = $this->int($id);

        $xml = simplexml_load_string("<result/>");
        $xml->addAttribute("httpResponseCode", '200');

        if (  is_null($user)) {

             $success=false;

             $this->savelog($user ,'Usuario nao existe ',json_encode($_REQUEST), $user );

        }else{



            if ( mysql_connect( $this->db_host, $this->db_user, $this->db_pass ) && mysql_select_db( $this->db_name ) ) {


                $sql = "SELECT * FROM  applications WHERE id_subscriptions=$user and issuenumber=$productid";

                $result = mysql_query( $sql );
                $num_rows = mysql_num_rows($result);

                if (  $num_rows > 0 ){
                     $success=true;
                     $result=array('edicao' => $productid , 'permissao' => $success );
                     $this->savelog($user ,'Download da edicao  ',json_encode($_REQUEST),json_encode($result) );
                    

                }else{

                     $success=false;
                     $result=array('edicao' => $productid , 'permissao' => $success );
                     $this->savelog($user ,'Download da edicao ',json_encode($_REQUEST),json_encode($result) );
                }


            }else {

                // echo "error access database: " . mysql_error();
                $success=false;
                $this->savelog($user ,'Download da edicao ',json_encode($_REQUEST), mysql_error() . '   '. $sql );

            }


        }


        $xml->addChild("entitled", $success ? "true" : "false");
        header("Content-Type: application/xml");
        echo $xml->asXML();

    }


    // Tranforma um obj em array 
    private function objectToArray( $object ) {

        if ( count( $object ) > 1 ) {
            $arr = array( );

            for ( $i = 0; $i < count( $object ); $i++ ) {
                $arr[] = get_object_vars( $object[$i] );
            }

            return $arr;
        } else {
            return get_object_vars( $object );
        }

    }


    // checa o usuario no banco 
    // caso nao salva no banco 
    //  caso sim apenas atualiza a lista de edicoes
    private function userdbcheck( ) {

        $result = $this->checkuser(); // checa o usuario no webservice

        if ( $result ) {
            $id = $result['id'];
            $this->savelog($this->userID,'Usando usuario do banco',json_encode($_REQUEST),json_encode($result) );
            $this->saveissues( $id ); // salvando numeros de edicoes
            //echo 'Já existe no banco'.$id;
            
        } else {
            $id = $this->saveuser(); // salva o usuario no banco
            $this->savelog($this->userID,'Criando usuario no banco',json_encode($_REQUEST),json_encode($result + $id) );
            $this->saveissues( $id ); // salvando numeros de edicoes
            //echo 'salvei no banco' . $id ;

        }

    }


    // salva edicoes no banco 
    private function saveissues( $id ) {

        if ( mysql_connect( $this->db_host, $this->db_user, $this->db_pass ) && mysql_select_db( $this->db_name ) ) {
            $sql    = "delete from  applications where id_subscriptions = $id;";
            $delete = mysql_query( $sql );
            $result = $this->entitlement(); // lista os numeros da edicoes 
            $sql    = 'INSERT INTO applications (id_subscriptions,issuenumber) values';

            foreach ( $result as $key => $value ) {
                $productid = $result[$key]['edicao'];
                $sql       = $sql . " ($id, $productid),";
            }

            $sql    = substr( $sql, 0, ( strlen( $sql ) - 1 ) );
            $insert = mysql_query( $sql );
            $this->savelog($this->userID,'Salvando titulos DB',json_encode($_REQUEST),json_encode($result) );
        } else {
            echo "error access database: " . mysql_error();
        }

    }


    // Checa se o usuario existe no banco
    private function checkuser( ) {

        if ( mysql_connect( $this->db_host, $this->db_user, $this->db_pass ) && mysql_select_db( $this->db_name ) ) {
            $pass   = md5( $this->Senha_txt );

            if( $this->authToken ){
                $sql    = "select * from subscriptions where authToken= '$this->authToken' ";
                $st ='Procurando usuario por authToken';
            }else{
                $sql    = "select * from subscriptions where emailAddress='$this->Email_txt' and password = '$pass' ";
                $st ='Procurando usuario por usuario e senha';
            }


            $result = mysql_query( $sql );
            $row    = mysql_fetch_assoc( $result );

            if ( $row ) {

                $this->userID = $row['id'];
                $result = array( 'id' =>$row['id'] , 'authtoken'=> $row['authToken'] );
                $this->savelog($this->userID, $st ,json_encode($_REQUEST),json_encode($result) );
                return $result ;


            } else {

                $r= array( 'id' =>$this->userID , 'authtoken'=> $this->authToken , 'emailAddress' => $this->Email_txt, 'password' => md5($this->Senha_txt)  );
                $this->savelog($this->userID, $st ,json_encode($_REQUEST),json_encode($r) );
                return false;

            }

        } else {
            echo "error access database: " . mysql_error();
        }
    }


    // salva o usuario no banco 
    private function saveuser( ) {

        if ( mysql_connect( $this->db_host, $this->db_user, $this->db_pass ) && mysql_select_db( $this->db_name ) ) {
            date_default_timezone_set( "UTC" );
            $substart = date( "Y-m-d" );
            $subrenew = date( "Y-m-d", time() + 31 * 24 * 60 * 60 );
            $pass     = md5( $this->Senha_txt );
            $sql      = "INSERT INTO subscriptions (emailAddress, password, subscriptionStart, subscriptionRenew, active) VALUES ('$this->Email_txt','$pass', '$substart', '$substart', '1')";

            if ( mysql_query( $sql ) ) {
                $success = true;
                $this->userID = mysql_insert_id();
                return mysql_insert_id();
            } else {
                echo "error inserting new user: " . $this->Email_tx . " mysql: " . mysql_error();
                return false;
            }

        } else {
            echo "error access database: " . mysql_error();
            return false;
        }

    }

    // salva o log
    public function savelog($id ='',$acao='',$entrada='',$saida=''){

        if ( mysql_connect( $this->db_host, $this->db_user, $this->db_pass ) && mysql_select_db( $this->db_name ) ){

            $sql  = "INSERT INTO log ( id_subscriptions,acao,entrada,saida ) values ('$id','$acao','$entrada','$saida')" ;

            if ( mysql_query($sql) ) {
                $success = true;
            }else{
               echo "error access database: " . mysql_error();
               return false;
           }
       } else{
           echo "error access database: " . mysql_error();
           return false;    
       } 

   }

   // exibe os numeros de uma string
   function int($s){return(int)preg_replace('/[^\-\d]*(\-?\d*).*/','$1',$s);}

}

