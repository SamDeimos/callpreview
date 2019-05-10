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
        $this->db->where('dni', $clientdni);
        $query = $this->db->get('md_cliente');
        return $query->row();
    }

    function findID($id_cliente){
        $this->db->where('id_cliente', $id_cliente);
        $query = $this->db->get('md_clientes');
        return $query->row();
    }

    public function AddClient($param){
        $this->db->insert('md_clientes',$param);
        return $this->db->insert_id();
    }

    public function EditClient($param, $id_cliente){
        $this->db->where('id_cliente', $id_cliente);
        $this->db->update('md_clientes', $param);
    }

    public function DeleteClient($id_cliente){
        $this->db->where('id_cliente', $id_cliente);
        $this->db->delete('md_clientes');
    }

    public function getClientDNI(){
        $this->db->select('id_cliente, nombres, dni');
        $query = $this->db->get('md_clientes');
        return $query->result();
    }

}

/* End of file .php */