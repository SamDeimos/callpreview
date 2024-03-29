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

        $CI->db->select('a.id_call, a.phones, a.nombres, b.id_call_attribute, b.data_attribute, c.id_form, c.id_script, c.campaign, d.id_call_status, d.estado', FALSE);
        $CI->db->from('md_callcenter_calls a');
        $CI->db->join('md_callcenter_call_attribute b', 'a.id_call = b.id_call', 'left');
        $CI->db->join('md_callcenter_campaigns c', 'a.id_campaign = c.id_campaign', 'left');
        $CI->db->join('md_callcenter_call_status d', 'a.id_call_status = d.id_call_status', 'left');
        $CI->db->where('c.id_campaign_status', '1');
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

        $CI->db->select('a.id_call_registry, a.id_call, a.dst, a.calldate as reg_calldate, a.id_call_status, d.campaign, b.id_user, b.phones, b.nombres, c.calldate as cdr_calldate, c.billsec, c.disposition, e.data, f.estado', FALSE);
        $CI->db->from('md_callcenter_call_registry a');
        $CI->db->join('md_callcenter_calls b', 'a.id_call = b.id_call', 'left');
        $CI->db->join('asteriskcdrdb.cdr c', 'a.uniqueid = c.uniqueid', 'left');
        $CI->db->join('md_callcenter_campaigns d', 'b.id_campaign = d.id_campaign', 'left');
        $CI->db->join('md_callcenter_form_data_recolected e', 'a.id_call_registry = e.id_call_registry', 'left');
        $CI->db->join('md_callcenter_call_status f', 'a.id_call_status = f.id_call_status', 'left');
        $CI->db->order_by('a.id_call_registry', 'desc');
        $query = $CI->db->get();
        return $query->result();
    }
}

if (!function_exists('get_listado_forms')) {
    function get_listado_forms()
    {
        $CI = &get_instance();
        $query = $CI->db->get('md_callcenter_forms');
        return $query->result();
    }
}

if (!function_exists('get_listado_scripts')) {
    function get_listado_scripts()
    {
        $CI = &get_instance();
        $query = $CI->db->get('md_callcenter_scripts');
        return $query->result();
    }
}

/**
 * Creacion de formulario dinamico
 *
 * @param   int $id_form            id de fromulario asignado en la campaña
 * @param   int $id_call_registry   id del registro de la llamada
 * 
 * @return  html  formulario construido html
 */
if (!function_exists('constructor_formulario')) {
    function constructor_formulario($id_form, $id_call_regsitry)
    {
        $CI = &get_instance();
        $CI->db->where('id_form', $id_form);
        $query = $CI->db->get('md_callcenter_form_fields');
        $form_fields = $query->result();

        //$html_form = '<div class="row">';
        $html_form = '<div class="col">';
        $html_form .= '<form id="form_data_recolected" action="" method="POST">';
        $html_form .= '<input class="" name="id_call_registry" type="hidden" value="' . $id_call_regsitry . '">';
        $html_form .= '<input class="" name="id_form" type="hidden" value="' . $id_form . '">';

        foreach ($form_fields as $field) {
            if ($field->type == 0) {
                $html_form .= '<div class="form-group-xs">';
                $html_form .= '<label for="id_user">' . $field->label . '</label>';
                $html_form .= '<input class="form-control form-control-sm" name="' . $field->label . '" type="text">';
                $html_form .= '</div>';
            } elseif ($field->type == 1) {
                $values = json_decode($field->value, TRUE);
                $html_form .= '<div class="form-group-xs">';
                $html_form .= '<label for="id_user">' . $field->label . '</label>';
                $html_form .= '<select class="custom-select custom-select-sm" name="' . $field->label . '">';
                foreach ($values as $value) {
                    $html_form .= '<option value="' . $value . '">' . $value . '</option>';
                }
                $html_form .= '</select>';
                $html_form .= '</div>';
            }
        }

        $html_form .= '<input class="btn btn-primary btn-xs float-right" type="submit" value="Guardar Datos">';
        $html_form .= '</form>';
        $html_form .= '</div>';

        return $html_form;
    }
}

if (!function_exists('exportar_csv')) {
    function exportar_csv($filename, $data)
    {
        // file name 
        $filename = $filename . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        // file creation 
        $file = fopen('php://output', 'w');

        $header = array("Username", "Name", "Gender", "Email");
        fputcsv($file, $header);
        foreach ($data as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }
}


/**
 * WIDGETS DE CALLCENTER
 */

if (!function_exists('widget_cantidad_camp_activas')) {
    function widget_cantidad_camp_activas($id_user, $idpermiso, $idestado)
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
                // $id_grupo = get_id_grupo($id_user);
                // $CI->db->join('md_grupos g', 'g.belong_user_grupo like concat("%", a.id_user, "%")', 'inner');
                // $CI->db->where('g.id_grupo', $id_grupo);
                // $CI->db->where('d.id_statusventa', $idestado);
                break;
            case 4:
                // //Mosmotramos todas las ventas si es Autorizador
                // $CI->db->where('d.id_statusventa', $idestado);
                break;
        }

        $CI->db->select("count(distinct a.id_campaign) as campaigns", FALSE);
        $CI->db->from('md_callcenter_campaigns a');
        $CI->db->join('md_callcenter_calls b', 'b.id_campaign = a.id_campaign', 'right');
        $CI->db->where('id_campaign_status', $idestado);
        $CI->db->group_by('a.id_campaign');
        $query = $CI->db->get();

        return $query->row();
    }
}

if (!function_exists('widget_cantidad_calls')) {
    function widget_cantidad_calls($id_user, $idpermiso, $idestado = NULL)
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
                // $id_grupo = get_id_grupo($id_user);
                // $CI->db->join('md_grupos g', 'g.belong_user_grupo like concat("%", a.id_user, "%")', 'inner');
                // $CI->db->where('g.id_grupo', $id_grupo);
                // $CI->db->where('d.id_statusventa', $idestado);
                break;
            case 4:
                // //Mosmotramos todas las ventas si es Autorizador
                // $CI->db->where('d.id_statusventa', $idestado);
                break;
        }

        if($idestado != NULL){
            $CI->db->where('id_call_status', $idestado);
        }else{
            $CI->db->where('id_call_status !=', 1);
        }

        $CI->db->select("count(*) as calls", FALSE);
        $CI->db->from('md_callcenter_calls a');
        $query = $CI->db->get();

        return $query->row();
    }
}

if (!function_exists('widget_historial_calls')) {
    function widget_historial_calls($id_user, $idpermiso, $idestado = NULL)
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
                // $id_grupo = get_id_grupo($id_user);
                // $CI->db->join('md_grupos g', 'g.belong_user_grupo like concat("%", a.id_user, "%")', 'inner');
                // $CI->db->where('g.id_grupo', $id_grupo);
                // $CI->db->where('d.id_statusventa', $idestado);
                break;
            case 4:
                // //Mosmotramos todas las ventas si es Autorizador
                // $CI->db->where('d.id_statusventa', $idestado);
                break;
        }

        if($idestado != NULL){
            $CI->db->where('id_call_status', $idestado);
        }else{
            $CI->db->where('id_call_status !=', 1);
        }

        $CI->db->select("count(*) as calls", FALSE);
        $CI->db->from('md_callcenter_calls a');
        $query = $CI->db->get();

        return $query->row();
    }
}
