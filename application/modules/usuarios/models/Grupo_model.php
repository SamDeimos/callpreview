<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grupo_model extends CI_Model
{
    public function findAll()
    {
        $this->db->select('id_grupo, grupo, a.id_user, nombres, belong_user_grupo', FALSE);
        $this->db->from('md_grupos a');
        $this->db->join('md_user b', 'b.id_user = a.id_user', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    function findID($id)
    {
        $this->db->where('id_grupo', $id);
        $query = $this->db->get('md_grupos');
        $result = $query->row();

        return $result;
    }

    public function AddGroup($param)
    {
        $this->db->insert('md_grupos', $param);
        return $this->db->insert_id();
    }

    public function EditGroup($param, $id)
    {
        $this->db->where('id_grupo', $id);
        $this->db->update('md_grupos', $param);
    }

    public function DeleteGrupo($id_grupo)
    {
        $this->db->where('id_grupo', $id_grupo);
        $this->db->delete('md_grupos');
    }
}
