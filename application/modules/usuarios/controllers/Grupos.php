<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Grupos extends CI_Controller {
    public $data;
	public function __construct(){
        parent::__construct();
        $this->load->model('Grupo_model');
        $this->load->library('Menu');
        $this->load->library('ValidarLogin');

        //Variables indispensables
        $this->data['menu'] = $this->menu->getMenu($this->session->userdata('idpermiso'));

        $this->data['grupos'] = $this->Grupo_model->findAll();
        $this->data['vendedores'] = get_listado_usuarios_idpermiso(2);
        $this->data['directores'] = get_listado_usuarios_idpermiso(3);

	}

	public function index(){
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        //Carga de vistas
        $this->load->view('header', $this->data);
        $this->load->view('grupos');
        $this->load->view('footer');
    }

    public function grupo($id = NULL){
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        /*
        / Condicionamos @id si es Nuevo usuario
        / o Editar usuario
        / @id int
        */ 
        if($id == NULL){
            $this->data['grupo'] = NULL;
        }else{
            $this->data['grupo'] = $this->Grupo_model->findID($id);
        }

        //Cargamos las vitas del modulo Clinetes
        $this->load->view('header', $this->data);
        $this->load->view('formulario_grupo');
        $this->load->view('footer');

        if($this->input->post()){
            //Variables a insertar
            $param['grupo'] = $this->input->post('nombre_g');
            $param['id_user'] = $this->input->post('own_g');
            $param['belong_user_grupo'] = json_encode($this->input->post('vendedor'));

            if(empty($this->input->post('id_grupo'))){
                //Insertamos grupo
                $id_grupo = $this->Grupo_model->AddGroup($param);
                redirect(base_url().'usuarios/grupos/grupo/'.$id_grupo,'refresh');
                echo "<script>console.log('Con data: ".json_encode($param)."')</script>";

            }else{
                //Actualizamos grupo actual
                $id_grupo = $this->input->post('id_grupo');
                $this->Grupo_model->EditGroup($param, $id_grupo);
                redirect(base_url().'usuarios/grupos/grupo/'.$id_grupo,'refresh');
                echo "<script>console.log('Con data: ".json_encode($param)."')</script>";
            }

        }
    }
}

/* End of file Grupos.php */