<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
           
        parent::__construct();
    	$this->load->model('Dashboard_model', 'dashboard');        
    	$this->load->library('Layout');         
    }

    public function unique(){
    	$post = $this->input->post();
    	$type = $post['type'];

    	switch($type){
    		case 'salepoint': {
    			$table = 'sale_points';
    			$options = array(
    				'name' => $post['sale-point-name'],
    				'location_id' => $post['location'],
    				'deleted' => 0
    			);
    			break;
    		}
    		default: {

    			break;
    		}
    	}

    	// Exception ID (when editing)
    	if($this->input->post('except')) $options[$table.'.id <> '] = $post['except'];

    	$this->_unique($table, $options);
    	jsonify($this->_unique($table, $options));
    }

    private function _unique($table, $options){
    	return $this->dashboard->unique($table, $options);
    }

}
