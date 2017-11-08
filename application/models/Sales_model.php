<?php

class Sales_model extends CI_Model
{   
    public function __construct()
    {
        parent::__construct();
    }

    public function getJson(){
        $this->db->select('v.id, v.id_alumno, v.fecha, a.nombre, a.apellido');
        $this->db->from('ventas v');
        $this->db->join('alumnos a', 'v.id_alumno = a.id');
        
        return $this->db->get()->result();
    }

    public function getById($venta_id){
        return $this->db->get_where('ventas', array('id' => $venta_id))->row();
    }
}