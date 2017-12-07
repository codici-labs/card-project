<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sale_points_model extends CI_Model
{   
    public function __construct()
    {
        parent::__construct();
    }

    public function add($data){
        $query = $this->db->insert('sale_points', $data);
        	
        if(!$query || $this->db->error()['code']) throw new DbException();
    }

    public function update($data, $where){
		$this->db->where($where);
		$query = $this->db->update('sale_points', $data);

		if(!$query || $this->db->error()['code']) throw new DbException();
    }

    public function delete($id){

    	$this->db->where('id', $id);
    	$query = $this->db->update('sale_points', array(
    		'deleted' => 1,
    		'deleted_on' => date("Y-m-d H:i:s")
    	));

		if(!$query || $this->db->error()['code']) throw new DbException();
    }

    public function get($where = NULL, $filter = NULL){
    	if($filter) {
    		$this->db->like('sp.name', $filter);
    		// $this->db->or_like('l.name', $filter);
    	}

    	if($where){
    		$this->db->where($where);
    	}

    	$this->db->select("
		sp.id,
		sp.name,
		l.id as l_id,
		l.name as l_name");

    	$this->db->join('locations l','l.id = sp.location_id');
    	$this->db->where('deleted', 0);
    	$query = $this->db->get('sale_points sp');
    	
    	return $query->result();
    }

}