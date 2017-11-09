<?php

class Students_model extends CI_Model
{   
    public function __construct()
    {
        parent::__construct();
    }

    public function getJson($query = false){
        $this->db->select('id, nombre, apellido, credito, mail');
        $this->db->from('alumnos');
        $this->db->order_by('apellido', 'asc');
       
        return $this->db->get()->result();
    }

    public function getById($student_id){
        return $this->db->get_where('alumnos', array('id' => $student_id))->row();
    }
}