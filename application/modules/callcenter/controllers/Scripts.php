<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scripts extends CI_Controller
{
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Script_model');
        $this->load->library('Menu');
        $this->load->library('ValidarLogin');

        //Variables indispensables
        $this->data['menu'] = $this->menu->getMenu($this->session->userdata('idpermiso'));

        //Variables para modulo
        $this->data['scripts'] = $this->Script_model->findAll();

        //Validación de inicio de session
        $this->validarlogin->validateLogin();
    }

    public function index()
    {
        //Carga de vistas
        $this->load->view('header', $this->data);
        $this->load->view('script');
        $this->load->view('footer');
    }

    public function script($id = NULL)
    {
        /*
        / Condicionamos @id si es Nuevo usuario
        / o Editar usuario
        / @id int
        */
        if ($id == NULL) {
            $this->data['script'] = NULL;
        } else {
            $this->data['script'] = $this->Script_model->findID($id);
        }

        //Cargamos las vitas del modulo Clinetes
        $this->load->view('header', $this->data);
        $this->load->view('formulario_script');
        $this->load->view('footer');
    }

    public function AddScript()
    {
        if ($this->input->post()) {
            $param['script'] = $this->input->post('script');
            $param['contenido_script'] = $this->input->post('contenido_script');

            if ($this->input->post('id_script') == null) {
                $id_script = $this->Script_model->AddScript($param);
                echo base_url() . 'callcenter/scripts/script/' . $id_script;
            } else {
                $this->Script_model->EditScript($this->input->post('id_script'), $param);
            }
        }
    }
}

/* End of fils Script.php */
