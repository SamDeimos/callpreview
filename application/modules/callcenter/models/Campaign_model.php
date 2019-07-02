<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Campaign_model extends CI_Model
{ 
    public function AddCampaign($param)
    {
        $this->db->insert('md_callcenter_campaigns', $param);
        return $this->db->insert_id();
    }

    public function findAll(){
        $this->db->select('*', FALSE);
        $this->db->from('md_callcenter_campaigns a');
        $this->db->join('md_callcenter_campaign_status b', 'a.id_campaign_status = b.id_campaign_status', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function update_campaign_status($id_campaign, $param)
    {
        $this->db->where('id_campaign', $id_campaign);
        $this->db->update('md_callcenter_campaigns', $param);
    }

    public function data_export_registro_llamada($id_campaign){
        $this->db->simple_query('SET NAMES \'latin1\'');
        $this->db->where('id_campaign', $id_campaign);
        $query = $this->db->get('registro_llamadas');
        return $query->result();
    }
}

/* End of file Campaign_model.php */