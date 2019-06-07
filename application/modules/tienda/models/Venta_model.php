<?php defined('BASEPATH') or exit('No direct script access allowed');

class Venta_model extends CI_Model
{

    public function findID($id_venta)
    {
        $this->db->select('a.*, b.*, c.*', FALSE);
        $this->db->from('md_shop_ventas a');
        $this->db->join('md_shop_statusventas b', 'a.id_statusventa = b.id_statusventa', 'left');
        $this->db->join('md_clientes c', 'a.id_cliente = c.id_cliente', 'left');
        $this->db->where('a.id_venta', $id_venta);
        $query = $this->db->get();
        return $query->row();
    }

    public function find_detalles_ID($id_venta)
    {
        $this->db->select('a.id_venta_detalle, a.id_producto, producto, precio, cantidad, total', FALSE);
        $this->db->from('md_shop_ventas_detalle a');
        $this->db->join('md_shop_productos b', 'a.id_producto = b.id_producto', 'left');
        $this->db->where('a.id_venta', $id_venta);
        $query = $this->db->get();
        return $query->result();
    }

    public function find_pagos_ID($id_venta)
    {
        $this->db->select('a.id_pago, a.id_venta, b.estado, c.metodo_pago, a.importe, a.data_pago, a.fecha_pago', FALSE);
        $this->db->from('md_shop_pagos a');
        $this->db->join('md_shop_statuspagos b', 'a.id_statuspago = b.id_statuspago', 'left');
        $this->db->join('md_shop_metodospagos c', 'a.id_metodopago = c.id_metodopago', 'left');
        $this->db->where('id_venta', $id_venta);
        $query = $this->db->get();
        return $query->result();
    }

    public function AddVenta($param)
    {
        $this->db->insert('md_shop_ventas', $param);
        return $this->db->insert_id();
    }

    public function EditVenta($param, $id_venta)
    {
        $this->db->where('id_venta', $id_venta);
        $this->db->update('md_shop_ventas', $param);
    }

    public function AddVentaDetalle($param)
    {
        $this->db->insert('md_shop_ventas_detalle', $param);
        return $this->db->insert_id();
    }

    public function DeleteVentaDetalle($id_venta)
    {
        $this->db->where('id_venta', $id_venta);
        $this->db->delete('md_shop_ventas_detalle');
    }

    public function DeleteVenta($id_venta)
    {
        $this->db->where('id_venta', $id_venta);
        $this->db->delete('md_shop_ventas');
    }
}

/* End of file Venta_model.php */
