<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller{
	public $data;
	public function __construct(){
		parent::__construct();
        $this->load->model('Usuario_model');
        $this->load->model('../modules/tools/models/Tools_model');
        $this->load->library('AttributesPersona');

        //Variables indispensables
        $this->data['menu'] = $this->Tools_model->getMenu($this->session->userdata('idpermiso'));
        $this->data['generos'] = $this->attributespersona->getGenero();
        $this->data['estadosciviles'] = $this->attributespersona->getEstadoCivil();
        $this->data['lvlformaciones'] = $this->attributespersona->getLvlFormacion();
        $this->data['permisos'] = $this->attributespersona->getPermisos();
        $this->data['estadousers'] = $this->attributespersona->getEstadousers();

        //Variables para modulo
        $this->data['usuarios'] = $this->Usuario_model->findAll();
	}

	public function index(){
        //Validación de inicio de session
        $this->Tools_model->validateLogin();

        //Vistas
        $this->load->view('header', $this->data);
        $this->load->view('usuarios');
        $this->load->view('footer');
    }

    public function usuario($id = NULL){
        if($id == NULL){
            $this->data['cliente'] = NULL;
            $this->load->view('header', $this->data);
            $this->load->view('formulario');
            $this->load->view('footer');
        }else{
            $this->data['cliente'] = $this->Cliente_model->findID($id);
            $this->load->view('header', $this->data);
            $this->load->view('formulario');
            $this->load->view('footer');
        }
        if($this->input->post()){
             //Array
            $genero = $this->input->post('genero');

            //Variables a insertar
            $param['nombres'] = ucwords(mb_strtolower(trim($this->input->post('nombre')), 'UTF-8'));
            $param['dni'] = $this->input->post('cedula');
            $param['pass'] = $this->encrypt->encode($this->input->post('pass'));
            $param['id_genero'] = array_sum($genero);
            $param['email'] = $this->input->post('email');
            $param['tel'] = $this->input->post('tel');
            $param['fec_nac'] = $this->input->post('fec_nac');
            $param['address'] = $this->input->post('address');
            $param['id_lvlformacion'] = $this->input->post('lvlformacion');
            $param['id_statuscivil'] = $this->input->post('estadocivil');
            $param['id_permiso'] = $this->input->post('permiso');

            if(empty($this->input->post('id_cliente'))){
                //Insertamos cliente nuevo
                //$id_cliente = $this->Cliente_model->AddClient($param);
                //redirect(base_url().'clientes/cliente/'.$id_cliente,'refresh');
                echo "<script>console.log('Con data: ".json_encode($param)."')</script>";
            }else{
                //Actualizamos cliente actual
                $id_cliente = $this->input->post('id_cliente');
                //$this->Cliente_model->EditClient($param, $id_cliente);
                //redirect(base_url().'clientes/cliente/'.$id_cliente,'refresh');
                echo "<script>console.log('Con data: ".$param."')</script>";


            }

        }else{
            echo "<script>console.log('Sin data: ')</script>";
        }
    }

    public function AddUser(){
		//Info Login
		$param['dni'] = $this->input->post('usCedula');
		$param['nombre'] = ucwords(mb_strtolower(trim($this->input->post('usNombre')), 'UTF-8'));
		$param['apellido'] = ucwords(mb_strtolower(trim($this->input->post('usApellido')), 'UTF-8'));
		$param['pass'] = $this->encrypt->encode($this->input->post('usPass'));

		//Info Callcenter
		$param['id_callcenter'] = $this->input->post('usCall');
		$param['num_agent'] = $this->input->post('usAgent');
		$param['meta'] = $this->input->post('usMeta');

		//Info Contacto
		$now = date('Y-m-d H:i:s');
		$param['id_permisos'] = ($this->input->post('usPermisos'));
		$param['email'] = strtolower($this->input->post('usEmail'));
		$param['fec_ingreso'] = ($now);

		//Info Extra
		$param['tel'] = ($this->input->post('usTel'));
        $param['address'] = ($this->input->post('usAddress'));
		$statuscivil = ($this->input->post('usStatuscivil'));
		$param['id_statuscivil'] = array_sum($statuscivil);
		$genero = ($this->input->post('usGenero'));
		$param['id_genero'] = array_sum($genero);
		$statususer = ($this->input->post('usEstadouser'));
		$param['id_statususer'] = array_sum($statususer);


		if($this->Usuario_model->findDNI($param['dni'])){
			echo "este usuario ya esta en el sistema";
		}else {
			if($this->Usuario_model->AddUser($param)){
				echo 'error';
			}else{
				echo 'success';
			}
		}
    }

    public function EditUser(){
		//Info Login
		$param['dni'] = $this->input->post('usCedulaedit');
		$param['nombre'] = ucwords(mb_strtolower(trim($this->input->post('usNombreedit')), 'UTF-8'));
		$param['apellido'] = ucwords(mb_strtolower(trim($this->input->post('usApellidoedit')), 'UTF-8'));
		$param['pass'] = $this->encrypt->encode($this->input->post('usPassedit'));

		//Info Callcenter
		$param['id_callcenter'] = $this->input->post('usCalledit');
		if($this->input->post('usAgentedit') == '0' || $this->input->post('usAgentedit') == ''){
            $param['num_agent'] = NULL;
        }else{
            $param['num_agent'] = $this->input->post('usAgentedit');
        }
        if($this->input->post('usMetaedit') == '0' || $this->input->post('usMetaedit') == ''){
            $param['meta'] = NULL;
        }else{
            $param['meta'] = $this->input->post('usMetaedit');
        }

		//Info Contacto
		$param['id_permisos'] = ($this->input->post('usPermisosedit'));
		$param['email'] = strtolower($this->input->post('usEmailedit'));
		$param['tel'] = ($this->input->post('usTeledit'));

		//Info Extra
        $param['address'] = ($this->input->post('usAddressedit'));
		$statuscivil = ($this->input->post('usStatusciviledit'));
		$param['id_statuscivil'] = array_sum($statuscivil);
		$genero = ($this->input->post('usGeneroedit'));
		$param['id_genero'] = array_sum($genero);
		$statususer = ($this->input->post('usEstadouseredit'));
		$param['id_statususer'] = array_sum($statususer);

        //echo json_encode($param);
		if($this->Usuario_model->findDNI($param['dni'])){
            if($this->Usuario_model->EditUser($param)){
                echo 'error';
            }else{
                echo 'success';
            }
		}else {
			echo 'Este usuario no existe en el sistema';
		}
    }

    public function DeleteUser(){
		$param['id_user'] = $this->input->post('idDelete');
		if($this->Usuario_model->DeleteUser($param)){
			echo 'error';
		}else{
			echo 'success';
		}
	}
}

/* End of file Usuarios.php */
