<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{
	public $table = "md_user";
	public $table_id = "id_user";
	public function __construct(){
		parent::__construct();

		//Do your magic here
	}

	function findDNI($username){
		$this->db->select('a.id_user, a.nombres, a.dni, a.id_permiso, b.perfil, b.lvl_permiso', FALSE);
		$this->db->from('md_user a');
		$this->db->join('md_permisos b', 'a.id_permiso = b.id_permiso', 'left');
		$this->db->where('dni', $username);
		$query = $this->db->get();
		return $query->row();
	}

    function findID($id){
        $this->db->select('*', FALSE);
        $this->db->from('md_user a');
        $this->db->join('md_permisos b', 'a.id_permisos = b.id_permisos', 'left');
        $this->db->where('id_user', $id);
        $query = $this->db->get();
        $result = $query->row();

        //Decode Password and remplace
        $pass_encode = $result->pass;
        $pass_decode = $this->encrypt->decode($pass_encode);
        $result->pass = $pass_decode;

        return $result;

    }

	function findAll(){
		$this->db->select('a.id_user, a.nombre, a.apellido, a.dni, a.id_permiso, a.email, a.tel, a.address, b.perfil, b.lvl_permiso, c.estado, d.genero, e.estado as estadouser', FALSE);
		$this->db->from('md_user a');
		$this->db->join('md_permisos b', 'a.id_permisos = b.id_permiso', 'left');
		$this->db->join('md_statuscivil c', 'a.id_statuscivil = d.id_statuscivil', 'left');
		$this->db->join('md_genero d', 'a.id_genero = e.id_genero', 'left');
		$this->db->join('md_statususer e', 'a.id_statususer = f.id_statususer', 'left');
		$query = $this->db->get();
		return $query->result();
	}
	function count_user(){
		return $this->db->count_all_results('md_user');
	}

    public function AddUser($param){
	    $this->db->insert('md_user',$param);
    }

    public function EditUser($param){
	    $this->db->where('dni', $param['dni']);
        $this->db->update('md_user', $param);
    }

    public function DeleteUser($param){
		$this->db->where('id_user', $param['id_user']);
		$this->db->delete('md_user');
    }

    public function getPermisos(){
        $this->db->select();
        $this->db->from('md_permisos');
        $query = $this->db->get();
        return $query->result();
    }

    public function getStatuscivil(){
        $this->db->select();
        $this->db->from('md_statuscivil');
        $query = $this->db->get();
        return $query->result();
    }

    public function getCallcenters(){
        $this->db->select();
        $this->db->from('md_callcenter');
        $query = $this->db->get();
        return $query->result();
    }

    public function getGeneros(){
        $this->db->select();
        $this->db->from('md_genero');
        $query = $this->db->get();
        return $query->result();
    }

    public function getLvlformacion(){
        $this->db->select();
        $this->db->from('md_lvlformacion');
        $query = $this->db->get();
        return $query->result();
    }

    public function getEstadousers(){
        $this->db->select();
        $this->db->from('md_statususer');
        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file .php */
