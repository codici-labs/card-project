<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct(){
           
        parent::__construct();
        $this->load->helper('url');
    	$this->load->library('Layout');            
    	$this->load->model('Products_model', 'products');            
    	$this->layout->setFolder('products');       
     
    }
	
	public function index(){
		$this->layout->view('index');
	}

	public function add(){
		$this->layout->view('add');
	}

	public function getJson($query){
		$products = new stdClass();
		$products->items = $this->products->getJson($query);
		echo json_encode($products);
	}

	public function showProductDetails($product_id){
		$product = $this->products->getById($product_id);
		header('Content-Type: application/json');
		echo json_encode($product);
	}
}
