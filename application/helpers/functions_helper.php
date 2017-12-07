<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function kill($data='Test'){
	echo "<pre>\n";
	print_r($data);
	echo "\n</pre>";
	die();
}

function vkill($data='Test'){
	echo "<pre>\n";
	var_dump($data);
	echo "\n</pre>";	
	die();
}

function qkill($that){
	print_r($that->db->last_query());
	die();
}

function jsonify($data, $ajaxStatus = null){
	if($ajaxStatus !== null) {
		$response = new stdClass();
		$response->status = $ajaxStatus;
		$response->message = $data;
	} else {
		$response = $data;
	}
	header('Content-Type: application/json');
	echo json_encode($response);
	die();
}

?>