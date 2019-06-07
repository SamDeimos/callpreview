<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_model extends CI_Model {

    public function findAll(){
        $this->db->select('a.id_producto, a.producto, a.detalle, b.type, a.valor, a.iva, a.duracion_dias', FALSE);
        $this->db->from('md_shop_productos a');
        $this->db->join('md_shop_typeproductos b', 'a.id_typeproducto = b.id_typeproducto', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function findID($id_producto){
        $this->db->where('id_producto', $id_producto);
        $query = $this->db->get('md_shop_productos');
        return $query->row();
    }
}

/* End of file Producto_model.php */