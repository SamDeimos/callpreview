<?php defined('BASEPATH') or exit('No direct script access allowed');

/*
*************************************************
*Helpers MOODULO Tienda -> Pagos
***************************************************
*/

if (!function_exists('get_listado_metodos_pagos')) {
    function get_listado_metodos_pagos()
    {
        $ci = get_instance();
        $query = $ci->db->get('md_shop_metodospagos');
        return $query->result();
    }
}

if (!function_exists('get_listado_status_pagos')) {
    function get_listado_status_pagos()
    {
        $ci = get_instance();
        $query = $ci->db->get('md_shop_statuspagos');
        return $query->result();
    }
}

if (!function_exists('importe_pagado_venta_id')) {
    function importe_pagado_venta_id($id_venta)
    {
        $ci = get_instance();
        $ci->db->select('importe', FALSE);
        $ci->db->where('id_venta', $id_venta);
        $query = $ci->db->get('md_shop_ventas');
        $importe = $query->row()->importe;

        return $importe;
    }
}

/*
*************************************************
*Helpers MOODULO Tienda -> Ventas
***************************************************
*/

if (!function_exists('get_listado_ventas')) {
    function get_listado_ventas($id_user, $idpermiso)
    {
        $ci = get_instance();

        switch ($idpermiso) {
            case 1:
                //NO hacemos nada
                break;
            case 2:
                $ci->db->where('a.id_user', $id_user);
                break;
        }

        $ci->db->select('a.id_venta, a.id_cliente, a.total, b.nombres as nombres_cliente, c.nombres as nombres_usuario, d.id_statusventa, d.estado', FALSE);
        $ci->db->from('md_shop_ventas a');
        $ci->db->join('md_clientes b', 'a.id_cliente = b.id_cliente', 'left');
        $ci->db->join('md_user c', 'a.id_user = c.id_user', 'left');
        $ci->db->join('md_shop_statusventas d', 'a.id_statusventa = d.id_statusventa', 'left');
        $query = $ci->db->get();
        return $query->result();
    }
}

if (!function_exists('get_listado_status_ventas')) {
    function get_listado_status_ventas()
    {
        $ci = get_instance();
        $query = $ci->db->get('md_shop_statusventas');
        return $query->result();
    }
}

if (!function_exists('get_venta_id')) {
    function get_venta_id($id_venta)
    {
        $ci = get_instance();
        $ci->db->where('id_venta', $id_venta);
        $query = $ci->db->get('md_shop_ventas');
        return $query->row();
    }
}

if (!function_exists('update_venta_id')) {
    function update_venta_id($param, $id_venta)
    {
        $ci = get_instance();
        $ci->db->where('id_venta', $id_venta);
        $ci->db->update('md_shop_ventas', $param);
    }
}

if (!function_exists('check_status_venta')) {
    function check_status_venta($id_venta, $importe_total)
    {
        $ci = get_instance();
        $ci->db->select('*', FALSE);
        $ci->db->where('id_venta', $id_venta);
        $ci->db->where('total', $importe_total);
        $query = $ci->db->get('md_shop_ventas');
        if (!is_null($query->row())) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}


/*
*@id_statusventa    int     estado actual de la venta
*@id_user           int     id de usuario login
*
*/
if (!function_exists('show_status_venta')) {
    /*
    * 1 = Borrador
    * 2 = Completado
    * 3 = Fallido
    * 4 = Sin cupo
    * 5 = Pendiente
    */
    function show_status_venta($id_statusventa = NULL, $id_user = NULL)
    {
        if ($id_statusventa == 1) {
            $show = '';
        } elseif ($id_statusventa == 2) {
            $show = 'disabled';
        } elseif ($id_statusventa == 4) {
            $show = 'disabled';
        } elseif ($id_statusventa == 3) {
            $show = 'disabled';
        } else {
            $show = '';
        }
        return $show;
    }
}

/*
*************************************************
*Helpers MOODULO Tienda -> Ventas
***************************************************
*/
