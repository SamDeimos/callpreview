<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {
    public $data;
	public function __construct(){
        parent::__construct();
        $this->load->model('Cliente_model');
        $this->load->library('Menu');
        $this->load->library('ValidarLogin');
        $this->load->library('AttributosPersona');

        //Variables indispensables
        $this->data['menu'] = $this->menu->getMenu($this->session->userdata('idpermiso'));
        $this->data['generos'] = $this->attributospersona->getGenero();
        $this->data['estadosciviles'] = $this->attributospersona->getEstadoCivil();
        $this->data['lvlformaciones'] = $this->attributospersona->getLvlFormacion();
        
        //Variables para modulo
        $this->data['clientes'] = $this->Cliente_model->findAll();

	}

	public function index(){
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        //Carga de vistas
        $this->load->view('header', $this->data);
        $this->load->view('clientes');
        $this->load->view('modals/modal_delete');
        $this->load->view('footer');
    }

    public function cliente($id_cliente = NULL){
        //Validación de inicio de session
        $this->validarlogin->validateLogin();
        
        /*
        / Condicionamos @id si es Nuevo cliente
        / o Editar cliente
        / @id_cliente int
        */ 
        if($id_cliente == NULL){
            $this->data['cliente'] = NULL;
        }else{
            $this->data['cliente'] = get_cliente_id($id_cliente);
        }

        //Cargamos las vitas del modulo Clinetes
        $this->load->view('header', $this->data);
        $this->load->view('formulario');
        $this->load->view('footer');

        //Validamos ingreso de datos po post
        if($this->input->post()){
             //Array
            $genero = $this->input->post('genero');

            //Variables a insertar
            $param['nombres'] = ucwords(mb_strtolower(trim($this->input->post('nombres')), 'UTF-8'));
            $param['dni'] = $this->input->post('cedula');
            $param['id_genero'] = array_sum($genero);
            $param['email'] = $this->input->post('email');
            $param['tel'] = $this->input->post('tel');
            $param['fec_nac'] = $this->input->post('fec_nac');
            $param['address'] = $this->input->post('address');
            $param['id_lvlformacion'] = $this->input->post('lvlformacion');
            $param['id_statuscivil'] = $this->input->post('estadocivil');
            $param['client'] = 1;

            if(empty($this->input->post('id_cliente'))){
                $cliente = $this->Cliente_model->findDNI($param['dni']);
                //Validamos que el cliente sea nuevo
                if(is_null($cliente)){
                    //Insertamos cliente nuevo
                    $id_cliente = $this->Cliente_model->AddClient($param);
                    redirect(base_url().'clientes/cliente/'.$id_cliente,'refresh');
                }else{
                    //Redireccionamos al cliente ya ingresado
                    redirect(base_url().'clientes/cliente/'.$cliente->id_cliente,'refresh');
                }
            }else{
                //Actualizamos cliente actual
                $id_cliente = $this->input->post('id_cliente');
                $this->Cliente_model->EditClient($param, $id_cliente);
                redirect(base_url().'clientes/cliente/'.$id_cliente,'refresh');
            }
        }
    }

    public function ClienteTable(){
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        echo json_encode((empty($this->data['clientes'])) ? NULL : $this->data['clientes']);
    }

    public function DeleteCliente(){
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        $id_cliente = $this->input->post('idDelete');
        if ($this->Cliente_model->DeleteClient($id_cliente)){
            echo 'error';
        }else{
            echo 'success';
        }

    }
    
}

/* End of file Clientes.php */