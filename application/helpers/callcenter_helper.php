<?php defined('BASEPATH') or exit('No direct script access allowed');

/*
*************************************************
*Helpers MOODULO Call Center
***************************************************
*/

if (!function_exists('get_listado_calls')) {
    function get_listado_calls($id_user, $idpermiso)
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
                $id_grupo = get_id_grupo($id_user);
                $CI->db->join('md_grupos g', 'g.belong_user_grupo like concat("%", a.id_user, "%")', 'inner');
                $CI->db->where('g.id_grupo', $id_grupo);
                break;
            case 4:
                //Mosmotramos todas las ventas si es Autorizador
                $CI->db->where('d.estado !=', 'Borrador');
                $CI->db->where('d.estado !=', 'Pendiente');
                break;
        }

        $CI->db->select('a.id_call, a.phones, a.nombres, b.id_call_attribute, b.data_attribute, c.campaign, d.estado', FALSE);
        $CI->db->from('md_callcenter_calls a');
        $CI->db->join('md_callcenter_call_attribute b', 'a.id_call = b.id_call', 'left');
        $CI->db->join('md_callcenter_campaigns c', 'a.id_campaign = c.id_campaign', 'left');
        $CI->db->join('md_callcenter_call_status d', 'a.id_call_status = d.id_call_status', 'left');
        $query = $CI->db->get();
        return $query->result();
    }
}


if (!function_exists('get_listado_registrys')) {
    function get_listado_registrys($id_user, $idpermiso)
    {
        $CI = &get_instance();

        switch ($idpermiso) {
            case 1:
                //Mostramos todas las ventas si es administrador
                break;
            case 2:
                //Listado de vestas para vendedores
                $CI->db->where('b.id_user', $id_user);
                break;
            case 3:
                //Listado de vestas para DIRECTORES O DUEÑOS DE GRUPO
                $id_grupo = get_id_grupo($id_user);
                $CI->db->join('md_grupos g', 'g.belong_user_grupo like concat("%", a.id_user, "%")', 'inner');
                $CI->db->where('g.id_grupo', $id_grupo);
                break;
            case 4:
                //Mosmotramos todas las ventas si es Autorizador
                $CI->db->where('d.estado !=', 'Borrador');
                $CI->db->where('d.estado !=', 'Pendiente');
                break;
        }

        $CI->db->select('a.id_call_registry, a.id_call, a.dst, d.campaign, b.id_user, b.phones, b.nombres, c.calldate, c.billsec, c.disposition', FALSE);
        $CI->db->from('md_callcenter_call_registry a');
        $CI->db->join('md_callcenter_calls b', 'a.id_call = b.id_call', 'left');
        $CI->db->join('asteriskcdrdb.cdr c', 'a.uniqueid = c.uniqueid', 'left');
        $CI->db->join('md_callcenter_campaigns d', 'b.id_campaign = d.id_campaign', 'left');
        $query = $CI->db->get();
        return $query->result();
    }
}
