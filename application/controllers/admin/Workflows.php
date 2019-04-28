<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Workflows extends CI_Controller {

    public function __construct(){

        parent::__construct();

        $this->load->model('Workflows/Workflow_model');

        $this->load->model('Tools_model');



        //Variables indispensables

        $this->data['menu'] = $this->Tools_model->getMenu($this->session->userdata('idpermiso'));

    }

    

    public function index(){

        //Validación de inicio de session

        $this->Tools_model->validateLogin();



        //Carga de vistas

        $this->load->view('header', $this->data);

        $this->load->view('workflows/workflows');

        $this->load->view('footer');   

    }



    public function workflow($getidWorkflow = null){

        $this->load->view('header', $this->data);

        if($getidWorkflow != ''){

            echo "<script>console.log('Con parametros: ".$getidWorkflow."')</script>";

        }else{

            $getidWorkflow = "nell pastel";

            echo "<script>console.log('sin parametros: ".$getidWorkflow."')</script>";

        }



        $this->load->view('historiasclinicas/form.php');

        $this->load->view('footer');

    }



    public function WorkflowTable(){

	    echo json_encode($this->Workflow_model->findAll());

	}



}



/* End of file Controllername.php */

