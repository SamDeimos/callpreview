<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->model('../modules/usuarios/models/Usuario_model');
	}
	public function index(){
        if($this->session->userdata('log_in') == TRUE){
            redirect('dashboard');
        }
	    if (isset($_POST['username']) && isset($_POST['password'])) {
            if ($this->Login_model->Login($_POST['username'])){
                $result = $this->Login_model->Login($_POST['username']);
                $pass_decode = $this->encrypt->decode($result->pass);
                if($_POST['password'] === $pass_decode){
                    $w = $this->Usuario_model->findDNI($_POST['username']);
                    $data_session = array (
                        'id_user'   	=>  $w->id_user,
                        'name'   	    =>  $w->nombres,
                        'perfil' 		=> 	$w->perfil,
                        'idpermiso' 	=> 	$w->id_permiso,
                        'lvlpermiso'    =>  $w->lvl_permiso,
                        'log_in'  		=>  TRUE
                    );
                    $this->session->set_userdata($data_session);
                    redirect('dashboard');
                }else{
                    redirect('login#mal');
                }
            };
	    }
		$this->load->view('login');
	}

	public function Salir(){
        	$this->session->sess_destroy();
        redirect('');
    }
}

/* End of file Login.php */
