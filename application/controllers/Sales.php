<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

	public function __construct(){
           
        parent::__construct();
        $this->load->helper('url');
    	$this->load->library('Layout');
    	$this->load->model('Sales_model', 'sales');            
    	$this->layout->setFolder('sales');       
     
    }
	
	public function index(){
		$this->layout->view('index');
	}

    public function get(){
        $sales = new stdClass();
        $sales->venta = $this->sales->getJson();
        
        foreach ($sales->venta as $venta) {

            $venta->total = $this->getTotatlventa($venta->id);
        }
       echo json_encode($sales);
    }


    private function getTotatlventa($venta_id){
        $total = 0; 
        $ventas = $this->sales->getDetallesById($venta_id);

        foreach ($ventas as $venta) {
            $totalVenta = $venta->valor * $venta->cantidad;
            $total+=$totalVenta;
        }

        return $total;
    }


    function getDetails(){
        $venta_id = $this->input->post('id');
        $ventas = $this->sales->getFullDetallesById($venta_id);
        echo json_encode($ventas);
    }

}