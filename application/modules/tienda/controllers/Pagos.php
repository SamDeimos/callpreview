<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pagos extends CI_Controller {
    public $data;
    public function __construct(){
        parent::__construct();
        $this->load->model('Venta_model');
        $this->load->library('Menu');
        $this->load->library('ValidarLogin');

        //Variables indispensables
        $this->data['menu'] = $this->menu->getMenu($this->session->userdata('idpermiso'));

        //Variables para modulo
        $this->data['ventas'] = $this->Pago_model->findAll();
    }
    

    public function index(){
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        $this->load->view('header', $this->data);
        $this->load->view('pagos');
        $this->load->view('footer');
        
    }
}

/* End of file Pagos.php */
