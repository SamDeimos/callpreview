<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public $error;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->model('../modules/usuarios/models/Usuario_model');
        $this->load->library('recaptcha');
    }
    public function index()
    {
        if ($this->session->userdata('log_in') == TRUE) {
            redirect('dashboard');
        } else {
            if ($this->input->post()) {
                //Validacion de reCaptcah
                // Catch the user's answer
                $captcha_answer = $this->input->post('g-recaptcha-response');

                // Verify user's answer
                $response = $this->recaptcha->verifyResponse($captcha_answer);

                if (!empty($this->input->post('username', TRUE)) && !empty($this->input->post('password', TRUE)) && $response['success']) {
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
                                'lvlpermiso'    =>  $w->lvl_permiso,
                                'log_in'          =>  TRUE
                            );
                            $this->session->set_userdata($data_session);
                            redirect('dashboard');
                        } else {
                            redirect('login#mal');
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
