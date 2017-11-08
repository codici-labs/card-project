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
		$data = array();
		if(!empty($this->input->post())){

	    	$validate_productname = array(
			    array(
			        'field' => 'product-name',
			        'rules' => 'required', 
			        'errors' => array('required' => 'Debe ingresar un nombre de producto.')
			    ),
			);

			$validate_barcode = array(
			    array(
			        'field' => 'barcode',
			        'rules' => 'required|regex_match[/^\d{13}$/]', 
			        'errors' => array('required' => 'El código de barras debe estar formado por 13 dígitos.', 'regex_match'=> 'El código de barras debe estar formado por 13 dígitos.')
			    ),
			);

			$this->form_validation->set_rules($validate_productname);
			$this->form_validation->set_rules($validate_barcode);

	    	if ($this->form_validation->run())
	        {
	            $this->index();
	        } else {
	        	$data = $this->input->post();
	        }
		}

		$this->layout->view('add',$data);
	}


	public function getJson($query){
		$products = new stdClass();
		$products->items = $this->products->getJson($query);
		echo json_encode($products);
	}

	public function showProductDetails($product_id){
		$data['product'] = $this->products->getById($product_id);

		echo $this->load->view('products/template', $data, true);
	}
}
