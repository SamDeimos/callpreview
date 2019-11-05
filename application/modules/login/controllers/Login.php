<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public $error;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->model('../modules/sistema/models/Usuario_model');
    }
    public function index()
    {
        if ($this->session->userdata('log_in') == TRUE) {
            redirect('dashboard');
        } else {
            if ($this->input->post()) {

                if ($this->input->post('username', TRUE) != '' && $this->input->post('password', TRUE) != '') {
                    if ($this->Login_model->Login($this->input->post('username', TRUE))) {
                        $result = $this->Login_model->Login($this->input->post('username', TRUE));
                        $pass_decode = $this->encrypt->decode($result->pass);
                        if ($this->input->post('password', TRUE) === $pass_decode) {
                            $w = $this->Usuario_model->findDNI($this->input->post('username', TRUE));
                            $data_session = array(
                                'id_user'       =>  $w->id_user,
                                'name'           =>  $w->nombres,
                                'perfil'         =>     $w->perfil,
                                'idpermiso'     =>     $w->id_permiso,
                                'log_in'          =>  TRUE
                            );
                            $this->session->set_userdata($data_session);
                            redirect('dashboard');
                        } else {
                            redirect('login');
                        }
                    };
                }
            }
        }

        //Cargar vista login
        $this->load->view('login');
    }

    public function Salir()
    {
        $this->session->sess_destroy();
        redirect('');
    }
}

/* End of file Login.php */
