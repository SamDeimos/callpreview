<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Workflow_model extends CI_Model {

    public function findALL(){
        $this->db->select('a.id_task, a.id_cliente, b.nombres, c.estado, a.fecha_create', FALSE);
        $this->db->from('md_tasks a');
        $this->db->join('md_clientes b' , 'a.id_cliente = b.id_cliente', 'left');
        $this->db->join('md_statustasks c' , 'a.id_statustask = c.id_statustask', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function findID($id_task){
        $this->db->select('a.id_task, a.id_cliente, b.dni, a.id_statustask, a.fecha_create', FALSE);
        $this->db->from('md_tasks a');
        $this->db->join('md_clientes b', 'a.id_cliente = b.id_cliente', 'left');
        $this->db->where('a.id_task', $id_task);
        $query = $this->db->get();
        return $query->row();
    }

    public function AddTask($param){
        $this->db->insert('md_tasks',$param);
        return $this->db->insert_id();
    }

    public function getStatustasks(){
        $query = $this->db->get('md_statustasks');
        return $query->result();
    }

    public function getTypetasks(){
        $query = $this->db->get('md_typetasks');
        return $query->result();
    }
}

/* End of file ModelName.php */
