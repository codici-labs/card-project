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

}
