<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

	public function __construct(){
           
        parent::__construct();
        $this->load->helper('url');
    	$this->load->library('Layout');
    	$this->load->model('Students_model', 'students');            
    	$this->layout->setFolder('students');       
     
    }
	
	public function index(){
		$this->layout->view('index');
	}

	/*public function add(){
		$data = array();
		if($this->input->post()){

	    	$validate_studentname = array(
			    array(
			        'field' => 'students-name',
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
	        	$insert = array(
				    'descripcion' => 'product-name',
				    'codigo' => 'barcode'
				);
				$this->db->insert('productos', $insert);
	            $this->index();
	        } else {
	        	$data = $this->input->post();
	        }
		}

		$this->layout->view('add',$data);
	}
*/
	public function get($query = false){

		
		$students = $this->students->getJson($query);
		echo json_encode($students);
	}

	/**
	 * getJson
	 * Recibe un string para matchear la busqueda en la tabla productos. (opcional)
	 * Se usa en el buscador de productos
	 * @param  [string] 
	 * @return [json]  
	 */
	public function getJson($query = false){

		$students = new stdClass();
		$students->items = $this->students->getJson($query);
		echo json_encode($students);
	}

	/**
	 * Devuelve el detalle de un producto y genera la vista correspondiente
	 * @param  [int] $product_id 
	 * 
	 */
/*	public function showProductDetails($product_id){
		$data['product'] = $this->products->getById($product_id);

		echo $this->load->view('products/template', $data, true);
	}*/
}
