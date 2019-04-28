<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {
    public $data;
	public function __construct(){
        parent::__construct();
        $this->load->model('Cliente_model');
        $this->load->model('../modules/tools/models/Tools_model');

        //Variables indispensables
        $this->data['menu'] = $this->Tools_model->getMenu($this->session->userdata('idpermiso'));
	}

	public function index(){
        //Validación de inicio de session
        $this->Tools_model->validateLogin();

        //Carga de vistas
        $this->load->view('header', $this->data);
        $this->load->view('clientes');
        $this->load->view('footer');
    }

    //Infromacion de clientes
    public function ClientTable(){
        echo json_encode($this->Cliente_model->findAll());
    }
    
}

/* End of file Dashboard.php */