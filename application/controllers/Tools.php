<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends CI_Controller {
    public function __construct(){
	parent::__construct();

	//Do your magic here
}
	public function index(){

	}

	public function VerifyDataDebounce(){
        $email = $this->input->post('email-validate');
        //$email = 'zam.2014.sg@gmail.com';
        $data = json_decode(file_get_contents('https://api.debounce.io/v1/?api=5c79aa418de51&email='.$email), true);
        echo json_encode($data);
    }

	public function VerifyDataSRI(){
        $dni = $this->input->post('dni-validate');
        //$dni = 1756666598;
        $data = file_get_contents('https://srienlinea.sri.gob.ec/sri-registro-civil-servicio-internet/rest/DatosRegistroCivil/obtenerDatosCompletosPorNumeroIdentificacion?numeroIdentificacion='.$dni);
        echo $data;
    }
}

/* End of file Tools.php */