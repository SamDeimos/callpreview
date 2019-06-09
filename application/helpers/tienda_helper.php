<?php defined('BASEPATH') or exit('No direct script access allowed');

/*
*************************************************
*Helpers MOODULO Tienda -> Pagos
***************************************************
*/

if (!function_exists('get_listado_metodos_pagos')) {
    function get_listado_metodos_pagos()
    {
        $CI =& get_instance();
        $query = $CI->db->get('md_shop_metodospagos');
        return $query->result();
    }
}

if (!function_exists('get_listado_status_pagos')) {
    function get_listado_status_pagos()
    {
        $CI =& get_instance();
        $query = $CI->db->get('md_shop_statuspagos');
        return $query->result();
    }
}

if (!function_exists('validar_permisos_statusventa')) {
    function validar_permisos_statusventa($id_statusventa, $id_permiso)
    {
        $CI =& get_instance();
        $CI->db->where('id_statusventa', $id_statusventa);
        $CI->db->like('ver', $id_permiso);
        $query = $CI->db->get('md_shop_statusventas');
        return $query->row();
    }
}

if (!function_exists('importe_pagado_venta_id')) {
    function importe_pagado_venta_id($id_venta)
    {
        $CI =& get_instance();
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
        $CI =& get_instance();

        $CI->db->where('own_user_grupo', $id_user);
        $query = $CI->db->get('md_grupos');
        $grupo = $query->row();

        return $grupo->id_grupo;
    }
}

if (!function_exists('widget_cantidad_ventas_diarias')) {
    function widget_cantidad_ventas_diarias($id_user, $idpermiso)
    {
        $fecha_inicio = date('Y-m-d 00:00:00');
        $fecha_fin = strtotime('-7 day', strtotime($fecha_inicio));
        $fecha_fin = date('Y-m-d 23:59:59', $fecha_fin);
        $CI =& get_instance();

        switch ($idpermiso) {
            case 1:
                //Mostramos todas las ventas si es administrador
                break;
            case 2:
                //Listado de vestas para vendedores
                $CI->db->where('a.id_user', $id_user);
                $CI->db->where('d.estado', 'Completado');
                break;
            case 3:
                //Listado de vestas para DIRECTORES O DUEÑOS DE GRUPO
                $id_grupo = get_id_grupo($id_user);
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

        $CI->db->select("SUM(if((ELT(WEEKDAY(fecha_venta) + 1, 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo')) = 'lunes', 1, 0)) AS lunes,
        SUM(if((ELT(WEEKDAY(fecha_venta) + 1, 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo')) = 'martes', 1, 0)) AS martes,
        SUM(if((ELT(WEEKDAY(fecha_venta) + 1, 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo')) = 'miercoles', 1, 0)) AS miercoles,
        SUM(if((ELT(WEEKDAY(fecha_venta) + 1, 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo')) = 'jueves', 1, 0)) AS jueves,
        SUM(if((ELT(WEEKDAY(fecha_venta) + 1, 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo')) = 'viernes', 1, 0)) AS viernes,
        SUM(if((ELT(WEEKDAY(fecha_venta) + 1, 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo')) = 'sabado', 1, 0)) AS sabado,
        SUM(if((ELT(WEEKDAY(fecha_venta) + 1, 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo')) = 'domingo', 1, 0)) AS domingo", FALSE);
        $CI->db->from('md_shop_ventas a');
        $CI->db->join('md_shop_statusventas d', 'a.id_statusventa = d.id_statusventa', 'left');
        $CI->db->where('a.fecha_venta BETWEEN "' . $fecha_fin . '" and "' . $fecha_inicio . '"');
        $query = $CI->db->get();

        return $query->row();
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
        $CI =& get_instance();

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

        $CI->db->select('a.id_venta, a.id_cliente, a.total, b.nombres as nombres_cliente, c.nombres as nombres_usuario, d.id_statusventa, d.estado', FALSE);
        $CI->db->from('md_shop_ventas a');
        $CI->db->join('md_clientes b', 'a.id_cliente = b.id_cliente', 'left');
        $CI->db->join('md_user c', 'a.id_user = c.id_user', 'left');
        $CI->db->join('md_shop_statusventas d', 'a.id_statusventa = d.id_statusventa', 'left');
        $query = $CI->db->get();
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
        $CI =& get_instance();

        //los que campos puede ver
        $CI->db->like('ver', $idpermiso);
        $query_show = $CI->db->get('md_shop_statusventas');
        $estados_ventas = $query_show->result();

        foreach ($estados_ventas as $estado_venta) {
            //estado de la venta
            if (!is_null($status_venta) and $estado_venta->id_statusventa == $status_venta) {
                $CI->db->where('estado', $estado_venta->estado);
                $CI->db->like('editar', $idpermiso);
                $query_edit = $CI->db->get('md_shop_statusventas');
                $estados_ventas_edit = $query_edit->result();
                if ($estados_ventas_edit == NULL) {
                    $editar = 'disabled';
                } else {
                    $editar = '';
                }
            }
        }
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
        $CI =& get_instance();
        $CI->db->where('id_venta', $id_venta);
        $query = $CI->db->get('md_shop_ventas');
        return $query->row();
    }
}

if (!function_exists('update_venta_id')) {
    function update_venta_id($param, $id_venta)
    {
        $CI =& get_instance();
        $CI->db->where('id_venta', $id_venta);
        $CI->db->update('md_shop_ventas', $param);
    }
}

if (!function_exists('check_status_venta')) {
    function check_status_venta($id_venta, $importe_total)
    {
        $CI =& get_instance();
        $CI->db->select(' *', FALSE);
        $CI->db->where('id_venta', $id_venta);
        $CI->db->where('total', $importe_total);
        $query = $CI->db->get('md_shop_ventas');
        if (!is_null($query->row())) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
