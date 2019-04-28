<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Callcenter extends CI_Controller {
    public $data;
	function __construct(){
		parent::__construct();
		$this->load->model('Users/Usuario_model');
		$this->load->model('Callcenter/Dami_model');
        $this->load->model('Clients/Cliente_model');

        //Consulta modelo Usuario_model
        $this->data['permisos'] = $this->Usuario_model->getPermisos();
        $this->data['statuscivil'] = $this->Usuario_model->getStatuscivil();
        $this->data['generos'] = $this->Usuario_model->getGeneros();
        $this->data['productos'] = $this->Dami_model->getProducts();
        $this->data['lvlsformacion'] = $this->Usuario_model->getLvlformacion();
        $this->data['user'] = $this->Usuario_model->findDNI($this->session->userdata('username'));
        $this->data['id_user'] = $this->session->userdata('id_user');
        $this->data['perfil'] = $this->session->userdata('perfil');
        $this->data['callcenter'] = $this->session->userdata('id_callcenter');
        $this->data['control'] = get_class($this);
	}

	public function index(){
        if (isset($this->session->log_in)) {
            switch ($this->session->lvlpermiso) {
                case 9:
                    redirect('Callcenter/Admin');
                    break;
                case 4:
                    redirect('Callcenter/Director');
                    break;
                case 2:
                    redirect('Callcenter/Agente');
                    break;
                default:
                    redirect('Callcenter/Admin');
                    break;
            }
        } else {
            redirect('Login');
        }
    }

    public function DAMI($id_dami){
	    if(!empty($id_dami)){
            $datawf = $this->Dami_model->findDAMIWF($id_dami);
            $datadami = $this->Dami_model->findDami($id_dami);

            $data['damiwf'] = $datawf;
            $data['datadami'] = $datadami;
            $data['id_dami'] = $id_dami;

            $this->load->view('menu_vertical',$this->data);
            $this->load->view('sam_test', $data);
            $this->load->view('footer'); // solo cargaremos la vista
        }else{
	        redirect('Callcenter');
        }
    }

    public function findDAMI($id){
	    $result = $this->Dami_model->findDami($id);
	    echo json_encode($result);
    }

    public function DamiTable(){
	    switch ($this->data['perfil']){
            case 'Administrador':
                $do['perfil'] = $this->data['perfil'];
                echo json_encode($this->Dami_model->findAll($do));
                break;
            case 'Agente':
                $do['perfil'] = $this->data['perfil'];
                $do['id_user'] = $this->data['id_user'];
                echo json_encode($this->Dami_model->findAll($do));
                break;
            case 'Director':
                $do['perfil'] = $this->data['perfil'];
                $do['id_callcenter'] = $this->data['callcenter'];
                echo json_encode($this->Dami_model->findAll($do));
                break;
            default:
                $result['estatus'] = 'error';
                echo json_encode($result);
        }
    }

    public function AddDami(){
        //Info Añadir CLiente
        $now = date('Y-m-d H:i:s');
        $id_cliente = $this->input->post('clIdedit');
        $id_dami = $this->input->post('clIddami');
        $paramclient['nombres'] = ucwords(mb_strtolower(trim($this->input->post('clNombres')),'UTF-8'));
        $paramclient['dni'] = $this->input->post('clCedula');
        $paramclient['email'] = $this->input->post('clEmail');
        $paramclient['tel'] = $this->input->post('clTel');
        $paramclient['fec_nac'] = $this->input->post('clFecNac');
        $paramclient['id_lvlformacion'] = $this->input->post('clLvlform');
        $paramclient['address'] = $this->input->post('clAddress');
        $genero = ($this->input->post('clGenero'));
        $paramclient['id_genero'] = array_sum($genero);
        $statuscivil = ($this->input->post('clStatuscivil'));
        $paramclient['id_statuscivil'] = array_sum($statuscivil);
        $paramclient['client'] = 0;
        $paramclient['fec_ingreso'] = ($now);

        if(empty($id_cliente)) {
            $response = $this->Cliente_model->AddClient($paramclient);
            if ($response['estado'] == 'success') {
                //DAMI
                $paramdami['id_producto'] = $this->input->post('dmProd');
                $paramdami['id_user'] = $this->session->userdata('id_user');
                $paramdami['id_cliente'] = $response['id_insert'];
                $paramdami['fec_create'] = $now;
                $paramdami['id_statusdami'] = 1;

                $response_dami = $this->Dami_model->Adddami($paramdami);
                $response_dami['detalle'] = 'Dami # <strong>' . $response_dami['id_insert'] . '<strong>';
                echo json_encode($response_dami);
            } else {
                echo json_encode($response);
            }
        }else{
            $response = $this->Cliente_model->EditClient($paramclient, $id_cliente);
            if($response['estado'] == 'success'){
                if(empty($id_dami)) {
                    //DAMI
                    $paramdami['id_producto'] = $this->input->post('dmProd');
                    $paramdami['id_user'] = $this->session->userdata('id_user');
                    $paramdami['id_cliente'] = $id_cliente;
                    $paramdami['fec_create'] = $now;
                    $paramdami['id_statusdami'] = 1;

                    $response_dami = $this->Dami_model->AddDami($paramdami);
                    $response_dami['detalle'] = 'Dami # <strong>' . $response_dami['id_insert'] . '<strong>Creado Correctamente';
                    echo json_encode($response_dami);
                }else{
                    //DAMI
                    $paramdami['id_producto'] = $this->input->post('dmProd');

                    $response_dami = $this->Dami_model->EditDami($paramdami, $id_dami);
                    $response_dami['detalle'] = 'Dami # <strong>' .$id_dami . '<strong> Actualizado Correctamente';
                    echo json_encode($response_dami);
                }
            }

        }
	}

	public function Admin(){
	    $this->load->view('menu_vertical',$this->data);
	    $this->load->view('callcenter/dami');
        $this->load->view('modals/new/modal_new_dami');
        $this->load->view('modals/modal_change_status_dami');
        $this->load->view('modals/modal_delete.php');
        $this->load->view('footer');
    }

    public function Director(){
        $this->load->view('menu_vertical',$this->data);
        $this->load->view('callcenter/dami'); // solo cargaremos la vista
        $this->load->view('modals/new/modal_new_dami');
        $this->load->view('modals/modal_delete.php');
        $this->load->view('footer'); // solo cargaremos la vista
    }

    public function Agente(){
        $this->load->view('menu_vertical',$this->data);
        $this->load->view('callcenter/dami'); // solo cargaremos la vista
        $this->load->view('modals/new/modal_new_dami');
        $this->load->view('modals/modal_delete.php');
        $this->load->view('footer'); // solo cargaremos la vista
    }

	public function DeleteDami(){
        $param['id_dami'] = $this->input->post('idDelete');
        if($this->Dami_model->DeleteDami($param)){
            echo 'error';
        }else{
            echo 'success';
        }
    }
}
/* End of file Callcenter.php */
