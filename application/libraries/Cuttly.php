<?php defined('BASEPATH') or exit('No direct script access allowed');

class Cuttly
{
    //Variables API_key autenticación
    public $API_key = '8c242c44211528a495105879c698b8d45330e';

    public function shortener_URL($URL_long)
    {
        $json = file_get_contents('https://cutt.ly/api/api.php?key=' . $this->API_key . '&short=' . $URL_long);
        $result = json_decode($json, true);

        if ($result['url']['status'] == 7) {
            return $result['url']['shortLink'];
        } else {
            return $URL_long;
        }
    }
}

/* End of file Cuttly.php */
