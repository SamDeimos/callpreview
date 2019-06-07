<?php defined('BASEPATH') or exit('No direct script access allowed');


if(!function_exists('get_Listado_Clientes')){
    function get_Listado_Clientes(){
        $ci = get_instance();
        $ci->db->select('id_cliente, nombres, dni');
        $query = $ci->db->get('md_clientes');
        return $query->result();
    }
}

if(!function_exists('get_Cliente_ID')){
    function get_cliente_id($id_cliente){
        $ci = get_instance();
        $ci->db->where('id_cliente', $id_cliente);
        $query = $ci->db->get('md_clientes');
        return $query->row();
    }
}