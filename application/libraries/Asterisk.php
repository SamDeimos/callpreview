<?php defined('BASEPATH') or exit('No direct script access allowed');

class Asterisk
{
    //Variables call
    protected $timeout = 30000;
    protected $contexto = 'from-internal';
    protected $host_AMI;
    protected $user_AMI;
    protected $pass_AMI;

    public function __construct()
    {
        $CI = &get_instance();
        $this->host_AMI = $CI->config->item('ami_host');
        $this->user_AMI = $CI->config->item('ami_user');
        $this->pass_AMI = $CI->config->item('ami_pass');
    }

    public function llamar_AMI($id_call, $extension, $phone)
    {
        //Login AMI Asterisk
        $socket = fsockopen($this->host_AMI, "5038");
        fputs($socket, "Action: Login\r\n");
        fputs($socket, "UserName: " . $this->user_AMI . "\r\n");
        fputs($socket, "Secret: " . $this->pass_AMI . "\r\n\r\n");

        //Realizar llamdas AMI
        fputs($socket, "Action: Originate\r\n");
        fputs($socket, "Channel: SIP/" . $extension . "\r\n");
        fputs($socket, "Context: " . $this->contexto . "\r\n");
        fputs($socket, "Exten: " . $phone . "\r\n");
        fputs($socket, "Priority: 1\r\n");
        fputs($socket, "CallerId: Call Center <" . $extension . ">\r\n");
        fputs($socket, "Account: Call Manual\r\n");
        fputs($socket, "Timeout: " . $this->timeout . "\r\n");
        fputs($socket, "Async: false\r\n\r\n");
        fputs($socket, "Action: Logoff\r\n\r\n");

        $wrets = "";
        while (!feof($socket)) {
            $wrets .= fread($socket, 128) . '</br>';
        }
        /**
         * Capturar unique id de llamada generada con Originate
         *
         */
        $array_Request_Originate = str_replace('</br>', '', explode("\r\n\r\n", $wrets));
        $OriginateResponse = explode(": ", $array_Request_Originate[2]);

        //Validacion del estado de originate
        if (preg_replace("/[\r\n|\n|\r]+/", " ", $OriginateResponse[1]) == 'Success Message') {
            $arrayresponseOriginate = explode("\r\n", $array_Request_Originate[4]);
            $arrayresponse = array();
            foreach ($arrayresponseOriginate as $responseOriginate) {
                $element = explode(": ", $responseOriginate);
                $arrayresponse[$element[0]] = $element[1];
            };
            $uniqueid = $arrayresponse['Uniqueid'];

            return $this->_insert_reg_llamada($id_call, $phone, $uniqueid);
        } else {
            return NULL;
        }

        fclose($socket);
    }

    private function _insert_reg_llamada($id_call, $phone, $uniqueid)
    {
        $CI = &get_instance();
        // Actualizamos uniqueid de llamada
        $param['id_call'] = $id_call;
        $param['dst'] = $phone;
        $param['calldate'] = date('Y-m-d H:i:s');
        $param['uniqueid'] = $uniqueid;
        $CI->db->insert('md_callcenter_call_registry', $param);
        return $CI->db->insert_id();
    }
}

/* End of file Asterisk.php */
