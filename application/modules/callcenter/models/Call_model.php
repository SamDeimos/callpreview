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
        $this->db->where('id_call_status !=', 1);
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

    public function update_call_registry_status($id_call_registry, $param)
    {
        $this->db->where('id_call_registry', $id_call_registry);
        $this->db->update('md_callcenter_call_registry', $param);
    }

    /**
     * CRUD de registros de llamada
     */
    public function get_exist_id_call_registry($id_call_registry)
    {
        $this->db->where('id_call_registry', $id_call_registry);
        $query = $this->db->get('md_callcenter_form_data_recolected');
        return $query->row();
    }

    public function get_call_registry($id_call)
    {
        $this->db->select('a.id_call_registry, a.id_call, a.id_call_status, a.dst, a.calldate as reg_calldate, d.campaign, b.id_user, b.phones, b.nombres, c.calldate as cdr_calldate, c.billsec, c.disposition, e.data, f.estado', FALSE);
        $this->db->from('md_callcenter_call_registry a');
        $this->db->join('md_callcenter_calls b', 'a.id_call = b.id_call', 'left');
        $this->db->join('asteriskcdrdb.cdr c', 'a.uniqueid = c.uniqueid', 'left');
        $this->db->join('md_callcenter_campaigns d', 'b.id_campaign = d.id_campaign', 'left');
        $this->db->join('md_callcenter_form_data_recolected e', 'a.id_call_registry = e.id_call_registry', 'left');
        $this->db->join('md_callcenter_call_status f', 'a.id_call_status = f.id_call_status', 'left');
        $this->db->where('a.id_call', $id_call);
        $this->db->order_by('a.id_call_registry', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * CRDU para data recoelcted
     * 
     */
    public function add_form_data_recolected($param)
    {
        $this->db->insert('md_callcenter_form_data_recolected', $param);
        return $this->db->insert_id();
    }

    public function update_form_data_recolected($id_call_registry, $param)
    {
        $this->db->where('id_call_registry', $id_call_registry);
        $this->db->update('md_callcenter_form_data_recolected', $param);
    }

    /**
     * 
     */
    public function get_call_schedule()
    {
        $this->db->select('a.id_Call as id, b.nombres as title, a.fecha as start', FALSE);
        $this->db->from('md_callcenter_schedule a');
        $this->db->join('md_callcenter_calls b', 'a.id_call = b.id_call', 'left');
        $query = $this->db->get('');
        return $query->result();
    }
}

/* End of file Call_model.php */
