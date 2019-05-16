<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Venta_model extends CI_Model {

    public function findAll(){
        $this->db->select('a.id_venta, a.id_cliente, a.id_producto, b.nombres, c.producto, d.estado', FALSE);
        $this->db->from('md_shop_ventas a');
        $this->db->join('md_clientes b', 'a.id_cliente = b.id_cliente', 'left');
        $this->db->join('md_shop_productos c', 'a.id_producto = c.id_producto', 'left');
        $this->db->join('md_shop_statusventas d', 'a.id_statusventa = d.id_statusventa', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function findID($id_venta){
        $this->db->where('id_venta', $id_venta);
        $query = $this->db->get('md_shop_ventas');
        return $query->row();
    }

    public function AddVenta($param){
        $this->db->insert('md_shop_ventas',$param);
        return $this->db->insert_id();
    }
}

/* End of file Venta_model.php */
