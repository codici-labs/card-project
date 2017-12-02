<?php  

function kill($data){
	print_r($data);
	die();
}

function jsonify($data){
	header('Content-Type: application/json');
	echo json_encode($data);
}

?>