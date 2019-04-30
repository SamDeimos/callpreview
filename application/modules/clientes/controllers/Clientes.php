<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {
    public $data;
	public function __construct(){
        parent::__construct();
        $this->load->model('Cliente_model');
        $this->load->model('../modules/tools/models/Tools_model');
        $this->load->library('AttributesPersona');

        //Variables indispensables
        $this->data['menu'] = $this->Tools_model->getMenu($this->session->userdata('idpermiso'));
        $this->data['generos'] = $this->attributespersona->getGenero();
        $this->data['estadosciviles'] = $this->attributespersona->getEstadoCivil();
        $this->data['lvlformaciones'] = $this->attributespersona->getLvlFormacion();

        //Variables para modulo
        $this->data['clientes'] = $this->Cliente_model->findAll();

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
             //Array
            $genero = $this->input->post('genero');

            //Variables a insertar
            $param['nombres'] = ucwords(mb_strtolower(trim($this->input->post('nombre')), 'UTF-8'));
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
                //Insertamos cliente nuevo
                $id_cliente = $this->Cliente_model->AddClient($param);
                redirect(base_url().'clientes/cliente/'.$id_cliente,'refresh');
            }else{
                //Actualizamos cliente actual
                $id_cliente = $this->input->post('id_cliente');
                $this->Cliente_model->EditClient($param, $id_cliente);
                redirect(base_url().'clientes/cliente/'.$id_cliente,'refresh');
            }

        }else{
            echo "<script>console.log('Sin data: ')</script>";
        }

    }
    
}

/* End of file Clientes.php */