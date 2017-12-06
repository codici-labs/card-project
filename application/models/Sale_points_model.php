<?php

class Sale_points_model extends CI_Model
{   
    public function __construct()
    {
        parent::__construct();
    }

    public function add($data){
        $this->db->insert('sale_points', $data);
    }

    public function update($data, $where=NULL){
    	if($where){
    		$this->db->where($where);
			$this->db->update('sale_points', $data);
    	}
    }

    public function get($where=NULL){
    	if($where) $this->db->where($where);

    	$this->db->select("
		sp.id,
		sp.name,
		l.id as l_id,
		l.name as l_name");

    	$this->db->join('locations l','l.id = sp.location_id');
    	$this->db->where('deleted',0);
    	$query = $this->db->get('sale_points sp');
    	
    	return $query->result();
    }

}