<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public $data;
	public function __construct(){
		parent::__construct();
        $this->load->library('Menu');
        $this->load->library('ValidarLogin');

        //Variables indispensables
        $this->data['menu'] = $this->menu->getMenu($this->session->userdata('idpermiso'));
        $this->data['campaigns_activas'] = widget_cantidad_camp_activas($this->session->userdata('id_user'), $this->session->userdata('idpermiso'), 1);
        $this->data['call_por_realizar'] = widget_cantidad_calls($this->session->userdata('id_user'), $this->session->userdata('idpermiso'), 1);
        $this->data['call_realizadas'] = widget_cantidad_calls($this->session->userdata('id_user'), $this->session->userdata('idpermiso'));
        $this->data['historial'] = get_listado_registrys($this->session->userdata('id_user'), $this->session->userdata('idpermiso'));
	}

	public function index(){
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        //Carga de vistas
        $this->load->view('header', $this->data);
        $this->load->view('dashboard');
        $this->load->view('footer');
    }
    
}

/* End of file Dashboard.php */
