<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

	public function __construct(){
           
        parent::__construct();
        $this->load->helper('url');
    	$this->load->library('Layout');    
    	$this->layout->setFolder('stock');        
    }
	
	public function index(){
		$this->layout->view('index');
	}

	public function add(){
		$this->layout->view('add');
	}
}
