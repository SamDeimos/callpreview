<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pago_model extends CI_Model
{

    public function findAll()
    {
        $this->db->select('a.id_pago, a.id_venta, c.nombres, c.cel, metodo_pago, data_pago, d.estado, fecha_pago', FALSE);
        $this->db->from('md_shop_pagos a');
        $this->db->join('md_shop_ventas b', 'a.id_venta = b.id_venta', 'left');
        $this->db->join('md_clientes c', 'b.id_cliente = c.id_cliente or a.id_cliente = c.id_cliente', 'left');
        $this->db->join('md_shop_statuspagos d', 'a.id_statuspago = d.id_statuspago', 'left');
        $this->db->join('md_shop_metodospagos e', 'a.id_metodopago = e.id_metodopago', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function findAll_Placetopay()
    {
        $date = date('Y-m-d') . ' 00:00:00';
        $this->db->where('id_statuspago', '1');
        $this->db->where('id_metodopago', '2');
        $this->db->where('fecha_pago >=', $date);
        $query = $this->db->get('md_shop_pagos');
        return $query->result();
    }

    public function findID($id_pago)
    {
        $this->db->where('id_pago', $id_pago);
        $query = $this->db->get('md_shop_pagos');
        return $query->row();
    }

    public function findRequestID($requestID)
    {
        $this->db->like('data_pago', '"requestid":' . $requestID);
        $query = $this->db->get('md_shop_pagos');
        return $query->row();
    }

    public function getStatusventas()
    {
        $query = $this->db->get('md_shop_statusventas');
        return $query->result();
    }

    public function AddPago($param)
    {
        $this->db->insert('md_shop_pagos', $param);
        return $this->db->insert_id();
    }

    public function EditPago($param, $id_pago)
    {
        $this->db->where('id_pago', $id_pago);
        $this->db->update('md_shop_pagos', $param);
    }

    public function DeletePago($id_pago)
    {
        $this->db->where('id_pago', $id_pago);
        $this->db->delete('md_shop_pagos');
    }

    public function EditPago_venta($param, $id_venta)
    {
        $this->db->where('id_venta', $id_venta);
        $this->db->update('md_shop_pagos', $param);
    }
}



/* End of file Pago_model.php */
