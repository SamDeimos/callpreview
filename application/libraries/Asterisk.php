<?php defined('BASEPATH') or exit('No direct script access allowed');

class Asterisk
{
    //Variables call
    protected $timeout = 30000;
    protected $contexto = 'from-internal';
    protected $asterisk_ip = "127.0.0.1";
    protected $actionid = "CallcenterXUDO-";
    protected $user_AMI = "admin";
    protected $pass_AMI = "bcga1303";

    public function llamar_AMI($id_call, $extension, $phone)
    {
        $this->actionid = $this->actionid . $id_call;
        //Login AMI Asterisk
        $socket = fsockopen($this->asterisk_ip, "5038");
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
        $arrayresponseOriginate = explode("\r\n", $array_Request_Originate[4]);
        $arrayresponseUniqueid = array();
        foreach ($arrayresponseOriginate as $responseOriginate) {
            $element = explode(": ", $responseOriginate);
            $arrayresponseUniqueid[$element[0]] = $element[1];
        };
        $uniqueid =$arrayresponseUniqueid['Uniqueid'];
        fclose($socket);

        // var_dump($array_Request_Originate);

        if ($wrets != '') {
            return $this->_insert_reg_llamada($id_call, $phone, $uniqueid);
        } else {
            return "no se ha realizado la llamada";
        }
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

    // public function get_uniqueid_ActionID($actionid)
    // {
    //     //Login AMI Asterisk
    //     $socket = fsockopen($this->asterisk_ip, "5038");
    //     fputs($socket, "Action: Login\r\n");
    //     fputs($socket, "UserName: " . $this->user_AMI . "\r\n");
    //     fputs($socket, "Secret: " . $this->pass_AMI . "\r\n\r\n");
    //     fwrite($socket, "Action: Status\r\n");
    //     fwrite($socket, "ActionID: " . $actionid . "\r\n\r\n");
    //     fputs($socket, "Action: Logoff\r\n\r\n");

    //     $wrets = "";
    //     while (!feof($socket)) {
    //         $wrets .= fread($socket, 128) . '</br>';
    //     }

    //     fclose($socket);

    //     //array con toda la respuesta
    //     $array_Request_Originate = str_replace('</br>', '', explode("\r\n\r\n", $wrets));

    //     if (count($array_Request_Originate) > 6) {

    //         //llamada saliente unica
    //         if (count($array_Request_Originate) == 9) {
    //             $arrayresponseOriginate = (explode("\r\n", $array_Request_Originate[5]));
    //             $arrayresponseUniqueid = array();
    //             foreach ($arrayresponseOriginate as $responseOriginate) {
    //                 $element = explode(": ", $responseOriginate);
    //                 $arrayresponseUniqueid[$element[0]] = $element[1];
    //             };
    //             $result = $arrayresponseUniqueid['Uniqueid'];

    //             //doble llamada al mismo numero desde la misma extencion
    //         } elseif (count($array_Request_Originate) == 10) {
    //             $arrayresponseOriginate = (explode("\r\n", $array_Request_Originate[6]));
    //             $arrayresponseUniqueid = array();
    //             foreach ($arrayresponseOriginate as $responseOriginate) {
    //                 $element = explode(": ", $responseOriginate);
    //                 $arrayresponseUniqueid[$element[0]] = $element[1];
    //             };
    //             $result = $arrayresponseUniqueid['Uniqueid'];
    //         } else {
    //             $result['ERROR'] = $array_Request_Originate;
    //         }
    //     } else {
    //         $result['ERROR_ORIGINATE'] = $array_Request_Originate;
    //     }
    //     return $result;
    // }
}

/* End of file Asterisk.php */
