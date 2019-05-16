<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {
    public $data;
    public function __construct(){
        parent::__construct();
        $this->load->model('Venta_model');
        $this->load->model('Producto_model');
        $this->load->library('Menu');
        $this->load->library('ValidarLogin');
        $this->load->library('AttributosPersona');

        //Variables indispensables
        $this->data['menu'] = $this->menu->getMenu($this->session->userdata('idpermiso'));
        $this->data['cedulas'] = $this->attributospersona->getClientDNI();

        //Variables para modulo
        $this->data['ventas'] = $this->Venta_model->findAll();
        $this->data['productos'] = $this->Producto_model->findAll();
        $this->data['status_ventas'] = $this->Producto_model->getStatusventas();
    }
    

    public function index(){
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        $this->load->view('header', $this->data);
        $this->load->view('ventas');
        $this->load->view('footer');
        
    }

    public function venta($id_venta = NULL){
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        /*
        / Condicionamos @id si es Nueva venta
        / o Editar venta
        / @id_venta int
        */ 
        if($id_venta == NULL){
            $this->data['venta'] = NULL;
        }else{
            $this->data['venta'] = $this->Venta_model->findID($id_venta);
        }

        //Cargamos las vitas del modulo Clinetes
        $this->load->view('header', $this->data);
        $this->load->view('formulario_venta');
        $this->load->view('footer');

        //Validamos ingreso de datos po post
        if($this->input->post()){

            //Variables a insertar
            $param['id_cliente'] = $this->input->post('id_cliente');
            $param['id_producto'] = $this->input->post('id_producto');
            $param['id_statusventa'] = $this->input->post('id_statusventa');

            if(empty($this->input->post('id_task'))){
                //Insertamos tarea nueva
                $id_venta = $this->Venta_model->AddVenta($param);
                redirect(base_url().'tienda/ventas/venta/'.$id_venta,'refresh');
 
                echo "<script>console.log('Con data:".json_encode($param)." ')</script>";
            }else{
                //Actualizamos task actual
                $id_task = $this->input->post('id_task');
                $this->Workflow_model->EditTask($param, $id_task);
                redirect(base_url().'workflows/workflow/'.$id_task,'refresh');
 
                echo "<script>console.log('Con data:".json_encode($param)." ')</script>";            
            }
        }        
    }

    public function VentaTable(){
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        echo json_encode((empty($this->data['ventas'])) ? NULL : $this->data['ventas']);
    }

}

/* End of file Ventas.php */
