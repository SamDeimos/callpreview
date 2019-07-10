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

    public function findID($id)
    {
        $this->db->where('id_form', $id);
        $query = $this->db->get('md_callcenter_forms');
        $result = $query->row();

        return $result;
    }

    public function find_fileds_ID($id)
    {
        $this->db->where('id_form', $id);
        $query = $this->db->get('md_callcenter_form_fields');
        $result = $query->result();

        return $result;
    }

    public function AddForm($param)
    {
        $this->db->insert('md_callcenter_forms', $param);
        return $this->db->insert_id();
    }

    public function EditForm($id, $param)
    {
        $this->db->where('id_form', $id);
        $this->db->update('md_callcenter_forms', $param);
    }

    public function AddFormFields($param)
    {
        $this->db->insert('md_callcenter_form_fields', $param);
        return $this->db->insert_id();
    }

    public function DeleteFormFields($id)
    {
        $this->db->where('id_form', $id);
        $this->db->delete('md_callcenter_form_fields');
    }
}

/* End of file Campaign_model.php */
