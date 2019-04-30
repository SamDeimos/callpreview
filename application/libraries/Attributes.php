<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Attributes{
    protected $ci;

    function __construct(){
        $this->ci =& get_instance();
    }
     
    public function getGenero(){
        $query = $this->ci->db->get('md_genero');
        return $query->result();
    }
}

/* End of file Attributes.php */
