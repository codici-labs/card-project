<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct(){
           
        parent::__construct();
        $this->load->helper('url');
    	$this->load->library('Layout');  
    	header('Access-Control-Allow-Origin: *');            
    }
	
	public function index(){
		$this->layout->view('index');
	}

	public function getProducts(){
		$productos = $this->db->get('productos')->result();
		echo json_encode($productos);
		//print_r($productos);
	}
}
