<?php defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('widget_cantidad_ventas_semanales')) {
    function widget_cantidad_ventas_semanales($id_user, $idpermiso, $idestado)
    {
        $fecha_fin = date('Y-m-d 23:59:59');
        $fecha_inicio = strtotime('-6 day', strtotime($fecha_fin));
        $fecha_inicio = date('Y-m-d 00:00:00', $fecha_inicio);
        $CI = &get_instance();

        switch ($idpermiso) {
            case 1:
                //Mostramos todas las ventas si es administrador
                $CI->db->where('d.id_statusventa', $idestado);
                break;
            case 2:
                //Listado de vestas para vendedores
                $CI->db->where('a.id_user', $id_user);
                $CI->db->where('d.id_statusventa', $idestado);
                break;
            case 3:
                //Listado de vestas para DIRECTORES O DUEÑOS DE GRUPO
                $id_grupo = get_id_grupo($id_user);
                $CI->db->join('md_grupos g', 'g.belong_user_grupo like concat("%", a.id_user, "%")', 'inner');
                $CI->db->where('g.id_grupo', $id_grupo);
                $CI->db->where('d.id_statusventa', $idestado);
                break;
            case 4:
                //Mosmotramos todas las ventas si es Autorizador
                $CI->db->where('d.id_statusventa', $idestado);
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
        $CI->db->where('a.fecha_venta BETWEEN "' . $fecha_inicio . '" and "' . $fecha_fin . '"');
        $query = $CI->db->get();

        return $query->row();
    }
}

if (!function_exists('widget_cantidad_ventas_mensuales')) {
    function widget_cantidad_ventas_mensuales($id_user, $idpermiso, $idestado)
    {
        $fecha_fin = date('Y-m-25');
        $fecha_inicio = strtotime('-1 month', strtotime($fecha_fin));
        $fecha_inicio = date('Y-m-26', $fecha_inicio);
        $CI = &get_instance();

        switch ($idpermiso) {
            case 1:
                //Mostramos todas las ventas si es administrador
                $CI->db->where('d.id_statusventa', $idestado);
                break;
            case 2:
                //Listado de vestas para vendedores
                $CI->db->where('a.id_user', $id_user);
                $CI->db->where('d.id_statusventa', $idestado);
                break;
            case 3:
                //Listado de vestas para DIRECTORES O DUEÑOS DE GRUPO
                $id_grupo = get_id_grupo($id_user);
                $CI->db->join('md_grupos g', 'g.belong_user_grupo like concat("%", a.id_user, "%")', 'inner');
                $CI->db->where('g.id_grupo', $id_grupo);
                $CI->db->where('d.id_statusventa', $idestado);
                break;
            case 4:
                //Mosmotramos todas las ventas si es Autorizador
                $CI->db->where('d.id_statusventa', $idestado);
                break;
        }

        $CI->db->select("count(*) as ventas_mes", FALSE);
        $CI->db->from('md_shop_ventas a');
        $CI->db->join('md_shop_statusventas d', 'a.id_statusventa = d.id_statusventa', 'left');
        $CI->db->where('a.fecha_venta BETWEEN "' . $fecha_inicio . '" and "' . $fecha_fin . '"');
        $query = $CI->db->get();

        return $query->row();
    }
}

if (!function_exists('widget_importe_ventas_mensuales')) {
    function widget_importe_ventas_mensuales($id_user, $idpermiso, $idestado)
    {
        $fecha_fin = date('Y-m-25');
        $fecha_inicio = strtotime('-1 month', strtotime($fecha_fin));
        $fecha_inicio = date('Y-m-26', $fecha_inicio);
        $CI = &get_instance();

        switch ($idpermiso) {
            case 1:
                //Mostramos todas las ventas si es administrador
                $CI->db->where('d.id_statusventa', $idestado);
                break;
            case 2:
                //Listado de vestas para vendedores
                $CI->db->where('a.id_user', $id_user);
                $CI->db->where('d.id_statusventa', $idestado);
                break;
            case 3:
                //Listado de vestas para DIRECTORES O DUEÑOS DE GRUPO
                $id_grupo = get_id_grupo($id_user);
                $CI->db->join('md_grupos g', 'g.belong_user_grupo like concat("%", a.id_user, "%")', 'inner');
                $CI->db->where('g.id_grupo', $id_grupo);
                $CI->db->where('d.id_statusventa', $idestado);
                break;
            case 4:
                //Mosmotramos todas las ventas si es Autorizador
                $CI->db->where('d.id_statusventa', $idestado);
                break;
        }

        $CI->db->select("sum(importe) as importe_mes", FALSE);
        $CI->db->from('md_shop_ventas a');
        $CI->db->join('md_shop_statusventas d', 'a.id_statusventa = d.id_statusventa', 'left');
        $CI->db->where('a.fecha_venta BETWEEN "' . $fecha_inicio . '" and "' . $fecha_fin . '"');
        $query = $CI->db->get();

        return $query->row();
    }
}
