<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_model extends CI_Model
{
    public function findAll()
    {
        $this->db->select('*', FALSE);
        $this->db->from('md_callcenter_forms a');
        $query = $this->db->get();
        return $query->result();
    }

    public function AddForm($param)
    {
        $this->db->insert('md_callcenter_forms', $param);
        return $this->db->insert_id();
    }

    public function AddFormFields($param)
    {
        $this->db->insert('md_callcenter_form_fields', $param);
        return $this->db->insert_id();
    }
}

/* End of file Campaign_model.php */
