<?php

//ini_set('display_errors', 1);
//error_reporting(E_ALL);

require_once "../contentstuff.php";

require_once "../settings.php";
require_once "../utils.php";



// Gather POST variables.  For ease of testing, we are agnostic of http method used.

if ($_SERVER['REQUEST_METHOD']=="GET") {
	$appId        = $_GET['appId'];
	$appVersion   = $_GET['appVersion'];
	$uuid         = $_GET['uuid'];
	$emailAddress = $_GET['emailAddress'];
	$password     = MD5($_GET['password']);
	$password2	  = $_GET['password'];
}
else {
	$appId        = $_REQUEST['appId'];
	$appVersion   = $_REQUEST['appVersion'];
	$uuid         = $_REQUEST['uuid'];
	$credentials  = file_get_contents("php://input"); // $_POST['credentials'];
	$credentialsXML = simplexml_load_string($credentials);
	$emailAddress = $credentialsXML->emailAddress;
	$password     = MD5($credentialsXML->password);
	$password2	  = $credentialsXML->password ;
	$logger->logDebug("Credentails XML = ".$credentials);
	$logger->logDebug("V2 email/password = ".$emailAddress." / ".$password );
}



$ws = new contentstuff();

$ws->__set('AppId','br.com.cartacapital');
$ws->__set('Email_txt', $emailAddress );
$ws->__set('Senha_txt', $password2);

$result = $ws->validUser(); // valida o usuario com a contentstuff

if ($result){


	$success = false;

	if (validUsername($emailAddress)) {
		$authToken=createAuthToken($emailAddress);

		if (mysql_connect($db_host, $db_user, $db_pass) && mysql_select_db($db_name)) {
			$result = mysql_query("SELECT * FROM ".$db_tablename." WHERE emailAddress='" . $emailAddress . "'");
			if ($result && $row=mysql_fetch_assoc($result)) {
				$id = $row['id'];
				if ($password==$row['password']) {
				// check to see if this uuid is registered.
					$uuid_list = $row['uuids'];
					$logger->logDebug("uuidlist = ". $uuid_list);
					if (!$uuid_list || $uuid_list=="") {
						$uuids=array();
					}
					else {
						$uuids = explode(",",$uuid_list);
					}
					$logger->logDebug("uuids:count=". count($uuids));

					if (in_array($uuid, $uuids)) {
						$logger->logInfo("SignInWithCredentials=>User \"".$emailAddress."\" authenticated on existing device \"".$uuid."\"");
						$success=true;
					}
					else
						if (count($uuids)<$max_uuids) {
					// Not found, but room to add
							if (count($uuids)==0) {
								$logger->logDebug("uuid array is zero");
								$uuids = array($uuid);
							}
							else {
								array_push($uuids, $uuid);
							}
							$q = "UPDATE ".$db_tablename." SET uuids='".implode(",",$uuids)."' WHERE id='".$id."'";
							$logger->logInfo("SignInWithCredentials=>User \"".$emailAddress."\" authenticated on new device \"".$uuid."\"");
							mysql_query($q);
					// Need to update the DB

							$success = true;
						}
						else {
					// This is a failure because either the UUID isn't found OR the max number of UUIDs have been hit
							$success=false;
							$logger->logInfo("SignInWithCredentials=>User \"".$emailAddress."\" is authenticated BUT too many devices have been referenced.");
						}

						if ($success && $row['authToken']!=$authToken) {
					// Store the new authToken
							$q = "UPDATE ".$db_tablename." SET authToken='".$authToken."' WHERE id='".$id."'";
							$logger->logDebug("inserting new authToken: ".$q);
							mysql_query($q);
						}
					}
					else {
				// passwords do not match.  Clear authToken
						$logger->logInfo("SignInWithCredentials=>incorrect password for user \"".$emailAddress."\".  Clearing authToken");
						mysql_query("UPDATE ".$db_tablename." SET authToken=null WHERE id='".$id."'");
					}
				}
				else {
					$logger->logInfo("SignInWithCredentials=>No record for user '".$emailAddress."' exists");
				}
			}
			else {
				$logger->logError("SignInWithCredentials=>could not access database" . mysql_error() );
			}
		}
		else {
			$logger->logDebug("SignInWithCredentials=>username/email failed format requirements.");
		}

		header("Content-Type: application/xml");
		$xml = simplexml_load_string("<result/>");
		if ($success) {
			$xml->addAttribute("httpResponseCode", '200');
			$xml->addChild("authToken", $authToken);
		}
		else {
			$xml->addAttribute("httpResponseCode", '401');
		}
		echo $xml->asXML();






	}else{

		header("Content-Type: application/xml");
		$xml = simplexml_load_string("<result/>");
		$xml->addAttribute("httpResponseCode", '401');
		echo $xml->asXML();

	}


	?>
