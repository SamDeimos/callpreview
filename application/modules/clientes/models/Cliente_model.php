<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_Model{

    function findAll(){
        $this->db->select('a.id_cliente, a.nombres, a.dni, a.email, a.tel, a.address, b.genero, c.estado', FALSE);
        $this->db->from('md_clientes a');
        $this->db->join('md_genero b', 'a.id_genero = b.id_genero', 'left');
        $this->db->join('md_statuscivil c', 'a.id_statuscivil = c.id_statuscivil', 'left');
        //Validacion de clientes activos
        $this->db->where('client', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function findDNI($clientdni){
        $this->db->select('*', FALSE);
        $this->db->from('md_cliente');
        $this->db->where('dni', $clientdni);
        $query = $this->db->get();
        return $query->row();
    }

    function findID($id){
        $this->db->select('*', FALSE);
        $this->db->from('md_clientes');
        $this->db->where('id_cliente', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function AddClient($param){
        $this->db->insert('md_clientes',$param);
        return $this->db->insert_id();
    }

    public function EditClient($param, $id){
        $this->db->where('id_cliente', $id);
        $this->db->update('md_clientes', $param);
    }

    public function DeleteClient($param){
        $this->db->where('id_cliente', $param['id_cliente']);
        $this->db->delete('md_cliente');
    }

    public function getClientDNI(){
        $this->db->select('id_cliente, nombres, dni');
        $query = $this->db->get('md_clientes');
        return $query->result();
    }

}

/* End of file .php */