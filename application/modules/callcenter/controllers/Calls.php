<?php defined('BASEPATH') or exit('No direct script access allowed');

class Calls extends CI_Controller
{

    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Call_model');
        $this->load->library('Menu');
        $this->load->library('Asterisk');
        $this->load->library('ValidarLogin');

        //Variables indispensables
        $this->data['menu'] = $this->menu->getMenu($this->session->userdata('idpermiso'));

        //Variables de modulo
        $this->data['calls'] = get_listado_calls($this->session->userdata('id_user'), $this->session->userdata('idpermiso'));
        $this->data['registrys'] = get_listado_registrys($this->session->userdata('id_user'), $this->session->userdata('idpermiso'));
        $this->data['calls_status'] = $this->Call_model->get_call_status();
    }


    public function index()
    {
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        //Carga de vistas
        $this->load->view('header', $this->data);
        $this->load->view('calls');
        $this->load->view('modal/call_modal.php');
        $this->load->view('footer');
    }

    public function registry()
    {
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        //Carga de vistas
        $this->load->view('header', $this->data);
        $this->load->view('registry');
        $this->load->view('footer');
    }

    public function realizar_llamada_AMI()
    {
        if ($this->input->post()) {
            $result['id_registry'] = $this->asterisk->llamar_AMI($this->input->post('id_call'), $this->input->post('ext'), $this->input->post('tel'));
            $result['data_attribute'] = $this->Call_model->get_call_attribute($this->input->post('id_call'));
            echo json_encode($result);
        }
    }

    public function calificar_llamada()
    {
        if ($this->input->post()) {
            $id_call = $this->Call_model->get_id_call($this->input->post('id_registry'));
            $param['id_call_status'] = $this->input->post('id_call_status');
            $this->Call_model->update_call_status($id_call, $param);
        }
    }

    public function CallTable()
    {
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        echo json_encode((empty($this->data['calls'])) ? NULL : $this->data['calls']);
    }
}

/* End of file Calls.php */
