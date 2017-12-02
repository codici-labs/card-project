<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SalePoints extends CI_Controller {

	public function __construct(){

        parent::__construct();
    	$this->load->library('Layout');
    	$this->load->model('Sale_points_model', 'salepoints');     
    	$this->layout->setFolder('salepoints');       

    }
	
	public function index(){
		$this->layout->view('index');
	}

	public function add(){
		$data = array();
		$this->load->model('Locations_model','locations');
		$data['locations'] = $this->locations->get();

		$this->layout->view('add', $data);
	}

	public function get(){
		$data = array();
		// header('Content-Type: application/json');
		$this->layout->view('add', $data);
	}

}
