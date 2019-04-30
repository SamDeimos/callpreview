<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {
    public $data;
	public function __construct(){
        parent::__construct();
        $this->load->model('Cliente_model');
        $this->load->model('../modules/tools/models/Tools_model');
        $this->load->library('Attributes');

        //Variables indispensables
        $this->data['menu'] = $this->Tools_model->getMenu($this->session->userdata('idpermiso'));
        $this->data['clientes'] = $this->Cliente_model->findAll();
        $this->data['generos'] = $this->attributes->getGenero();

	}

	public function index(){
        //Validación de inicio de session
        $this->Tools_model->validateLogin();

        //Carga de vistas
        $this->load->view('header', $this->data);
        $this->load->view('clientes');
        $this->load->view('footer');
    }

    public function cliente($id = NULL){
        if($id == NULL){
            $this->data['cliente'] = NULL;
            $this->load->view('header', $this->data);
            $this->load->view('formulario');
            $this->load->view('footer');
        }else{
            $this->data['cliente'] = $this->Cliente_model->findID($id);
            $this->load->view('header', $this->data);
            $this->load->view('formulario');
            $this->load->view('footer');
        }
        if($this->input->post()){
            $data['nombre'] = $this->input->post('nombre');
            $data['dni'] = $this->input->post('cedula');
            $genero = $this->input->post('genero');
            $data['id_genero'] = array_sum($genero);

            echo "<script>console.log('Con data: ".json_encode($data)."')</script>";
        }else{
            echo "<script>console.log('Sin data: ')</script>";
        }

    }
    
}

/* End of file Clientes.php */