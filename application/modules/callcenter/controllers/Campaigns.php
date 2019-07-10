<?php defined('BASEPATH') or exit('No direct script access allowed');

class Campaigns extends CI_Controller
{

    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Call_model');
        $this->load->model('Campaign_model');
        $this->load->library('Exportar');
        $this->load->library('Menu');
        $this->load->library('ValidarLogin');

        //Variables indispensables
        $this->data['menu'] = $this->menu->getMenu($this->session->userdata('idpermiso'));
        $this->data['vendedores'] = get_listado_usuarios_idpermiso(2);
        $this->data['campaigns'] = $this->Campaign_model->findAll();
        $this->data['forms'] = get_listado_forms();
        $this->data['scripts'] = get_listado_scripts();

        //Validación de inicio de session
        $this->validarlogin->validateLogin();
    }


    public function index()
    {
        //Carga de vistas
        $this->load->view('header', $this->data);
        $this->load->view('campaigns');
        $this->load->view('modals/modal_delete');
        $this->load->view('footer');
    }

    public function campaign()
    {
        //Carga de vistas
        $this->load->view('header', $this->data);
        $this->load->view('formulario_campaign');
        $this->load->view('footer');
    }

    public function AddCampaign()
    {
        $param['campaign'] = $this->input->post('campaign');
        $param['id_form'] = $this->input->post('id_form');
        $param['id_script'] = $this->input->post('id_script');
        $param['id_campaign_status'] = 2;

        $id_user = $this->input->post('id_user');
        $id_campaign = $this->Campaign_model->AddCampaign($param);
        $dir_file = $this->_upload_file();

        $this->_insert_file($dir_file, $id_campaign, $id_user);

        redirect(base_url() . 'callcenter/campaigns', 'refresh');
    }

    /**
     * Actualizar estado de la campaña por medio de ajax
     * usando un toggle bottton
     *
     */
    public function update_campaign_status()
    {

        if ($this->input->post()) {
            $param['id_campaign_status'] = $this->input->post('id_campaign_status');
            $this->Campaign_model->update_campaign_status($this->input->post('id_campaign'), $param);
        }
    }

    public function export_csv()
    {
        if ($this->input->get()) {
            $this->exportar->export_csv($this->input->get('campaign'), $this->Campaign_model->data_export_registro_llamada($this->input->get('id_campaign')));
        }
    }

    public function export_xlsx()
    {
        if ($this->input->get()) {
            $this->exportar->export_excel($this->input->get('campaign'), $this->Campaign_model->data_export_registro_llamada($this->input->get('id_campaign')));
        }
    }

    /**
     * Suir archivo .CSV al servidor
     *
     * @return  string  direccion completa del archivo
     */
    private function _upload_file()
    {
        $config['upload_path'] = "file_csv/";
        $config['file_name'] = substr($_FILES['file_csv']['name'], 0, -4) . '-' . date('Ymdhsi');;
        $config['allowed_types'] = "csv";
        $config['max_size'] = "50000";
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_csv')) {
            //*** ocurrio un error
            //$data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        } else {
            return $this->upload->data()['full_path'];
        }
    }


    /**
     * Se inserta la información del archivo csv en la base de datos
     *
     * @param   string  $dir_file  dirección completa del archivo
     *
     */
    private function _insert_file($dir_file, $id_campaign, $id_user)
    {
        $gestor = fopen($dir_file, "r");
        if (!$gestor) {
            exit("No se puede abrir el archivo $dir_file");
        }

        $numeroDeFila = 1;
        while (($fila = fgetcsv($gestor, 0, ",")) !== FALSE) {
            if ($numeroDeFila === 1) {
                $headers = array();
                foreach ($fila as $numeroDeColumna => $columna) {
                    if ($numeroDeColumna >= 4) {
                        array_push($headers, $columna);
                    }
                }
            } else {
                # CONSTRUCTOR DE FILAS
                # Ahora $fila es un arreglo. Podríamos acceder al precio de compra en $fila[1]
                # porque los índices de los arreglos comienzan en 0
                $call = array();
                $phones = array();
                $data_attributes = array();
                foreach ($fila as $numeroDeColumna => $columna) {
                    switch ($numeroDeColumna) {
                        case 0:
                        case 1:
                        case 2:
                            if ($columna && is_numeric($columna)) {
                                $phones[] = $columna;
                            }
                            break;
                        case 3:
                            $call['nombres'] = $columna;
                            break;
                        default:
                            $data_attributes[] = $columna;
                            break;
                    }
                }
                $call['id_campaign'] = $id_campaign;
                $call['id_user'] = $id_user;
                $call['phones'] = json_encode($phones);
                $call['id_call_status'] = 1;
                $call_attribute['data_attribute'] = json_encode(array_combine($headers, $data_attributes));
                $call_attribute['id_call'] = $this->Call_model->AddCall($call);
                $this->Call_model->AddCallAttribute($call_attribute);
                //var_dump($data_attributes);
            }
            # Aumentar el índice
            $numeroDeFila++;
        }
        # Al finar cerrar el gestor
        fclose($gestor);
    }
}

/* End of file Campaign.php */
