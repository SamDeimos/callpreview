<?php defined('BASEPATH') or exit('No direct script access allowed');

class Calls extends CI_Controller
{

    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Call_model');
        $this->load->model('Script_model');
        $this->load->library('Menu');
        $this->load->library('Asterisk');
        $this->load->library('ValidarLogin');

        //Variables indispensables
        $this->data['menu'] = $this->menu->getMenu($this->session->userdata('idpermiso'));

        //Variables de modulo
        $this->data['calls'] = get_listado_calls($this->session->userdata('id_user'), $this->session->userdata('idpermiso'));
        $this->data['registrys'] = get_listado_registrys($this->session->userdata('id_user'), $this->session->userdata('idpermiso'));
        $this->data['calls_status'] = $this->Call_model->get_call_status();
        $this->data['schedule'] = json_encode($this->Call_model->get_call_schedule());

        //Validación de inicio de session
        $this->validarlogin->validateLogin();
    }


    public function index()
    {
        //Carga de vistas
        $this->load->view('header', $this->data);
        $this->load->view('calls');
        $this->load->view('modal/call_modal.php');
        $this->load->view('modal/calendar_modal.php');
        $this->load->view('footer');
    }

    public function registry()
    {
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
            $result['form'] = constructor_formulario($this->input->post('id_form'), $result['id_registry']);
            $result['script'] = $this->Script_model->get_script($this->input->post('id_script'));
            echo json_encode($result);
        }
    }

    public function calificar_llamada()
    {
        if ($this->input->post()) {
            $id_call = $this->Call_model->get_id_call($this->input->post('id_registry'));
            $param['id_call_status'] = $this->input->post('id_call_status');

            //Actualizar registro en registro de llamada
            $this->Call_model->update_call_registry_status($this->input->post('id_registry'), $param);

            //Actualizar estado de llamada
            $this->Call_model->update_call_status($id_call, $param);
        }
    }

    public function registro_call()
    {
        //if($this->input->post()){
        $result['call_registry'] = $this->Call_model->get_call_registry($this->input->post('id_call'));
        echo json_encode($result);
        //}
    }

    public function guardar_data_form_recolected()
    {
        if ($this->input->post()) {
            $array_form_data_recolected = $this->input->post();
            unset($array_form_data_recolected['id_call_registry'], $array_form_data_recolected['id_form'], $array_form_data_recolected[0]);

            $param['id_call_registry'] = $this->input->post('id_call_registry');
            $param['id_form'] = $this->input->post('id_form');
            $param['data'] = json_encode($array_form_data_recolected, JSON_UNESCAPED_UNICODE);

            if ($this->Call_model->get_exist_id_call_registry($param['id_call_registry']) == NULL) {
                $id_form_data_recoelcted = $this->Call_model->add_form_data_recolected($param);
            } else {
                $this->Call_model->update_form_data_recolected($param['id_call_registry'], $param);
            };
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
