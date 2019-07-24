<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Script_model extends CI_Model
{

    public function findAll()
    {
        $query = $this->db->get('md_callcenter_scripts');
        return $query->result();
    }

    public function findID($id)
    {
        $this->db->where('id_script', $id);
        $query = $this->db->get('md_callcenter_scripts');
        $result = $query->row();

        return $result;
    }

    public function AddScript($param)
    {
        $this->db->insert('md_callcenter_scripts', $param);
        return $this->db->insert_id();
    }

    public function EditScript($id, $param)
    {
        $this->db->where('id_script', $id);
        $this->db->update('md_callcenter_scripts', $param);
    }

    public function get_script($id_script)
    {
        $this->db->where('id_script', $id_script);
        $query = $this->db->get('md_callcenter_scripts');
        return $query->row()->contenido_script;
    }

    public function DeleteScript($id_script)
    {
        $this->db->where('id_script', $id_script);
        $this->db->delete('md_callcenter_scripts');
    }
}

/* End of file Script_model.php */
