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
}

/* End of file ModelName.php */
