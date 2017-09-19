<?php

class Products_model extends CI_Model
{   
    public function __construct()
    {
        parent::__construct();
    }

    public function getJson($query){
        $this->db->select('id, descripcion');
        $this->db->from('productos');
        $this->db->like('descripcion', $query);
        return $this->db->get()->result();
    }

    public function getById($product_id){
        return $this->db->get_where('productos', array('id' => $product_id))->row();
    }
}