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
        		$this->session->set_flashdata('server_error', lang('db_error_insert'));
        	} else {
        		redirect(base_url('salepoints'));
        	}
		}

		$data = array();
		$this->load->model('Locations_model','locations');
		$data['locations'] = $this->locations->get();
		$this->layout->view('add_edit', $data);
	}

	public function edit($id = 0){
		if($this->input->post()){
			$update = array(
				'name' => $this->input->post('sale-point-name'),
			    'location_id' => $this->input->post('location')
			);

			$db_debug = $this->db->db_debug;
        	$this->db->db_debug = FALSE;
        	$this->salepoints->update($update, array('id'=>$id)); // <-
        	$this->db->db_debug = $db_debug;
        	$db_err = $this->db->error();

        	if($db_err['code']){
        		log_message('error', 'Expected DB error - Code: '.$db_err['code'].' / Message: '.$db_err['message']);
        		$this->session->set_flashdata('server_error', lang('db_error_update'));
        	} else {
        		redirect(base_url('salepoints'));
        	}
		}		

		$data = array();
		$this->load->model('Locations_model','locations');

		if(count($salepoint = $this->salepoints->get( array('sp.id'=>$id) )) != 1) {
			redirect(base_url('salepoints'));
		}
		$data['salepoint'] = $salepoint[0];

		$data['locations'] = $this->locations->get();
		$this->layout->view('add_edit', $data);
	}

	public function delete($id = 0){

	}

	public function get(){
		if($this->input->is_ajax_request()){
		    jsonify($this->salepoints->get());
		}

	// 	$data = array();
	// 	// header('Content-Type: application/json');
	// 	$this->layout->view('add_edit', $data);
	}

}
