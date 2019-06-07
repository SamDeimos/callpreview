<?php defined('BASEPATH') or exit('No direct script access allowed');

class Placetopay
{

    //Variables suministradas por PlacetoPay
    public $login;          //Usuario PlacetoPay
    private $secretKey;     //Clave secreta PlacetoPay

    //Variables calculadas por el usuario
    public $seed;
    public $nonce;
    public $nonceBase64;
    public $tranKey;

    // Variable de repuesta de transacción
    public $response;
    public $err;

    //Función para realizar autenticación
    private function _AuthLogin()
    {
        $this->seed = date('c');
        $this->login = "3571f131207b3fd0c19da079bead7660";
        $this->secretKey = "508c95ILWACM473c";

        if (function_exists('random_bytes')) {
            $this->nonce = bin2hex(random_bytes(16));
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $this->nonce = bin2hex(openssl_random_pseudo_bytes(16));
        } else {
            $this->nonce = mt_rand();
        }

        $this->nonceBase64 = base64_encode($this->nonce);
        $this->tranKey = base64_encode(sha1($this->nonce . $this->seed . $this->secretKey, true));
    }

    // Funcion para el envio de datos de placetopay
    public function _sendTrans_to_Placetopay($id_venta, $payment, $payer)
    {
        //Realizamos Login
        $this->_AuthLogin();

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://test.placetopay.ec/redirection/api/session/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "UTF-8",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "Cache-Control: no-cache",
                "Content-Type: application/json",
                "Postman-Token: 96983e26-ba1b-4dfa-bbe9-54f877428d08"
            ),
        ));

        $request = [
            "auth" => [
                "login" => $this->login,
                "seed" => $this->seed,
                "nonce" => $this->nonceBase64,
                "tranKey" => $this->tranKey
            ],
            "locale" => 'es_EC',
            "expiration" => date('c', strtotime('+25 minutes')), // tiempo para pago antes de caducar sesi�n
            "returnUrl" => "https://app.xudo.dev/tienda/ventas/detalle/" . $id_venta,
            "ipAddress" => "200.7.213.242",
            "userAgent" => "PlacetoPay Sandbox",
        ];

        $request['payment'] = $payment;
        $request['payer'] = $payer;

        $data = json_encode($request);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        $this->response = json_decode(curl_exec($curl), JSON_UNESCAPED_UNICODE);
        $this->err = curl_error($curl);
        curl_close($curl);

        return true;
    }

    public function getStatus_pago_Placetopay($requestID = NULL)
    {

        //Realizamos Login
        $this->_AuthLogin();

        //SOLICITAMOS LA CREACION DE SESSION PARA LA CONSULTA A P2P
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://test.placetopay.ec/redirection/api/session/" . $requestID,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "Cache-Control: no-cache",
                "Content-Type: application/json",
                "Postman-Token: 96983e26-ba1b-4dfa-bbe9-54f877428d08"
            ),
        ));

        $request = [
            "auth" => [
                "login" => $this->login,
                "seed" => $this->seed,
                "nonce" => $this->nonceBase64,
                "tranKey" => $this->tranKey
            ]
        ];

        $data = json_encode($request);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        $response = json_decode(curl_exec($curl), JSON_UNESCAPED_UNICODE);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return $err;
        } else {
            return $response['status'];
        }
    }

    //Obtener estado de transacción
    public function getEstado()
    {
        return $this->response['status']['status'];
    }

    //Obtener Urlpara realizar elpago
    public function getProcessUrl()
    {
        return $this->response['processUrl'];
    }

    //Obtener requestId del pago
    public function getRequestId()
    {
        return $this->response['requestId'];
    }

    //Obtener log de transaccion
    public function getLogTrans()
    {
        return $this->response;
    }

    //Insertar datos en DB con la información de transacción
    public function insertData()
    {
        if ($this->response['status']['status'] == OK) {
            echo "Todo salio Bien, listo para insertar";
        }
    }
}

/* End of file
 Placetopay.php */
