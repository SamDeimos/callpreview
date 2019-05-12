<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ValidarLogin{
    protected $ci;

    function __construct(){
        $this->ci =& get_instance();
    }

    public function validateLogin(){
        if($this->ci->session->userdata('log_in' != TRUE)){
            $this->ci->session->sess_destroy();
            redirect('Login');
        }
    }
}
