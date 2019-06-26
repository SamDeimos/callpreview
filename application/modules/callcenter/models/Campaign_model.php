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
        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file Campaign_model.php */