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

        	$db_err = $this->db->error();

        	try {
				$this->salepoints->add($insert);
		    } catch ( DbException $e ) {
		    	$e->handleError();
		    }

        	redirect(base_url('salepoints'));
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

			try {
				$this->salepoints->update($update, array('id'=>$id));
			} catch( DbException $e) {
				$e->handleError();
			}

        	
       		redirect(base_url('salepoints'));
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
		try {
			$this->salepoints->delete($id);
		} catch( DbException $e) {
			$e->handleError();
		}
		jsonify(lang('sale_point_deleted'), 1);
	}

	public function get($filter = NULL){

		// if($this->input->is_ajax_request()){
		    jsonify($this->salepoints->get(null, $filter));
		// }

	}

}
