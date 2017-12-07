<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class DbException extends Exception {
	private $ci;

	public function __construct($message = null, $code = 0){
        parent::__construct($message, $code);
        $this->ci =& get_instance();
    }


    public function handleError(){

    	$uri = $this->ci->uri;
    	$method = $this->ci->router->method;
    	$db_err = $this->ci->db->error();

		$error_data = array(
    		'code' => $db_err['code'],
    		'last_query' => $this->ci->db->last_query(),
    		'request' => $uri->uri_string(),
    		'db_message' => $db_err['message'],
    		'file' => $this->getFile(),
    		'line' => $this->getLine(),
    		'exception_message' => $this->getMessage()
    	);

    	log_message('error', 'Expected DB error: '.json_encode($error_data));

    	$message = 'Error de base de datos ('.$db_err['code'].': '.$uri->uri_string().').<br />Contacte al administrador del sistema.';
    	
        $this->ci->session->set_flashdata('server_error', $message);
    	
    	if($this->ci->input->is_ajax_request()){
    		http_response_code(400);
    		jsonify($message, 0);
    	} else {
        	redirect( base_url($uri->uri_string()) );    		
    	}

    }

}