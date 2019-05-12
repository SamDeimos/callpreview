<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menu{
    protected $ci;

    function __construct(){
        $this->ci =& get_instance();
    }

    public function getMenu($permiso){
        $this->ci->db->like('id_permiso', $permiso);
        $query = $this->ci->db->get('md_menu');
        return $query->result();
    }
}

/* End of file Menu.php */