<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller{
	public $data;
	public function __construct(){
		parent::__construct();
        $this->load->model('Usuario_model');
        $this->load->library('Menu');
        $this->load->library('ValidarLogin');
        $this->load->library('AttributosPersona');

        //Variables indispensables
        $this->data['menu'] = $this->menu->getMenu($this->session->userdata('idpermiso'));
        $this->data['generos'] = $this->attributospersona->getGenero();
        $this->data['estadosciviles'] = $this->attributospersona->getEstadoCivil();
        $this->data['lvlformaciones'] = $this->attributospersona->getLvlFormacion();
        $this->data['permisos'] = $this->attributospersona->getPermisos();
        $this->data['estadousers'] = $this->attributospersona->getEstadousers();

        //Variables para modulo
        $this->data['usuarios'] = $this->Usuario_model->findAll();
	}

	public function index(){
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        //Vistas
        $this->load->view('header', $this->data);
        $this->load->view('usuarios');
        $this->load->view('footer');
    }

    public function usuario($id = NULL){
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        /*
        / Condicionamos @id si es Nuevo usuario
        / o Editar usuario
        / @id int
        */ 
        if($id == NULL){
            $this->data['usuario'] = NULL;
        }else{
            $this->data['usuario'] = $this->Usuario_model->findID($id);
        }

        //Cargamos las vitas del modulo Clinetes
        $this->load->view('header', $this->data);
        $this->load->view('formulario_usuario');
        $this->load->view('footer');


        if($this->input->post()){
             //Array
            $genero = $this->input->post('genero');

            //Variables a insertar
            $param['nombres'] = ucwords(mb_strtolower(trim($this->input->post('nombre')), 'UTF-8'));
            $param['dni'] = $this->input->post('cedula');
            $param['id_genero'] = array_sum($genero);
            $param['pass'] = $this->encrypt->encode($this->input->post('pass'));
            $param['id_permiso'] = $this->input->post('permiso');
            $param['email'] = $this->input->post('email');
            $param['tel'] = $this->input->post('tel');
            $param['id_lvlformacion'] = $this->input->post('lvlformacion');
            $param['fec_nac'] = $this->input->post('fec_nac');
            $param['address'] = $this->input->post('address');
            $param['id_lvlformacion'] = $this->input->post('lvlformacion');
            $param['id_statuscivil'] = $this->input->post('estadocivil');

            if(!$this->input->post('id_usuario')){
                //Insertamos usuario nuevo
                $id_usuario = $this->Usuario_model->AddUser($param);
                redirect(base_url().'usuarios/usuario/'.$id_usuario,'refresh');
                //echo "<script>console.log('Con data: ".json_encode($param)."')</script>";
            }else{
                //Actualizamos usuario actual
                $id_usuario = $this->input->post('id_usuario');
                $this->Usuario_model->EditUser($param, $id_usuario);
                redirect(base_url().'usuarios/usuario/'.$id_usuario,'refresh');
                //echo "<script>console.log('Con data: ".json_encode($param)."')</script>";

            }
        }
    }
    
    public function UsuarioTable(){
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        echo json_encode((empty($this->data['usuarios'])) ? NULL : $this->data['usuarios']);
    }
}

/* End of file Usuarios.php */
