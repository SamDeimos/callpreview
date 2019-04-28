<?php defined('BASEPATH') OR exit('No direct script access allowed');

class historiasclinicas extends CI_Controller {
    public $data;
    public function __construct(){
        parent::__construct();
        $this->load->model('Tools_model');

        //Variables indispensables
        $this->data['menu'] = $this->Tools_model->getMenu($this->session->userdata('idpermiso'));

        //Get datos 
        $this->data['permisos'] = $this->Tools_model->getPermisos();
        $this->data['generos'] = $this->Tools_model->getGeneros();
        $this->data['statusvivil'] = $this->Tools_model->getStatuscivil();
        $this->data['lvlsformacion'] = $this->Tools_model->getLvlformacion();

    }
    
    public function index(){
        $this->load->view('header', $this->data);
        $this->load->view('historiasclinicas/historiasclinicas.php');
        $this->load->view('footer');
        
    }

    public function historia($getidHistoria = null){
        $this->load->view('header', $this->data);
        if($getidHistoria != ''){
            echo "<script>console.log('Con parametros: ".$getidHistoria."')</script>";
        }else{
            $getidHistoria = "nell pastel";
            echo "<script>console.log('sin parametros: ".$getidHistoria."')</script>";
        }

        $this->load->view('historiasclinicas/form.php');
        $this->load->view('footer');
    }

}

/* End of file historiasclinicas.php */

