<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tools_model extends CI_Model {

	public function VerifyDataDebounce(){
        $email = $this->input->post('email-validate');
        $data = json_decode(file_get_contents('https://api.debounce.io/v1/?api=5c79aa418de51&email='.$email), true);
        echo json_encode($data);

    }

	public function VerifyDataSRI(){
        $dni = $this->input->post('dni-validate');
        $data = file_get_contents('https://srienlinea.sri.gob.ec/sri-registro-civil-servicio-internet/rest/DatosRegistroCivil/obtenerDatosCompletosPorNumeroIdentificacion?numeroIdentificacion='.$dni);
        echo $data;
    }

    public function getMenu($permiso){
        $this->db->like('id_permiso', $permiso);
        $query = $this->db->get('md_menu');
        return $query->result();
    }

    public function validateLogin(){
        if($this->session->userdata('log_in') != TRUE){
            redirect('');
        }
    }

}



/* End of file Tools.php */