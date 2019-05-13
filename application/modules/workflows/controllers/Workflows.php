<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Workflows extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Workflow_model');
        $this->load->library('Menu');
        $this->load->library('ValidarLogin');
        $this->load->library('AttributosPersona');

        //Variables indispensables
        $this->data['menu'] = $this->menu->getMenu($this->session->userdata('idpermiso'));
        $this->data['cedulas'] = $this->attributospersona->getClientDNI();

        //Variables para modulo
        $this->data['tareas'] = $this->Workflow_model->findALL();
        $this->data['status_tasks'] = $this->Workflow_model->getStatustasks($this->session->userdata('idpermiso'));
        $this->data['type_tasks'] = $this->Workflow_model->getTypetasks();

    }

    public function index(){
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        //Carga de vistas
        $this->load->view('header', $this->data);
        $this->load->view('workflows');
        $this->load->view('footer');   

    }

    public function workflow($id = null){
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        /*
        / Condicionamos @id si es Nuevo cliente
        / o Editar cliente
        / @id int
        */ 
        if($id == NULL){
            $this->data['tarea'] = NULL;
        }else{
            $this->data['tarea'] = $this->Workflow_model->findID($id);
        }

        //Cargamos las vitas del modulo Clinetes
        $this->load->view('header', $this->data);
        $this->load->view('formulario');
        $this->load->view('footer');

        //Validamos ingreso de datos po post
        if($this->input->post()){
           //Variables a insertar
           //$param['id_task'] = $this->input->post('id_task');
           $param['id_user'] = $this->session->userdata('id_user');
           $param['id_cliente'] = $this->input->post('id_cliente');
           $param['id_statustask'] = $this->input->post('id_statustask');
           $param['id_typetask'] = $this->input->post('id_typetask');

           if(empty($this->input->post('id_task'))){
               //Insertamos tarea nueva
               $id_task = $this->Workflow_model->AddTask($param);
               redirect(base_url().'workflows/workflow/'.$id_task,'refresh');

               echo "<script>console.log('Con data:".json_encode($param)." ')</script>";
           }else{
               //Actualizamos task actual
               $id_task = $this->input->post('id_task');
               $this->Workflow_model->EditTask($param, $id_task);
               redirect(base_url().'workflows/workflow/'.$id_task,'refresh');

               echo "<script>console.log('Con data:".json_encode($param)." ')</script>";            
           }

       }else{
           echo "<script>console.log('Sin data: ')</script>";
       }
    }

    public function taskboard(){
        $this->load->view('header', $this->data);
        $this->load->view('taskboard');
        $this->load->view('footer');

    }

    public function WorkflowTable(){
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

	    echo json_encode((empty($this->data['tareas'])) ? NULL : $this->data['tareas']);
	}
}



/* End of file Controllername.php */

