<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pagos extends CI_Controller
{
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pago_model');
        $this->load->model('Producto_model');
        $this->load->library('Menu');
        $this->load->library('ValidarLogin');
        $this->load->library('AttributosPersona');
        $this->load->library('Placetopay');
        $this->load->library('Cuttly');

        //Variables indispensables
        $this->data['menu'] = $this->menu->getMenu($this->session->userdata('idpermiso'));
        $this->data['cedulas'] = get_Listado_Clientes();

        //Variables para modulo
        $this->data['pagos'] = $this->Pago_model->findAll();
        $this->data['productos'] = $this->Producto_model->findAll();
        $this->data['status_pagos'] = get_listado_status_pagos();
        $this->data['metodos_pagos'] = get_listado_metodos_pagos();
    }


    public function index()
    {
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        $this->load->view('header', $this->data);
        $this->load->view('pagos');
        $this->load->view('modals/modal_delete');
        $this->load->view('footer');
    }

    public function pago($id_pago = NULL)
    {
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        /*
        / Condicionamos @id si es Nueva venta
        / o Editar venta
        / @id_venta int
        */
        if ($id_pago != NULL) {
            $this->data['pago'] = $this->Pago_model->findID($id_pago);
        }

        //Cargamos las vitas del modulo Pagos
        $this->load->view('header', $this->data);
        $this->load->view('formulario_pago');
        $this->load->view('footer');

        /**
         * Creacion de una venta directa utilizando modulo de pago deirecto
         *
         */
        if ($this->input->post('id_cliente')) {

            //Variables a insertar
            $param['id_cliente'] = $this->input->post('id_cliente');
            $param['id_producto'] = $this->input->post('id_producto');
            $param['id_statuspago'] = $this->input->post('id_statuspago');
            $param['id_metodopago'] = $this->input->post('id_metodopago');
            $param['id_user'] = $this->session->userdata('id_user');

            if (empty($this->input->post('id_pago'))) {
                //Insertamos tarea nueva
                $param['fecha_pago'] = date('Y-m-d h:s:i');
                $id_pago = $this->Pago_model->AddPago($param);

                if ($param['id_metodopago'] == '1') {
                    //Metodo Realizar pago metodo efectivo
                    $this->_realizar_pago_metodo_efectivo($id_pago, $id_venta = null, $importe = null);
                } elseif ($param['id_metodopago'] == '2') {
                    //realizar pago Placetopay
                    $cliente = get_cliente_id($param['id_cliente']);
                    $producto = json_encode($this->Producto_model->findID($param['id_producto']), true);
                    $iva = $this->_iva($producto['valor']);
                    $valor = $producto['valor'] - $iva;

                    //FUNCION Realizar pago
                    $this->_realizar_pago_metodo_placetopay($id_pago, $cliente, $producto, $iva, $valor);
                }

                redirect(base_url() . 'tienda/pagos/', 'refresh');
            } else {
                //Actualizamos task actual
                $id_pago = $this->input->post('id_pago');
                $this->Pago_model->EditPago($param, $id_pago);
                redirect(base_url() . 'tienda/pagos/pago/ ' . $id_pago, 'refresh');
            }

            /**
             * Este proceso se inicia cuando se desea crear un pago de una venta
             * y recibe el id_de la venta por post
             */
        } elseif ($this->input->post('id_venta')) {

            //Variables a insertar
            $param['id_venta'] = $this->input->post('id_venta');
            $param['id_user'] = $this->session->userdata('id_user');
            $param['id_statuspago'] = $this->input->post('id_statuspago');
            $param['id_metodopago'] = $this->input->post('id_metodopago');
            $param['importe'] = $this->input->post('importe');

            //Insertamos tarea nueva
            $param['fecha_pago'] = date('Y-m-d h:s:i');
            $id_pago = $this->Pago_model->AddPago($param);

            /**************************************
             *Metodo Realizar pago metodo efectivo
             ***************************************/
            if ($param['id_metodopago'] == '1') {

                //Metodo Realizar pago metodo efectivo
                $this->_realizar_pago_metodo_efectivo($id_pago, $param['id_venta'], $param['importe']);

                /**************************************
                 *Metodo Realizar pago Placetopay
                 ***************************************/
            } elseif ($param['id_metodopago'] == '2') {

                //realizar pago 
                $venta = get_venta_id($this->input->post('id_venta'));
                $cliente = get_cliente_id($venta->id_cliente);

                $producto['producto'] = '#' . $this->input->post('id_venta');
                $producto['valor'] = $param['importe'];
                $iva = $this->_iva($producto['valor']);
                $valor = $producto['valor'] - $iva;

                //FUNCION Realizar pago placetopay
                $this->_realizar_pago_metodo_placetopay($param['id_venta'], $id_pago, $cliente, $producto, $iva, $valor);
            }
        }
    }

    /*
    *LISTADO DE PAGOS PARA PETICION AJAX
    *
    */
    public function PagoTable()
    {
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        echo json_encode((empty($this->data['pagos'])) ? NULL : $this->data['pagos']);
    }

    /*
    *ELIMINAR PAGO AJAX
    *
    *
    */
    public function DeletePago()
    {
        //Validación de inicio de session
        $this->validarlogin->validateLogin();

        $id_pago = $this->input->post('idDelete');
        if ($this->Pago_model->DeletePago($id_pago)) {
            echo 'error';
        } else {
            echo 'success';
        }
    }


    public function detalle($requestid = NULL)
    {
        if ($requestid != NULL) {
            $this->load->view('invoice_pago');
        }
    }

    /*
    *Cron seguimiento de estado de trasacciones
    *
    */
    public function Placetopay_seguimiento_estado_pago_CRON()
    {
        $list_pagos = $this->Pago_model->findAll_Placetopay();

        foreach ($list_pagos as $pago) {
            $data_json = $pago->data_pago;
            $data_array = json_decode($data_json, true);

            $stado = $this->placetopay->getStatus_pago_Placetopay($data_array['requestid']);
            echo '<p>' . $pago->id_pago . '-' . json_encode($stado) . '-' . $data_array['requestid'] . '</p>';
            $data_array['status'] = $stado['status'];
            $data_array['message'] = $stado['message'];

            if ($stado['status'] == 'APPROVED') {
                $param_pago['id_statuspago'] = 2;
                $param_venta['importe'] = $pago->importe + importe_pagado_venta_id($pago->id_venta);

                //Validacion si la venta es completa
                if (check_status_venta($pago->id_venta, $param_venta['importe']) == TRUE) {
                    $param_venta['id_statusventa'] = 2;
                } else {
                    $param_venta['id_statusventa'] = 4;
                }
            } else if ($stado['status'] == 'REJECTED') {
                $param_pago['id_statuspago'] = 4;
                $param_venta['id_statusventa'] = 3;
            } else if ($stado['status'] == 'PENDING') {
                $param_pago['id_statuspago'] = 1;
                $param_venta['id_statusventa'] = 5;
            } else {
                $param_pago['id_statuspago'] = 3;
                $param_venta['id_statusventa'] = 3;
            }

            $param_pago['data_pago'] = json_encode($data_array);
            $this->Pago_model->EditPago($param_pago, $pago->id_pago);

            update_venta_id($param_venta, $pago->id_venta);

            echo '<hr>';
        }
    }

    /*
    *Realizar pago metodo Placetopay
    *
    */
    protected function _realizar_pago_metodo_placetopay($id_venta = NULL, $id_pago, $cliente, $producto, $iva, $valor)
    {
        $payment = [
            "reference" => "SKU00-" . $id_pago,
            "description" => $producto['producto'],
            "amount" => [
                "currency" => "USD",
                "total" => $producto['valor'],
                "taxes " => [
                    "kind " => "iva",
                    "amount " =>  $iva,
                    "base " => $valor
                ],
                "details" => [
                    [
                        "kind" => "subtotal",
                        "amount" => $valor

                    ]
                ]
            ],
            "allowPartial" => false,
        ];

        $payer = [
            "documentType" => "CI",
            "document" => $cliente->dni,
            "name" => $cliente->nombres,
            "surname" => $cliente->nombres,
            "email" => $cliente->email,
            "mobile" => $cliente->cel
        ];

        $this->placetopay->_sendTrans_to_Placetopay($id_venta, $payment, $payer);
        sleep(1);

        $datos['url'] = $this->placetopay->getProcessUrl();
        $datos['shorturl'] = $this->cuttly->shortener_URL($datos['url']);
        $datos['requestid'] = $this->placetopay->getRequestId();
        $datos['status'] = $this->placetopay->getEstado();
        $param['data_pago'] = json_encode($datos);
        $param['id_statuspago'] = 1;
        $this->Pago_model->EditPago($param, $id_pago);
    }

    /**
     * Realizar pago por metodo efectivo, el cual recibe un valor a pagar; todas
     * las ventas realizadas por este metodo son como aprobadas
     *
     * @param   int  $id_pago   id de pago a realiza 
     * @param   int  $id_venta  id de la venta a pagar
     * @param   int  $importe   valor total de la venta
     *
     */
    protected function _realizar_pago_metodo_efectivo($id_pago, $id_venta = NULL, $importe)
    {

        $param['id_statuspago'] = 2;
        $this->Pago_model->EditPago($param, $id_pago);

        $param_venta['importe'] = $importe + importe_pagado_venta_id($id_venta);

        //Validacion si la venta es completa
        if (check_status_venta($id_venta, $param_venta['importe']) == TRUE) {
            $param_venta['id_statusventa'] = 2;
        } else {
            $param_venta['id_statusventa'] = 4;
        }

        update_venta_id($param_venta, $id_venta);
    }

    protected function _iva($valor_total)
    {
        $bruto_valor = $valor_total / 1.12;
        $iva_valor = $bruto_valor * 0.12;
        return $iva_valor;
    }
}

/* End of file Pagos.php */
