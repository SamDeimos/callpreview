<?php defined('BASEPATH') or exit('No direct script access allowed');

class Forms extends CI_Controller
{

    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Form_model');
        $this->load->library('Menu');
        $this->load->library('ValidarLogin');

        //Variables indispensables
        $this->data['menu'] = $this->menu->getMenu($this->session->userdata('idpermiso'));
        $this->data['vendedores'] = get_listado_usuarios_idpermiso(2);
        $this->data['forms'] = $this->Form_model->findAll();
    }


    public function index()
    {
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        //Carga de vistas
        $this->load->view('header', $this->data);
        $this->load->view('forms');
        $this->load->view('footer');
    }

    public function form()
    {
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        //Carga de vistas
        $this->load->view('header', $this->data);
        $this->load->view('formulario_form');
        $this->load->view('footer');
    }

    public function AddForm()
    {
        $param_form['form'] = $this->input->post('campaign');
        $param_form['id_form_status'] = $this->input->post('id_form_status');

        $id_form = $this->Form_model->AddForm($param_form);

        $arrayNombrecampo = $this->input->post('label');
        $arrayId_form_type = $this->input->post('id_form_type');
        $arrayValues_camp = $this->input->post('values_camp');

        foreach ($arrayNombrecampo as $key => $nombre_campo) {
            $param_form_fields['id_form'] = $id_form;
            $param_form_fields['label'] = $nombre_campo;
            $param_form_fields['value'] = json_encode(explode(',', $arrayValues_camp[$key]));
            $param_form_fields['type'] = $arrayId_form_type[$key];

            $this->Form_model->AddFormFields($param_form_fields);
        }

        redirect(base_url() . 'callcenter/forms', 'refresh');
    }
}

/* End of file Forms.php */
