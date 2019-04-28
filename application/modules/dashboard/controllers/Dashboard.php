<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public $data;
	public function __construct(){
		parent::__construct();
        $this->load->model('../modules/tools/models/Tools_model');

        //Variables indispensables
        $this->data['menu'] = $this->Tools_model->getMenu($this->session->userdata('idpermiso'));
	}

	public function index(){
        //Validación de inicio de session
        $this->Tools_model->validateLogin();

        //Carga de vistas
        $this->load->view('header', $this->data);
        $this->load->view('dashboard');
        $this->load->view('footer');
    }
    
}

/* End of file Dashboard.php */
