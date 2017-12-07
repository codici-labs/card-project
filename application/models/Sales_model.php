<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }

    public function getById($venta_id){
        return $this->db->get_where('ventas', array('id' => $venta_id))->row();
    }

    public function getFullDetallesById($venta_id){
        
        $this->db->select('d.id_venta, p.descripcion, p.precio_compra as costo, p.codigo, a.nombre, a.apellido, d.valor as precio_venta, d.cantidad');
        $this->db->from('detalles_ventas d');
        $this->db->join('productos p', 'd.id_producto = p.id');
        $this->db->join('ventas v', 'd.id_venta = v.id');
        $this->db->join('alumnos a', 'v.id_alumno = a.id');
        $this->db->where('d.id_venta', $venta_id);
        return $this->db->get()->result();
    }

    public function getDetallesById($venta_id){
        return $this->db->get_where('detalles_ventas', array('id_venta' => $venta_id))->result();
    }
}