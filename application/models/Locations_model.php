<?php

class Locations_model extends CI_Model
{   
    public function __construct()
    {
        parent::__construct();
    }

    public function get($query = false){
        return $this->db->get('locations')->result();
    }
}