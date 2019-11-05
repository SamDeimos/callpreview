<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        //Do your magic here
    }

    function findDNI($username)
    {
        $this->db->select('a.id_user, a.nombres, a.dni, a.id_permiso, b.perfil', FALSE);
        $this->db->from('md_user a');
        $this->db->join('md_permisos b', 'a.id_permiso = b.id_permiso', 'left');
        $this->db->where('dni', $username);
        $query = $this->db->get();
        return $query->row();
    }

    function findID($id)
    {
        $this->db->where('id_user', $id);
        $query = $this->db->get('md_user');
        $result = $query->row();

        //Decode Password and remplace
        $pass_encode = $result->pass;
        $pass_decode = $this->encrypt->decode($pass_encode);
        $result->pass = $pass_decode;

        return $result;
    }

    function findAll()
    {
        $this->db->select('a.id_user, a.nombres, a.dni, a.id_permiso, a.email, a.tel, a.address, b.perfil, c.estado, d.genero, e.estado as estadouser', FALSE);
        $this->db->from('md_user a');
        $this->db->join('md_permisos b', 'a.id_permiso = b.id_permiso', 'left');
        $this->db->join('md_statuscivil c', 'a.id_statuscivil = c.id_statuscivil', 'left');
        $this->db->join('md_genero d', 'a.id_genero = d.id_genero', 'left');
        $this->db->join('md_statususer e', 'a.id_statususer = e.id_statususer', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function AddUser($param)
    {
        $this->db->insert('md_user', $param);
        return $this->db->insert_id();
    }

    public function EditUser($param, $id)
    {
        $this->db->where('id_user', $id);
        $this->db->update('md_user', $param);
    }

    public function DeleteUsuario($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('md_user');
    }

    public function getStatuscivil()
    {
        $this->db->select();
        $this->db->from('md_statuscivil');
        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file Usuario_model.php */
