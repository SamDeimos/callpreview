<?php
if (!function_exists('seg_to_hours')) {
    function seg_to_hours($seg)
    {
        $horas = (floor($seg / 3600) == 0) ? '00' : floor($seg / 3600);
        $minutos = (floor(($seg - ($horas * 3600)) / 60) == 0) ? '00' : floor(($seg - ($horas * 3600)) / 60);
        $segundos = (($seg - ($horas * 3600) - ($minutos * 60)) == 0) ? '00' : $seg - ($horas * 3600) - ($minutos * 60);
        if (strlen($horas) == 1) {
            $horas = '0' . $horas;
        }
        if (strlen($minutos) == 1) {
            $minutos = '0' . $minutos;
        }
        if (strlen($segundos) == 1) {
            $segundos = '0' . $segundos;
        }

        return $horas . ':' . $minutos . ":" . $segundos;
    }
}
