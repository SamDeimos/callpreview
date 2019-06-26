<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Call_model extends CI_Model
{
    public function get_call_attribute($id_call)
    {
        $this->db->where('id_call', $id_call);
        $query = $this->db->get('md_callcenter_call_attribute');
        return $query->row()->data_attribute;
    }

    public function get_id_call($id_call_registry)
    {
        $this->db->where('id_call_registry', $id_call_registry);
        $query = $this->db->get('md_callcenter_call_registry');
        return $query->row()->id_call;
    }

    public function get_call_status()
    {
        $query = $this->db->get('md_callcenter_call_status');
        return $query->result();
    }

    public function AddCall($param)
    {
        $this->db->insert('md_callcenter_calls', $param);
        return $this->db->insert_id();
    }

    public function AddCallAttribute($param)
    {
        $this->db->insert('md_callcenter_call_attribute', $param);
        return $this->db->insert_id();
    }

    public function update_call_status($id_call, $param)
    {
        $this->db->where('id_call', $id_call);
        $this->db->update('md_callcenter_calls', $param);
    }
}

/* End of file Call_model.php */
