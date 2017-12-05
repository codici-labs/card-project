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

    // public function getJson($query = false){
    //     $this->db->select('id, descripcion, costo, codigo');
    //     $this->db->from('productos');
    //     if($query){
    //         $this->db->like('descripcion', $query);
    //     }
    //     $this->db->order_by('descripcion','asc');
    //     return $this->db->get()->result();
    // }

    // public function getById($product_id){
    //     return $this->db->get_where('productos', array('id' => $product_id))->row();
    // }
}