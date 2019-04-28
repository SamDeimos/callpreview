<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller{
	public $data;
	public function __construct(){
		parent::__construct();
        $this->load->model('Usuario_model');

        //Consulta modelo Usuario_model
        $this->data['permisos'] = $this->Usuario_model->getPermisos();
        $this->data['statuscivil'] = $this->Usuario_model->getStatuscivil();
        $this->data['callcenters'] = $this->Usuario_model->getCallcenters();
        $this->data['generos'] = $this->Usuario_model->getGeneros();
        $this->data['estadousers'] = $this->Usuario_model->getEstadousers();
        $this->data['usuarios'] = $this->Usuario_model->findAll();
        $this->data['user'] = $this->Usuario_model->findDNI($this->session->userdata('username'));
        $this->data['control'] = get_class($this);
	}

	public function index(){
        if ($this->session->userdata('username')) {

            //Vistas
            $this->load->view('menu_vertical', $this->data);
            $this->load->view('usuarios/usuarios');
            $this->load->view('modals/new/modal_new_user');
            $this->load->view('modals/edit/modal_edit_user');
            $this->load->view('modals/modal_delete');
            $this->load->view('footer');
        }else{
            redirect('Login');
        }
    }

	public function UserTable(){
	    echo json_encode($this->Usuario_model->findAll());
	}

	public function FindUser(){
	    $id = $this->input->post('id_user_edit');
        echo json_encode($this->Usuario_model->findID($id));
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
