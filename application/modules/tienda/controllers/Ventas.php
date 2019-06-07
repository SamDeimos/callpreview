<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ventas extends CI_Controller
{
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Venta_model');
        $this->load->model('Producto_model');
        $this->load->model('Pago_model');
        $this->load->library('Menu');
        $this->load->library('ValidarLogin');
        $this->load->library('AttributosPersona');

        //Variables indispensables
        $this->data['menu'] = $this->menu->getMenu($this->session->userdata('idpermiso'));
        $this->data['cedulas'] = get_Listado_Clientes();

        //Variables para modulo
        $this->data['ventas'] = get_listado_ventas($this->session->userdata('id_user'), $this->session->userdata('idpermiso'));
        $this->data['productos'] = $this->Producto_model->findAll();
        $this->data['status_pagos'] = get_listado_status_pagos();
        $this->data['metodos_pagos'] = get_listado_metodos_pagos();
    }


    public function index()
    {
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        $this->load->view('header', $this->data);
        $this->load->view('ventas');
        $this->load->view('modals/modal_delete');
        $this->load->view('modals/modal_pagar');
        $this->load->view('footer');
    }

    public function venta($id_venta = NULL)
    {
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        if ($id_venta != NULL) {
            $this->data['venta'] = $this->Venta_model->findID($id_venta);
            $this->data['detalles'] = $this->Venta_model->find_detalles_ID($id_venta);
            $this->data['pagos'] = $this->Venta_model->find_pagos_ID($id_venta);
        }

        //Cargamos las vitas del modulo Ventas
        $this->load->view('header', $this->data);
        $this->load->view('formulario_venta');
        $this->load->view('modals/modal_pagar');
        $this->load->view('footer');

        //Validamos ingreso de datos por post
        if ($this->input->post()) {

            //Variables a insertar Ventas
            $param['id_statusventa'] = $this->input->post('id_statusventa');

            //Variables detalles de venta
            $id_productos = $this->input->post('id_productos');
            $precios = $this->input->post('precios');
            $cantidades = $this->input->post('cantidades');
            $total = $this->input->post('total');

            if (empty($this->input->post('id_venta'))) {
                /*
                *Insertamos venta nueva
                *
                */
                //insert venta
                $param['id_user'] = $this->session->userdata('id_user');
                $param['id_cliente'] = $this->input->post('id_cliente');
                $param['total'] = $this->input->post('total_venta');
                $param['fecha_venta'] = date('Y-m-d');
                $id_venta = $this->Venta_model->AddVenta($param);

                //insert venta detalle
                if (!empty($id_venta)) {
                    $this->_add_venta_detalle($id_productos, $id_venta, $precios, $cantidades, $total);
                }
                redirect(base_url() . 'tienda/ventas/venta/'. $id_venta, 'refresh');
            } else {
                /*
                * Actualizar venta
                *
                */
                $id_venta = $this->input->post('id_venta');
                $this->Venta_model->EditVenta($param, $id_venta);

                redirect(base_url() . 'tienda/ventas/venta/' . $id_venta, 'refresh');
            }
        }
    }

    public function detalle($id_venta = NULL)
    {
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        if ($id_venta == NULL) {
            $this->data['venta'] = NULL;
        } else {
            $this->data['venta'] = $this->Venta_model->findID($id_venta);
            $this->data['detalles'] = $this->Venta_model->find_detalles_ID($id_venta);
        }

        //Cargamos las vitas detalle de venta
        $this->load->view('invoice_venta', $this->data);
        $this->load->view('footer');
    }

    protected function _add_venta_detalle($id_productos, $id_venta, $precios, $cantidades, $total)
    {
        //$this->Venta_model->DeleteVentaDetalle($id_venta);
        for ($i = 0; $i < count($id_productos); $i++) {
            $data = array(
                'id_producto' => $id_productos[$i],
                'id_venta' => $id_venta,
                'precio' => $precios[$i],
                'cantidad' => $cantidades[$i],
                'total' => $total[$i],
            );
            $this->Venta_model->AddVentaDetalle($data);
        }
    }

    public function VentaTable()
    {
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        echo json_encode((empty($this->data['ventas'])) ? NULL : $this->data['ventas']);
    }

    public function DeleteVenta()
    {
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        $id_venta = $this->input->post('idDelete');
        if ($this->Venta_model->DeleteVenta($id_venta)) {
            echo 'error';
        } else {
            echo 'success';
        }
    }
}

/* End of file Ventas.php */
