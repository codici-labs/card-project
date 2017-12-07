<?php

class Dashboard_model extends CI_Model
{   
    public function __construct()
    {
        parent::__construct();
    }

    public function unique($table, $options){        
        $query = $this->db->get_where($table, $options);
        if(!$query || $this->db->error()['code']) throw new DbException();
        return !boolval($query->num_rows());
    }

    
}