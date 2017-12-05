<?php

class Dashboard_model extends CI_Model
{   
    public function __construct()
    {
        parent::__construct();
    }

    public function unique($table, $options){
        $db_debug = $this->db->db_debug;
        $this->db->db_debug = FALSE;

        $return = NULL;
        $result = $this->db->get_where($table, $options);

        if(!$this->db->error()['code'])
            $return = !boolval($result->num_rows());

        $this->db->db_debug = $db_debug;
        return $return;
    }

    
}