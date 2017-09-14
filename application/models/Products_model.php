<?php

class Products_model extends CI_Model
{   
    public function __construct()
    {
        parent::__construct();
    }

    public function getJson($query){
        $this->db->select('id_producto, name');
        $this->db->from('products');
        $this->db->like('name', $query);
        return $this->db->get()->result();
    }

    public function getById($product_id){
        return $this->db->get_where('products', array('id_producto' => $product_id))->row();
    }
}