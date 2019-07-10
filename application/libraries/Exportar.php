<?php defined('BASEPATH') or exit('No direct script access allowed');

class Exportar
{
    public function export_csv($name, $data)
    {
        $filename = $name . '-' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/x-csv;");

        // file creation 
        $file = fopen('php://output', 'w');

        //constructor de header
        $arrayheader = (array) $data[0];
        $header = array();
        foreach ($arrayheader as $key => $value) {
            $header[] = $key;
        }
        fputcsv($file, $header);

        //constructor de data
        foreach ($data as $numeroDeColumna => $columna) {
            fputcsv($file, (str_replace(array("{", "}", "[", "]"), "", (array) $columna)));
        }

        fclose($file);
        exit;
    }

    public function export_excel($name, $data)
    {
        $filename = $name . '-' . date('Ymd') . '.xls';
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Pragma: no-cache');
        header("Expires: 0");

        echo '<table>' .
            '<thead>' .
            '<tr>';
        /**
         * buscamos el priemr registro con data_formulario direfente de null
         *
         */
        $i = 0;
        $arraydata = (array) $data[$i];
        while ($arraydata['data formulario'] == NULL) {
            $i++;
            $arraydata = (array) $data[$i];
        }

        //Contruccion de data formulario
        $arrayheaderform = array_pop($arraydata);
        $arrayheaderform = array_map("utf8_decode", array_keys(json_decode($arrayheaderform, true)));

        //Construccion header
        $arrayheader = array_keys($arraydata);
        $arrayheader = str_replace(array("_"), " ", array_merge($arrayheader, $arrayheaderform));

        foreach ($arrayheader as $value) {
            $value = ucwords($value);
            echo '<th style="border:1px solid #ccc; background-color:#007bff; color:white;">' .
                $value .
                '</th>';
        }
        echo '</tr>' .
            '</thead>' .
            '<tbody>';

        foreach ($data as $fila) {
            $fila = array_values((array) $fila);

            //Construcctor de resultados de formulario
            $dataform = json_decode(array_pop($fila), JSON_UNESCAPED_UNICODE);
            if ($dataform != NULL) {
                $dataform = array_values($dataform);
                $fila = array_merge($fila, $dataform);
            }
            echo '<tr>';
            foreach ($fila as $campo) {
                echo '<td style="border:1px solid #ccc; color:#212529;">' . str_replace(array("{", "}", "[", "]"), "", $campo) . '</td>';
            }
            echo '</tr>';
        }
        echo '</tbody>' .
            '</table>';
    }
}
