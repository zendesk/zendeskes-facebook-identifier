<?php
//Let's require the configuration
require_once('fb-config.php');

//Let's make things secure

if( isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']) && $_SERVER['PHP_AUTH_USER'] == PHP_AUTH_USER && $_SERVER['PHP_AUTH_PW'] == PHP_AUTH_PW){
	// We're in!

	$ticket_id = $_POST['ticket_id'];

	// 1 - We will check which page does this come from. For that we will retrieve the ticket first:

	$ticket = curlWrap("/tickets/".$ticket_id.".json",NULL,"GET");
	
	$facebook_id = $ticket->ticket->via->source->to->facebook_id;

	$facebook_tag = $facebook_pages[$facebook_id];

	// 2 - Update ticket with tag
	$object = array("ticket" => array("custom_fields" => array("id" => CUSTOM_FIELD_ID,"value"=>$facebook_tag)));
	
	$request = curlWrap("/tickets/".$ticket_id.".json",json_encode($object),"PUT");

}else{
	// Your credentials are not valid.
	header("HTTP/1.1 401 Unauthorized");
    exit;
}  

function curlWrap($url, $json, $action){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
	curl_setopt($ch, CURLOPT_URL, "https://".ZD_SUBDOMAIN.".zendesk.com/api/v2".$url);
	curl_setopt($ch, CURLOPT_USERPWD, ZD_EMAIL."/token:".ZD_TOKEN);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	switch($action){
		case "POST":
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
			break;
		case "GET":
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
			break;
		case "PUT":
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
			break;
		case "DELETE":
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
			break;
		default:
			break;
	}
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	$output = curl_exec($ch);
	curl_close($ch);
	$decoded = json_decode($output);
	return $decoded;
}

?>