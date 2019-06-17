<?php defined('BASEPATH') or exit('No direct script access allowed');

/*
*************************************************
*Helpers MOODULO Usuarios
***************************************************
*/

if (!function_exists('get_listado_usuarios_idpermiso')) {
    function get_listado_usuarios_idpermiso($idpermiso)
    {
        $CI = &get_instance();
        $CI->db->select('id_user, nombres', FALSE);
        $CI->db->where('id_permiso', $idpermiso);
        $query = $CI->db->get('md_user');
        return $query->result();
    }
}