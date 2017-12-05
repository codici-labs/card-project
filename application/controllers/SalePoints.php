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

		if($this->input->post()){

			$insert = array(
			    'name' => $this->input->post('sale-point-name'),
			    'location_id' => $this->input->post('location')
			);

			$db_debug = $this->db->db_debug;
        	$this->db->db_debug = FALSE;
        	$this->salepoints->add($insert); // <-
        	$this->db->db_debug = $db_debug;
        	$db_err = $this->db->error();

        	if($db_err['code']){
        		log_message('error', 'Expected DB error - Code: '.$db_err['code'].' / Message: '.$db_err['message']);
        		$this->session->set_flashdata('server_error', lang('db_error'));
        	} else {
        		redirect(base_url('salepoints'));
        	}

			// $this->db->trans_start();
			// $this->db->trans_complete();
			// if ($this->db->trans_status() === FALSE)
			// {
			    // generate an error... or use the log_message() function to log your error
			// }

		}

		$this->load->model('Locations_model','locations');
		$data['locations'] = $this->locations->get();
		$this->layout->view('add', $data);
	}

	// public function get(){
	// 	$data = array();
	// 	// header('Content-Type: application/json');
	// 	$this->layout->view('add', $data);
	// }

}
