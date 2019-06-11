<?php defined('BASEPATH') or exit('No direct script access allowed');

/*
*************************************************
*Helpers MOODULO Tienda -> Pagos
***************************************************
*/

if (!function_exists('get_listado_metodos_pagos')) {
    function get_listado_metodos_pagos()
    {
        $CI = &get_instance();
        $query = $CI->db->get('md_shop_metodospagos');
        return $query->result();
    }
}

if (!function_exists('get_listado_status_pagos')) {
    function get_listado_status_pagos()
    {
        $CI = &get_instance();
        $query = $CI->db->get('md_shop_statuspagos');
        return $query->result();
    }
}

if (!function_exists('validar_permisos_statusventa')) {
    function validar_permisos_statusventa($id_statusventa, $id_permiso)
    {
        $CI = &get_instance();
        $CI->db->where('id_statusventa', $id_statusventa);
        $CI->db->like('ver', $id_permiso);
        $query = $CI->db->get('md_shop_statusventas');
        return $query->row();
    }
}

if (!function_exists('importe_pagado_venta_id')) {
    function importe_pagado_venta_id($id_venta)
    {
        $CI = &get_instance();
        $CI->db->select('importe', FALSE);
        $CI->db->where('id_venta', $id_venta);
        $query = $CI->db->get('md_shop_ventas');
        $importe = $query->row()->importe;

        return $importe;
    }
}

/*
*************************************************
*Helpers MOODULO Tienda -> Ventas
***************************************************
*/
if (!function_exists('get_id_grupo')) {
    /**
     * Conocer de que grupo es propietario un usuario
     *
     * @param   int  $id_user  id del usuario
     *
     * @return  int             id del grupo propietario  
     */
    function get_id_grupo($id_user)
    {
        $CI = &get_instance();

        $CI->db->where('own_user_grupo', $id_user);
        $query = $CI->db->get('md_grupos');
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
        $CI = &get_instance();

        switch ($idpermiso) {
            case 1:
                //Mostramos todas las ventas si es administrador
                break;
            case 2:
                //Listado de vestas para vendedores
                $CI->db->where('a.id_user', $id_user);
                break;
            case 3:
                //Listado de vestas para DIRECTORES O DUEÑOS DE GRUPO
                $id_grupo = get_grupo_user($id_user);
                $CI->db->join('md_users_grupos e', 'a.id_user = e.id_user', 'inner');
                $CI->db->where('e.id_grupo', $id_grupo);
                $CI->db->where('d.estado !=', 'Borrador');
                break;
            case 4:
                //Mosmotramos todas las ventas si es Autorizador
                $CI->db->where('d.estado !=', 'Borrador');
                $CI->db->where('d.estado !=', 'Pendiente');
                break;
        }

        $CI->db->select('a.id_venta, a.id_cliente, a.total, b.nombres as nombres_cliente, a.fecha_venta, c.nombres as nombres_usuario, d.id_statusventa, d.estado', FALSE);
        $CI->db->from('md_shop_ventas a');
        $CI->db->join('md_clientes b', 'a.id_cliente = b.id_cliente', 'left');
        $CI->db->join('md_user c', 'a.id_user = c.id_user', 'left');
        $CI->db->join('md_shop_statusventas d', 'a.id_statusventa = d.id_statusventa', 'left');
        $query = $CI->db->get();
        return $query->result();
    }
}
if (!function_exists('deshabilitar_status_ventas')) {
    /**
     * Deshabilitar elemetos del DOM dependiendo de permisos de edición
     *
     * @param   int  $idpermiso     id del permiso de usuario
     * @param   int  $status_venta  id de estado actual de la venta
     *
     * @return  string              disabled
     */
    function deshabilitar_status_ventas($idpermiso, $status_venta = NULL)
    {
        $editar = '';
        $CI = &get_instance();

        //listamos lis campos que puede ver
        $CI->db->like('ver', $idpermiso);
        $query_show = $CI->db->get('md_shop_statusventas');
        $estados_ventas = $query_show->result();

        foreach ($estados_ventas as $estado_venta) {
            //condicionamos los estados que puede ver para saber cual puede editar
            if (!is_null($status_venta) and $estado_venta->id_statusventa == $status_venta) {
                $CI->db->where('estado', $estado_venta->estado);
                $CI->db->like('editar', $idpermiso);
                $query_edit = $CI->db->get('md_shop_statusventas');
                $estados_ventas_edit = $query_edit->row();
                if (is_null($estados_ventas_edit)) {
                    $editar = 'disabled';
                }
            }
        }
        return $editar;
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
        $select = '';
        $CI = &get_instance();
        //los que campos puede ver
        $CI->db->like('ver', $idpermiso);
        $query_show = $CI->db->get('md_shop_statusventas');
        $estados_ventas = $query_show->result();

        $editar = deshabilitar_status_ventas($idpermiso, $status_venta);

        $validar = validar_permisos_statusventa($status_venta, $idpermiso);
        if (is_null($validar) and !is_null($status_venta)) {
            $CI->db->where('id_statusventa', $status_venta);
            $query = $CI->db->get('md_shop_statusventas');
            $result = $query->row();

            $html = '<select class="custom-select custom-select-sm" name="id_statusventa" id="id_statusventa" required disabled>';
            $html .= '<option selected value=' . $result->id_statusventa . '>' . $result->estado . '</option>';
            $html .= '</select>';
        } else {
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
        }
        return $html;
    }
}

if (!function_exists('get_venta_id')) {
    function get_venta_id($id_venta)
    {
        $CI = &get_instance();
        $CI->db->where('id_venta', $id_venta);
        $query = $CI->db->get('md_shop_ventas');
        return $query->row();
    }
}

if (!function_exists('update_venta_id')) {
    function update_venta_id($param, $id_venta)
    {
        $CI = &get_instance();
        $CI->db->where('id_venta', $id_venta);
        $CI->db->update('md_shop_ventas', $param);
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

        return $query->row();
    }
}