<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AttributosPersona{
    protected $ci;

    function __construct(){
        $this->ci =& get_instance();
    }
     
    public function getGenero(){
        $query = $this->ci->db->get('md_genero');
        return $query->result();
    }
     
    public function getEstadoCivil(){
        $query = $this->ci->db->get('md_statuscivil');
        return $query->result();
    }

    public function getLvlFormacion(){
        $query = $this->ci->db->get('md_lvlformacion');
        return $query->result();
    }

    public function getPermisos(){
        $query = $this->ci->db->get('md_permisos');
        return $query->result();
    }
    
    public function getEstadousers(){
        $query = $this->ci->db->get('md_statususer');
        return $query->result();
    }
}

/* End of file AttributosPersona.php */
