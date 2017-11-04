<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct(){
           
        parent::__construct();
        $this->load->helper('url');
    	$this->load->library('Layout');  
    	header('Access-Control-Allow-Origin: *');
    	header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS'); 
    	header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');            
    }
	
	public function index(){
		$this->layout->view('index');
	}

	public function getProducts(){
		$productos = $this->db->get('productos')->result();
		echo json_encode($productos);
		//print_r($productos);
	}

	public function getProduct($barcode){
		$this->db->where('codigo', $barcode);
		$barcode = $this->db->get('productos')->row();
		echo json_encode($barcode);
		//print_r($productos);
	}

	public function getAlumno($tarjeta){
		$this->db->select('a.*, t.codigo');
		$this->db->from('alumnos a');
		$this->db->join('tarjetas t', 'a.id = t.alumno');
		$this->db->where('t.codigo',$tarjeta);
		$tarjeta = $this->db->get()->row();
		echo json_encode($tarjeta);
		//print_r($productos);
	}

	public function confirmarCompra() {
		$postdata = file_get_contents("php://input");
		$data = json_decode($postdata);
		
		$this->descontarStock($data->productos);
		$this->descontarPlata($data->alumno, $data->total);		
		$this->crearVenta($data->alumno->id);
		//$this->crearDescripcionVenta($venta_id);
		//header('Content-Type: application/json');
		//echo json_encode($data->productos[0]->id);

	}

	private function descontarStock($productos){
		foreach ($productos as $producto) {
			$this->db->where('id',$producto->id);
			$this->db->set('stock', "stock - " . $producto->cantidad, false);
			$this->db->update('productos');
		}

		//echo $this->db->last_query();
	}

	private function descontarPlata($alumno, $total){
		$this->db->where('id',$alumno->id);
		$this->db->set('credito', "credito - " . floatval($total), false);
		$this->db->update('alumnos');
		//echo $this->db->last_query();
	}

	private function crearVenta($id){
		$insert['id_alumno'] = $id;
		$this->db->insert('ventas', $insert);
		//echo $this->db->last_query();
		return $this->db->insert_id();
	}

	private function crearDescripcionVenta(){

	}

}
