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
if (!function_exists('get_grupo_user')) {
    function get_grupo_user($id_user)
    {
        $ci = get_instance();

        $ci->db->where('own_user_grupo', $id_user);
        $query = $ci->db->get('md_grupos');
        $grupo = $query->row();

        return $grupo->id_grupo;
    }
}



if (!function_exists('get_listado_ventas')) {
    /**
     * Obtener todo el listado de ventas dependiendo del los permisos de usuasio
     *
     * @param   int  $id_user    id de usuario logueado
     * @param   int  $idpermiso  id de permiso de usuario logueado
     *
     * @return  obj             objeto con listado de ventas
     */
    function get_listado_ventas($id_user, $idpermiso)
    {
        $ci = get_instance();

        switch ($idpermiso) {
            case 1:
                //Mostramos todas las ventas si es administrador
                break;
            case 2:
                //Listado de vestas para vendedores
                $ci->db->where('a.id_user', $id_user);
                break;
            case 3:
                //Listado de vestas para DIRECTORES O DUEÑOS DE GRUPO
                $id_grupo = get_grupo_user($id_user);
                $ci->db->join('md_users_grupos e', 'a.id_user = e.id_user', 'inner');
                $ci->db->where('e.id_grupo', $id_grupo);
                $ci->db->where('d.estado !=', 'Borrador');
                break;
            case 4:
                //Mosmotramos todas las ventas si es Autorizador
                $ci->db->where('d.estado !=', 'Borrador');
                $ci->db->where('d.estado !=', 'Pendiente');
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

if (!function_exists('mostrar_listado_status_ventas')) {
    /**
     * Renderisamos el select que muestra los estados de las ventas segun el permiso de usuario que tenga
     *
     * @param   int  $idpermiso     id de permiso de usuario logueado
     * @param   int  $status_venta  estado de la venta actual
     * @return  string              html
     */
    function mostrar_listado_status_ventas($idpermiso, $status_venta = NULL)
    {
        $editar = '';
        $select = '';
        $ci = get_instance();

        //los que campos puede ver
        $ci->db->like('ver', $idpermiso);
        $query_show = $ci->db->get('md_shop_statusventas');
        $estados_ventas = $query_show->result();

        foreach ($estados_ventas as $estado_venta) {

            //estado de la venta
            if (!is_null($status_venta)) {
                if ($estado_venta->id_statusventa == $status_venta) {

                    $ci->db->where('estado', $estado_venta->estado);
                    $ci->db->like('editar', $idpermiso);
                    $query_edit = $ci->db->get('md_shop_statusventas');
                    $estados_ventas_edit = $query_edit->result();

                    if ($estados_ventas_edit == NULL) {
                        $editar = 'disabled';
                    } else {
                        $editar = '';
                    }
                }
            }
        }

        $html = '<select class="custom-select custom-select-sm" name="id_statusventa" id="id_statusventa" required ' . $editar . '>';

        foreach ($estados_ventas as $estado_venta) {
            //estado de la venta
            if (!is_null($status_venta)) {
                if ($estado_venta->id_statusventa == $status_venta) {
                    $select = 'selected';
                } else {
                    $select = '';
                }
            }
            $html .= '<option ' . $select . ' value=' . $estado_venta->id_statusventa . '>' . $estado_venta->estado . '</option>';
        }

        $html .= '</select>';

        return $html;
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
        $ci->db->select(' *', FALSE);
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
        *************************************************
        *Helpers MOODULO Tienda -> Ventas
        ***************************************************
        */
