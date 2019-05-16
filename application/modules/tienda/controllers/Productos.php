<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {
    public $data;
    public function __construct(){
        parent::__construct();
        $this->load->model('Producto_model');
        $this->load->library('Menu');
        $this->load->library('ValidarLogin');

        //Variables indispensables
        $this->data['menu'] = $this->menu->getMenu($this->session->userdata('idpermiso'));

        //Variables para modulo
        $this->data['productos'] = $this->Producto_model->findAll();
    }
    

    public function index(){
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        $this->load->view('header', $this->data);
        $this->load->view('productos');
        $this->load->view('footer');
        
    }

    public function venta($id_producto = NULL){
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        /*
        / Condicionamos @id si es Nuevo producto
        / o Editar producto
        / @id_producto int
        */ 
        if($id_producto == NULL){
            $this->data['producto'] = NULL;
        }else{
            $this->data['producto'] = $this->Producto_model->findID($id_producto);
        }

        //Cargamos las vitas del modulo Clinetes
        $this->load->view('header', $this->data);
        $this->load->view('formulario');
        $this->load->view('footer');
    }

    public function ProductoTable(){
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        echo json_encode((empty($this->data['productos'])) ? NULL : $this->data['productos']);
    }

}

/* End of file Productos.php */
